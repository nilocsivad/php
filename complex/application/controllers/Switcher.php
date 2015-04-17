<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Switcher extends CI_Controller {
	
	public function index() {
		
		$data["items"] = array(
				array( "text" => "QR二维码", "href" => "http://" ),
				array( "text" => "MD5/SHA1...", "href" => "http://" ),
				array( "text" => "网址收藏", "href" => "http://" ),
				array( "text" => "Four", "href" => "http://" ),
				array( "text" => "Five", "href" => "http://" ),
				array( "text" => "Six", "href" => "http://" ),
				array( "text" => "Seven", "href" => "http://" )
			);
		
		$this->path("switcher/items", $data);
	}
	
}
