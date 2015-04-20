<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebSite extends CI_Controller {
	
	const PAGE_SIZE = 30;

	public function index() {
		
		$offset = $this->uri->segment(3);
		$offset = empty($offset) ? 0 : $offset;
		
		// ** load the model and get results
		$this->load->model('website/Mdl_website');
		
		$total_rows = $this->Mdl_website->count_all();
		
		$data["results"] = $this->Mdl_website->get_websites( WebSite::PAGE_SIZE, $offset )->result_array();
		
		{ // ** 自动创建分页区域
			$config['base_url'] = $this->base_url . '/website/all/';
			$config['total_rows'] = $total_rows;
			$config['per_page'] = WebSite::PAGE_SIZE;
			$config['full_tag_open'] = '<p class="text-capitalize text-right">';
			$config['full_tag_close'] = '</p>';
			$config['use_page_numbers'] = FALSE; // ** true：显示的页码 false:显示第多少条记录
			$this->pagination->initialize($config);
		}
		
		$this->path("website/all", $data);
	}
	
	public function all() {
		$this->index();
	}
	
	public function add() {
		
		if ( ! $this->valid_session() ) {
			return;
		}
		$this->path("website/add");
	}
	
	public function insert() {

		if ( ! $this->valid_session() ) {
			return;
		}
		
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
			
			// ** load the model and get results
			$this->load->model('website/Mdl_website');
			
			$result = $this->Mdl_website->insert($data);
			
			var_dump($this->db->error());
			
			if ($result["return"] > 0 || $result["lastID"] > 0) {
				$this->url("website/all");
			} else {
				$info = array( 
						"error" => "Failed to insert new web site!"
					);
				$this->path("errors/error", $info);
			}
		}
	}
	
	public function remove() {

		if ( ! $this->valid_session() ) {
			return;
		}
		
		if ( !isset( $_GET["websiteID"] ) ) {
		
			$info = array(
					"error" => "NullParameter of websiteID!"
			);
			$this->path("errors/error", $info);
		
		} else {
			// ** load the model and get results
			$this->load->model('website/Mdl_website');
			$websiteID = $_GET["websiteID"];
			$this->Mdl_website->remove($websiteID);
			$this->url("website/all");
		}
	}
	
	public function update() {

		if ( ! $this->valid_session() ) {
			return;
		}
		
		if ( !isset( $_GET["websiteID"] ) ) {
				
			$info = array(
					"error" => "NullParameter of websiteID!"
			);
			$this->path("errors/error", $info);
				
		} else {
			
			// ** load the model and get results
			$this->load->model('website/Mdl_website');
			$websiteID = $_GET["websiteID"];
			$data["result"] = $this->Mdl_website->queryByID($websiteID);
			$this->path("website/update", $data);
		}
	}
	
	public function modify() {

		if ( ! $this->valid_session() ) {
			return;
		}
		
		if ( !isset( $_POST["websiteID"] ) ) {
			
			$info = array(
					"error" => "Failed to access current web site!"
				);
			$this->path("errors/error", $info);
			
		} else {
		
			$data = array(
					"websiteID" => $_POST["websiteID"],
					"url" => $_POST["url"],
					"description" => $_POST["description"]
				);
			
			// ** load the model and get results
			$this->load->model('website/Mdl_website');
			
			$result = $this->Mdl_website->modify($data);
			
			if ($result["return"] > 0) {
				$this->url("website/all");
			} else {
				$info = array( 
						"error" => "Failed to update web site!"
					);
				$this->path("errors/error", $info);
			}
		}
	}
	
}
