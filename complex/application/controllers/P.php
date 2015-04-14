<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P extends CI_Controller {

	public function index() {
		
		if ( isset( $_GET["path"]) ) {
			
			$path = $_GET["path"];
			$path = ( empty( $path ) ? "welcome_message" : $path );
			
			$this->load->view($path);
			
		} else if ( isset( $_GET["url"]) ) {
			
			$href = ( $this->config->item("base_url") . $this->config->item("index_page") );
			
			$url = $_GET["url"];
			$url = ( empty( $url ) ? "/p" : ("/" . $url) );
			
			header("Location:" . $href . $url);
			
		} else {
			
			$this->load->view("welcome_message");
		}
		
	}
	
}
