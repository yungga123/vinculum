<?php 
defined('BASEPATH') or die('Access Denied');
?>


	<script>
		// Dispatch Forms Table	
		$(document).ready( function(){
			//Datatable for Sales Quotation Table
		    var salesquotation_table  = $("#salesquotation_table").DataTable({
		    	responsive: true,
		    	"processing": true,
		    	"serverSide": true,
	            "order":[],
	            "ajax":{
	                url: "<?php echo site_url('SalesQuotationController/get_sales_quotation') ?>",
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

		    //Form Edit Sales Quotation
		<?php if ($this->uri->segment(1) == 'sales_quotation_update'): ?>
		
		$('#form-update-salesquotation').submit(function(e) {
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
		 				toastr.success("Success! Sales Quotation was updated!");
		 				window.location = '<?php echo site_url('sales_quotation_list') ?>';
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.error(response.errors);
		 				
		 			}

		 		}
		 	});
		 });
		
		<?php endif ?>

	  	});

	  	// Add Item Button
		$('.add-item-btn').click(function(){

					var newfield = $('.add-item:last').clone();
					newfield.find('input').val('');
					newfield.find('textarea').val('');
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

		<?php if ($this->uri->segment(1) == 'makequotation'): ?>

		//Form Add Sales Quotation
		$('#form-add-salesquotation').submit(function(e) {
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
		 				toastr.success("Success! Sales Quotation was added!");
						me[0].reset();
						window.location = '<?php echo site_url('sales_quotation_list') ?>';
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.error(response.errors);
		 				
		 			}

		 		}
		 	});
		 });	
		<?php endif ?>

		<?php if ($this->uri->segment(1) == 'sales_quotation_update'): ?>
		//Form Delete Project Report
		$('#form-del-salesquotation').submit(function(e) {
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
		 				toastr.success("Success! Sales Quotation was deleted! Refreshing in 5 seconds.");
		 				me[0].reset();
		 				window.setTimeout(function() {
						    window.location = '<?php echo site_url('sales_quotation_list') ?>';
						}, 5000);
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.error(response.errors);
		 			}
		 		}
		 	});
		 });		
		<?php endif ?>

	</script>
	
		
</body>
</html>