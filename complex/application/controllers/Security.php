<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security extends CI_Controller {
	
	public function index($error = null) {
		$this->path("security/security", $error);
	}
	
	public function encrypt() {
		
		if ( !isset( $_POST["text"] ) &&  !isset( $_POST["type"] ) ) {
			
			$info = array(
					"error" => "Failed to access current web site!"
				);
			$this->path("errors/error", $info);
			
		} else {
			
			$result = "";
			
			$text = $_POST["text"];
			$type = $_POST["type"];
		
			if ( $type == "sha1" ) { // ** encrypt by sha1
				$result = sha1( $text );
			} else { // ** default is encrypt by md5
				$result = md5( $text );
			}
			
			echo $result;
		}
	}
	
}
