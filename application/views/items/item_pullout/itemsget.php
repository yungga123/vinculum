
<?php foreach ($results as $row) { ?>
		<?php echo form_open('ItemsController/ItemGetValidate/'.$row->itemCode,["id" => "addPulloutForm"]) ?>
		<div class="row">
			<div class="col-md-12">

				<div id="the-message"></div>
				
				<div class="form-group">
				<label class="control-label" for="item_code">Item Code</label>
				<input class="form-control" type="text" name="item_code" id="item_code" readonly="" value="<?php echo $row->itemCode ?>">
				</div>

				<div class="form-group">
					<label class="control-label" for="item_name">Item Name</label>
					<input class="form-control" type="text" name="item_name" id="item_name" readonly="" value="<?php echo $row->itemName ?>">
				</div>

				<div class="form-group">
					<label class="control-label" for="item_type">Item Type</label>
					<input class="form-control" type="text" name="item_type" id="item_type" readonly="" value="<?php echo $row->itemType ?>">
				</div>

				<div class="form-group">
					<label class="control-label" for="item_stocks">No. of Stocks to pull-out</label>
					<input class="form-control" id="item_stocks" type="text" name="item_stocks" value="<?php echo $row->stocks ?>">
				</div>

				<div class="form-group">
					<label class="control-label" for="pull_out_to">Pull-out to</label>
					<select class="form-control" name="pull_out_to" id="pull_out_to">
						<option value="">---Please Select Customer---</option>
						<?php foreach ($customers as $row): ?>
							<option value="<?php echo $row->id ?>"><?php echo $row->customer_name ?></option>
						<?php endforeach ?>
						
					</select>
				</div>

				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label class="control-label" for="discount">Discount in SRP</label>
							<select class="form-control" name="discount" id="discount">
								<option value="0">No Discount</option>
								<option value="0.03">3%</option>
								<option value="0.05">5%</option>
								<option value="0.10">10%</option>
								<option value="0.15">15%</option>
								<option value="0.20">20%</option>
								<option value="0.25">25%</option>
								<option value="0.30">30%</option>
								<option value="0.35">35%</option>
								<option value="0.40">40%</option>
								<option value="0.50">50%</option>
								<option value="0.60">60%</option>
								<option value="0.70">70%</option>
								<option value="0.80">80%</option>
								<option value="0.90">90%</option>
							</select>
						</div>
					</div>	
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-send-o"></i> Pull-out</button>
			</div>
		</div>
		<?php echo form_close() ?>

<script>
	
</script>

<?php } ?>

<?php if (count($results)==0): ?>

	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center"><label class="label label-danger">ITEM NOT REGISTERED!</label></h3>
	
		</div>
	</div>
	
<?php endif ?>
