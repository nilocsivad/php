<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebSite extends CI_Controller {

	public function index() {
		
		
		
		$this->load->view("website/all.php");
	}
	
	public function all() {
		$this->index();
	}
	
	public function add() {
		$this->path("website/add");
	}
	
	public function insert() {
		
		if ( !isset( $_POST["url"] ) ) {
			
			$info = array(
					"error" => "Failed to access current web site!"
				);
			$this->path("errors/error", $info);
			
		} else {
		
			$data = array(
					"url" => $_POST["url"],
					"description" => $_POST["description"]
				);
			$this->db->insert("tbl_WebSite", $data);
			
			$rows = $this->db->affected_rows();
			$wsID = $this->db->insert_id();
			
			if ($rows > 0 && $wsID > 0) {
				$this->url("website/all");
			} else {
				$info = array( 
						"error" => "Failed to insert new web site!"
					);
				$this->path("errors/error", $info);
			}
		}
	}
	
}
