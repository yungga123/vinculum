<?php
defined('BASEPATH') or exit('No direct script access allowed.');
?>

	<!-- Data Table for Tools -->
	<script>
	  	$(document).ready( function () {

			//ClientSide Datatable for Tools Pullout
			var tools_pullout = $("#tools_pullout").DataTable({
				responsive: true,
				"oLanguage": {
        			"sEmptyTable": "No pullouts for today."
    			}
			});

			//Datatable for Tools
		    var tools_table = $("#tools_table").DataTable({
		    	responsive: true,
		    	"processing": true,
		    	"serverSide": true,
	            "order":[],
	            "ajax":{
	                url: "<?php echo site_url('ToolsController/get_tools') ?>",
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

		    $('#tools_table tbody').on( 'click', '.btn-select', function () {
		    	var data = tools_table.row($(this).parents('tr')).data();
				var rowdata = tools_table.row(this).data();

				if (data == undefined) {
					var me = '<?php echo site_url('ToolsController/get_tools_details/') ?>'+rowdata[0];
				} else if (rowdata == undefined) {
					var me = '<?php echo site_url('ToolsController/get_tools_details/') ?>'+data[0];
				}

				$('#tool_loading').addClass('overlay d-flex justify-content-center align-items-center');
				$('#tool_loading').append('<i class="fas fa-2x fa-sync fa-spin"></i>');
			   //ajax
			 	$.ajax({
			 		url: me,
			 		type: 'get',
			 		dataType: 'json',
			 		success: function(response) {
			 			if (response.success == true) {
			 				$('#tool_loading').removeClass('overlay d-flex justify-content-center align-items-center');
							$('#tool_loading').empty();

							$('#tool_code').val(response.data[0].code);
							$('#tool_model').val(response.data[0].model);
							$('#tool_description').val(response.data[0].description);
							$('#tool_type').val(response.data[0].type);
							$('#tool_quantity').val(response.data[0].quantity);
							$('#tool_price').val(response.data[0].price);

							toastr.success('Data fetched.');
			 			} else {
			 				$('#tool_loading').removeClass('overlay d-flex justify-content-center align-items-center');
							$('#tool_loading').empty();

							toastr.error('Error occured! Please contact developer.');
			 			}
			 		}
			 	});
			} );

			//Fetch Tools Pullout on BTN Tool Edit
			$('#tools_pullout tbody').on( 'click', '.btn-tooleditpullout', function () {
		    	var data = tools_pullout.row($(this).parents('tr')).data();
				var rowdata = tools_pullout.row(this).data();

				if (data == undefined) {
					var me = '<?php echo site_url('ToolsController/get_tools_pullout_details/') ?>'+rowdata[0];
				} else if (rowdata == undefined) {
					var me = '<?php echo site_url('ToolsController/get_tools_pullout_details/') ?>'+data[0];
				}

				$('#tool_loading').addClass('overlay d-flex justify-content-center align-items-center');
				$('#tool_loading').append('<i class="fas fa-2x fa-sync fa-spin"></i>');
			   //ajax
			 	$.ajax({
			 		url: me,
			 		type: 'get',
			 		dataType: 'json',
			 		success: function(response) {
			 			if (response.success == true) {
			 				$('#tool_loading').removeClass('overlay d-flex justify-content-center align-items-center');
							$('#tool_loading').empty();

							$('#edit_pullout_id').val(response.data[0].toolpullout_id);
							$('#edit_tool_code').val(response.data[0].tool_code);
							$('#edit_assigned_to').val(response.data[0].assigned_to_id);
							$('#edit_customer').val(response.data[0].customer_id);
							$('#edit_quantity').val(response.data[0].quantity);

							toastr.success('Data fetched.');
			 			} else {
			 				$('#tool_loading').removeClass('overlay d-flex justify-content-center align-items-center');
							$('#tool_loading').empty();

							toastr.error('Error occured! Please contact developer.');
			 			}
			 		}
			 	});
			} );

			
			$('#tools_pullout tbody').on( 'click', '.btn-toolreturn', function () {
		    	var data = tools_pullout.row($(this).parents('tr')).data();
				var rowdata = tools_pullout.row(this).data();

				if (data == undefined) {
					var me = '<?php echo site_url('ToolsController/get_tools_pullout_details/') ?>'+rowdata[0];
				} else if (rowdata == undefined) {
					var me = '<?php echo site_url('ToolsController/get_tools_pullout_details/') ?>'+data[0];
				}

				$('#tool_loading').addClass('overlay d-flex justify-content-center align-items-center');
				$('#tool_loading').append('<i class="fas fa-2x fa-sync fa-spin"></i>');
			   //ajax
			 	$.ajax({
			 		url: me,
			 		type: 'get',
			 		dataType: 'json',
			 		success: function(response) {
			 			if (response.success == true) {
			 				$('#tool_loading').removeClass('overlay d-flex justify-content-center align-items-center');
							$('#tool_loading').empty();

							$('#pullout_id').val(response.data[0].toolpullout_id);
							$('#tool_code').val(response.data[0].tool_code);
							$('#assigned_to').val(response.data[0].assigned_to_id);
							$('#customer').val(response.data[0].customer_id);
							$('#quantity').val(response.data[0].quantity);

							toastr.success('Data fetched.');
			 			} else {
			 				$('#tool_loading').removeClass('overlay d-flex justify-content-center align-items-center');
							$('#tool_loading').empty();

							toastr.error('Error occured! Please contact developer.');
			 			}
			 		}
			 	});
			} );

			$('#tools_table tbody').on( 'click', '.btn-delete', function () {
		    	var data = tools_table.row($(this).parents('tr')).data();
				var rowdata = tools_table.row(this).data();
				var input_element = $('#tool_delete_code');

				if (data == undefined) {
					input_element.val(rowdata[0]);
				} else if (rowdata == undefined) {
					input_element.val(data[0]);
				}
			   
			} );

			$('#tools_table tbody').on( 'click', '.btn-pullout', function () {
		    	var data = tools_table.row($(this).parents('tr')).data();
				var rowdata = tools_table.row(this).data();
				var input_element = $('#tool_pullout_code');

				if (data == undefined) {
					input_element.val(rowdata[0]);
				} else if (rowdata == undefined) {
					input_element.val(data[0]);
				}
			   
			} );
	  	});

	  	
	</script>

	<!-- Forms AJAX -->
	<script>
		//Form Add Tools
		$('#form-addtools').submit(function(e) {
		 	e.preventDefault();
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

		 				toastr.success('Tool Successfully Added!');
		 				me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });

		//Form Delete Tools
		$('#form-edittools').submit(function(e) {
		 	e.preventDefault();
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

			$('#tool_loading').addClass('overlay d-flex justify-content-center align-items-center');
			$('#tool_loading').append('<i class="fas fa-2x fa-sync fa-spin"></i>');

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$('#tool_loading').removeClass('overlay d-flex justify-content-center align-items-center');
						$('#tool_loading').empty();

		 				toastr.success('Tool Successfully Updated! Please refresh this page');
		 				me[0].reset();
		 			} else {
		 				$('#tool_loading').removeClass('overlay d-flex justify-content-center align-items-center');
						$('#tool_loading').empty();
		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });

		//Form Delete Tools
		$('#form-deletetool').submit(function(e) {
		 	e.preventDefault();
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

		 				toastr.success('Tool Successfully Deleted! Please refresh this page.');
		 				me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });

		//Form Pullout Tools
		$('#form-tool-pullouts').submit(function(e) {
		 	e.preventDefault();
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

		 				toastr.success('Tool Successfully Pulled out!.');
		 				me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });

		//Form Return Tools
		$('#form-toolsreturn').submit(function(e) {
		 	e.preventDefault();
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

		 				toastr.success('Tool Successfully Returned! The page will refresh in 2 seconds');
		 				me[0].reset();
						setTimeout(function(){
							window.location.href = '<?php echo site_url('tools-pullout') ?>';
						},2000);
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});
		//Form Update Tools Return
		$('#form-updatetoolspullout').submit(function(e) {
		 	e.preventDefault();
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

		 				toastr.success('Tool Pullout Successfully Updated! Please refresh this page.');
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

</body>
</html>