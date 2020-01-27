
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="m-0 text-dark">Schedules Installations</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="content-body">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
           <div class="card">   
              <div id="calendar"></div>               
           </div>
          </div>
        </div>
      </div>
  </div>
</div>

<!-- New Schedules-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Add Calendar Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <?php echo form_open(site_url("ScheduleController/add_event"), array("class" => "form-horizontal", "id" => "form_addEvent")) ?>
          <div class="form-group">
              <label for="Event Name" class="col-md-4 label-heading">Customer Name</label>
              <div class="col-md-12 ui-front">
                <input type="text" class="form-control" name="name" id="name" />
              </div>
          </div>
          <div class="form-group">
              <label for="p-in" class="col-md-4 label-heading">Description</label>
              <div class="col-md-12 ui-front">
                <input type="text" class="form-control" name="description" id="description" />
              </div>
          </div>
          <div class="form-group">
              <label for="p-in" class="col-md-4 label-heading">Start Date</label>
              <div class="col-md-12">
                <input type="text" class="form-control start_date" name="start_date" readonly />
              </div>
          </div>
          <div class="form-group">
              <label for="p-in" class="col-md-4 label-heading">End Date</label>
              <div class="col-md-12">
                <input type="text" class="form-control end_date" name="end_date" readonly />
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Add Event" />
          <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>

<!-- Update Schedule -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Update Calendar Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <?php echo form_open(site_url("scheduleController/edit_event"), array("class" => "form-horizontal")) ?>
        <div class="form-group">
                  <label for="p-in" class="col-md-4 label-heading">Customer Name</label>
                  <div class="col-md-12 ui-front">
                      <input type="text" class="form-control" name="name2" value="" id="name2" />
                  </div>
          </div>
          <div class="form-group">
                  <label for="p-in" class="col-md-4 label-heading">Description</label>
                  <div class="col-md-12 ui-front">
                      <input type="text" class="form-control" name="description2" id="description2" />
                  </div>
          </div>
          <div class="form-group">
                  <label for="p-in" class="col-md-4 label-heading">Start Date</label>
                  <div class="col-md-12">
                      <input type="text" class="form-control" name="start_date2" id="start_date2" readonly />
                  </div>
          </div>
          <div class="form-group">
                  <label for="p-in" class="col-md-4 label-heading">End Date</label>
                  <div class="col-md-12">
                      <input type="text" class="form-control" name="end_date2" id="end_date2" readonly />
                  </div>
          </div>
          <div class="form-group">
                  <label for="p-in" class="col-md-3 label-heading">Delete Event</label>
                  <input type="checkbox" name="delete" value="1">
          </div>
                  <input type="hidden" name="eventid" id="event_id" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Update Event" />
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>

<!-- Schedule  Notif -->
<div class="modal fade" id="todayScheduleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Schedule(s) for today</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th width="20%">Start time</th>
                    <th width="20%">End time</th>
                    <th width="30%">Customer Name</th>
                    <th width="30%">Description</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($results as $row): ?>
                    <tr>
                      <?php $start_time = date_create($row->start) ?>
                      <?php $end_time = date_create($row->end) ?>
                        <td><?php echo date_format($start_time,"M d, Y g:i A") ?></td>
                        <td><?php echo date_format($end_time,"M d, Y g:i A") ?></td>
                        <td><?php echo $row->title ?></td>
                        <td><?php echo $row->description ?></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
