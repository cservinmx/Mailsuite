<?php defined('BASEPATH') OR exit('No direct script access allowed');
$current="contactos";

if (!isset($this->session->userdata['logged_in'])) {
	header("Location: login");
}

?>
