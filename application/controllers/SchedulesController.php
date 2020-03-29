<?php
defined('BASEPATH') or die('Access Denied');

class SchedulesController extends CI_Controller {

	public function __construct() {
        Parent::__construct();
        $this->load->model("CalendarModel");
    }

	public function index() {

		$this->load->helper('site_helper');
		$data = html_variable();
		$data['title'] = 'Schedules';
		$data['schedules'] = ' active';
		$data['results'] = $this->CalendarModel->get_events();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('schedules/schedules');
		$this->load->view('templates/footer');

	}
}