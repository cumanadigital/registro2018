<?php //include('../conf/config.postgres.php');?>
<?php //include('../conf/config.login.php');?>
<?php //include('../apiv3.0/funciones/funciones3.0.php'); ?>
<?php require('../conf/config.postgres.php');?>
<?php require('../apiv3.0/funciones/postgres.class.php'); ?>
<?php require('../apiv3.0/funciones/funciones3.0.php'); ?>
<?php
//echo "<pre>";
//print_r ($_SERVER);
//echo "</pre>";
//sleep(5);
//die();
//Bueno, pues hay 4 opciones por las cuales el sistema te regresará un 0 y
//solo un caso en el que te devolverá un 1
//Te devuelve un 0 (zero) si
//1 .- Ya están declaradas las variables de sesión o alguna de las dos
//2 .- La conexión a la DB no se logra hacer (servidor, nombre de usuario o contraseña incorrectos)
//3 .- No puede llevar a cabo la consulta (o sea en el momento en el que hace el mysql_query)
//4 .- Si hizo la consulta pero no encontró ningún resultado
//Debes verificar esos 4 puntos antes de poder hacer la consulta.
//Saludos.
//P.D: Un error muy común es que se nos olvida colocar la función session_start() al principio de nuestro archivo y sin ella, las variables de sesión no podrán existir.
//echo "<br />";
//print_r (DB_SERVER."<br />");
//print_r (DB_NAME."<br />");
//print_r (DB_USER."<br />");
//print_r (DB_PASSWORD."<br />");
//print_r (DB_DRIVER."<br />");
//die();
session_start();
//
$dbserver = DB_SERVER;
/*	Revisamos que sea una petición ajax, pues el indice HTTP_X_REQUESTED_WITH solo existe en este tipo de peticiones */
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	
	if ( !isset($_SESSION['sesion_username']) && !isset($_SESSION['sesion_userid']) ){
		// *** DATABASE POSTGRES
		// Text to ASCII Art Generator (TAAG) - patorjk.com
		// http://patorjk.com/software/taag/
		// 
		//	Font Name: ANSI Shadow
		//
		// ██████╗  ██████╗ ███████╗████████╗ ██████╗ ██████╗ ███████╗███████╗ ██████╗ ██╗     
		// ██╔══██╗██╔═══██╗██╔════╝╚══██╔══╝██╔════╝ ██╔══██╗██╔════╝██╔════╝██╔═══██╗██║     
		// ██████╔╝██║   ██║███████╗   ██║   ██║  ███╗██████╔╝█████╗  ███████╗██║   ██║██║     
		// ██╔═══╝ ██║   ██║╚════██║   ██║   ██║   ██║██╔══██╗██╔══╝  ╚════██║██║▄▄ ██║██║     
		// ██║     ╚██████╔╝███████║   ██║   ╚██████╔╝██║  ██║███████╗███████║╚██████╔╝███████╗
		// ╚═╝      ╚═════╝ ╚══════╝   ╚═╝    ╚═════╝ ╚═╝  ╚═╝╚══════╝╚══════╝ ╚══▀▀═╝ ╚══════╝
	    // 
	    // Font Name: Calvin S                                                                                
	    //
		// ╔╦╗╔═╗╔╦╗╔═╗╔╗ ╔═╗╔═╗╔═╗       
		//  ║║╠═╣ ║ ╠═╣╠╩╗╠═╣╚═╗║╣        
		// ═╩╝╩ ╩ ╩ ╩ ╩╚═╝╩ ╩╚═╝╚═╝       
		// ╔═╗╔═╗╔═╗╔╦╗╔═╗╦═╗╔═╗╔═╗╔═╗ ╦  
		// ╠═╝║ ║╚═╗ ║ ║ ╦╠╦╝║╣ ╚═╗║═╬╗║  
		// ╩  ╚═╝╚═╝ ╩ ╚═╝╩╚═╚═╝╚═╝╚═╝╚╩═╝

		if ( $dbserver = 'postgres') {
				//******* cadena de conexion para postgres
				$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
				$login_admin = $_POST['login_admin'];
				$pass_admin = $_POST['pass_admin'];
				// $login_capcha = $_POST['login_capcha'];

				$sql = "SELECT 
							USU.usu_uid as usu_uid, 
							USU.usu_cedula AS usu_cedula,
							USU.usu_tipo_usuario AS usu_tipo_usuario, 
							USU.usu_roles AS usu_roles,
							USU.usu_privilegios AS usu_privilegios,
							USU.usu_sistemas AS usu_sistemas,
							USU.usu_estatus AS usu_estatus,
							USU.fecha_acceso AS fecha_acceso,
							USU.usu_sistemas as usu_sistemas,
							'---' AS SEP1,
							NOM.id_nomina AS nom_id_nomina,
							NOM.cedula AS nom_cedula,
							NOM.nombres_apellidos AS nom_nombres_apellidos,
							NOM.cod_dependencia AS nom_cod_dependencia,
							NOM.dependencia AS nom_dependencia,
							NOM.cargo AS nom_cargo,
							'---' AS cierre 
							FROM sesion.usuario AS USU 
							LEFT JOIN censo2017.nominaactual AS NOM ON (USU.usu_cedula =  NOM.cedula)   
							WHERE 	USU.usu_nombre ='$login_admin' AND 
									USU.usu_contrasena = '$pass_admin'
							ORDER BY USU.usu_cedula";
  			// ver_arreglo($sql);
	  		$dato=consultar($sql,$Postgres);
	  		// ver_arreglo($dato);
	  		$NumeroDeFilas = $Postgres->NumeroDeFilas();
	  		// ver_arreglo($NumeroDeFilas);
	  		if ($NumeroDeFilas>0) {
		  			// ver_arreglo($dato);
		  			// echo json_encode($dato);
		  			// die();
		  			//
				  // 	Array
						// (
						//     [0] => Array
						//         (
						//             [usu_uid] => 11829328
						//             [usu_cedula] => 11829328
						//             [usu_tipo_usuario] => ROOT
						//             [usu_roles] => ROOT
						//             [usu_privilegios] => ROOT
						//             [usu_sistemas] => ALL
						//             [usu_estatus] => 1
						//             [fecha_acceso] => 
						//             [sep1] => ---
						//             [nom_id_nomina] => 1892
						//             [nom_cedula] => 11829328
						//             [nom_nombres_apellidos] => HERNANDEZ C OSWALDO E    
						//             [nom_cod_dependencia] => 006102200
						//             [nom_dependencia] => OFIC DE SUPERV ZONA NO 12
						//             [nom_cargo] => BACHILLER I              
						//             [cierre] => ---
						//         )
						// )


		  				$_SESSION['sesion_userid']				= $dato[0]['usu_uid'];
						$_SESSION['sesion_username']			= $dato[0]['usu_cedula'];
						$_SESSION['sesion_nivel_usuario']		= $dato[0]['usu_privilegios'];
						$_SESSION['sesion_id_persona']			= $dato[0]['nom_id_nomina'];
						$_SESSION['sesion_id_dependencia']		= $dato[0]['nom_cod_dependencia'];
						$_SESSION['sesion_ingreso']				= $dato[0]['fecha_acceso'];
						// $_SESSION['sesion_ingreso']				= $dato[0]['cedula'];
						$_SESSION['sesion_estatus']				= $dato[0]['usu_estatus'];
						// 
						$id_usuario								= $dato[0]['usu_uid'];
						$id_funcionario 						= $dato[0]['nom_id_nomina'];
		  				
		  				$_SESSION['sesion_idpersona']			= $dato[0]['nom_id_nomina'];
						$_SESSION['sesion_usernombre']			= $dato[0]['nom_nombres_apellidos'] ;
						$nombres1 								= explode(' ', trim($dato[0]['nom_nombres_apellidos']));
						$_SESSION['session_username1'] 			= $nombres1[0];
						// 
						$nombres2 								= explode(' ', trim($dato[0]['nom_nombres_apellidos']));
						$_SESSION['session_username2'] 			= $nombres2[0];
						// 
						$_SESSION['sesion_cedula']				= $dato[0]['usu_cedula'];
						$_SESSION['sesion_userfoto']			= $dato[0]['usu_cedula'];
						$_SESSION['sesion_iddepartamento']		= $dato[0]['nom_cod_dependencia'];
						// $_SESSION['sesion_departamento'] 		= $dato[0]['nombre'];
						$_SESSION['sesion_departamento'] 		= $dato[0]['nom_dependencia'];
						
						$_SESSION['sesion_cargo']				= $dato[0]['nom_cargo'];
						$_SESSION['sesion_municipio']			= $dato[0]['usu_sistemas'];
						
						// 
						$_SESSION['sesion_ultimiacceso']		= date("Y-n-j H:i:s");
						$_SESSION['sesion_ingreso'] = date("Y-n-j H:i:s");
						// echo 1;



			  			// 			$_SESSION['sesion_id_periodo']								= $dato3[0]['id_periodo'];
						// 			$_SESSION['sesion_nombre_periodo_periodo']		= $dato3[0]['nombre_periodo'];
						// 			$_SESSION['sesion_fecha_inicio_periodo']			= $dato3[0]['fecha_inicio'];
						// 			$_SESSION['sesion_fecha_cierre_periodo']			= $dato3[0]['fecha_cierre'];
						// 			$_SESSION['sesion_fecha_inicio_recuado']			= $dato3[0]['fecha_recaudo_ini'];
						// 			$_SESSION['sesion_fecha_cierre_recuado']			= $dato3[0]['fecha_recaudo_fin'];
						// 			$_SESSION['sesion_estatus_periodo']						= $dato3[0]['estatus'];
						// 			$_SESSION['sesion_id_jefe_personal']					= $dato3[0]['id_jefe_personal'];
						// 			$_SESSION['sesion_id_jefezona']								= $dato3[0]['id_jefezona'];
						// 			// 
						// 			// ver_arreglo($_SESSION);
						// 			$sql4 ="UPDATE permisos.usuario SET fecha_ultimo_acceso=NOW() WHERE id_usuario=$id_usuario";
						// 			$dato4=consultar($sql4,$Postgres);
						// 			echo 1;
			  	// 		}else{
			  	// 			echo "No encuentra periodo<br>";
			  	// 			echo 0;
			  	// 		}
							
		  		// 	// }else{
		  		// 	// 	echo "No encuentra funcionario<br>";
		  		// 	// 	echo 0;
		  		// 	// }
		  		echo 1;
		  	}else{
		  		echo "No encuentra usuario<br>";
		  		echo 0;
				}
		  		// die();
		}// FIN DB POSTGRES
	}
	else{
		// 1 .- Ya están declaradas las variables de sesión o alguna de las dos
		// ya iniciaste sesion
		echo "1 .- Ya están declaradas las variables de sesión o alguna de las dos";
		echo 0;
	}
}else{
	//echo "en caso de no provenir de una llamada ajax";
	header("Location: logout.php");
	//die();	
}
?>