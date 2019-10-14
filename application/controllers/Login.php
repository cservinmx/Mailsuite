<?php
/*
 * Update 11-10-2019
 * Carlos Servín carlos@servin.mx
 * Mailsuite www.servin.mx
 * Controller Login 11-10-2019
 */

defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('login_model');
	}

	public function index() {
		$this->load->view('construct_head');
		$this->load->view('index');
		$this->load->view('construct_footer');
	}

	// Check for user login process
	public function user_login_process() {

		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('pass', 'Pass', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				header('Location: '.base_url().'index.php/dashboard');
			}else{
				$this->load->view('construct_head');
				$this->load->view('index');
				$this->load->view('construct_footer');
			}
		}else{

			/*****/

			//The location of the mailbox.
			$mailbox = '{mail.legaltracking.mx:993/imap/ssl}INBOX';
			//The username / email address that we want to login to.
			$username = $this->input->post('email');
			//The password for this email address.
			$password = $this->input->post('pass');

			//Attempt to connect using the imap_open function.
			$imapResource = imap_open($mailbox, $username, $password);

			//If the imap_open function returns a boolean FALSE value,
			//then we failed to connect.
			//Aqui tiene que validar en webmail
			if($imapResource === false){
			    //If it failed, throw an exception that contains
			    //the last imap error.
			    throw new Exception(imap_last_error());
			}
	

					//print_r($result);
					if ($imapResource != false) {
						$session_data = array(
												'email' => $this->input->post('email'),
												'pass' => base64_encode($this->input->post('pass'))
										);
						// Add user data in session
						$this->session->set_userdata('logged_in', $session_data);
						$route='Location: '.base_url().'index.php/dashboard';
						header($route);
					}
				}

	}

	// Logout from admin page
	public function logout() {
		// Removing session data
		$sess_array = array( 'username' => '');
		$this->session->unset_userdata('logged_in', $sess_array);
		$data = array('error_message' =>'La sesión finalizó correctamente.', 'error_class'=>'teal');
		$this->load->view('construct_head');
		$this->load->view('index', $data);
		$this->load->view('construct_footer');
		}

}

?>
