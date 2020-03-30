<?php

class CalendarModel extends CI_Model
{

	public function get_events() {

	    return $this->db->get("calendar_events")->result();
	}

	public function add_events($data) {
		$this->db->insert('calendar_events',$data);
	}


}

?>