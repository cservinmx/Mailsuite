<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  /*
   * Update 14-10-2019
   * Carlos Servín carlos@servin.mx
   * Mailsuite www.servin.mx
   * Controller Login 14-10-2019
   */

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		//$this->load->model('login_model');
	}

	public function index(){
		$this->load->view('construct_head');
		$this->load->view('dashboard');
		$this->load->view('construct_footer');

	}
}

?>
