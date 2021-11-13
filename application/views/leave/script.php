<?php
defined('BASEPATH') or die('Access Denied');

if ($this->uri->segment(2) == 'pending') {
    $url = site_url('LeaveController/fetch_pending');
} elseif ($this->uri->segment(2) == 'approved') {
    $url = site_url('LeaveController/fetch_approved');
} elseif ($this->uri->segment(2) == 'discarded') {
    $url = site_url('LeaveController/fetch_discarded');
}

?>

<script>
    //Datatable for Filed Leaves
    var filedleave_table = $("#filedleave_table").DataTable({
        responsive: true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "<?php echo $url ?>",
            type: "POST"
        },
        "columnDefs": [{
            "targets": [],
            "orderable": false,
        }]
    });
    //end of datatable

    //Fetching Data in Filed Leave (For approved)
    $('#filedleave_table tbody').on('click', '.btn_approve_leave', function() {

        var data = filedleave_table.row($(this).parents('tr')).data();
        var rowdata = filedleave_table.row(this).data();


        if (data == undefined) {
            var me = '<?php echo site_url('LeaveController/fetch_leave_data/') ?>' + rowdata[0];
            $('#approve_leave_id').val(rowdata[0]);
        } else if (rowdata == undefined) {
            var me = '<?php echo site_url('LeaveController/fetch_leave_data/') ?>' + data[0];
            $('#approve_leave_id').val(data[0]);
        }
        //ajax
        $.ajax({
            url: me,
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $("#start_date").val(response.leave_data[0].start_date);
                $("#end_date").val(response.leave_data[0].end_date);
                $("#processed_by").val(response.leave_data[0].processed_by);
                $("#approve_leave_employee_name").val(response.leave_data[0].lastname + ", " + response.leave_data[0].firstname + " " + response.leave_data[0].middlename);
                $("#approve_employee_designation").val(response.leave_data[0].position);
                $("#approved_type_of_leave").val(response.leave_data[0].type_of_leave);

                if(response.leave_data[0].status == 'Regular'){
                    $("#approved_sl_credit").html(response.leave_data[0].sl_credit);
                    $("#approved_vl_credit").html(response.leave_data[0].vl_credit);
                }
                else{
                    $("#approved_sl_credit").html('0');
                    $("#approved_vl_credit").html('0');
                }

                console.log(response);
            }
        });

    });

    //Fetching Data in Deleting Leave (For Accept)
    $('#filedleave_table tbody').on('click', '.btn_delete_leave', function() {

        var data = filedleave_table.row($(this).parents('tr')).data();
        var rowdata = filedleave_table.row(this).data();

        if (data == undefined) {
            $('#delete_leave_id').val(rowdata[0]);
        } else if (rowdata == undefined) {
            $('#delete_leave_id').val(data[0]);
        }

    });

    $('#modal-approve-leave').submit(function(e) {
        e.preventDefault();

        var me = $(this);

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        $(':submit').attr('disabled', 'disabled');
        $('.loading-modal').modal();

        //ajax
        $.ajax({
            url: me.attr('action'),
            type: 'post',
            data: me.serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success == true) {
                    $(':submit').removeAttr('disabled', 'disabled');
                    $('.loading-modal').modal('hide');
                    toastr.success("Success! Filed Leave Approved.");
                    me[0].reset();
                    window.setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    $(':submit').removeAttr('disabled', 'disabled');
                    $('.loading-modal').modal('hide');
                    toastr.error(response.errors);

                }

            }
        });
    });

    $('#modal-delete-leave').submit(function(e) {
        e.preventDefault();

        var me = $(this);

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        $(':submit').attr('disabled', 'disabled');
        $('.loading-modal').modal();

        //ajax
        $.ajax({
            url: me.attr('action'),
            type: 'post',
            data: me.serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success == true) {
                    $(':submit').removeAttr('disabled', 'disabled');
                    $('.loading-modal').modal('hide');
                    toastr.success("Success! Filed Leave Deleted.");
                    me[0].reset();
                    window.setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    $(':submit').removeAttr('disabled', 'disabled');
                    $('.loading-modal').modal('hide');
                    toastr.error(response.errors);
                }
            }
        });
    });

    //Fetching Data in Filed Leave (For edit)
    $('#filedleave_table tbody').on('click', '.btn_edit_leave', function() {

        var data = filedleave_table.row($(this).parents('tr')).data();
        var rowdata = filedleave_table.row(this).data();

        

        if (data == undefined) {
            var me = '<?php echo site_url('LeaveController/fetch_leave_data/') ?>' + rowdata[0];
            $('#edit_leave_id').val(rowdata[0]);
            $('#edit_employee_name').val(rowdata[1]);
        } else if (rowdata == undefined) {
            var me = '<?php echo site_url('LeaveController/fetch_leave_data/') ?>' + data[0];
            $('#edit_leave_id').val(data[0]);
            $('#edit_employee_name').val(data[1]);
        }
        //ajax
        $.ajax({
            url: me,
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $("#edit_start_date").val(response.leave_data[0].start_date);
                $("#edit_end_date").val(response.leave_data[0].end_date);
                $("#edit_type_of_leave").val(response.leave_data[0].type_of_leave);
                $("#edit_reason").val(response.leave_data[0].reason);
                $("#edit_processed_by").val(response.leave_data[0].processed_by);
                $("#edit_approved_by").val(response.leave_data[0].approved_by);
                $("#edit_department").val(response.leave_data[0].department);


                // //disable start datepicker
                // $("#edit_start_date").datepicker();
                // $("#edit_start_date").datepicker("disable");

                // //disable end datepicker
                // $("#edit_end_date").datepicker();
                // $("#edit_end_date").datepicker("disable");

                console.log(response);

            }
        });

    });

    $('#modal-edit-leave').submit(function(e) {
        e.preventDefault();

        var me = $(this);

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        $(':submit').attr('disabled', 'disabled');
        $('.loading-modal').modal();

        //ajax
        $.ajax({
            url: me.attr('action'),
            type: 'post',
            data: me.serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success == true) {
                    $(':submit').removeAttr('disabled', 'disabled');
                    $('.loading-modal').modal('hide');
                    toastr.success("Success! Filed Leave Edited.");
                    me[0].reset();
                    window.setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    $(':submit').removeAttr('disabled', 'disabled');
                    $('.loading-modal').modal('hide');
                    toastr.error(response.errors);

                }

            }
        });
    });
</script>
</body>

</html>