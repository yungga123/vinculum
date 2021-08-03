<?php
defined('BASEPATH') or die('Access Denied');
?>

	<!-- Full Calendar (Schedules) -->
	<?php if ($this->uri->segment(1)=='schedules'): ?>
	<script>
		
	  $(function () {

	  	//Schedule Today Modal for Schedules
	  	$('.schedule-today-info').modal();

	    /* initialize the external events
	     -----------------------------------------------------------------*/
	    function ini_events(ele) {
	      ele.each(function () {

	        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
	        // it doesn't need to have a start or end
	        var eventObject = {
	          title: $.trim($(this).text()) // use the element's text as the event title
	        }

	        // store the Event Object in the DOM element so we can get to it later
	        $(this).data('eventObject', eventObject)

	        // make the event draggable using jQuery UI
	        $(this).draggable({
	          zIndex        : 1070,
	          revert        : true, // will cause the event to go back to its
	          revertDuration: 0  //  original position after the drag
	        })

	      })
	    }

	    ini_events($('#external-events div.external-event'))

	    /* initialize the calendar
	     -----------------------------------------------------------------*/
	    //Date for the calendar events (dummy data)
	    var date = new Date()
	    var d    = date.getDate(),
	        m    = date.getMonth(),
	        y    = date.getFullYear()

	    var Calendar = FullCalendar.Calendar;
	    var calendarEl = document.getElementById('calendar');

	    var calendar = new Calendar(calendarEl, {
			headerToolbar: {
				left  : 'prev,next today',
				center: 'title',
				right : 'dayGridMonth,timeGridWeek,timeGridDay'
			},
      		themeSystem: 'bootstrap',
	      	events: [
	      	<?php foreach ($results as $row) { ?>
	      		{
	      		  id 			: '<?php echo $row->ID ?>',
		          title          : "<?php echo addslashes($row->title) ?>",
		          start          : "<?php echo $row->start ?>",
		          end            : "<?php echo $row->end ?>",
		          backgroundColor: "<?php 
			          	if ($row->type == 'installation') {
			          		echo null;
			          	} else if ($row->type == 'service') {
			          		echo '#E1D942';
			          	} else if ($row->type == 'payables') {
			          		echo '#DB5C5C';
			          	} else if ($row->type == 'holiday') {
			          		echo '#6BBA44';
			          	} else if ($row->type == 'meeting') {
							echo '#6c757d';
						}

			          ?>",
		          borderColor    : "<?php 
			          	if ($row->type == 'installation') {
			          		echo '#007bff';
			          	} else if ($row->type == 'service') {
			          		echo '#ffc107';
			          	} else if ($row->type == 'payables') {
			          		echo '#dc3545';
			          	} else if ($row->type == 'holiday') {
			          		echo '#28a745';
			          	} else if ($row->type == 'meeting') {
							echo '#6c757d';
						}

			          ?>",
			      	extendedProps: {
			        description		: '<?php echo addslashes(json_encode($row->description)) ?>',
			      	type 			: '<?php echo $row->type ?>'
			      }
			      
		        },
			<?php } ?>
	      	
	      ],
	      eventClick: function(info) {

	      	//console.log(info.event.id);
	      	$('#event_id_edit').val(info.event.id);
	      	$('#event_title_edit').val(info.event.title);
	      	$('#event_sd_edit').val(moment(info.event.start).format('YYYY-MM-DD HH:mm:ss'));
	      	$('#event_ed_edit').val(moment(info.event.end).format('YYYY-MM-DD HH:mm:ss'));
	      	$('#event_desc_edit').val(JSON.parse(info.event.extendedProps.description));
	      	$('#event_type_edit').val(info.event.extendedProps.type);
	      	$('#event_daterange_edit').val(moment(info.event.start).format('MMM DD, YYYY hh:mm A') + ' - ' + moment(info.event.end).format('MMM DD, YYYY hh:mm A'));


	      	$('.update-schedule').modal();
	      }
	    });

	    calendar.render();
	  })
	</script>
	<?php endif ?>
	
	<!-- Forms AJAX -->
	<script>
		<?php if ($this->uri->segment(1) == 'schedules'): ?>
		//Form Add Event
		$('#form-add-event').submit(function(e) {
		 	e.preventDefault();
		 	
		 	// var a = '<a href="<?php //echo site_url("salesdispatch-table") ?>"><u>Go to Dispatch Table</u></a>';
		 	var me = $(this);
		 	//var succ = '';

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
		 				toastr.success("Success! Schedule was added! Refreshing in 5 seconds!");
		 				
						me[0].reset();

						$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

						window.setTimeout(function() {
						    window.location = '<?php echo site_url('schedules') ?>';
						}, 5000);
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		 });

		//Form Update Event
		$('#form-update-event').submit(function(e) {
		 	e.preventDefault();
		 	
		 	// var a = '<a href="<?php //echo site_url("salesdispatch-table") ?>"><u>Go to Dispatch Table</u></a>';
		 	var me = $(this);
		 	//var succ = '';

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
		 				toastr.success("Success! Schedule was updated! Refreshing in 5 seconds!");
		 				
						me[0].reset();

						$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

						window.setTimeout(function() {
						    window.location = '<?php echo site_url('schedules') ?>';
						}, 5000);
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.error(response.errors);
		 			}

		 		}
		 	});


		});	
		<?php endif ?>
	</script>

	<!-- Date Range Pickers -->
	<script>

		$('#event_daterange').daterangepicker({
			 timePicker: true,
			 locale: {
			 	format: 'MMM DD, YYYY hh:mm A'
			 }
		});

		$('#event_daterange').on('hide.daterangepicker', function(ev, picker) {

			$('#event_sd').val(picker.startDate.format('YYYY-MM-DD HH:mm:ss'));
			$('#event_ed').val(picker.endDate.format('YYYY-MM-DD HH:mm:ss'));

		});

		$('#event_daterange_edit').daterangepicker({
			 timePicker: true,
			 locale: {
			 	format: 'MMM DD, YYYY hh:mm A'
			 }
		});

		$('#event_daterange_edit').on('hide.daterangepicker', function(ev, picker) {

			$('#event_sd_edit').val(picker.startDate.format('YYYY-MM-DD HH:mm:ss'));
			$('#event_ed_edit').val(picker.endDate.format('YYYY-MM-DD HH:mm:ss'));

		});
	</script>



</body>
</html>