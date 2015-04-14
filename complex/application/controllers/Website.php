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
		$this->load->view("website/add.php");
	}
	
	public function insert() {
		
		header("Location:" . $this->config->item("base_url") . $this->config->item("index_page") . "/welcome/index");
	}
	
}
