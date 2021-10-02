<?php
defined('BASEPATH') or die('Access Denied');

$item_id = 1;
$sub_total = 0;
$total_per_item = 0;
$net_of_vat = 0;
$vat_amount = 0;
$total_amount = 0;

$supplier_data = array();
$po_data = array();


foreach ($supplier_details as $row) {
    if ($row->vendor_category == "Direct") {
        $supplier_data = [
            'vendor_name' => $row->name,
            'vendor_address' => $row->address,
            'vendor_category' => "01",
            'vendor_acronym' => strtok($row->vendor_code, '-'),
            'vendor_terms' => $row->terms_and_condition
        ];
    } elseif ($row->vendor_category == "Indirect") {
        $supplier_data = [
            'vendor_name' => $row->name,
            'vendor_address' => $row->address,
            'vendor_category' => "02",
            'vendor_acronym' => strtok($row->vendor_code, '-'),
            'vendor_terms' => $row->terms_and_condition
        ];
    } elseif ($row->vendor_category == "Tools") {
        $supplier_data = [
            'vendor_name' => $row->name,
            'vendor_address' => $row->address,
            'vendor_category' => "03",
            'vendor_acronym' => strtok($row->vendor_code, '-'),
            'vendor_terms' => $row->terms_and_condition
        ];
    }
}

foreach ($po_details as $row) {
    $po_data = [
        'po_date_year' => date('y'),
        'po_date_month' => date('m'),
        'po_date_day' => date('d'),
        'po_revise_count' => $row->po_revise
    ];
}



$requisition_id = "";
$requisition_id_result = "";
foreach ($items_details as $row) {
    $total_per_item = $row->qty * $row->unit_cost;
    $sub_total = $sub_total + $total_per_item;

    if ($requisition_id == "") {
        $requisition_id = $row->requisition_id;
        $requisition_id_result = $row->requisition_id;
    } elseif ($requisition_id == $row->requisition_id) {
        $requisition_id = $row->requisition_id;
    } else {
        $requisition_id_result = $requisition_id_result . "/" . $row->requisition_id;
        $requisition_id = $row->requisition_id;
    }
}

$net_of_vat = $sub_total / 1.12;
$vat_amount = $net_of_vat * .12;
$total_amount = $sub_total + $vat_amount;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/summernote/summernote-bs4.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- DataTables Responsive -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/toastr/toastr.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style type="text/css">
        @media print {

            .table-bordered td,
            .table-bordered th {
                border: 1px solid #000000 !important;
            }

            .table thead th {
                vertical-align: bottom !important;
                border-bottom: 2px solid #000000 !important;
            }
        }
    </style>


</head>


<body>

    <!-- Title Page -->
    <div class="row">
        <div class="col-sm-6">
            <br clear="left" />
            <img src="<?php echo base_url('assets/images/vinculumnew.jpg') ?>" alt="vcmlogo" class="img-thumbnail mb-4" style="height: 120px;width: 380px">

        </div>
        <div class="col-sm-3">

        </div>
        <div class="col-sm-3">
            <table class="table table-bordered table-sm" style="font-size: 15px">
                <tbody>
                    <tr class="text-center">
                        <td style="font-weight: bold">PURCHASE ORDER NO.
                            <br>
                            F06-<?php echo $supplier_data['vendor_category'] ?>-<?php echo $supplier_data['vendor_acronym'] ?>-<?php echo $po_data['po_date_year'] ?>-<?php echo $po_data['po_date_month'] ?><?php echo $po_data['po_date_day'] ?>-0<?php echo $po_data['po_revise_count'] ?>
                        </td>
                    </tr>
                    <br>
                    <tr class="text-center">
                        <td>PURCHASE ORDER DATE
                            <br>
                            <?php echo date('F-d-Y'); ?>
                        </td>
                    </tr>
                    <br>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-2">
            <label>SUPPLIER:</label>
        </div>
        <div class="col-sm-6">

        </div>
        <div class="col-sm-1">
            <label>SHIP TO: </label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <table class="table table-bordered table-sm" style="font-size: 15px">
                <tbody>
                    <tr class="text-center">
                        <td style="font-weight: bold"><?php echo $supplier_data['vendor_name'] ?></td>
                    </tr>
                    <tr class="text-center">
                        <td><?php echo $supplier_data['vendor_address'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-3">

        </div>
        <div class="col-sm-4">
            <table class="table table-bordered table-sm" style="font-size: 15px">
                <tbody>
                    <tr class="text-center">
                        <td style="font-weight: bold">
                            <b>
                                VINCULUM TECH ENTERPRISE
                            </b>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>#70 NATIONAL ROAD., PUTATAN, MUNTINLUPA CITY</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12">
            Attention: <text type="text" id="attention_to_po"></text>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered table-sm" style="font-size: 15px">
                <tbody>
                    <tr>
                        <td width="10%" style="font-weight: bold" class="text-center" colspan="3">Requestor</td>

                        <td width="30%" style="font-weight: bold" class="text-center" rowspan="3"><br>MODEL / DESCRIPTIONS</td>
                        <td width="20%" style="font-weight: bold" class="text-center" colspan="3">PROJECT NAME & REFERENCE</td>
                    </tr>
                    <tr>
                        <td width="10%" class="text-center" colspan="3"><text id="requestor_name_po"></text></td>
                        <td width="10%" class="text-center" colspan="3"><?php echo $requisition_id_result ?></td>
                    </tr>
                    <tr>
                        <td width="10%" class="text-center">ITEM NO.</td>
                        <td width="10%" class="text-center">QTY</td>
                        <td width="10%" class="text-center">UNIT</td>
                        <td width="10%" class="text-center">DELIVERY DATE</td>
                        <td width="10%" class="text-center">UNIT PRICE</td>
                        <td width="10%" class="text-center">TOTAL</td>
                    </tr>
                    <?php foreach ($items_details as $row) : ?>
                        <tr>
                            <td width="10%" class="text-center"><?php echo $item_id ?></td>
                            <td width="10%" class="text-center"><?php echo number_format($row->qty) ?></td>
                            <td width="10%" class="text-center"><?php echo $row->unit ?></td>
                            <td width="10%" class="text-center"><?php echo $row->description ?></td>
                            <td width="10%" class="text-center"></td>
                            <td width="10%" class="text-right"><?php echo number_format($row->unit_cost, 2) ?></td>
                            <td width="10%" class="text-right"><?php echo number_format($row->qty * $row->unit_cost, 2) ?></td>
                        </tr>
                        <?php $item_id = $item_id + 1 ?>
                    <?php endforeach ?>
                    <tr>
                        <td colspan="7" style="font-weight: bold" class="text-center">***NOTHING FOLLOWS***</td>
                    </tr>
                    <tr>
                        <td colspan="4" rowspan="2" style="font-weight: bold" class="text-center"></td>
                        <td width="10%" colspan="2" class="text-right"> SUB TOTAL AMOUNT
                            <br> NET OF VAT
                            <br> PLUS 12% VAT
                        </td>
                        <td width="10%" class="text-right" colspan="2">PHP <?php echo number_format($sub_total, 2) ?>
                            <br><text id="net_of_vat_po"></text>
                            <br><text id="vat_po">
                        </td>

                    </tr>
                    <tr>
                        <td width="10%" style="font-weight: bold" colspan="2" class="text-right">TOTAL AMOUNT(PHP)</td>
                        <td width="10%" style="font-weight: bold" class="text-right"> PHP <text id="total_po"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <h6>
                <b>Terms and Conditions: </b>
                This Purchase Order(PO) becomes the exclusive agreement between
                <b> Vinculum Technologies </b>
                and Supplier/s for the good subject to the standard Terms and Conditions contained herein.
            </h6>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10 offset-1">
            <h6>
                1. Supplier must provide the Delivery Receipt(DR), Warranty Slip(WS), or Sales Invoice(SI)
                <br>
                2.All Delivered or purchased items will be checked based on the stated information above
                <br>
                3. Testing and commisioning must be conducted by unit supplier unless otherwise the defective items must replaced
                <br>
                4. Supplier must deliver all purchased items based on the committed delivery schedule
                <br>
                5. <b>Vinculum Technologies</b> will penalize supplier without prior notice in terms of problem deliver such as late delivery, move delivery date, etc.
                <br>
                6. Terms of Payment:
                <b>
                    <?php if ($supplier_data['vendor_terms'] == "00") {
                        echo "COD";
                    } elseif ($supplier_data['vendor_terms'] == "01") {
                        echo "DATED CHECK";
                    } elseif ($supplier_data['vendor_terms'] == "02") {
                        echo "7 DAYS PDC";
                    } elseif ($supplier_data['vendor_terms'] == "03") {
                        echo "15 DAYS PDC";
                    } elseif ($supplier_data['vendor_terms'] == "04") {
                        echo "30 DAYS PDC";
                    } elseif ($supplier_data['vendor_terms'] == "05") {
                        echo "45 DAYS PDC";
                    } elseif ($supplier_data['vendor_terms'] == "06") {
                        echo "60 DAYS PDC";
                    } elseif ($supplier_data['vendor_terms'] == "07") {
                        echo "90 DAYS PDC";
                    }
                    elseif ($supplier_data['vendor_terms'] == "08") {
                        echo "21 DAYS PDC";
                    }
                    ?>
                </b>

            </h6>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <h6>
                <b>
                    PREPARED BY: VERONICA SEMBRANO
                </b>
            </h6>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-9">
            <h6>RECOMMENDING APPROVAL:</h6>
        </div>
        <div class="col-sm-3">
            <h6>APPROVED BY:</h6>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-9">
            <h6>
                <b>
                    ENGR. GINELOU NIÑO T. GARZON
                </b>
            </h6>
        </div>
        <div class="col-sm-3">
            <h6>
                <b>
                    MARVIN G. LUCAS
                </b>
            </h6>
        </div>
    </div>

</body>



<!-- Modal for Generate P.O. -->
<div class="modal fade" id="generate-po" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-m" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Generate P.O.</b></h5>
            </div>
            <?php echo form_open('POController/generate_po_validate', ["id" => "Modal-Generate-PO"]) ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="requestor_name">Requestor</label>
                            <select type="text" name="requestor_name" id="requestor_name" class="form-control select2">
                                <option value="">---Please Select---</option>
                                <?php foreach ($employee_list as $row) : ?>
                                    <option value="<?php echo $row->lastname . " ," . $row->firstname . " " . $row->middlename ?>">
                                        <?php echo $row->id . " --- " . $row->lastname . " ," . $row->firstname . " " . $row->middlename ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label for="attention_to">Attention to:</label>
                            <input type="text" class="form-control text-center text-bold" id="attention_to" name="attention_to" placeholder="Ex: Mr. / Ms. / Mrs. Antonette">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label for="po_vat">Vat Inclusive</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="po_vat" id="po_vat" value="<?php echo number_format($vat_amount, 2) ?>">
                                Vat 12%
                            </label>
                        </div>
                        <input type="hidden" name="net_of_vat" id="net_of_vat" value="<?php echo number_format($net_of_vat, 2) ?>">
                        <input type="hidden" name="sub_total" id="sub_total" value="<?php echo number_format($sub_total, 2) ?>">
                        <input type="hidden" name="total_amount" id="total_amount" value="<?php echo number_format($total_amount, 2) ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> DONE</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>



<!-- Modal for Items List -->
<div class="modal fade view-items" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <b class="modal-title">Items List</b>
            </div>
            <?php echo form_open('POController/update_items_status_to_proceed', ["id" => "form-proceed-generatepo-req"]) ?>
            <div class="modal-body text-center">
                <input type="hidden" name="po_id" value="<?php echo $po_id ?>">
                <table class="table table-bordered table-xl" id="table-reqitems">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Item No.</th>
                            <th>Item Description</th>
                            <th>Item Qty</th>
                            <th>Item Unit</th>
                            <th>Item Unit Price</th>
                            <th>Item Total Price</th>
                            <th>Date Needed</th>
                            <th>Item Purpose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $item_id = 1;
                        $total_price = 0;
                        $sub_total = 0; ?>
                        <?php foreach ($items_details_modal as $row) : ?>
                            <?php $sub_total = $row->qty * $row->unit_cost; ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input" name="reqid[]" value="<?php echo $row->id ?>" checked>
                                </td>
                                <td><?php echo $item_id ?></td>
                                <td><?php echo $row->description ?></td>
                                <td><?php echo number_format($row->qty) ?></td>
                                <td><?php echo $row->unit ?></td>
                                <td><?php echo number_format($row->unit_cost, 2) ?></td>
                                <td><?php echo number_format($sub_total, 2) ?></td>
                                <td><?php echo $row->date_needed ?></td>
                                <td><?php echo $row->purpose ?></td>
                            </tr>
                            <?php $item_id = $item_id + 1;
                            $total_price = $total_price + $sub_total; ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <div class="text-right">
                    <b>Total Price: <?php echo number_format($total_price, 2); ?></b>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-edit"></i> PROCEED</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>

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

<script type="text/javascript">
    <?php if ($this->uri->segment(1) == 'generate-po') : ?>
        $(".view-items").modal({
            backdrop: 'static',
            keyboard: false
        });
    <?php elseif ($this->uri->segment(1) == 'generate-po-proceed') : ?>
        $("#generate-po").modal({
            backdrop: 'static',
            keyboard: false
        });
    <?php endif ?>

    $('#Modal-Generate-PO').submit(function(e) {
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

                    $('#requestor_name_po').html($('#requestor_name').val());
                    $('#attention_to_po').html($('#attention_to').val());

                    var po_vat = document.getElementById("po_vat").value;

                    if (!document.getElementById('po_vat').checked) {
                        $('#vat_po').html($('').val());
                        $('#total_po').html($('#sub_total').val());
                        $('#net_of_vat_po').html($('').val());
                    } else {
                        $('#vat_po').html($('#po_vat').val());
                        $('#total_po').html($('#total_amount').val());
                        $('#net_of_vat_po').html($('#net_of_vat').val());
                    }



                    $(':submit').removeAttr('disabled', 'disabled');
                    $('.loading-modal').modal('hide');
                    $('#generate-po').modal('hide');
                    //toastr.success("Success! Proceed please proceed.");
                    me[0].reset();

                    window.setTimeout(function() {
                        window.addEventListener("load", window.print());
                    }, 500);
                } else {
                    $(':submit').removeAttr('disabled', 'disabled');
                    $('.loading-modal').modal('hide');

                    toastr.error(response.errors);

                }
            }
        });
    });

    //Form Accept Item Requests
    $('#form-proceed-generatepo-req').submit(function(e) {
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
                    me[0].reset();

                    window.setTimeout(function() {
                        window.location = '<?php echo site_url('generate-po-proceed/') . $po_id ?>';
                    }, 1000);
                } else {
                    $(':submit').removeAttr('disabled', 'disabled');
                    $('.loading-modal').modal('hide');
                    toastr.error(response.errors);

                }

            }
        });
    });
</script>