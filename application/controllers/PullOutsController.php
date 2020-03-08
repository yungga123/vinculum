<?php
defined('BASEPATH') or die('Access Denied');

class PullOutsController extends CI_Controller {

	public function index() {
		if($this->session->userdata('logged_in')) {
			$this->load->model('PullOutsModel');
			$results = $this->PullOutsModel->viewPullout();
			$sum_of_pullouts = $this->PullOutsModel->sum_of_pullouts();

			$this->load->helper('site_helper');

			$data = html_variable();
			$data['title'] = 'Scanned Item';
			$data['items_menu_status'] = ' menu-open';
			$data['items_menu_display'] = ' block';
			$data['pullout_items'] = ' active';
			$data['ul_items'] = ' active';
			$data['results'] = $results;
			$data['sum_of_pullouts'] = $sum_of_pullouts;


			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('items/item_pullout/item_pullout');
			$this->load->view('templates/footer');
		} else {
			redirect('', 'refresh');
		}

	}

}