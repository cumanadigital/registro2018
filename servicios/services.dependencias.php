<?php //require('../conf/config.php');?>
<?php require('../conf/config.postgres.php');?>
<?php require('../apiv3.0/funciones/postgres.class.php'); ?>
<?php require('../apiv3.0/funciones/funciones3.0.php'); ?>
<?php
//{"txt_codigo_periodo":"","txt_nombre_periodo":"oswaldo","txt_rango_fecha":"01/07/2016 - 01/09/2016","txt_fecha_inicio":"","txt_fecha_cierre":"","txt_radio_estatus":"0","accion":"agregar_permisos"}
	//echo DB_SERVER. "<br>";
	//echo DB_NAME. "<br>";
	//echo DB_USER. "<br>";
	//echo DB_PASSWORD. "<br>";
	//echo DB_DRIVER. "<br>";	
	//echo "Desde servicios: ".getcwd() . "\n";
	//sleep(2);
	// ver_arreglo($_POST);
	$datos = array();
	if ($_POST){
		$datos=$_POST;	
	}
	if ($_GET){
		$datos=$_GET;	
	}
	//Array
	//(
	//		[txt_codigo_periodo] => 
	//		[txt_nombre_periodo] => periodo nnn
	//		[txt_rango_fecha] => 01/09/2016 - 01/10/2016
	//		[txt_fecha_inicio] => 
	//		[txt_fecha_cierre] => 
	//		[txt_radio_estatus] => 0
	//		[accion] => agregar_permisos
	//		[token1] => 4f3:;EB15E360;¡BB!c1
	//)
	//	
	//ver_arreglo($_SESSION);
	//echo 'datos';
	// ver_arreglo($datos);
	//die();
	$fecha_registro = date("Y/m/d h:i:s");
	$accion					=	$datos['accion']; //	agregar_permisos"
	switch ($accion){
		case 'consultar_dependencias':
			consultar_dependencias($datos);
		break;
		// case 'agregar_funcionarios':
		// 	agregar_funcionarios($datos);
		// break;
		// case 'modificar_funcionarios':
		// 	modificar_funcionarios($datos);
		// break;
		// case 'eliminar_funcionarios':
		// 	eliminar_funcionarios($datos);
		// break;
		// case 'consultar_dependencias_activo':
		// 	consultar_dependencias_activo($datos);
		// break;
	}
?>
<?php
	function consultar_dependencias($datos) {
		// echo "consultar_dependencias -----------";
		// die();
		// ver_arreglo()
		$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
		//
		$cedula	=	$_POST['cedula']; // 1
		$sql= "SELECT * from ( 
				(SELECT pl_estadistico,
						pl_nombre,
						pl_coddea,
						cast( pl_municipio as  int)as  pl_municipio,
						UPPER(municipio_nombre) AS municipio_nombre
					FROM comun.planteles
					LEFT JOIN comun.municipio ON( CAST(municipio_codigo AS INT) = CAST(pl_municipio AS INT) )  
					WHERE pl_coddea = 'ZE_INTERNA'
					order by   pl_nombre 
				)
			union(
				SELECT dependencia_uid AS pl_estadistico,
				dependencia_nombre AS pl_nombre ,
				dependencia_codigonomina AS pl_coddea ,
				dependencia_municipio AS pl_municipio,
				UPPER(municipio_nombre) AS municipio_nombre
				FROM comun.dependencia
				LEFT JOIN comun.municipio ON( CAST(municipio_codigo AS INT) = CAST(dependencia_municipio AS INT) )
				where (  dependencia_codigonomina like '0020%' or dependencia_codigonomina like '001%')
				     and dependencia_codigonomina   <> '002071847' and   dependencia_codigonomina <> '002071837' 
				     and dependencia_codigonomina   <> '002071857' and   dependencia_codigonomina <> '002071837' 
				     and dependencia_codigonomina   <> '002071827' and   dependencia_codigonomina <> '001200489' 
				     and dependencia_codigonomina   <> '001200487' and  dependencia_codigonomina <> '001200480'
				order by dependencia_nombre--dependencia_codigonomina
				) 
			) as alias order by  alias.pl_nombre   ";
		// ver_arreglo($sql);
		// 
		// die();
  		$dato=consultar($sql,$Postgres);
  		// ver_arreglo($dato);
  		$NumeroDeFilas = $Postgres->NumeroDeFilas();
  		if ($NumeroDeFilas>0) {
  			echo json_encode($dato);
  		}else{
  			print_r(false);
  		}
	}
?>