<?php 
defined('BASEPATH') or die('Access Denied');
?>

<script>
		// Dispatch Forms Table	
		$(document).ready( function(){
            //Datatable for Vendor List
		    var vendor_table_data  = $("#vendor_table").DataTable({
		    	responsive: true,
		    	"processing": true,
		    	"serverSide": true,
	            "order":[],
	            "ajax":{ 
	                url: "<?php echo site_url('VendorController/get_vendor') ?>",
	                type: "POST"
	           },
	            "columnDefs": [
	                {
	                   "targets": [8],
	                    "orderable": false, 
	                }
	            ]
		    });
		    //end of datatable

			//Fetching Data in Pending Requisition (For Viewing)
		$('#vendor_table tbody').on('click','.btn_view',function(){

			var data = vendor_table_data.row($(this).parents('tr')).data();
			var rowdata = vendor_table_data.row(this).data();

			if (data == undefined) {
				var me = '<?php echo site_url('VendorController/get_vendor_brand/') ?>'+rowdata[0];
			} else if (rowdata == undefined) {
				var me = '<?php echo site_url('VendorController/get_vendor_brand/') ?>'+data[0];
			}

			$('#modal_loading').addClass('overlay d-flex justify-content-center align-items-center');
			$('#modal_loading').append('<i class="fas fa-2x fa-sync fa-spin"></i>');

			//ajax
			$.ajax({
				url: me,
				type: 'get',
				dataType: 'json',
				success: function(response) {
					$('#tbody-brand').empty();
					i = 1;
					$.each(response.results, function (key, value) {
						var link = '<?php site_url('VendorController/Vendor_Update/') ?>'

						$('#tbody-brand').append('<tr>' +
							'<td>' + i++ + '</td>' +
							'<td>' + response.results[key].brand_name + '</td>' +
							'<td>' + response.results[key].solution + '</td>' +
							'<td>' + response.results[key].classification_level + '</td>' +
							'<td>' + response.results[key].ranking + '</td>' +
						'</tr>');
						
					});

					$('#modal_loading').removeClass('overlay d-flex justify-content-center align-items-center');
					$('#modal_loading').empty();
				}
				});
		});

			 //Fetching Data in Pending Requisition (For Delete)
			 $('#vendor_table tbody').on('click','.btn_vendor_del',function(){

				var data = vendor_table_data.row($(this).parents('tr')).data();
				var rowdata = vendor_table_data.row(this).data();

				if (data == undefined) {
					$('#vendor_id_del').val(rowdata[0]);
				} else if (rowdata == undefined) {
					$('#vendor_id_del').val(data[0]);
				}

				});

    });

		

		

		//Modal Add Vendor
		$('#modal-add-vendor').submit(function(e) {
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
		 				toastr.success("Vendor Added!");
						 me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

		//Modal Update Vendor
		$('#modal-update-vendor').submit(function(e) {
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
		 				toastr.success("Vendor Updated!");
						 me[0].reset();
						 window.setTimeout(function() {
                                window.location = '<?php echo site_url('vendor-database') ?>';
                            }, 1000);
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

		//Modal Delete Vendor
		$('#modal-delete-vendor').submit(function(e) {
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
		 				toastr.success("Vendor Deleted!");
						 me[0].reset();
						 window.setTimeout(function() {
                                window.location = '<?php echo site_url('vendor-database') ?>';
                            }, 1000);
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

			// Add Item Button
			$('.add-brand-btn').click(function(){

				var newfield = $('.add-brand:last').clone();
				newfield.find('input').val('');
				newfield.find('select').val('');
				// Add after last <div class='input-form'>
				$(newfield).insertAfter(".add-brand:last");
				});


			$(".delete-brand-btn").click(function(){

				count = $('.add-brand').length;

				if (count !== 1) {
				$('.add-brand').last().remove();
				} else {
				return 0;
				}
			});
</script>
