<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebSite extends CI_Controller {

	public function index() {
		
		$per_page = 5;
		$offset = $this->uri->segment(3);
		$offset = empty($offset) ? 0 : $offset;
		
		// ** load the model and get results
		$this->load->model('website/Mdl_website');
		
		$total_rows = $this->Mdl_website->count_all();
		
		$data["results"] = $this->Mdl_website->get_websites( $per_page, $offset )->result_array();
		
		{ // ** 自动创建分页区域
			$config['base_url'] = $this->base_url . '/website/all/';
			$config['total_rows'] = $total_rows;
			$config['per_page'] = $per_page;
			$config['full_tag_open'] = '<div>';
			$config['full_tag_close'] = '</div>';
			$config['use_page_numbers'] = FALSE; // ** true：显示的页码 false:显示第多少条记录
			$this->pagination->initialize($config);
		}
		
		$this->path("website/all", $data);
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
