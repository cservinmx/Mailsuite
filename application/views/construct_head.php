<?php
	/*
	 * Update 11-10-2019
	 * Carlos Servín carlos@servin.mx
	 * Mailsuite www.servin.mx
	 * construct_head 11-10-2019
	 */

require_once('template/head.php');
require_once('template/css.php');

if (isset($this->session->userdata['logged_in'])) {
$pass = ($this->session->userdata['logged_in']['pass']);
$email = ($this->session->userdata['logged_in']['email']);
//$idprofile = ($this->session->userdata['logged_in']['idprofile']);
} /*else {
header("location: ".base_url()."index.php/login/user_login_process");
}*/

if (!isset($this->session->userdata['logged_in'])){
    echo "<body class='hold-transition login-page'>";
}else{

    echo "<body class='hold-transition skin-blue sidebar-mini'>";
    echo '<div class="wrapper">';
    echo '<header class="main-header">';
      //-- Logo -->
     require_once('template/logo.php');
     //-- Header Navbar: style can be found in header.less -->
     require_once('template/nav.php');
    echo '</header>';
    //-- Left side column. contains the logo and sidebar -->
    require_once('template/sidebar.php');
  //  echo '<div class="content-wrapper">';

    //require_once('template/nav.php');
    if (isset($this->session->userdata['logged_in'])) {
     require_once('template/sidebar.php');
    }

    //echo '</div>';
    require_once('template/javascript.php');
}
?>
