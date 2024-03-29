<?php
defined('BASEPATH') or die('Access Denied');

date_default_timezone_set('Asia/Manila');

if ($this->uri->segment(1) == 'joborder-list') {
    if ($decision == 'accepted') {
        $url = site_url('JobOrderController/fetch_joborder_accepted');
    } elseif($decision == 'filed') {
        $url = site_url('JobOrderController/fetch_joborder_filed');
    } else {
        $url = site_url('JobOrderController/fetch_joborder_pending');
    }
} else {
    $url = '';
}

?>

<!-- Datatables -->
<script>
    //Datatable for Job Order
    var payroll_table = $("#joborder_table").DataTable({
        responsive: true,
        "processing": true,
        "serverSide": true,
        "order":[],
        "ajax":{
            url: "<?php echo $url ?>",
            type: "POST"
        },
        "columnDefs": [
            {
                "targets": [],
                "orderable": false, 
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(1).addClass('text-center'); // 6 is index of column
        }
    });
    //end of datatable

    //Fetching Data in Table Job Order
    $('#joborder_table tbody').on('click','.btn_discarded',function(){

        var data = payroll_table.row($(this).parents('tr')).data();
        var rowdata = payroll_table.row(this).data();

        if (data == undefined) {
            $('#job_order_id').val(rowdata[0]);
        } else if (rowdata == undefined) {
            $('#job_order_id').val(data[0]);
        }

    });

    $('#joborder_table tbody').on('click','.btn_filejo',function(){

        var data = payroll_table.row($(this).parents('tr')).data();
        var rowdata = payroll_table.row(this).data();

        if (data == undefined) {
            $('#job_filejo_id').val(rowdata[0]);
        } else if (rowdata == undefined) {
            $('#job_filejo_id').val(data[0]);
        }

    });

    $('#joborder_table tbody').on('click','.btn_reschedule',function(){

        var data = payroll_table.row($(this).parents('tr')).data();
        var rowdata = payroll_table.row(this).data();

        if (data == undefined) {
            $('#job_reschedule_id').val(rowdata[0]);
        } else if (rowdata == undefined) {
            $('#job_reschedule_id').val(data[0]);
        }

    });


    //end
</script>

<script type="text/javascript">
    $(document).on("click",".btn_accepted",function() {
        $('#status').html('ACCEPTED');
        $('#status').addClass('badge-success');
        $('#status').removeClass('badge-danger');
        $('#decision').val('Accepted');
        $('.form-commdate').empty();
        $('.form-commdate').append('<label for="committed_schedule">Please input committed schedule</label>');
        $('.form-commdate').append('<input type="date" name="committed_schedule" id="committed_schedule" class="form-control">');
        $('.form-commdate').append('<p class="mt-4 text-bold text-danger">Accepted Requisitions will also be added to schedules based on selected date and Client Name.</p>');
        $('.form-commdate').append('<div class="form-group">'
            +       '<label for="pic_assigned">Job Order Incharge</label>'
            +       '<select class="form-control" name="pic_assigned" id="pic_assigned">'
            +           '<option value="">---Please Select---</option>'
            +           '<?php foreach($joborder_scheduled_data as $row): ?>'
            +           '<option value="<?php echo $row->id ?>">' + '<?php echo $row->lastname.", ".$row->firstname." ".$row->middlename ?>' + '</option>'
            +           '<?php endforeach ?>'
            +       '</select>'
            +   '</div>');
            
            $('.form-commdate').append('<div class="form-group">'
            +       '<label for="schedule_type">Schedule Type</label>'
            +       '<select class="form-control" name="schedule_type" id="schedule_type">'
            +           '<option value="">---Please Select---</option>'
            +           '<option value="installation">Installation</option>'
            +           '<option value="service">Service</option>'
            +       '</select>'
            +   '</div>');
        $('.form-commdate').append('<input type="hidden" name="client_name" id="client_name">');
        $('.form-commdate').append('<input type="hidden" name="type_of_project" id="type_of_project">');
        $('.form-commdate').append('<textarea style="display: none;" name="description" id="description"></textarea>');

        var data = payroll_table.row($(this).parents('tr')).data();
        var rowdata = payroll_table.row(this).data();

        if (data == undefined) {
            $('#job_order_id').val(rowdata[0]);
            $('#client_name').val(rowdata[3]);
            $('#description').val(rowdata[7]);
            $('#type_of_project').val(rowdata[7]);
        } else if (rowdata == undefined) {
            $('#job_order_id').val(data[0]);
            $('#client_name').val(data[3]);
            $('#description').val(data[7]);
            $('#type_of_project').val(rowdata[7]);
        }
        
    });

    $(document).on("click",".btn_discarded",function() {
        $('#status').html('DISCARDED');
        $('#status').addClass('badge-danger');
        $('#status').removeClass('badge-success');
        $('#decision').val('Discarded');
        $('.form-commdate').empty();
        $('.form-commdate').append('<input type="hidden" name="committed_schedule" id="committed_schedule" value="<?php echo date('Y-m-d') ?>" class="form-control">');
        
    });

    $(document).on("click",".btn_filejo",function() {
        $('#decision_filejo').val('Filed');

    });

    $(document).on("click",".btn_reschedule",function() {
        $('#decision_reschedule').val('');

    });

    //Form Job Order (Existing)
    $('#form-addexisting-joborder').submit(function(e) {
        e.preventDefault();
        var a = '<a href="#"><u>View Here</u></a>';
        var me = $(this);
        var succ = '';

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
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

                    toastr.success("Job Order Successfully Requested!");
                    me[0].reset();

                    setTimeout(() => {
                        $('#success_joborder').modal();
                    }, 500);
                } else {
                    $(':submit').removeAttr('disabled', 'disabled');
                    $('.loading-modal').modal('hide');

                    toastr.error(response.errors);
                }
            }
        });
    });
    
    //Form Job Order (Update Decision)
    $('#form_updatedecision').submit(function(e) {
        e.preventDefault();
        var me = $(this);
        var succ = '';

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
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

                    toastr.success("Success! This page will be refreshed!");
                    me[0].reset();

                    setTimeout(() => {
                        window.location = "<?php echo site_url('joborder-list/pending') ?>";
                    }, 1000);

                } else {

                    $(':submit').removeAttr('disabled', 'disabled');
                    $('.loading-modal').modal('hide');

                    toastr.error(response.errors);
                }
            }
        });
    });

    //Form Job Order (File JO)
    $('#form_filejo').submit(function(e) {
        e.preventDefault();
        var me = $(this);
        var succ = '';

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
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

                    toastr.success("Success! This page will be refreshed!");
                    me[0].reset();

                    setTimeout(() => {
                        window.location = "<?php echo site_url('joborder-list/accepted') ?>";
                    }, 1000);
                } else {
                    $(':submit').removeAttr('disabled', 'disabled');
                    $('.loading-modal').modal('hide');

                    toastr.error(response.errors);
                }
            }
        });
    });

    //Form Job Order (Reschedule JO)
    $('#form_reschedule').submit(function(e) {
        e.preventDefault();
        var me = $(this);
        var succ = '';

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
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

                    toastr.success("Success! This page will be refreshed!");
                    me[0].reset();

                    setTimeout(() => {
                        window.location = "<?php echo site_url('joborder-list/accepted') ?>";
                    }, 1000);
                } else {
                    $(':submit').removeAttr('disabled', 'disabled');
                    $('.loading-modal').modal('hide');

                    toastr.error(response.errors);
                }
            }
        });
    });

    //Form Job Order (Existing)
    $('#form-editpending-joborder').submit(function(e) {
        e.preventDefault();
        var me = $(this);
        var succ = '';

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
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

                    toastr.success("Job Order Successfully Updated!");
                    me[0].reset();
                    window.setTimeout(function() {
                                window.location = '<?php echo site_url('joborder-list/pending') ?>';
                            }, 1000);
                } else {
                    $(':submit').removeAttr('disabled', 'disabled');
                    $('.loading-modal').modal('hide');

                    toastr.error(response.errors);
                }
            }
        });
    });

    $('#form-editaccepted-joborder').submit(function(e) {
        e.preventDefault();
        var me = $(this);
        var succ = '';

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
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

                    toastr.success("Job Order Successfully Updated!");
                    me[0].reset();
                    window.setTimeout(function() {
                                window.location = '<?php echo site_url('joborder-list/accepted') ?>';
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