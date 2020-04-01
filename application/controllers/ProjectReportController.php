<?php
defined('BASEPATH') or die('Access Denied');

class ProjectReportController extends CI_Controller {

	public function __construct() {
        Parent::__construct();
        $this->load->model("ProjectReportModel");
    }

    public function index() {
    	if($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Project Report';
			$data['project_report'] = ' menu-open';
			$data['project_report_href'] = ' active';
			$data['project_report_add'] = ' active';
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('project_report/project_report');
			$this->load->view('templates/footer');
		} else {
			redirect('','refresh');
		}
    }
}