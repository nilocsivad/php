<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_Switcher extends CI_Model {
	
	const TABLE_NAME = "tbl_Sys_Items";
	
	function __construct() {
		parent::__construct();
	}
	
	function count_all() {
		return $this->db->count_all(Mdl_switcher::TABLE_NAME);
	}
	
	function get_items($sign = 0) {
		return $this->db->get(Mdl_switcher::TABLE_NAME);
	}
	
}
