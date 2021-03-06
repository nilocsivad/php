<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {
	
	/**
	 * $this->config->item("base_url") + $this->config->item("index_page")
	 */
	protected $base_url;

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');
		$this->load->initialize();
		log_message('info', 'Controller Class Initialized');
		
		$this->base_url = ( $this->config->item("base_url") . $this->config->item("index_page") );
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}
	
	const SIGNIN_KEY = "IS_SIGNIN_COMPLEX";
	const SESSION_KEY = "SIGNIN_SESSION";
	
	protected function valid_session() {
		if ( !isset( $this->session ) || $this->session->userdata(self::SIGNIN_KEY) == null || $this->session->userdata(self::SESSION_KEY) == null || $this->session->userdata(self::SIGNIN_KEY) == false ) {
			echo( self::SESSION_KEY . "##########" );
			$this->url("account");
			return false;
		}
		echo( self::SIGNIN_KEY . "$$$$$$$$" );
		return true;
	}
	
	/**
	 * jump to ~~~
	 */
	protected function go() {
		if ( isset( $_GET["path"]) ) {
			$this->path( $_GET["path"] );
		} else if ( isset( $_GET["url"]) ) {
			$this->url( $_GET["url"] );			
		} else {
			$this->load->view("welcome_message");
		}
	}
	
	protected function path($path, $data = null) {

		$path = ( empty( $path ) ? "login" : $path );
		
		$this->load->view($path, $data);
	}
	
	protected function url($url) {
		
		$url = ( empty( $url ) ? "" : ("/" . $url) );
		
		header("Location:" . $this->base_url . $url);
	}
	
	protected  function error($code, $text = null) {
		header('Status: ' . $code . ' ' . $text, TRUE);
	}

}
