<?php
defined('BASEPATH') or exit('No direct script access allowed.');
?>

	<!-- Data Table for Tools -->
	<script>
	  	$(document).ready( function () {
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
	</script>

</body>
</html>