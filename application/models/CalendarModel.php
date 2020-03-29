<?php

class CalendarModel extends CI_Model
{

	public function get_events() {

	    return $this->db->get("calendar_events")->result();
	}


}

?>