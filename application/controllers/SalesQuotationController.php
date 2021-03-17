<?php
defined('BASEPATH') or die('Access Denied');

class SalesQuotationController extends CI_Controller {

    public function __construct() {
        Parent::__construct();
        $this->load->model("SalesQuotationModel");
        date_default_timezone_set('Asia/Manila');
    }

    function validation_rules($usage) {

   		$quotation_rule = '';
    	$quotation_errors = array();
    	$quotation_discount_rule = '';
    	$quotation_discount_errors = array();
    	if ($usage == 'add') {
    		$quotation_rule = 'trim|max_length[50]|required|is_unique[sales_quotation.quotation_ref]';
    		$quotation_errors = [
					'is_unique' => 'Quotation Reference Number is already exsisting',
					'max_length' => 'Reference No. field exceeds maximum character limit.'
				];
    	} elseif ($usage == 'edit') {
    		$quotation_rule = 'trim|required|max_length[500]';
    		$quotation_errors = [
					'required' => 'Please provide Tool Code.',
					'max_length' => 'Tool Code maximum characters is 500.'
				];
		}
		elseif ($usage == 'exist') {
			$quotation_rule = 'trim|max_length[50]|required|is_unique[sales_quotation.quotation_ref]';
    		$quotation_errors = [
					'is_unique' => 'Quotation Reference Number is already exsisting',
					'max_length' => 'Reference No. field exceeds maximum character limit.'
				];
		}

    	$rules = [
    		[
				'field' => 'quotation_reference_no',
				'label' => 'Reference No.',
				'rules' => $quotation_rule,
				'errors' => $quotation_errors

			],
			[
				'field' => 'quotation_discount',
				'label' => 'Discount Amount',
				'rules' => 'numeric',
				'errors' => [
					'numeric' => 'Letters and Special Characters are not allowed in Discount'
				]

			],
			[
				'field' => 'quotation_sales_name',
				'label' => 'Sales Name',
				'rules' => 'trim|required|max_length[50]',
				'errors' => [
					'required' => 'Please Select Consultant Name',
					'max_length' => 'Consultant Name maximum characters is 50.'
				]
			],
			[
				'field' => 'quotation_sales_email',
				'label' => 'Sales Email Address',
				'rules' => 'trim|required|max_length[50]|valid_email',
				'errors' => [
					'required' => 'Please provide Consultant Email Address.',
					'max_length' => 'Email maximum characters is 50.',
					'valid_email' => 'Please Enter Valid Email'
				]
			],
			[
				'field' => 'quotation_warranty',
				'label' => 'Quotation Warranty',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Fill-Up Quotation Warranty ',
				]
			],
			[
				'field' => 'quotation_customer_name',
				'label' => 'Customer Name',
				'rules' => 'trim|required|max_length[30]',
				'errors' => [
					'required' => 'Please Insert customer name.',
					'max_lengt' => 'Customer Name maximum character is 30.'
				]
			],
			[
				'field' => 'quotation_contact_person',
				'label' => 'Contact Person',
				'rules' => 'trim|required|alpha',
				'errors' => [
					'required' => 'Please provide Contact Person.',
					'alpha' => 'Only Letters are allowed for Contact Person'
				]
			],
			[
				'field' => 'quotation_contact_number',
				'label' => 'Contact Number',
				'rules' => 'trim|required|numeric',
				'errors' => [
					'required' => 'Please provide Customer Contact Number.',
					'numeric' => 'Only Numbers are allowed in contact number'
				]
			],
			[
				'field' => 'quotation_email',
				'label' => 'Email',
				'rules' => 'trim|valid_email',
				'errors' => [
					'valid_email' => 'Please Enter Valid Email Address'
				]
			],
			[
				'field' => 'quotation_customer_location',
				'label' => 'Customer Location',
				'rules' => 'trim|max_length[500]|required',
				'errors' => [
					'max_length' => 'Customer Location field exceeds maximum character limit.'
				]
			],
			[
				'field' => 'quotation_project_type',
				'label' => 'Project Type',
				'rules' => 'trim|max_length[15]|required',
				'errors' => [
					'max_length' => 'Project Type max length is 15.'
				]
			],
			[
				'field' => 'quotation_Subject',
				'label' => 'Subject',
				'rules' => 'trim'
			],
			[
				'field' => 'quotation_payment',
				'label' => 'Subject',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Enter Payment Mode'
				]
			],
			[
				'field' => 'quotation_item_description[]',
				'label' => 'Item Description',
				'rules' => 'trim|max_length[1000]|required',
				'errors' => [
					'max_length' => 'Item Description max length is 1000.'
				]
			],
			[
				'field' => 'quotation_item_qty[]',
				'label' => 'item Qty',
				'rules' => 'trim|max_length[10]|numeric|required',
				'errors' => [
					'max_length' => 'Qty length is 18.',
					'numeric' => 'Qty must contain numbers.'
				]
			],
			[
				'field' => 'quotation_item_unit[]',
				'label' => 'Item Unit',
				'rules' => 'trim|required'
			],
			[
				'field' => 'quotation_item_amount[]',
				'label' => 'Item Amount',
				'rules' => 'trim|max_length[100]|required|numeric',
				'errors' => [
					'max_length' => 'Item Amount max length is 100.',
					'numeric' => 'Letters and Special Characters not allowed'
				]
			],

			[
				'field' => 'quotation_availability[]',
				'rules' => 'trim|max_length[100]|required',
				'errors' => [
					'required' => 'Items Availability Required'
				]
			]
			
		];
		
		return $rules;
}
    public function index() {
        if($this->session->userdata('logged_in')) {
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Sales Quotation Form';
			$data['sales_quotation_status'] = ' menu-open';
			$data['sales_quotation_href'] = ' active';
			$data['make_quotation'] = ' active';

			$this->load->model('TechniciansModel');
			$results2 = $this->SalesQuotationModel->getSales();
			$data['GetSales'] = $results2;

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('sales_quotation/sales_quotation');	
			$this->load->view('templates/footer');
			$this->load->view('sales_quotation/script');

		} else {
			redirect('','refresh');
		}
    }

    public function salesquotationlist(){
    	if($this->session->userdata('logged_in')){

    		$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Sales Quotation List';
			$data['sales_quotation_status'] = ' menu-open';
			$data['sales_quotation_href'] = ' active';
			$data['sales_quotation_list'] = ' active';

    		$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('sales_quotation/sales_quotation_list');
			$this->load->view('templates/footer');
			$this->load->view('sales_quotation/script');
    	} else {
    		redirect('','refresh');
    	}
    }

    public function get_sales_quotation() {

		$fetch_data = $this->SalesQuotationModel->salesquotation_datatable();

		


		$data = array();
		foreach($fetch_data as $row) {
		

			if ($row->date_created != '0000-00-00') {
				$date = date_format(date_create($row->date_created),'F d, Y');
				
			$sub_array = array();
			$sub_array[] = $row->quotation_ref;
			$sub_array[] = $row->customer_name;
			$sub_array[] = $row->contact_person;
			$sub_array[] = $row->contact_number;
			$sub_array[] = $row->email;
			$sub_array[] = $row->customer_location;
			$sub_array[] = $row->project_type;
			$sub_array[] = $row->subject;
			$sub_array[] = $row->lastname.', '.$row->firstname.' '.$row->middlename;
			$sub_array[] = $date;

			$sub_array[] = '
			<a href="'.site_url('sales_quotation_update/'.$row->quotation_ref).'" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a> 
			<a href="'.site_url("deletequotation/".$row->quotation_ref).'" class="btn btn-xs btn-danger" onclick="return confirm('."'Are you sure?'".')"><i class="fa fa-trash"></i></a>

			<a href="'.site_url('sales_quotation_view/'.$row->quotation_ref. '/' .$row->prepared_by).'" class="btn btn-success btn-xs" target="_blank"><i class="fas fa-search"></i></a>
			';

			$data[] = $sub_array;

			}
		}

		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->SalesQuotationModel->get_all_salesquotation_data(),
			"recordsFiltered" => $this->SalesQuotationModel->filter_salesquotation_data(),
			"data" => $data
		);

		echo json_encode($output);
	}

	public function salesquotationValidate() {
		
    	$validate = [
			'success' => false,
			'errors' => ''
		];


		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($this->validation_rules('add'));

		if ($this->form_validation->run()) {

			if($this->input->post('quotation_discount') == ""){
				$quotation_discount = 0;
			}
			else{
				$quotation_discount = $this->input->post('quotation_discount');
			}

				//$total_amount = 0;
				//$count_quotationitemdescription = count($this->input->post('quotation_item_description'));
				//for ($i=0; $i < $count_quotationitemdescription; $i++) {
				//	$qty = $this->input->post('quotation_item_qty')[$i];
				//	$amount = $this->input->post('quotation_item_amount')[$i];
				//	$total_amount = ($qty * $amount) + $total_amount;
				//}

			$validate['success'] = true;
			
			$quotation_Date_created = date('Y-m-d'); //YYYY-MM-DD

			$this->SalesQuotationModel->insert_salesquotation([
				'quotation_ref' => $this->input->post('quotation_reference_no'),
				'customer_name' => $this->input->post('quotation_customer_name'),
				'contact_person' => $this->input->post('quotation_contact_person'),
				'contact_number' => $this->input->post('quotation_contact_number'),
				'email' => $this->input->post('quotation_email'),
				'customer_location' => $this->input->post('quotation_customer_location'),
				'project_type' => $this->input->post('quotation_project_type'),
				'subject' => $this->input->post('quotation_Subject'),
				'prepared_by' => $this->input->post('quotation_sales_name'),
				'prepared_email' => $this->input->post('quotation_sales_email'),
				'date_created' => $quotation_Date_created,
				'warranty_covered' => $this->input->post('quotation_warranty'),
				'promo' => $this->input->post('quotation_promo'),
				'payment_mode' => $this->input->post('quotation_payment'),
				'discount' => $quotation_discount,
				'vat' => $this->input->post('quotation_vat')

			]);

			$count_quotationitemdescription = count($this->input->post('quotation_item_description'));
			$results = $this->SalesQuotationModel->get_sales_quotation_items();

				//add Item
			for ($i=0; $i < $count_quotationitemdescription; $i++) {
				$this->SalesQuotationModel->insert_salesquotation_items([
					'quotation_ref' => $this->input->post('quotation_reference_no'),
					'description' => $this->input->post('quotation_item_description')[$i],
					'qty' => $this->input->post('quotation_item_qty')[$i],
					'unit' => $this->input->post('quotation_item_unit')[$i],
					'availability' => $this->input->post('quotation_availability')[$i],
					'amount' => $this->input->post('quotation_item_amount')[$i]
				]);
			}
			

		} 
		else {
		$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
    }

    public function salesquotationview($quotation_ref, $prepared_by) {
		if ($this->session->userdata('logged_in')) {
		
			$data = [
				'title' => 'Print',
				'results_quotation' => $this->SalesQuotationModel->GetSalesQuotation($quotation_ref),
				'results_quotation_items' => $this->SalesQuotationModel->GetSalesQuotationItem($quotation_ref),
				'results_salesinfo' => $this->SalesQuotationModel->getSalesInfo($prepared_by)	
			];
			//$this->load->view('project_report/project_report_view');
			$this->load->view('sales_quotation/sales_quotation_view', $data);
		}
		 else {
			redirect('', 'refresh');
		}
	}

	public function sales_quotation_update_view($quotation_ref) {
		if($this->session->userdata('logged_in')) {

			$this->load->model('CustomersModel');

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Sales Quotation Update';
			$data['sales_quotation_status'] = ' menu-open';
			$data['sales_quotation_href'] = ' active';
			$data['make_quotation'] = ' active';

			$data['quotation_details'] = $this->SalesQuotationModel->GetSalesQuotation($quotation_ref);
			$data['quotation_items'] = $this->SalesQuotationModel->GetSalesQuotationItem($quotation_ref);
			$data['quotation_getsales'] = $this->SalesQuotationModel->getSales();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('sales_quotation/sales_quotation_edit');
			$this->load->view('templates/footer');
			$this->load->view('sales_quotation/script');
		} else {
			redirect('','refresh');
		}
	}

	public function SalesQuotationUpdateValidate() {

		$validate = [
			'success' => false,
			'errors' => ''
		];



		$quotation_ref = $this->input->post('quotation_id');
		$quotation_item_id = $this->input->post('quotation_item_id');
		$quotation_reference_no = $this->input->post('quotation_reference_no');

		if ($quotation_reference_no == $quotation_ref){
			$rules = $this->validation_rules('edit');
		}
		else{
			$rules = $this->validation_rules('exist');
		}

	

		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			if($this->input->post('quotation_discount') == ""){
				$quotation_discount = 0;
			}
			else{
				$quotation_discount = $this->input->post('quotation_discount');
			}

			$this->SalesQuotationModel->updateSalesQuotation(
				$quotation_ref,
				[
					'quotation_ref' => $this->input->post('quotation_reference_no'),
					'customer_name' => $this->input->post('quotation_customer_name'),
					'contact_person' => $this->input->post('quotation_contact_person'),
					'contact_number' => $this->input->post('quotation_contact_number'),
					'email' => $this->input->post('quotation_email'),
					'customer_location' => $this->input->post('quotation_customer_location'),
					'project_type' => $this->input->post('quotation_project_type'),
					'subject' => $this->input->post('quotation_Subject'),
					'prepared_by' => $this->input->post('quotation_sales_name'),
					'prepared_email' => $this->input->post('quotation_sales_email'),
					'date_created' => $this->input->post('quotation_date_created'),
					'warranty_covered' => $this->input->post('quotation_warranty'),
					'promo' => $this->input->post('quotation_promo'),
					'payment_mode' => $this->input->post('quotation_payment'),
					'discount' => $quotation_discount,
					'vat' => $this->input->post('quotation_vat')
				]
			);
			//end of update Sales Quotation information


			//Update Existing Sales Quotation
			$quotation_id_data = array();
			
			for ($i=0; $i < count($this->input->post('quotation_item_id')); $i++) {

				$quotation_sub_data = array();

				if ($this->input->post('quotation_item_id')[$i] != '') {

					$this->SalesQuotationModel->updateQuotationItems(
						$this->input->post('quotation_item_id')[$i],
						[
							'quotation_ref' => $this->input->post('quotation_reference_no'),
							'description' => $this->input->post('quotation_item_description')[$i],
							'qty' => $this->input->post('quotation_item_qty')[$i],
							'unit' => $this->input->post('quotation_item_unit')[$i],
							'availability' => $this->input->post('quotation_availability')[$i],
							'amount' => $this->input->post('quotation_item_amount')[$i]
						]
					);

					$quotation_sub_data[] = $this->input->post('quotation_item_id')[$i];
					$quotation_id_data[] = $quotation_sub_data;
				}
				 else {
					$this->SalesQuotationModel->insert_salesquotation_items([
						'quotation_ref' => $this->input->post('quotation_reference_no'),
						'description' => $this->input->post('quotation_item_description')[$i],
						'qty' => $this->input->post('quotation_item_qty')[$i],
						'unit' => $this->input->post('quotation_item_unit')[$i],
						'availability' => $this->input->post('quotation_availability')[$i],
						'amount' => $this->input->post('quotation_item_amount')[$i]
					]);

					$quotation_sub_data[] = $this->SalesQuotationModel->getNewAddedQuotationItems($quotation_ref);
					$quotation_id_data[] = $quotation_sub_data;

				}
			}
			$this->SalesQuotationModel->removeSalesQuotationItem($quotation_id_data,$quotation_ref);


		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

	public function deleteSalesQuotation() {

		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [
			[
				'field' => 'del_pr_id',
				'label' => 'Project ID',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select Quotation to delete.'
				]
			]
		];

		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;


			$this->ProjectReportModel->updateProjectReport(
				$this->input->post('del_pr_id'),
				[
					'is_deleted' => '1'
				]
			);
		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

	public function deleteQuotation($quotation_ref) {

		if($this->session->userdata('logged_in')) {

			
			$this->load->model('SalesQuotationModel');
			$this->SalesQuotationModel->deleteQuotation($quotation_ref,['is_deleted' => 1 ]);

			$updateMsg = 	'<div class="alert alert-warning alert-dismissable">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Quotation Successfully Deleted!
                            </div>';

			$this->session->set_flashdata('msg', $updateMsg);

			redirect('sales_quotation_list');

		} else {
			redirect('', 'refresh');
		}
	}

}
