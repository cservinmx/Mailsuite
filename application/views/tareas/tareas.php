<?php defined('BASEPATH') OR exit('No direct script access allowed');
$current="tareas";

if (!isset($this->session->userdata['logged_in'])) {
	header("Location: login");
}

?>
