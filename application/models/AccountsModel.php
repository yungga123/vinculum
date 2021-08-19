<?php

class AccountsModel extends CI_Model {
	
	public function checkUser($username,$password){
		$this->db->select('
			a.id,
			a.username,
			a.password,
			a.emp_id,
			b.lastname,
			b.firstname,
			b.middlename,
			class
			');
		$this->db->from('accounts as a');
		$this->db->join('technicians as b','a.emp_id=b.id','left');
		$this->db->where('a.username', $username);
		$this->db->where('a.password', $password);
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