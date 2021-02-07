<?php 
defined('BASEPATH') or die('Access Denied');
?>

    <script>

        //Clone/Declone
        $(document).ready(function() {

            //Datatable for Requisition Form
            var payroll_table = $("#table_pending_request").DataTable({
                responsive: true,
                "processing": true,
                "serverSide": true,
                "order":[],
                "ajax":{
                    url: "<?php echo site_url('RequisitionFormController/fetch_pending_requisition') ?>",
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

            $('.add-item-btn').click(function(){

            var newfield = $('.add-item:last').clone();
            newfield.find('input').val('');

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
            
            //Form Add item Request
            $('#form-additem-request').submit(function(e) {
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
                            toastr.success("Success! Item Request was added!");
                            me[0].reset();
                        } else {
                            $(':submit').removeAttr('disabled','disabled');
                            $('.loading-modal').modal('hide');
                            toastr.error(response.errors);
                            
                        }

                    }
                });
            });
        });
    </script>

</body>
</html>