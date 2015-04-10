<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebSite extends CI_Controller {

	public function index()
	{
		$this->load->view('website/list.php');
	}
	
	public function all()
	{
		$this->index();
	}
	
}
