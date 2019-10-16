<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url(); ?>template/img/carlos.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Carlos Servín</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Buscar...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header"></li>

      <li>
        <a href="<?= base_url(); ?>index.php">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">new</small>
          </span>
        </a>
      </li>

      <li class="treeview active">

          <i class="fa fa-envelope"></i> <span>Correo</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>

        <ul class="treeview-menu">
          <li class="active">
            <a href="<?= base_url(); ?>mail">Inbox
              <span class="pull-right-container">
                <?php /*if($oCollection->MessageUnseenCount>0){
                  echo '<span class="label label-primary pull-right">';
                  echo $oCollection->MessageUnseenCount;
                  echo '</span>';
                }*/?>
              </span>
            </a>
          </li>
          <li><a href="<?= base_url(); ?>mail/crear_correo">Crear</a></li>
          <li><a href="<?= base_url(); ?>mail/leer_correo">Leer</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= base_url(); ?>calendario/calendario.php">
          <i class="fa fa-calendar"></i> <span>Calendario</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red">3</small>
            <small class="label pull-right bg-blue">17</small>
          </span>
        </a>
      </li>

      <li>
        <a href="<?= base_url(); ?>simple.php">
          <i class="fa fa-laptop"></i>
          <span>Tareas</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li>
        <a href="<?= base_url(); ?>contactos/contactos.php">
          <i class="fa fa-group"></i>
          <span>Contactos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <!--<li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentos</span></a></li>-->


    </ul>

  </section>
  <!-- /.sidebar -->
</aside>
