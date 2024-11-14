<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h6><?php echo display("factory_rest") ?></h6>
            </div>
            <div class="card-body">
                <h2>Truncate Selected Tables</h2>
                <form id="truncateForm">
                    <!-- List of checkboxes for tables -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="booked_details" id="booked_details" checked>
                        <label class="form-check-label" for="booked_details">
                            Booked Details
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="booked_info" id="booked_info" checked>
                        <label class="form-check-label" for="booked_info">
                            Booked Info
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="bill" id="bill" checked>
                        <label class="form-check-label" for="bill">
                            Bill
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="customer_order" id="customer_order" checked>
                        <label class="form-check-label" for="customer_order">
                            Customer Order
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="order_menu" id="order_menu" checked>
                        <label class="form-check-label" for="order_menu">
                            Order Menu
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="tbl_guestpayments" id="tbl_guestpayments" checked>
                        <label class="form-check-label" for="tbl_guestpayments">
                            Guest Payments
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="tbl_housekeepingrecord" id="tbl_housekeepingrecord" checked>
                        <label class="form-check-label" for="tbl_housekeepingrecord">
                            Housekeeping Record
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="tbl_otherguest" id="tbl_otherguest" checked>
                        <label class="form-check-label" for="tbl_otherguest">
                            Other Guest
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="tbl_pool_booking" id="tbl_pool_booking" checked>
                        <label class="form-check-label" for="tbl_pool_booking">
                            Pool Booking
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="tbl_pool_bookingitem" id="tbl_pool_bookingitem" checked>
                        <label class="form-check-label" for="tbl_pool_bookingitem">
                            Pool Booking Item
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="acc_transaction" id="acc_transaction" checked>
                        <label class="form-check-label" for="acc_transaction">
                            Account Transaction
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="tbl_openingbalance" id="tbl_openingbalance" checked>
                        <label class="form-check-label" for="tbl_openingbalance">
                            Opening Balance
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="tbl_postedbills" id="tbl_postedbills" checked>
                        <label class="form-check-label" for="tbl_postedbills">
                            Posted Bills
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="night_audit_setting" id="night_audit_setting" checked>
                        <label class="form-check-label" for="night_audit_setting">
                            Night Audit Setting
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="night_audit_time" id="night_audit_time" checked>
                        <label class="form-check-label" for="night_audit_time">
                            Night Audit Time
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="tbl_cashregister" id="tbl_cashregister" checked>
                        <label class="form-check-label" for="tbl_cashregister">
                            Cash Register
                        </label>
                    </div>
                    <br>
                    <br>
                    <!-- Checkbox for terms and conditions -->
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="confirmCheckbox">
                        <label class="form-check-label" for="confirmCheckbox">
                            I understand that this action will permanently delete all data from the selected tables.
                        </label>
                    </div>
                    <button type="submit" class="btn btn-danger mt-3" id="truncateButton" disabled>Truncate Tables</button>
                </form>

                <div class="progress mt-4">
                    <div id="progressBar" class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                </div>

                <div id="message" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>

<script>
    // Enable the button only if the checkbox is checked
    const checkbox = document.getElementById('confirmCheckbox');
    const button = document.getElementById('truncateButton');

    checkbox.addEventListener('change', function() {
        button.disabled = !this.checked;
    });
    var csrf = $('#csrf_token').val();
    var baseurl = $('#base_url').val() + 'dashboard/setting/truncate_table';

    $(document).ready(function() {
        $('#truncateForm').submit(function(event) {
            event.preventDefault();
            var selectedTables = [];

            $('input[type="checkbox"]:checked').each(function() {
                selectedTables.push($(this).val());
            });

            var totalTables = selectedTables.length;
            var progressPerTable = 100 / totalTables;
            var progress = 0;
            swal({
                    title: "Confirmation",
                    text: "Are you sure you want to submit?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#28a745",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $('#message').text("Truncating tables...");
                        backupDatabase(selectedTables, progressPerTable, progress, totalTables);
                    }
                });
        });

        function truncateTables(tables, progressPerTable, progress, totalTables) {
            var currentTableIndex = 0;

            function nextTable() {
                if (currentTableIndex < tables.length) {
                    var table = tables[currentTableIndex];

                    $.ajax({
                        url: baseurl,
                        type: 'POST',
                        data: {
                            csrf_test_name: csrf,
                            table: table
                        },
                        success: function(response) {
                            progress += progressPerTable;
                            updateProgressBar(progress);
                            currentTableIndex++;
                            nextTable();
                        },
                        error: function() {
                            alert('Error truncating ' + table);
                        }
                    });
                } else {
                    $('#message').text('All selected tables have been truncated successfully!');
                }
            }
            nextTable();
        }

        function backupDatabase(selectedTables, progressPerTable, progress, totalTables) {
            $.ajax({
                url: $('#base_url').val() + 'dashboard/autoupdate/download_backup',
                type: 'POST',
                data: {
                    csrf_test_name: csrf,
                },
                success: function(response) {
                    $('#message').text('Database backup successfully');
                    truncateTables(selectedTables, progressPerTable, progress, totalTables);
                },
                error: function() {
                    alert('Error truncating');
                }
            });
        }

        function updateProgressBar(progress) {
            $('#progressBar').css('width', progress + '%').attr('aria-valuenow', progress).text(progress.toFixed(2) + '%');
        }
    });
</script>