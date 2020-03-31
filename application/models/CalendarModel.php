<?php

class CalendarModel extends CI_Model
{

	public function get_events() {

	    return $this->db->get("calendar_events")->result();
	}

	public function add_events($data) {
		$this->db->insert('calendar_events',$data);
	}

	public function update_events($id,$data){
		$this->db->where('id',$id);
		$this->db->update('calendar_events',$data);
	}

	public function delete_events($id){
		$this->db->where('id',$id);
		$this->db->delete('calendar_events');
	}


}

?>