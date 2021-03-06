<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	
	public function index($error = null) {
		$this->path("account/signin", $error);
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
				
				$this->Mdl_account->signinTime( array("lname" => $data["lname"], "last_time" => time()) );
				
				$this->session->set_userdata(self::SESSION_KEY, $result);
				$this->session->set_userdata(self::SIGNIN_KEY, true);
				
				set_cookie("error", "", time());
				$this->url("");
			} else {
				$info = array(
						"error" => "Incorrect Login name or password!"
					);
				set_cookie("error", "Incorrect Login name or password!", time() - 60);
				$this->url("signin");
			}
		}
	}
	
	public function signup() {
		$this->path("account/signup");
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
			
			var_dump( $this->db->_error_message() );
			var_dump( $this->db->_error_number() );
			
			if ($result["return"] > 0 || $result["lastID"] > 0) {
				$this->url("signin");
			} else {
				$info = array( 
						"error" => "Failed to register new account!"
					);
				$this->path("errors/error", $info);
			}
		}
	}
	
}
