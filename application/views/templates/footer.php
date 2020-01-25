<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	
	<footer class="main-footer">
	    <strong>Copyright &copy; 2017-2019 <a href="http://www.vinculumtechonologies.com">Vinculum Techonologies Corporation</a>.</strong>
	    All rights reserved.
	    <div class="float-right d-none d-sm-inline-block">
	      <b>Version</b> 2.0.0
	    </div>
	</footer>

	  <!-- Control Sidebar -->
	  <aside class="control-sidebar control-sidebar-dark">
	    <!-- Control sidebar content goes here -->
	  </aside>
	  <!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>

	<!-- Angular JS -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/angularjs/angular.min.js"></script>

	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	  $.widget.bridge('uibutton', $.ui.button)
	</script>

	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- DataTables -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables/jquery.dataTables.js"></script>
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<!-- ChartJS -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/chart.js/Chart.min.js"></script>
	<!-- daterangepicker -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/moment/moment.min.js"></script>
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- Summernote -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/summernote/summernote-bs4.min.js"></script>
	<!-- SweetAlert2 -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
	<!-- Toastr -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/toastr/toastr.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>dist/js/adminlte.js"></script>


	<!-- Data Table for Item Master List -->
	<script>
	  	$(document).ready( function () {
		    var masterlist_table = $("#item_masterlist").DataTable({
		    	responsive: true,
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

		    

		    var item_actual_stocks_dt = $("#item_actual_stocks_dt").DataTable({
		    	responsive: true,
		    	"serverSide": true,
	            "order":[],
	            "ajax":{
	                url: "<?php echo site_url('ItemsController/get_ActualStocks') ?>",
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

			$('#item_masterlist tbody').on( 'click', '.btn_addstock', function () {
		    	var data = masterlist_table.row($(this).parents('tr')).data();
				var rowdata = masterlist_table.row(this).data();

				if (data == undefined) {
					$("#AS_ItemCode").val(rowdata[0]);
				} else if (rowdata == undefined) {
					$("#AS_ItemCode").val(data[0]);

				}
			} );

			var item_register_history = $("#item_register_history").DataTable({
		    	responsive: true
		    });

		    var item_delete_history = $("#item_delete_history").DataTable({
		    	responsive: true
		    });
	  	});
	</script>

	
	
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

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				toastr.success("Added! " + a);
		 			} else {
		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });


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

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				toastr.success("Updated! Please refresh this page.");
		 			} else {
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

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				toastr.success("Stocks Added! Please refresh this page.");
		 				$('.addstocks').modal('hide');
		 				$('#AS_Quantity').val("");
		 			} else {
		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });
	</script>


	<!-- Universal Toaster -->
	<?php if ($this->session->flashdata('success')): ?>
		<script type="text/javascript">
			
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
			toastr.success("<?php echo $this->session->flashdata('success') ?>");
		</script>
	<?php endif ?>
	

	<!-- Toasters for Dispatch Table -->
	<script type="text/javascript">
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

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				toastr.success("Dispatch Added! " + a);
		 			} else {
		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });

		//update Dispatch
		$('#update-form-dispatch').submit(function(e) {
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

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				toastr.success("Updated! Please refresh this page.");
		 			} else {
		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });

		
	</script>

	<?php if ($this->session->flashdata('success')): ?>
		<script type="text/javascript">
			
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

			toastr.success("<?php echo $this->session->flashdata('success') ?>");

		</script>
	<?php endif ?>


	<!-- Dispatch Forms Table -->
	<script>
		//Forms Table
	  	$(document).ready( function () {
		    var dispatchTable = $("#dispatchTable").DataTable({
		    	responsive: true,
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
			 			$(".Remarks_Edit").val(response.dispatch_form_edit[0].Remarks);
			 			$(".AssignedTechnicians1_Edit").val(response.dispatch_form_edit[0].AssignedTechnicians1);
			 			$(".AssignedTechnicians2_Edit").val(response.dispatch_form_edit[0].AssignedTechnicians2);
			 			$(".AssignedTechnicians3_Edit").val(response.dispatch_form_edit[0].AssignedTechnicians3);
			 			$(".AssignedTechnicians4_Edit").val(response.dispatch_form_edit[0].AssignedTechnicians4);
			 			$(".AssignedTechnicians5_Edit").val(response.dispatch_form_edit[0].AssignedTechnicians5);
			 			$(".WithPermit_Edit").val(response.dispatch_form_edit[0].WithPermit);
			 			
			 			if (response.dispatch_form_edit[0].Installation =="1"){
			 				$(".TypeOfService_Edit").val("Installation");
			 			}
			 			else if (response.dispatch_form_edit[0].Warranty =="1"){
			 				$(".TypeOfService_Edit").val("Warranty");	
			 			}
			 			else  if (response.dispatch_form_edit[0].RepairOrService =="1"){
			 				$(".TypeOfService_Edit").val("Service");
			 			}
			 			
			 			
			 		
			 			
			 		}
			 	});
			} );

		});
	</script>

<!-- Data Time Picker -->
	<script>
		$(document).ready(function() {
			$('#dispatch_date').datetimepicker({
				format: 'yyyy-mm-dd',
				minView: 2,
				autoclose: true,
				todayBtn: 'linked',
				todayHighlight: true
			});
			$('#date_of_purchase').datetimepicker({
				format: 'yyyy-mm-dd',
				minView: 2,
				autoclose: true,
				todayBtn: 'linked',
				todayHighlight: true
			});

			$('#start_date').datetimepicker({
				format: 'yyyy-mm-dd',
				minView: 2,
				autoclose: true,
				todayBtn: 'linked',
				todayHighlight: true
			});
			$('#date_to').datetimepicker({
				format: 'yyyy-mm-dd',
				minView: 2,
				autoclose: true,
				todayBtn: 'linked',
				todayHighlight: true
			});

			$('#time_in').datetimepicker({
				format: 'hh:ii',
				autoclose: true,
				startView: 1,
				showMeridian: true,
				maxView: 1
			});

			$('#time_out').datetimepicker({
				format: 'hh:ii',
				autoclose: true,
				startView: 1,
				showMeridian: true,
				maxView: 1
			});

			$('#time_in_1').datetimepicker({
				format: 'hh:ii',
				autoclose: true,
				startView: 1,
				showMeridian: true,
				maxView: 1
			});

			$('#time_out_1').datetimepicker({
				format: 'hh:ii',
				autoclose: true,
				startView: 1,
				showMeridian: true,
				maxView: 1
			});

			$('#time_in_2').datetimepicker({
				format: 'hh:ii',
				autoclose: true,
				startView: 1,
				showMeridian: true,
				maxView: 1
			});

			$('#time_out_2').datetimepicker({
				format: 'hh:ii',
				autoclose: true,
				startView: 1,
				showMeridian: true,
				maxView: 1
			});

			$('#time_in_3').datetimepicker({
				format: 'hh:ii',
				autoclose: true,
				startView: 1,
				showMeridian: true,
				maxView: 1
			});

			$('#time_out_3').datetimepicker({
				format: 'hh:ii',
				autoclose: true,
				startView: 1,
				showMeridian: true,
				maxView: 1
			});

			$('#time_in_4').datetimepicker({
				format: 'hh:ii',
				autoclose: true,
				startView: 1,
				showMeridian: true,
				maxView: 1
			});

			$('#time_out_4').datetimepicker({
				format: 'hh:ii',
				autoclose: true,
				startView: 1,
				showMeridian: true,
				maxView: 1
			});
			$('#dispatch_time').datetimepicker({
				format: 'hh:ii',
				autoclose: true,
				startView: 1,
				showMeridian: true,
				maxView: 1
			});
			
			$('#reset_dispatch_date').click(function(){
				$('#dispatch_date').val("").datetimepicker('update');
			});

			$('#reset_time_in').click(function(){
				$('#time_in').val("").datetimepicker('update');
			});

			$('#reset_time_out').click(function(){
				$('#time_out').val("").datetimepicker('update');
			});

		});
	</script>

	<script type="text/javascript">
	    $(".start_date").datetimepicker({
	        format: "yyyy/mm/dd hh:ii",
	        autoclose: true,
	    });
	</script>   
	<script type="text/javascript">
	    $(".end_date").datetimepicker({
	        format: "yyyy/mm/dd hh:ii",
	        autoclose: true,
	    });
	</script>   

	<script type="text/javascript">
	    $("#start_date2").datetimepicker({
	        format: "yyyy/mm/dd hh:ii",
	        autoclose: true,
	    });
	</script>   


	<!-- Date Time Picker -->
	<script type="text/javascript">
	    $("#end_date2").datetimepicker({
	        format: "yyyy/mm/dd hh:ii"
	    });
	</script>

	<!-- ToolTips -->
	<script type="text/javascript">
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		});
	</script>
	
	</body>
</html>
