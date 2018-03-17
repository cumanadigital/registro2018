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
	//ver_arreglo($datos);
	//die();
	$fecha_registro = date("Y/m/d h:i:s");
	$accion					=	$datos['accion']; //	agregar_permisos"
	switch ($accion){
		case 'consultar_funcionarios':
			consultar_funcionarios($datos);
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
		// case 'consultar_funcionarios_activo':
		// 	consultar_funcionarios_activo($datos);
		// break;
	}
?>
<?php
	function consultar_funcionarios($datos) {
		// echo "consultar_funcionarios -----------";
		// die();
		// ver_arreglo($datos);


		$Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
		//
		$nivel_usuario =  $datos['sesion_nivel_usuario'];
		$cedula	=	$_POST['cedula']; // 1
		// sesion_id_dependencia:"sWqrPUl1-3lDq-6547-uTDf-TyfobRmSomkT"
		$id_departamento = $datos['sesion_id_dependencia'];
		$array_id_departamento = explode(",",$datos['sesion_id_dependencia']);
		// ver_arreglo($id_departamento);
		// ver_arreglo($array_id_departamento);
		$cadena_id_dependencias = "";
		for ($i=0; $i < count($array_id_departamento) ; $i++) { 
			# code...
			 if($i<count($array_id_departamento)-1)
				$cadena_id_dependencias.="'".$array_id_departamento[$i]."',";
			 else 
				$cadena_id_dependencias.="'".$array_id_departamento[$i]."'";
		}
		
		$sql= "SELECT  
					ed.empleado_dep_uid,
					p.persona_uid,
					p.persona_cedula,
					trim(COALESCE(p.persona_apellidos ,'') ||' '|| coalesce(p.persona_nombres,'')) as apellidos_Nombres  ,

					COALESCE(plan.pl_nombre,fd.dependencia_nombre,d.dependencia_nombre) as DEPENDENCIA_LABORA,

					COALESCE(fc.funcion_cargo_descripcion,c.cargo_denominacion) as CARGO_LABORA,
					car.categoria_cargo_descripcion,
					c.cargo_codigo,
					c.cargo_denominacion,
					--ed.empleado_dep_hdocentes,
					--ed.empleado_dep_hadministrativas,
					
					COALESCE(ed.empleado_dep_hdocentes ,0) ||'/'|| coalesce(ed.empleado_dep_hadministrativas,0) as horas_laboradas ,
					e.empleado_fechaingreso,

					UPPER(m.municipio_nombre) AS municipio_nombre

					FROM comun.persona as p
					LEFT JOIN comun.empleado as e ON(e.empleado_persona = p.persona_cedula)
					LEFT JOIN comun.empleado_dependencia as ed ON(ed.empleado_dep_empleado LIKE e.empleado_uid)
					LEFT JOIN comun.dependencia as d ON(d.dependencia_uid = ed.empleado_dep_dependencia)
					left JOIN comun.dependencia as fd ON(fd.dependencia_uid = empleado_dep_dependencia_lab)
					LEFT JOIN comun.planteles   as plan ON(plan.pl_estadistico = empleado_dep_dependencia_lab)
					LEFT JOIN comun.cargo as c ON(c.cargo_codigo = ed.empleado_dep_codigocargo)
					--LEFT JOIN comun.parroquia as pa ON(pa.parroquia_uid LIKE d.dependencia_parroquia)
					LEFT JOIN comun.municipio as m ON(m.municipio_codigo = d.dependencia_municipio)
					LEFT JOIN comun.estado as et ON(et.estado_codigo = m.municipio_estado)
					LEFT JOIN comun.categoria_cargo as car ON(car.categoria_cargo_uid = c.cargo_categoria)
					LEFT JOIN comun.funcion_cargo  as fc ON(fc.funcion_cargo_uid = ed.empleado_dep_cargofuncional)
					where p.persona_cedula = $cedula ";

		// if ($nivel_usuario=="secretaria" &&  $persona_cedula == ""){
		if ($nivel_usuario=="jefeinmediato" || $nivel_usuario=="director" ){
			$sql.="	and 
					-- d.dependencia_uid      IN ($cadena_id_dependencias)
					-- OR plan.pl_estadistico IN ($cadena_id_dependencias)
					ed.empleado_dep_dependencia_lab  IN ($cadena_id_dependencias) ";
		}

			

			$sql.="	order by p.persona_cedula, ed.empleado_dep_serial DESC  ";
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