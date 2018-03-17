<?php 
	// NOTA: Esta enlazado con postgres
	// require('../conf/config.postgres.php');
	// require('../apiv3.0/funciones/postgres.class.php');
	// NOTA: Esta enlazado con mysql
	// require('../conf/config.login.php');
	// require('../apiv3.0/funciones/mysql.class.php'); 
?>
<?php require('../conf/config.postgres.php');?>
<?php require('../apiv3.0/funciones/postgres.class.php'); ?>
<?php require('../apiv3.0/funciones/funciones3.0.php'); ?>
<?php
$accion					=	"consultar_registros";
switch ($accion){
	case 'consultar_registros':
		consultar_registros($datos);
	break;
}

function consultar_registros($datos) {
	$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
	// 		 
	$sql="SELECT 
			PB.id_plantelesbase as id, 
			TRIM(PB.cod_plantel) AS cod_plantel, 
			TRIM(PB.cod_estadistico) AS cod_estadistico,				
			TRIM(PB.cod_nomina) AS cod_nomina, 
			TRIM(PB.estado) AS estado ,
			TRIM(PB.municipio) AS municipio, 
			TRIM(PB.parroquia) as parroquia,
			UPPER(TRIM(PB.nombre)) AS text, 
			TRIM(PB.denominacion) AS denominacion,
			'--<' as cierre 
			FROM censo2017.plantelesbase AS PB 
			ORDER BY PB.nombre";
// 
	$dato=consultar($sql,$Postgres);
	$NumeroDeFilas = $Postgres->NumeroDeFilas();
	if ($NumeroDeFilas>0) {
		echo json_encode($dato);
	}else{
		echo 'false';
	}
}
?>