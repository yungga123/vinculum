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
			$this->load->model('ToolsModel');
			$this->load->model('CovidSurveyModel');
			$this->load->model('JobOrderModel');
			
			$api_url = 'https://api.quotable.io/random';

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
			$data['tools_count'] = $this->ToolsModel->count_tools();
			$data['results_today_event'] = $this->CalendarModel->get_events_by_date();
			$data['count_ctc'] = $this->CovidSurveyModel->get_all_covidsurvey_data();
			$data['count_joborder_pending'] = $this->JobOrderModel->count_joborder('');
			$data['count_joborder_accepted'] = $this->JobOrderModel->count_joborder('Accepted');
			$data['count_jo_phone_support'] = $this->JobOrderModel->count_jo_phone_support();
			//$data['count_joborder_filed'] = $this->JobOrderModel->count_joborder('Filed');


			$month = date('m');
			$day = date('d');
			if ($month == '01' && $day == '01') {
				$this->TechniciansModel->update_vlsl_to_default([
					'sl_credit' => '12',
					'vl_credit' => '12'
					]);
			}

			

			if ($sock = @fsockopen('www.google.com', 80)) {
				$data['random_quote'] = json_decode(file_get_contents($api_url));
			}
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('dashboard/dashboard');
			$this->load->view('templates/footer');
			$this->load->view('dashboard/script');

			} else {
				redirect('','refresh');
			}
	}
}
