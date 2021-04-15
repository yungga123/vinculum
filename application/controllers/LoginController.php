<?php
defined('BASEPATH') or exit('No direct script access allowed.');


class LoginController extends CI_Controller
{
	
	public function index() {
		if($this->session->userdata('logged_in')){
			redirect('dashboard');
		} else {
			$this->load->view('loginpage');
		}
		
	}


	public function login_validate() {

		$rules =[
			[
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'trim|required'
			],
			[
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|required|callback_confirm_pw'
			]];


		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			
			redirect('dashboard');

		} else {
			
			$this->load->view('loginpage');

		}

	}

	function confirm_pw($password){

		$this->load->model('AccountsModel', 'login');

		$username = $this->input->post('username');
		$result = $this->login->checkUser($username,$password);
		if($result){
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = $arrayName = array('id' => $row->id, 'username' => $row->username, 'password' => $row->password , 'lastname' => $row->lastname, 'firstname' => $row->firstname, 'middlename' => $row->middlename);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return true;
		} else{ 
			$this->form_validation->set_message('confirm_pw', 'Invalid username or password.');
			return false;
		}
	}

	public function requisition_login_validate() {
		$validate = [
			'success' => false,
			'errors' => ''

		];

			$rules =[
				
				[
					'field' => 'accpasscode',
					'label' => 'Password',
					'rules' => 'trim|callback_confirmreq_pw'
				]
				
				];
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;
		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

	function confirmreq_pw(){
		$purchasing = "purchasingquery";
		$engr = "vinculumquery";

		if($this->input->post('pendingpasscode') != ""){
			if($this->input->post('pendingpasscode') == $engr){
				return true;
			}else{
				$this->form_validation->set_message('confirmreq_pw', 'Invalid username or password.');
				return false;
			}
		}

		elseif($this->input->post('accpasscode') != ""){
			if($this->input->post('accpasscode') == $purchasing){
				return true;
			}else{
				$this->form_validation->set_message('confirmreq_pw', 'Invalid username or password.');
				return false;
			}
		}

		elseif($this->input->post('filedpasscode') != ""){
			if($this->input->post('filedpasscode') == $purchasing){
				return true;
			}else{
				$this->form_validation->set_message('confirmreq_pw', 'Invalid username or password.');
				return false;
			}
		}
		else{
			$this->form_validation->set_message('confirmreq_pw', 'Invalid username or password.');
			return false;
		}
		


	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('');
	}

}
