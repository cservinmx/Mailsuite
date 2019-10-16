<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller {

  /*
   * Update 14-10-2019
   * Carlos Servín carlos@servin.mx
   * Mailsuite www.servin.mx
   * Controller Mail 14-10-2019
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

		$emails = imap_search($this->imapResource(), 'ALL');

		$array=array('emails'=>$emails, 'num_msg'=>$this->numero_mensajes());

		$this->load->view('construct_head');
		$this->load->view('mailbox/mail', $array);
		$this->load->view('construct_footer');
	}

  public function crear_correo(){
    $this->load->view('construct_head');
		$this->load->view('mailbox/crear');
		$this->load->view('construct_footer');
  }


	public function leer_correo($id=NULL){
			  $print=imap_body($this->imap_get(), 42);
		    $this->load->view('construct_head');
				$this->load->view('mailbox/leer_correo', array('print'=>$print));
				$this->load->view('construct_footer');
  }

	public function borradores(){
		$num_msg=$this->numero_mensajes();
		$emails = imap_search($this->imapResource(), 'ALL');

		$array=array('num_msg'=>$num_msg, 'emails'=>$emails, 'imapResource'=>$this->imapResource());
		$this->load->view('construct_head');
		$this->load->view('mailbox/borradores', $array);
		$this->load->view('construct_footer');
	}

	public function enviados(){
		$this->load->view('construct_head');
		$this->load->view('mailbox/leer_enviados', array('print'=>$print));
		$this->load->view('construct_footer');
	}



	public function leer_junk(){
		$this->load->view('construct_head');
		$this->load->view('mailbox/junk', array('print'=>$print));
		$this->load->view('construct_footer');
	}

	public function leer_papelera(){
		$this->load->view('construct_head');
		$this->load->view('mailbox/papelera', array('print'=>$print));
		$this->load->view('construct_footer');
	}

	public function leer_otrascarpetas(){
		$this->load->view('construct_head');
		$this->load->view('mailbox/otrascarpetas', array('print'=>$print));
		$this->load->view('construct_footer');
	}

	public function leer_importantes(){
		$this->load->view('construct_head');
		$this->load->view('mailbox/importantes', array('print'=>$print));
		$this->load->view('construct_footer');
	}

	public function imapResource(){
		//The location of the mailbox.
		$mailbox = '{mail.legaltracking.mx:993/imap/ssl}';
		//The username / email address that we want to login to.
		$username = $this->session->userdata['logged_in']['email'];
		//The password for this email address.
		$password = base64_decode($this->session->userdata['logged_in']['pass']);
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

		return $imapResource;
	}


	public function numero_mensajes(){
			$num_msg=imap_num_msg ($this->imapResource());
			return $num_msg;
	}




}

?>
