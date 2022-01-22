<?php
defined('BASEPATH') or die('Access Denied');
?>

<script>
    $(document).ready(function() {
        // PRF Datatable List
        var payroll_table = $("#prf_table").DataTable({
        responsive: true,
        "processing": true,
        "serverSide": true,
        "order":[],
        "ajax":{
            url: "<?php echo site_url('PRFController/get_prf_list') ?>",
            type: "POST"
        },
        "columnDefs": [
            {
                "targets": [],
                "orderable": false, 
            }
        ]
    });

        // Add Direct Button
        $('.add-direct-btn').click(function() {

            var newfield = $('.add-direct:last').clone();
            newfield.find('input').val('');
            //     // Add after last <div class='input-form'>
            $(newfield).insertAfter(".add-direct:last");
        });

        // Delete Direct Button
        $(".delete-direct-btn").click(function() {

            count = $('.add-direct').length;

            if (count !== 1) {
                $('.add-direct').last().remove();
            } else {
                return 0;
            }
        });


        // Add Indirect Button
        $('.add-indirect-btn').click(function() {

            var newfield = $('.add-indirect:last').clone();
            newfield.find('input').val('');
            //     // Add after last <div class='input-form'>
            $(newfield).insertAfter(".add-indirect:last");
        });

        // Delete Indirect Button
        $(".delete-indirect-btn").click(function() {

            count = $('.add-indirect').length;

            if (count !== 1) {
                $('.add-indirect').last().remove();
            } else {
                return 0;
            }
        });


        // Add Tools Button
        $('.add-tools-btn').click(function() {

            var newfield = $('.add-tools:last').clone();
            newfield.find('input').val('');
            //     // Add after last <div class='input-form'>
            $(newfield).insertAfter(".add-tools:last");
        });

        // Delete Indirect Button
        $(".delete-tools-btn").click(function() {

            count = $('.add-tools').length;

            if (count !== 1) {
                $('.add-tools').last().remove();
            } else {
                return 0;
            }
        });

        $('.select-customer').on("change", function() {
            if ($(this).val() != "") {
                window.location = '<?php echo site_url('prf-add') . '/' ?>' + $(this).val();
            }
        });

        $('.select-branch').on("change", function() {
            if ($(this).val() != "") {
                window.location = '<?php echo site_url('prf-add') . '/' ?>' + $(this).val();
            }
        });

        // $('.select-direct-item').on("change", function() {

        //     if ($(this).val() != "") {

        //         $('.loading-modal').modal();
        //         //ajax

        //         $.ajax({

        //             url: '<?php echo site_url('PRFController/getDirectQty') . '/' ?>' + $(this).val(),
        //             type: 'post',
        //             dataType: 'json',
        //             success: function(response) {
        //                 $('.loading-modal').modal('hide');
        //                 $('#available_qty').val(response.direct_qty);
        //             }
        //         });
        //     }

        // });

        //Form Job Order (Existing)
    $('#form-addprf-validate').submit(function(e) {
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
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        $(':submit').attr('disabled', 'disabled');
        $('.loading-modal').modal();

        //ajax
        $.ajax({
            url: me.attr('action'),
            type: 'post',
            data: me.serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success == true) {
                    $(':submit').removeAttr('disabled', 'disabled');
                    $('.loading-modal').modal('hide');

                    toastr.success("PRF Successfully Added!");
                    me[0].reset();

                    setTimeout(() => {
                        window.location = "<?php echo site_url('prf-add/select-project/select-branch') ?>";
                    }, 1000);
                } else {
                    $(':submit').removeAttr('disabled', 'disabled');
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