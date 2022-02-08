<?php
defined('BASEPATH') or die('Access Denied');
?>

	<!-- Dispatch Forms Table -->
	<script>
		//Forms Table
	  	$(document).ready( function () {
		    var dispatchTable = $("#dispatchTable").DataTable({
		    	responsive: true,
		    	"processing": true,
		    	"serverSide": true,
	            "order":[],
	            "ajax":{
	                url: "<?php echo site_url('DispatchFormController/fetch_dispatchforms') ?>",
	                type: "POST"
	            },
	            "columnDefs": [
	                {
	                   "targets": [8],
	                    "orderable": false,
	                }
	            ]
		    });

		    //click select edit
		    $('#dispatchTable tbody').on( 'click', '.btn_select', function () {
		    	var data = dispatchTable.row($(this).parents('tr')).data();
				var rowdata = dispatchTable.row(this).data();

				if (data == undefined) {
					var me = '<?php echo site_url('DispatchFormController/fetch_dispatch_details/') ?>'+rowdata[0];
					$(".Dispatch_ID").val(rowdata[0]);
				} else if (rowdata == undefined) {
					var me = '<?php echo site_url('DispatchFormController/fetch_dispatch_details/') ?>'+data[0];
					$(".Dispatch_ID").val(data[0]);

				}
			   //ajax
			 	$.ajax({
			 		url: me,
			 		type: 'get',
			 		dataType: 'json',
			 		success: function(response) {
			 			$(".CustomerName_Edit").val(response.dispatch_form_edit[0].CustomerName);
			 			$(".DispatchDate_Edit").val(response.dispatch_form_edit[0].DispatchDate);
			 			$(".TimeIn_Edit").val(response.dispatch_form_edit[0].TimeIn);
			 			$(".TimeOut_Edit").val(response.dispatch_form_edit[0].TimeOut);
			 			$(".Concern_Edit").val(response.dispatch_form_edit[0].Remarks);
			 			$(".AssignedTechnicians1_Edit").val(response.dispatch_form_edit[0].AssignedTechnicians1);
			 			$(".AssignedTechnicians2_Edit").val(response.dispatch_form_edit[0].AssignedTechnicians2);
			 			$(".AssignedTechnicians3_Edit").val(response.dispatch_form_edit[0].AssignedTechnicians3);
			 			$(".AssignedTechnicians4_Edit").val(response.dispatch_form_edit[0].AssignedTechnicians4);
			 			$(".AssignedTechnicians5_Edit").val(response.dispatch_form_edit[0].AssignedTechnicians5);
			 			$(".AssignedTechnicians6_Edit").val(response.dispatch_form_edit[0].AssignedTechnicians6);
			 			$(".AssignedTechnicians7_Edit").val(response.dispatch_form_edit[0].AssignedTechnicians7);
			 			$(".AssignedTechnicians8_Edit").val(response.dispatch_form_edit[0].AssignedTechnicians8);
			 			$(".WithPermit_Edit").val(response.dispatch_form_edit[0].WithPermit);
			 			$(".DispatchOut_Edit").val(response.dispatch_form_edit[0].dispatch_out);
			 			$(".SRNumber_Edit").val(response.dispatch_form_edit[0].sr_number);
			 			$(".Remarks_Edit").val(response.dispatch_form_edit[0].remarks2);
			 			
			 			if (response.dispatch_form_edit[0].Installation =="1"){
			 				$(".TypeOfService_Edit").val("Installation");
			 			}
			 			else if (response.dispatch_form_edit[0].Warranty =="1"){
			 				$(".TypeOfService_Edit").val("Warranty");	
			 			}
			 			else  if (response.dispatch_form_edit[0].RepairOrService =="1"){
			 				$(".TypeOfService_Edit").val("Service");
			 			}
						 else  if (response.dispatch_form_edit[0].back_job =="1"){
			 				$(".TypeOfService_Edit").val("back_job");
			 			}
			 		}
			 	});
			} );

		});
	</script>


   	<!-- Sales Dispatch Table-->
	<script>
		var salesdispatchTable = $('#salesdispatchTable').DataTable({
            responsive: true,
            "processing": true,
            "serverSide": true,
            "order":[],
            "ajax":{
                url: "<?php echo site_url('SalesDispatchController/fetch_salesdispatchforms') ?>",
                type: "POST"
            },
            "columnDefs": [
                {
                   "targets": [5,6,7],
                    "orderable": false, 
                }
            ]
        });
         $('#salesdispatchTable tbody').on( 'click', '.btn_select', function () {
		    	var data = salesdispatchTable.row($(this).parents('tr')).data();
				var rowdata = salesdispatchTable.row(this).data();

				if (data == undefined) {
					var me = '<?php echo site_url('SalesDispatchController/update_sales_dispatch/') ?>'+rowdata[0];
					$(".sales_dispatchID_edit").val(rowdata[0]);
				} else if (rowdata == undefined) {
					var me = '<?php echo site_url('SalesDispatchController/update_sales_dispatch/') ?>'+data[0];
					$(".sales_dispatchID_edit").val(data[0]);

				}
			   //ajax
			 	$.ajax({
			 		url: me,
			 		type: 'get',
			 		dataType: 'json',
			 		success: function(response) {
			 			$(".dispatch_date_edit").val(response.dispatch_data[0].dispatch_date);
			 			$(".dispatch_time_edit").val(response.dispatch_data[0].dispatch_time);
			 			$(".assigned_sales_edit").val(response.dispatch_data[0].assigned_sales);
			 			$(".address_edit").val(response.dispatch_data[0].address);
			 			$(".customer_1_edit").val(response.dispatch_data[0].customer_1);
			 			$(".contact_1_edit").val(response.dispatch_data[0].contact_1);
			 			$(".purpose_1_edit").val(response.dispatch_data[0].purpose_1);
			 			$(".time_in_1_edit").val(response.dispatch_data[0].time_in_1);
			 			$(".time_out_1_edit").val(response.dispatch_data[0].time_out_1);
			 			$(".customer_2_edit").val(response.dispatch_data[0].customer_2);
			 			$(".contact_2_edit").val(response.dispatch_data[0].contact_2);
			 			$(".purpose_2_edit").val(response.dispatch_data[0].purpose_2);
			 			$(".time_in_2_edit").val(response.dispatch_data[0].time_in_2);
			 			$(".time_out_2_edit").val(response.dispatch_data[0].time_out_2);
			 			$(".customer_3_edit").val(response.dispatch_data[0].customer_3);
			 			$(".contact_3_edit").val(response.dispatch_data[0].contact_3);
			 			$(".purpose_3_edit").val(response.dispatch_data[0].purpose_3);
			 			$(".time_in_3_edit").val(response.dispatch_data[0].time_in_3);
			 			$(".time_out_3_edit").val(response.dispatch_data[0].time_out_3);
			 			$(".customer_4_edit").val(response.dispatch_data[0].customer_4);
			 			$(".contact_4_edit").val(response.dispatch_data[0].contact_4);
			 			$(".purpose_4_edit").val(response.dispatch_data[0].purpose_4);
			 			$(".time_in_4_edit").val(response.dispatch_data[0].time_in_4);
			 			$(".time_out_4_edit").val(response.dispatch_data[0].time_out_4);
			 			
			 		}
			 	});
			} );
	</script>

	<!-- Forms AJAX (Sales Dispatch) -->
	<script>
		<?php if ($this->uri->segment(1) == 'sales-dispatch'): ?>
		//Form Sales Dispatch
		$('#form-salesdispatch').submit(function(e) {
		 	e.preventDefault();
		 	
		 	var a = '<a href="<?php echo site_url("salesdispatch-table") ?>"><u>Go to Dispatch Table</u></a>';
		 	var me = $(this);
		 	var succ = '';

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

		 				toastr.success("Dispatch Added! " + a);
						 me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });
		<?php endif ?>

		<?php if ($this->uri->segment(1) == 'salesdispatch-table'): ?>
		//Sales Dispatch Update
		$('#form_updatesalesdispatch').submit(function(e) {
		 	e.preventDefault();
		 	
		 
		 	var me = $(this);
		 	var succ = '';

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

		 				toastr.success("Successfully Updated! Please Refresh");
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

	<!-- Toasters for Dispatch Table -->
	<script>
		//New Dispatch
		$('#New-form-dispatch').submit(function(e) {
		 	e.preventDefault();
		 	
		 	var a = '<a href="<?php echo site_url("dispatchtable") ?>"><u>Go to Dispatch</u></a>';
		 	var me = $(this);
		 	var succ = '';

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

		 				toastr.success("Dispatch Added! " + a);
		 				me[0].reset();
		 			} else {
						$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });

		//update Dispatch
		$('#update-form-dispatch').submit(function(e) {
		 	e.preventDefault();
		 	
		 	var a = '<a href="<?php echo site_url("dispatchtable") ?>"><u>Go</u></a>'
		 	var me = $(this);
		 	var succ = '';

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

		 				toastr.success("Updated! Please refresh this page. " + a );

		 			} else {
						$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
						
		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });
	</script>
</body>
</html>