<?php 
defined('BASEPATH') or die('Access Denied');

class CovidSurveyController extends CI_Controller {

    public function __construct() {
        Parent::__construct();
        $this->load->model('CovidSurveyModel');
    }

    public function index() {
        $data['title'] = 'Covid Survey Form';
        $this->load->view('covidsurvey/covidsurvey',$data);
    }
}