<?php defined('BASEPATH') OR exit('No direct script access allowed');
$current="mailbox";

if (!isset($this->session->userdata['logged_in'])) {
	header("Location: login");
}

//The location of the mailbox.
$mailbox = '{mail.legaltracking.mx:993/imap/ssl}INBOX';
//The username / email address that we want to login to.
$username = $this->session->userdata['logged_in']['email'];
//The password for this email address.
$password = base64_decode($this->session->userdata['logged_in']['pass']);
$imapResource = imap_open($mailbox, $username, $password);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Mailbox
			<small><?= $num_msg ?> Mensajes</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Mailbox</li>
		</ol>
	</section>
<!-- Main content -->
<section class="content">
	<div class="row">

		<?php if($imapResource === false){
		    //If it failed, throw an exception that contains
		    //the last imap error.
		    throw new Exception(imap_last_error());
				}
				$emails = imap_search($imapResource, 'ALL');
		  ?>
		<div class="col-md-3">
			<a href="<?= base_url(); ?>Mail/crear_correo" class="btn btn-primary btn-block margin-bottom">Nuevo correo</a>

			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Folders</h3>

					<div class="box-tools">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body no-padding">
					<ul class="nav nav-pills nav-stacked">
						<li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox
							<span class="label label-primary pull-right">12</span></a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
						<li><a href="<?php base_url(); ?>/mail/borradores"><i class="fa fa-file-text-o"></i> Borradores</a></li>
						<li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
						</li>
						<li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
					</ul>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /. box -->
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Labels</h3>

					<div class="box-tools">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body no-padding">
					<ul class="nav nav-pills nav-stacked">
						<li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
						<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
						<li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
					</ul>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Inbox</h3>

				<!--	<div class="box-tools pull-right">
						<div class="has-feedback">
							<input type="text" class="form-control input-sm" placeholder="Search Mail">
							<span class="glyphicon glyphicon-search form-control-feedback"></span>
						</div>
					</div>-->
					<!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body no-padding">
					<div class="table-responsive mailbox-messages">
						<table id="results"  class="table table-bordered">
							<thead>
							<tr>
								<th> <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
								</button></th>
								<th></th>
								<th>De</th>
								<th>Asociar</th>
								<th>Asunto</th>
								<th>Enviado</th>
							</tr>
							</thead>
							<tbody>
								<?php
								if(!empty($emails)){

								foreach(array_reverse($emails) as $clave => $email){
								//Fetch an overview of the email.
								$overview = imap_fetch_overview($imapResource, $email);
								$overview = $overview[0];
								 ?>
							<tr>
								<td><input type="checkbox"></td>
								<td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
								<td class="mailbox-name"><a href="<?= base_url(); ?>Mail/leer_correo/<?= $overview->uid; ?>"><?= $overview->from; ?></a></td>
								<td>
									<div class="btn-group">
													<button type="button" class="btn btn-info  dropdown-toggle" data-toggle="dropdown">
														<span class="caret"></span>
														<span class="sr-only">Toggle Dropdown</span>
													</button>
													<ul class="dropdown-menu info" role="menu">
														<li><a href="#">Litigios</a></li>
														<li><a href="#">Inmobiliaria</a></li>
														<li><a href="#">Civil mercatil</a></li>
														<li><a href="#">Corporativos</a></li>
														<li><a href="#">Propiedad Intelectual</a></li>
														<!--<li class="divider"></li>
														<li><a href="#">Separated link</a></li>-->
													</ul>
												</div>
								</td>
								<td class="mailbox-subject"><?php
								if($overview->seen==0){
									echo '<small class="label pull-right bg-green">new</small>';
								}
								echo htmlentities($overview->subject); ?> <div class="mailbox-attachment"></div></td>

								<td class="mailbox-date">5 mins ago</td>
							</tr>
							<?php }

							}?>

							<tr>
								<td><input type="checkbox"></td>
								<td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
								<td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
								<td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
								</td>
								<td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
								<td class="mailbox-date">Yesterday</td>
							</tr>
							</tbody>
						</table>
						<!-- /.table -->
					</div>
					<!-- /.mail-box-messages -->
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /. box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  $(function () {
    $('#results').DataTable();
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>
