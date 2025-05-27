<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EventManager_model; // Corrected namespace

class EventManager extends BaseController
{
    public $viewFolder = "";
    protected $eventModel;
    protected $validation;
    protected $request; // Added to store request object

    public function __construct()
    {
        $this->viewFolder = "EventManager";
        $this->eventModel = model(EventManager_model::class); // Corrected model loading
        $this->validation = \Config\Services::validation();
        $this->request = \Config\Services::request(); // Store request object

        // Basic authentication check (from Oyuncu.php)
        if (!session('user_id')) {
            // Assuming responseResult and lang helpers are available globally or via BaseController
            // If direct header usage is preferred and exit:
            header('Location: ' . base_url('GirisYap'));
            exit;
        }
        // Language file EventManager should be loaded automatically by lang() helper if named correctly.
    }

    public function index()
    {
        if (!IsAllowedViewModule('eventManagerGorebilsin')) {
            return redirect()->to(base_url('YetkisizErisim'));
        }

        $viewData['title'] = lang('EventManager.page.title');
        // Assuming ConstantHeader() is a global helper or part of BaseController
        $viewData = array_merge(ConstantHeader(), $viewData); 
        // LogAdd similar to Oyuncu controller if needed
        // LogAdd(lang('EventManager.log.viewedPage'), 'EventManager/index', session('user_id'));


        return view("{$this->viewFolder}/Index", $viewData);
    }

    public function ajaxListEvents()
    {
        if (!IsAllowedViewModule('eventManagerGorebilsin')) {
            responseResult('error', lang('Genel.yetkisizErisim')); // Assumes Genel.yetkisizErisim exists
            return;
        }

        $draw = $this->request->getPost('draw') ? intval($this->request->getPost('draw')) : 0;
        // For simplicity with current model; extend for server-side processing (search, pagination) later if needed
        $events = $this->eventModel->getAllEvents();
        $totalRecords = count($events ?: []);
        $recordsFiltered = $totalRecords;

        $data = [];
        if ($events) {
            foreach ($events as $event) {
                $actions = '';
                if (IsAllowedViewModule('eventManagerDuzenleyebilsin')) {
                    $actions .= '<button class="btn btn-sm btn-info edit-event" data-id="' . $event['id'] . '">' . lang('EventManager.button.edit') . '</button>';
                }
                if (IsAllowedViewModule('eventManagerSilebilsin')) {
                    $actions .= ' <button class="btn btn-sm btn-danger delete-event" data-id="' . $event['id'] . '">' . lang('EventManager.button.delete') . '</button>';
                }

                $data[] = [
                    'id' => $event['id'],
                    'event_index' => $event['event_index'],
                    'start_time' => $event['start_time'],
                    'end_time' => $event['end_time'],
                    'empire_flag' => $event['empire_flag'],
                    'channel_flag' => $event['channel_flag'],
                    'value0' => $event['value0'],
                    'value1' => $event['value1'],
                    'value2' => $event['value2'],
                    'value3' => $event['value3'],
                    'actions' => $actions,
                ];
            }
        }
        
        $output = [
            "draw" => $draw,
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $recordsFiltered,
            "data" => $data,
        ];

        // Using response() service for JSON as it's more standard in CI4 than echo json_encode + exit
        return $this->response->setJSON($output);
    }

    public function getEvent($id = null)
    {
        if (!IsAllowedViewModule('eventManagerDuzenleyebilsin')) {
            responseResult('error', lang('Genel.yetkisizErisim'));
            return;
        }

        if ($id === null) {
            responseResult('error', lang('EventManager.message.invalidData')); // Or a more specific "ID required"
            return;
        }
        
        $event = $this->eventModel->getEventById((int)$id);

        if ($event) {
            responseResult('success', true, ['event' => $event]);
        } else {
            responseResult('error', lang('EventManager.message.eventNotFound'));
        }
    }
    
    private function getValidationRules(): array
    {
        return [
            'event_index' => [
                'label' => lang('EventManager.form.labelEventIndex'),
                'rules' => 'required|integer'
            ],
            'start_time' => [
                'label' => lang('EventManager.form.labelStartTime'),
                'rules' => 'required|valid_date[Y-m-d H:i:s]'
            ],
            'end_time' => [
                'label' => lang('EventManager.form.labelEndTime'),
                'rules' => 'required|valid_date[Y-m-d H:i:s]|matches[start_time]|validate_end_time[{start_time}]',
                 'errors' => [ // Custom error for validate_end_time if needed
                    'validate_end_time' => lang('EventManager.validation.endTimeAfterStartTime') // Assuming this key exists
                 ]
            ],
            'empire_flag' => [
                'label' => lang('EventManager.form.labelEmpireFlag'),
                'rules' => 'required|integer'
            ],
            'channel_flag' => [
                'label' => lang('EventManager.form.labelChannelFlag'),
                'rules' => 'required|integer'
            ],
            'value0' => [
                'label' => lang('EventManager.form.labelValue0'),
                'rules' => 'required|integer'
            ],
            'value1' => [
                'label' => lang('EventManager.form.labelValue1'),
                'rules' => 'required|integer'
            ],
            'value2' => [
                'label' => lang('EventManager.form.labelValue2'),
                'rules' => 'required|integer'
            ],
            'value3' => [
                'label' => lang('EventManager.form.labelValue3'),
                'rules' => 'required|integer'
            ],
        ];
    }

    public function create()
    {
        if (!IsAllowedViewModule('eventManagerDuzenleyebilsin')) {
            responseResult('error', lang('Genel.yetkisizErisim'));
            return;
        }

        if (!$this->request->isAJAX() || $this->request->getMethod() !== 'post') {
             responseResult('error', lang('Genel.invalidRequest')); // Assuming Genel.invalidRequest
             return;
        }
        
        $rules = $this->getValidationRules();
        // Custom validation rule for end_time after start_time
        // This needs to be registered in app/Config/Validation.php or similar
        // For now, I'll add a placeholder for a custom rule logic.
        // A simple 'matches[start_time]' won't check if it's AFTER, just if it's a valid date.
        // A more robust solution would be a custom validation rule.
        // For now, I will remove `matches[start_time]` and `validate_end_time`
        // and rely on manual check after validation if needed, or assume a basic valid_date is enough for this step.
        unset($rules['end_time']['rules']['matches']); // removing for now
        unset($rules['end_time']['rules']['validate_end_time']); // removing for now
        // A better rule might be: 'end_time' => 'required|valid_date[Y-m-d H:i:s]|callback_is_after_start_time'
        // Then define public function is_after_start_time($endTime, string $startTimeFieldName, array $data)

        $this->validation->setRules($rules);

        if ($this->validation->withRequest($this->request)->run()) {
            $data = [
                'event_index'   => $this->request->getPost('event_index'),
                'start_time'    => $this->request->getPost('start_time'),
                'end_time'      => $this->request->getPost('end_time'),
                'empire_flag'   => $this->request->getPost('empire_flag'),
                'channel_flag'  => $this->request->getPost('channel_flag'),
                'value0'        => $this->request->getPost('value0'),
                'value1'        => $this->request->getPost('value1'),
                'value2'        => $this->request->getPost('value2'),
                'value3'        => $this->request->getPost('value3'),
            ];
            
            // Manual check for end_time after start_time
            if (strtotime($data['end_time']) <= strtotime($data['start_time'])) {
                responseResult('error', ['end_time' => lang('EventManager.validation.endTimeAfterStartTime')]);
                return;
            }

            $result = $this->eventModel->createEvent($data);
            if ($result) {
                // LogAdd(lang('EventManager.log.eventCreated', ['id' => $result]), 'EventManager/create', session('user_id'));
                responseResult('success', lang('EventManager.message.createSuccess'));
            } else {
                responseResult('error', lang('EventManager.message.createError'));
            }
        } else {
            responseResult('error', $this->validation->getErrors());
        }
    }

    public function update($id = null)
    {
        if (!IsAllowedViewModule('eventManagerDuzenleyebilsin')) {
            responseResult('error', lang('Genel.yetkisizErisim'));
            return;
        }
        
        if (!$this->request->isAJAX() || $this->request->getMethod() !== 'post' || $id === null) {
             responseResult('error', lang('Genel.invalidRequest'));
             return;
        }

        $event = $this->eventModel->getEventById((int)$id);
        if (!$event) {
            responseResult('error', lang('EventManager.message.eventNotFound'));
            return;
        }
        
        $rules = $this->getValidationRules();
        unset($rules['end_time']['rules']['matches']); 
        unset($rules['end_time']['rules']['validate_end_time']);

        $this->validation->setRules($rules);

        if ($this->validation->withRequest($this->request)->run()) {
            $data = [
                'event_index'   => $this->request->getPost('event_index'),
                'start_time'    => $this->request->getPost('start_time'),
                'end_time'      => $this->request->getPost('end_time'),
                'empire_flag'   => $this->request->getPost('empire_flag'),
                'channel_flag'  => $this->request->getPost('channel_flag'),
                'value0'        => $this->request->getPost('value0'),
                'value1'        => $this->request->getPost('value1'),
                'value2'        => $this->request->getPost('value2'),
                'value3'        => $this->request->getPost('value3'),
            ];

            if (strtotime($data['end_time']) <= strtotime($data['start_time'])) {
                responseResult('error', ['end_time' => lang('EventManager.validation.endTimeAfterStartTime')]);
                return;
            }

            $result = $this->eventModel->updateEvent((int)$id, $data);
            if ($result) {
                // LogAdd(lang('EventManager.log.eventUpdated', ['id' => $id]), 'EventManager/update/'.$id, session('user_id'));
                responseResult('success', lang('EventManager.message.updateSuccess'));
            } else {
                responseResult('error', lang('EventManager.message.updateError'));
            }
        } else {
            responseResult('error', $this->validation->getErrors());
        }
    }

    public function delete($id = null)
    {
        if (!IsAllowedViewModule('eventManagerSilebilsin')) {
            responseResult('error', lang('Genel.yetkisizErisim'));
            return;
        }

        if (!$this->request->isAJAX() || $this->request->getMethod() !== 'post' || $id === null) { // Should ideally be DELETE method, but forms often use POST
             responseResult('error', lang('Genel.invalidRequest'));
             return;
        }

        $event = $this->eventModel->getEventById((int)$id);
        if (!$event) {
            responseResult('error', lang('EventManager.message.eventNotFound'));
            return;
        }

        $result = $this->eventModel->deleteEvent((int)$id);
        if ($result) {
            // LogAdd(lang('EventManager.log.eventDeleted', ['id' => $id]), 'EventManager/delete/'.$id, session('user_id'));
            responseResult('success', lang('EventManager.message.deleteSuccess'));
        } else {
            responseResult('error', lang('EventManager.message.deleteError'));
        }
    }
}
