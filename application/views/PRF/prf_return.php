<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Return Form</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <?php echo form_open('PRFController/return_prf_validate', ["id" => "form-returnprf-validate"]) ?>
        <input type="hidden" name="prf_id" value="<?php echo $prf_id; ?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3>Project Name: <?php echo $client_name; ?></h3>
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-check"></i> Proceed</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="returned_by">Returned By:</label>
                                    <select type="text" name="returned_by" id="returned_by" class="form-control select2">
                                        <option value="">---Please Select---</option>
                                        <?php foreach ($personnel_list as $row) : ?>
                                            <?php if ($row->id == "FITS202020601" || $row->id == "FITS6202020" || $row->id == "20100418" ||     $row->id == "TSE021521" || $row->id == "TSE020921" || $row->id == "AS071421" || $row->id == "IC080221") : ?>
                                                <option value="<?php echo $row->id; ?>" <?php if ($returned_id == $row->id) {
                                                                                            echo 'selected';
                                                                                        } ?>>
                                                    <?php echo $row->lastname . ', ' . $row->firstname . ' ' . $row->middlename ?>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                                </option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="date_returned">Date Returned:</label>
                                    <input type="date" name="date_returned" class="form-control" placeholder="" value="<?php echo $date_returned; ?>">
                                </div>
                                <div class="col-sm-4">
                                    <div class="bootstrap-timepicker">
                                        <label>Time Returned:</label>
                                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="time_returned" data-target="#timepicker" value="<?php echo $time_returned; ?>" />
                                            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Indirect Items:</h4>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-2 offset-sm-6">
                                    <label for="indirect_consumed_qty">Consumed:</label>
                                </div>
                                <div class="col-sm-1 offset-sm-1">
                                    <label for="indirect_returns_qty">Returns:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for="indirect_item_name">Item Name</label>
                                </div>
                                <div class="col-sm-1">
                                    <label for="indirect_item_qty">Item Qty</label>
                                </div>
                                <div class="col-sm-1">
                                    <label for="indirect_consumed_qty">Qty</label>
                                </div>
                                <div class="col-sm-2">
                                    <label for="indirect_consumed_remarks">Remarks</label>
                                </div>
                                <div class="col-sm-1">
                                    <label for="indirect_return_qty">Qty</label>
                                </div>
                                <div class="col-sm-2">
                                    <label for="indirect_return_remarks">Remarks</label>
                                </div>
                            </div>

                            <?php foreach ($prfindirectitems as $row1) : ?>
                                <div class="form-group">
                                    <input type="hidden" name="prf_indirect_items_id[]" value="<?php echo $row1->prf_items_id; ?>">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <select type="text" name="indirect_item_name[]" class="form-control">
                                                <option value="<?php echo $row1->itemCode; ?>">
                                                    <?php echo $row1->itemName ?>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" name="indirect_item_qty[]" class="form-control" value="<?php echo $row1->stock_available; ?>" readonly>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" name="indirect_consumed_qty[]" class="form-control" value="<?php echo $row1->consumed_qty ?>">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" name="indirect_consumed_remarks[]" class="form-control" value="<?php echo $row1->consumed_remarks ?>">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" name="indirect_return_qty[]" class="form-control" value="<?php echo $row1->return_qty ?>">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" name="indirect_return_remarks[]" class="form-control" value="<?php echo $row1->return_remarks ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Direct Items:</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2 offset-sm-6">
                                    <label for="direct_consumed_qty">Consumed:</label>
                                </div>
                                <div class="col-sm-1 offset-sm-1">
                                    <label for="direct_returns_qty">Returns:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for="direct_item_name">Item Name</label>
                                </div>
                                <div class="col-sm-1">
                                    <label for="direct_item_qty">Item Qty</label>
                                </div>
                                <div class="col-sm-1">
                                    <label for="direct_consumed_qty">Qty</label>
                                </div>
                                <div class="col-sm-2">
                                    <label for="direct_consumed_remarks">Remarks</label>
                                </div>
                                <div class="col-sm-1">
                                    <label for="direct_return_qty">Qty</label>
                                </div>
                                <div class="col-sm-2">
                                    <label for="direct_return_remarks">Remarks</label>
                                </div>
                            </div>
                            <?php foreach ($prfdirectitems as $row1) : ?>
                                <div class="form-group">
                                    <input type="hidden" name="prf_direct_items_id[]" value="<?php echo $row1->prf_items_id; ?>">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <select type="text" name="direct_item_name[]" class="form-control">
                                                <option value="<?php echo $row1->itemCode; ?>">
                                                    <?php echo $row1->itemName ?>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" name="direct_item_qty[]" class="form-control" value="<?php echo $row1->stock_available; ?>" readonly>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" name="direct_consumed_qty[]" class="form-control" value="<?php echo $row1->consumed_qty ?>">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" name="direct_consumed_remarks[]" class="form-control" value="<?php echo $row1->consumed_remarks ?>">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" name="direct_return_qty[]" class="form-control" value="<?php echo $row1->return_qty ?>">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" name="direct_return_remarks[]" class="form-control" value="<?php echo $row1->return_remarks ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tools Items:</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2 offset-sm-6">
                                    <label for="tools_consumed_qty">Consumed:</label>
                                </div>
                                <div class="col-sm-1 offset-sm-1">
                                    <label for="tools_returns_qty">Returns:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for="tools_item_name[]">Item Name</label>
                                </div>
                                <div class="col-sm-1">
                                    <label for="tools_item_qty[]">Item Qty</label>
                                </div>
                                <div class="col-sm-1">
                                    <label for="tools_consumed_qty[]">Qty</label>
                                </div>
                                <div class="col-sm-2">
                                    <label for="tools_consumed_remarks[]">Remarks</label>
                                </div>
                                <div class="col-sm-1">
                                    <label for="tools_return_qty[]">Qty</label>
                                </div>
                                <div class="col-sm-2">
                                    <label for="tools_return_remarks[]">Remarks</label>
                                </div>
                            </div>
                            <?php foreach ($prftoolsitems as $row1) : ?>
                                <div class="form-group add-direct">
                                    <input type="hidden" name="prf_tools_items_id[]" value="<?php echo $row1->prf_items_id; ?>">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <select type="text" name="tools_item_name[]" class="form-control">
                                                <option value="<?php echo $row1->code; ?>">
                                                    <?php echo $row1->description ?>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" name="tools_item_qty[]" class="form-control" value="<?php echo $row1->stock_available; ?>" readonly>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" name="tools_consumed_qty[]" class="form-control" value="<?php echo $row1->consumed_qty ?>">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" name="tools_consumed_remarks[]" class="form-control" value="<?php echo $row1->consumed_remarks ?>">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" name="tools_return_qty[]" class="form-control" value="<?php echo $row1->return_qty ?>">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" name="tools_return_remarks[]" class="form-control" value="<?php echo $row1->return_remarks ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close() ?>
    </section>
</div>