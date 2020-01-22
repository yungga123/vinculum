<?php
defined('BASEPATH') or exit('No direct script access allowed');


class ItemInLogsModel extends CI_Model {

	public function insert($data) {
		$this->db->insert("item_in_logs",$data);
	}

}