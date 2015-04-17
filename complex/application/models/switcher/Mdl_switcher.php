<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_Switcher extends CI_Model {
	
	const TABLE_NAME = "tbl_Sys_Items";
	
	function __construct() {
		parent::__construct();
	}
	
	function get_items($sign = 0) {
		return $this->db->select(" title, href ")->get(Mdl_Switcher::TABLE_NAME);
	}
	
}
