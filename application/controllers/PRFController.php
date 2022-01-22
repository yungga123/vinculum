<?php
defined('BASEPATH') or die('Access Denied');

class PRFController extends CI_Controller
{

    public function __construct()
    {
        Parent::__construct();
        $this->load->model("PRFModel");
    }

    function validation_rules() {

        $rules = [
			[
				'field' => 'project_name',
				'label' => 'Select Client Name',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Select Client.'
				]
            ],
            [
				'field' => 'project_activity',
				'label' => 'Select Project',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Select Project Activity.'
				]
            ],
            [
				'field' => 'project_branch',
				'label' => 'Select Branch',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Select Branch.'
				]
            ],
            [
				'field' => 'requested_by',
				'label' => 'Enter Requestor',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Enter Requestor Name.'
				]
            ],
            [
				'field' => 'direct_item_name[]',
				'label' => 'Select Direct Item',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Select Direct Item.'
				]
            ],
            [
				'field' => 'direct_item_qty[]',
				'label' => 'Enter Direct Item Qty',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Enter Direct Item Qty.'
				]
            ],
            [
				'field' => 'indirect_item_name[]',
				'label' => 'Select Indirect Item',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Select Indirect Item.'
				]
            ],
            [
				'field' => 'indirect_item_qty[]',
				'label' => 'Enter Indirect Item Qty',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Enter Indirect Item Qty.'
				]
            ],
            [
				'field' => 'tools_item_name[]',
				'label' => 'Select Tool Item',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Select Tool Name.'
				]
            ],
            [
				'field' => 'tools_item_qty[]',
				'label' => 'Enter Tools Item Qty',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Enter Tools Item Qty.'
				]
            ]

		];
		return $rules;
    }

    public function add_prf($client_id, $branch_id)
    {
        if ($this->session->userdata('logged_in')) {

            $this->load->helper('site_helper');
            $data = html_variable();
            $data['title'] = 'Add PRF';
            $data['inventory_menu_status'] = ' menu-open';
            $data['ul_items_tree'] = ' active';
            $data['prf_menu_status'] = ' menu-open';
            $data['ul_prf'] = ' active';
            $data['prf_menu_display'] = ' block';
            $data['new_prf'] = ' active';

            $data['branch_list'] = "";
            $data['project_list'] = "";
            $data['direct_item_list'] = "";
            $data['indirect_item_list'] = "";
            $data['tools_item_list'] = "";
            
            $data['client_list'] = $this->PRFModel->fetchclientlist();

            if($client_id == "select-project"){
                $data['client_id'] = "";
            }
            else{
                $data['client_id'] = $client_id;
                $data['branch_list'] = $this->PRFModel->fetchbranchlist($client_id);
            }

            if($branch_id == "select-branch"){
                $data['branch_id'] = "";
            }
            else{
                $data['branch_id'] = $branch_id;
                $data['project_list'] = $this->PRFModel->fetchprojectlist($branch_id);
                $data['direct_item_list'] = $this->PRFModel->fetchdirectitemlist();
                $data['indirect_item_list'] = $this->PRFModel->fetchindirectitemlist();
                $data['tools_item_list'] = $this->PRFModel->fetchtoollist();
            }
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('PRF/add_prf');
            $this->load->view('templates/footer');
            $this->load->view('PRF/script');
        } else {
            redirect('', 'refresh');
        }
    }

    public function prf_list()
    {
        if ($this->session->userdata('logged_in')) {

            $this->load->helper('site_helper');
            $data = html_variable();
            $data['title'] = 'Add PRF';
            $data['inventory_menu_status'] = ' menu-open';
            $data['ul_items_tree'] = ' active';
            $data['prf_menu_status'] = ' menu-open';
            $data['ul_prf'] = ' active';
            $data['prf_menu_display'] = ' block';
            $data['prf_list'] = ' active';
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('PRF/prf_list');
            $this->load->view('templates/footer');
            $this->load->view('PRF/script');
        } else {
            redirect('', 'refresh');
        }
    }

    public function getDirectQty($id) {

        $directqty = $this->PRFModel->fetchdirectqty($id);

        foreach ($directqty as $row) {
            $validate['direct_qty'] = $row->stocks;
        }

		echo json_encode($validate);
    }

    public function add_prf_validate()
	{
		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = $this->validation_rules();

		$this->form_validation->set_error_delimiters('<p>', '</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			$data = [
				'client_id' => $this->input->post('project_name_hidden'),
				'branch_id' => $this->input->post('project_branch_hidden'),
				'project_id' => $this->input->post('project_activity'),
				'requested_by' => $this->input->post('requested_by')
			];

			$this->PRFModel->add_prf($data);

            // Fetch ID of Added PRF
            $client_id = $this->input->post('project_name_hidden');
            $branch_id = $this->input->post('project_branch_hidden');
            $fetch_prf_id = $this->PRFModel->fetchaddedprfid($client_id, $branch_id);

            foreach($fetch_prf_id as $row){
                $prf_id = $row->prf_id;
            }

            // Add Direct Items
            for ($i = 0; $i < count($this->input->post('direct_item_name')); $i++) {
                $data1 = [
                    'item_name' => $this->input->post('direct_item_name')[$i],
                    'item_qty' => $this->input->post('direct_item_qty')[$i],
                    'prf_id' => $prf_id
                ];

                $this->PRFModel->add_prf_direct($data1);
            }

            // Add Inirect Items
            for ($i = 0; $i < count($this->input->post('indirect_item_name')); $i++) {
                $data2 = [
                    'item_name' => $this->input->post('indirect_item_name')[$i],
                    'item_qty' => $this->input->post('indirect_item_qty')[$i],
                    'prf_id' => $prf_id
                ];

                $this->PRFModel->add_prf_indirect($data2);
            }

            // Add Tools Items
            for ($i = 0; $i < count($this->input->post('tools_item_name')); $i++) {
                $data3 = [
                    'item_name' => $this->input->post('tools_item_name')[$i],
                    'item_qty' => $this->input->post('tools_item_qty')[$i],
                    'prf_id' => $prf_id
                ];

                $this->PRFModel->add_prf_tools($data3);
            }
			
		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

    public function get_prf_list()
	{
		$fetch_data = $this->PRFModel->prf_datatable();
        // $client_list = $this->PRFModel->fetchclientlist();
        // $branch_list = $this->PRFModel->fetchbranchlist($client_id);
        // $project_list = $this->PRFModel->fetchprojectlist($branch_id);

		$data = array();

       

		foreach ($fetch_data as $row) {
			$sub_array = array();

			$sub_array[] = $row->prf_id;
			$sub_array[] = $row->CompanyName;
			$sub_array[] = $row->branch_name;
			$sub_array[] = $row->project_type;
			$sub_array[] = $row->requested_by;
            
            $button = '
            <button type="button" class="btn btn-primary text-bold btn-xs fetch-direct fetch-indirect fetch-tools" data-toggle="modal" data-target=".btn-view"><i class="fas fa-search"></i></button>
            <button type="button" class="btn btn-warning text-bold btn-xs" data-toggle="modal" data-target="#approved-po"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-danger text-bold btn-xs" data-toggle="modal" data-target="#approved-po"><i class="fas fa-trash"></i></button>
            <button type="button" class="btn btn-success text-bold btn-xs" data-toggle="modal" data-target="#approved-po"><i class="fas fa-print"></i></button>
            ';

            $sub_array[] = $button;

			$data[] = $sub_array;
		}
		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->PRFModel->get_all_prf_data(),
			"recordsFiltered" => $this->PRFModel->filter_prf_data(),
			"data" => $data
		);

		echo json_encode($output);
	}

    public function get_direct_items($prf_id)
    {
        $results = $this->PRFModel->get_direct_items($prf_id);

        $data = array();

        foreach ($results as $row) {
            $sub_array = array();

            $sub_array['item_name'] = $row->itemName;
            $sub_array['item_qty'] = $row->item_qty;

            $data[] = $sub_array;
        }

        $json_data['results'] = $data;

        echo json_encode($json_data);
    }

    public function get_indirect_items($prf_id)
    {
        $results = $this->PRFModel->get_indirect_items($prf_id);

        $data = array();

        foreach ($results as $row) {
            $sub_array = array();

            $sub_array['item_name'] = $row->itemName;
            $sub_array['item_qty'] = $row->item_qty;

            $data[] = $sub_array;
        }

        $json_data['results'] = $data;

        echo json_encode($json_data);
    }

    public function get_tools_items($prf_id)
    {
        $results = $this->PRFModel->get_tools_items($prf_id);

        $data = array();

        foreach ($results as $row) {
            $sub_array = array();

            $sub_array['item_name'] = $row->description;
            $sub_array['item_qty'] = $row->item_qty;

            $data[] = $sub_array;
        }

        $json_data['results'] = $data;

        echo json_encode($json_data);
    }

}
