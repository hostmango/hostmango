<?= view('Static/Header') ?>

<!-- Original EventManager/Index.php content starts here -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?= lang('EventManager.page.title') ?></h3>
        <div class="card-options">
            <?php if (IsAllowedViewModule('eventManagerDuzenleyebilsin')): ?>
            <button id="createEventBtn" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> <?= lang('EventManager.button.createNewEvent') ?>
            </button>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <table id="eventsTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th><?= lang('EventManager.table.headerId') ?></th>
                    <th><?= lang('EventManager.table.headerEventIndex') ?></th>
                    <th><?= lang('EventManager.table.headerStartTime') ?></th>
                    <th><?= lang('EventManager.table.headerEndTime') ?></th>
                    <th><?= lang('EventManager.table.headerEmpireFlag') ?></th>
                    <th><?= lang('EventManager.table.headerChannelFlag') ?></th>
                    <th><?= lang('EventManager.table.headerValue0') ?></th>
                    <th><?= lang('EventManager.table.headerValue1') ?></th>
                    <th><?= lang('EventManager.table.headerValue2') ?></th>
                    <th><?= lang('EventManager.table.headerValue3') ?></th>
                    <th><?= lang('EventManager.table.headerActions') ?></th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be populated by DataTables -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal for Create/Edit Event -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="eventForm">
                <div class="modal-body">
                    <input type="hidden" name="id" id="eventId">

                    <div class="form-group">
                        <label for="event_index"><?= lang('EventManager.form.labelEventIndex') ?></label>
                        <select name="event_index" id="event_index" class="form-control" required>
                            <option value="BONUS_EXP">BONUS_EXP</option>
                            <option value="BONUS_ITEM">BONUS_ITEM</option>
                            <option value="BONUS_GOLD">BONUS_GOLD</option>
                            <option value="DOUBLE_BOSS_LOOT">DOUBLE_BOSS_LOOT</option>
                            <option value="HEXA_CHEST_EVENT">HEXA_CHEST_EVENT</option>
                            <option value="FISHING_EVENT">FISHING_EVENT</option>
                            <!-- Add other enum values as needed -->
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_time"><?= lang('EventManager.form.labelStartTime') ?></label>
                                <input type="text" name="start_time" id="start_time" class="form-control" placeholder="YYYY-MM-DD HH:MM:SS" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_time"><?= lang('EventManager.form.labelEndTime') ?></label>
                                <input type="text" name="end_time" id="end_time" class="form-control" placeholder="YYYY-MM-DD HH:MM:SS" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="empire_flag"><?= lang('EventManager.form.labelEmpireFlag') ?></label>
                                <input type="number" name="empire_flag" id="empire_flag" class="form-control" required>
                                <small class="form-text text-muted">E.g., 0 for all, 1 for Shinsoo, 2 for Chunjo, 3 for Jinno</small>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="channel_flag"><?= lang('EventManager.form.labelChannelFlag') ?></label>
                                <input type="number" name="channel_flag" id="channel_flag" class="form-control" required>
                                <small class="form-text text-muted">E.g., 0 for all channels, 1 for CH1, etc.</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="value0"><?= lang('EventManager.form.labelValue0') ?></label>
                                <input type="number" name="value0" id="value0" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="value1"><?= lang('EventManager.form.labelValue1') ?></label>
                                <input type="number" name="value1" id="value1" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="value2"><?= lang('EventManager.form.labelValue2') ?></label>
                                <input type="number" name="value2" id="value2" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="value3"><?= lang('EventManager.form.labelValue3') ?></label>
                                <input type="number" name="value3" id="value3" class="form-control" required>
                            </div>
                        </div>
                    </div>
                     <div id="formErrors" class="alert alert-danger" style="display:none;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= lang('EventManager.button.cancel') ?></button>
                    <button type="submit" class="btn btn-primary"><?= lang('EventManager.button.save') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Original EventManager/Index.php content ends here -->

<!-- Original script sections if any -->
<script>
$(document).ready(function() {
    // Datetime picker initialization (example using Flatpickr, if available)
    // if (typeof flatpickr !== "undefined") {
    //     flatpickr("#start_time, #end_time", {
    //         enableTime: true,
    //         dateFormat: "Y-m-d H:i:S",
    //         time_24hr: true
    //     });
    // }

    var table = $('#eventsTable').DataTable({
        processing: true,
        serverSide: false, // Set to true if controller supports server-side processing for large datasets
        ajax: {
            url: '<?= base_url('EventManager/ajaxListEvents') ?>',
            type: 'POST', // Or 'GET' if your controller method expects GET
            dataSrc: 'data' // This is important if your JSON response is wrapped in a 'data' object
        },
        columns: [
            { data: 'id' },
            { data: 'event_index' },
            { data: 'start_time' },
            { data: 'end_time' },
            { data: 'empire_flag' },
            { data: 'channel_flag' },
            { data: 'value0' },
            { data: 'value1' },
            { data: 'value2' },
            { data: 'value3' },
            { data: 'actions', orderable: false, searchable: false }
        ],
        responsive: true,
        language: { // Optional: if you want to localize DataTables
            url: '<?= base_url('assets/js/tr.json') ?>' // Corrected path
        }
    });

    // Handle Create button click
    $('#createEventBtn').on('click', function() {
        $('#eventForm')[0].reset();
        $('#eventId').val('');
        $('#eventModalLabel').text('<?= lang('EventManager.form.titleCreate') ?>');
        $('#formErrors').hide();
        $('#eventModal').modal('show');
    });

    // Handle Edit button click
    $('#eventsTable tbody').on('click', '.edit-event', function() {
        var eventId = $(this).data('id');
        $('#formErrors').hide();
        $.ajax({
            url: '<?= base_url('EventManager/getEvent/') ?>' + eventId,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Assuming responseResult format: {'type':'success', 'success':true, 'event':eventData}
                // or {'type':'success', 'message': 'some message', 'event':eventData}
                if (response.type === 'success' && response.event) {
                    var event = response.event;
                    $('#eventId').val(event.id);
                    $('#event_index').val(event.event_index);
                    $('#start_time').val(event.start_time);
                    $('#end_time').val(event.end_time);
                    $('#empire_flag').val(event.empire_flag);
                    $('#channel_flag').val(event.channel_flag);
                    $('#value0').val(event.value0);
                    $('#value1').val(event.value1);
                    $('#value2').val(event.value2);
                    $('#value3').val(event.value3);
                    $('#eventModalLabel').text('<?= lang('EventManager.form.titleEdit') ?>');
                    $('#eventModal').modal('show');
                } else {
                    // Assuming error message is in response.error if type is not success, or response.message
                    var errorMessage = response.error || response.message || '<?= lang('EventManager.message.eventNotFound') ?>';
                    Swal.fire('<?= lang('Genel.hata') ?>', errorMessage, 'error');
                }
            },
            error: function() {
                Swal.fire('<?= lang('Genel.hata') ?>', '<?= lang('Genel.bilinmeyenHata') ?>', 'error');
            }
        });
    });

    // Handle Form Submission (Create/Update)
    $('#eventForm').on('submit', function(e) {
        e.preventDefault();
        $('#formErrors').hide().empty();
        var formData = $(this).serialize();
        var eventId = $('#eventId').val();
        var url = eventId ? '<?= base_url('EventManager/update/') ?>' + eventId : '<?= base_url('EventManager/create') ?>';

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.type === 'success') {
                    $('#eventModal').modal('hide');
                    table.ajax.reload(null, false); // false to keep current page
                    // Assuming success message is in response.message or response.success
                    var successMessage = response.message || response.success || '<?= lang('Genel.basarili') ?>';
                    Swal.fire('<?= lang('Genel.basarili') ?>', successMessage, 'success');
                } else {
                    // Assuming error messages/object is in response.error
                    if (typeof response.error === 'object') {
                        var errors = '<ul>';
                        $.each(response.error, function(key, value) {
                            errors += '<li>' + value + '</li>';
                        });
                        errors += '</ul>';
                        $('#formErrors').html(errors).show();
                         Swal.fire('<?= lang('Genel.hata') ?>', "<?= lang('Genel.formHatalari') ?>", 'error');
                    } else {
                         var errorMessage = response.error || response.message || '<?= lang('Genel.bilinmeyenHata') ?>';
                         $('#formErrors').html('<li>'+ errorMessage +'</li>').show();
                         Swal.fire('<?= lang('Genel.hata') ?>', errorMessage, 'error');
                    }
                }
            },
            error: function() {
                 $('#formErrors').html('<li><?= lang('Genel.bilinmeyenHata') ?></li>').show();
                 Swal.fire('<?= lang('Genel.hata') ?>', '<?= lang('Genel.bilinmeyenHata') ?>', 'error');
            }
        });
    });

    // Handle Delete button click
    $('#eventsTable tbody').on('click', '.delete-event', function() {
        var eventId = $(this).data('id');
        Swal.fire({
            title: '<?= lang('EventManager.confirm.deleteTitle') ?>',
            text: '<?= lang('EventManager.confirm.delete') ?>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: '<?= lang('EventManager.button.delete') ?>',
            cancelButtonText: '<?= lang('EventManager.button.cancel') ?>'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('EventManager/delete/') ?>' + eventId,
                    type: 'POST', // Or 'DELETE' if your server/routes support it
                    dataType: 'json',
                    success: function(response) {
                if (response.type === 'success') {
                            table.ajax.reload(null, false);
                    var successMessage = response.message || response.success || '<?= lang('Genel.silindi') ?>';
                    Swal.fire('<?= lang('Genel.silindi') ?>', successMessage, 'success');
                        } else {
                    var errorMessage = response.error || response.message || '<?= lang('Genel.bilinmeyenHata') ?>';
                    Swal.fire('<?= lang('Genel.hata') ?>', errorMessage, 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('<?= lang('Genel.hata') ?>', '<?= lang('Genel.bilinmeyenHata') ?>', 'error');
                    }
                });
            }
        });
    });
});
</script>

<?= view('Static/Footer') ?>
