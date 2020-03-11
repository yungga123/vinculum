<?php
defined('BASEPATH') or die('Access Denied');

class PullOutsController extends CI_Controller {

	public function index() {
		if($this->session->userdata('logged_in')) {
			
			$this->load->model('CustomersModel');
			$customer_results = $this->CustomersModel->getVtCustomersByName();

			$this->load->helper('site_helper');

			$data = html_variable();
			$data['title'] = 'Scanned Item';
			$data['items_menu_status'] = ' menu-open';
			$data['items_menu_display'] = ' block';
			$data['pullout_items'] = ' active';
			$data['ul_items'] = ' active';
			$data['customer_results'] = $customer_results;


			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('items/item_pullout/item_pullout');
			$this->load->view('templates/footer');
		} else {
			redirect('', 'refresh');
		}

	}

	public function getSearchItem() {
		$this->load->model('ItemsModel');
		$results = $this->ItemsModel->getItemsBySearchLike($this->input->post('search_item'));

		$output['success'] = false;

		if ($this->input->post('search_item') == "") {
			
			$data = '<td colspan=12 class="text-center" style="font-weight: bold;">PLEASE ENTER ITEM NAME OR ITEM CODE</td>';	
				
		} elseif (count($results) != 0) {
			$output['success'] = true;
			foreach ($results as $row) {
				$sub_array = array();
				$sub_array[] = '<tr>';
				$sub_array[] = '<td><button class="btn btn-danger">Pullout</button></td>';
				$sub_array[] = '<td>'.$row->itemCode.'</td>';
				$sub_array[] = '<td>'.$row->itemName.'</td>';
				$sub_array[] = '<td>'.$row->itemType.'</td>';
				$sub_array[] = '<td>'.$row->itemSupplierPrice.'</td>';
				$sub_array[] = '<td>'.$row->itemPrice.'</td>';
				$sub_array[] = '<td>'.$row->stocks.'</td>';
				$sub_array[] = '<td>'.$row->date_of_purchase.'</td>';
				$sub_array[] = '<td>'.$row->location.'</td>';
				$sub_array[] = '<td>'.$row->supplier.'</td>';
				$sub_array[] = '<td>'.$row->encoder.'</td>';
				$sub_array[] = '</tr>';
				
				$data[] = $sub_array;
			}
		} else {
			$sub_array = array();
			$sub_array[] = '<td colspan=12 class="text-center" style="font-weight: bold;">NO RESULTS</td>';

			$data = $sub_array;
		}

		$output['data'] = $data;
		$output['success_msg'] = 'Success! Item/s found!';
		$output['error_msg'] = 'Oh no! No Item found!';

		echo json_encode($output);

	}

}