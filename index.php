<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php session_start(); ?>
<?php 
// require_once('conf/config.login.php');
require_once('conf/config.postgres.php');
header('Content-Type: text/html; charset=utf-8');
?>
<?php
if ( isset($_SESSION['sesion_username']) && isset($_SESSION['sesion_userid']) && $_SESSION['sesion_username'] != '' && $_SESSION['sesion_userid'] != '0' ){
  header("Location: main.php");
}else{
  //header("Location: servicios/logout.php");
  $usuario_activo=false;
  $foto_user = "media/carnet/mituxvenezuela_opt.png";
  //$foto_user = "apiv3.0/media/carnet/personal.png";
  //$foto_user = "apiv3.0/media/carnet/11829328.jpg";  
  $name_user = "Invitado";
  $cargo_user = "";
  $dpto_user = "";
  $texto_user = "";

  $cedula = "";
  $codigo = "";
  $cuenta = "";
  
  // $cedula = "11829328";
  // $codigo = "102200";
  // $cuenta = "014297";


}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo title_app; ?></title>
    <link rel="shortcut icon" href="media/images/favicon.ico" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="apiv3.0/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="apiv3.0/plugins/font-awesome-4.4.0/css/font-awesome.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="apiv3.0/plugins/ionicons-2.0.1/css/ionicons.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="apiv3.0/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="apiv3.0/dist/css/skins/skin-blue-light.css">
    <link rel="stylesheet" href="apiv3.0/plugins/jquery-typeahead-2.3.3/dist/jquery.typeahead.min.css">    
    <!--daterangepicker-->
    <link rel="stylesheet" href="apiv3.0/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="apiv3.0/plugins/select2/select2.css">
    <link rel="stylesheet" href="apiv3.0/plugins/select2/select2-bootstrap.css">
       
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="apiv3.0/plugins/html5shiv-master/dist/html5shiv.min.js"></script>
        <script src="apiv3.0/plugins/Respond-master/dest/respond.min.js"></script>
    <![endif]-->


    <!--<link rel="stylesheet" type="text/css" href="stylesheet.css" />-->
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="apiv3.0/plugins/AjaxUpload.2.0/css/estilos.css" type="text/css" />
    <!--archivos para bootstrap-table-->
    <!--<link rel="stylesheet" href="apiv3.0/dist/css/skins/skin-blue-light.css">-->
    <!-- Bootstrap Table  CSS -->
    <link rel="stylesheet" href="apiv3.0/plugins/bootstrap-table/bootstrap-table.css">
    <style type="text/css">
      /* 
      img.imgcenter{
          display: block;
          margin-left: auto;
          margin-right: auto;
          border:none;
          height: auto;
          width: 100%;
          }*/
    </style>

  </head>
  <body class="hold-transition skin-blue-light login-page layout-boxed">
    <!--class="skin-blue sidebar-mini layout-boxed"-->
    
    <div id="ministerio-header">
      <img class="pull-left"  id="img-gb" height="45px" src="<?php echo $ruta_banner1; ?>" />
      <img class="pull-right" id="img-cv" height="45px" src="<?php echo $ruta_banner2; ?>" />
    </div>
    <!-- <img src="<?php echo $ruta_banner; ?>"  class="imgcenter"> -->
    <img src="media/logos/raya.png"  class="imgcenter">

    

    <!--<img src="media/images/banner/bar_gob.png" alt="W3C_validator" class="imgcenter">-->
    
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="." class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>ZEES</b></span>
          <!-- logo for regular state and mobile devices -->
          <img src="media/images/encabezado_200x50.png">
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="javascript:void(0);" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            
            <ul class="nav navbar-nav">

              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="logo-lg"><b><?php echo title_app;?></b></span>
                  <i class="fa fa-bank"></i>
                  <i class="fa "></i>
                </a>
              </li>
              
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?php echo $foto_user; ?>" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $name_user; ?></span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $foto_user; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <!-- Status -->
              <p><?php echo $name_user; ?></p>
              <a id="estatus_loading" href="javascript:void(0);"><i class="fa fa-circle text-danger"></i> Offline</a>
            </div>
          </div>
          <!--* * * * * * * * * * * * * * * * * * * * * * * * * * -->
          <!--* * * * * * * * * * * * * * * * * * * * * * * * * * -->
          <!--* * * * * * * * * * * * * * * * * * * * * * * * * * -->
          <!-- Sidebar Menu LEFT -->
          <ul id="sidebar-menu" class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li id="iniciarsesion" class="active"><a href="javascript:void(0);"><i class="fa fa-user"></i> <span>Iniciar Sesión</span></a></li>
          </ul><!-- /.sidebar-menu -->
          
          <!-- Cuadro de notificaciones -->
          <!-- Cuadro de notificaciones -->
          <!-- Cuadro de notificaciones -->
          <div id="alertBoxes" style="display:none ;" class="box box-danger">
            <div id="box-header" class="box-header with-border" style="font-weight:bold" >
              <strong>Notificaciones</strong>
            </div>
            <div id="box-body" class="box-body">
                <span class="timer" id="timer"></span>Cargando por favor espere
            </div>
          </div>
                
        </section>
        <!-- /.sidebar -->
        
        <section>
          
        </section>
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 id="header_principal">
            <!--Página Principal-->
            <!--Principal-->
          </h1>
          <ol class="breadcrumb">
            <!--<li id="breadcrumb_nivel" ><a href="."><i class="fa fa-dashboard"></i>Inicio</a></li>-->
            <!--<li id="breadcrumb_subnivel" class="active">Principal</li>-->
            <div id="relojservidor" class="relojservidor" style="border: 0px solid; text-align: center;">Reloj</div>
          </ol>
        </section>        
        
        <!-- Main content -->
        <section id ="content" class="content">
            <!-- Your Page Content Here -->
            <!-- Your Page Content Here -->
          <br><br>
            <?php
            include('vistas/vista_carousel.html');
            ?>
          <!-- ************************************************************ -->

          <div id="modal_login" class="modal fade">
                  <div class="login-box">
                      <div class="login-logo">
                          <br><br><br>
                      </div>
                      <div class="login-box-body">
                          <p class="login-box-msg">Iniciar sesión</p>
                          <form action="" method="post" autocomplete="off">
                              <div class="form-group has-feedback">
                                  <input id="login_cedula" name="login_cedula" type="text" class="form-control" value="<?php echo $cedula; ?>" placeholder="Cédula (12345678)" title="Ingrese su cédula" pattern="[0-9]+" required  autocomplete="off" >
                                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                              </div>

                              <div class="form-group has-feedback">
                                  <input id="login_plantel" name="login_plantel" type="text" class="form-control" value="<?php echo $codigo; ?>" placeholder="Código Nómina (123456)" title="Ingrese los últimos 6 digitos de su código de Dependencia de su Recibo de Pago" pattern="[0-9]+" required  autocomplete="off" >
                                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                              </div>
                              <div class="form-group has-feedback">
                                  <input id="login_nomina" name="login_nomina" type="password" class="form-control" value="<?php echo $cuenta; ?>" placeholder="Cuenta Bancaria (123456)" title="Ingrese los últimos 6 digitos de su Cuenta Bancaria" pattern="[0-9]+" required autocomplete="off">
                                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                              </div>
                              <div class="row">
                                  <div class="col-xs-4">
                                      <button type="reset" class="btn btn-default btn-block btn-flat" data-dismiss="modal">Cancelar</button>
                                  </div>
                                  <div class="col-xs-4">
                                    
                                  </div>
                                  <div class="col-xs-4">
                                      <button id="login_userbttn" type="button" class="btn btn-primary btn-block btn-flat ">Ingresar</button>
                                  </div>
                              </div>
                          </form>
                      </div>  
                    </div>
          </div>
          <!-- ********************************************************* -->


          <form class="form-horizontal" id="form_modal_login2"> 
            <div id="modal_login2" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Registrar usuario</h4>
                  </div>
                  
                  <div class="modal-body">
                      <div class="box-body">
            <!-- //*******************************
            //******************************* -->
            
                        <form id="form_registrar_user" action="" method="post" autocomplete="off">
                          
                          <!-- <div class="form-group has-feedback">
                            <input id="txt_reg_cedula" name="txt_reg_cedula" type="text" class="form-control" placeholder="Cédula">
                            <span class="fa fa-credit-card form-control-feedback"></span>
                          </div> -->
                          <div class="form-group has-feedback">
                            <input id="txt_reg_cedula" name="txt_reg_cedula" type="text" pattern="\d+" class="form-control" placeholder="Cédula">
                            <span class="fa fa-credit-card form-control-feedback"></span>
                          </div>
                          

                          <div class="form-group has-feedback">
                            <input id="txt_reg_nombre" name="txt_reg_nombre" type="text" class="form-control" placeholder="Nombre Completo">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                          </div>

                          <div class="form-group has-feedback">
                            <input id="txt_reg_apellido" name="txt_reg_apellido" type="text" class="form-control" placeholder="Apellido Completo">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                          </div>

                          <div class="form-group has-feedback">
                            <input id="txt_reg_correo" name="txt_reg_correo" type="email" class="form-control" placeholder="Correo Electrónico">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                          </div>

                          <div class="form-group has-feedback">
                            <input id="txt_reg_telefono" name="txt_reg_telefono" type="phone" class="form-control" placeholder="Telefóno">
                            <span class="fa  fa-phone form-control-feedback"></span>
                          </div>

                          <div class="form-group has-feedback">
                          <!-- <label for="txt_tipo_dedicacion" class="col-sm-3 control-label">Tipo de Dedicación</label> -->
                          <!-- <div class="col-sm-9"> -->
                            <select class="form-control" id="txt_departamento" name="txt_departamento">
                                <option value="0" selected="selected">Departamento...</option>
                                <option value="1" >Personal</option>
                                <option value="2" >Informática</option>
                            </select>
                          <!-- </div> -->
                          </div>


                          <div class="form-group has-feedback">
                            <input id="txt_reg_password1" name="txt_reg_password1" type="password" class="form-control" placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                          </div>
                          
                          <div class="form-group has-feedback">
                            <input id="txt_reg_password2" name="txt_reg_password2" type="password" class="form-control" placeholder="Retype password">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                          </div>

            <!-- //.....*******************************
            //.....******************************* -->
                        
                      </div><!-- /.box-body -->
                  </div> <!--/.modal-body-->
                  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <button type="button" name="login_register_user" id="login_register_user"  class="btn btn-primary submit">Registrar</button>
                    </div>
                    
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          
          </form> 


          


        <div id="alertBoxes"></div>    
                      
            <!-- end Your Page Content Here -->
            <!-- end Your Page Content Here -->
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          <?php echo $dptoweb;?>
        </div>
        <!-- Default to the left -->
        <strong id="copyrigth">Copyright &copy; <?php echo copyrigth3_app; ?> <a href="<?php echo copyrigth2_app; ?>" target='_blank'><?php echo copyrigth1_app; ?></a>.</strong> All rights reserved.
      </footer>


    </div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="apiv3.0/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI -->
    <script src="apiv3.0/plugins/jQueryUI/jquery-ui.min.js"></script>
    
    <!-- Bootstrap 3.3.5 -->
    <script src="apiv3.0/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- Bootstrap-Table JS-->
    <script src="apiv3.0/plugins/bootstrap-table/bootstrap-table.js"></script>
    
    <!-- Bootstrap-Table locale ES-SP-->
    <script src="apiv3.0/plugins/bootstrap-table/locale/bootstrap-table-es-SP.js"></script>
    <script src="apiv3.0/plugins/jquery-typeahead-2.3.3/dist/jquery.typeahead.min.js"></script>
    <script src="apiv3.0/plugins/bootstrap-table/extensions/filter-control/bootstrap-table-filter-control.js"></script>
    
    <!-- printMe-master -->
    <script src="apiv3.0/plugins/printMe-master/jquery-printme.min.js"></script>

    <!-- date-range-picker -->
    <script src="apiv3.0/plugins/moment-develop/min/moment.min.js"></script>
    <script src="apiv3.0/plugins/moment-develop/locale/es.js"></script>
    <script src="apiv3.0/plugins/daterangepicker/daterangepicker.js"></script>
    
    <!-- inputmask -->
    <script src="apiv3.0/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="apiv3.0/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="apiv3.0/plugins/input-mask/jquery.inputmask.extensions.js"></script>

    <!-- bootstrap-validator -->
    <script src="apiv3.0/plugins/bootstrap-validator/dist/validator.min.js"></script>

    <!--jquery.validate-->
    <!-- <script src="apiv3.0/plugins/jquery-validation-1.14.0/dist/jquery.validate.js" type="text/javascript"></script> -->
    <!-- <script src="apiv3.0/plugins/jquery-validation-1.14.0/dist/localization/messages_es.js" type="text/javascript"></script> -->
    
    <!-- Select2 -->
    <script src="apiv3.0/plugins/select2/select2.full.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="apiv3.0/dist/js/app.js"></script>
    <!-- Función de control principal  de la template-->
    <script type="text/javascript" src="apiv3.0/funciones/funciones3.0.js"></script>
    <!-- Función de control principal -->
    <script type="text/javascript" src="controladores/functions.ajax.js"></script>
    
  </body>
</html>

