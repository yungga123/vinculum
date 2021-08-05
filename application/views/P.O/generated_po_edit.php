<?php
defined('BASEPATH') or die('Access Denied');


foreach ($vendor_name as $row) {
    $vendor_name_result = $row->name;
}

$total = 0;
$item_total = 0;
foreach ($po_items_list_edit as $row) {
    $item_total = $row->unit_cost * $row->qty;
    $total = $total + $item_total;
}

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Items Form Edit</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <?php echo form_open('POController/update_items_po_validate', ["id" => "form-updateitem-po"]) ?>
                    <!-- Items for request -->
                    <div class="card">
                        <div class="card-header">
                            <b>Items List for Supplier: <?php echo $vendor_name_result ?></b>
                        </div>

                        <div class="card-body">
                            <input name="po_id" type="hidden" value="<?php echo $po_id ?>">
                            <?php foreach ($po_items_list_edit as $row) : ?>
                                <div class="row add-item">
                                    <input name="item_id[]" type="hidden" value="<?php echo $row->id ?>">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <input type="text" name="description[]" class="form-control form-control-sm" placeholder="" value="<?php echo $row->description ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label for="qty">Qty</label>
                                            <input type="text" name="qty[]" class="form-control form-control-sm" placeholder="" value="<?php echo $row->qty ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label for="unit">Unit</label>
                                            <input type="text" name="unit[]" class="form-control form-control-sm" placeholder="" value="<?php echo $row->unit ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label for="unit_cost">Cost</label>
                                            <input type="text" name="unit_cost[]" class="form-control form-control-sm" placeholder="" value="<?php echo $row->unit_cost ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="date_needed">Date Needed</label>
                                            <input type="date" name="date_needed[]" class="form-control form-control-sm" placeholder="" value="<?php echo $row->date_needed ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="purpose">Purpose/s</label>
                                            <input type="text" name="purpose[]" class="form-control form-control-sm" placeholder="" value="<?php echo $row->purpose ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <div class="float-right">

                                <label class="text-bold"> Total: <b class="text-danger"><?php echo number_format($total, 2) ?></b></label>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="float-right">
                                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> SUBMIT</button>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>