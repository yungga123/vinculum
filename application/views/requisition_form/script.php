<?php 
defined('BASEPATH') or die('Access Denied');

$url = '';

if ($this->uri->segment(1) == 'requisition-pending') {
    $url = site_url('RequisitionFormController/fetch_pending_requisitions');
} elseif ($this->uri->segment(1) == 'requisition-accepted') {
    $url = site_url('RequisitionFormController/fetch_accepted_requisitions');
} elseif ($this->uri->segment(1) == 'requisition-filed') {
    $url = site_url('RequisitionFormController/fetch_filed_requisitions');
}

?>

    <script>

        $(document).ready(function() {

            //Datatable for Requisition Form
            var table_pending_request = $("#table_pending_request").DataTable({
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
                ]
            });
            //end of datatable

            $('.add-item-btn').click(function(){

            var newfield = $('.add-item:last').clone();
            newfield.find('input').val('');

            // Add after last <div class='input-form'>
            $(newfield).insertAfter(".add-item:last");
            });


            $(".delete-item-btn").click(function(){

				count = $('.add-item').length;
				
				if (count !== 1) {
					$('.add-item').last().remove();
				} else {
					return 0;
				}
            });
            
            //Form Add item Request
            $('#form-additem-request').submit(function(e) {
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

                $(':submit').attr('disabled','disabled');
                $('.loading-modal').modal();

                //ajax
                $.ajax({
                    url: me.attr('action'),
                    type: 'post',
                    data: me.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            $(':submit').removeAttr('disabled','disabled');
                            $('.loading-modal').modal('hide');
                            toastr.success("Success! Item Request was added!");
                            me[0].reset();
                        } else {
                            $(':submit').removeAttr('disabled','disabled');
                            $('.loading-modal').modal('hide');
                            toastr.error(response.errors);
                            
                        }

                    }
                });
            });

            //Form Delete item Request
            $('#form-delete-request').submit(function(e) {
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

                $(':submit').attr('disabled','disabled');
                $('.loading-modal').modal();

                //ajax
                $.ajax({
                    url: me.attr('action'),
                    type: 'post',
                    data: me.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            $(':submit').removeAttr('disabled','disabled');
                            $('.loading-modal').modal('hide');
                            toastr.success("Success! Item Request was deleted!");
                            me[0].reset();
                        } else {
                            $(':submit').removeAttr('disabled','disabled');
                            $('.loading-modal').modal('hide');
                            toastr.error(response.errors);
                            
                        }

                    }
                });
            });

            //Form Update item Request
            $('#form-updateitem-request').submit(function(e) {
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

                $(':submit').attr('disabled','disabled');
                $('.loading-modal').modal();

                //ajax
                $.ajax({
                    url: me.attr('action'),
                    type: 'post',
                    data: me.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            $(':submit').removeAttr('disabled','disabled');
                            $('.loading-modal').modal('hide');
                            toastr.success("Success! Item Request was updated!");
                            //me[0].reset();
                        } else {
                            $(':submit').removeAttr('disabled','disabled');
                            $('.loading-modal').modal('hide');
                            toastr.error(response.errors);
                            
                        }

                    }
                });
            });

            //Form Accept Item Requests
            $('#form-accept-req').submit(function(e) {
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

                $(':submit').attr('disabled','disabled');
                $('.loading-modal').modal();

                //ajax
                $.ajax({
                    url: me.attr('action'),
                    type: 'post',
                    data: me.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            $(':submit').removeAttr('disabled','disabled');
                            $('.loading-modal').modal('hide');
                            toastr.success("Success! Item Request was accepted! The page will be refreshed.");
                            me[0].reset();

                            window.setTimeout(function() {
                                window.location = '<?php echo site_url('requisition-pending') ?>';
                            }, 2000);
                        } else {
                            $(':submit').removeAttr('disabled','disabled');
                            $('.loading-modal').modal('hide');
                            toastr.error(response.errors);
                            
                        }

                    }
                });
            });

            //Form File Item Requests
            $('#form-file-req').submit(function(e) {
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

                $(':submit').attr('disabled','disabled');
                $('.loading-modal').modal();

                //ajax
                $.ajax({
                    url: me.attr('action'),
                    type: 'post',
                    data: me.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            $(':submit').removeAttr('disabled','disabled');
                            $('.loading-modal').modal('hide');
                            toastr.success("Success! Item Request was filed! The page will be refreshed.");
                            me[0].reset();

                            window.setTimeout(function() {
                                window.location = '<?php echo site_url('requisition-accepted') ?>';
                            }, 2000);
                        } else {
                            $(':submit').removeAttr('disabled','disabled');
                            $('.loading-modal').modal('hide');
                            toastr.error(response.errors);
                            
                        }

                    }
                });
            });

            //Fetching Data in Pending Requisition (For Accept)
            $('#table_pending_request tbody').on('click','.btn_req_accept',function(){

                var data = table_pending_request.row($(this).parents('tr')).data();
                var rowdata = table_pending_request.row(this).data();

                if (data == undefined) {
                    $('#req_form_id').val(rowdata[0]);
                } else if (rowdata == undefined) {
                    $('#req_form_id').val(data[0]);
                }

            });

            //Fetching Data in Pending Requisition (For File)
            $('#table_pending_request tbody').on('click','.btn_req_filed',function(){

                var data = table_pending_request.row($(this).parents('tr')).data();
                var rowdata = table_pending_request.row(this).data();

                if (data == undefined) {
                    $('#req_form_id').val(rowdata[0]);
                } else if (rowdata == undefined) {
                    $('#req_form_id').val(data[0]);
                }

            });

            //Fetching Data in Pending Requisition (For File)
            $('#table_pending_request tbody').on('click','.btn_req_del',function(){

                var data = table_pending_request.row($(this).parents('tr')).data();
                var rowdata = table_pending_request.row(this).data();

                if (data == undefined) {
                    $('#req_form_id_del').val(rowdata[0]);
                } else if (rowdata == undefined) {
                    $('#req_form_id_del').val(data[0]);
                }

            });
        });
    </script>

</body>
</html>