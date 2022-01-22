<?php
defined('BASEPATH') or die('Access Denied');
?>

<script>
    $(document).ready(function() {
        // PRF Datatable List
        var prf_table = $("#prf_table").DataTable({
            responsive: true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "<?php echo site_url('PRFController/get_prf_list') ?>",
                type: "POST"
            },
            "columnDefs": [{
                "targets": [],
                "orderable": false,
            }]
        });

        //Fetching Data of Direct items in PRF List for Viewing
        $('#prf_table tbody').on('click', '.fetch-direct', function() {

            var data = prf_table.row($(this).parents('tr')).data();
            var rowdata = prf_table.row(this).data();

            if (data == undefined) {
                var me = '<?php echo site_url('PRFController/get_direct_items/') ?>' + rowdata[0];
            } else if (rowdata == undefined) {
                var me = '<?php echo site_url('PRFController/get_direct_items/') ?>' + data[0];
            }

            $('#modal_loading').addClass('overlay d-flex justify-content-center align-items-center');
            $('#modal_loading').append('<i class="fas fa-2x fa-sync fa-spin"></i>');

            //ajax
            $.ajax({
                url: me,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $('#tbody-direct').empty();
                    // total_price = 0;
                    i = 1;
                    $.each(response.results, function(key, value) {

                        $('#tbody-direct').append('<tr>' +
                            '<td>' + i++ + '</td>' +
                            '<td>' + response.results[key].item_name + '</td>' +
                            '<td>' + response.results[key].item_qty + '</td>' +
                            '</tr>');


                    });



                    $('#modal_loading').removeClass('overlay d-flex justify-content-center align-items-center');
                    $('#modal_loading').empty();
                }
            });
        });

        //Fetching Data of Indirect items in PRF List for Viewing
        $('#prf_table tbody').on('click', '.fetch-indirect', function() {

            var data = prf_table.row($(this).parents('tr')).data();
            var rowdata = prf_table.row(this).data();

            if (data == undefined) {
                var me = '<?php echo site_url('PRFController/get_indirect_items/') ?>' + rowdata[0];
            } else if (rowdata == undefined) {
                var me = '<?php echo site_url('PRFController/get_indirect_items/') ?>' + data[0];
            }

            $('#modal_loading').addClass('overlay d-flex justify-content-center align-items-center');
            $('#modal_loading').append('<i class="fas fa-2x fa-sync fa-spin"></i>');

            //ajax
            $.ajax({
                url: me,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $('#tbody-indirect').empty();
                    // total_price = 0;
                    i = 1;
                    $.each(response.results, function(key, value) {

                        $('#tbody-indirect').append('<tr>' +
                            '<td>' + i++ + '</td>' +
                            '<td>' + response.results[key].item_name + '</td>' +
                            '<td>' + response.results[key].item_qty + '</td>' +
                            '</tr>');


                    });



                    $('#modal_loading').removeClass('overlay d-flex justify-content-center align-items-center');
                    $('#modal_loading').empty();
                }
            });
        });

        //Fetching Data of Tools items in PRF List for Viewing
        $('#prf_table tbody').on('click', '.fetch-tools', function() {

            var data = prf_table.row($(this).parents('tr')).data();
            var rowdata = prf_table.row(this).data();

            if (data == undefined) {
                var me = '<?php echo site_url('PRFController/get_tools_items/') ?>' + rowdata[0];
            } else if (rowdata == undefined) {
                var me = '<?php echo site_url('PRFController/get_tools_items/') ?>' + data[0];
            }

            $('#modal_loading').addClass('overlay d-flex justify-content-center align-items-center');
            $('#modal_loading').append('<i class="fas fa-2x fa-sync fa-spin"></i>');

            //ajax
            $.ajax({
                url: me,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $('#tbody-tools').empty();
                    // total_price = 0;
                    i = 1;
                    $.each(response.results, function(key, value) {

                        $('#tbody-tools').append('<tr>' +
                            '<td>' + i++ + '</td>' +
                            '<td>' + response.results[key].item_name + '</td>' +
                            '<td>' + response.results[key].item_qty + '</td>' +
                            '</tr>');


                    });



                    $('#modal_loading').removeClass('overlay d-flex justify-content-center align-items-center');
                    $('#modal_loading').empty();
                }
            });
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