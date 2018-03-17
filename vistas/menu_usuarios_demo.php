<?php
// Array
//     (
//         [sesion_userid] => 37108
//         [sesion_username] => 10217598
//         [sesion_nivel_usuario] => DIRECTOR
//         [sesion_id_persona] => 37108
//         [sesion_id_dependencia] => 43
//         [sesion_ingreso] => 10217598
//         [sesion_estatus] => ZENAYDA P RODRIGUEZ G
//         [sesion_idpersona] => 37108
//         [sesion_usernombre] => ZENAYDA P RODRIGUEZ G
//         [session_username1] => ZENAYDA
//         [session_username2] => ZENAYDA
//         [sesion_cedula] => 10217598
//         [sesion_userfoto] => 10217598
//         [sesion_iddepartamento] => 43
//         [sesion_departamento] => ESCUELA BASICA RIO COLORADO
//         [sesion_cargo] => DOC. IV /AULA
//         [sesion_municipio] => ANDRES MATA
//         [sesion_ultimiacceso] => 2018-2-21 19:15:45
//     )
$nivelusuario = $_SESSION["sesion_nivel_usuario"];
$cargousuario = $_SESSION["sesion_cargo"];
$municipiousu = $_SESSION['sesion_municipio'];

// ver_arreglo($nivelusuario);
// ver_arreglo($nivelusuario);

?>
<li class="header">MENU PRINCIPAL<?php //echo $nivelusuario."-".$cargousuario;?></li>
<!-- Optionally, you can add icons to the links -->
<li id="inicio" class="active"><a href="main.php"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
<!--
0:Admin, 
1:Jefe Dpto, 
2:Secretaría, 
3:Juridica, 
4:Director, 
5:Bienestar, 
6:Licencia, 
7:Dirección

-->
<!-- 
    ____  ____  ____  ______
   / __ \/ __ \/ __ \/_  __/
  / /_/ / / / / / / / / /
 / _, _/ /_/ / /_/ / / /
/_/ |_|\____/\____/ /_/

-->

<?php if ($nivelusuario=='DIRECTOR' || $nivelusuario=='ADMIN' || $nivelusuario=='ROOT' ) {?>
<li class="treeview">
    <a href="javascript:void(0);"><i class="fa fa-file"></i> <span>Planteles</span><i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">    
        <li id="menu_admin_gestionar_planteles"><a href="javascript:void(0);"></i><i class="fa  fa-file-o"></i> <span>Gestionar</span></a></li>
    </ul>
</li>
<?php }?>

<?php if ( $nivelusuario=='ROOT' ) {?>
<li class="treeview">
    <a href="javascript:void(0);"><i class="fa fa-file"></i> <span>Personal</span><i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li id="menu_admin_gestionar_dependencias"><a href="javascript:void(0);"></i><i class="fa  fa-file-o"></i> <span>Gestionar</span></a></li>
        <li id="menu_admin_asignar_autoridades"><a href="javascript:void(0);"></i><i class="fa  fa-file-o"></i> <span>Asignar Autoridades</span></a></li>
        <li id="menu_admin_movimiento_personal"><a href="javascript:void(0);"></i><i class="fa  fa-file-o"></i> <span>Movimientos Personal</span></a></li>
        <li id="menu_admin_foto_personal"><a href="vistas/demo/camara_demo.php" target="_blank"></i><i class="fa  fa-file-o"></i> <span>Captura Foto</span></a></li>
    </ul>
</li>
<?php }?>

<?php if ($nivelusuario=='ROOT' || $nivelusuario=='ADMIN' ) {?>     <!--0:Admin,-->
<!--USUARIOS DE INFORMATICA-->
<li class="treeview">
    <a href="javascript:void(0);"><i class="fa fa-file"></i> <span>Reportes</span><i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <!-- <li id="menu_admin_reporte_general"><a href="javascript:void(0);"></i><i class="fa  fa-file-o"></i> <span>General</span></a></li> -->
        <!-- <li id="menu_admin_reporte_municipio"><a href="javascript:void(0);"></i><i class="fa  fa-file-o"></i> <span>Municipios</span></a></li> -->
        <li id="menu_admin_reporte_personal"><a href="javascript:void(0);"></i><i class="fa  fa-file-o"></i> <span>Personal</span></a></li>
    </ul>
</li>
<?php }?>

<?php if ($nivelusuario=='ROOT' || $nivelusuario=='ADMIN' ) {?>     <!--0:Admin,-->
<!--USUARIOS DE INFORMATICA-->
<li class="treeview">
    <a href="javascript:void(0);"><i class="fa fa-file"></i> <span>Administrar</span><i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li id="menu_root_apertura_municipios"><a href="javascript:void(0);"></i><i class="fa  fa-file-o"></i> <span>Activar Planteles</span></a></li>
        <!-- <li id="menu_root_apertura_planteles"><a href="javascript:void(0);"></i><i class="fa  fa-file-o"></i> <span>Planteles</span></a></li> -->
    </ul>
</li>
<?php }?>

<?php //ver_arreglo($_SESSION);?>