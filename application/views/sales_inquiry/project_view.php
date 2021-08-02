<?php
defined('BASEPATH') or die('Access Denied');

date_default_timezone_set('Asia/Manila');
$date = date('m d, Y');

if($this->session->userdata('add')){
    $id = $new_client_id;
}

else{
    foreach($edit_project as $row){
        $project_data_result = [
            'project_client_id' => $row->customer_id,
            'project_sales_edit' => $row->sales_incharge,
            'project_status_edit' => $row->project_status,
            'project_type_edit' => $row->project_type,
            'project_branch_edit' => $row->branch
        ];
    }

    foreach($edit_branch as $row){
        $project_branch_result = [
            'project_branch_id' => $row->branch_id,
            'project_branch_edit' => $row->branch_name,
            'project_branch_address_edit' => $row->branch_address
        ];
    }
}


?>



<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark"><?php echo $title ?></h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							Project Details
						</div>
                
                <?php if($this->session->userdata('add')): ?>
                <!-- ADD FUNCTION -->
                <?php if($form_id == "newclient"): ?>
                    <?php echo form_open('SalesInquiryController/salesinquiryaddprojectvalidate',["id" => "form-add-project"]) ?>
                    <input type="hidden" name="form_id" value="<?php echo $form_id ?>" >
                <?php else: ?>
                    <?php echo form_open('SalesInquiryController/salesinquiryaddprojectvalidate',["id" => "form-add-existingclient-project"]) ?>
                    <input type="hidden" name="form_id" value="<?php echo $form_id ?>" >
                <?php endif ?>

                    <input type="hidden" name="client_id" value="<?php echo $id ?>" >
						<div class="card-body">
							<div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                             <p>
                                                <label for="project_sales_incharge">Sales Incharge</label>
                                                <select id="project_sales_incharge" name="project_sales_incharge" class="form-control">
                                                    <option value="">Please Select Sales Incharge</option>
                                                    <?php foreach ($results as $row): ?>
                                                        <?php if($row->id == "01021415" || $row->id == "PTS09092020" || $row->id =="02021415" || $row->id =="24120518" || $row->id =="PS021021" || $row->id =="SEO041921"): ?>
                                                            <option value="<?php echo $row->id ?>">
                                                                    <?php echo $row->id. " -- " .$row->lastname. ", " .$row->firstname. " " .$row->middlename  ?>
                                                            </option>
                                                        <?php else: ?>
                                                        
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                </select>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                             <p>
                                                <label for="project">Project</label>
                                                <select id="project" name="project" class="form-control">
                                                        <option value="">---Please Select---</option>
                                                        <option>CCTV</option>
                                                        <option>ACS</option>
                                                        <option>Time Attendance</option>
                                                        <option>Gate Barrier</option>
                                                        <option>PABX</option>
                                                        <option>PABGM</option>
                                                        <option>E-Fence</option>
                                                        <option>Home Alarm</option>
                                                        <option>Video Intercom</option>
                                                </select>
                                            </p>
                                        </div> 
                                    </div>
                                <input type="hidden" name="project_status" value="none">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <p>
                                                <label for="project_status">Status</label>
                                                <select name="project_status" class="form-control">
                                                    <option value="">---Please Select---</option>
                                                    <option value="50%">50% --- Developing Solution</option>
                                                    <option value="70%">70% --- Evaluation</option>
                                                    <option value="90%">90% --- Negotiation</option>
                                                    <option value="100%">100% --- Booked</option>
                                                </select>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <p>
                                                <label for="project_branch">Select Branch</label>
                                                <button type="button" class="btn btn-success btn-sm delete-task-btn float-right" data-toggle="modal" data-target="#modal_add_branch"><i class="fas fa-plus" aria-hidden="true"></i> Add Branch</button>
                                                <select name="project_branch" class="form-control">
                                                    <option value="">Please Select Branch Name</option>
                                                    <?php foreach ($branch_list as $row): ?>
                                                        <option value="<?php echo $row->branch_id ?>">
                                                            <?php echo $row->branch_name ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </p>
                                        </div>
                                    </div>
					        </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="float-right">
                                                <button type="button" class="btn btn-danger btn-sm delete-task-btn"><i class="fas fa-times" aria-hidden="true"></i> DELETE TASK</button>
                                                <button type="button" class="btn btn-success btn-sm add-task-btn"><i class="fas fa-plus" aria-hidden="true"></i> ADD TASK</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row add-task">
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label for="project_task" class="control-label">Task</label>
                                            <textarea type="text" name="project_task[]" class="form-control" placeholder="Enter Task"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="task_date">Select Task Date</label>
                                        <div class="input-group">
                                            <input class="form-control" type="date" name="task_date[]" placeholder="Select Date">
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                    <label for="quotation_vat">Remarks</label>
		                      			<div class="form-check">
		                        			<label class="form-check-label">
		                            			<input type="checkbox" class="form-check-input others" name="remarks[]" value="1">
		                              				Mark As Done
		                          			</label>
		                      			</div>
                                    </div>
                                </div>
                            
                                
                            </div>
						</div>
                        <div class="card-footer">
                            <div class="row float-right">
                                <button type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_add_vendor"> <i class="fas fa-plus"></i> Add Project</button>
                            </div>
                        </div>
                    <?php echo form_close() ?>
                <?php elseif($this->session->userdata('edit')): ?>
                <!-- EDIT FUNCTION -->
                <?php if($form_id == "edit_newclient"): ?>
                    <?php echo form_open('SalesInquiryController/salesinquiryupdateprojectvalidate',["id" => "form-edit-project"]) ?>
                    <input type="hidden" name="form_id" value="<?php echo $form_id ?>" >
                <?php else: ?>
                    <?php echo form_open('SalesInquiryController/salesinquiryupdateprojectvalidate',["id" => "form-edit-existingclient-project"]) ?>
                    <input type="hidden" name="form_id" value="<?php echo $form_id ?>" >
                <?php endif ?>
                    <input type="hidden" name="client_id" value="<?php echo $project_data_result['project_client_id'] ?>" >
                    <input type="hidden" name="branch_id" value="<?php echo $project_branch_result['project_branch_id'] ?>" >
                    <input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id ?>" >
						<div class="card-body">
							<div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                             <p>
                                                <label for="project_sales_incharge">Sales Incharge</label>
                                                <select name="project_sales_incharge" class="form-control">
                                                    <?php foreach ($edit_sales_list as $row): ?>
                                                        <?php if($row->id == "01021415" || $row->id == "PTS09092020" || $row->id =="02021415" || $row->id =="24120518" || $row->id =="PS021021"): ?>
                                                            <option value="<?php echo $row->id ?>" <?php if ($project_data_result['project_sales_edit'] == $row->id) { echo 'selected';} ?> >
                                                                    <?php echo $row->id. " -- " .$row->lastname. ", " .$row->firstname. " " .$row->middlename  ?>
                                                            </option>
                                                        <?php else: ?>
                                                        
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                </select>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                             <p>
                                                <label for="project">Project</label>
                                                <select name="project" class="form-control">
                                                        <option value="">---Please Select---</option>
                                                        <option <?php if ($project_data_result['project_type_edit'] == "CCTV") { echo 'selected';} ?> >CCTV</option>
                                                        <option <?php if ($project_data_result['project_type_edit'] == "ACS") { echo 'selected';} ?> >ACS</option>
                                                        <option <?php if ($project_data_result['project_type_edit'] == "Time Attendance") { echo 'selected';} ?> >Time Attendance</option>
                                                        <option <?php if ($project_data_result['project_type_edit'] == "Gate Barrier") { echo 'selected';} ?> >Gate Barrier</option>
                                                        <option <?php if ($project_data_result['project_type_edit'] == "PABX") { echo 'selected';} ?> >PABX</option>
                                                        <option <?php if ($project_data_result['project_type_edit'] == "PABGM") { echo 'selected';} ?> >PABGM</option>
                                                        <option <?php if ($project_data_result['project_type_edit'] == "E-Fence") { echo 'selected';} ?> >E-Fence</option>
                                                        <option <?php if ($project_data_result['project_type_edit'] == "Home Alarm") { echo 'selected';} ?> >Home Alarm</option>
                                                        <option <?php if ($project_data_result['project_type_edit'] == "Video Intercom") { echo 'selected';} ?> >Video Intercom</option>
                                                </select>
                                            </p>
                                        </div> 
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                             <p>
                                                <label for="project_status">Status</label>
                                                <select name="project_status" class="form-control">
                                                    <option value="">---Please Select---</option>
                                                    <option value="50%" <?php if ($project_data_result['project_status_edit'] == "50%") { echo 'selected';} ?> >50% --- Developing Solution</option>
                                                    <option value="70%" <?php if ($project_data_result['project_status_edit'] == "70%") { echo 'selected';} ?> >70% --- Evaluation</option>
                                                    <option value="90%" <?php if ($project_data_result['project_status_edit'] == "90%") { echo 'selected';} ?> >90% --- Negotiation</option>
                                                    <option value="100%" <?php if ($project_data_result['project_status_edit'] == "100%") { echo 'selected';} ?> >100% --- Booked</option>
                                                </select>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <p>
                                                <label for="project_branch">Select Branch</label>
                                                <button type="button" class="btn btn-success btn-sm delete-task-btn float-right" data-toggle="modal" data-target="#modal_add_branch"><i class="fas fa-plus" aria-hidden="true"></i> Add Branch</button>
                                                <select name="project_branch" class="form-control">
                                                    <option value="">Please Select Branch Name</option>
                                                    <?php foreach ($branch_list as $row): ?>
                                                        <option value="<?php echo $row->branch_id ?>" <?php if ($project_data_result['project_branch_edit'] == $row->branch_name) { echo 'selected';} ?>>
                                                            <?php echo $row->branch_id." --- ".$row->branch_name ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </p>
                                        </div>
                                        <input type="hidden" name="project_address" value="none">
                                    </div>
					            </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="float-right">
                                                <button type="button" class="btn btn-danger btn-sm delete-task-btn"><i class="fas fa-times" aria-hidden="true"></i> DELETE TASK</button>
                                                <button type="button" class="btn btn-success btn-sm add-task-btn"><i class="fas fa-plus" aria-hidden="true"></i> ADD TASK</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <?php foreach($edit_task as $row ): ?>
                                    <?php
                                    $task_date = date_format(date_create($row->date_of_task),'m d, Y');
                                        if($row->date_of_task == "0000-00-00"){
                                            $color='';
                                        }
                                        elseif($row->mark_as_read == 0 && $date >= $task_date){
                                            $color='style="background-color: #FF0000; color:#FFFFFF"';
                                        }
                                        else{
                                            $color='';      
                                        }
                                    ?>
                                <div class="row add-task">
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label for="project_task" class="control-label">Task</label>
                                            <input type="hidden" name="task_id[]" value="<?php echo $row->task_id ?>">
                                            <textarea type="text" id="textarea" name="project_task[]" <?php echo $color ?> class="form-control" placeholder="Enter Task"><?php echo $row->project_task ?></textarea>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="task_date">Select Task Date</label>
                                            <div class="input-group">
                                                <input class="form-control" type="date" name="task_date[]" placeholder="Select Date" value="<?php echo $row->date_of_task ?>">
                                            </div>
                                    </div>
                                    
                                    <div class="col-sm-1">
                                        <label for="quotation_vat">Remarks</label>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input others" name="remarks[]" value="1" <?php if($row->mark_as_read == 1) { echo 'checked';} ?>>
                                                    Mark As Done
                                            </label>
                                        </div>
                                    </div>
                                    
                                </div>
                                <?php endforeach ?>
                            </div>
						</div>
                        <div class="card-footer">
                            <div class="row float-right">
                                <button type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_add_vendor"> <i class="fas fa-edit"></i> <?php echo $button_title ?></button>
                            </div>
                        </div>
                    <?php echo form_close() ?>
                <?php endif ?>                      

					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- Modal Add Branch-->
<div class="modal fade" id="modal_add_branch" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-m" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Add Branch</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        <?php echo form_open('SalesInquiryController/add_branch',["id" => "modal-add-branch"]) ?>
            <div class="modal-body">
                <input type="hidden" name="client_id" value="<?php echo $id ?>" >
                <div class="form-group">
                    <label for="project_branch" class="control-label">Branch Name</label>
                    <input type="text" name="project_branch" class="form-control" placeholder="Enter Project Branch">
                </div>
                <div class="form-group">
                    <label for="project_address" class="control-label">Address</label>
                        <textarea type="text" rows="3" name="project_address" class="form-control" placeholder="Enter Project Address"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> Add</button>
            </div>
        <?php echo form_close() ?>
        </div>
    </div>
</div>