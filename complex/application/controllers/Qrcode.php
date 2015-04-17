<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QRCode extends CI_Controller {
	
	public function index($error = null) {
		$this->path("qrcode/create", $error);
	}
	
}
