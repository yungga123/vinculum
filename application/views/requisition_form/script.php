<?php 
defined('BASEPATH') or die('Access Denied');

$url = '';

if ($this->uri->segment(1) == 'requisition-pending') {
    $url = site_url('RequisitionFormController/fetch_pending_requisitions');
} elseif ($this->uri->segment(1) == 'requisition-accepted') {
    $url = site_url('RequisitionFormController/fetch_accepted_requisitions');
} elseif ($this->uri->segment(1) == 'requisition-filed') {
    $url = site_url('RequisitionFormController/fetch_filed_requisitions');
} elseif ($this->uri->segment(1) == 'requisition-discarded') {
    $url = site_url('RequisitionFormController/fetch_discarded_requisitions');
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
            newfield.find('select').val('');
            
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
                            toastr.success("Success! Item Request was deleted! The page will refresh.");
                            me[0].reset();
                            window.setTimeout(function() {
                                location.reload();
                            }, 2000);
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
                    $('#file_processed_by').val(rowdata[4]);
                    $('#file_approved_by').val(rowdata[5]);
                    $('#file_received_by').val(rowdata[6]);
                    $('#file_checked_by').val(rowdata[7]);
                } else if (rowdata == undefined) {
                    $('#req_form_id').val(data[0]);
                    $('#file_processed_by').val(data[4]);
                    $('#file_approved_by').val(data[5]);
                    $('#file_received_by').val(data[6]);
                    $('#file_checked_by').val(data[7]);
                }

            });

            //Fetching Data in Pending Requisition (For Delete)
            $('#table_pending_request tbody').on('click','.btn_req_del',function(){

                var data = table_pending_request.row($(this).parents('tr')).data();
                var rowdata = table_pending_request.row(this).data();

                if (data == undefined) {
                    $('#req_form_id_del').val(rowdata[0]);
                } else if (rowdata == undefined) {
                    $('#req_form_id_del').val(data[0]);
                }

            });

            //Fetching Data in Pending Requisition (For Viewing)
            $('#table_pending_request tbody').on('click','.btn_view',function(){

                var data = table_pending_request.row($(this).parents('tr')).data();
				var rowdata = table_pending_request.row(this).data();

				if (data == undefined) {
					var me = '<?php echo site_url('RequisitionFormController/get_req_items/') ?>'+rowdata[0];
				} else if (rowdata == undefined) {
					var me = '<?php echo site_url('RequisitionFormController/get_req_items/') ?>'+data[0];
                }

                $('#modal_loading').addClass('overlay d-flex justify-content-center align-items-center');
				$('#modal_loading').append('<i class="fas fa-2x fa-sync fa-spin"></i>');
                
                //ajax
                $.ajax({
                    url: me,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        $('#tbody-reqitems').empty();
                        $('#req_total_price').empty();
                        i = 1;
                        total_price = 0;

                        <?php if ($this->uri->segment(1) == 'requisition-pending'): $blank = "";?>
                            $.each(response.results_pending, function (key, value) {
                                total_cost = Number(response.results_pending[key].unit_cost) * Number(response.results_pending[key].qty);
                                    
                                $('#tbody-reqitems').append('<tr>' +
                                    '<td>' + i++ + '</td>' +
                                    '<td>' + response.results_pending[key].description + '</td>' +
                                    '<td>' + Number(response.results_pending[key].qty).toFixed(2) + '</td>' +
                                    '<td>' + response.results_pending[key].unit + '</td>' +
                                    '<td>' + Number(response.results_pending[key].unit_cost).toFixed(2) + '</td>' +
                                    '<td>' + Number(total_cost).toFixed(2) + '</td>' +
                                    '<td>' + response.results_pending[key].supplier + '</td>' +
                                    '<td>' + moment(response.results_pending[key].date_needed).format('MMM DD, YYYY') + '</td>' +
                                    '<td>' + response.results_pending[key].purpose + '</td>' +
                                '</tr>');
                                total_price = total_price+(response.results_pending[key].unit_cost*response.results_pending[key].qty);
                            });


                        <?php else: ?>
                            $.each(response.results, function (key, value) {
                                total_cost = Number(response.results[key].unit_cost) * Number(response.results[key].qty);

                                $('#tbody-reqitems').append('<tr>' +
                                    '<td>' + i++ + '</td>' +
                                    '<td>' + response.results[key].description + '</td>' +
                                    '<td>' + Number(response.results[key].qty).toFixed(2) + '</td>' +
                                    '<td>' + response.results[key].unit + '</td>' +
                                    '<td>' + Number(response.results[key].unit_cost).toFixed(2) + '</td>' +
                                    '<td>' + Number(total_cost).toFixed(2) + '</td>' +
                                    '<td>' + response.results[key].name + '</td>' +
                                    '<td>' + moment(response.results[key].date_needed).format('MMM DD, YYYY') + '</td>' +
                                    '<td>' + response.results[key].purpose + '</td>' +
                                '</tr>');
                                total_price = total_price+(response.results[key].unit_cost*response.results[key].qty);
                            });
                        <?php endif ?>
                        


                        $('#req_total_price').html(Number(total_price).toFixed(2));

                        $('#modal_loading').removeClass('overlay d-flex justify-content-center align-items-center');
						$('#modal_loading').empty();
                    }
                });
            });
        });
    </script>

</body>
</html>