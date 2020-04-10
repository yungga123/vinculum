<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="modal fade loading-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body text-center">
				<div class="d-flex justify-content-center mt-4">
					<div class="spinner-border" role="status">
						<span class="sr-only">Loading...</span>
					</div>
				</div>
				<br>
				<label style="font-size: 28px;" class="text-success">LOADING... PLEASE WAIT...</label>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
  <!-- /.modal -->
	
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
<!-- 	<script src="<?php //echo base_url('assets/AdminLTE/') ?>plugins/angularjs/angular.min.js"></script> -->

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

	<!-- Moment JS -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/moment/moment.min.js"></script>

	<!-- ChartJS -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/chart.js/Chart.min.js"></script>
	<!-- Summernote -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/summernote/summernote-bs4.min.js"></script>
	<!-- SweetAlert2 -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
	<!-- Toastr -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/toastr/toastr.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

	<?php if ($this->uri->segment(1)=='customers'): ?>
	<!-- bs-custom-file-input -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
	<?php endif ?>

	<!-- AdminLTE App -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>dist/js/adminlte.js"></script>
	<!-- Date Range Picker -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.js"></script>

	<!-- fullCalendar 2.2.5 -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/fullcalendar/main.min.js"></script>
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/fullcalendar-daygrid/main.min.js"></script>
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/fullcalendar-timegrid/main.min.js"></script>
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/fullcalendar-interaction/main.min.js"></script>
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/fullcalendar-bootstrap/main.min.js"></script>


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

	<!-- Data Table for Customer List -->
	<script>
	  	$(document).ready( function () {
			//Datatable for Customers Table
		    var customers_table = $("#customers_table").DataTable({
		    	responsive: true,
		    	"processing": true,
		    	"serverSide": true,
	            "order":[],
	            "ajax":{
	                url: "<?php echo site_url('CustomersController/get_customers') ?>",
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

		    //Fetching Data in Customers Data Table
			$('#customers_table tbody').on('click','.btn-addcustomerfile',function(){

				var data = customers_table.row($(this).parents('tr')).data();
				var rowdata = customers_table.row(this).data();

				if (data == undefined) {
					$('#file_customer_id').val(rowdata[0]);
				} else if (rowdata == undefined) {
					$('#file_customer_id').val(data[0]);
				}

			});
	  	});
	</script>

	<!-- Data Table for Project Report -->
	<?php if ($this->uri->segment(1) == "project-report-list"): ?>
	<script>
		$(document).ready( function () {
			//Datatable for Project Report Table
		    var project_report_table = $("#projectReport_table").DataTable({
		    	responsive: true,
		    	"processing": true,
		    	"serverSide": true,
	            "order":[],
	            "ajax":{
	                url: "<?php echo site_url('ProjectReportController/get_project_report') ?>",
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

		    //Fetching Data in Table Confirmed Pullout
			$('#projectReport_table tbody').on('click','.btn-projectreport-del',function(){

				var data = project_report_table.row($(this).parents('tr')).data();
				var rowdata = project_report_table.row(this).data();

				if (data == undefined) {
					$('#del_pr_id').val(rowdata[0]);
				} else if (rowdata == undefined) {
					$('#del_pr_id').val(data[0]);
				}

			});
	  	});


	</script>
	<?php endif ?>
	

	<!-- Forms AJAX -->
	<script>
		<?php if ($this->uri->segment(1) == 'addnewitem'): ?>
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');

		 				toastr.success("Added! " + a);
		 				me[0].reset();
		 			} else {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });
		<?php endif ?>
		
		<?php if ($this->uri->segment(1) == 'masterlistofitems'): ?>
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');

		 				toastr.success("Updated! Please refresh this page.");
		 			} else {
		 				$(':submit').removeClass('disabled');
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');

		 				toastr.success("Stocks Added! Please refresh this page.");
		 				$('.addstocks').modal('hide');
		 				$('#AS_Quantity').val("");
		 				me[0].reset();
		 			} else {
		 				$(':submit').removeClass('disabled');
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');

		 				toastr.success("Success! it is now for pending. Click to Refresh ");
		 				me[0].reset();
		 			} else {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
	 	});
		<?php endif ?>

		<?php if ($this->uri->segment(1) == 'customers-add'): ?>
		//Form Add Customer
		$('#form-customer-add').submit(function(e) {
		 	e.preventDefault();
		 	var a = '<a href="<?php echo site_url("customers") ?>"><u>View Here</u></a>';
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');

		 				toastr.success("Customer Added! "+a);
		 				me[0].reset();
		 			} else {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });
		<?php endif ?>
		
		<?php if ($this->uri->segment(1) == 'customers-update'): ?>
		//Form Update Customer
		$('#form-customer-update').submit(function(e) {
		 	e.preventDefault();
		 	var a = '<a href="<?php echo site_url("customers") ?>"><u>View Here</u></a>';
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Customer Updated! "+a);
		 			} else {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });
		<?php endif ?>

		<?php if ($this->uri->segment(1) == 'Pull-Out-item'): ?>
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeClass('disabled');
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
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				$("#search-result").empty();
			 			$("#search-result").append(response.data);
		 			}
		 		}
		 	});
		 });

		 //Form Less Price Pullout

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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Pullout Success "+a);
		 			} else {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });
		<?php endif ?>

		<?php if ($this->uri->segment(1) == 'pending-pullouts'): ?>
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');

		 				toastr.success("Success! Please refresh this page."+a);
		 			} else {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });
		<?php endif ?>
		
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');

		 				toastr.success("Dispatch Added! " + a);
						 me[0].reset();
		 			} else {
		 				$(':submit').removeClass('disabled');
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');

		 				toastr.success("Successfully Updated! Please Refresh");
		 			} else {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });
		<?php endif ?>

		<?php if ($this->uri->segment(1) == 'specific_confirmed_pullouts' || $this->uri->segment(1) == 'confirmed-pullouts'): ?>
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');

		 				toastr.success("Success! Please Refresh this page.");
						 me[0].reset();
		 			} else {
		 				$(':submit').removeClass('disabled');
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {

		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');

		 				toastr.success("Success! Item was set for request to delete.");
						me[0].reset();
		 			} else {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });
			
		<?php endif ?>
		

		<?php if ($this->uri->segment(1) == 'technicians'): ?>
		//Form Add Technicians
		$('#form-add-tech').submit(function(e) {
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Success! Technician was added! Please refresh this page.");
						me[0].reset();
		 			} else {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });
		<?php endif ?>

		//Form Edit Technicians
		$('#form-edit-tech').submit(function(e) {
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Success! Technician was updated! View now at technicians table.");
						 //me[0].reset();
		 			} else {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });

		<?php if ($this->uri->segment(1) == 'schedules'): ?>
		//Form Add Event
		$('#form-add-event').submit(function(e) {
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				toastr.success("Success! Schedule was added! Refreshing in 5 seconds!");
		 				
						me[0].reset();

						$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');

						window.setTimeout(function() {
						    window.location = '<?php echo site_url('schedules') ?>';
						}, 5000);
		 			} else {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });

		//Form Update Event
		$('#form-update-event').submit(function(e) {
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				toastr.success("Success! Schedule was updated! Refreshing in 5 seconds!");
		 				
						me[0].reset();

						$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');

						window.setTimeout(function() {
						    window.location = '<?php echo site_url('schedules') ?>';
						}, 5000);
		 			} else {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				toastr.error(response.errors);
		 			}

		 		}
		 	});


		 });	
		<?php endif ?>
		

		<?php if ($this->uri->segment(1) == 'project-report-update'): ?>
		//Form Edit Project Report
		$('#form-update-projectreport').submit(function(e) {
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Success! Project Report was updated!");
		 			} else {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				toastr.error(response.errors);
		 				
		 			}

		 		}
		 	});
		 });
		<?php endif ?>
		
		<?php if ($this->uri->segment(1) == 'project-report'): ?>
		//Form Add Project Report
		$('#form-add-projectreport').submit(function(e) {
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Success! Project Report was added!");
		 			} else {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				toastr.error(response.errors);
		 				
		 			}

		 		}
		 	});
		 });	
		<?php endif ?>

		<?php if ($this->uri->segment(1) == 'project-report-list'): ?>
		//Form Delete Project Report
		$('#form-del-projectreport').submit(function(e) {
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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Success! Project Report was deleted! Refreshing in 5 seconds.");
		 				me[0].reset();
		 				window.setTimeout(function() {
						    window.location = '<?php echo site_url('project-report-list') ?>';
						}, 5000);
		 			} else {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				toastr.error(response.errors);
		 			}
		 		}
		 	});
		 });		
		<?php endif ?>

		<?php if ($this->uri->segment(1) == 'customers'): ?>
		//Form Add Customer File
		$('#form-customerfileadd').submit(function(e) {
		 	e.preventDefault();
		 	var me = $(this);

		 	var formData = new FormData(me[0]);

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

			$(':submit').addClass('disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: formData,
		 		cache: false,
		 		processData: false,
       			contentType: false,
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Success! File added");
		 				me[0].reset();
		 			} else {
		 				$(':submit').removeClass('disabled');
						$('.loading-modal').modal('hide');
		 				toastr.error(response.errors);
		 			}
		 		}
		 	});
		 });		
		<?php endif ?>
	</script>


	<!-- Universal Toaster For Success -->
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

	<!-- Universal Toaster for Fail -->
	<?php if ($this->session->flashdata('fail')): ?>
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
			toastr.error('<?php echo $this->session->flashdata('fail') ?>');
		</script>
	<?php endif ?>

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

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				toastr.success("Dispatch Added! " + a);
		 				me[0].reset();
		 			} else {
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

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				toastr.success("Updated! Please refresh this page. " + a );

		 			} else {
		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });
	</script>


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
			 		}
			 	});
			} );

		});
	</script>


   	<!-- Sales Dispatch Table-->
	<script type="text/javascript">
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

	<!-- Scheduled Calendar Notif -->
	<script type="text/javascript">
	  $(document).ready(function() {

	    $('#todayScheduleModal').modal();

	  });
	</script>

	<!-- Normal Data Tables -->
	<script type="text/javascript">
	  $(document).ready(function() {
	    $('#ScanItem').modal();

	    var myTable = $("#Pull-Out-Item").DataTable({
			responsive: true
		});

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

	    var technicians_table = $('#technicians_table').DataTable({
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

		//Fetching Data in Table Technicians
		$('#technicians_table tbody').on('click','.btn-get-techid',function(){

			var data = technicians_table.row($(this).parents('tr')).data();
			var rowdata = technicians_table.row(this).data();

			if (data == undefined) {
				$('#tech_id_del').val(rowdata[0]);
			} else if (rowdata == undefined) {
				$('#tech_id_del').val(data[0]);
			}

		});
		//end

	  });
	</script>

	<!-- Date Range Pickers -->
	<script>
		

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

		$('#event_daterange').daterangepicker({
			 timePicker: true,
			 locale: {
			 	format: 'MMM DD, YYYY hh:mm A'
			 }
		});

		$('#event_daterange').on('hide.daterangepicker', function(ev, picker) {

			$('#event_sd').val(picker.startDate.format('YYYY-MM-DD HH:mm:ss'));
			$('#event_ed').val(picker.endDate.format('YYYY-MM-DD HH:mm:ss'));

		});

		$('#event_daterange_edit').daterangepicker({
			 timePicker: true,
			 locale: {
			 	format: 'MMM DD, YYYY hh:mm A'
			 }
		});

		$('#event_daterange_edit').on('hide.daterangepicker', function(ev, picker) {

			$('#event_sd_edit').val(picker.startDate.format('YYYY-MM-DD HH:mm:ss'));
			$('#event_ed_edit').val(picker.endDate.format('YYYY-MM-DD HH:mm:ss'));

		});
	</script>

	<!-- Full Calendar (Schedules) -->
	<?php if ($this->uri->segment(1)=='schedules'): ?>
	<script>
		
	  $(function () {

	  	//Schedule Today Modal for Schedules
	  	$('.schedule-today-info').modal();


	    /* initialize the external events
	     -----------------------------------------------------------------*/
	    function ini_events(ele) {
	      ele.each(function () {

	        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
	        // it doesn't need to have a start or end
	        var eventObject = {
	          title: $.trim($(this).text()) // use the element's text as the event title
	        }

	        // store the Event Object in the DOM element so we can get to it later
	        $(this).data('eventObject', eventObject)

	        // make the event draggable using jQuery UI
	        $(this).draggable({
	          zIndex        : 1070,
	          revert        : true, // will cause the event to go back to its
	          revertDuration: 0  //  original position after the drag
	        })

	      })
	    }

	    ini_events($('#external-events div.external-event'))

	    /* initialize the calendar
	     -----------------------------------------------------------------*/
	    //Date for the calendar events (dummy data)
	    var date = new Date()
	    var d    = date.getDate(),
	        m    = date.getMonth(),
	        y    = date.getFullYear()

	    var Calendar = FullCalendar.Calendar;
	    var calendarEl = document.getElementById('calendar');

	    var calendar = new Calendar(calendarEl, {
	      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
	      header    : {
	        left  : 'prev,next today',
	        center: 'title',
	        right : 'dayGridMonth,timeGridWeek,timeGridDay'
	      },
	      events: [
	      	<?php foreach ($results as $row): ?>
	      		{
	      		  id 			: '<?php echo $row->ID ?>',
		          title          : "<?php echo $row->title ?>",
		          start          : "<?php echo $row->start ?>",
		          end            : "<?php echo $row->end ?>",
		          backgroundColor: "<?php 
			          	if ($row->type == 'installation') {
			          		echo null;
			          	} else if ($row->type == 'service') {
			          		echo '#E1D942';
			          	} else if ($row->type == 'payables') {
			          		echo '#DB5C5C';
			          	} else if ($row->type == 'holiday') {
			          		echo '#6BBA44';
			          	}

			          ?>",
		          borderColor    : "<?php 
			          	if ($row->type == 'installation') {
			          		echo '#007bff';
			          	} else if ($row->type == 'service') {
			          		echo '#ffc107';
			          	} else if ($row->type == 'payables') {
			          		echo '#dc3545';
			          	} else if ($row->type == 'holiday') {
			          		echo '#28a745';
			          	}

			          ?>",
			      	extendedProps: {
			        description		: '<?php echo $row->description ?>',
			      	type 			: '<?php echo $row->type ?>'
			      }
			      
		        },
	      	<?php endforeach ?>
	      	
	      ],
	      eventClick: function(info) {

	      	//console.log(info.event.id);
	      	$('#event_id_edit').val(info.event.id);
	      	$('#event_title_edit').val(info.event.title);
	      	$('#event_sd_edit').val(moment(info.event.start).format('YYYY-MM-DD HH:mm:ss'));
	      	$('#event_ed_edit').val(moment(info.event.end).format('YYYY-MM-DD HH:mm:ss'));
	      	$('#event_desc_edit').val(info.event.extendedProps.description);
	      	$('#event_type_edit').val(info.event.extendedProps.type);
	      	$('#event_daterange_edit').val(moment(info.event.start).format('MMM DD, YYYY hh:mm A') + ' - ' + moment(info.event.end).format('MMM DD, YYYY hh:mm A'));


	      	$('.update-schedule').modal();
	      }
	    });

	    calendar.render();
	  })
	</script>
	<?php endif ?>

	<!-- Project Report Form Clone/Declone -->
	<?php if ($this->uri->segment(1)=='project-report' || $this->uri->segment(1)=='project-report-update'): ?>
	<script>
		$(document).ready(function(){
			$('.add-petty-btn').click(function(){

				var newfield = $('.add-petty:last').clone();
				newfield.find('input').val('');

				// Add after last <div class='input-form'>
				$(newfield).insertAfter(".add-petty:last");
			});

			$('.add-transpo-btn').click(function(){

				var newfield = $('.add-transpo:last').clone();
				newfield.find('input').val('');

				// Add after last <div class='input-form'>
				$(newfield).insertAfter(".add-transpo:last");
			});

			$('.add-indirect-btn').click(function(){

				var newfield = $('.add-indirect:last').clone();
				newfield.find('input').val('');

				// Add after last <div class='input-form'>
				$(newfield).insertAfter(".add-indirect:last");
			});

			$('.add-direct-btn').click(function(){

				var newfield = $('.add-direct:last').clone();
				newfield.find('input').val('');

				// Add after last <div class='input-form'>
				$(newfield).insertAfter(".add-direct:last");
			});

			$('.add-tool-rqstd-btn').click(function(){

				var newfield = $('.add-tool-rqstd:last').clone();
				newfield.find('input').val('');

				// Add after last <div class='input-form'>
				$(newfield).insertAfter(".add-tool-rqstd:last");
			});

			$('.add-assignedit-btn').click(function(){

				var newfield = $('.add-assignedit:last').clone();
				newfield.find('input').val('');

				// Add after last <div class='input-form'>
				$(newfield).insertAfter(".add-assignedit:last");
			});

			$('.add-assignedtech-btn').click(function(){

				var newfield = $('.add-assignedtech:last').clone();
				newfield.find('input').val('');

				// Add after last <div class='input-form'>
				$(newfield).insertAfter(".add-assignedtech:last");
			});

			$(".delete-petty-btn").click(function(){

				count = $('.add-petty').length;

				if (count !== 1) {
					$('.add-petty').last().remove();
				} else {
					return 0;
				}
			});

			$(".delete-transpo-btn").click(function(){

				count = $('.add-transpo').length;
				
				if (count !== 1) {
					$('.add-transpo').last().remove();
				} else {
					return 0;
				}
			});

			$(".delete-indirect-btn").click(function(){

				count = $('.add-indirect').length;
				
				if (count !== 1) {
					$('.add-indirect').last().remove();
				} else {
					return 0;
				}
			});

			$(".delete-direct-btn").click(function(){

				count = $('.add-direct').length;
				
				if (count !== 1) {
					$('.add-direct').last().remove();
				} else {
					return 0;
				}
			});

			$(".delete-tool-rqstd-btn").click(function(){

				count = $('.add-tool-rqstd').length;
				
				if (count !== 1) {
					$('.add-tool-rqstd').last().remove();
				} else {
					return 0;
				}
			});

			$(".delete-assignedit-btn").click(function(){

				count = $('.add-assignedit').length;
				
				if (count !== 1) {
					$('.add-assignedit').last().remove();
				} else {
					return 0;
				}
			});

			$(".delete-assignedtech-btn").click(function(){

				count = $('.add-assignedtech').length;
				
				if (count !== 1) {
					$('.add-assignedtech').last().remove();
				} else {
					return 0;
				}
			});
		});
	</script>
	<?php endif ?>


	<!-- Customers File Selection -->
	<?php if ($this->uri->segment(1)=='customers'): ?>
	<script type="text/javascript">
		$(document).ready(function () {
		  bsCustomFileInput.init();
		});
	</script>
	<?php endif ?>
	
			
	
</body>
</html>
