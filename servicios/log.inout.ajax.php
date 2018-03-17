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
		//echo "paso";
		// *** DATABASE MYSQL
		//
		// Text to ASCII Art Generator (TAAG) - patorjk.com
		// http://patorjk.com/software/taag/
		// 
		//	Font Name: ANSI Shadow
		//		
		// ██████╗  █████╗ ████████╗ █████╗ ██████╗  █████╗ ███████╗███████╗
		// ██╔══██╗██╔══██╗╚══██╔══╝██╔══██╗██╔══██╗██╔══██╗██╔════╝██╔════╝
		// ██║  ██║███████║   ██║   ███████║██████╔╝███████║███████╗█████╗  
		// ██║  ██║██╔══██║   ██║   ██╔══██║██╔══██╗██╔══██║╚════██║██╔══╝  
		// ██████╔╝██║  ██║   ██║   ██║  ██║██████╔╝██║  ██║███████║███████╗
		// ╚═════╝ ╚═╝  ╚═╝   ╚═╝   ╚═╝  ╚═╝╚═════╝ ╚═╝  ╚═╝╚══════╝╚══════╝
		// 
		// ███╗   ███╗██╗   ██╗███████╗ ██████╗ ██╗                         
		// ████╗ ████║╚██╗ ██╔╝██╔════╝██╔═══██╗██║                         
		// ██╔████╔██║ ╚████╔╝ ███████╗██║   ██║██║                         
		// ██║╚██╔╝██║  ╚██╔╝  ╚════██║██║▄▄ ██║██║                         
		// ██║ ╚═╝ ██║   ██║   ███████║╚██████╔╝███████╗                    
		// ╚═╝     ╚═╝   ╚═╝   ╚══════╝ ╚══▀▀═╝ ╚══════╝                    
    // 
    // Font Name: Calvin S                                                                                
    //
	  // ╔╦╗╔═╗╔╦╗╔═╗╔╗ ╔═╗╔═╗╔═╗
	  //  ║║╠═╣ ║ ╠═╣╠╩╗╠═╣╚═╗║╣ 
	  // ═╩╝╩ ╩ ╩ ╩ ╩╚═╝╩ ╩╚═╝╚═╝
	  // ╔╦╗╦ ╦╔═╗╔═╗ ╦          
	  // ║║║╚╦╝╚═╗║═╬╗║          
	  // ╩ ╩ ╩ ╚═╝╚═╝╚╩═╝        

		if ( $dbserver == 'mysql') {
			//echo "paso 1";
			if ( @$idcnx = @mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) ){
				//echo "paso 2";	
				if ( @mysql_select_db(DB_NAME,$idcnx) ){
					//echo "paso 3";
					//$sql = 'SELECT * FROM usuario WHERE nombre_usuario="' . $_POST['login_username']. '" && clave_usuario="' . md5($_POST['login_plantel']) . '" LIMIT 1';
					$sql = 'SELECT * FROM usuario WHERE nombre_usuario="' . $_POST['login_username']. '" && clave_usuario="' . $_POST['login_plantel'] . '" LIMIT 1';
					// echo "<br />".$sql."<br />";
					if ( @$res = @mysql_query($sql) ){
						//echo "paso 4";
						if ( @mysql_num_rows($res) == 1 ){
							//echo "paso 5";
							$user = @mysql_fetch_array($res);
							$_SESSION['sesion_userid']				= $user['id_usuario'];
							$_SESSION['sesion_username']			= $user['nombre_usuario'];
							$_SESSION['sesion_nivel_usuario']		= $user['nivel_usuario'];
							$_SESSION['sesion_id_persona']			= $user['id_persona'];
							$_SESSION['sesion_ingreso']				= $user['fechasesion'];
							//print_r($user);
							//nivel_usuario
							//0:Admin, 1:Jefe Dpto, 2:Secretaria, 3:Estudiante, 4:Profesor
							if  ($_SESSION['sesion_nivel_usuario'] >= "23" ) { // ES ESTUDIANTE
								//echo "paso 6.1";
								//$sql2 =	"SELECT * FROM estudiante ".
								//				"INNER JOIN departamento ".
								//				"	ON departamento.id_departamento = estudiante.id_departamento ".
								//				"   WHERE estudiante.id_estudiante=" . $_SESSION['id_persona'] ;
								$sql2 	="SELECT
													id_estudiante as id_persona,
													cedula as cedula_persona,
													nombre_alumno as nombre_persona,
													apellido_alumno as apellido_persona, 
													correo_alumno as correo_persona, 
													telefono_alumno as telefono_persona,
													foto_alumno as foto_persona, 
													estatus_alumno as estatus_persona,
													departamento.id_departamento as id_departamento,
													departamento.nombre_departamento as departamento_persona,
													'Usuario' as cargo_persona
												FROM estudiante 
												INNER JOIN departamento 
													ON departamento.id_departamento = estudiante.id_departamento
												WHERE estudiante.id_estudiante=" . $_SESSION['sesion_id_persona'] ;
							}else{
									//echo "paso 6.2";
									$sql2 = "SELECT
													id_personal as id_persona,
													cedula_personal as cedula_persona,
													nombre_personal as nombre_persona,
													apellido_personal as apellido_persona,
													correo_personal as correo_persona,
													telefono_personal as telefono_persona,
													foto_personal as foto_persona,
													estatus_personal as estatus_persona,
													departamento.id_departamento as id_departamento,
													departamento.nombre_departamento as departamento_persona,
													nombre_cargo as cargo_persona
												FROM personal
												INNER JOIN departamento
													ON departamento.id_departamento = personal.id_departamento
												INNER JOIN cargo
													ON cargo.id_cargo = personal.id_cargo
												WHERE personal.id_personal=" . $_SESSION['sesion_id_persona'] ;
							}
							//ver_arreglo($sql2);
							if ( @$res2 = @mysql_query($sql2) ){
								//echo "paso 7";
								if ( @mysql_num_rows($res2) == 1 ){
									//echo "paso 8";
									$user2 = @mysql_fetch_array($res2);
									$_SESSION['sesion_idpersona']			= $user2['id_persona'];
									$_SESSION['sesion_usernombre']			= $user2['nombre_persona'] . " " .$user2['apellido_persona'];
									// 
									$nombres1 								= explode(' ', trim($user2['nombre_persona']));
									$_SESSION['session_username1'] 			= $nombres1[0];
									// 
									$nombres2 								= explode(' ', trim($user2['apellido_persona']));
									$_SESSION['session_username2'] 			= $nombres2[0];
									// 
									$_SESSION['sesion_cedula']				= $user2['cedula_persona'];
									$_SESSION['sesion_userfoto']			= $user2['foto_persona'];
									$_SESSION['sesion_iddepartamento']		= $user2['id_departamento'];
									$_SESSION['sesion_departamento'] 		= $user2['departamento_persona'];
									$_SESSION['sesion_cargo']				= $user2['cargo_persona'];
									$_SESSION['sesion_estatus']				= $user2['estatus_persona'];
									$_SESSION['sesion_ultimiacceso']		= date("Y-n-j H:i:s");
									//print_r($user2);
									$sql3 = "UPDATE `bdudoadmin`.`usuario` SET `fechasesion` = CURRENT_TIMESTAMP WHERE `usuario`.`id_usuario` = ".$_SESSION['sesion_userid'] .";";
									@$res3 = @mysql_query($sql3);
									echo 1;
								}
							}
							$sql3 = "SELECT `id_periodo`, `nombre_periodo`, `fecha_inicio`, `fecha_cierre`,`fecha_recaudo_ini`,`fecha_recaudo_fin`,`estatus` FROM `periodo` WHERE `estatus`='1' LIMIT 1 ";
							if ( @$res3 = @mysql_query($sql3) ){
								//echo "paso 7";
								if ( @mysql_num_rows($res3) == 1 ){
									//echo "paso 8";
									$user3 = @mysql_fetch_array($res3);
									$_SESSION['sesion_id_periodo']								= $user3['id_periodo'];
									$_SESSION['sesion_nombre_periodo_periodo']		= $user3['nombre_periodo'];
									$_SESSION['sesion_fecha_inicio_periodo']			= $user3['fecha_inicio'];
									$_SESSION['sesion_fecha_cierre_periodo']			= $user3['fecha_cierre'];

									$_SESSION['sesion_fecha_inicio_recuado']			= $user3['fecha_recaudo_ini'];
									$_SESSION['sesion_fecha_cierre_recuado']			= $user3['fecha_recaudo_fin'];

									$_SESSION['sesion_estatus_periodo']						= $user3['estatus'];
								}
							}
							// ver_arreglo($_SESSION);
							
						} else {
							// 4 .- Si hizo la consulta pero no encontró ningún resultado
							// login password - incorrectos
							echo "4 .- Si hizo la consulta pero no encontró ningún resultado";
							echo 0;
						}
					} else {
						// 3 .- No puede llevar a cabo la consulta (o sea en el momento
						// en el que hace el mysql_query)
						// no se pudo ejecutar la consulta
						echo "3 .- No puede llevar a cabo la consulta ";
						echo 0;
					}
				}
				mysql_close($idcnx);
			}
			else {
				// 2 .- La conexión a la DB no se logra hacer ya sea por
				// (servidor, nombre de usuario o contraseña incorrectos)
				// error conexión base datos;
				echo "La conexión a la DB no se logra hacer";
				echo 0;
			}
		} // FIN DB MYSQL
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
				$login_cedula = $_POST['login_cedula'];
				$login_plantel = $_POST['login_plantel'];
				$login_nomina = $_POST['login_nomina'];

				$sql = "SELECT 
							NOM.cedula as login_cedula,
							-- RIGHT(TRIM(NOM.cod_dependencia),6) as login_coddep,
							SUBSTR(TRIM(NOM.cod_dependencia), 4, 6) as login_coddep, 
							-- RIGHT(TRIM(NOM.cuenta_bancaria),6) as login_ctabanco,
							SUBSTR(TRIM(NOM.cuenta_bancaria), 15, 6) as login_ctabanco, 

							NOM.id_nomina,
							NOM.cedula, 
							TRIM(NOM.nombres_apellidos) AS nombres_apellidos, 
							TRIM(NOM.cod_cargo) AS cod_cargo,
							TRIM(NOM.cargo) AS cargo,
							 
							NOM.cod_dependencia, 
							NOM.cuenta_bancaria, 
							'-->' AS SEP1,
							PB.id_plantelesbase, 
							PB.cod_plantel, 
							PB.cod_estadistico, 
							TRIM(PB.nombre) AS nombre, 
							TRIM(NOM.dependencia) AS nom_dependencia,

							TRIM(PB.municipio) AS municipio, 
							TRIM(PB.parroquia) as parroquia,

							PB.nivel_usuario as nivel_usuario, 
							NOM.fecha_ultimo_acceso as fecha_ultimo_acceso,
							'--<' as cierre 
							FROM censo2017.plantelesbase AS PB 
							INNER JOIN censo2017.nominaactual AS NOM ON (PB.dir_cedula = NOM.cedula)
							WHERE 	NOM.cedula ='$login_cedula'
									AND SUBSTR(TRIM(NOM.cod_dependencia),  4, 6) = '$login_plantel'
									AND SUBSTR(TRIM(NOM.cuenta_bancaria), 15, 6) = '$login_nomina'
							ORDER BY NOM.cedula, PB.cod_plantel ";
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
		  			// [0] => Array
				   //      (
				   //          [login_cedula] => 10217598
				   //          [login_coddep] => 970354
				   //          [login_ctabanco] => 278586
				   //          [id_nomina] => 215
				   //          [cedula] => 10217598
				   //          [nombres_apellidos] => ZENAYDA P RODRIGUEZ G
				   //          [cod_cargo] => 1124DI
				   //          [cargo] => DOC. IV /AULA
				   //          [cod_dependencia] => 006970354
				   //          [cuenta_bancaria] => 01020513110000278586
				   //          [sep1] => -->
				   //          [id_plantelesbase] => 43
				   //          [cod_plantel] => OD04551902
				   //          [cod_estadistico] => 190045
				   //          [nombre] => E B RIO COLORADO
				   //          [municipio] => ANDRES MATA
				   //          [parroquia] => SAN JOSE DE AEROCUAR
				   //          [cierre] => --<
				   //      )

		  				$_SESSION['sesion_userid']				= $dato[0]['id_nomina'];
						$_SESSION['sesion_username']			= $dato[0]['cedula'];
						$_SESSION['sesion_nivel_usuario']		= $dato[0]['nivel_usuario'];
						$_SESSION['sesion_id_persona']			= $dato[0]['id_nomina'];
						$_SESSION['sesion_id_dependencia']		= $dato[0]['id_plantelesbase'];
						$_SESSION['sesion_ingreso']				= $dato[0]['fecha_ultimo_acceso'];
						// $_SESSION['sesion_ingreso']				= $dato[0]['cedula'];
						$_SESSION['sesion_estatus']				= $dato[0]['nombres_apellidos'];
						// 
						$id_usuario								= $dato[0]['id_nomina'];
						$id_funcionario 						= $dato[0]['id_nomina'];
		  				
		  				$_SESSION['sesion_idpersona']			= $dato[0]['id_nomina'];
						$_SESSION['sesion_usernombre']			= $dato[0]['nombres_apellidos'] ;
						$nombres1 								= explode(' ', trim($dato[0]['nombres_apellidos']));
						$_SESSION['session_username1'] 			= $nombres1[0];
						// 
						$nombres2 								= explode(' ', trim($dato[0]['nombres_apellidos']));
						$_SESSION['session_username2'] 			= $nombres2[0];
						// 
						$_SESSION['sesion_cedula']				= $dato[0]['cedula'];
						$_SESSION['sesion_userfoto']			= $dato[0]['cedula'];
						$_SESSION['sesion_iddepartamento']		= $dato[0]['id_plantelesbase'];
						// $_SESSION['sesion_departamento'] 		= $dato[0]['nombre'];
						$_SESSION['sesion_departamento'] 		= $dato[0]['nom_dependencia'];
						
						$_SESSION['sesion_cargo']				= $dato[0]['cargo'];
						$_SESSION['sesion_municipio']			= $dato[0]['municipio'];
						
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