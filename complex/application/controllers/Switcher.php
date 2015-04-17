<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Switcher extends CI_Controller {
	
	public function index() {
		
		// ** load the model and get results
		$this->load->model('switcher/Mdl_switcher');
		
		$data["items"] = $this->Mdl_switcher->get_items()->result_array();
		var_dump( $data["items"] );
		
		$this->path("switcher/items", $data);
	}
	
}
