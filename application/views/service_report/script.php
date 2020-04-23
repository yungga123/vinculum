<?php
defined('BASEPATH') or die('Access Denied');
?>

    <!-- Service Report Clone/Declone -->
    <script>
        $(document).ready(function(){

            //*************************************** */
            $('.add-direct-btn').click(function(){
				var newfield = $('.add-direct:last').clone();
				newfield.find('input').val('');

				// Add after last <div class='input-form'>
				$(newfield).insertAfter(".add-direct:last");
			});

            $(".delete-direct-btn").click(function(){

				count = $('.add-direct').length;

				if (count !== 1) {
					$('.add-direct').last().remove();
				} else {
					return 0;
				}
			});

            //****************************************** */
            $('.add-indirect-btn').click(function(){
				var newfield = $('.add-indirect:last').clone();
				newfield.find('input').val('');

				// Add after last <div class='input-form'>
				$(newfield).insertAfter(".add-indirect:last");
			});

            $(".delete-indirect-btn").click(function(){

				count = $('.add-indirect').length;

				if (count !== 1) {
					$('.add-indirect').last().remove();
				} else {
					return 0;
				}
			});
            //******************************************* */
			$('.add-tools-btn').click(function(){
				var newfield = $('.add-tools:last').clone();
				newfield.find('input').val('');

				// Add after last <div class='input-form'>
				$(newfield).insertAfter(".add-tools:last");
			});

            $(".delete-tools-btn").click(function(){

				count = $('.add-tools').length;

				if (count !== 1) {
					$('.add-tools').last().remove();
				} else {
					return 0;
				}
			});
            //******************************************* */
        });
    </script>

	<!-- Form AJAX -->
	<script>
		//Form Add Service Report
		$('#form-add-sr').submit(function(e) {
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

		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Success! Service Report was added!");
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