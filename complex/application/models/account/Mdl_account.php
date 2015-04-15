<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_Account extends CI_Model {
	
	const TABLE_NAME = "tbl_Account";
	
	function __construct() {
		parent::__construct();
	}
	
	function validate($data) {
		return $this->db->where("lname", $data["lname"])->where("lpass", $data["lpass"])->select("*")->get(Mdl_Account::TABLE_NAME)->result();
	}
	
	function insert($data) {
		
		$this->db->insert(Mdl_Account::TABLE_NAME, $data);
			
		$rows = $this->db->affected_rows();
		$wsID = $this->db->insert_id();
		
		return array("return"=>$rows, "lastID"=>$wsID);
	}

}
	