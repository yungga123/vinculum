<?php
defined('BASEPATH') or die('Access Denied');

class PRFController extends CI_Controller
{

    public function __construct()
    {
        Parent::__construct();
        date_default_timezone_set('Asia/Manila');
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

    public function prf_form($client_id, $branch_id, $prf_id)
    {
        if ($this->session->userdata('logged_in')) {

            if($prf_id != "select-prf"){
                $prfinfo = $this->PRFModel->fetchprfdata($prf_id);

                foreach ($prfinfo as $row) {
                $requestor_id = $row->requested_by;
                }
            }
            else{
                $requestor_id = $this->session->userdata('logged_in')['emp_id'];
            }

            if ($this->session->userdata('logged_in')['emp_id'] == $requestor_id || $this->session->userdata('logged_in')['class']  =="2") {

                $this->load->helper('site_helper');
                $data = html_variable();

                $data['inventory_menu_status'] = ' menu-open';
                $data['ul_items_tree'] = ' active';
                $data['prf_menu_status'] = ' menu-open';
                $data['ul_prf'] = ' active';
                $data['prf_menu_display'] = ' block';
                $data['branch_list'] = "";
                $data['project_list'] = "";
                $data['direct_item_list'] = "";
                $data['indirect_item_list'] = "";
                $data['tools_item_list'] = "";
                $data['project_id'] = "";
                $data['sales_id'] = "";
                $data['prfdirectitems'] = [""];
                $data['prfindirectitems'] = [""];
                $data['prftoolsitems'] = [""];
                $data['client_list'] = $this->PRFModel->fetchclientlist();
                $data['requestor_list'] = $this->PRFModel->fetchrequestordata($requestor_id);


                if ($prf_id == "select-prf") {
                    $data['new_prf'] = ' active';
                    $data['title'] = ' Add PRF';
                    $data['status'] = 'Add';
                    $data['button_title'] = ' Add Project';
                    $data['prf_id'] = $prf_id;
                    $data['requestor_id'] = $this->session->userdata('logged_in')['emp_id'];

                    if ($client_id == "select-project") {
                        $data['client_id'] = "";
                    } else {
                        $data['client_id'] = $client_id;
                        $data['branch_list'] = $this->PRFModel->fetchbranchlist($client_id);
                    }

                    if ($branch_id == "select-branch") {
                        $data['branch_id'] = "";
                    } else {
                        $data['branch_id'] = $branch_id;
                        $data['project_list'] = $this->PRFModel->fetchprojectlist($branch_id);
                        $data['sales_list'] = $this->PRFModel->fetchsaleslist();
                        $data['direct_item_list'] = $this->PRFModel->fetchdirectitemlist();
                        $data['indirect_item_list'] = $this->PRFModel->fetchindirectitemlist();
                        $data['tools_item_list'] = $this->PRFModel->fetchtoollist();
                    }
                } else {
                    $prfinfo = $this->PRFModel->fetchprfdata($prf_id);
                    foreach ($prfinfo as $row) {
                        $data['sales_id'] = $row->sales;
                        $data['pic_id'] = $row->pic;
                        $data['inventory_id'] = $row->prepared_by;
                        $data['requestor_id'] = $row->requested_by;
                        $data['date_issued'] =  $row->date_issued;
                        $requestor_id = $row->requested_by;
                    }

                    $data['new_prf'] = '';
                    $data['title'] = ' Edit PRF';
                    $data['status'] = 'Edit';
                    $data['button_title'] = ' Edit Project';
                    $data['prf_id'] = $prf_id;



                    if ($branch_id == "select-branch") {
                        $data['branch_id'] = "";
                        $data['client_id'] = $client_id;
                    } else {
                        $data['project_list'] = $this->PRFModel->fetchprojectlist($branch_id);
                        $data['client_id'] = $client_id;
                        $data['branch_id'] = $branch_id;

                        foreach ($prfinfo as $row) {
                            $data['project_id'] = $row->project_id;
                        }
                    }

                    $data['branch_list'] = $this->PRFModel->fetchbranchlist($client_id);
                    $data['prfdirectitems'] = $this->PRFModel->fetchprfdirectitems($prf_id);
                    $data['prfindirectitems'] = $this->PRFModel->fetchprfindirectitems($prf_id);
                    $data['prftoolsitems'] = $this->PRFModel->fetchprftoolsitems($prf_id);
                    $data['sales_list'] = $this->PRFModel->fetchsaleslist();
                    $data['pic_list'] = $this->PRFModel->fetchsaleslist();
                    $data['inventory_personnel_list'] = $this->PRFModel->fetchsaleslist();
                    $data['direct_item_list'] = $this->PRFModel->fetchdirectitemlist();
                    $data['indirect_item_list'] = $this->PRFModel->fetchindirectitemlist();
                    $data['tools_item_list'] = $this->PRFModel->fetchtoollist();
                }

                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar');
                $this->load->view('PRF/prf_form');
                $this->load->view('templates/footer');
                $this->load->view('PRF/script');
            } else {
                redirect('offlimits');
            }
        } else {
            redirect('', 'refresh');
        }
    }

    public function prf_list($status)
    {
        if ($this->session->userdata('logged_in')) {

            $this->load->helper('site_helper');
            $data = html_variable();
            $data['title'] = 'PRF List';
            $data['inventory_menu_status'] = ' menu-open';
            $data['ul_items_tree'] = ' active';
            $data['prf_menu_status'] = ' menu-open';
            $data['ul_prf'] = ' active';
            $data['prf_menu_display'] = ' block';
            $data['prf_list'] = ' active';
            $data['status'] = $status;
            
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
        $date_requested = date('Y-m-d H:i:sa');

		$this->form_validation->set_error_delimiters('<p>', '</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;
           

			$data = [
				'client_id' => $this->input->post('project_name_hidden'),
				'branch_id' => $this->input->post('project_branch_hidden'),
				'project_id' => $this->input->post('project_activity'),
                'status' => 'pending',
				'requested_by' => $this->input->post('requested_by'),
                'sales' => $this->input->post('sales_incharge'),
                'date_requested' => $date_requested,
                'date_issued' => "0000-00-00",
                'date_return' => "0000-00-00",
                'time_return' => "00:00:01"
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

    public function edit_prf_validate(){

       
        $validate = [
            'success' => false,
            'errors' => ''
        ];

        $this->form_validation->set_error_delimiters('<p>• ', '</p>');

        $this->form_validation->set_rules($this->validation_rules());

        if ($this->form_validation->run()) {
            $validate['success'] = true;

            $prf_id = $this->input->post('prf_id_hidden');

            $data = [
                'client_id' => $this->input->post('project_name_hidden'),
                'branch_id' => $this->input->post('project_branch_hidden'),
                'project_id' => $this->input->post('project_activity'),
                'sales' => $this->input->post('sales_incharge'),
                'pic' => $this->input->post('person_in_charge'),
                'prepared_by' => $this->input->post('prepared_by'),
                'date_issued' => $this->input->post('date_issued')
            ];

            $this->PRFModel->edit_prf_info($prf_id, $data);
           

            // Edit Direct Items
            $direct_item_id = array();
            for ($i = 0; $i < count($this->input->post('direct_item_name')); $i++) {
                $direct_sub_id = array();
                
                if ($this->input->post('prf_direct_items_id')[$i] != '') {
                    $data1 = [
                        'item_name' => $this->input->post('direct_item_name')[$i],
                        'item_qty' => $this->input->post('direct_item_qty')[$i],
                        'stock_available' => $this->input->post('direct_available_qty')[$i]
                    ];
                    $this->PRFModel->edit_prf_direct($this->input->post('prf_direct_items_id')[$i], $data1);

                    $direct_sub_id[] = $this->input->post('prf_direct_items_id')[$i];
                    $direct_item_id[] = $direct_sub_id;

                } else {
                    $data1 = [
                        'item_name' => $this->input->post('direct_item_name')[$i],
                        'item_qty' => $this->input->post('direct_item_qty')[$i],
                        'stock_available' => $this->input->post('direct_available_qty')[$i],
                        'prf_id' => $prf_id
                    ];
                    $this->PRFModel->add_prf_direct($data1);

                    $direct_sub_id[] = $this->PRFModel->get_added_prf_direct($prf_id);
                    $direct_item_id[] = $direct_sub_id;
                }
            }
            $this->PRFModel->remove_direct_item($direct_item_id,$prf_id);

            

            // Edit Indirect Items
            $indirect_item_id = array();
            for ($i = 0; $i < count($this->input->post('indirect_item_name')); $i++) {
                $indirect_sub_id = array();
                if ($this->input->post('prf_indirect_items_id')[$i] != '') {
                    $data2 = [
                        'item_name' => $this->input->post('indirect_item_name')[$i],
                        'item_qty' => $this->input->post('indirect_item_qty')[$i],
                        'stock_available' => $this->input->post('indirect_available_qty')[$i]
                    ];
                    $this->PRFModel->edit_prf_indirect($this->input->post('prf_indirect_items_id')[$i], $data2);
                    $indirect_sub_id[] = $this->input->post('prf_indirect_items_id')[$i];
                    $indirect_item_id[] = $indirect_sub_id;
                } else {
                    $data2 = [
                        'item_name' => $this->input->post('indirect_item_name')[$i],
                        'item_qty' => $this->input->post('indirect_item_qty')[$i],
                        'stock_available' => $this->input->post('indirect_available_qty')[$i],
                        'prf_id' => $prf_id
                    ];
                    $this->PRFModel->add_prf_indirect($data2);

                    $indirect_sub_id[] = $this->PRFModel->get_added_prf_indirect($prf_id);
                    $indirect_item_id[] = $indirect_sub_id;
                }
            }
            $this->PRFModel->remove_indirect_item($indirect_item_id,$prf_id);

            // Edit Tools Items
            $tools_item_id = array();
            for ($i = 0; $i < count($this->input->post('tools_item_name')); $i++) {
                $tools_sub_id = array();
                if ($this->input->post('prf_tools_items_id')[$i] != '') {
                    $data3 = [
                        'item_name' => $this->input->post('tools_item_name')[$i],
                        'item_qty' => $this->input->post('tools_item_qty')[$i],
                        'stock_available' => $this->input->post('tools_available_qty')[$i]
                    ];
                    $this->PRFModel->edit_prf_tools($this->input->post('prf_tools_items_id')[$i], $data3);
                    $tools_sub_id[] = $this->input->post('prf_tools_items_id')[$i];
                    $tools_item_id[] = $tools_sub_id;
                } else {
                    $data3 = [
                        'item_name' => $this->input->post('tools_item_name')[$i],
                        'item_qty' => $this->input->post('tools_item_qty')[$i],
                        'stock_available' => $this->input->post('tools_available_qty')[$i],
                        'prf_id' => $prf_id
                    ];
                    $this->PRFModel->add_prf_tools($data3);

                    $tools_sub_id[] = $this->PRFModel->get_added_prf_tools($prf_id);
                    $tools_item_id[] = $tools_sub_id;
                }
            }
            $this->PRFModel->remove_tools_item($tools_item_id,$prf_id);

        } else {
            $validate['errors'] = validation_errors();
        }
        echo json_encode($validate);
    }

    public function fetch_pending_prf(){
        $status = "pending";
        $this->get_prf_list($status);
    }

    public function fetch_ongoing_prf(){
        $status = "ongoing";
        $this->get_prf_list($status);
    }

    public function fetch_filed_prf(){
        $status = "filed";
        $this->get_prf_list($status);
    }

    public function get_prf_list($status)
	{
		$fetch_data = $this->PRFModel->prf_datatable($status);
        $pic_list = $this->PRFModel->fetchrequestorlist();
        $requestor_list = $this->PRFModel->fetchrequestorlist();

		$data = array();

		foreach ($fetch_data as $row) {
			$sub_array = array();

			$sub_array[] = $row->prf_id;
			$sub_array[] = $row->CompanyName;
			$sub_array[] = $row->branch_name;
			$sub_array[] = $row->project_type;
            $sub_array[] = date_format(date_create($row->date_requested), 'F d, Y / h:i a');

            
            if($status != "pending"){
                // Fetch Sales Incharge
                if($row->id == ""){
                    $sub_array[] = "";
                }
                else{
                    $sub_array[] = $row->lastname.', '.$row->firstname.' ';
                }

                // Fetch PIC
                if($row->pic ==""){
                    $sub_array[] = "";
                }else{
                    foreach($pic_list as $row1){
                        if($row1->id == $row->pic){
                            $sub_array[] = $row1->lastname.', '.$row1->firstname.' ';
                        }
                    }
                }
            }
            
            // Fetch Requestor
            if($row->requested_by ==""){
                $sub_array[] = "";
            }else{
                foreach($requestor_list as $row1){
                    if($row1->id == $row->requested_by){
                        $sub_array[] = $row1->lastname.', '.$row1->firstname.' ';
                    }
                }
            }

            // Fetch Prepared By
            if($row->prepared_by ==""){
                $sub_array[] = "";
            }else{
                foreach($requestor_list as $row1){
                    if($row1->id == $row->prepared_by){
                        $sub_array[] = $row1->lastname.', '.$row1->firstname.' ';
                    }
                }
            }

            if($status == "filed"){
                if($row->returned_by == ""){
                    $returned_by = "";
                }  
                else{
                    foreach($requestor_list as $row1){
                        if($row1->id == $row->returned_by){
                            $returned_by = $row1->lastname.', '.$row1->firstname.' ';
                        } 
                    }
                }
                
                if($row->date_return == "0000-00-00"){
                    $date_return = "";
                }else{
                    $date_return = date_format(date_create($row->date_return), 'F d, Y');
                }

                if($row->time_return == "00:00:01"){
                    $time_return = "";
                }
                else{
                    $time_return = date_format(date_create($row->time_return), 'h:i a');
                }

                $sub_array[] = $returned_by;
                $sub_array[] = $date_return;
                $sub_array[] = $time_return;
                
                
            }
            
            if($status =='ongoing'){
                $sub_array[] = '
                <div class="btn-group btn-sm">
                <button type="button" title="View Items List" class="btn btn-primary text-bold fetch-direct fetch-indirect fetch-tools" data-toggle="modal" data-target=".btn-view"><i class="fas fa-search"></i></button>
                <a href="'.site_url('prf-form/'.$row->client_id .'/'.$row->branch_id.'/'.$row->prf_id).'" class="btn btn-warning text-bold" title="Edit PRF Info"><i class="fas fa-edit"></i></a>
                <button type="button" class="btn btn-success text-bold select-prf-status" title="File PRF" data-toggle="modal" data-target="#file-prf"><i class="fas fa-file"></i></button>
                <a href="'.site_url('prf-return/'.$row->prf_id).'" class="btn btn-warning text-bold" title="Return Items"><i class="fas fa-undo"></i></a>
                <a href="'.site_url('prf-print/'.$row->prf_id).'" class="btn btn-success text-bold" title="Print PRF"><i class="fas fa-print"></i></a>
                </div>';
            }
            elseif($status =='pending'){
                $sub_array[] = '
                <div class="btn-group btn-md">
                <button type="button" title="View Items List" class="btn btn-primary text-bold fetch-direct fetch-indirect fetch-tools" data-toggle="modal" data-target=".btn-view"><i class="fas fa-search"></i></button>
                <button type="button" class="btn btn-success text-bold select-prf-status" title="Pullout PRF" data-toggle="modal" data-target="#file-prf"><i class="fas fa-file"></i></button>
                <a href="'.site_url('prf-form/'.$row->client_id .'/'.$row->branch_id.'/'.$row->prf_id).'" class="btn btn-warning text-bold" title="Edit PRF Info"><i class="fas fa-edit"></i></a>
                <a href="'.site_url('prf-print/'.$row->prf_id).'" class="btn btn-success text-bold" title="Print PRF"><i class="fas fa-print"></i></a>
                </div>';
            }
            else{
                $sub_array[] = '
                <div class="btn-group btn-md">
                <button type="button" title="View Items List" class="btn btn-primary text-bold fetch-direct fetch-indirect fetch-tools" data-toggle="modal" data-target=".btn-view"><i class="fas fa-search"></i></button>
                <a href="'.site_url('prf-print/'.$row->prf_id).'" class="btn btn-success text-bold" title="Print PRF"><i class="fas fa-print"></i></a>
                </div>';
            }


			$data[] = $sub_array;
		}
		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->PRFModel->get_all_prf_data(),
			"recordsFiltered" => $this->PRFModel->filter_prf_data($status),
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

            $sub_array['item_name'] = $row->model;
            $sub_array['item_qty'] = $row->item_qty;

            $data[] = $sub_array;
        }

        $json_data['results'] = $data;

        echo json_encode($json_data);
    }

    public function delete_PRF() {
        
            $validate = [
                'success' => false,
                'errors' => ''
            ];
    
            $rules = [
                [
                    'field' => 'prf_form_id_del',
                    'label' => 'PRF ID',
                    'rules' => 'trim|required',
                    'errors' => [
                        'required' => 'Please select an item.'
                    ]
                ]
    
            ];
            
            $this->form_validation->set_error_delimiters('<p>• ','</p>');
    
            $this->form_validation->set_rules($rules);
    
            if ($this->form_validation->run()) {
                $validate['success'] = true;
    
    
                $this->PRFModel->delete_PRF($this->input->post('prf_form_id_del'),[
                    'is_deleted' => '1'
                ]);
               
            } 
            else {
                $validate['errors'] = validation_errors();
            }
           
        echo json_encode($validate);
    }

    function confirm_user()
    {
            if ($this->session->userdata('logged_in')['class'] == "2") {
                if($this->input->post('prf_status1') == "pending"){
                    if($this->input->post('prf_sales') == ""){
                        $this->form_validation->set_message('confirm_user', 'Please Select Sales Incharge First.');
                        return false;
                    }
                    else if($this->input->post('prf_pic') == ""){
                        $this->form_validation->set_message('confirm_user', 'Please Select Person In Charge First.');
                        return false;
                    }
                    else if($this->input->post('prf_prepared') == ""){
                        $this->form_validation->set_message('confirm_user', 'Please Select Inventory Personnel First.');
                        return false;
                    }
                    else if($this->input->post('prf_date_issued') == "0000-00-00"){
                        $this->form_validation->set_message('confirm_user', 'Please Select Date Issued.');
                        return false;
                    }
                    else{
                        return true;
                    }
                }
                elseif($this->input->post('prf_status1') == "ongoing"){
                    if($this->input->post('returned_by') == ""){
                        $this->form_validation->set_message('confirm_user', 'Please Return Item First.');
                        return false;
                    }
                    elseif($this->input->post('date_return') == "0000-00-00"){
                        $this->form_validation->set_message('confirm_user', 'Please Select Date of Return.');
                        return false;
                    }
                    elseif($this->input->post('time_return') == "00:00:01"){
                        $this->form_validation->set_message('confirm_user', 'Please Select Time of Return.');
                        return false;
                    }
                    else{
                        return true;
                    }
                }
                else{
                    return true;
                }
            } else {
                $this->form_validation->set_message('confirm_user', 'User Not Allowed!');
                return false;
            }
        

        
    }

    public function PRF_status() {
        
        $validate = [
            'success' => false,
            'errors' => ''
        ];

        $rules = [
            [
                'field' => 'prf_form_id',
                'label' => 'PRF ID',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select an item.'
                ]
            ],
            [
                'field' => 'prf_status',
                'label' => 'Status',
                'rules' => 'trim|callback_confirm_user'
            ]
        ];
        
        $this->form_validation->set_error_delimiters('<p>• ','</p>');

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {
            $validate['success'] = true;
            // $date_issued = date('Y-m-d H:i:s');

            $this->PRFModel->PRF_status($this->input->post('prf_form_id'),[
                'status' => $this->input->post('prf_status')
                // 'date_issued' => $date_issued
            ]);
        } 
        else {
            $validate['errors'] = validation_errors();
        }
       
    echo json_encode($validate);
}

    public function prf_return($prf_id)
    {
        if ($this->session->userdata('logged_in')) {

            if ($this->session->userdata('logged_in')['class'] =="2") {
                $this->load->helper('site_helper');
                $data = html_variable();

                $data['title'] = "Return PRF";
                $data['inventory_menu_status'] = ' menu-open';
                $data['ul_items_tree'] = ' active';
                $data['prf_menu_status'] = ' menu-open';
                $data['ul_prf'] = ' active';
                $data['prf_menu_display'] = ' block';
                $data['prf_id'] = $prf_id;

                $data['prfdirectitems'] = $this->PRFModel->fetchprfdirectitems($prf_id);
                $data['prfindirectitems'] = $this->PRFModel->fetchprfindirectitems($prf_id);
                $data['prftoolsitems'] = $this->PRFModel->fetchprftoolsitems($prf_id);
                $data['personnel_list'] = $this->PRFModel->fetchsaleslist();
                $prfinfo = $this->PRFModel->fetchprfinfo($prf_id);

                foreach ($prfinfo as $row) {
                    $data['client_name'] = $row->CompanyName;
                    $data['returned_id'] = $row->returned_by;
                    $data['date_returned'] = $row->date_return;
                    if($row->time_return =="00:00:01"){
                        $data['time_returned'] = "";
                    }else{
                        $data['time_returned'] = date_format(date_create($row->time_return),'H:i:sa');
                    }
                   
                }

                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar');
                $this->load->view('PRF/prf_return');
                $this->load->view('templates/footer');
                $this->load->view('PRF/script');
            } else {
                redirect('offlimits');
            }
        } else {
            redirect('', 'refresh');
        }
    }

    public function return_prf_validate(){
       
        $validate = [
            'success' => false,
            'errors' => ''
        ];

        $rules = [

            [
                'field' => 'direct_consumed_qty[]',
                'label' => 'Consumed Qty.',
                'rules' => 'trim'
            ],
            [
                'field' => 'direct_consumed_remarks[]',
                'label' => 'Consumed Remarks.',
                'rules' => 'trim'
            ],
            [
                'field' => 'indirect_consumed_qty[]',
                'label' => 'Consumed Qty.',
                'rules' => 'trim'
            ],
            [
                'field' => 'indirect_consumed_remarks[]',
                'label' => 'Consumed Qty.',
                'rules' => 'trim'
            ],
            [
                'field' => 'tools_consumed_qty[]',
                'label' => 'Consumed Qty.',
                'rules' => 'trim'
            ],
            [
                'field' => 'tools_consumed_remarks[]',
                'label' => 'Consumed Qty.',
                'rules' => 'trim'
            ],
            
            [
                'field' => 'direct_return_qty[]',
                'label' => 'Consumed Qty.',
                'rules' => 'trim'
            ],
            [
                'field' => 'direct_return_remarks[]',
                'label' => 'Consumed Remarks.',
                'rules' => 'trim'
            ],
            [
                'field' => 'indirect_return_qty[]',
                'label' => 'Consumed Qty.',
                'rules' => 'trim'
            ],
            [
                'field' => 'indirect_return_remarks[]',
                'label' => 'Consumed Qty.',
                'rules' => 'trim'
            ],
            [
                'field' => 'tools_return_qty[]',
                'label' => 'Consumed Qty.',
                'rules' => 'trim'
            ],
            [
                'field' => 'tools_return_remarks[]',
                'label' => 'Consumed Qty.',
                'rules' => 'trim'
            ],
            [
                'field' => 'returned_by',
                'label' => 'Returned By.',
                'rules' => 'trim'
            ],
            [
                'field' => 'date_returned',
                'label' => 'Date Returned.',
                'rules' => 'trim'
            ],
            [
                'field' => 'time_returned',
                'label' => 'Time Returned.',
                'rules' => 'trim'
            ]
        ];


       $this->form_validation->set_error_delimiters('<p>• ', '</p>');

        $this->form_validation->set_rules($rules);

       if ($this->form_validation->run()) {
            $validate['success'] = true;

            if($this->input->post('time_returned') == ""){
                $time_return = "00:00:01";
            }
            else{
                $time_return = date_format(date_create($this->input->post('time_returned')),'H:i:sa');
            }
            

            $data = [
                'returned_by' => $this->input->post('returned_by'),
                'date_return' => $this->input->post('date_returned'),
                'time_return' => $time_return
            ];
            $this->PRFModel->edit_prf_info($this->input->post('prf_id'), $data);

            // Edit Direct Items
            for ($i = 0; $i < count($this->input->post('direct_item_name')); $i++) {
                $data1 = [
                    'consumed_qty' => $this->input->post('direct_consumed_qty')[$i],
                    'consumed_remarks' => $this->input->post('direct_consumed_remarks')[$i],
                    'return_qty' => $this->input->post('direct_return_qty')[$i],
                    'return_remarks' => $this->input->post('direct_return_remarks')[$i]
                ];
                $this->PRFModel->edit_prf_direct($this->input->post('prf_direct_items_id')[$i], $data1);
            }

            
            // Edit Indirect Items
            for ($i = 0; $i < count($this->input->post('indirect_item_name')); $i++) {
                $data2 = [
                    'consumed_qty' => $this->input->post('indirect_consumed_qty')[$i],
                    'consumed_remarks' => $this->input->post('indirect_consumed_remarks')[$i],
                    'return_qty' => $this->input->post('indirect_return_qty')[$i],
                    'return_remarks' => $this->input->post('indirect_return_remarks')[$i]
                ];
                $this->PRFModel->edit_prf_indirect($this->input->post('prf_indirect_items_id')[$i], $data2);
                
            }


            // Edit Tools Items
            for ($i = 0; $i < count($this->input->post('tools_item_name')); $i++) {
                $data3 = [
                    'consumed_qty' => $this->input->post('tools_consumed_qty')[$i],
                    'consumed_remarks' => $this->input->post('tools_consumed_remarks')[$i],
                    'return_qty' => $this->input->post('tools_return_qty')[$i],
                    'return_remarks' => $this->input->post('tools_return_remarks')[$i]
                ];
                $this->PRFModel->edit_prf_tools($this->input->post('prf_tools_items_id')[$i], $data3);
            }

        } else {
            $validate['errors'] = validation_errors();
        }
        echo json_encode($validate);
    }

    public function prf_print($prf_id)
    {
        if ($this->session->userdata('logged_in')) {
            
            $this->load->model('PRFModel');
            $data['title'] = 'Print PRF';

            $data['prfdirectitems'] = $this->PRFModel->fetchprfdirectitems($prf_id);
            $data['prfindirectitems'] = $this->PRFModel->fetchprfindirectitems($prf_id);
            $data['prftoolsitems'] = $this->PRFModel->fetchprftoolsitems($prf_id);
            

            $prfinfo = $this->PRFModel->fetchprf($prf_id);

            foreach ($prfinfo as $row) {
                $data['client_name'] = $row->CompanyName;
                $data['branch_name'] = $row->branch_name;
                $data['project_name'] = $row->project_type;
                $returned_id = $row->returned_by;
                $prepared_id = $row->prepared_by;
                $checked_id = $row->requested_by;
                $sales_id =  $row->sales;
                $pic_id =  $row->pic;

                $data['returned_by'] = "";
                $data['date_requested'] = date_format(date_create($row->date_requested), 'F d, Y');

                if($row->date_issued == "0000-00-00"){
                    $data['date_issued'] = "";
                }
                else{
                    $data['date_issued'] = date_format(date_create($row->date_issued), 'F d, Y');
                }

                if($row->date_return == "0000-00-00"){
                    $data['date_return'] = "";
                }
                else{
                    $data['date_return'] = date_format(date_create($row->date_return), 'F d, Y');
                }

                if($row->time_return == "00:00:01"){
                    $data['time_return'] = "";
                }
                else{
                    $data['time_return'] = date_format(date_create($row->time_return), 'h:i a');
                }
            }


            if($prepared_id != ""){
                $prepared = $this->PRFModel->fetchpersonnellist($prepared_id);
                foreach($prepared as $row){
                    $data['prepared_by'] = $row->lastname.', '.$row->firstname;
                }
            }
            else{
                $data['prepared_by'] = "";
            }

            if($sales_id != ""){
                $sales = $this->PRFModel->fetchpersonnellist($sales_id);
                foreach($sales as $row){
                    $data['sales'] = $row->lastname.', '.$row->firstname;
                }
            }
            else{
                $data['sales'] = "";
            }

            if($pic_id != ""){
                $pic = $this->PRFModel->fetchpersonnellist($pic_id);
                foreach($pic as $row){
                    $data['pic'] = $row->lastname.', '.$row->firstname;
                }
            }
            else{
                $data['pic'] = "";
            }

            if($checked_id != ""){
                $checked = $this->PRFModel->fetchpersonnellist($checked_id);
                foreach($checked as $row){
                    $data['checked_by'] = $row->lastname.', '.$row->firstname;
                }
            }
            else{
                $data['checked_by'] = "";
            }

            if($returned_id != ""){
                $returned = $this->PRFModel->fetchpersonnellist($returned_id);
                foreach($returned as $row){
                    $data['returned_by'] = $row->lastname.', '.$row->firstname;
                }
            }
            else{
                $data['returned_by'] = "";
            }
        
            $this->load->view('PRF/prf_print', $data);
        } else {
            redirect('', 'refresh');
        }
    }

    public function get_prf_data($prf_id)
    {
        $results = $this->PRFModel->fetchprfdata($prf_id);

        $data = array();

        foreach ($results as $row) {
            $sub_array = array();

            $sub_array['prf_id'] = $row->prf_id;
            $sub_array['sales'] = $row->sales;
            $sub_array['pic'] = $row->pic;
            $sub_array['prepared_by'] = $row->prepared_by;
            $sub_array['status'] = $row->status;
            $sub_array['date_issued'] = $row->date_issued;
            $status = $row->status;

            if($status == "ongoing"){
                $sub_array['returned_by'] = $row->returned_by;
                $sub_array['date_return'] = $row->date_return;
                $sub_array['time_return'] = $row->time_return;
            }else{
                $sub_array['returned_by'] = "";
                $sub_array['date_return'] = "";
                $sub_array['time_return'] = "";
            }
            $data[] = $sub_array;
        }

        $json_data['results'] = $data;

        echo json_encode($json_data);
    }

}
