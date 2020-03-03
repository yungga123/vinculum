<?php
defined('BASEPATH') or die('Access Denied');

require('fpdf/fpdf_multicell.php');

class MyfpdfMultiCell extends Fpdf {

	function __construct () {
		parent::__construct();
		$CI =& get_instance();
	}
}