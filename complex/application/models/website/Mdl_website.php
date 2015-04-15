<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_website extends CI_Model {
	
	const TABLE_NAME = "tbl_WebSite";
	
	function __construct() {
		parent::__construct();
	}
	
	function insert($data) {
		
		$this->db->insert("tbl_WebSite", $data);
			
		$rows = $this->db->affected_rows();
		$wsID = $this->db->insert_id();
		
		return array("return"=>$rows, "lastID"=>$wsID);
	}
	
	function remove($recordID) {
		return $this->db->where("websiteID", $recordID)->delete(Mdl_website::TABLE_NAME)->affected_rows();
	}
	
	function modify() {
		
	}
	
	function count_all() {
		return $this->db->count_all(Mdl_website::TABLE_NAME);
	}
	
	function get_websites($num, $offset = 0) {
		return $this->db->get(Mdl_website::TABLE_NAME, $num, $offset);		
	}
	
	function queryByID($websiteID) {
		return $this->db->where("websiteID = ", $websiteID)->select("*")->get(Mdl_website::TABLE_NAME)->result();
	}
	
}