<?php 
//******************************************************************************
//******************************************************************************
//******************************************************************************
// FUNCIONES PARA EL MANEJO DE LA BASE DE DATOS, CONSULTAS, REGISTROS
//******************************************************************************
//******************************************************************************
//******************************************************************************
//
//******************************************************************************
//FUNCION PARA CONECTAR A LA BASE DE DATOS Y VERIFICAR LA EXISTENCIA DEL USUARIO
function conexiones($usuario, $clave) {	
	$conexion = conectar();
	//sentencia sql para consultar el nombre del usuario campo - campo_txt
	$sql = "SELECT * FROM usuario WHERE ((password LIKE '$clave') and (indicador LIKE '$usuario'))";
	//echo $sql;
	//ejecucion de la sentencia anterior	
	$resultado = consultar($sql, $conexion);
	//echo numresult($resultado);
	//die();
	//si existe inicia una sesion y guarda el nombre del usuario
	if (numresult($resultado)!=0){
		//inicio de sesion
		session_start();
		$datos = dato_consulta($resultado);
		//ver_arreglo($datos);
		//die();
		//configurar un elemento usuario dentro del arreglo global $_SESSION		
		//cedula
		//nombre
		//apellido
		//telefono
		//correoe
		//cod_cargo
		//cod_roles
		global $codigo_global;
		$_SESSION['usuario']=$usuario;
		$_SESSION['clave']=$clave;
		$_SESSION['tip_usuario']=$datos['cod_roles'];
		//$_SESSION['cod_usuario']= base64_encode( $datos['cod_roles']."#@".$datos['cod_usuario']."#@".$datos['cedula']);
		$_SESSION['cod_usuario']= $datos['cod_roles']."#@".$datos['cod_usuario']."#@".$datos['cedula'];
		$codigo_global = $datos['nombre']." ".$datos['apellido'];
		$_SESSION['nom_usuario']=$datos['nombre'];
		$_SESSION['ape_usuario']=$datos['apellido'];
		$_SESSION['tel_usuario']=$datos['telefono'];
		$_SESSION['cor_usuario']=$datos['correoe'];
		$_SESSION['car_usuario']=$datos['cod_cargo'];
		$_SESSION['rol_usuario']=$datos['cod_roles'];
		$_SESSION['cod_usuario_log']=$datos['cod_usuario'];
		//		
		//$_SESSION['fot_usuario']=$datos['foto_usuario'];
		//retornar verdadero
		return true;
	} else { 
		//retornar falso no existe";
		return false;
	}
}
//funcion para verificar que dentro del arreglo global $_SESSION existe el nombre del usuario
function verificar_usuario(){
	//continuar una sesion iniciada
	session_start();
	//echo "//comprobar la existencia del usuario";
	if ($_SESSION['usuario']){
		return true;
	}
}
/*
 * PERMITE CONECTARSE A UNA BD MYSQL
 */
function conectar() {
	//echo "paso1<br>";
	//if ($vDBHOST!='') {
	//	echo "paso1.2<br>";
	//	echo $vDB_SERVER. "<br>";
	//	echo $vDB_NAME. "<br>";
	//	echo $vDB_USER. "<br>";
	//	echo $vDB_PASSWORD. "<br>";
	//	echo $vDB_DRIVER. "<br>";
	//	$connx = mysql_connect($vDBHOST,$vDBUSER,$vDBPASS);
	//	mysql_select_db($vDBNAME,$connx);		
	//}else{
		//echo "paso1.1<br>";
		//echo DB_SERVER. "<br>";
		//echo DB_NAME. "<br>";
		//echo DB_USER. "<br>";
		//echo DB_PASSWORD. "<br>";
		//echo DB_DRIVER. "<br>";
		$connx = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD);
		mysql_select_db(DB_NAME,$connx);
	//}
	if (!$connx)
		$connx="false";		
	return $connx;
}
function conectar1() {
	echo "paso1 conectar1<br>";
	echo DB_SERVER . "<br>";
	echo DB_NAME . "<br>";
	echo DB_USER . "<br>";
	echo DB_PASSWORD . "<br>";
	echo DB_DRIVER . "<br>";
	die();
	$connx = mysql_connect(DB_HOST,DB_USER,DB_PASS);
	mysql_select_db(DBNAME,$connx);
	if (!$connx)
		$connx="false";		
	return $connx;
}
function conectar2() {
	//echo "paso2<br>";
	//echo "salida de conectar2<br>";
	//echo "DB_SERVER: ".DB_SERVER. "<br>";
	//echo "DB_NAME: ".DB_NAME. "<br>";
	//echo "DB_USER: ".DB_USER. "<br>";
	//echo "DB_PASSWORD: ".DB_PASSWORD. "<br>";
	//echo "DB_DRIVER: ".DB_DRIVER. "<br>";
	$connx = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
	//mysqli_connect("127.0.0.1", "mi_usuario", "mi_contraseña", "mi_bd");
	//ver_arreglo($connx);
	//mysql_select_db(DBNAME,$connx);
	//if (!$connx)
		//$connx="false";		
	return $connx;
}
/*
 * PERMITE EJECUTAR UNA CONSULTA SQL
 */
function consultar($sql, $conexion){
	$resultado = mysql_query ($sql, $conexion) or die(mysql_error());
	return $resultado;
}
/*
 * RETORNA NUMERO DE FILAS OBTENIDAS DE UN RESULTADO
 */
function numresult($resultado) {
	$number = mysql_num_rows ($resultado);
	return $number;
}
/*
* RETORNA UNA FILA CON EL ARRAY DE DATOS DE UNA CONSULTA MYSQL
* mysql_fetch_array($result)
*/
function dato_consulta($resultado){
	//echo "dato_consulta";
	$row = mysql_fetch_array($resultado);
	return $row;
}
function datos_consultas_array2($resultado){
	//echo "dato_consulta";
	//$row = mysql_fetch_array($resultado);
	//return $row;
	$dato = array();
	$i=0;
	while ($fila = mysql_fetch_array($resultado)) { 
		$dato[$i] = $fila ;
		$i++;
	}	
	return $dato;
}
/*
* RETORNA UNA FILA CON EL ARRAY DE DATOS ASOCIATIVO DE UNA CONSULTA MYSQL
* mysql_fetch_assoc($result)
*/
function dato_consulta_assoc($result){
	$dato = mysql_fetch_assoc($result);
	return $dato;
}
/*
* RETORNA UN ARRAY ASOCIATIVO CON TODOS LOS DATOS DE UNA CONSULTA MYSQL
*/
function datos_consultas_array($result){
	$dato = array();
	while ($fila = mysql_fetch_assoc($result)) { 
		$dato[] = $fila ; 
	}	
	return $dato;
}
function datos_consultas_array_json($result){
	$dato = array();
	while ($fila = mysql_fetch_assoc($result)) { 
		$dato[] = $fila ; 
	}	
	return json_encode($dato);
}
/*
* RETORNA UN ARRAY NUMERICO CON TODOS LOS DATOS DE UNA CONSULTA MYSQL
*/
function datos_consultas_row($result){
	$dato = "";
	while ($fila =mysql_fetch_row($result)) { 
		$dato[] = $fila ; 
	}	
	return $dato;
}
// LIBERA UN RESULTADO
function liberar($result) {
	if ($result) {
		mysql_free_result($result);
	}
}
function disconnectDB($conexion){
    $close = mysqli_close($conexion);
    if($close){
        //echo 'La desconexión de la base de datos se ha hecho satisfactoriamente';
    }else{
        echo 'Ha sucedido un error inesperado en la desconexión de la base de datos';
    }   
    return $close;
}

/*
 * Ultimo valor de un registro
 */
function ultimo_registro($tabla){
	$conexion = conectar();
	$sql= "SELECT * FROM $tabla ORDER BY id DESC LIMIT 1";
	$resultado = @consultar($sql, $conexion);
	$dato = dato_consulta($resultado);	
	return $dato;  
}
function ultimo_numero_solicitud($numero_solicitud){
	$conexion = conectar();
	$sql= "SELECT * FROM `solicitudes` WHERE `numero_solicitud` LIKE '$numero_solicitud'";
	$resultado = @consultar($sql, $conexion);
	$dato = datos_consultas_array($resultado);	
	return $dato;  
}
/*
 * Contar cantidad de registros de una tabla segun un criterio
 * Parametros:
 *  - Tabla
 *  - Columna
 *  - Valor
 */
function contador_registros($tabla,$columna="",$valor=""){
	$conexion = conectar();
	$sql= "SELECT * FROM $tabla WHERE $columna = $valor";	
	$resultado = @consultar($sql, $conexion);
	$dato = numresult($resultado);
	return $dato;  
}
/*
 * Permite registrar un LOG de datos en cada accion
 * @param {String} $datos Cadena de texto compuesta
 * @example $data="cod_usuario#@#proceso#@#datos#@#modulo"
 */
function registrar_log($datos){
	$data = split("#@#",$datos);
	$cod_usuario = $data[0];
	$proceso = $data[1];
	$datos = $data[2];
	$modulo = $data[3];
	$sql = "INSERT INTO registro ".
			"(cod_usuario, proceso, datos, modulo) ".
			"VALUES ".
			"('$cod_usuario', '$proceso', '$datos', '$modulo')";
	$conexion = conectar();
	$resultado = @consultar($sql, $conexion);
	$ultimoid = mysql_insert_id($conexion);
	corregir_log($ultimoid);
}

function corregir_log($ultimoid){
	$conexion = conectar();
	//$sql = "UPDATE registro SET datos = REPLACE(datos, '@', ' ') WHERE cod_registro = '$ultimoid' ";
	//$sql = "UPDATE registro SET datos = REPLACE(datos, '@', ' '), proceso = REPLACE(proceso, '_', ' ') WHERE cod_registro = '$ultimoid' ";
	$sql = "UPDATE registro "
			."SET datos = REPLACE(datos, '@', ' '), "
			."proceso = REPLACE(proceso, '_', ' '), "
			."modulo = REPLACE(modulo, 'MODULO: ', '') "
			."WHERE cod_registro = '$ultimoid' ";
	$resultado = @consultar($sql, $conexion);
}
?>