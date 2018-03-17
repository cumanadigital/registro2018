<?php
//SQL CREATE USER PARA BDUDOADMIN
//CREATE USER 'userbdudo'@'localhost' IDENTIFIED BY '***';GRANT ALL PRIVILEGES ON *.* TO 'userbdudo'@'localhost' IDENTIFIED BY '***' WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;GRANT ALL PRIVILEGES ON `bdudoadmin`.* TO 'userbdudo'@'localhost';
//**********************
$var_usuario_config = 21;
//SERVIDOR LOCALHOST  CORSARIO
if ($var_usuario_config == 1) {
	define("DB_SERVER","localhost");
	define("DB_NAME","bdpermisos");
	define("DB_USER","userpermisos");
	define("DB_PASSWORD","1234");
	define("DB_DRIVER","mysql");	
}
//SERVIDOR LOCALHOST UDO
if ($var_usuario_config == 2) {
	define("db_server","localhost");
	define("db_name","bdudoadmin");
	define("db_user","userbdudo");
	define("db_password","1234");
	define("db_driver","mysql");	
}
if ($var_usuario_config == 3) {
	define("db_server","localhost");
	define("db_name","bdudoadmin");
	define("db_user","root");
	define("db_password","root");
	define("db_driver","mysql");	
}
if ($var_usuario_config == 21) {
  define("DB_SERVER","localhost");
  define("DB_NAME","zesucreuptos");
  define("DB_USER","useruptos");
  define("DB_PASSWORD","123456");
  define("DB_DRIVER","postgres");  
}

//**********************
//$title  = utf8_decode('Sistema de Gestión);
$ruta_api 			="apiv3.0/";
$title 				= "Sistema de Permisos";
$nameapp 			= "mGesPer";
$dptoweb 			= "División de Infomática y Sistemas";
$copyrigth[] 		= utf8_decode("Zona Educativa del Estado Sucre");
$copyrigth[] 		= "http://zesucre.com.ve/";
$copyrigth[] 		= "2016";
$periodo_general 	= "2015-2016";
//$ruta_banner="media/images/banner/chimp-banner-1024x205.jpg";
//$ruta_banner="media/images/banner/123bannerEAC.jpg";
//$ruta_banner="media/images/banner/anaco.jpg";
//$ruta_banner="media/images/banner/bar_azul.png";
//$ruta_banner="media/images/banner/bar_azul_original.png";
$ruta_banner="media/images/banner/bar_gob.png";



//**********************
//El periodo activo debe ser agregado arriba como elento [0] del array
$periodo_activo[]="2015-2016";
$periodo_activo[]="";
$unidades_articulos[]=array("UNIDAD","CAJA","BULTO","PAQUETE","UNIDAD");
//**********************
// 0= No mostrar Mensaje Demo usuarios
// 1= Mostar Mensaje Demo usuarios
$redes_sociales[]= array("Facebook",	"http://www.facebook.com/",	"../img/facebook.png",	1);
$redes_sociales[]= array("Twitter",		"https://twitter.com/",		"../img/twitter.png",	1);
$redes_sociales[]= array("YouTube",		"http://www.youtube.com/",	"../img/youtube.png",	1);
$redes_sociales[]= array("Linkedin",	"http://www.linkedin.com/",	"../img/linkedin.png",	1);
$redes_sociales[]= array("Google+",		"https://plus.google.com/",	"../img/google.png",	1);
$redes_sociales[]= array("MySpace",		"http://www.myspace.com/",	"../img/myspace.png",	1);
//**********************
$instucionales[]= array("Zona Educativa Sucre",	"http://www.zees.cm.ve/", "../img/logo_me_opt.jpg", 1);	
$instucionales[]= array("Ministerio del Poder Popular para la Educación Superior", "http://www.mppeuct.gob.ve/",		"../img/logo_me_opt.jpg",	1);
//**********************
if ( isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0' ){
  $usuario_activo=true;
  //$_SESSION['userid']
  //$_SESSION['username']);
  $name_user = utf8_encode($_SESSION['usernombre']);
  $cargo_user = "Administrador del Sistema";
  $dpto_user = "Sistemas y Bases de Datos";
  $texto_user = "2015-2016";
  $user= $_SESSION['username'];
  $id = $_SESSION['userid'];
  $foto_user = "apiv3.0/media/carnet/" . $_SESSION['userfoto'].".jpg";
}else{
  $usuario_activo=false;
  $foto_user = "apiv3.0/media/carnet/mituxvenezuela_opt.png";
  //$foto_user = "apiv3.0/media/carnet/personal.png";
  //$foto_user = "apiv3.0/media/carnet/11829328.jpg";  
  $name_user = "Invitado";
  $cargo_user = "";
  $dpto_user = "";
  $texto_user = "";
}
//**********************
define("title_app",$title);
define("name_app",$nameapp);
define("copyrigth1_app",$copyrigth[0]);
define("copyrigth2_app",$copyrigth[1]);
define("copyrigth3_app",$copyrigth[2]);
define("ruta_api",$ruta_api);
?>
