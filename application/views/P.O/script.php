<?php
defined('BASEPATH') or die('Access Denied');

if ($this->uri->segment(2) == "pending") {
    $url_po_list = site_url('POController/fetch_pending_po');
} elseif ($this->uri->segment(2) == "approved") {
    $url_po_list = site_url('POController/fetch_approved_po');
} else {
    $url_po_list = site_url('POController/fetch_filed_po');
}

?>

<script>
    $(document).ready(function() {
        //Datatable for Requisition Form
        var table_PO_list = $("#PO_list").DataTable({
            responsive: true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "<?php echo $url_po_list ?>",
                type: "POST"
            },
            "columnDefs": [{
                "targets": [],
                "orderable": false,
            }]
        });

        //Fetching Data in Requisition Items (For Viewing)
        $('#PO_list tbody').on('click', '.btn_view', function() {

            var data = table_PO_list.row($(this).parents('tr')).data();
            var rowdata = table_PO_list.row(this).data();

            if (data == undefined) {
                var me = '<?php echo site_url('POController/get_po_items/') ?>' + rowdata[0];
            } else if (rowdata == undefined) {
                var me = '<?php echo site_url('POController/get_po_items/') ?>' + data[0];
            }

            $('#modal_loading').addClass('overlay d-flex justify-content-center align-items-center');
            $('#modal_loading').append('<i class="fas fa-2x fa-sync fa-spin"></i>');

            //ajax
            $.ajax({
                url: me,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $('#tbody-items').empty();
                    $('#req_total_price').empty();
                    // total_price = 0;
                    i = 1;
                    $.each(response.results, function(key, value) {
                        //total_cost = Number(response.results[key].unit_cost) * Number(response.results[key].qty);

                        $('#tbody-items').append('<tr>' +
                            '<td>' + i++ + '</td>' +
                            '<td>' + response.results[key].description + '</td>' +
                            '<td>' + response.results[key].qty + '</td>' +
                            '<td>' + response.results[key].unit + '</td>' +
                            '<td>' + response.results[key].unit_cost + '</td>' +
                            '<td>' + response.results[key].total_cost + '</td>' +
                            '<td>' + response.results[key].date_needed + '</td>' +
                            '<td>' + response.results[key].purpose + '</td>' +
                            '</tr>');

                        //total_price = total_price + (response.results[key].unit_cost * response.results[key].qty);
                        $('#req_total_price').html(response.results[key].total_price);
                    });



                    $('#modal_loading').removeClass('overlay d-flex justify-content-center align-items-center');
                    $('#modal_loading').empty();
                }
            });
        });

        //Form Accept Item Requests
        $('#form-accept-generatepo-req').submit(function(e) {
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
                        toastr.success("Success! Purchase of Order Generated.");
                        me[0].reset();

                        window.setTimeout(function() {
                            window.location = '<?php echo site_url('generated-po-list') ?>/pending';
                        }, 1000);
                    } else {
                        $(':submit').removeAttr('disabled', 'disabled');
                        $('.loading-modal').modal('hide');
                        toastr.error(response.errors);

                    }

                }
            });
        });

        //Form Update item Request
        $('#form-updateitem-po').submit(function(e) {
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
                        toastr.success("Success! PO Items was updated!");
                        <?php if ($this->uri->segment(2) == 'pending') : ?>
                            window.location = '<?php echo site_url('generated-po-list') ?>/pending';
                        <?php else : ?>
                            window.location = '<?php echo site_url('generated-po-list') ?>/approved';
                        <?php endif ?>
                        //me[0].reset();
                    } else {
                        $(':submit').removeAttr('disabled', 'disabled');
                        $('.loading-modal').modal('hide');
                        toastr.error(response.errors);

                    }

                }
            });
        });
        //Fetching Data in Pending Requisition (For Delete)
        $('#PO_list tbody').on('click', '.btn_po_del', function() {

            var data = table_PO_list.row($(this).parents('tr')).data();
            var rowdata = table_PO_list.row(this).data();

            if (data == undefined) {
                $('#po_id_del').val(rowdata[0]);
            } else if (rowdata == undefined) {
                $('#po_id_del').val(data[0]);
            }

        });


        //Modal Delete PO
        $('#modal-po-vendor').submit(function(e) {
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
                        toastr.success("PO Deleted!");
                        me[0].reset();
                        window.setTimeout(function() {
                            <?php if ($this->uri->segment(2) == 'pending') : ?>
                                window.location = '<?php echo site_url('generated-po-list') ?>/pending';
                            <?php else : ?>
                                window.location = '<?php echo site_url('generated-po-list') ?>/approved';
                            <?php endif ?>
                        }, 1000);
                    } else {
                        $(':submit').removeAttr('disabled', 'disabled');
                        $('.loading-modal').modal('hide');

                        toastr.error(response.errors);
                    }

                }
            });
        });

        //Fetching Data for Approved PO
        $('#PO_list tbody').on('click', '.btn_po_id', function() {

            var data = table_PO_list.row($(this).parents('tr')).data();
            var rowdata = table_PO_list.row(this).data();

            if (data == undefined) {
                $('#po_id').val(rowdata[0]);
            } else if (rowdata == undefined) {
                $('#po_id').val(data[0]);
            }

        });

        //Fetching Data for Filing PO
        $('#PO_list tbody').on('click', '.btn_po_id_filing', function() {

            var data = table_PO_list.row($(this).parents('tr')).data();
            var rowdata = table_PO_list.row(this).data();

            if (data == undefined) {
                $('#po_id_filing').val(rowdata[0]);
            } else if (rowdata == undefined) {
                $('#po_id_filing').val(data[0]);
            }

        });

        $('#form-approved-po').submit(function(e) {
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
                        toastr.success("Success! PO Approved, The page will be refreshed.");
                        me[0].reset();

                        window.setTimeout(function() {
                            window.location = '<?php echo site_url('generated-po-list') ?>/pending';
                        }, 2000);
                    } else {
                        $(':submit').removeAttr('disabled', 'disabled');
                        $('.loading-modal').modal('hide');
                        toastr.error(response.errors);

                    }

                }
            });
        });

        $('#form-file-po').submit(function(e) {
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
                        toastr.success("Success! PO Filed, The page will be refreshed.");
                        me[0].reset();

                        window.setTimeout(function() {
                            window.location = '<?php echo site_url('generated-po-list') ?>/filed';
                        }, 2000);
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