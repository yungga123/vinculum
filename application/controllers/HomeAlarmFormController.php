<?php 
defined('BASEPATH') or die('Access Denied');

class HomeAlarmFormController extends CI_Controller {

    public function __construct() {
        Parent::__construct();

    }

    public function index() {

        $data['title'] = 'Home Alarm Application';

        $this->load->view('home_alarm_form/home_alarm_form',$data);
    }
}