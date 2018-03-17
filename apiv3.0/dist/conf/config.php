<?php
$var_usuario_config = 1;
if ($var_usuario_config == 1) {
//	******************************
	define("DB_SERVER","localhost");
	define("DB_NAME","sucreze");
	define("DB_USER","desarrollador01");
	define("DB_PASSWORD","desarrollador2012");
	define("DB_DRIVER","postgres");	
}	
if ($var_usuario_config == 2 ) {
	define("DB_SERVER","localhost");
	define("DB_NAME","sucreze");
	define("DB_USER","desarrollador01");
	define("DB_PASSWORD","desarrollador2012");
	define("DB_DRIVER","postgres");	
}
//$title  = utf8_decode('Sistema de Gestión de Proyectos Petroleros');
$title = "Administración: Módulo de Órdenes de Compras y Pedidos";
$nameapp = "mComPed";
$copyrigth[] = utf8_decode("Zona Educativa Estado Sucre");
$copyrigth[] = "http://zesucre.com.ve/";
$periodo_general = "Trimestre III 2014-2015 (Julio-Agosto-Septiembre)";
//-- --
//El periodo activo debe ser agregado arriba como elento [0] del array
$periodo_activo[]="Trimestre III 2014-2015 (Julio-Agosto-Septiembre)";
$periodo_activo[]="";
//-- -- 
//**********************
// 0= No mostrar Mensaje Demo usuarios
// 1= Mostar Mensaje Demo usuarios
$redes_sociales[]= array("Facebook",	"http://www.facebook.com/",	"../img/facebook.png",	1);
$redes_sociales[]= array("Twitter",		"https://twitter.com/",		"../img/twitter.png",	1);
$redes_sociales[]= array("MySpace",		"http://www.myspace.com/",	"../img/myspace.png",	1);
$redes_sociales[]= array("YouTube",		"http://www.youtube.com/",	"../img/youtube.png",	1);
$redes_sociales[]= array("Linkedin",	"http://www.linkedin.com/",	"../img/linkedin.png",	1);
$redes_sociales[]= array("Google+",		"https://plus.google.com/",	"../img/google.png",	1);
$instucionales[]= array("Zona Educativa Estado Sucre",	"http://zesucre.com.ve/", "../img/logo_me_opt.jpg", 1);	
$instucionales[]= array("Ministerio del Poder Popular para la Educación", "http://www.me.gob.ve/",		"../img/logo_me_opt.jpg",	1);
define("title_app",$title);
define("name_app",$nameapp);
define("copyrigth1_app",$copyrigth[0]);
define("copyrigth2_app",$copyrigth[1]);
http://zesucre.com.ve/
?>
