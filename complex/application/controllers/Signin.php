<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignIn extends CI_Controller {
	
	public function index($error = null) {
		$this->path("login", $error);
	}
	
	private function encrypt($pass) {
		$pwd = md5( $pass );
		$length = strlen( $pass );
		$new = substr( $pwd, 0, $length ) . strtoupper( substr( $pwd, $length) );
		$result = md5( $new );
		return $result;
	}
	
	public function validate() {
		
		if ( !isset( $_POST["lname"]) || !isset( $_POST["lpass"]) ) {
			
			$info = array(
					"error" => "Login name or password must not be null!"
				);
			$this->path("errors/error", $info);
			
		} else {

			$data = array(
					"lname" => $_POST["lname"],
					"lpass" => $this->encrypt( $_POST["lpass"] )
				);
				
			// ** load the model and get results
			$this->load->model('account/Mdl_account');
			
			$result = $this->Mdl_account->validate($data);
			
			if ( count( $result) > 0 ) {
				$this->session->userdata($result);
				$this->session->set_userdata(self::SIGNIN_KEY, true);
				$this->url("/website");
			} else {
				$info = array(
						"error" => "Login name or password must not be null!"
					);
				$this->index($info);
			}
		}
	}
	
	public function page() {
		$this->path("account/register");
	}
	
	public function register() {

		if ( !isset( $_POST["lname"]) || !isset( $_POST["lpass"]) ) {
				
			$info = array(
					"error" => "Failed to access current web site!"
			);
			$this->path("errors/error", $info);
				
		} else {
		
			$data = array(
					"lname" => $_POST["lname"],
					"lpass" => $this->encrypt( $_POST["lpass"] ),
					"status" => "0"
				);
				
			// ** load the model and get results
			$this->load->model('account/Mdl_account');
				
			$result = $this->Mdl_account->insert($data);
			
			if ($result["return"] > 0 || $result["lastID"] > 0) {
				$this->url("/signin");
			} else {
				$info = array( 
						"error" => "Failed to register new account!"
					);
				$this->path("errors/error", $info);
			}
		}
	}
	
}
