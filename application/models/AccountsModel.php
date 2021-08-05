<?php

class AccountsModel extends CI_Model {
	
	public function checkUser($username,$password){
		$this->db->select('id,username,password,lastname,firstname,middlename,class');
		$this->db->from('accounts');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->limit(1);

		$query = $this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		} else{
			return false;
		}
	}

	public function updateUser($data,$id) {
		$this->db->where('id', $id);
		return $this->db->update('accounts', $data);
	}

	public function updateUserByName($data,$username) {
		$this->db->where('username', $username);
		return $this->db->update('accounts', $data);
	}
}