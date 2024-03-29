<?php
defined('BASEPATH') or die('Access Denied');
?>

	<!-- Data Table for Item Master List -->
	<script>
		$(document).ready(function(){

			//Main
			var masterlist_table = $("#item_masterlist").DataTable({
		    	responsive: true,
		    	"processing": true,
		    	"serverSide": true,
	            "order":[],
	            "ajax":{
	                url: "<?php echo site_url('ItemsController/get_masterlist/'.$category) ?>",
	                type: "POST"
	            },
	            "columnDefs": [
	                {
	                   "targets": [8],
	                    "orderable": false, 
	                }
	            ]
		    });


			//click select edit for masterlist table
		    $('#item_masterlist tbody').on( 'click', '.btn_select', function () {
		    	var data = masterlist_table.row($(this).parents('tr')).data();
				var rowdata = masterlist_table.row(this).data();
				if (data == undefined) {
					var me = '<?php echo site_url('ItemsController/fetch_masterlist/') ?>'+rowdata[0];
					$(".item_code_edit").val(rowdata[0]);
				} else if (rowdata == undefined) {
					var me = '<?php echo site_url('ItemsController/fetch_masterlist/') ?>'+data[0];
					$(".item_code_edit").val(data[0]);
				}
			   //ajax
			 	$.ajax({
			 		url: me,
			 		type: 'get',
			 		dataType: 'json',
			 		success: function(response) {

			 			$(".item_name_edit").val(response.list_of_items[0].itemName);
						$(".item_brand_edit").val(response.list_of_items[0].item_brand);
						$(".item_size_edit").val(response.list_of_items[0].item_size);
			 			$(".item_type_edit").val(response.list_of_items[0].itemType);
			 			$(".original_price_edit").val(response.list_of_items[0].itemSupplierPrice);
			 			$(".selling_price_edit").val(response.list_of_items[0].itemPrice);
			 			$(".location_edit").val(response.list_of_items[0].location);
			 			$(".no_of_stocks_edit").val(response.list_of_items[0].stocks);
			 			$(".date_of_purchase_edit").val(response.list_of_items[0].date_of_purchase);
			 			$(".supplier_edit").val(response.list_of_items[0].supplier);
			 			$(".encoder_edit").val(response.list_of_items[0].encoder);
			 			
			 		}
			 	});
			} );

		    //Add Stock
		    $('#item_masterlist tbody').on( 'click', '.btn_addstock', function () {
		    	var data = masterlist_table.row($(this).parents('tr')).data();
				var rowdata = masterlist_table.row(this).data();

				if (data == undefined) {
					$("#AS_ItemCode").val(rowdata[0]);
				} else if (rowdata == undefined) {
					$("#AS_ItemCode").val(data[0]);

				}
			} );

			
		});
	</script>

	<!-- Form Add Item -->
	<script>
		//Form for Adding Item
		$('#form-register-item').submit(function(e) {
		 	e.preventDefault();
		 	
		 	var a = '<a href="<?php echo site_url("masterlistofitems") ?>"><u>Go to Items</u></a>';
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

		 				toastr.success("Added! " + a);
		 				me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });
	</script>

	<!-- AJAX FORMS -->
	<script>
		
		//Form for updating item
		$('#form-update-item').submit(function(e) {
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

		 				toastr.success("Updated! Please refresh this page.");
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

		//Form AddStocks
		$('#form-addStocks').submit(function(e) {
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

		 				toastr.success("Stocks Added! Please refresh this page.");
		 				$('.addstocks').modal('hide');
		 				$('#AS_Quantity').val("");
		 				me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

		//click pullout item
	    $('#form-pullout').submit(function(e) {
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

		 				toastr.success("Success! it is now for pending. Click to Refresh ");
		 				me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
	 	});

		//Get Search Pullout Item
		$('#form-item-search').submit(function(e) {
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

		 				$("#search-result").empty();
		 				$.each(response.data,function(index,value){
		 					$("#search-result").append(value);
		 				});

		 				$('.table-pullout tbody').on('click','.btn_pulloutget',function(){
	  	
				  			// get the current row
					         var currentRow=$(this).closest("tr");
					         var col1=currentRow.find("td:eq(1)").text(); // get current row 3rd TD\
					         $('#item_code_val').val(col1);
					         $('#pullout_customer_name').val($('.pullout_customer_name').val());
				  		});

		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				$("#search-result").empty();
			 			$("#search-result").append(response.data);
		 			}
		 		}
		 	});
		});

		//Form Insert Pullout
		$('#form-insert-pullout').submit(function(e) {
		 	e.preventDefault();
		 	var a = '<a href="<?php echo site_url("pending-pullouts") ?>"><u>View Here</u></a>';
		 	var me = $(this);

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
		 				toastr.success("Pullout Success "+a);
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

		//Form Less Pullout
		$('#form-less-pullout').submit(function(e) {
		 	e.preventDefault();
		 	var a = '<a href="<?php echo site_url("pending-pullouts") ?>"><u>Refresh!</u></a>';
		 	var me = $(this);

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

		 				toastr.success("Success! Please refresh this page."+a);
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

		//Form Return Pullouts
		$('#form-return-pullouts').submit(function(e) {
		 	e.preventDefault();
		 	
		 	// var a = '<a href="<?php //echo site_url("salesdispatch-table") ?>"><u>Go to Dispatch Table</u></a>';
		 	var me = $(this);
		 	//var succ = '';

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

		 				toastr.success("Success! Please Refresh this page.");
						 me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

		//Form Confirmed Request Delete
		$('#form-request-delete').submit(function(e) {
		 	e.preventDefault();
		 	
		 	// var a = '<a href="<?php //echo site_url("salesdispatch-table") ?>"><u>Go to Dispatch Table</u></a>';
		 	var me = $(this);
		 	//var succ = '';

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

		 				toastr.success("Success! Item was set for request to delete.");
						me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

		//Form Get Scan
		$('#form-getscan').submit(function(e) {
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

		 				toastr.success("Success! Item appended.");

						if ($('td.scan_code:contains("'+response.item.itemCode+'")').html() != undefined) {

							

							var itemVal = Number($('td.scan_code:contains("'+response.item.itemCode+'")').closest('tr').find('.scan_qty').html());
							var actualVal = Number($('#scan_qty').val());

							var updateVal = $('td.scan_code:contains("'+response.item.itemCode+'")').closest('tr').find('.scan_qty');

							var inputVal = $('td.scan_code:contains("'+response.item.itemCode+'")').closest('tr').find('.pullout_qty');

							updateVal.html(itemVal+actualVal);
							inputVal.val(itemVal+actualVal);

						} else {
							$('#scan-body').append('<tr>'+
							'<td class="scan_code">'+response.item.itemCode+'</td><input class="pullout_itemCode" name="pullout_itemCode[]" type="hidden" value="'+response.item.itemCode+'">'+
							'<td>'+response.item.itemName+'</td>'+
							'<td class="scan_qty">'+$('#scan_qty').val()+'</td><input class="pullout_qty" name="pullout_qty[]" type="hidden" value="'+$('#scan_qty').val()+'">'+
							'<td>'+response.item.itemPrice+'</td>'+
							'</tr>');
						}
						$('#scan_code').focus();
						
						$('#scan_cost').html((Number($('#scan_cost').html())+Number(response.item.itemPrice*Number($('#scan_qty').val()))).toFixed(2));
						me[0].reset();
		 			} else {
						$('#scan_code').val('');
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
						$('#scan_code').focus();
						
		 			}
		 		}
		 	});
		});

		//Form Confirm Scan
		$('#form-confirm-scan').submit(function(e) {
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
						toastr.success('Success! Double Check the details.');
						$('#sub_data').empty();
						$('#scan_total_price').empty();
						$('.data-form').empty();
						//me[0].reset();
						var total_val = 0;
						$.each(response.item_codes,function(key,value){
							$('#sub_data').append('<tr>'+
								'<td>'+value+'</td>'+
								'<td>'+response.item[key][0]+'</td>'+
								'<td>'+response.quantities[key]+'</td>'+
								'<td>'+response.item[key][1]+'</td>'+
								'<td>'+(Number(response.quantities[key])*Number(response.item[key][1])).toFixed(2)+'</td>'+
							'</tr>');
							total_val += (Number(response.quantities[key])*Number(response.item[key][1]));
							$('.data-form').append(
								'<input name="item_code[]" type="hidden" value="'+value+'">'+
								'<input name="quantity[]" type="hidden" value="'+response.quantities[key]+'">'
							);
						});
						$('.data-form').append(
								'<input name="customer" type="hidden" value="'+$('#scan_customer option:selected').val()+'">'
							);
						$('#scan_total_price').html(total_val.toFixed(2));
						$('#customer-name').html($('#scan_customer option:selected').text());
						$('#modal-confirm-details').modal();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.error(response.errors);
		 			}
		 		}
		 	});
		});

		//Form Submit Scan
		$('#form-submit-scan').submit(function(e) {
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
						toastr.success('Success! Items are on pending to pulloout. <u><a href="<?php echo site_url('pending-pullouts') ?>">View Here</a></u>');
						$('#sub_data').empty();
						$('#scan_total_price').empty();
						$('.data-form').empty();
						me[0].reset();

						$('#sub_data').append(
							'<tr>'+
								'<td colspan="5" class="text-bold text-center text-success">SUCCESS!!! ITEMS NOW IN PENDING</td>'+
							'</tr>'
						);

		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.error(response.errors);
		 			}
		 		}
		 	});
		});
		
	</script>

	<!-- Normal DataTables -->
	<script>
		var table_pendingpullout = $(".table-pendingpullout").DataTable({
			responsive: true
		});

		var table_confirmedpullout = $(".table-confirmedpullout").DataTable({
			responsive: true
		});

		var item_register_history = $("#item_register_history").DataTable({
	    	responsive: true
	    });

	    var item_delete_history = $("#item_delete_history").DataTable({
	    	responsive: true
	    });

	    var table_return_history = $('.table-returnhistory').DataTable({
	    	responsive: true
	    });

	    //Fetching Data in Table Pending Pullout
		$('.table-pendingpullout tbody').on('click','.get-pullout-less',function(){

			var data = table_pendingpullout.row($(this).parents('tr')).data();
			var rowdata = table_pendingpullout.row(this).data();

			if (data == undefined) {
				$('#less_item_code').val(rowdata[1]);
				$('#less_total_price').val(rowdata[9]);
				$('#less_pullout_id').val(rowdata[0]);
			} else if (rowdata == undefined) {
				$('#less_item_code').val(data[1]);
				$('#less_total_price').val(data[9]);
				$('#less_pullout_id').val(data[0]);
			}

		});
		//end

		//Fetching Data in Table Confirmed Pullout
		$('.table-confirmedpullout tbody').on('click','.btn-get-cpullout',function(){

			var data = table_confirmedpullout.row($(this).parents('tr')).data();
			var rowdata = table_confirmedpullout.row(this).data();

			if (data == undefined) {
				$('#cpullout_id').val(rowdata[0]);
				$('#cpullout_item_code').val(rowdata[3]);
			} else if (rowdata == undefined) {
				$('#cpullout_id').val(data[0]);
				$('#cpullout_item_code').val(data[3]);
			}

		});

		$('.table-confirmedpullout tbody').on('click','.btn-delete-cpullout',function(){

			var data = table_confirmedpullout.row($(this).parents('tr')).data();
			var rowdata = table_confirmedpullout.row(this).data();

			if (data == undefined) {
				$('#cpullout_delete_id').val(rowdata[0]);
			} else if (rowdata == undefined) {
				$('#cpullout_delete_id').val(data[0]);
			}

		});
		//end
	</script>

	<!-- Date Range Pickers -->
	<script>
		$('#dr_daterange').daterangepicker();

		$('#dr_daterange').on('apply.daterangepicker', function(ev, picker) {

			$('#dr_start_date').val(picker.startDate.format('YYYY-MM-DD'));
			$('#dr_end_date').val(picker.endDate.format('YYYY-MM-DD'));
		});
		
		$('#conpulledout_daterange').daterangepicker();

		$('#conpulledout_daterange').on('apply.daterangepicker', function(ev, picker) {

			$('#cpullout_start_date').val(picker.startDate.format('YYYY-MM-DD'));
			$('#cpullout_end_date').val(picker.endDate.format('YYYY-MM-DD'));
		});


		$('#cpullout_return_date').daterangepicker();

		$('#cpullout_return_date').on('apply.daterangepicker', function(ev, picker) {

			$('#rpullout_start_date').val(picker.startDate.format('YYYY-MM-DD'));
			$('#rpullout_end_date').val(picker.endDate.format('YYYY-MM-DD'));
		});
	</script>

	<script>
		$("#modal_scan").on('shown.bs.modal', function () {
			$('#itemCode').focus();
		});
	</script>

	<?php if ($this->uri->segment(1) == 'pulloutbyscan') { ?>
		<script>
			$('#scan_code').focus();
		</script>
	<?php } ?>
	
	
</body>
</html>
