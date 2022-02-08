<?php
defined('BASEPATH') or die('Access Denied');

class VendorController extends CI_Controller
{

	function validation_rules()
	{

		$rules = [
			[
				'field' => 'vendor_code',
				'label' => 'Vendor Code',
				'rules' => 'trim'
			],
			[
				'field' => 'vendor_name',
				'label' => 'Vendor Name',
				'rules' => 'trim|required|max_length[100]',
				'errors' => [
					'required' => 'Please provide Vendor Name'
				]
			],
			[
				'field' => 'vendor_address',
				'label' => 'Vendor Address',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Please Provide Vendor Address.']
			],
			[
				'field' => 'vendor_contact',
				'label' => 'vendor Contact Number',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Provide Contact Number'
				]
			],
			[
				'field' => 'vendor_contact_person',
				'label' => 'Vendor Contact Person',
				'rules' => 'trim|required|max_length[50]',
				'errors' => [
					'required' => 'Provide Contact Person',
					'max_length' => 'You are allowed only of 50 characters'
				]
			],
			[
				'field' => 'vendor_classification',
				'label' => 'Vendor Classification',
				'rules' => 'trim|max_length[100]',
				'errors' => [
					'max_length' => 'You are allowed only of 100 characters in Classification'
				]
			],
			[
				'field' => 'vendor_terms',
				'label' => 'Vendor Terms and Condition',
				'rules' => 'trim|max_length[50]|required',
				'errors' => [
					'max_length' => 'You are allowed only of 50 characters',
					'required' => 'Please Provide Vendor Terms'
				]
			],
			[
				'field' => 'vendor_ranking',
				'label' => 'Vendor Ranking',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Provide Vendor Ranking'
				]
			],
			[
				'field' => 'vendor_technical_name',
				'label' => 'Vendor Technical Name',
				'rules' => 'trim'
			],
			[
				'field' => 'vendor_technical_contact',
				'label' => 'Vendor Technical Contact Number',
				'rules' => 'trim'
			],
			[
				'field' => 'vendor_technical_email',
				'label' => 'Vendor Technical Email Address',
				'rules' => 'trim'
			],
			[
				'field' => 'vendor_sales_name',
				'label' => 'Vendor Sales Name',
				'rules' => 'trim'
			],
			[
				'field' => 'vendor_sales_contact',
				'label' => 'Vendor Sales Contact Number',
				'rules' => 'trim'
			],
			[
				'field' => 'vendor_sales_email',
				'label' => 'Vendor Sales Email Address',
				'rules' => 'trim'
			],
			[
				'field' => 'vendor_date',
				'label' => 'Vendor Date of Partnership',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Provide Date of Partnership']
			],
			[
				'field' => 'vendor_category',
				'label' => 'Vendor Code',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Provide Vendor Category']
			],

			[
				'field' => 'brand_name[]',
				'label' => 'Brand Name',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Provide Brand name']
			],
			[
				'field' => 'brand_products[]',
				'label' => 'Brand Products',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Provide Brand Solutions']
			],
			[
				'field' => 'brand_classification[]',
				'label' => 'Brand Classification',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Provide Brand Classification']
			],
			[
				'field' => 'brand_ranking[]',
				'label' => 'Brand Ranking',
				'rules' => 'trim'
			],
			[
				'field' => 'brand_contact_person[]',
				'label' => 'Brand Contact Person',
				'rules' => 'trim'
			],
			[
				'field' => 'brand_contact_number[]',
				'label' => 'Brand Contact Number',
				'rules' => 'trim'
			],
			[
				'field' => 'brand_email[]',
				'label' => 'Brand Email Address',
				'rules' => 'trim'
			],
			[
				'field' => 'brand_technical_name[]',
				'label' => 'Brand Technical Person',
				'rules' => 'trim'
			],
			[
				'field' => 'brand_technical_contact[]',
				'label' => 'Brand Technical Contact Number',
				'rules' => 'trim'
			],
			[
				'field' => 'brand_technical_email[]',
				'label' => 'Brand Technical Email',
				'rules' => 'trim'
			]
		];
		return $rules;
	}

	public function __construct()
	{
		Parent::__construct();
		$this->load->model("VendorModel");
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Vendor Database';
			$data['li_vendor_list'] = ' active';
			$data['ul_purchasing_tree'] = ' active';

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('vendor/vendor_datatable');
			$this->load->view('templates/footer');
			$this->load->view('vendor/script');
		} else {
			redirect('', 'refresh');
		}
	}
	public function Vendor_Add()
	{
		if ($this->session->userdata('logged_in')) {

			$this->load->model('VendorModel');
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Update Vendor Details';
			$data['li_vendor_list'] = ' active';
			$data['ul_purchasing_tree'] = ' active';
			$data['vendor_title'] = 'Add Vendor';
			$data['vendor_button_title'] = 'Add Vendor';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('vendor/vendor_add');
			$this->load->view('templates/footer');
			$this->load->view('vendor/script');
		} else {
			redirect('', 'refresh');
		}
	}

	public function Vendor_Update($vendor_id)
	{
		if ($this->session->userdata('logged_in')) {

			$this->load->model('VendorModel');
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Update Vendor Details';
			$data['li_vendor_list'] = ' active';
			$data['ul_purchasing_tree'] = ' active';
			$data['vendor_title'] = 'Update Vendor';
			$data['vendor_button_title'] = 'Update Vendor';
			$data['vendor_data'] = $this->VendorModel->get_vendor_data($vendor_id);
			$data['brand_data'] = $this->VendorModel->get_brand_data($vendor_id);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('vendor/vendor_edit');
			$this->load->view('templates/footer');
			$this->load->view('vendor/script');
		} else {
			redirect('', 'refresh');
		}
	}

	function strReplaceAssoc(array $replace, $subject)
	{
		return str_replace(array_keys($replace), array_values($replace), $subject);
	}

	public function update_vendor_validate()
	{
		$validate = [
			'success' => false,
			'errors' => ''
		];

		$this->form_validation->set_error_delimiters('<p>• ', '</p>');

		$this->form_validation->set_rules($this->validation_rules());

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			$vendor_code = $this->input->post('vendor_code');
			$vendor_id = $this->input->post('vendor_id');
			$vendor_name = $this->input->post('vendor_name');

			// REPLACING CHARACTERS
			$replace = array(
				'_' => ' ',
				'/' => ' '
			);

			$vendor_name = $this->strReplaceAssoc($replace, $vendor_name);

			if (preg_match_all('/\b(\w)/', strtoupper($vendor_name), $m)) {
				$v = implode('', $m[1]);
			}

			$vendor_code_generated = $v . "-" . $this->input->post('vendor_terms') . "" . $this->input->post('vendor_ranking');



			$this->VendorModel->update_vendor($vendor_id, [
				'vendor_code' => $vendor_code_generated,
				'name' => $this->input->post('vendor_name'),
				'address' => $this->input->post('vendor_address'),
				'vendor_category' => $this->input->post('vendor_category'),
				'contact_number' => $this->input->post('vendor_contact'),
				'email' => $this->input->post('vendor_email'),
				'contact_person' => $this->input->post('vendor_contact_person'),
				'supplier_ranking' => $this->input->post('vendor_ranking'),
				'industry_classification' => $this->input->post('vendor_classification'),
				'terms_and_condition' => $this->input->post('vendor_terms'),
				'date' => $this->input->post('vendor_date'),
				'vendor_technical_person' => $this->input->post('vendor_technical_name'),
				'vendor_technical_contact' => $this->input->post('vendor_technical_contact'),
				'vendor_technical_email' => $this->input->post('vendor_technical_email')

			]);

			//Update Existing Request Item
			$brand_id_data = array();

			for ($i = 0; $i < count($this->input->post('brand_data_id')); $i++) {

				$brand_sub_data = array();

				if ($this->input->post('brand_data_id')[$i] != '') {

					$this->VendorModel->update_vendor_brand(
						$this->input->post('brand_data_id')[$i],
						[
			$vendor_code_generated = $v."-".$this->input->post('vendor_terms')."".$this->input->post('vendor_ranking');
			
			

				$this->VendorModel->update_vendor($vendor_id,[
					'vendor_code' => $vendor_code_generated,
					'name' => $this->input->post('vendor_name'),
					'address' => $this->input->post('vendor_address'),
					'vendor_category' => $this->input->post('vendor_category'),
					'contact_number' => $this->input->post('vendor_contact'),
					'email' => $this->input->post('vendor_email'),
					'contact_person' => $this->input->post('vendor_contact_person'),
					'supplier_ranking' => $this->input->post('vendor_ranking'),
					'industry_classification' => $this->input->post('vendor_classification'),
					'terms_and_condition' => $this->input->post('vendor_terms'),
					'date' => $this->input->post('vendor_date'),
					'vendor_technical_person' => $this->input->post('vendor_technical_name'),
					'vendor_technical_contact' => $this->input->post('vendor_technical_contact'),
					'vendor_technical_email' => $this->input->post('vendor_technical_email'),
					'vendor_bank_name' => $this->input->post('vendor_bank_name'),
					'vendor_account_name' => $this->input->post('vendor_account_name'),
					'vendor_account_number' => $this->input->post('vendor_account_number')
				]);
				
				//Update Existing Request Item
				$brand_id_data = array();
				
				for ($i=0; $i < count($this->input->post('brand_data_id')); $i++) {
	
					$brand_sub_data = array();
	
					if ($this->input->post('brand_data_id')[$i] != '') {
	
						$this->VendorModel->update_vendor_brand(
							$this->input->post('brand_data_id')[$i],
							[
								'brand_id' => $vendor_id,
								'brand_name' => $this->input->post('brand_name')[$i],
								'products' => $this->input->post('brand_products')[$i],
								'classification_level' => $this->input->post('brand_classification')[$i],
								'ranking' => $this->input->post('brand_ranking')[$i],
								'brand_contact_person' => $this->input->post('brand_contact_person')[$i],
								'brand_contact_number' => $this->input->post('brand_contact_number')[$i],
								'brand_email' => $this->input->post('brand_email')[$i],
								'brand_technical_person' => $this->input->post('brand_technical_name')[$i],
								'brand_technical_contact' => $this->input->post('brand_technical_contact')[$i],
								'brand_technical_email' => $this->input->post('brand_technical_email')[$i]
							]
						);
	
						$brand_sub_data[] = $this->input->post('brand_data_id')[$i];
						$brand_id_data[] = $brand_sub_data;
					} else {
						
						$this->VendorModel->insert_vendor_brand([
							'brand_id' => $vendor_id,
							'brand_name' => $this->input->post('brand_name')[$i],
							'products' => $this->input->post('brand_products')[$i],
							'classification_level' => $this->input->post('brand_classification')[$i],
							'ranking' => $this->input->post('brand_ranking')[$i],
							'brand_contact_person' => $this->input->post('brand_contact_person')[$i],
							'brand_contact_number' => $this->input->post('brand_contact_number')[$i],
							'brand_email' => $this->input->post('brand_email')[$i],
							'brand_technical_person' => $this->input->post('brand_technical_name')[$i],
							'brand_technical_contact' => $this->input->post('brand_technical_contact')[$i],
							'brand_technical_email' => $this->input->post('brand_technical_email')[$i]
						]
					);

					$brand_sub_data[] = $this->input->post('brand_data_id')[$i];
					$brand_id_data[] = $brand_sub_data;
				} else {

					$this->VendorModel->insert_vendor_brand([
						'brand_id' => $vendor_id,
						'brand_name' => $this->input->post('brand_name')[$i],
						'products' => $this->input->post('brand_products')[$i],
						'classification_level' => $this->input->post('brand_classification')[$i],
						'ranking' => $this->input->post('brand_ranking')[$i],
						'brand_contact_person' => $this->input->post('brand_contact_person')[$i],
						'brand_contact_number' => $this->input->post('brand_contact_number')[$i],
						'brand_email' => $this->input->post('brand_email')[$i],
						'brand_technical_person' => $this->input->post('brand_technical_name')[$i],
						'brand_technical_contact' => $this->input->post('brand_technical_contact')[$i],
						'brand_technical_email' => $this->input->post('brand_technical_email')[$i]
					]);

					$brand_sub_data[] = $this->VendorModel->get_new_added_vendor_brand($vendor_id);
					$brand_id_data[] = $brand_sub_data;
				}
			}
			$this->VendorModel->remove_vendor_brand($brand_id_data, $vendor_id);
			//end of update existing request item
		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

	public function get_vendor()
	{

		$fetch_data = $this->VendorModel->vendor_datatable();


		$data = array();
		foreach ($fetch_data as $row) {


			if ($row->date != '0000-00-00') {
				$date = date_format(date_create($row->date), 'F d, Y');

				$sub_array = array();
				$sub_array[] = $row->id;
				$sub_array[] = $row->vendor_code;
				$sub_array[] = $row->name;
				$sub_array[] = $row->address;
				$sub_array[] = $row->contact_number;
				$sub_array[] = $row->contact_person;
				$sub_array[] = $row->email;
				$sub_array[] = $row->vendor_technical_person;
				$sub_array[] = $row->vendor_technical_contact;
				$sub_array[] = $row->vendor_technical_email;

				if ($row->supplier_ranking == "AA") {
					$sub_array[] = "Rank 1";
				} elseif ($row->supplier_ranking == "BB") {
					$sub_array[] = "Rank 2";
				} elseif ($row->supplier_ranking == "CC") {
					$sub_array[] = "Rank 3";
				} elseif ($row->supplier_ranking == "DD") {
					$sub_array[] = "Rank 4";
				} elseif ($row->supplier_ranking == "EE") {
					$sub_array[] = "Rank 5";
				}

				$sub_array[] = $row->industry_classification;

				if ($row->terms_and_condition == "00") {
					$sub_array[] = "COD/CASH";
				} elseif ($row->terms_and_condition == "01") {
					$sub_array[] = "Dated Check";
				} elseif ($row->terms_and_condition == "02") {
					$sub_array[] = "7 Days";
				} elseif ($row->terms_and_condition == "03") {
					$sub_array[] = "15 Days";
				} elseif ($row->terms_and_condition == "04") {
					$sub_array[] = "30 Days";
				} elseif ($row->terms_and_condition == "05") {
					$sub_array[] = "45 Days";
				} elseif ($row->terms_and_condition == "06") {
					$sub_array[] = "60 Days";
				} elseif ($row->terms_and_condition == "07") {
					$sub_array[] = "90 Days";
				}
				elseif($row->terms_and_condition == "08"){
					$sub_array[] = "21 Days";
				}

				$sub_array[] = $date;
			$sub_array[] = $date;
			$sub_array[] = $row->vendor_bank_name;
			$sub_array[] = $row->vendor_account_name;
			$sub_array[] = $row->vendor_account_number;

				$sub_array[] = '
			<a href="' . site_url('vendor-update/' . $row->id) . '" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i></a>
			<button type="button" class="btn btn-danger text-bold btn-xs btn_vendor_del" data-toggle="modal" data-target="#delete-vendor"><i class="fas fa-trash"></i></button>
			<button type="button" class="btn btn-primary btn-xs btn_view" data-toggle="modal" data-target=".modal_view_vendor"><i class="fas fa-search"></i></button>
			';

				$data[] = $sub_array;
			}
		}

		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->VendorModel->get_all_vendor_data(),
			"recordsFiltered" => $this->VendorModel->filter_vendor_data(),
			"data" => $data
		);

		echo json_encode($output);
	}

	public function register_new_vendor()
	{
		$validate = [
			'success' => false,
			'errors' => ''
		];


		$this->form_validation->set_error_delimiters('<p>• ', '</p>');

		$this->form_validation->set_rules($this->validation_rules());

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			date_default_timezone_set('Asia/Manila');
			$date = $this->input->post('vendor_date', 'Y-m-d');
			$vendor_name = $this->input->post('vendor_name');


			if (preg_match_all('/\b(\w)/', strtoupper($vendor_name), $m)) {
				$v = implode('', $m[1]);
			}

			$vendor_code_generated = $v . "-" . $this->input->post('vendor_terms') . "" . $this->input->post('vendor_ranking');

			$this->VendorModel->insert_vendor([
				'vendor_code' => $vendor_code_generated,
				'name' => $this->input->post('vendor_name'),
				'address' => $this->input->post('vendor_address'),
				'vendor_category' => $this->input->post('vendor_category'),
				'contact_number' => $this->input->post('vendor_contact'),
				'email' => $this->input->post('vendor_email'),
				'contact_person' => $this->input->post('vendor_contact_person'),
				'supplier_ranking' => $this->input->post('vendor_ranking'),
				'industry_classification' => $this->input->post('vendor_classification'),
				'terms_and_condition' => $this->input->post('vendor_terms'),
				'vendor_technical_person' => $this->input->post('vendor_technical_name'),
				'vendor_technical_contact' => $this->input->post('vendor_technical_contact'),
				'vendor_technical_email' => $this->input->post('vendor_technical_email'),
				'vendor_sales_name' => $this->input->post('vendor_sales_name'),
				'vendor_sales_contact' => $this->input->post('vendor_sales_contact'),
				'vendor_sales_email' => $this->input->post('vendor_sales_email'),
				'terms_and_condition' => $this->input->post('vendor_terms'),
				'vendor_bank_name' => $this->input->post('vendor_bank_name'),
				'vendor_account_name' => $this->input->post('vendor_account_name'),
				'vendor_account_number' => $this->input->post('vendor_account_number'),
				'date' => $date
			]);

			//add request_items
			$count_brand = count($this->input->post('brand_name'));
			$get_vendor_id = $this->VendorModel->getVendorID();

			foreach ($get_vendor_id as $row) {
				$vendor_id = $row->id;
			}

			for ($i = 0; $i < $count_brand; $i++) {
				$this->VendorModel->insert_vendor_brand([
					'brand_id' => $vendor_id,
					'brand_name' => $this->input->post('brand_name')[$i],
					'products' => $this->input->post('brand_products')[$i],
					'classification_level' => $this->input->post('brand_classification')[$i],
					'brand_contact_person' => $this->input->post('brand_contact_person')[$i],
					'brand_contact_number' => $this->input->post('brand_contact_number')[$i],
					'brand_email' => $this->input->post('brand_email')[$i],
					'brand_technical_person' => $this->input->post('brand_technical_name')[$i],
					'brand_technical_contact' => $this->input->post('brand_technical_contact')[$i],
					'brand_technical_email' => $this->input->post('brand_technical_email')[$i],
					'brand_vendor_sales_name' => $this->input->post('brand_vendor_sales_name')[$i],
					'brand_vendor_sales_contact' => $this->input->post('brand_vendor_sales_contact')[$i],
					'brand_vendor_sales_email' => $this->input->post('brand_vendor_sales_email')[$i],
					'ranking' => $this->input->post('brand_ranking')[$i]
				]);
			}
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);
	}

	public function get_vendor_brand($vendor_code)
	{
		$results = $this->VendorModel->get_brand_data($vendor_code);

		$json_data['results'] = $results;

		echo json_encode($json_data);
	}

	public function delete_vendor()
	{
		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [

			[
				'field' => 'vendor_id_del',
				'label' => 'Vendor ID',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Select Vendor.'
				]
			]

		];

		$this->form_validation->set_error_delimiters('<p>• ', '</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;


			$this->VendorModel->update_vendor($this->input->post('vendor_id_del'), [
				'is_deleted' => '1'
			]);
		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}
}
