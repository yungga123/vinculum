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


</body>
</html>