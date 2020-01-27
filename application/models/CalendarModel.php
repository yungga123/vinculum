<?php

class CalendarModel extends CI_Model
{

	public function get_events($start, $end)
	{
	    return $this->db->where("start >=", $start)->where("end <=", $end)->get("calendar_events");
	}

	public function add_event($data)
	{
	    $this->db->insert("calendar_events", $data);
	}

	public function get_event($id)
	{
	    return $this->db->where("ID", $id)->get("calendar_events");
	}

	public function update_event($id, $data)
	{
	    $this->db->where("ID", $id)->update("calendar_events", $data);
	}

	public function delete_event($id)
	{
	    $this->db->where("ID", $id)->delete("calendar_events");
	}

	public function count_today_event() {
		date_default_timezone_set('Asia/Manila');

		$where = "(start BETWEEN '".date("Y-m-d")." 00:00:00' AND '".date("Y-m-d")." 23:59:59') OR '".date("Y-m-d")." 00:00:00' BETWEEN start AND end";

		$this->db->select('*');
		$this->db->from('calendar_events');
		$this->db->where($where);
		return $this->db->count_all_results();
		
	}

	public function today_events() {
		date_default_timezone_set('Asia/Manila');

		$where = "(start BETWEEN '".date("Y-m-d")." 00:00:00' AND '".date("Y-m-d")." 23:59:59') OR '".date("Y-m-d")." 00:00:00' BETWEEN start AND end";

		$this->db->select('*');
		$this->db->from('calendar_events');
		$this->db->where($where);
		return $this->db->get()->result();
		
	}


}

?>