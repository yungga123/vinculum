<?php
defined('BASEPATH') or die('Access Denied');

if ($this->uri->segment(2) == 'pending') {
    $url = site_url('LeaveController/fetch_pending');
} else {
    $url = site_url('LeaveController/fetch_approved');
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
                $("#approve_start_date").val(response.leave_data[0].start_date);
                $("#approve_end_date").val(response.leave_data[0].end_date);
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
                    }, 2000);
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
                    }, 2000);
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