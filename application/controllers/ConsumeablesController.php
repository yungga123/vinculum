<?php
defined('BASEPATH') or die('Access Denied');

class ConsumeablesController extends CI_Controller {

    public function __construct() {
        Parent::__construct();
        $this->load->model("ConsumeablesModel");
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

}