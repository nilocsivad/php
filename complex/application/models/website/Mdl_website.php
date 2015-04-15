<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_WebSite extends CI_Model {
	
	const TABLE_NAME = "tbl_WebSite";
	
	function __construct() {
		parent::__construct();
	}
	
	function insert($data) {
		
		$this->db->insert(Mdl_WebSite::TABLE_NAME, $data);
			
		$rows = $this->db->affected_rows();
		$wsID = $this->db->insert_id();
		
		return array("return"=>$rows, "lastID"=>$wsID);
	}
	
	function remove($recordID) {
		return $this->db->where("websiteID", $recordID)->delete(Mdl_WebSite::TABLE_NAME);
	}
	
	function modify($data) {
		
		$this->db->where("websiteID", $data["websiteID"])->update(Mdl_WebSite::TABLE_NAME, $data);
			
		$rows = $this->db->affected_rows();
		
		return array("return"=>$rows);
	}
	
	function count_all() {
		return $this->db->count_all(Mdl_WebSite::TABLE_NAME);
	}
	
	function get_websites($num, $offset = 0) {
		return $this->db->get(Mdl_WebSite::TABLE_NAME, $num, $offset);		
	}
	
	function queryByID($websiteID) {
		return $this->db->where("websiteID = ", $websiteID)->select("*")->get(Mdl_WebSite::TABLE_NAME)->result();
	}
	
}