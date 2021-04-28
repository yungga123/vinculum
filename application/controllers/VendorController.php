<?php
defined('BASEPATH') or die('Access Denied');

class VendorController extends CI_Controller {

	function validation_rules($usage){
		$quotation_rule = '';
    	$quotation_errors = array();
    	$quotation_discount_rule = '';
    	$quotation_discount_errors = array();
    	if ($usage == 'add') {
    		$vendor_rule = 'trim|max_length[50]|required|is_unique[vendor.vendor_code]';
    		$vendor_errors = [
					'is_unique' => 'Vendor Code is already exsisting',
					'max_length' => 'Vendor Code field exceeds maximum character limit.'
				];
    	} elseif ($usage == 'edit') {
    		$vendor_rule = 'trim|max_length[50]';
    		$vendor_errors = [
					'max_length' => 'Vendor Code field exceeds maximum character limit.'
				];
		}

		$rules = [
			[
				'field' => 'vendor_code',
				'label' => 'Vendor Code',
				'rules' => $vendor_rule,
				'errors' => $vendor_errors
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
				'rules' => 'trim|max_length[50]',
				'errors' => [
					'max_length' => 'You are allowed only of 50 characters'
				]
			],
			[
				'field' => 'vendor_date',
				'label' => 'Vendor Date of Partnership',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Provide Date of Partnership']
			],
			[
				'field' => 'brand_name[]',
				'label' => 'Brand Name',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Provide Brand name']
			],
			[
				'field' => 'brand_solutions[]',
				'label' => 'Brand Solutions',
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
			]
		];
		return $rules;
	}

    public function __construct() {
        Parent::__construct();
       $this->load->model("VendorModel");
    }

    public function index() {
        if($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Vendor Database';
			$data['li_vendor_list'] = ' active';
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('vendor/vendor_datatable');
			$this->load->view('templates/footer');
			$this->load->view('vendor/script');
		} else {
			redirect('','refresh');
		}
    }

	public function Vendor_Update($vendor_code){
		if($this->session->userdata('logged_in')) {
            
            $this->load->model('VendorModel');
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Update Vendor Details';
            $data['li_vendor_list'] = ' active';
            $data['vendor_data'] = $this->VendorModel->get_vendor_data($vendor_code);
			$data['brand_data'] = $this->VendorModel->get_brand_data($vendor_code);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('vendor/vendor_edit');
			$this->load->view('templates/footer');
            $this->load->view('vendor/script');
            
		} else {
			redirect('','refresh');
		}
	}

	public function update_vendor_validate() {
        $validate = [
			'success' => false,
			'errors' => ''
		];
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$usage = 'edit';
		$this->form_validation->set_rules($this->validation_rules($usage));

		if ($this->form_validation->run()) {
            $validate['success'] = true;

            $vendor_code = $this->input->post('vendor_code');

            $this->VendorModel->update_vendor($vendor_code,[
                'name' => $this->input->post('vendor_name'),
                'address' => $this->input->post('vendor_address'),
                'contact_number' => $this->input->post('vendor_contact'),
                'contact_person' => $this->input->post('vendor_contact_person'),
                'industry_classification' => $this->input->post('vendor_classification'),
				'terms_and_condition' => $this->input->post('vendor_terms'),
				'date' => $this->input->post('vendor_date')
            ]);

            //Update Existing Request Item
			$brand_id_data = array();
			
			for ($i=0; $i < count($this->input->post('brand_data_id')); $i++) {

				$brand_sub_data = array();

				if ($this->input->post('brand_data_id')[$i] != '') {

					$this->VendorModel->update_vendor_brand(
						$this->input->post('brand_data_id')[$i],
						[
							'brand_name' => $this->input->post('brand_name')[$i],
                            'solution' => $this->input->post('brand_solutions')[$i],
                            'classification_level' => $this->input->post('brand_classification')[$i],
                            'ranking' => $this->input->post('brand_ranking')[$i]
						]
					);

					$brand_sub_data[] = $this->input->post('brand_data_id')[$i];
					$brand_id_data[] = $brand_sub_data;
				} else {

					$this->VendorModel->insert_vendor_brand([
						'brand_id' => $this->input->post('vendor_code'),
                        'brand_name' => $this->input->post('brand_name')[$i],
                        'solution' => $this->input->post('brand_solutions')[$i],
                        'classification_level' => $this->input->post('brand_classification')[$i],
                        'ranking' => $this->input->post('brand_ranking')[$i]
					]);

					$brand_sub_data[] = $this->VendorModel->get_new_added_vendor_brand($vendor_code);
					$brand_id_data[] = $brand_sub_data;

				}
			}
			$this->VendorModel->remove_vendor_brand($brand_id_data,$vendor_code);
			//end of update existing request item


		} 
		else {
		    $validate['errors'] = validation_errors();
		}
        echo json_encode($validate);
    }

	public function get_vendor() {

		$fetch_data = $this->VendorModel->vendor_datatable();

	

		$data = array();
		foreach($fetch_data as $row) {
		

			if ($row->date != '0000-00-00') {
				$date = date_format(date_create($row->date),'F d, Y');
				
			$sub_array = array();
			$sub_array[] = $row->vendor_code;
			$sub_array[] = $row->name;
			$sub_array[] = $row->address;
			$sub_array[] = $row->contact_number;
			$sub_array[] = $row->contact_person;
			$sub_array[] = $row->industry_classification;
			$sub_array[] = $row->terms_and_condition;
			$sub_array[] = $date;

			$sub_array[] = '
			<a href="'.site_url('vendor-update/'.$row->vendor_code).'" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i></a>
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

		$usage = 'add';
		$this->form_validation->set_rules($this->validation_rules($usage));

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			date_default_timezone_set('Asia/Manila');
			$date = $this->input->post('vendor_date', 'Y-m-d');
			 
			$this->VendorModel->insert_vendor([
				'vendor_code' => $this->input->post('vendor_code'),
				'name' => $this->input->post('vendor_name'),
				'address' => $this->input->post('vendor_address'),
				'contact_number' => $this->input->post('vendor_contact'),
				'contact_person' => $this->input->post('vendor_contact_person'),
				'industry_classification' => $this->input->post('vendor_classification'),
				'terms_and_condition' => $this->input->post('vendor_terms'),
				'date' => $date
			]);

			 //add request_items
			 $count_brand = count($this->input->post('brand_name'));
			 $results = $this->VendorModel->get_vendor_brands();

			 for ($i=0; $i < $count_brand; $i++) { 
				 $this->VendorModel->insert_vendor_brand([
					 'brand_id' => $this->input->post('vendor_code'),
					 'brand_name' => $this->input->post('brand_name')[$i],
					 'solution' => $this->input->post('brand_solutions')[$i],
					 'classification_level' => $this->input->post('brand_classification')[$i],
					 'ranking' => $this->input->post('brand_ranking')[$i]
				 ]);
			 }
				
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);
	}

	public function get_vendor_brand($vendor_code) {
        $results = $this->VendorModel->get_brand_data($vendor_code);

        $json_data['results'] = $results;

        echo json_encode($json_data);

    }

	public function delete_vendor() {
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
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
            $validate['success'] = true;


            $this->VendorModel->update_vendor($this->input->post('vendor_id_del'),[
                'is_deleted' => '1'
            ]);
            
		} 
		else {
		    $validate['errors'] = validation_errors();
		}
        echo json_encode($validate);
    }
}