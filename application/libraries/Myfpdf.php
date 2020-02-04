<?php
defined('BASEPATH') or die('Access Denied');

require('fpdf/fpdf.php');

class Myfpdf extends Fpdf {

	function __construct () {
		parent::__construct();
		$CI =& get_instance();
	}
}