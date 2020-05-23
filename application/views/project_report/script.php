<?php
defined('BASEPATH') or die('Access Denied');
?>

	<!-- Forms AJAX -->
	<script>
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
		 				toastr.success("Success! Project Report was updated!");
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
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
		 				toastr.success("Success! Project Report was added!");
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
		 				toastr.success("Success! Project Report was deleted! Refreshing in 5 seconds.");
		 				me[0].reset();
		 				window.setTimeout(function() {
						    window.location = '<?php echo site_url('project-report-list') ?>';
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

</body>
</html>