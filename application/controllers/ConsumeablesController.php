<?php
defined('BASEPATH') or die('Access Denied');

class ConsumeablesController extends CI_Controller {

    public function __construct() {
        Parent::__construct();
        $this->load->model("ConsumeablesModel");
    }

    public function index() {
        if($this->session->userdata('logged_in')) {
			
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Consumeables';
			$data['consumeables'] = ' active';
			$data['ul_items_tree'] = ' active';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('consumeables/consumeables');
			$this->load->view('templates/footer');
			$this->load->view('consumeables/script');
		} else {
			redirect('','refresh');
		}
    }

	public function prf() {
        if($this->session->userdata('logged_in')) {
			
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Project Request Form';
			$data['consumeables'] = ' active';
			$data['ul_items_tree'] = ' active';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('consumeables/prf');
			$this->load->view('templates/footer');
			$this->load->view('consumeables/script');
		} else {
			redirect('','refresh');
		}
    }
	public function prfInput()
	{
	/*call CodeIgniter's default Constructor*/
	parent::prfInput();
	
	/*load database libray manually*/
	$this->load->database('vinculum');
	
	/*load Model*/
	$this->load->model('ConsumeablesModel');
	}
        /*Insert*/
	public function savedata()
	{
		/*load registration view form*/
		$this->load->view('consumeables/prf');
	
		/*Check submit button */
		if($this->input->post('save'))
		{
		    $data['project_name']=$this->input->post('project_name');
			$data['date_requested']=$this->input->post('date_requested');
			$data['project_activity']=$this->input->post('project_activity');
			$data['dated_issued']=$this->input->post('date_issued');
			$data['indirect_items']=$this->input->post('indirect_items');
			$data['quantity']=$this->input->post('quantity');
			$data['available']=$this->input->post('available');
			$data['remarks']=$this->input->post('remarks');
			$data['counted']=$this->input->post('counted');
			$data['direct_items']=$this->input->post('direct_items');
			$data['tools']=$this->input->post('tools');
			$data['prepared_by']=$this->input->post('prepared_by');
			$data['person_in_charge']=$this->input->post('person_in_charge');
			$data['check_by']=$this->input->post('check_by');
			$response=$this->ConsumeablesModel->saverecords($data);
			if($response==true){
			        echo "Records Saved Successfully";
			}
			else{
					echo "Insert error !";
			}
		}
	}
}