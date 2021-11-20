<?php
defined('BASEPATH') or die('Access Denied');

class ConsumeablesController extends CI_Controller {

    public function __construct() {
        Parent::__construct();
        $this->load->model("ConsumeablesModel");
		$this->load->library('form_validation');
    }

    public function index() {
        if($this->session->userdata('logged_in')) {
			
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Consumeables';
			$data['consumeables'] = ' active';
			$data['ul_items_tree'] = ' active';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('consumeables/consumeables');
			$this->load->view('templates/footer');
			$this->load->view('consumeables/script');
		} else {
			redirect('','refresh');
		}
    }

	public function prf() {
        if($this->session->userdata('logged_in')) {
			
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Project Request Form';
			$data['consumeables'] = ' active';
			$data['ul_items_tree'] = ' active';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('consumeables/prf');
			$this->load->view('templates/footer');
			$this->load->view('consumeables/script');
		} else {
			redirect('','refresh');
		}
    }

	function new_blank_order_summary() 
  {
      $data = array(
        'project_name'=>$this->input->post('project_name'),
		'project_activity'=>$this->input->post('project_activity'),
		'date_issued'=>$this->input->post('date_issued')
          );
     $this->ConsumeablesModel->order_summary_insert($data);
	
	$this->load->helper('site_helper');
	$data = html_variable();
	$data['title'] = 'Project Request Form';
	$this->load->view('templates/header', $data);
	$this->load->view('templates/navbar');
    $this->load->view('consumeables/prf');
	$this->load->view('templates/footer');
	$this->load->view('consumeables/script');
  }
}