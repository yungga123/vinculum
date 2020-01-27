<?php
defined('BASEPATH') or die('Access Denied');

class ScheduleController extends CI_Controller {

     public function __construct() {
        Parent::__construct();
        $this->load->model("CalendarModel");
    }



     public function index() {

     	if($this->session->userdata('logged_in')){

     		$this->load->model('CalendarModel');

     		$results = $this->CalendarModel->today_events();
     		
     		$this->load->helper('site_helper');
  			$data = html_variable();
  			$data['title'] = 'Vinculum: Scheduling';
        $data['schedules'] = ' active';
        $data['results'] = $results;
       

     	  	$this->load->view('templates/header', $data);
          $this->load->view('templates/navbar');
          	$this->load->view('schedules', array());
          	$this->load->view('templates/footer');

		} else {
			redirect('', 'refresh');
		}

	     	
	}

	      public function get_events() {
	     // Our Start and End Dates

	     date_default_timezone_set('Asia/Manila');
	     $start = $this->input->get("start");
	     $end = $this->input->get("end");

	     

	     $startdt = new DateTime('now'); // setup a local datetime
	     $startdt->setTimestamp($start); // Set the date based on timestamp
	     $start_format = $startdt->format('Y-m-d H:i:s');

	     $enddt = new DateTime('now'); // setup a local datetime
	     $enddt->setTimestamp($end); // Set the date based on timestamp
	     $end_format = $enddt->format('Y-m-d H:i:s');

	     $events = $this->CalendarModel->get_events($start_format, $end_format);

	     $data_events = array();

	     foreach($events->result() as $r) {

	         $data_events[] = array(
	             "id" => $r->ID,
	             "title" => $r->title,
	             "description" => $r->description,
	             "end" => $r->end,
	             "start" => $r->start
	         );
	     }

	     echo json_encode(array("events" => $data_events));
	     exit();
 	}

 	public function add_event() 
	{

		$validate = [
    		'success' => false,
    		'errors' => ''
    	];

    	$rules = [
    		[
    			'field' => 'name',
    			'label' => 'Event Name',
    			'rules' => 'trim|required'
    		],
    		[
    			'field' => 'description',
    			'label' => 'Description',
    			'rules' => 'trim|required'
    		]
    	];
    	
    	$this->form_validation->set_error_delimiters('<p>• ','</p>');
    	$this->form_validation->set_rules($rules);

    	if ($this->form_validation->run()) {
			$validate['success'] = true;
			
			date_default_timezone_set('Asia/Manila');
		    /* Our calendar data */
		    $name = $this->input->post("name", TRUE);
		    $desc = $this->input->post("description", TRUE);
		    $start_date = $this->input->post("start_date", TRUE);
		    $end_date = $this->input->post("end_date", TRUE);

		    if(!empty($start_date)) {
		       $sd = DateTime::createFromFormat("Y/m/d H:i", $start_date);
		       $start_date = $sd->format('Y-m-d H:i:s');
		       $start_date_timestamp = $sd->getTimestamp();
		    } else {
		       $start_date = date("Y-m-d H:i:s", time());
		       $start_date_timestamp = time();
		    }

		    if(!empty($end_date)) {
		       $ed = DateTime::createFromFormat("Y/m/d H:i", $end_date);
		       $end_date = $ed->format('Y-m-d H:i:s');
		       $end_date_timestamp = $ed->getTimestamp();
		    } else {
		       $end_date = date("Y-m-d H:i:s", time());
		       $end_date_timestamp = time();
		    }

		    $this->CalendarModel->add_event(array(
		       "title" => $name,
		       "description" => $desc,
		       "start" => $start_date,
		       "end" => $end_date
		       )
		    );
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);
	}

	public function edit_event()
     {
     	  date_default_timezone_set('Asia/Manila');
          $eventid = intval($this->input->post("eventid"));
          $event = $this->CalendarModel->get_event($eventid);
          if($event->num_rows() == 0) {
               echo"Invalid Event";
               exit();
          }

          $event->row();

          /* Our calendar data */
          $name = $this->input->post("name2");
          $desc = $this->input->post("description2");
          $start_date = $this->input->post("start_date2");
          $end_date = $this->input->post("end_date2");
          $delete = intval($this->input->post("delete"));

          if(!$delete) {

               if(!empty($start_date)) {
                    $sd = DateTime::createFromFormat("Y/m/d H:i", $start_date);
                    $start_date = $sd->format('Y-m-d H:i:s');
                    $start_date_timestamp = $sd->getTimestamp();
               } else {
                    $start_date = date("Y-m-d H:i:s", time());
                    $start_date_timestamp = time();
               }

               if(!empty($end_date)) {
                    $ed = DateTime::createFromFormat("Y/m/d H:i", $end_date);
                    $end_date = $ed->format('Y-m-d H:i:s');
                    $end_date_timestamp = $ed->getTimestamp();
               } else {
                    $end_date = date("Y-m-d H:i:s", time());
                    $end_date_timestamp = time();
               }

               $this->CalendarModel->update_event($eventid, array(
                    "title" => $name,
                    "description" => $desc,
                    "start" => $start_date,
                    "end" => $end_date,
                    )
               );

          } else {
               $this->CalendarModel->delete_event($eventid);
          }

          redirect(site_url("schedules"));
     	  }





}

?>