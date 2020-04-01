<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
	

	public function index() {

		if($this->session->userdata('logged_in')) {
			$this->load->helper('site_helper');
			$this->load->model('ItemsModel');
			$this->load->model('DispatchFormsModel');
			$this->load->model('CustomersModel');
			$this->load->model('TechniciansModel');
			$this->load->model('PulloutsModel');
			$this->load->model('CalendarModel');

			$data = html_variable();
			$data['title'] = 'Dashboard';
			$data['dashboard'] = ' active';
			$data['items_menu_display'] = ' none';
			$data['countDispatch'] = $this->DispatchFormsModel->countDispatch();
			$data['direct_item_count'] = $this->ItemsModel->get_all_itemMasterlist_data('Direct');
			$data['indirect_item_count'] = $this->ItemsModel->get_all_itemMasterlist_data('Indirect');
			$data['customer_count'] = $this->CustomersModel->count_vtCustomer();
			$data['technicians_count'] = $this->TechniciansModel->countTechnicians();
			$data['pullouts_count'] = $this->PulloutsModel->countPullouts();
			$data['results_today_event'] = $this->CalendarModel->get_events_by_date();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('dashboard/dashboard');
			$this->load->view('templates/footer');

			} else {
				redirect('','refresh');
			}
	}
}
