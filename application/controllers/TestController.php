<?php

class TestController extends CI_Controller {


	public function index() {

		$this->load->helper('site_helper');

		$data = html_variable();

		$data['title'] = 'Masterlist';

		var_dump($data);

	}
}