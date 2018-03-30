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
// actualizar_contador_personal_completo();
// actualizar_contador_personal_completo2();
// die();
//{"txt_codigo_periodo":"","txt_nombre_periodo":"oswaldo","txt_rango_fecha":"01/07/2016 - 01/09/2016","txt_fecha_inicio":"","txt_fecha_cierre":"","txt_radio_estatus":"0","accion":"agregar_registros"}
	//echo DB_SERVER. "<br>";
	//echo DB_NAME. "<br>";
	//echo DB_USER. "<br>";
	//echo DB_PASSWORD. "<br>";
	//echo DB_DRIVER. "<br>";	
	//echo "Desde servicios: ".getcwd() . "\n";
	//sleep(2);
	$datos = array();
	if ($_POST){
		$datos=$_POST;	
	}
	if ($_GET){
		$datos=$_GET;	
	}
	// $datos=test_input($datos);
	// ver_arreglo($datos);
	// Array
	// (
	//     [accion] => consultar_registros
	//     [sesion_cedula] => 10217598
	//     [sesion_municipio] => ANDRES MATA
	//     [sesion_nivel_usuario] => DIRECTOR
	// )
	//ver_arreglo($_SESSION);
	//echo 'datos';
	// ver_arreglo($datos);
	//die();
	$fecha_registro = date("Y/m/d h:i:s");
	$accion					=	$datos['accion']; //	agregar_registros"
	switch ($accion){
		case 'consultar_registros':
			consultar_registros($datos);
		break;
		case 'agregar_matricula':
			agregar_matricula($datos);
		break;
		case 'actualizar_plantel':
			actualizar_plantel($datos);
		break;
		case 'actualizar_director':
			actualizar_director  ($datos);
		break;
		case 'agregar_personal':
			agregar_personal  ($datos);
		break;
		case 'eliminar_personal':
			eliminar_personal  ($datos);
		break;
		case 'consultar_funcionarios':
			consultar_funcionarios($datos);
		break;
		case 'consultar_centros_trabajo':
			consultar_registros_filtro($datos);
		break;
		case 'consultar_personal_asignado':
			consultar_personal_asignado($datos);
		break;
		
		case 'consultar_personal_asignado_comision_servicio':
			consultar_personal_asignado_comision_servicio($datos);
		break;

		case 'consultar_personal_general':
			consultar_personal_general($datos);
		break;
		case 'consultar_planteles_municipio':
			consultar_planteles_municipio($datos);
		break;
		case 'activar_plantel':
			activar_plantel($datos);
		break;
	}
?>
<?php
	function consultar_registros($datos) {
		$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
		$cedula 			= test_input($datos['cedula']);
		$municipio 			= $datos['municipio'];
		$txt_municipio		= $datos['txt_municipio'];
		$nivel_usuario 		= test_input($datos['nivel_usuario']);
		$txt_tipo_dependencia = $datos['txt_tipo_dependencia'];
		actualizar_contador_personal_completo($cedula);
		
// 		$sql="";
// 		$sql.="SELECT 
// 				-- NOM.cedula as login_cedula,
// 				-- RIGHT(TRIM(NOM.cod_dependencia),6) as login_coddep,
// 				-- RIGHT(TRIM(NOM.cuenta_bancaria),6) as login_ctabanco,
// 				NOM.id_nomina,
// 				NOM.cedula, 
// 				TRIM(NOM.nombres_apellidos) AS nombres_apellidos, 
// 				TRIM(NOM.cod_cargo) AS cod_cargo,
// 				TRIM(NOM.cargo) AS cargo,
// 				 -- 
// 				NOM.cod_dependencia, 
// 				NOM.cuenta_bancaria, 
// 				'---' AS SEP1,
// 				PB.id_plantelesbase, 
// 				TRIM(PB.cod_plantel) AS cod_plantel, 
// 				TRIM(PB.cod_estadistico) AS cod_estadistico,				
// 				TRIM(PB.cod_nomina) AS cod_nomina, 
// 				-- 
// 				TRIM(PB.estado) AS estado ,
// 				TRIM(PB.municipio) AS municipio, 
// 				TRIM(PB.parroquia) as parroquia,
// 				-- 
// 				UPPER(TRIM(PB.nombre)) AS nombre, 
// 				TRIM(PB.denominacion) AS denominacion,
// 				-- 
// 				UPPER(TRIM(PB.zona_educativa)) AS zona_educativa ,
// 				UPPER(TRIM(PB.tipo_dependencia)) AS tipo_dependencia ,
// 				UPPER(TRIM(PB.estatus)) AS estatus ,
// 				TRIM(PB.fundacion) AS fundacion ,
// 				-- 
// 				UPPER(TRIM(PB.direccion)) AS direccion ,
// 				UPPER(TRIM(PB.correo)) AS correo ,
// 				TRIM(PB.telefono_fijo) AS telefono_fijo ,
// 				TRIM(PB.telefono_otro) AS telefono_otro ,
// 				UPPER(TRIM(PB.zona_ubicacion)) AS zona_ubicacion ,
// 				UPPER(TRIM(PB.clase_plantel)) AS clase_plantel ,
// 				UPPER(TRIM(PB.categoria)) AS categoria ,
// 				UPPER(TRIM(PB.condicion_estudio)) AS condicion_estudio ,
// 				UPPER(TRIM(PB.tipo_matricula)) AS tipo_matricula ,
// 				UPPER(TRIM(PB.turno)) AS turno ,
// 				UPPER(TRIM(PB.modalidad)) AS modalidad ,
// 				-- 
// 				UPPER(TRIM(PB.dir_nombre)) AS dir_nombre,
//   				UPPER(TRIM(PB.dir_apellido)) AS dir_apellido,
// 				UPPER(TRIM(PB.dir_direccion)) AS dir_direccion,
// 				UPPER(TRIM(PB.dir_fechanac)) AS dir_fechanac,
// 				-- 
// 				TRIM(PB.dir_telefono) as dir_telefono,
// 				TRIM(PB.dir_celular) as dir_celular,
// 				TRIM(PB.dir_email) as dir_email,
// 				TRIM(PB.dir_twitter) as dir_twitter,
// -- 
// 				TRIM(PB.total_etapa_maternal) as total_etapa_maternal,
// 				TRIM(PB.total_etapa_preescolar) as total_etapa_preescolar,
// 				TRIM(PB.total_primaria) as total_primaria,
// 				TRIM(PB.total_media_general) as total_media_general,
// 				TRIM(PB.total_media_tecnica) as total_media_tecnica,
// 				TRIM(PB.total_adulto) as total_adulto,
// 				TRIM(PB.total_especial) as total_especial,
// 				TRIM(PB.total) as total,
// -- 
// 				TRIM(PB.total_docente) as total_docente,
// 				TRIM(PB.total_administrativo) as total_administrativo,
// 				TRIM(PB.total_obrero) as total_obrero,
// -- 
// 				fecha_registro_matricula,
// 				fecha_registro_datos,
// 				fecha_registro_personal,
// 				fecha_registro_director,
// 				nivel_estatus,
// -- 
// 				'---' as cierre 
// 				FROM censo2017.plantelesbase AS PB 
// 				INNER JOIN censo2017.nominaactual AS NOM ON (PB.dir_cedula = NOM.cedula) ";
// 		//
// 		if ($nivel_usuario == 'DIRECTOR') { // BUSCA SOLO POR CEDULA PLANTELES-DIRECTOR
// 			$sql.="	WHERE NOM.cedula ='$cedula' ";
// 		}
// 		//
// 		if ($nivel_usuario == 'ADMIN') { // BUSCA TODOS LOS PLANTELES
// 			$sql.="	WHERE ( PB.tipo_dependencia ='PLANTA' OR  PB.tipo_dependencia ='ENTE ADSCRITO' ) ";	
// 		}
// 		//
// 		if ($nivel_usuario == 'ROOT') {
// 			//
// 			if ($txt_tipo_dependencia == 'PLANTELES') {
// 				$sql.=" WHERE  ( PB.tipo_dependencia !='PLANTA' AND  PB.tipo_dependencia !='ENTE ADSCRITO' ) ";
// 				if ($txt_municipio!=null ) {	
// 					$sql.=" and PB.municipio = '$txt_municipio' ";
// 				}
// 			}
// 			//
// 			if ($txt_tipo_dependencia == 'ZONA EDUCATIVA') {
// 				$sql.=" WHERE  ( PB.tipo_dependencia ='PLANTA' OR  PB.tipo_dependencia ='ENTE ADSCRITO' ) ";
// 			}
// 			//
// 			if ($txt_tipo_dependencia == 'CIRCUITOS EDUCATIVOS') {
// 				$sql.=" WHERE  ( PB.tipo_dependencia ='CIRCUITOS EDUCATIVOS' ) ";
// 				if ($txt_municipio!=null ) {	
// 					$sql.=" and PB.municipio = '$txt_municipio' ";
// 				}
// 			}
// 		}
// 		$sql.="		ORDER BY 
// 					PB.municipio, NOM.cedula, PB.id_plantelesbase ";
// 		$dato=consultar($sql,$Postgres);
//  		// ver_arreglo($dato);
// // 		Array
// // (
// //     [0]S => Array
// //         (
// //             [id_nomina] => 215
// //             [cedula] => 10217598
// //             [nombres_apellidos] => ZENAYDA P RODRIGUEZ G
// //             [cod_cargo] => 1124DI
// //             [cargo] => DOC. IV /AULA
// //             [cod_dependencia] => 006970354
// //             [cuenta_bancaria] => 01020513110000278586
// //             [sep1] => ---
// //             [id_plantelesbase] => 43
// //             [cod_plantel] => OD04551902
// //             [cod_estadistico] => 190045
// //             [nombre] => E B RIO COLORADO
// //             [municipio] => ANDRES MATA
// //             [parroquia] => SAN JOSE DE AEROCUAR
// //             [cierre] => ---
// //         )
// 		$NumeroDeFilas = $Postgres->NumeroDeFilas();
// 		if ($NumeroDeFilas>0) {
// 			echo json_encode($dato);

// 		}else{
// 			echo 'false';
// 		}


		$sql="";
		$sql.="SELECT 
				-- NOM.cedula as login_cedula,
				-- RIGHT(TRIM(NOM.cod_dependencia),6) as login_coddep,
				-- RIGHT(TRIM(NOM.cuenta_bancaria),6) as login_ctabanco,
				-- NOM.id_nomina,
				--NOM.cedula, 
				-- TRIM(NOM.nombres_apellidos) AS nombres_apellidos, 
				-- TRIM(NOM.cod_cargo) AS cod_cargo,
				-- TRIM(NOM.cargo) AS cargo,
				 -- 
				-- NOM.cod_dependencia, 
				--NOM.cuenta_bancaria, 
				-- '---' AS SEP1,
				PB.id_plantelesbase, 
				TRIM(PB.cod_plantel) AS cod_plantel, 
				TRIM(PB.cod_estadistico) AS cod_estadistico,				
				TRIM(PB.cod_nomina) AS cod_nomina, 
				-- 
				TRIM(PB.estado) AS estado ,
				TRIM(PB.municipio) AS municipio, 
				TRIM(PB.parroquia) as parroquia,
				-- 
				UPPER(TRIM(PB.nombre)) AS nombre, 
				TRIM(PB.denominacion) AS denominacion,
				-- 
				UPPER(TRIM(PB.zona_educativa)) AS zona_educativa ,
				UPPER(TRIM(PB.tipo_dependencia)) AS tipo_dependencia ,
				UPPER(TRIM(PB.estatus)) AS estatus ,
				TRIM(PB.fundacion) AS fundacion ,
				-- 
				UPPER(TRIM(PB.direccion)) AS direccion ,
				UPPER(TRIM(PB.correo)) AS correo ,
				TRIM(PB.telefono_fijo) AS telefono_fijo ,
				TRIM(PB.telefono_otro) AS telefono_otro ,
				UPPER(TRIM(PB.zona_ubicacion)) AS zona_ubicacion ,
				UPPER(TRIM(PB.clase_plantel)) AS clase_plantel ,
				UPPER(TRIM(PB.categoria)) AS categoria ,
				UPPER(TRIM(PB.condicion_estudio)) AS condicion_estudio ,
				UPPER(TRIM(PB.tipo_matricula)) AS tipo_matricula ,
				UPPER(TRIM(PB.turno)) AS turno ,
				UPPER(TRIM(PB.modalidad)) AS modalidad ,
				-- 
				
				TRIM(PB.dir_cedula) AS dir_cedula,
				UPPER(TRIM(PB.dir_nombre)) AS dir_nombre,
  				UPPER(TRIM(PB.dir_apellido)) AS dir_apellido,
				UPPER(TRIM(PB.dir_direccion)) AS dir_direccion,
				UPPER(TRIM(PB.dir_fechanac)) AS dir_fechanac,
				-- 
				TRIM(PB.dir_telefono) as dir_telefono,
				TRIM(PB.dir_celular) as dir_celular,
				TRIM(PB.dir_email) as dir_email,
				TRIM(PB.dir_twitter) as dir_twitter,
-- 
				TRIM(PB.total_etapa_maternal) as total_etapa_maternal,
				TRIM(PB.total_etapa_preescolar) as total_etapa_preescolar,
				TRIM(PB.total_primaria) as total_primaria,
				TRIM(PB.total_media_general) as total_media_general,
				TRIM(PB.total_media_tecnica) as total_media_tecnica,
				TRIM(PB.total_adulto) as total_adulto,
				TRIM(PB.total_especial) as total_especial,
				TRIM(PB.total) as total,
-- 
				TRIM(PB.total_docente) as total_docente,
				TRIM(PB.total_administrativo) as total_administrativo,
				TRIM(PB.total_obrero) as total_obrero,
-- 
				fecha_registro_matricula,
				fecha_registro_datos,
				fecha_registro_personal,
				fecha_registro_director,
				nivel_estatus, \n
-- 
				'---' as cierre 
				FROM censo2017.plantelesbase AS PB  \n";
		$sql.="	 -- INNER JOIN censo2017.nominaactual AS NOM ON (PB.dir_cedula = NOM.cedula) \n ";
		//
		if ($nivel_usuario == 'DIRECTOR') { // BUSCA SOLO POR CEDULA PLANTELES-DIRECTOR
			$sql.="	WHERE PB.dir_celular ='$cedula' ";
		}
		//
		if ($nivel_usuario == 'ADMIN') { // BUSCA TODOS LOS PLANTELES
			$sql.="	WHERE ( PB.tipo_dependencia ='PLANTA' OR  PB.tipo_dependencia ='ENTE ADSCRITO' ) ";	
		}
		//
		if ($nivel_usuario == 'ROOT') {
			//
			if ($txt_tipo_dependencia == 'PLANTELES') {
				$sql.=" WHERE  ( PB.tipo_dependencia !='PLANTA' AND  PB.tipo_dependencia !='ENTE ADSCRITO' ) ";
				if ($txt_municipio!=null ) {	
					$sql.=" and PB.municipio = '$txt_municipio' ";
				}
			}
			//
			if ($txt_tipo_dependencia == 'ZONA EDUCATIVA') {
				$sql.=" WHERE  ( PB.tipo_dependencia ='PLANTA' OR  PB.tipo_dependencia ='ENTE ADSCRITO' ) ";
			}
			//
			if ($txt_tipo_dependencia == 'CIRCUITOS EDUCATIVOS') {
				$sql.=" WHERE  ( PB.tipo_dependencia ='CIRCUITOS EDUCATIVOS' ) ";
				if ($txt_municipio!=null ) {	
					$sql.=" and PB.municipio = '$txt_municipio' ";
				}
			}
		}
		$sql.="		ORDER BY 
					PB.municipio, PB.cod_plantel, PB.dir_celular, PB.id_plantelesbase ";
		//
		$dato_plantel=consultar($sql,$Postgres);
		$NumeroDeFilas = $Postgres->NumeroDeFilas();
		if ($NumeroDeFilas>0) {
			foreach ($dato_plantel as $key => $value) {
				$dir_ced = $value['dir_cedula'];
				// echo $key ."  ----> " . $dir_ced . " ---> ";
				$sql_nom= "SELECT id_nomina,cedula,nombres_apellidos,cod_cargo,cargo,personal  FROM censo2017.nominaactual WHERE cedula = '$dir_ced' LIMIT 1 ";
				// ver_arreglo($sql_nom);
				$dato_nom=consultar($sql_nom,$Postgres);
				$NumeroDeFilas_nom = $Postgres->NumeroDeFilas();  
				if ($NumeroDeFilas_nom>0) {
					// echo "si";
					// $dato_salida[0] = array_merge($dato_nomina[0],$dato_registro[$key]);
					$dato_salida[$key] = array_merge($value,$dato_nom[0]);
				}else{
					// echo "no";
		            $dato_nom[0]['id_nomina'] = null ; //=> 14358
		            $dato_nom[0]['cedula'] = null ; // => 12664967
		            $dato_nom[0]['nombres_apellidos'] = null ; // => SALAZAR ELIZABETH        
		            $dato_nom[0]['cod_cargo'] = null ; // => 1123DI
		            $dato_nom[0]['cargo'] = null ; // => DOC. III /AULA           
		            $dato_nom[0]['personal'] = null ; // => DOCENTE
					$dato_salida[$key] = array_merge($value,$dato_nom[0]);
				}
				// ver_arreglo($value);
				// ver_arreglo($dato_nom[0]);
				// ver_arreglo("ARREGLO MERGE ---------------------------------------------------------------------------");
				// ver_arreglo($dato_salida[$key]);
				// echo json_encode($dato_salida[$key]) . "<br><br>";

			}
			// ver_arreglo($dato_salida);		
			echo json_encode($dato_salida);
			// echo json_encode($dato);
		}else{
			echo 'false';
		}

	}
?>
<?php
	function consultar_funcionarios($datos) {
		// 	 __        __           __   __  ___  __
		// 	|__)  /\  |__)  /\     |__) /  \  |  /  \ |\ |
		// 	|    /~~\ |  \ /~~\    |__) \__/  |  \__/ | \|
		// 	
		// 	 __        __   __        __      __   ___  __
		// 	|__) |  | /__` /  `  /\  |__)    /  ` |__  |  \ |  | |     /\
		// 	|__) \__/ .__/ \__, /~~\ |  \    \__, |___ |__/ \__/ |___ /~~\
		// 	
		// ver_arreglo($datos);
		// die();
		$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
		$cedula 			= $datos['cedula'];
		$id_plantelesbase 	= $datos['id_plantelesbase_per'];
		// ver_arreglo($id_plantelesbase);
		// buscamos en nomina
		$sql_nomina=  "SELECT	
						NOM.id_nomina AS NOM_id_nomina, 
						NOM.cedula AS NOM_cedula, 
						NOM.nomina AS NOM_nomina,
						TRIM(NOM.nombres_apellidos) AS NOM_nombres_apellidos, 
						NOM.fecha_ingreso AS NOM_fecha_ingreso, 
						NOM.cod_cargo AS NOM_cod_cargo, 
						NOM.cargo AS NOM_cargo, 
						NOM.cod_dependencia AS NOM_cod_dependencia, 
						NOM.dependencia AS NOM_dependencia, 
						NOM.personal AS NOM_personal, 
						NOM.horas_adm AS NOM_horas_adm, 
						NOM.horas_doc AS NOM_horas_doc, 
						-- NOM.cuenta_bancaria AS NOM_cuenta_bancaria, 
						NOM.fecha_ultimo_acceso AS NOM_fecha_ultimo_acceso
				FROM censo2017.nominaactual AS NOM
				WHERE NOM.cedula = '$cedula' ";		
		$dato_nomina=consultar($sql_nomina,$Postgres);
		// ver_arreglo($dato_nomina);
		// Array
		// (
		//     [0] => Array
		//         (
		//             [nom_id_nomina] => 41946
		//             [nom_cedula] => 11829328
		//             [nom_nomina] => FIJO
		//             [nom_nombres_apellidos] => HERNANDEZ C OSWALDO E
		//             [nom_fecha_ingreso] => 04/01/2011
		//             [nom_cod_cargo] => 100000
		//             [nom_cargo] => BACHILLER I
		//             [nom_cod_dependencia] => 006102200
		//             [nom_dependencia] => OFIC DE SUPERV ZONA NO 12
		//             [nom_personal] => A
		//             [nom_horas_adm] => 37,5
		//             [nom_horas_doc] => 0
		//             [nom_fecha_ultimo_acceso] => 
		//         )
		// )
		$NumeroDeFilas_nomina = $Postgres->NumeroDeFilas();
		if ($NumeroDeFilas_nomina>0) {
			// echo "existe en nomina<br>";
			$sql_registro =  "SELECT	
							REG.id_plantelesbase as REG_id_plantelesbase,
							REG.id_registropersonal AS REG_id_registropersonal, 
							REG.cedula AS REG_cedula, 
							REG.nombre_completo AS REG_nombre_completo, 
							REG.apellido_completo AS REG_apellido_completo, 
							REG.fecha_nac AS REG_fecha_nac, 
							REG.sexo AS REG_sexo, 
							REG.estado_civil AS REG_estado_civil, 
							REG.telefono_celular AS REG_telefono_celular, 
							REG.telefono_residencia AS REG_telefono_residencia, 
							REG.direccion_habitacion AS REG_direccion_habitacion, 
							REG.red_twitter AS REG_red_twitter, 
							REG.red_email AS REG_red_email, 
							REG.tipo_personal AS REG_tipo_personal,
							REG.tipo_personal_funcional AS REG_tipo_personal_funcional,
							--
							REG.grado_instruccion AS reg_grado_instruccion, 
		            		REG.titulo_obtenido AS reg_titulo_obtenido, 
	            			REG.institucion_educativa AS reg_institucion_educativa, 

	            			REG.discapacidad AS reg_discapacidad,
	            			REG.discapacidad_otra AS reg_discapacidad_otra, 
	            			--
							--REG.horas_doc AS REG_horas_doc, 
							COALESCE(REG.horas_doc, '0') AS REG_horas_doc,
							COALESCE(REG.horas_adm, '0') AS REG_horas_adm,
							COALESCE(REG.horas_obr, '0') AS REG_horas_obr,
							COALESCE (COALESCE(REG.horas_adm, REG.horas_obr), '0' ) AS reg_horas_doc_obr,
							--CAST(REG.horas_adm AS numeric)  + CAST(REG.horas_obr AS numeric) AS reg_horas_doc_obr,
							--
							REG.horarios_funcional AS REG_horarios_funcional, 
							REG.cargo_funcional AS REG_cargo_funcional, 
							REG.dependencia_funcional AS reg_dependencia_funcional,
							--
							REG.turno_trabajo AS REG_turno_trabajo,
							--
							REG.niveles_funcional AS REG_niveles_funcional, 
							REG.matricula_atendida AS REG_matricula_atendida, 
							REG.fecha_ingreso AS REG_fecha_ingreso, 
							REG.tiempo_servicio_plantel AS REG_tiempo_servicio_plantel, 
							REG.matricula_atendida_total_maternal, 
							REG.matricula_atendida_total_preescolar, 
							REG.matricula_atendida_total_primaria, 
							REG.matricula_atendida_total_media_general, 
							REG.matricula_atendida_total_media_tecnica, 
							REG.matricula_atendida_total_adulto, 
							REG.matricula_atendida_total_especial, 
							REG.matricula_atendida_total
					FROM censo2017.registropersonal AS REG
					-- LEFT JOIN censo2017.registropersonal AS REG ON (REG.cedula = NOM.cedula)
					WHERE REG.cedula = '$cedula' 
					-- AND REG.id_plantelesbase = $id_plantelesbase;
					";
			// ver_arreglo($sql);	 	
			$dato_registro=consultar($sql_registro,$Postgres);
			// ver_arreglo($dato_registro);
			$NumeroDeFilas_registro = $Postgres->NumeroDeFilas();
			if ($NumeroDeFilas_registro>0) {
				// $dato_salida = array_merge($dato_nomina[0],$dato_registro[0]);
				$existe_personal = false;
				//
				foreach ($dato_registro as $key => $value) {
					// ver_arreglo($value);
					// print_r("condicional = ". $value['reg_id_plantelesbase'] . " = " . $id_plantelesbase . "<BR>");
					$valoridpb = $value['reg_id_plantelesbase']; 
					if 	($valoridpb==$id_plantelesbase){
						$existe_personal=true;
						// print_r("eeeeyyyyy esta registrado como personal de la esta institución<br>");
						// ver_arreglo($dato_nomina[0]);
						// ver_arreglo($dato_registro[$key]);
						$dato_salida[0] = array_merge($dato_nomina[0],$dato_registro[$key]);
						// ver_arreglo($dato_salida);
						break;
					}
				}
				if ($existe_personal==true) {
					// print_r("esta registrado como personal de la esta institución<br>");

				}else{
					// print_r("EXITE PERO NO esta registrado como personal de la esta institución<br>");
					$dato_registro[0]['reg_id_plantelesbase'] = null;
					$dato_registro[0]['reg_id_registropersonal'] = null;
					$dato_registro[0]['reg_horas_doc'] = null;
					$dato_registro[0]['reg_horas_adm'] = null;
					$dato_registro[0]['reg_horas_obr'] = null;
					// 
					$dato_registro[0]['reg_horas_doc_obr'] = null;
					$dato_registro[0]['reg_horarios_funcional'] = null;
					$dato_registro[0]['reg_cargo_funcional'] = null;
					$dato_registro[0]['reg_dependencia_funcional'] = null;
					$dato_registro[0]['reg_turno_trabajo'] = null;
					$dato_registro[0]['reg_niveles_funcional'] = null; 
					$dato_registro[0]['reg_matricula_atendida'] = null;
					$dato_registro[0]['reg_fecha_ingreso'] = null;
					$dato_registro[0]['reg_tiempo_servicio_plantel'] = null; 
					$dato_registro[0]['matricula_atendida_total_maternal'] = null; 
					$dato_registro[0]['matricula_atendida_total_preescolar'] = null; 
					$dato_registro[0]['matricula_atendida_total_primaria'] = null;
					$dato_registro[0]['matricula_atendida_total_media_general'] = null;
					$dato_registro[0]['matricula_atendida_total_media_tecnica'] = null;
					$dato_registro[0]['matricula_atendida_total_adulto'] = null;
					$dato_registro[0]['matricula_atendida_total_especial'] = null;
					$dato_registro[0]['matricula_atendida_total'] = null;
					$dato_salida[0] = array_merge($dato_nomina[0],$dato_registro[0]);
				}
				
				// ver_arreglo($dato_nomina);
				// ver_arreglo($dato_registro);
				// $dato_registro[0] = 
				// ver_arreglo($dato_registro);
				// echo json_encode($dato_registro);
			}else{
				// print_r("NO REGISTRADO como personal de la esta institución<br>");
				// 
				// $dato_registro = array(array('reg_id_plantelesbase' => ''));
				// ver_arreglo($dato_registro);
				// $dato_salida = array_merge($dato_nomina[0],$dato_registro[0]);
				// ver_arreglo($dato_salida);
				$dato_nomina[0]['reg_id_registropersonal']=null;
				$dato_nomina[0]['reg_id_plantelesbase'] = null;
				// ver_arreglo($dato_nomina);
				// print_r('new');
				$dato_salida = $dato_nomina;

			}
			// ver_arreglo($dato_salida);
			echo json_encode($dato_salida);
		}else{
			// no existe en nomina
			print_r('false');
		}
	}
?>
<?php
	function consultar_personal_asignado($datos) {
		// 	 __        __                  __  ___       __   __      __   ___     __   __   __  ___  __  ___  __        __
		// 	|__)  /\  |__)  /\     |    | /__`  |   /\  |  \ /  \    |  \ |__     |__) /  \ /  \  |  /__`  |  |__)  /\  |__)
		// 	|    /~~\ |  \ /~~\    |___ | .__/  |  /~~\ |__/ \__/    |__/ |___    |__) \__/ \__/  |  .__/  |  |  \ /~~\ |
		// 	
		// ver_arreglo($datos);
		// die();
		// accion=consultar_personal_asignado
		// id_plantelesbase=43
		// Array
		// (
		//     [accion] => consultar_personal_asignado
		//     [id_plantelesbase] => 43
		// )
		$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
		$id_plantelesbase = $datos['id_plantelesbase'];
		$sql=  "SELECT	
						REG.id_plantelesbase as REG_id_plantelesbase,
						REG.id_registropersonal AS REG_id_registropersonal, 
						REG.cedula AS REG_cedula, 
						UPPER(TRIM(REG.nombre_completo)) AS REG_nombre_completo, 
						UPPER(TRIM(REG.apellido_completo)) AS REG_apellido_completo, 
						REG.fecha_nac AS REG_fecha_nac, 
						UPPER(TRIM(REG.sexo)) AS REG_sexo, 
						UPPER(TRIM(REG.estado_civil)) AS REG_estado_civil, 
						REG.telefono_celular AS REG_telefono_celular, 
						REG.telefono_residencia AS REG_telefono_residencia, 
						UPPER(TRIM(REG.direccion_habitacion)) AS REG_direccion_habitacion, 
						UPPER(TRIM(REG.red_twitter)) AS REG_red_twitter, 
						UPPER(TRIM(REG.red_email)) AS REG_red_email, 
						REG.tipo_personal AS REG_tipo_personal,
						REG.tipo_personal_funcional AS REG_tipo_personal_funcional,
						--
						REG.grado_instruccion AS reg_grado_instruccion, 
	            		UPPER(TRIM(REG.titulo_obtenido)) AS reg_titulo_obtenido, 
            			UPPER(TRIM(REG.institucion_educativa)) AS reg_institucion_educativa, 

            			REG.discapacidad AS reg_discapacidad,
	            		TRIM(REG.discapacidad_otra) AS reg_discapacidad_otra,
						--
						COALESCE(REG.horas_doc, '0') AS REG_horas_doc,
						COALESCE(REG.horas_adm, '0') AS REG_horas_adm,
						COALESCE(REG.horas_obr, '0') AS REG_horas_obr,
						COALESCE(REG.horas_adm, REG.horas_obr) AS reg_horas_doc_obr,
						--COALESCE (COALESCE(REG.horas_adm, REG.horas_obr), '0' ) AS reg_horas_doc_obr,
						-- CAST(REG.horas_adm AS numeric)  + CAST(REG.horas_obr AS numeric) AS reg_horas_doc_obr,
				--
						UPPER(TRIM(REG.horarios_funcional)) AS REG_horarios_funcional, 
						UPPER(TRIM(REG.cargo_funcional)) AS REG_cargo_funcional, 
						UPPER(TRIM(REG.dependencia_funcional)) AS reg_dependencia_funcional,
--
						UPPER(TRIM(REG.turno_trabajo)) AS REG_turno_trabajo,
--
						REG.niveles_funcional AS REG_niveles_funcional, 
						REG.matricula_atendida AS REG_matricula_atendida, 
						REG.fecha_ingreso AS REG_fecha_ingreso, 
						REG.tiempo_servicio_plantel AS REG_tiempo_servicio_plantel, 
						REG.matricula_atendida_total_maternal, 
						REG.matricula_atendida_total_preescolar, 
						REG.matricula_atendida_total_primaria, 
						REG.matricula_atendida_total_media_general, 
						REG.matricula_atendida_total_media_tecnica, 
						REG.matricula_atendida_total_adulto, 
						REG.matricula_atendida_total_especial, 
						REG.matricula_atendida_total
				FROM censo2017.registropersonal AS REG 
				WHERE REG.id_plantelesbase = $id_plantelesbase
				ORDER BY  REG.id_registropersonal DESC";
		// ver_arreglo($sql);		
		$dato_registro=consultar($sql,$Postgres);
		// ver_arreglo($dato);
		$NumeroDeFilas = $Postgres->NumeroDeFilas();
		if ($NumeroDeFilas>0) {
			foreach ($dato_registro as $key => $value) {
				$cedula = $value['reg_cedula'];
				$sql_nomina =  "SELECT	
								NOM.id_nomina AS NOM_id_nomina, 
								NOM.cedula AS NOM_cedula, 
								NOM.nomina AS NOM_nomina,
								NOM.nombres_apellidos AS NOM_nombres_apellidos, 
								NOM.fecha_ingreso AS NOM_fecha_ingreso, 
								NOM.cod_cargo AS NOM_cod_cargo, 
								NOM.cargo AS NOM_cargo, 
								NOM.cod_dependencia AS NOM_cod_dependencia, 
								NOM.dependencia AS NOM_dependencia, 
								NOM.personal AS NOM_personal, 
								NOM.horas_adm AS NOM_horas_adm, 
								NOM.horas_doc AS NOM_horas_doc, 
								-- NOM.cuenta_bancaria AS NOM_cuenta_bancaria, 
								NOM.fecha_ultimo_acceso AS NOM_fecha_ultimo_acceso
							FROM censo2017.nominaactual AS NOM
							WHERE NOM.cedula = '$cedula' ";		
				$dato_nomina=consultar($sql_nomina,$Postgres);
				// ver_arreglo($value);
				// ver_arreglo($dato_nomina[0]);
				$dato_registro[$key] = array_merge($dato_nomina[0],$dato_registro[$key]);
				// $NumeroDeFilas_nomina = $Postgres->NumeroDeFilas();
				// if ($NumeroDeFilas_nomina>0) {
				//   	$dato[$key]; = array_merge($dato_nomina[0],$dato[$key]);
				// ver_arreglo($dato_registro[$key]);
				// echo json_encode($dato_registro[$key]);
				//  }
			}
			// ver_arreglo($dato_registro);
			actualizar_contador_personal($id_plantelesbase);
			echo json_encode($dato_registro);
		}else{
			print_r('false');
		}
	}
?>
<?php
	function consultar_personal_asignado_comision_servicio($datos) {
		// 	 __        __                  __  ___       __   __      __   ___     __   __   __  ___  __  ___  __        __
		// 	|__)  /\  |__)  /\     |    | /__`  |   /\  |  \ /  \    |  \ |__     |__) /  \ /  \  |  /__`  |  |__)  /\  |__)
		// 	|    /~~\ |  \ /~~\    |___ | .__/  |  /~~\ |__/ \__/    |__/ |___    |__) \__/ \__/  |  .__/  |  |  \ /~~\ |
		// 	
		//  __   __        __            ___       __      __   ___  __   __   __                          __     __             __   __
		// /  ` /  \ |\ | /__` |  | |     |   /\  |__)    |__) |__  |__) /__` /  \ |\ |  /\  |        /\  /__` | / _` |\ |  /\  |  \ /  \
		// \__, \__/ | \| .__/ \__/ |___  |  /~~\ |  \    |    |___ |  \ .__/ \__/ | \| /~~\ |___    /~~\ .__/ | \__> | \| /~~\ |__/ \__/
		// 
		//  __   __           __     __            __   ___  __          __     __
		// /  ` /  \  |\/| | /__` | /  \ |\ |     /__` |__  |__) \  / | /  ` | /  \
		// \__, \__/  |  | | .__/ | \__/ | \| ___ .__/ |___ |  \  \/  | \__, | \__/
		// 
		$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
		$id_plantelesbase = $datos['id_plantelesbase'];
		$sql=  "SELECT	
						REG.id_plantelesbase as REG_id_plantelesbase,
						REG.id_registropersonal AS REG_id_registropersonal, 
						REG.cedula AS REG_cedula, 
						UPPER(TRIM(REG.nombre_completo)) AS REG_nombre_completo, 
						UPPER(TRIM(REG.apellido_completo)) AS REG_apellido_completo, 
						REG.fecha_nac AS REG_fecha_nac, 
						UPPER(TRIM(REG.sexo)) AS REG_sexo, 
						UPPER(TRIM(REG.estado_civil)) AS REG_estado_civil, 
						REG.telefono_celular AS REG_telefono_celular, 
						REG.telefono_residencia AS REG_telefono_residencia, 
						UPPER(TRIM(REG.direccion_habitacion)) AS REG_direccion_habitacion, 
						UPPER(TRIM(REG.red_twitter)) AS REG_red_twitter, 
						UPPER(TRIM(REG.red_email)) AS REG_red_email, 
						REG.tipo_personal AS REG_tipo_personal,
						REG.tipo_personal_funcional AS REG_tipo_personal_funcional,
						--
						REG.grado_instruccion AS reg_grado_instruccion, 
	            		UPPER(TRIM(REG.titulo_obtenido)) AS reg_titulo_obtenido, 
            			UPPER(TRIM(REG.institucion_educativa)) AS reg_institucion_educativa, 

            			REG.discapacidad AS reg_discapacidad,
	            		TRIM(REG.discapacidad_otra) AS reg_discapacidad_otra,
						--
						COALESCE(REG.horas_doc, '0') AS REG_horas_doc,
						COALESCE(REG.horas_adm, '0') AS REG_horas_adm,
						COALESCE(REG.horas_obr, '0') AS REG_horas_obr,
						COALESCE(REG.horas_adm, REG.horas_obr) AS reg_horas_doc_obr,
						--COALESCE (COALESCE(REG.horas_adm, REG.horas_obr), '0' ) AS reg_horas_doc_obr,
						-- CAST(REG.horas_adm AS numeric)  + CAST(REG.horas_obr AS numeric) AS reg_horas_doc_obr,
				--
						UPPER(TRIM(REG.horarios_funcional)) AS REG_horarios_funcional, 
						UPPER(TRIM(REG.cargo_funcional)) AS REG_cargo_funcional, 
						UPPER(TRIM(REG.dependencia_funcional)) AS reg_dependencia_funcional,
--
						UPPER(TRIM(REG.turno_trabajo)) AS REG_turno_trabajo,
--
						REG.niveles_funcional AS REG_niveles_funcional, 
						REG.matricula_atendida AS REG_matricula_atendida, 
						REG.fecha_ingreso AS REG_fecha_ingreso, 
						REG.tiempo_servicio_plantel AS REG_tiempo_servicio_plantel, 
						REG.matricula_atendida_total_maternal, 
						REG.matricula_atendida_total_preescolar, 
						REG.matricula_atendida_total_primaria, 
						REG.matricula_atendida_total_media_general, 
						REG.matricula_atendida_total_media_tecnica, 
						REG.matricula_atendida_total_adulto, 
						REG.matricula_atendida_total_especial, 
						REG.matricula_atendida_total
				FROM censo2017.registropersonal AS REG 
				WHERE (REG.id_plantelesbase = $id_plantelesbase AND REG.tipo_personal = 'COMISION DE SERVICIO' )
				ORDER BY  REG.id_registropersonal DESC";
		// ver_arreglo($sql);		
		$dato_registro=consultar($sql,$Postgres);
		// ver_arreglo($dato);
		$NumeroDeFilas = $Postgres->NumeroDeFilas();
		if ($NumeroDeFilas>0) {
			// foreach ($dato_registro as $key => $value) {
			// 	$cedula = $value['reg_cedula'];
			// 	$sql_nomina =  "SELECT	
			// 					NOM.id_nomina AS NOM_id_nomina, 
			// 					NOM.cedula AS NOM_cedula, 
			// 					NOM.nomina AS NOM_nomina,
			// 					NOM.nombres_apellidos AS NOM_nombres_apellidos, 
			// 					NOM.fecha_ingreso AS NOM_fecha_ingreso, 
			// 					NOM.cod_cargo AS NOM_cod_cargo, 
			// 					NOM.cargo AS NOM_cargo, 
			// 					NOM.cod_dependencia AS NOM_cod_dependencia, 
			// 					NOM.dependencia AS NOM_dependencia, 
			// 					NOM.personal AS NOM_personal, 
			// 					NOM.horas_adm AS NOM_horas_adm, 
			// 					NOM.horas_doc AS NOM_horas_doc, 
			// 					-- NOM.cuenta_bancaria AS NOM_cuenta_bancaria, 
			// 					NOM.fecha_ultimo_acceso AS NOM_fecha_ultimo_acceso
			// 				FROM censo2017.nominaactual AS NOM
			// 				WHERE NOM.cedula = '$cedula' ";		
			// 	$dato_nomina=consultar($sql_nomina,$Postgres);
			// 	// ver_arreglo($value);
			// 	// ver_arreglo($dato_nomina[0]);
			// 	$dato_registro[$key] = array_merge($dato_nomina[0],$dato_registro[$key]);
			// 	// $NumeroDeFilas_nomina = $Postgres->NumeroDeFilas();
			// 	// if ($NumeroDeFilas_nomina>0) {
			// 	//   	$dato[$key]; = array_merge($dato_nomina[0],$dato[$key]);
			// 	// ver_arreglo($dato_registro[$key]);
			// 	// echo json_encode($dato_registro[$key]);
			// 	//  }
			// }
			// ver_arreglo($dato_registro);
			// actualizar_contador_personal($id_plantelesbase);
			echo json_encode($dato_registro);
		}else{
			print_r('false');
		}
	}
?>
<?php
	function consultar_personal_general($datos) {
		// 	 __        __                  __  ___       __   __      __   ___     __   __   __  ___  __  ___  __        __
		// 	|__)  /\  |__)  /\     |    | /__`  |   /\  |  \ /  \    |  \ |__     |__) /  \ /  \  |  /__`  |  |__)  /\  |__)
		// 	|    /~~\ |  \ /~~\    |___ | .__/  |  /~~\ |__/ \__/    |__/ |___    |__) \__/ \__/  |  .__/  |  |  \ /~~\ |
		// 	
		// ver_arreglo($datos);
		// die();
		// accion=consultar_personal_asignado
		// id_plantelesbase=43
		// Array
		// (
		//     [accion] => consultar_personal_asignado
		//     [id_plantelesbase] => 43
		// )
		$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
		$id_plantelesbase = $datos['id_plantelesbase'];
		$sql=  "SELECT	
						PB.municipio as PB_municipio, 
 						REG.id_plantelesbase as REG_id_plantelesbase,
						PB.nombre as PB_nombre,
						REG.id_registropersonal AS REG_id_registropersonal, 
						REG.cedula AS REG_cedula, 
						UPPER(TRIM(REG.nombre_completo)) AS REG_nombre_completo, 
						UPPER(TRIM(REG.apellido_completo)) AS REG_apellido_completo, 
						REG.fecha_nac AS REG_fecha_nac, 
						UPPER(TRIM(REG.sexo)) AS REG_sexo, 
						UPPER(TRIM(REG.estado_civil)) AS REG_estado_civil, 
						REG.telefono_celular AS REG_telefono_celular, 
						REG.telefono_residencia AS REG_telefono_residencia, 
						UPPER(TRIM(REG.direccion_habitacion)) AS REG_direccion_habitacion, 
						UPPER(TRIM(REG.red_twitter)) AS REG_red_twitter, 
						UPPER(TRIM(REG.red_email)) AS REG_red_email, 
						REG.tipo_personal AS REG_tipo_personal,
						REG.tipo_personal_funcional AS REG_tipo_personal_funcional,
						--
						REG.grado_instruccion AS reg_grado_instruccion, 
	            		UPPER(TRIM(REG.titulo_obtenido)) AS reg_titulo_obtenido, 
            			UPPER(TRIM(REG.institucion_educativa)) AS reg_institucion_educativa, 

            			REG.discapacidad AS reg_discapacidad,
	            		TRIM(REG.discapacidad_otra) AS reg_discapacidad_otra,
						--
						COALESCE(REG.horas_doc, '0') AS REG_horas_doc,
						COALESCE(REG.horas_adm, '0') AS REG_horas_adm,
						COALESCE(REG.horas_obr, '0') AS REG_horas_obr,
						COALESCE(REG.horas_adm, REG.horas_obr) AS reg_horas_doc_obr,
						--COALESCE (COALESCE(REG.horas_adm, REG.horas_obr), '0' ) AS reg_horas_doc_obr,
						-- CAST(REG.horas_adm AS numeric)  + CAST(REG.horas_obr AS numeric) AS reg_horas_doc_obr,
				--
						UPPER(TRIM(REG.horarios_funcional)) AS REG_horarios_funcional, 
						UPPER(TRIM(REG.cargo_funcional)) AS REG_cargo_funcional, 
						UPPER(TRIM(REG.dependencia_funcional)) AS reg_dependencia_funcional,
--
						UPPER(TRIM(REG.turno_trabajo)) AS REG_turno_trabajo,
--
						REG.niveles_funcional AS REG_niveles_funcional, 
						REG.matricula_atendida AS REG_matricula_atendida, 
						REG.fecha_ingreso AS REG_fecha_ingreso, 
						REG.tiempo_servicio_plantel AS REG_tiempo_servicio_plantel, 
						REG.matricula_atendida_total_maternal, 
						REG.matricula_atendida_total_preescolar, 
						REG.matricula_atendida_total_primaria, 
						REG.matricula_atendida_total_media_general, 
						REG.matricula_atendida_total_media_tecnica, 
						REG.matricula_atendida_total_adulto, 
						REG.matricula_atendida_total_especial, 
						REG.matricula_atendida_total
				FROM censo2017.registropersonal AS REG 
				INNER JOIN censo2017.plantelesbase AS PB ON (PB.id_plantelesbase = REG.id_plantelesbase)

				ORDER BY  PB.municipio ASC, REG.id_plantelesbase, CAST(REG.cedula AS INTEGER) ASC ";
		// ver_arreglo($sql);		
		$dato_registro=consultar($sql,$Postgres);
		// ver_arreglo($dato);
		$NumeroDeFilas = $Postgres->NumeroDeFilas();
		if ($NumeroDeFilas>0) {
			foreach ($dato_registro as $key => $value) {
				$cedula = $value['reg_cedula'];
				$sql_nomina =  "SELECT	
								NOM.id_nomina AS NOM_id_nomina, 
								NOM.cedula AS NOM_cedula, 
								NOM.nomina AS NOM_nomina,
								NOM.nombres_apellidos AS NOM_nombres_apellidos, 
								NOM.fecha_ingreso AS NOM_fecha_ingreso, 
								NOM.cod_cargo AS NOM_cod_cargo, 
								NOM.cargo AS NOM_cargo, 
								NOM.cod_dependencia AS NOM_cod_dependencia, 
								NOM.dependencia AS NOM_dependencia, 
								NOM.personal AS NOM_personal, 
								NOM.horas_adm AS NOM_horas_adm, 
								NOM.horas_doc AS NOM_horas_doc, 
								-- NOM.cuenta_bancaria AS NOM_cuenta_bancaria, 
								NOM.fecha_ultimo_acceso AS NOM_fecha_ultimo_acceso
							FROM censo2017.nominaactual AS NOM
							WHERE NOM.cedula = '$cedula' ";		
				$dato_nomina=consultar($sql_nomina,$Postgres);
				// ver_arreglo($value);
				// ver_arreglo($dato_nomina[0]);
				$dato_registro[$key] = array_merge($dato_nomina[0],$dato_registro[$key]);
				// $NumeroDeFilas_nomina = $Postgres->NumeroDeFilas();
				// if ($NumeroDeFilas_nomina>0) {
				//   	$dato[$key]; = array_merge($dato_nomina[0],$dato[$key]);
				// ver_arreglo($dato_registro[$key]);
				// echo json_encode($dato_registro[$key]);
				//  }
			}
			// ver_arreglo($dato_registro);
			// actualizar_contador_personal($id_plantelesbase);
			echo json_encode($dato_registro);
		}else{
			print_r('false');
		}
	}
?>
<?php
	function consultar_registros_filtro($datos) {
		$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
		$id_categoria = $datos['id_categoria'];
		$sql=  "SELECT 	pl.plan_uid, pl.plan_codigodea ,pl.plan_nombre, pl.plan_municipio, mun.municipio_uid, mun.municipio_nombre 
				FROM plantel_datos.plantel as pl
				-- LEFT JOIN comun.dependencia as dep ON(dep.dependencia_codigonomina = pl.plan_codnomina ) 
				-- LEFT JOIN plantel_datos.denominacion as deno ON(deno.de_uid = pl.plan_denominacion )
				-- LEFT JOIN plantel_datos.tipo_dependencia as tpd  ON(tpd.td_uid = plan_tipodep )
				-- LEFT JOIN plantel_datos.estatus_plantel as estplan  ON(estplan.ep_uid = plan_estatus )
				-- LEFT JOIN plantel_datos.clase as clase  ON(clase.cl_uid = ep_uid )
				-- LEFT JOIN plantel_datos.categoria  as cat  ON(cat.ct_uid = plan_categoria )
				-- LEFT JOIN plantel_datos.condestudio  as plancond  ON(plancond.ce_uid = pl.plan_condicionestudio )
				-- LEFT JOIN plantel_datos.tipo_matricula  as tpmat  ON(tpmat.tm_uid = pl.plan_tipomatricula )
				-- LEFT JOIN plantel_datos.turno  as turno  ON(turno.tu_uid = pl.plan_turno )
				-- LEFT JOIN plantel_datos.modalidad as mod  ON(mod.md_uid = pl.plan_modalidad )
				LEFT JOIN comun.estado as est  ON(est.estado_codigo = cast(pl.plan_estado as int) )
				LEFT JOIN comun.municipio as mun  ON(mun.municipio_uid = pl.plan_municipio  )
				-- LEFT JOIN comun.parroquia as parr  ON(parr.parroquia_uid = pl.plan_parroquia )
				-- LEFT JOIN comun.ciudad as ciud ON(ciud.ciudad_uid = pl.plan_ciudad)
				WHERE plan_municipio LIKE '$id_categoria' 
				--ORDER BY pl.plan_codigodea
				ORDER BY pl.plan_nombre;";
		// ver_arreglo($sql);		
		$dato=consultar($sql,$Postgres);
		// ver_arreglo($dato);
		$NumeroDeFilas = $Postgres->NumeroDeFilas();
		if ($NumeroDeFilas>0) {
			echo json_encode($dato);
		}else{
			print_r('false');
		}
	}
?>
<?php
function agregar_personal($datos) {
		// INICIA LA CONEXION CON EL SERVIDOR 
	$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
	// ver_arreglo($datos);
	// die();
	// 
    // $txt_id_plantelesbase 		=	$datos['txt_id_plantelesbase_per']; // 51
	// Array
	// 	(
	// 		[txt_id_plantelesbase_per] => 43
	// 		[txt_cod_plantel_per] => OD04551902
	// 		[txt_id_personal_per] => 
	// 
	// 		[txt_nombre_funcionario] => OSWALDO ENRIQUES
	// 		[txt_apellido_funcionario] => HERNANDEZ CAMPOS 
	// 		[txt_sexo_funcionario] => MASCULINO
	// 		[txt_edocivil_funcionario] => CASADO
	// 		[txt_fechanac_funcionario] => 30/11/2017
	// 		[txt_celular_funcionario] => CELULAR
	// 		[txt_telefono_funcionario] => RESIDENCIAL
	// 		[txt_correo_funcionario] => CORREO
	// 		[txt_twitter_funcionario] => TWITTER
	// 		[txt_direccion_funcionario] => DIRECCION
	// 		[txt_grado_instruccion] => TECNICO
	// 		[txt_titulo] => TSU INFORMATICA
	// 		[txt_institucion] => IUTIRLA
	// 		[txt_cargo_funcion] => COORDINADOR DE PROGRAMACION
	// 		[txt_coordinacion_laboral] => INFORMATICA
	// 		[txt_turno_trabajo] => COMPLETO
	// 		[txt_horario_laboral] => 08:00 AM - 03:00PM
	// 		[txt_horas_doc_funcionario] => HORAS DOCENTES
	// 		[txt_horas_adm_obr_funcionario] => HORAS ADMINISTRATIVAS
	// 		[accion] => agregar_personal
	// 		[token1] => :D!EB28ef00;8eef¿eEd
	// )
	$txt_id_plantelesbase 				=	$datos['txt_id_plantelesbase_per']; // => 43
	$txt_cod_plantel_per 				=	$datos['txt_cod_plantel_per']; // => OD04551902
	$txt_id_personal_per 				=	$datos['txt_id_personal_per']; // => 
	$txt_id_personal_per 				=	$datos['txt_id_personal_per']; // => 
	$txt_cedula_personal 				=	$datos['txt_cedula_personal']; // => => 11829328

	// ver_arreglo(test_input($txt_cedula_personal));

	$txt_nombre_funcionario 			=	$datos['txt_nombre_funcionario']; // => OSWALDO ENRIQUES
	$txt_apellido_funcionario 			=	$datos['txt_apellido_funcionario']; // => HERNANDEZ CAMPOS 
	$txt_sexo_funcionario 				=	$datos['txt_sexo_funcionario']; // => MASCULINO
	$txt_edocivil_funcionario 			=	$datos['txt_edocivil_funcionario']; // => CASADO
	$txt_fechanac_funcionario 			=	$datos['txt_fechanac_funcionario']; // => 30/11/2017
	$txt_celular_funcionario 			=	$datos['txt_celular_funcionario']; // => CELULAR
	$txt_telefono_funcionario 			=	$datos['txt_telefono_funcionario']; // => RESIDENCIAL
	$txt_correo_funcionario 			=	$datos['txt_correo_funcionario']; // => CORREO
	$txt_twitter_funcionario 			=	$datos['txt_twitter_funcionario']; // => TWITTER
	$txt_direccion_funcionario 			=	$datos['txt_direccion_funcionario']; // => DIRECCION
	// 
	$txt_grado_instruccion 				=	$datos['txt_grado_instruccion']; // => TECNICO
	$txt_titulo 						=	$datos['txt_titulo']; // => TSU INFORMATICA
	$txt_institucion 					=	$datos['txt_institucion']; // => IUTIRLA 

	ver_arreglo($datos['txt_discapacidad']);
	$txt_discapacidad 					=   implode(", ", $datos['txt_discapacidad']);
	ver_arreglo(count($txt_discapacidad));
	// ver_arreglo(count($txt_discapacidad));
	// ver_arreglo(implode(", ", $txt_discapacidad));
	$txt_discapacidad_otra 				=   $datos['txt_discapacidad_otra']; 
	// 
	// $tipo_personal = "ADMINISTRATIVO";
	$txt_tipo_personal 					=	$datos['txt_tipo_personal']; // => COORDINADOR DE PROGRAMACION
	$tipo_personal_funcional 			=	$datos['txt_tipo_personal_funcional']; // => COORDINADOR DE PROGRAMACION
	$txt_cargo_funcion 					=	$datos['txt_cargo_funcion']; // => COORDINADOR DE PROGRAMACION
	$txt_coordinacion_laboral 			=	$datos['txt_coordinacion_laboral']; // => INFORMATICA
	$txt_turno_trabajo 					=	$datos['txt_turno_trabajo']; // => COMPLETO
	$txt_horario_laboral 				=	$datos['txt_horario_laboral']; // => 08:00 AM - 03:00PM
	$txt_horas_doc_funcionario 			=	$datos['txt_horas_doc_funcionario']; // => HORAS DOCENTES
	$txt_horas_adm_obr_funcionario 		=	$datos['txt_horas_adm_obr_funcionario']; // => HORAS ADMINISTRATIVAS

	$txt_fecha_ingreso 					=	$datos['txt_fecha_ingreso'];
	$txt_tiempo_servicio 				=	$datos['txt_tiempo_servicio'];
	// 
	// 
	
	if ($txt_tipo_personal == "ADMINISTRATIVO") {
		$txt_horas_adm_funcionario = $txt_horas_adm_obr_funcionario;	
		$txt_horas_obr_funcionario = 0;
	}
	if ($txt_tipo_personal == "OBRERO") {
		$txt_horas_adm_funcionario = 0;	
		$txt_horas_obr_funcionario = $txt_horas_adm_obr_funcionario;
	}
// 
	$accion =	$datos['accion']; // => agregar_personal
	$token1 =	$datos['token1']; // => :D!EB28ef00;8eef¿eEd
// 
	$fecha_registro = date("Y/m/d h:i:s A");

	// VARIABLE UNICA BASADA EN TIMESTAMP PARA GENERAR UN ID UNICO PARA LA SOLICITUD
	$numero_solicitud = uniqid();

	$sql =	"INSERT INTO censo2017.registropersonal(
            	id_plantelesbase,
            	cedula, 
            	nombre_completo, 
            	apellido_completo, 
            	fecha_nac, 
            	sexo, 
            	estado_civil, 
            	telefono_celular, 
            	telefono_residencia, 
            	direccion_habitacion, 
            	red_twitter, 
            	red_email, 
            	
            	tipo_personal,
            	tipo_personal_funcional, 
            	grado_instruccion, 
            	titulo_obtenido, 
            	institucion_educativa, 

            	discapacidad,
	            discapacidad_otra,

            	horas_doc, 
            	horas_adm, 
            	horas_obr, 
            	horarios_funcional, 
            	cargo_funcional, 
            	dependencia_funcional,
            	turno_trabajo,
            	-- niveles_funcional, 
            	-- matricula_atendida, 
            	fecha_ingreso, 
            	tiempo_servicio_plantel, 
            	-- matricula_atendida_total_maternal, 
            	-- matricula_atendida_total_preescolar, 
            	-- matricula_atendida_total_primaria, 
            	-- matricula_atendida_total_media_general, 
            	-- matricula_atendida_total_media_tecnica, 
            	-- matricula_atendida_total_adulto, 
            	-- matricula_atendida_total_especial, 
            	-- matricula_atendida_total
            	fecha_registro
            	)
    VALUES ( 	
				$txt_id_plantelesbase,
    			'$txt_cedula_personal', 
            	'$txt_nombre_funcionario', 
            	'$txt_apellido_funcionario', 
            	'$txt_fechanac_funcionario', 
            	'$txt_sexo_funcionario', 
            	'$txt_edocivil_funcionario', 
            	'$txt_celular_funcionario', 
            	'$txt_telefono_funcionario', 
            	'$txt_direccion_funcionario', 
            	'$txt_twitter_funcionario', 
            	'$txt_correo_funcionario', 
            	
            	'$txt_tipo_personal',
            	'$tipo_personal_funcional', 
            	'$txt_grado_instruccion', 
            	'$txt_titulo', 
            	'$txt_institucion',

            	'$txt_discapacidad',
            	'$txt_discapacidad_otra',

            	'$txt_horas_doc_funcionario', 
            	'$txt_horas_adm_funcionario', 
            	'$txt_horas_obr_funcionario', 
            	'$txt_horario_laboral', 
            	'$txt_cargo_funcion', 
            	'$txt_coordinacion_laboral',
            	'$txt_turno_trabajo',
            	-- niveles_funcional, 
            	-- matricula_atendida, 
            	'$txt_fecha_ingreso', 
            	'$txt_tiempo_servicio', 
            	-- matricula_atendida_total_maternal, 
            	-- matricula_atendida_total_preescolar, 
            	-- matricula_atendida_total_primaria, 
            	-- matricula_atendida_total_media_general, 
            	-- matricula_atendida_total_media_tecnica, 
            	-- matricula_atendida_total_adulto, 
            	-- matricula_atendida_total_especial, 
            	-- matricula_atendida_total
            	'$fecha_registro');";
// 
// 	$sql =	"UPDATE censo2017.plantelesbase
// 	   		SET 	total_etapa_maternal		='$txt_total_etapa_maternal', 
// 	       			total_etapa_preescolar		='$txt_total_etapa_preescolar', 
// 	       			total_primaria				='$txt_total_primaria', 
// 	       			total_media_general			='$txt_total_media_general', 
// 	       			total_media_tecnica			='$txt_total_media_tecnica', 
// 	       			total_adulto				='$txt_total_adulto', 
// 	       			total_especial				='$txt_total_especial', 
// 	       			total						='$txt_total',
// 	       			fecha_registro_matricula	='$fecha_registro'
// 	 		WHERE id_plantelesbase = $txt_id_plantelesbase;";
		// ver_arreglo(test_input($sql));
		// die(); 				     
		$dato=consultar($sql,$Postgres);
		$NumeroDeFilasAfectadas = $Postgres->NumeroDeFilasAfectadas();
		if ($NumeroDeFilasAfectadas>0) {
			// echo json_encode($dato);
			$cadena = "insert@";

			
			$sql_UPDATE =	"UPDATE censo2017.plantelesbase
		   		SET 	fecha_registro_personal	='$fecha_registro'
		 		WHERE id_plantelesbase = $txt_id_plantelesbase;";
			// ver_arreglo($sql_UPDATE);
			// die(); 				     
			$dato_UPDATE=consultar($sql_UPDATE,$Postgres);
			$NumeroDeFilas_UPDATE = $Postgres->NumeroDeFilas();
			if ($NumeroDeFilas_UPDATE>0) {
				// echo json_encode($dato);
				$cadena = "insert@";
			}else{
				$cadena = "false@";
			}
			// print_r($cadena);
			


		}else{
			$cadena = "false@";
		}
		actualizar_contador_personal($txt_id_plantelesbase);
		print_r($cadena);
}
?>
<?php
	function eliminar_personal($datos) {
		// INICIA LA CONEXION CON EL SERVIDOR MYSQL
		$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
		// PARAMETROS DEL FORMULARIO
		// ver_arreglo($datos);
		$txt_id_registro			=	$datos['id_registropersonal'];
		$txt_id_plantelesbase 		=	$datos['id_plantelesbase']; // 51
		// VARIABLE UNICA BASADA EN TIMESTAMP PARA GENERAR UN ID UNICO PARA LA SOLICITUD
		$numero_solicitud = uniqid();
		// CONSULTA SQL A GENERAR
		$sql = "DELETE FROM censo2017.registropersonal WHERE id_registropersonal = $txt_id_registro";
		// EJECUTAR LA CONSULTA
		$dato=consultar($sql,$Postgres);
		$NumeroDeFilas = $Postgres->NumeroDeFilasAfectadas();
		if ($NumeroDeFilas>0) {
			// echo json_encode($dato);
			$cadena = "eliminado@";
			actualizar_contador_personal($txt_id_plantelesbase);
		}else{
			$cadena = "false@";
		}
		actualizar_contador_personal($txt_id_plantelesbase);
		print_r($cadena);
	}
?>
<?php
function agregar_matricula($datos) {
	// INICIA LA CONEXION CON EL SERVIDOR 
	$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
	// 
    $txt_id_plantelesbase 		=	$datos['txt_id_plantelesbase']; // 51
    $txt_cod_plantel 			=	$datos['txt_cod_plantel']; // OD07461902
    $txt_total_etapa_maternal 	=	$datos['txt_total_etapa_maternal']; // 3
    $txt_total_etapa_preescolar =	$datos['txt_total_etapa_preescolar']; // 2
    $txt_total_primaria 		=	$datos['txt_total_primaria']; // 1
    $txt_total_media_general 	=	$datos['txt_total_media_general']; // 5
    $txt_total_media_tecnica 	=	$datos['txt_total_media_tecnica']; // 6
    $txt_total_adulto 			=	$datos['txt_total_adulto']; // 7
    $txt_total_especial 		=	$datos['txt_total_especial']; // 8
    $txt_total = 	intval($txt_total_etapa_maternal) 	+
    				intval($txt_total_etapa_preescolar) +
				    intval($txt_total_primaria) 		+
				    intval($txt_total_media_general) 	+
				    intval($txt_total_media_tecnica) 	+
				    intval($txt_total_adulto) 			+
				    intval($txt_total_especial);

    $accion =	$datos['accion']; // agregar_matricula
    $token1 =	$datos['token1']; // AE¡5B3¡fa;67eaDD:3af
	// 
    $fecha_registro = date("Y/m/d h:i:s A");
	// 	// VARIABLE UNICA BASADA EN TIMESTAMP PARA GENERAR UN ID UNICO PARA LA SOLICITUD
	$numero_solicitud = uniqid();
	// 
	$sql =	"UPDATE censo2017.plantelesbase
	   		SET 	total_etapa_maternal		='$txt_total_etapa_maternal', 
	       			total_etapa_preescolar		='$txt_total_etapa_preescolar', 
	       			total_primaria				='$txt_total_primaria', 
	       			total_media_general			='$txt_total_media_general', 
	       			total_media_tecnica			='$txt_total_media_tecnica', 
	       			total_adulto				='$txt_total_adulto', 
	       			total_especial				='$txt_total_especial', 
	       			total						='$txt_total',
	       			fecha_registro_matricula	='$fecha_registro'
	 		WHERE id_plantelesbase = $txt_id_plantelesbase;";
		// ver_arreglo($sql);
		// die(); 				     
		$dato=consultar($sql,$Postgres);
		$NumeroDeFilas = $Postgres->NumeroDeFilas();
		if ($NumeroDeFilas>0) {
			// echo json_encode($dato);
			$cadena = "insert@";
		}else{
			$cadena = "false@";
		}
		print_r($cadena);
}
?>
<?php
function actualizar_plantel($datos) {
	// INICIA LA CONEXION CON EL SERVIDOR 
	$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
	// PARAMETROS DEL FORMULARIO
	// $txt_id_plantelesbase=	$datos['txt_id_plantelesbase']; //43
    $txt_id_plantelesbase 		=	$datos['txt_id_plantelesbase']; // 51
	$txt_cod_plantel 			=	$datos['txt_cod_plantel']; // OD07461902
	$txt_cod_estadistico		=	$datos['txt_cod_estadistico']; //190045
	$txt_codigo_nomina			=	trim($datos['txt_codigo_nomina']); //0000

	$txt_plan_nombre			=	strtoupper(trim($datos['txt_plan_nombre'])); //E+B+RIO+COLORADO
	$txt_direccion				=	strtoupper($datos['txt_direccion']); //CALLE+PRINCIPAL+CASERIO+RIO+COLORADO
	$txt_telefono_fijo			=	trim($datos['txt_telefono_fijo']); //2943325081
	$txt_telefono_otro			=	trim($datos['txt_telefono_otro']); //4147798119
	$txt_correo					=	strtoupper(trim($datos['txt_correo'])); //ZENAIDARODRIGUEZ_12%40HOTMAIL.COM
	
	$accion						=	$datos['accion']; //actualizar_plantel
	$token1 					=	$datos['token1']; // AE¡5B3¡fa;67eaDD:3af
  	
  	$fecha_registro 			= date("Y/m/d h:i:s A");
	//VARIABLE UNICA BASADA EN TIMESTAMP PARA GENERAR UN ID UNICO PARA LA SOLICITUD
	$numero_solicitud 			= uniqid();

	$sql =	"UPDATE censo2017.plantelesbase
	   		SET 	cod_nomina				=	'$txt_codigo_nomina',
	   				nombre					='$txt_plan_nombre', 
	       			direccion				='$txt_direccion', 
	       			correo					='$txt_correo', 
	       			telefono_fijo			='$txt_telefono_fijo', 
	       			telefono_otro			='$txt_telefono_otro', 
	       			fecha_registro_datos	='$fecha_registro'
	 		WHERE id_plantelesbase = $txt_id_plantelesbase;";
		// ver_arreglo($sql);
		// die(); 				     
		$dato=consultar($sql,$Postgres);
		$NumeroDeFilasAfectadas = $Postgres->NumeroDeFilasAfectadas();
		// $NumeroDeFilas = $Postgres->NumeroDeFilas();
		if ($NumeroDeFilasAfectadas>0) {
			// echo json_encode($dato);
			$cadena = "update@";
		}else{
			$cadena = "false@";
		}
		print_r($cadena);
	}
?>
<?php
function actualizar_director($datos) {
	// INICIA LA CONEXION CON EL SERVIDOR 
	$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
	// PARAMETROS DEL FORMULARIO
	// $txt_id_plantelesbase=	$datos['txt_id_plantelesbase']; //43
	// ver_arreglo($datos);
	// die();
	// Array
	// (
	//     [txt_id_nomina] => 215
	//     [txt_id_plantelesbase] => 43
	//     [txt_cod_plantel] => OD04551902
	//     [txt_dir_cedula] => 10217598
	//     [txt_dir_nombre] => ZENAYDA PILAR
	//     [txt_dir_apellido] => RODRIGUEZ DE MIRANDA
	//     [txt_direccion] => direccion
	//     [txt_fecha_nac] => 07/07/
	//     [txt_dir_telefono] => 414779811
	//     [txt_dir_celular] => 0414779811
	//     [txt_dir_email] => zenaidarodriguez_12@hotmail.com
	//     [txt_dir_twitter] => @mituiter
	//     [accion] => actualizar_director
	//     [token1] => 5!FFFdbe¿d3ba63Af5a¿
	// )

   	$txt_id_nomina 				=	$datos['txt_id_nomina']; // 51
    $txt_id_plantelesbase 		=	$datos['txt_id_plantelesbase']; // 51
	
	// // $txt_cod_plantel 			=	$datos['txt_cod_plantel']; // OD07461902
	// // $txt_cod_estadistico		=	$datos['txt_cod_estadistico']; //190045
	// // $txt_codigo_nomina			=	trim($datos['txt_codigo_nomina']); //0000

	$txt_dir_cedula				= trim($datos['txt_dir_cedula']);
	$txt_dir_nombre				= strtoupper(trim($datos['txt_dir_nombre']));
	$txt_dir_apellido			= strtoupper(trim($datos['txt_dir_apellido']));
	$txt_direccion				= strtoupper(trim($datos['txt_direccion']));
	$txt_fecha_nac				= trim($datos['txt_fecha_nac']);
	$txt_dir_telefono			= trim($datos['txt_dir_telefono']);
	$txt_dir_celular			= trim($datos['txt_dir_celular']);

	$txt_dir_email				= strtoupper(trim($datos['txt_dir_email']));
	$txt_dir_twitter			= strtoupper(trim($datos['txt_dir_twitter']));

	// $accion						=	$datos['accion']; //actualizar_plantel
	// $token1 					=	$datos['token1']; // AE¡5B3¡fa;67eaDD:3af
  	
 	$fecha_registro 			= date("Y/m/d h:i:s A");
	// //VARIABLE UNICA BASADA EN TIMESTAMP PARA GENERAR UN ID UNICO PARA LA SOLICITUD
	// $numero_solicitud 			= uniqid();

	$sql =	"UPDATE censo2017.plantelesbase
	   		SET 	
					dir_cedula 			    ='$txt_dir_cedula',	
	   				dir_nombre				='$txt_dir_nombre',
	   				dir_apellido			='$txt_dir_apellido', 
	       			dir_direccion			='$txt_direccion', 
	       			dir_fechanac			='$txt_fecha_nac', 
	       			dir_telefono			='$txt_dir_telefono', 
	       			dir_celular				='$txt_dir_celular',
	       			dir_email				='$txt_dir_email',
	       			dir_twitter				='$txt_dir_twitter', 
	       			fecha_registro_director	='$fecha_registro'
	 		WHERE  -- dir_cedula = '$txt_dir_cedula';
	 				id_plantelesbase = $txt_id_plantelesbase";
	 		
		// ver_arreglo($sql);
		// die(); 				     
		$dato=consultar($sql,$Postgres);
		$NumeroDeFilasAfectadas = $Postgres->NumeroDeFilasAfectadas();
		if ($NumeroDeFilasAfectadas>0) {
			$cadena = "update@";
		}else{
			$cadena = "false@";
		}
		print_r($cadena);
}
?>
<?php
function actualizar_contador_personal($id_plantelesbase) {
	// INICIA LA CONEXION CON EL SERVIDOR 
	$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
	// PARAMETROS DEL FORMULARIO
	$accion						=	$datos['accion']; //actualizar_plantel
	$token1 					=	$datos['token1']; // AE¡5B3¡fa;67eaDD:3af
  	$fecha_registro 			= date("Y/m/d h:i:s A");
	//VARIABLE UNICA BASADA EN TIMESTAMP PARA GENERAR UN ID UNICO PARA LA SOLICITUD
	$numero_solicitud 			= uniqid();
	// $sql ="	SELECT 
	// 			id_plantelesbase,
	// 			COUNT(tipo_personal) filter (where tipo_personal = 'ADMINISTRATIVO') as cant_admin,
	// 			COUNT(tipo_personal) filter (where tipo_personal = 'DOCENTE') as cant_docente,
	// 			COUNT(tipo_personal) filter (where tipo_personal = 'OBRERO') as cant_obrero
	// 	     FROM censo2017.registropersonal
	// 	     WHERE id_plantelesbase = $id_plantelesbase
	// 	     GROUP BY id_plantelesbase;";
    

    $sql = " SELECT id_plantelesbase, 
			(SELECT COUNT(tipo_personal) FROM censo2017.registropersonal  where tipo_personal = 'ADMINISTRATIVO' AND id_plantelesbase = $id_plantelesbase  ) as cant_admin,
			(SELECT COUNT(tipo_personal) FROM censo2017.registropersonal  where tipo_personal = 'DOCENTE' AND id_plantelesbase = $id_plantelesbase  ) as cant_docente, 
			(SELECT COUNT(tipo_personal) FROM censo2017.registropersonal  where tipo_personal = 'OBRERO' AND id_plantelesbase = $id_plantelesbase  ) as cant_obrero, 
			(SELECT COUNT(tipo_personal) FROM censo2017.registropersonal  where id_plantelesbase = $id_plantelesbase  ) as cant_total 
			FROM censo2017.registropersonal 
			WHERE id_plantelesbase = $id_plantelesbase 
			GROUP BY id_plantelesbase";
    // ver_arreglo($sql);
	$dato=consultar($sql,$Postgres);
	// ver_arreglo($dato);
	// die();
	$NumeroDeFilas = $Postgres->NumeroDeFilas();
	if ($NumeroDeFilas>0) {
		// ver_arreglo($dato); 
		// Array
		// (
		//     [0] => Array
		//         (
		//             [id_plantelesbase] => 1150
		//             [cant_admin] => 1
		//             [cant_docente] => 0
		//             [cant_obrero] => 1
		//         )
		// )
		$total_adminis = $dato[0]['cant_admin'];
		$total_docente = $dato[0]['cant_docente'];
		$total_obrero = $dato[0]['cant_obrero'];  
	}else{
		$total_adminis = 0;
		$total_docente = 0;
		$total_obrero = 0;
	}
	// 
	$total_personal = $total_adminis + $total_docente + $total_obrero;  
	// 
	$sql_UPDATE =	"UPDATE censo2017.plantelesbase
			   		SET 	total_docente			='$total_docente',
			   				total_administrativo	='$total_adminis', 
			       			total_obrero			='$total_obrero' ";
	// 
	if ($total_personal==0) {
		$sql_UPDATE .=" , fecha_registro_personal = NULL ";
	}
	$sql_UPDATE .=" WHERE id_plantelesbase = $id_plantelesbase;";
	// 
	$dato_UPDATE=consultar($sql_UPDATE,$Postgres);
	$NumeroDeFilasAfectadas_UPDATE = $Postgres->NumeroDeFilasAfectadas();
	// $NumeroDeFilas = $Postgres->NumeroDeFilas();
	if ($NumeroDeFilasAfectadas_UPDATE>0) {
		// echo json_encode($dato);
		$cadena = "update@";
	}else{
		$cadena = "false@";
	}
	$cadena = "false@";
	// print_r($cadena);
}
?>
<?php
function actualizar_contador_personal_completo($cedula) {
	// INICIA LA CONEXION CON EL SERVIDOR 
	$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
	
	// $cedula 			= $datos['cedula'];
	$sql_general = "SELECT id_plantelesbase, nombre FROM censo2017.plantelesbase WHERE dir_cedula = '$cedula' order by id_plantelesbase;";
	// ver_arreglo($sql_general);
	$dato_general=consultar($sql_general,$Postgres);
	// ver_arreglo($dato_general);
	foreach ($dato_general as $key => $value) {
		# code...
		// Array
		// (
		//     [id_plantelesbase] => 1139
		//     [nombre] => SECRETARÍA EJECUTIVA
		// )
		$id_plantelesbase = $value['id_plantelesbase'];
		actualizar_contador_personal($id_plantelesbase);
	}		
}
?>
<?php
function actualizar_contador_personal_completo2() {
	// INICIA LA CONEXION CON EL SERVIDOR 
	$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
	
	// $cedula 			= $datos['cedula'];
	$sql_general = "SELECT id_plantelesbase, nombre FROM censo2017.plantelesbase order by id_plantelesbase;";
	$dato_general=consultar($sql_general,$Postgres);
	// ver_arreglo($dato_general);
	foreach ($dato_general as $key => $value) {
		# code...
		// Array
		// (
		//     [id_plantelesbase] => 1139
		//     [nombre] => SECRETARÍA EJECUTIVA
		// )
		$id_plantelesbase = $value['id_plantelesbase'];
		actualizar_contador_personal($id_plantelesbase);
	}		
}?>
<?php
function contador_planteles_municipio() {
	// INICIA LA CONEXION CON EL SERVIDOR 
	$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
	
	// $cedula 			= $datos['cedula'];
	$sql_general = "SELECT DISTINCT (municipio), COUNT(cod_plantel) AS cant_planteles
						FROM censo2017.plantelesbase
						GROUP BY municipio
						ORDER BY municipio;";
	$dato_general=consultar($sql_general,$Postgres);
	ver_arreglo($dato_general);
}?>
<?php
	function consultar_planteles_municipio($datos) {
		$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
		//
		// Array
		// (
		//     [accion] => consultar_registros
		//     [cedula] => 10217598
		//     [municipio] => ANDRES MATA
		//     [nivel_usuario] => DIRECTOR
		// )
		// 
		//
		// $cedula 			= test_input($datos['cedula']);
		$municipio 			= $datos['txt_municipio'];
		$dependencia 		= $datos['txt_dependencia'];
		// ver_arreglo($municipio);
		// ver_arreglo($dependencia);
		$sql = "";
		$sql.="SELECT 
				-- NOM.cedula as login_cedula,
				-- RIGHT(TRIM(NOM.cod_dependencia),6) as login_coddep,
				-- RIGHT(TRIM(NOM.cuenta_bancaria),6) as login_ctabanco,
				-- NOM.id_nomina,
				-- NOM.cedula, 
				-- TRIM(NOM.nombres_apellidos) AS nombres_apellidos, 
				-- TRIM(NOM.cod_cargo) AS cod_cargo,
				-- TRIM(NOM.cargo) AS cargo,
				 -- 
				-- NOM.cod_dependencia, 
				-- NOM.cuenta_bancaria, 
				'---' AS SEP1,
				PB.id_plantelesbase, 
				TRIM(PB.cod_plantel) AS cod_plantel, 
				TRIM(PB.cod_estadistico) AS cod_estadistico,				
				-- TRIM(PB.cod_nomina) AS cod_nomina, 
				-- 
				-- TRIM(PB.estado) AS estado ,
				TRIM(PB.municipio) AS municipio, 
				-- TRIM(PB.parroquia) as parroquia,
				-- 
				UPPER(TRIM(PB.nombre)) AS nombre, 
				-- TRIM(PB.denominacion) AS denominacion,
				-- 
				-- UPPER(TRIM(PB.zona_educativa)) AS zona_educativa ,
				UPPER(TRIM(PB.tipo_dependencia)) AS tipo_dependencia ,
				-- UPPER(TRIM(PB.estatus)) AS estatus ,
				-- TRIM(PB.fundacion) AS fundacion ,
				-- 
				-- UPPER(TRIM(PB.direccion)) AS direccion ,
				-- UPPER(TRIM(PB.correo)) AS correo ,
				-- TRIM(PB.telefono_fijo) AS telefono_fijo ,
				-- TRIM(PB.telefono_otro) AS telefono_otro ,
				-- UPPER(TRIM(PB.zona_ubicacion)) AS zona_ubicacion ,
				-- UPPER(TRIM(PB.clase_plantel)) AS clase_plantel ,
				-- UPPER(TRIM(PB.categoria)) AS categoria ,
				-- UPPER(TRIM(PB.condicion_estudio)) AS condicion_estudio ,
				-- UPPER(TRIM(PB.tipo_matricula)) AS tipo_matricula ,
				-- UPPER(TRIM(PB.turno)) AS turno ,
				-- UPPER(TRIM(PB.modalidad)) AS modalidad ,
				-- 
				UPPER(TRIM(PB.dir_cedula)) AS dir_cedula,
				UPPER(TRIM(PB.dir_nombre)) AS dir_nombre,
  				UPPER(TRIM(PB.dir_apellido)) AS dir_apellido,
-- 				UPPER(TRIM(PB.dir_direccion)) AS dir_direccion,
-- 				UPPER(TRIM(PB.dir_fechanac)) AS dir_fechanac,
-- 				-- 
-- 				TRIM(PB.dir_telefono) as dir_telefono,
-- 				TRIM(PB.dir_celular) as dir_celular,
-- 				TRIM(PB.dir_email) as dir_email,
-- 				TRIM(PB.dir_twitter) as dir_twitter,
-- -- 
-- 				TRIM(PB.total_etapa_maternal) as total_etapa_maternal,
-- 				TRIM(PB.total_etapa_preescolar) as total_etapa_preescolar,
-- 				TRIM(PB.total_primaria) as total_primaria,
-- 				TRIM(PB.total_media_general) as total_media_general,
-- 				TRIM(PB.total_media_tecnica) as total_media_tecnica,
-- 				TRIM(PB.total_adulto) as total_adulto,
-- 				TRIM(PB.total_especial) as total_especial,
-- 				TRIM(PB.total) as total,
-- -- 
-- 				TRIM(PB.total_docente) as total_docente,
-- 				TRIM(PB.total_administrativo) as total_administrativo,
-- 				TRIM(PB.total_obrero) as total_obrero,
-- -- 
-- 				fecha_registro_matricula,
-- 				fecha_registro_datos,
-- 				fecha_registro_personal,
-- 				fecha_registro_director,
				nivel_estatus,
-- 
				'---' as cierre 
				FROM censo2017.plantelesbase AS PB 
				-- INNER JOIN censo2017.nominaactual AS NOM ON (PB.dir_cedula = NOM.cedula)
				-- WHERE NOM.cedula ='$cedula'
				WHERE ( PB.tipo_dependencia <> 'PLANTA' AND PB.tipo_dependencia <> 'ENTE ADSCRITO' ";
		// if ($municipio!=null || $dependencia!=null) {
		// }
		if ($municipio!=null ) {
			$sql.="AND PB.municipio = '$municipio' ";
		}
		if ($dependencia!=null) {
			$sql.="AND PB.tipo_dependencia = '$dependencia' ";
		}
		$sql.=" ) "; 
		// $sql.="ORDER BY PB.municipio, PB.id_plantelesbase ";
		$sql.="ORDER BY PB.municipio, PB.cod_plantel, PB.dir_celular, PB.id_plantelesbase  ";
		// ver_arreglo($sql);
		$dato=consultar($sql,$Postgres);
 		// ver_arreglo($dato);
// 		Array
// (
//     [0] => Array
//         (
//             [id_nomina] => 215
//             [cedula] => 10217598
//             [nombres_apellidos] => ZENAYDA P RODRIGUEZ G
//             [cod_cargo] => 1124DI
//             [cargo] => DOC. IV /AULA
//             [cod_dependencia] => 006970354
//             [cuenta_bancaria] => 01020513110000278586
//             [sep1] => ---
//             [id_plantelesbase] => 43
//             [cod_plantel] => OD04551902
//             [cod_estadistico] => 190045
//             [nombre] => E B RIO COLORADO
//             [municipio] => ANDRES MATA
//             [parroquia] => SAN JOSE DE AEROCUAR
//             [cierre] => ---
//         )
		$NumeroDeFilas = $Postgres->NumeroDeFilas();
		if ($NumeroDeFilas>0) {
			echo json_encode($dato);
		}else{
			echo 'false';
		}
	}
?><?php
function activar_plantel($datos) {
	// INICIA LA CONEXION CON EL SERVIDOR 
	$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
	// PARAMETROS DEL FORMULARIO
    $txt_id_plantelesbase 		=	$datos['id_plantelesbase']; // 51
    $nivel_estatus 			    =	$datos['nivel_estatus']; // 51
	$accion						=	$datos['accion']; //actualizar_plantel
	$token1 					=	$datos['token1']; // AE¡5B3¡fa;67eaDD:3af
  	$fecha_registro 			= date("Y/m/d h:i:s A");
	//VARIABLE UNICA BASADA EN TIMESTAMP PARA GENERAR UN ID UNICO PARA LA SOLICITUD
	$numero_solicitud 			= uniqid();
	$sql =	"UPDATE censo2017.plantelesbase
	   		SET 	nivel_estatus = '$nivel_estatus' 
	       			--  ,fecha_registro_datos	='$fecha_registro'
	 		WHERE id_plantelesbase = $txt_id_plantelesbase;";
		// ver_arreglo($sql);
		// die(); 				     
		$dato=consultar($sql,$Postgres);
		$NumeroDeFilasAfectadas = $Postgres->NumeroDeFilasAfectadas();
		// $NumeroDeFilas = $Postgres->NumeroDeFilas();
		if ($NumeroDeFilasAfectadas>0) {
			// echo json_encode($dato);
			$cadena = "update@";
		}else{
			$cadena = "false@";
		}
		print_r($cadena);
	}
?>
