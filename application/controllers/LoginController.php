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

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('');
	}

}
