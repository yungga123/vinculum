<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
	

	public function index() {

		if($this->session->userdata('logged_in')) {
			$this->load->helper('site_helper');
			$this->load->model('ItemsModel');
			$this->load->model('DispatchFormsModel');

			$data = html_variable();
			$data['title'] = 'Dashboard';
			$data['dashboard'] = ' active';
			$data['items_menu_display'] = ' none';
			$data['countItem'] = $this->ItemsModel->countItems();
			$data['countDispatch'] = $this->DispatchFormsModel->countDispatch();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('dashboard/dashboard');
			$this->load->view('templates/footer');

			} else {
				redirect('','refresh');
			}
	}
}