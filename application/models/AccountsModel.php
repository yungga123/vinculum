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
			b.position,
			a.class,
			a.status
			');
		$this->db->from('accounts as a');
		$this->db->join('technicians as b','a.emp_id=b.id','left');
		$this->db->where('a.username', $username);
		$this->db->where('a.password', $password);
		$this->db->where('a.status', 'active');
		$this->db->limit(1);

		$query = $this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		} else{
			return false;
		}
	}

	public function checkusername($username){
		$this->db->select('*');
		$this->db->from('accounts');
		$this->db->where('username', $username);
		$this->db->limit(1);

		$query = $this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		} else{
			return false;
		}
	}

	public function checkemployeeid($employee_id){
		$this->db->select('*');
		$this->db->from('accounts');
		$this->db->where('emp_id', $employee_id);
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

	public function CreateAccount($data) {
		$this->db->insert('accounts', $data);
	}
}