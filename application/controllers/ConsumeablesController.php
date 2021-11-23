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
		'date_requested'=>$this->input->post('date_requested'),
		'project_activity'=>$this->input->post('project_activity'),
		'date_issued'=>$this->input->post('date_issued'),
		'indirect_items'=>$this->input->post('indirect_items'),
		'quantity'=>$this->input->post('quantity'),
		'remarks'=>$this->input->post('remarks'),
		'available'=>$this->input->post('available'),
		'direct_items'=>$this->input->post('direct_items'),
		'tools'=>$this->input->post('tools'),
		'prepared_by'=>$this->input->post('prepared_by'),
		'check_by'=>$this->input->post('check_by'),
		'person_in_charge'=>$this->input->post('person_in_charge')
          );
     $this->ConsumeablesModel->order_summary_insert($data);
	
	$this->load->helper('site_helper');
	$data = html_variable();
	$data['title'] = 'Project Request Form';
	$this->load->view('templates/header', $data);
	$this->load->view('templates/navbar');
    $this->load->view('consumeables/prf_view');
	$this->load->view('templates/footer');
	$this->load->view('consumeables/script');
  }
}