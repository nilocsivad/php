<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_website extends CI_Model {
	
	const TABLE_NAME = "tbl_WebSite";
	
	function __construct() {
		parent::__construct();
	}
	
	function count_all() {
		return $this->db->count_all(self::TABLE_NAME);
	}
	
	function get_websites($num, $offset = 0) {
		return $this->db->get(self::TABLE_NAME, $num, $offset);		
	}
	
}