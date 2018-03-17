<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php session_start(); ?>
<?php
// require_once('conf/config.login.php');
require_once('conf/config.postgres.php');
require_once('apiv3.0/funciones/funciones3.0.php');
header('Content-Type: text/html; charset=utf-8');
//header('Content-type: text/html; charset=iso-8859-1');
//header('Content-Type: text/plain; charset=utf-8');
//header('Content-Type: text/xml; charset=utf-8');      
if ( isset($_SESSION['sesion_username']) && isset($_SESSION['sesion_userid']) && $_SESSION['sesion_username'] != '' && $_SESSION['sesion_userid'] != '0' ){
  $usuario_activo=true;
  //$_SESSION['userid']
  //$_SESSION['username']);
  // ver_arreglo($_SESSION);
  
  //$_SESSION['sesion_userid']					= $user['id_usuario'];
  //$_SESSION['sesion_username']			= $user['nombre_usuario'];
  //$_SESSION['sesion_nivel_usuario']		= $user['nivel_usuario'];
  //$_SESSION['sesion_id_persona']			= $user['id_persona'];
  //$_SESSION['sesion_ingreso']				= $user['fechasesion'];
  //
  //$_SESSION['sesion_idpersona']				= $user2['id_persona'];
  //$_SESSION['sesion_usernombre']		= $user2['nombre_persona'] . " " .$user2['apellido_persona'];
  //$_SESSION['sesion_cedula']				= $user2['cedula_persona'];
  //$_SESSION['sesion_userfoto']				= $user2['foto_persona'];
  //$_SESSION['sesion_iddepartamento']				= $user2['id_departamento'];
  //$_SESSION['sesion_departamento'] 	= $user2['departamento_persona'];
  //$_SESSION['sesion_cargo']					= $user2['cargo_persona'];
  //$_SESSION['sesion_estatus']				= $user2['estatus_persona'];
  //$_SESSION['sesion_ultimiacceso']		= date("Y-n-j H:i:s");
  //
  $sesionencode="";
  foreach($_SESSION as $variable=>$valor) {
    if (is_string($valor)) {
        // ver_arreglo ("'$variable'=$valor&<br>");
        $sesionencode.="$variable=".utf8_encode($valor)."&";
    }elseif (is_array($valor)) {
      # code...
      # 
    }
    // $sesionencode.="$variable=".utf8_encode($valor)."&";
  }
  $sesionencode.="cierre=final";
  //echo $sesionencode;
  //$sep = "@#";
  //$sesionencode="";
  // ver_arreglo($_SESSION);
  //   Array
  // (
  //     [sesion_userid] => 215
  //     [sesion_username] => 10217598
  //     [sesion_nivel_usuario] => DIRECTOR
  //     [sesion_id_persona] => 215
  //     [sesion_id_dependencia] => 43
  //     [sesion_ingreso] => 
  //     [sesion_estatus] => ZENAYDA P RODRIGUEZ G
  //     [sesion_idpersona] => 215
  //     [sesion_usernombre] => ZENAYDA P RODRIGUEZ G
  //     [session_username1] => ZENAYDA
  //     [session_username2] => ZENAYDA
  //     [sesion_cedula] => 10217598
  //     [sesion_userfoto] => 10217598
  //     [sesion_iddepartamento] => 43
  //     [sesion_departamento] => E B RIO COLORADO
  //     [sesion_cargo] => DOC. IV /AULA
  //     [sesion_ultimiacceso] => 2017-11-11 12:16:33
  // )
  $nivelusuario = strtoupper($_SESSION["sesion_nivel_usuario"]);
  $name_user = utf8_encode($_SESSION['sesion_usernombre']);
  $name_user_corto = $_SESSION['session_username1'] ." ".$_SESSION['session_username2'];
  $name_user_corto1= $_SESSION['session_username1'];
  $name_user_corto2= utf8_encode($_SESSION['session_username2']);
  $cargo_user = $_SESSION['sesion_cargo'];
  $dpto_user = utf8_encode($_SESSION['sesion_departamento']);
// 
  $municipio = $_SESSION['sesion_municipio'];
// 
// 
  $array_dpto_user_login = explode(',',$_SESSION['sesion_id_dependencia']);
  // ver_arreglo(count($array_dpto_user_login));
  $cant_array_dpto_user_login = count($array_dpto_user_login);
  // ver_arreglo($cant_array_dpto_user_login);
  $dpto_user_login = $_SESSION['sesion_dependencias_admin2'][0]['pl_nombre'];
  // ver_arreglo($_SESSION['sesion_dependencias_admin2'][0]['pl_nombre']);
  // echo $_SESSION['sesion_dependencias_admin2'][0]['pl_nombre']; 
  // $_SESSION['']
// 
  // $texto_user = "Ultimo acceso: " . cambiar_fecha_hora($_SESSION['sesion_ingreso']);
  $texto_user = "Ultimo acceso: " . $_SESSION['sesion_ingreso'];
  // invertDate
// 
  $user= $_SESSION['sesion_username'];
  $id = $_SESSION['sesion_userid'];
  $id_persona = $_SESSION['sesion_id_persona'];
  $tokenimg = uniqid();
  $foto_user = "media/fotos/" . $_SESSION['sesion_userfoto'].".jpg";
  // 
  $userced = $_SESSION['sesion_cedula'];
// 
  $fecha_inicio_recuado = $_SESSION['sesion_fecha_inicio_recuado'];
  $fecha_cierre_recuado = $_SESSION['sesion_fecha_cierre_recuado'];
  $nombre_periodo       = $_SESSION['sesion_nombre_periodo_periodo'];
// 
  $id_jefepersonal  = $_SESSION['sesion_id_jefe_personal'];
  $id_jefezona      = $_SESSION['sesion_id_jefezona'];
// sftp://www-data@172.168.0.201/var/www/interno/actualiza2018/media/fotos/11829328.jpg
  if (!file_exists($foto_user)) {
    $foto_user = "media/carnet/mituxvenezuela_opt.png";
    $foto_user = "media/carnet/personal.png";
  }else{
    //$foto_user = "media/fotos/" . $_SESSION['sesion_userfoto'].".jpg&var=".$tokenimg;
  }
  $estatus_user = $_SESSION['sesion_estatus'];
  $ultimoacceso_user=$_SESSION['sesion_ingreso'];
    
}else{
  header("Location: servicios/logout.php");
  $usuario_activo=false;
  $foto_user = "media/carnet/mituxvenezuela_opt.png";
  //$foto_user = "apiv3.0/media/carnet/personal.png";
  //$foto_user = "apiv3.0/media/carnet/11829328.jpg";  
  $name_user = "Invitado";
  $cargo_user = "";
  $dpto_user = "";
  $texto_user = "";
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo title_app; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="media/images/favicon.ico" />
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
    <script type="text/javascript" src="apiv3.0/plugins/HTML5-Webcam-Plugin-with-jQuery-photobooth/photobooth_min.js"></script>

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

    <!-- 
     __   __   __  ___  __  ___  __        __                    __       ___  __   __                 __  ___  ___  __
    |__) /  \ /  \  |  /__`  |  |__)  /\  |__) \  /  /\  |    | |  \  /\   |  /  \ |__) __  |\/|  /\  /__`  |  |__  |__)
    |__) \__/ \__/  |  .__/  |  |  \ /~~\ |     \/  /~~\ |___ | |__/ /~~\  |  \__/ |  \     |  | /~~\ .__/  |  |___ |  \
    -->    

    <link rel="stylesheet" href="apiv3.0/plugins/bootstrapvalidator-master/dist/css/bootstrapValidator.min.css">

    
    <!--<link rel="stylesheet" type="text/css" href="stylesheet.css" />-->
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="apiv3.0/plugins/AjaxUpload.2.0/css/estilos.css" type="text/css" />
    <!--archivos para bootstrap-table-->
    <!--<link rel="stylesheet" href="apiv3.0/dist/css/skins/skin-blue-light.css">-->
    <!-- Bootstrap Table  CSS -->
    <link rel="stylesheet" href="apiv3.0/plugins/bootstrap-table/bootstrap-table.css">
    <style type="text/css">
      /*img.imgcenter{
          display: block;
          margin-left: auto;
          margin-right: auto;
          border:none;
          height: auto;
          max-width: 100%;
          }*/
    </style>

    
  </head>
  <body class="hold-transition skin-blue-light login-page layout-boxed">
    

    <!-- <img src="<?php echo $ruta_banner; ?>" class="imgcenter"> -->
    
    <div id="ministerio-header">
      <img class="pull-left"  id="img-gb" height="45px" src="<?php echo $ruta_banner1; ?>" />
      <img class="pull-right" id="img-cv" height="45px" src="<?php echo $ruta_banner2; ?>" />
    </div>
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

              <!-- titulo dle modulo-->
              <li class="dropdown messages-menu">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- <span class="logo-lg"><b><?php echo $dpto_user_login;?></b></span> -->
                  <span class="logo-lg"><b><?php echo $municipio ;?></b></span>
                  <i class="fa fa-bank"></i>
                  <i class="fa "></i>
                </a>
              </li>
              <!-- ./ FIN titulo dle modulo-->
              
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?php echo $foto_user; ?>" class="user-image" alt="User Image" id="user_name" oculto="<?php echo $user; ?>" ocultoced="<?php echo $userced; ?>" ocultonombreperiodo="<?php echo $nombre_periodo; ?>" ocultofechainiciorecuado="<?php echo $fecha_inicio_recuado; ?>"  ocultofechacierrerecuado="<?php echo $fecha_cierre_recuado; ?>"  sesionencode="<?php echo $sesionencode; ?>"  cantdependencias="<?php echo $cant_array_dpto_user_login; ?>" >
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span id="name_user" class="hidden-xs"><?php echo $user; //echo $name_user_corto1; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img id="foto_user" src="<?php echo $foto_user; ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $name_user; ?> <br /> <span id="cargo_user"><?php echo $cargo_user; ?></span>
                      <small><?php echo $texto_user; ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div id="departamento_user" class="col-xs-12 text-center"><?php echo $dpto_user;?></div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a id="perfil" href="javascript:void(0);" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="javascript:void(0);" class="btn btn-default btn-flat" id="sessionKiller" >Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- ./FIN  User Account Menu -->
              
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
              <p><?php echo $nivelusuario; ?></p>
              
              
              <?php 
                  //echo $estatus_user;
                  if ($estatus_user == 'activo' || $estatus_user == '1' || $estatus_user != '' ) { ?>
                <a id="estatus_loading" href="javascript:void(0);" estatus='activo'><i class="fa fa-circle text-success"></i> Online</a>
              <?php }else{ ?>
                <a id="estatus_loading" href="javascript:void(0);" estatus='inactivo'><i class="fa fa-close text-success"></i> Online (inactivo)</a>
              <?php } ?>
            </div>
          </div>
          <!-- Sidebar Menu -->
          
          <ul id="sidebar-menu" class="sidebar-menu">
            
            <?php require('vistas/menu_usuarios_demo.php'); ?>
            <li id="sessionKiller2"><a href="javascript:void(0);"><i class="fa fa-sign-out"></i> <span>Salir</span></a></li>
            
          </ul><!-- /.sidebar-menu -->


          <!--<div class="alert alert-default">...</div>-->
          
          <!--<div class="box box-success">-->
          <!--  -->
          <!--</div>-->

          <!--<div id="alertBoxes"></div>-->
         <!--<div id="relojservidor" class="relojservidor" style="border: 0px solid; text-align: center;">Reloj</div>-->
          <!-- <div id="contenido">Navegador</div> -->
          
          <!-- Cuadro de notificaciones -->
          <!-- Cuadro de notificaciones -->
          <!-- Cuadro de notificaciones -->
          <div id="alertBoxes" style="display:none;" class="box box-danger">
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
        <?php if ($usuario_activo) { ?>
        <section class="content-header">
          <h1 id="header_principal">
            Página Principal
            <!--<small id="header_dscripcion">SistemasZEES</small>-->
          </h1>
          <ol class="breadcrumb">
            <!--<li id="breadcrumb_nivel" ><a href="main.php"><i class="fa fa-dashboard"></i>Inicio</a></li>-->
            <!--<li id="breadcrumb_subnivel" class="active">Principal</li>-->
            <div id="relojservidor" class="relojservidor" style="border: 0px solid; text-align: center;">Reloj</div>
          </ol>
        </section>        
        <?php }?>
        
        <!-- Main content -->
        <section id ="areamensajes" class="content-header">
            
            <div id="area_mensajes" class="box box-solid box-primary" style="display:none ;">
                <div class="box-header with-border">
                    <h3 id="area_mensajes_header" class="box-title">Cartelera de Notificaciones</h3>
                    <div class="box-tools pull-right">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <span class="label label-warning">3 Mensajes Nuevos</span>
                        <span class="label label-info">2 Solicitudes</span>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    The body of the box
                </div><!-- /.box-body -->
                <div class="box-footer">
                The footer of the box
                </div><!-- box-footer -->
            </div><!-- /.box -->
        </section>
        
        <section id ="content" class="content">
          <!-- Your Page Content Here -->
          <!-- Your Page Content Here -->
          <!-- Your Page Content Here -->
          <!-- Your Page Content Here -->
            <?php
            // ver_arreglo($_SESSION);
            // 
            include('vistas/vista_informacion_zona.php');
            ?>
         
          <!-- end Your Page Content Here -->
          <!-- end Your Page Content Here -->
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
        <strong>Copyright &copy; <?php echo copyrigth3_app; ?> <a href="<?php echo copyrigth2_app; ?>" target='_blank'><?php echo copyrigth1_app; ?></a>.</strong> All rights reserved.
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
    <!--     
     __   __   __  ___  __  ___  __        __                       __       ___  __   __
    |__) /  \ /  \  |  /__`  |  |__)  /\  |__) __ \  /  /\  |    | |  \  /\   |  /  \ |__)
    |__) \__/ \__/  |  .__/  |  |  \ /~~\ |        \/  /~~\ |___ | |__/ /~~\  |  \__/ |  \
    -->
    <!-- <script src="apiv3.0/plugins/bootstrap-validator/dist/validator.min.js"></script> -->
   


    <!-- 
     __   __   __  ___  __  ___  __        __                    __       ___  __   __                 __  ___  ___  __
    |__) /  \ /  \  |  /__`  |  |__)  /\  |__) \  /  /\  |    | |  \  /\   |  /  \ |__) __  |\/|  /\  /__`  |  |__  |__)
    |__) \__/ \__/  |  .__/  |  |  \ /~~\ |     \/  /~~\ |___ | |__/ /~~\  |  \__/ |  \     |  | /~~\ .__/  |  |___ |  \
    -->
    <script src="apiv3.0/plugins/bootstrapvalidator-master/dist/js/bootstrapValidator.min.js"></script>
    <script src="apiv3.0/plugins/bootstrapvalidator-master/dist/js/language/es_ES.js"></script>

    <!--jquery.validate-->
    <!-- <script src="apiv3.0/plugins/jquery-validation-1.14.0/dist/jquery.validate.js" type="text/javascript"></script> -->
    <!-- <script src="apiv3.0/plugins/jquery-validation-1.14.0/dist/localization/messages_es.js" type="text/javascript"></script> -->
    
<!--     <script type="text/javascript" src="apiv3.0/plugins/HTML5-Webcam-Plugin-with-jQuery-photobooth/photobooth_min.js"></script>
 -->
    <!-- Select2 -->
    <script src="apiv3.0/plugins/select2/select2.full.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="apiv3.0/dist/js/app.js"></script>
    <!-- Función de control principal  de la template-->
    <script type="text/javascript" src="apiv3.0/funciones/funciones3.0.js"></script>
    <script type="text/javascript" src="apiv3.0/funciones/js/NumeroALetras.js"></script>
    <!-- Función de control principal -->
    <script type="text/javascript" src="controladores/functions.ajax.js"></script>
    <?php //ver_arreglo($_SESSION); ?>
  </body>
</html>