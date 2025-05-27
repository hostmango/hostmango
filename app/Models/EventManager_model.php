<?php

namespace App\Models;

use CodeIgniter\Model;

class EventManager_model extends Model
{
    protected $DBGroup          = 'metin2'; // Connects to the 'metin2' database group
    protected $table            = 'event_table'; // Database table name
    protected $primaryKey       = 'id'; // Primary key of the table

    protected $useAutoIncrement = true; // Whether the primary key is auto-incrementing

    protected $returnType       = 'array'; // Default return type for find* methods
    protected $useSoftDeletes   = false; // Set to true if you want soft deletes

    // Fields that are allowed to be saved by insert/update methods
    protected $allowedFields    = [
        'id', // Added as per request
        'event_index',
        'start_time',
        'end_time',
        'empire_flag',
        'channel_flag',
        'value0',
        'value1',
        'value2',
        'value3'
    ];

    // Dates
    // If you want CodeIgniter to automatically handle created_at and updated_at timestamps
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    /**
     * Fetches all records from the event_table.
     *
     * @return array|null An array of event records or null if no records are found.
     */
    public function getAllEvents(): ?array
    {
        return $this->findAll();
    }

    /**
     * Fetches a single event by its ID.
     *
     * @param int $id The ID of the event.
     * @return array|null The event record as an array or null if not found.
     */
    public function getEventById(int $id): ?array
    {
        return $this->find($id);
    }

    /**
     * Inserts a new event into the table.
     *
     * @param array $data Data to be inserted.
     *                     Example: ['event_index' => 1, 'start_time' => '2023-01-01 10:00:00', ...]
     * @return int|false The insert ID on success, or false on failure.
     */
    public function createEvent(array $data)
    {
        return $this->insert($data);
    }

    /**
     * Updates an existing event with the given ID.
     *
     * @param int   $id   The ID of the event to update.
     * @param array $data An associative array of data to update.
     *                    Example: ['event_index' => 2, 'value0' => 100]
     * @return bool True on success, false on failure.
     */
    public function updateEvent(int $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    /**
     * Deletes an event by its ID.
     *
     * @param int $id The ID of the event to delete.
     * @return bool True on success, false on failure.
     */
    public function deleteEvent(int $id): bool
    {
        return $this->delete($id);
    }
}
