
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Legal</b>Tracking</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <?php //Inicica el formulario de login
            $route=base_url()."index.php/login/user_login_process";
            $attributes = array('id' => 'mylogin');
            echo form_open($route, $attributes);
            $data=array( 'name'   => 'submit',
                   'id'     => 'isend',
                   'value'  => 'Login',
                   'type'   => 'submit',
                   'class'  => 'btn btn-primary',
                   //'onClick'  => 'crypt()'
                  );
            ?>
      <fieldset>
      <div class="form-group has-feedback">
        <input id="email" name="email" type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="pass" name="pass" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Recordarme
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
        </div>
        <!-- /.col -->
      </div>
    </fieldset>
    <?php echo form_close(); ?>

    <!--<div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
     /.social-auth-links

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>-->

  </div>
  <!-- /.login-box-body -->
</div>

<!-- /.login-box -->
