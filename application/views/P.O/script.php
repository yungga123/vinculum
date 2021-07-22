<?php 
defined('BASEPATH') or die('Access Denied');
?>

<script>

$(document).ready(function() {
    //Datatable for Requisition Form
    var table_PO_list = $("#PO_list").DataTable({
                responsive: true,
                "processing": true,
                "serverSide": true,
                "order":[],
                "ajax":{
                    url: "<?php echo site_url('POController/get_generated_po_list'); ?>",
                    type: "POST"
                },
                "columnDefs": [
                    {
                        "targets": [],
                        "orderable": false, 
                    }
                ]
            });

            //Fetching Data in Requisition Items (For Viewing)
            $('#PO_list tbody').on('click','.btn_view',function(){

                var data = table_PO_list.row($(this).parents('tr')).data();
                var rowdata = table_PO_list.row(this).data();

                if (data == undefined) {
                    var me = '<?php echo site_url('POController/get_po_items/') ?>'+rowdata[0];
                } else if (rowdata == undefined) {
                    var me = '<?php echo site_url('POController/get_po_items/') ?>'+data[0];
                }

                $('#modal_loading').addClass('overlay d-flex justify-content-center align-items-center');
                $('#modal_loading').append('<i class="fas fa-2x fa-sync fa-spin"></i>');

                //ajax
                $.ajax({
                    url: me,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        $('#tbody-items').empty();
                        $('#req_total_price').empty();
                        total_price = 0;
                        i = 1;
                        $.each(response.results, function (key, value) {
                            total_cost = Number(response.results[key].unit_cost) * Number(response.results[key].qty);

                            $('#tbody-items').append('<tr>' +
                                '<td>' + i++ + '</td>' +
                                '<td>' + response.results[key].description + '</td>' +
                                '<td>' + Number(response.results[key].qty).toFixed(2) + '</td>' +
                                '<td>' + response.results[key].unit + '</td>' +
                                '<td>' + Number(response.results[key].unit_cost).toFixed(2) + '</td>' +
                                '<td>' + Number(total_cost).toFixed(2) + '</td>' +
                                '<td>' + moment(response.results[key].date_needed).format('MMM DD, YYYY') + '</td>' +
                                '<td>' + response.results[key].purpose + '</td>' +
                            '</tr>');
                            
                            total_price = total_price+(response.results[key].unit_cost*response.results[key].qty);
                        });
                        
                        $('#req_total_price').html(Number(total_price).toFixed(2));

                        $('#modal_loading').removeClass('overlay d-flex justify-content-center align-items-center');
                        $('#modal_loading').empty();
                    }
                });
            });

             //Form Accept Item Requests
             $('#form-accept-generatepo-req').submit(function(e) {
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
                            toastr.success("Success! Purchase of Order Generated.");
                            me[0].reset();

                            window.setTimeout(function() {
                                window.location = '<?php echo site_url('generated-po-list') ?>';
                            }, 1000);
                        } else {
                            $(':submit').removeAttr('disabled','disabled');
                            $('.loading-modal').modal('hide');
                            toastr.error(response.errors);
                            
                        }

                    }
                });
            });

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

                //Form Update item Request
            $('#form-updateitem-po').submit(function(e) {
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
                            toastr.success("Success! PO Items was updated!");
                            window.location = '<?php echo site_url('generated-po-list') ?>';
                            //me[0].reset();
                        } else {
                            $(':submit').removeAttr('disabled','disabled');
                            $('.loading-modal').modal('hide');
                            toastr.error(response.errors);
                            
                        }

                    }
                });
            });
         //Fetching Data in Pending Requisition (For Delete)
		$('#PO_list tbody').on('click','.btn_po_del',function(){

            var data = table_PO_list.row($(this).parents('tr')).data();
            var rowdata = table_PO_list.row(this).data();

            if (data == undefined) {
                $('#po_id_del').val(rowdata[0]);
            } else if (rowdata == undefined) {
                $('#po_id_del').val(data[0]);
            }

        });

        
		//Modal Delete PO
		$('#modal-po-vendor').submit(function(e) {
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
		 				toastr.success("PO Deleted!");
						 me[0].reset();
						 window.setTimeout(function() {
                                window.location = '<?php echo site_url('generated-po-list') ?>';
                            }, 1000);
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

        

    });

</script>

</body>
</html>