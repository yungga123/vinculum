<?php
defined('BASEPATH') or die('Access Denied');

class AccountsController extends CI_Controller {

    public function __construct() {
        Parent::__construct();
        $this->load->model("AccountsModel");
    }

    public function index() {
        if ($this->session->userdata('logged_in')['class'] == 1) {
            $this->load->helper('site_helper');

            $data = html_variable();
            $data['title'] = 'User Accounts';
            $data['hr_status'] = ' menu-open';
            $data['li_accounts'] = ' active';
            $data['ul_hr_tree'] = ' active';

            $this->load->view('templates/header',$data);
            $this->load->view('templates/navbar');
            $this->load->view('accounts/accounts');
            $this->load->view('templates/footer');
            
        } else {
            redirect('offlimits');
        }
    }

}