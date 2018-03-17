<?php //VARIABLES GENERALES PARA EL SISTEMA
//echo "Desde funciones3.0: ".getcwd() . "\n";
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
//echo "funciones php incluidas<br>";
function pruebas1(){
	//echo "<img style="border: 0px solid ; width: 48px; height: 48px;" alt="estudiantes" title="Estudiantes" src="images/clientes.png" />";
	echo "salida de pruebas1<br>";
}
function pruebas2($paramentro1){
	//echo "<img style="border: 0px solid ; width: 48px; height: 48px;" alt="estudiantes" title="Estudiantes" src="images/clientes.png" />";
	echo "salida de pruebas2 con $paramentro1<br>";
	echo "DB_SERVER: ".DB_SERVER. "<br>";
	echo "DB_NAME: ".DB_NAME. "<br>";
	echo "DB_USER: ".DB_USER. "<br>";
	echo "DB_PASSWORD: ".DB_PASSWORD. "<br>";
	echo "DB_DRIVER: ".DB_DRIVER. "<br>";
}
//echo DB_SERVER. "<br>";
//echo DB_NAME. "<br>";
//echo DB_USER. "<br>";
//echo DB_PASSWORD. "<br>";
//echo DB_DRIVER. "<br>";
//******************************************************************************
//******************************************************************************
//******************************************************************************
//FUNCIONES PARA TRATAMIENTO DE CARACTERES
//******************************************************************************
//******************************************************************************
//******************************************************************************
//
//******************************************************************************
/*
 * Recorta la longitud de una cadena de texto
 */
function limitarPalabras($cadena, $longitud, $elipsis = ""){		
	if (strlen($cadena) > $longitud)
		$cadena = substr($cadena,0,$longitud).$elipsis;
	return $cadena;
}
/*
 * Permite generar un valor (password) aleatorio
 */
function PwdAleatorio($length=10,$uc=TRUE,$n=TRUE,$sc=FALSE){   
    $source = 'abcdefghijklmnopqrstuvwxyz';   
    if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';   
    if($n==1) $source .= '1234567890';   
    if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';   
    if($length>0){   
        $rstr = "";   
        $source = str_split($source,1);  
        for($i=1; $i<=$length; $i++){  
            mt_srand((double)microtime() * 1000000);  
            $num = mt_rand(1,(count($source)-1));  
            $rstr .= $source[$num-1];  
        }  
    }  
    return $rstr;  
}
/**
* stripAccents()
* @description Esta función remplaza todos los caracteres especiales de un texto dado por su equivalente
* @author      Esteban Novo
* @link        http://www.notasdelprogramador.com/2011/01/13/php-funcion-para-quitar-acentos-y-caracteres-especiales/
* @access      public
* @copyright   Todos los Derechos Reservados
* @param       string $String
* @return      Retorna el nuevo String sin caracteres especiales
*/
function Acentos($String)
{
    $String = ereg_replace("[äáàâãª]","a",$String);
    $String = ereg_replace("[ÁÀÂÃÄ]","A",$String);
    $String = ereg_replace("[ÍÌÎÏ]","I",$String);
    $String = ereg_replace("[íìîï]","i",$String);
    $String = ereg_replace("[éèêë]","e",$String);
    $String = ereg_replace("[ÉÈÊË]","E",$String);
    $String = ereg_replace("[óòôõöº]","o",$String);
    $String = ereg_replace("[ÓÒÔÕÖ]","O",$String);
    $String = ereg_replace("[úùûü]","u",$String);
    $String = ereg_replace("[ÚÙÛÜ]","U",$String);
    $String = ereg_replace("[^´`¨~]","",$String);
    $String = str_replace("ç","c",$String);
    $String = str_replace("Ç","C",$String);
    $String = str_replace("ñ","n",$String);
    $String = str_replace("Ñ","N",$String);
    $String = str_replace("Ý","Y",$String);
    $String = str_replace("ý","y",$String);
    return $String;
}
//
//******************************************************************************
//FUNCIONES PARA TRATAMIENTO DE VALORES NUMERICOS
//******************************************************************************
/*
 * Redondea un valor a dos decimales
 */
function redondear_dos_decimal($valor) {
    $float_redondeado=round($valor * 100) / 100;
    return $float_redondeado;
}
//******************************************************************************
//******************************************************************************
//******************************************************************************
//FUNCIONES PARA MANEJO DE FECHAS / HORAS
//******************************************************************************
//******************************************************************************
//******************************************************************************
//
function cambiar_fecha_hora($Fecha_Mysql) {
    $Fecha = @strtotime($Fecha_Mysql);
    $FECHA=strftime("%d/%m/%Y %I:%M %p",$Fecha);
    return $FECHA;
}
/*
 *
 */
function cambiar_fecha($Fecha_Mysql) {
    $Fecha1 = @strtotime($Fecha_Mysql);
    $FECHA=strftime("%d/%m/%Y",$Fecha1);
    return $FECHA;
}
/*
 * Convierte fecha de mysql a normal
 */
function Fecha_To_Normal($fecha){
    ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha);
    $lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1];
    return $lafecha;
}
/*
 * Convierte fecha de normal a mysql
 */
function Fecha_To_mysql($fecha){
	ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha);
    $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
    return $lafecha;
}
/*
 * Invierte una fecha en cualquier Formato
 *  ->  DD-MM-YYYY a YYYY-MM-DD  /   DD/MM/YYYY a YYYY/MM/DD
 *  ->  YYYY-MM-DD A DD-MM-YYYY  /   YYYY/MM/DD A DD/MM/YYYY
 *  Le podemos pasar el elemento separador:
 *  Guion  "-"
 *  Barra  "/"
 *  invertDate($date,$elm='-')
 *  invertDate($date,$elm='/')
 */
function invertDate($date,$elm='-') { 
    if($date == '') return NULL;
    $date2 = explode($elm, $date);
    return $date2[2].$elm.$date2[1].$elm.$date2[0];
}
/*
 * Retorna Fecha/Hora Actual 2013/04/27 10:20:17 pm
 */
function fecha_hora_actual() {
	return date("Y/m/d h:i:s a");
}
/*
 * Retorna la Hora Actual 10:20:17 pm
 */
function hora_actual(){
	return date("h:i:s a");
}
/*
 * Retorna Fecha Actual 2013/04/27  --> YYYY/MM/DD
 */
function fecha_actual() {
	return date("Y/m/d");
}
/*
 * Retorna el mes actual
 * En formato Texto Español (Enero,Febrero,Marzo....)
 */
function mes_actual(){
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	return $meses[date('n')-1];
}
/*
 * Retorna el dia actual de la Semana
 * En formato Texto Español (Domingo,Lunes,Martes,Miercoles,Jueves,Viernes,Sábado)
 */
function dia_actual(){
	$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	return $dias[date('w')];
}
function dia_actual_num(){
	return date('d');
}
/*
 * Retorna el dia actual numerico
 */
function fecha_actual_texto(){
	$fechaactual = getdate();
	$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	$fecha = $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
	return $fecha;
}
//******************************************************************************************
//**Funciones para calcular Semanas. Num - Inicio - Fin
//******************************************************************************************
/* Obtiene el Numero de Semana Actual
 * @example get_week_now()
 * @return  {Integer} 1-53
 */
function get_week_now(){
    $fecha = new DateTime();
    $semana = $fecha->format('W'); // semana del año
    return $semana;
}
/* Obtiene N° de Año y la Semana de una fecha dada YYYY-mm-dd
 * @parameter {String} 2013-05-15
 * @example weekyear($date)
 * @return {String} 2013W20 
 */
					//function weekyear($date)
					//{
					//	list($year, $month, $day) = explode('-', $date);
					//	return strftime("%YW%V", mktime(0,0,0,$month,$day,$year));
					//}
function weekyear($date)
{
    list($year, $month, $day) = explode('-', $date);
    //ESTA FUNCIONA EN LINUX
	if(PHP_OS=="Linux"){
		return strftime("%YW%V", mktime(0,0,0,$month,$day,$year));
	}
	// ESTA FUNCIONA ES EN WINDOWS
	if(PHP_OS=="WINNT"){
		$fecha = get_year($date)."W". get_week($date);
		return $fecha;
	}
}		
/* Obtiene N° de Año YYYY-mm-dd
 * @parameter {String} 2013-05-15
 * @example get_year($date)
 * @return {String} 2013 
 */
function get_year($date)
{
    list($year, $month, $day) = explode('-', $date);
    return strftime("%Y", mktime(0,0,0,$month,$day,$year));
}
/* Obtiene N° de Semana de una fecha dada YYYY-mm-dd
 * @parameter {String} 2013-05-15
 * @example get_week($date)
 * @return {String} 1-53
 */
				   //function get_week($date)
				   //{
				   //    list($year, $month, $day) = explode('-', $date);
				   //    return strftime("%V", mktime(0,0,0,$month,$day,$year));
				   //}
function get_week($date)
{
    list($year, $month, $day) = explode('-', $date);
    // 
	//return strftime("%W", mktime(0,0,0,$month,$day,$year));
	$semana=strftime("%W", mktime(0,0,0,$month,$day,$year));
	if(PHP_OS=="Linux"){
		return $semana;
	}
	if(PHP_OS=="WINNT"){
		return ($semana+1);
	}
}			
/* Obtiene el Primer dia Lunes de la semana a una fecha dada YYYY-mm-dd
 * @parameter {String} 2013-05-17
 * @example get_week_start($fecha)
 * @return {String} 2013-05-13   -- Este equivale al dia lunes 
 */
 function semana_fin(){
	if(PHP_OS=="Linux"){
		return 0;
	}
	if(PHP_OS=="WINNT"){
		return (-2);
	}
 }
function get_week_start($fecha)
{
    $dato=weekyear($fecha);
    $timestamp= strtotime($dato);
    return date('Y-m-d', $timestamp);
}
/* Obtiene el Ultimo dia Domingo de la semana a una fecha dada YYYY-mm-dd
 * @parameter {String} 2013-05-17
 * @example get_week_end($fecha)
 * @return {String} 2013-05-13  -- Este equivale al dia Domingo
 */
function get_week_end($fecha)
{
    list($year, $month, $day) = explode('-', $fecha); 
    $dato=weekyear($fecha);
    $timestamp= strtotime($dato)+518400;
    return date ('Y-m-d', $timestamp);
}
/* Obtiene el primer dia lunes  De un numero de semana y un año  en formato $CurrentMondayTS (1368423061)
 * @parameter {String} ((semana,año)) --> 20 / 2013
 * @example WeekToDate($week, $year)
 * @return {String} $CurrentMondayTS  -- Este equivale al dia lunes
 */
function WeekToDate($week, $year)
{
	if(PHP_OS=="Linux"){
		//$week;
	}
	if(PHP_OS=="WINNT"){
		$week=$week-1;
	}
	
    $Jan1 = mktime (1, 1, 1, 1, 1, $year);
    $iYearFirstWeekNum = (int) strftime("%V",mktime (1, 1, 1, 1, 1, $year));
    if ($iYearFirstWeekNum == 1)
    {
        $week = $week - 1;
    }
    $weekdayJan1 = date ('w', $Jan1);
    $FirstMonday = strtotime(((4-$weekdayJan1)%7-3) . ' days', $Jan1);
    $CurrentMondayTS = strtotime(($week) . ' weeks', $FirstMonday);
    return ($CurrentMondayTS);
}
/* Obtiene el primer dia lunes  De un numero de semana y un año 
 * @parameter {String} ((semana,año)) --> 20 / 2013
 * @example WeekToDatoStart($week, $year)
 * @return {String} 2013-05-13  -- Este equivale al dia lunes
 * Requiere de la funcion WeekToDate
 */
function WeekToDatoStart($week, $year)
{
    $sStartTS = WeekToDate ($week, $year);
    $sStartDate = date ("Y-m-d", $sStartTS);
    return $sStartDate;
}
/* Obtiene el ultimo dia domingo  De un numero de semana y un año 
 * @parameter {String} ((semana,año)) --> 20 / 2013
 * @example WeekToDatoEnd($week, $year)
 * @return {String} 2013-06-13  -- Este equivale al dia domingo
 * Requiere de la funcion WeekToDate
 */
function WeekToDatoEnd($week, $year)
{
    $sStartTS = WeekToDate ($week, $year);
    $sEndDate = date ("Y-m-d", $sStartTS + (6*24*60*60));
    return $sEndDate;
}
// 
function Obtener_Mes_Desde_NumSemana($week,$year){
	$sStartTS = WeekToDate ($week, $year);					// 2013W23
	$sStartDate = date ("Y-m-d", $sStartTS);				//Primer dia de la semana 
	$fecha = $sStartDate;
	list($year,$mon,$day) = explode('-',$fecha);
	$c=0;
	for ($i=0;$i<7;$i++){
		$fecha = "$day/$mon/$year";
		$fechafin = SumarDiasNormal($fecha,$i);
		list($day2,$mon2,$year2) = explode('/',$fechafin);
		if ($mon==$mon2) {$c++;}
	}
	if ($c<4 && $mon>$mon2) { $mes = $mon2 ; } 	//1ero  enero 
	if ($c>=4 && $mon<$mon2) { $mes = $mon ; }
	if ($c<4 && $mon<=$mon2) {
		$mes = $mon +1 ;
		if ($mes<10) {$mes="0".$mes;}
	}
	if ($c>=4 && $mon==$mon2) { $mes = $mon ; } //diciembre
	return $mes;
}
// 
function Obtener_PrimerDia_Desde_NumSemana($week,$year){
	$sStartTS = WeekToDate ($week, $year);					// 2013W23
	$sStartDate = date ("d", $sStartTS);				//Primer dia de la semana
	return $sStartDate;
}
// 
//function SumarDiasMysql($fecha,$dias)
//{   list($year,$mon,$day) = explode('-',$fecha);
//    return date('Y-m-d',mktime(0,0,0,$mon,$days+$dia,$year));
//	return date('Y-m-d',mktime(0,0,0,$mon,$days+$dia,$year));        
//}
function SumarDiasNormal($fecha,$dias)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('d/m/Y',mktime(0,0,0,$mon,$day+$dias,$year)); 
}
//******************************************************************************
//******************************************************************************
//******************************************************************************
// FUNCIONES PARA CREACIÓN DE ELEMENTOS HTML
//******************************************************************************
/*
 * create_table($titulo="",$header="", $arreglo, $estilo="")
 * Permite crear una tabla html
 * @param {String} $titulo Titulo de la tabla
 * @param {String} $header Array con encabezados de columna
 * @param {Array} $arreglo Array con la tabla de datos
 * @param {String} $estilo Estilo de la tabla 
 */
function create_table($titulo="",$header="", $arreglo, $estilo="",$tamano="600px"){
	//print_r($titulo);
	//echo "<br>";
	//print_r($header);
	//echo "<br>";
	//print_r($arreglo);
	//echo "<br>";
	//echo  count($arreglo);
	//echo "<br>";
	//print_r($arreglo);	
	$estilo = "style='border:1px #cccccc solid; border-collapse: collapse; font-weight:bold; text-align:center;padding: 5px 5px 5px 5px;'";
	$estilo1 = "style='border:1px solid #cccccc; border-collapse: collapse; padding: 5px 5px 5px 5px;'";
	$estilo2 = "style='border:1px solid #cccccc; border-collapse: collapse; padding: 5px 5px 5px 5px;'";
	//CREAR TABLA
	//$tabla = @sprintf("<table id='tb_tabla' class='tb_tabla' width='95%' $estilo1 >\n");
	$tabla = @sprintf("<table id='tb_tabla' class='tabla212' width='$tamano' $estilo1 >\n");
	//FILA PARA IMPRIMIR EL TITULO
	if ($titulo!="") {
		$tabla.= sprintf("<tr id='tb_titulo' class='tb_titulo' $estilo >\n ");
		//$tabla.= sprintf("'%s'>\n",$estilo);
		$tabla.= sprintf("<td $estilo colspan=".count($header).">".$titulo."</td>\n");
		$tabla.=sprintf("</tr\n");    
	}
	//FILA PARA IMPRIMIR EL ENCABEZADO
	if ($header!="") {
		$tabla.= sprintf("<tr id='header' class='header' $estilo1 >\n");
		for ($j=0;$j<count($header);$j++) {
			//$tabla.= sprintf("<td $estilo> ".$header[$j]."</td>\n");
			$tabla.= sprintf("<td $estilo > ".$header[$j]."</td>\n");            
		}	
		$tabla.= sprintf("</tr>\n");
	}
	//FILA/COLUMNA PARA IMPRIMIR EL CONTENIDO DE LA TABLA
	for ($i=0;$i<count($arreglo);$i++) {
		$tabla.= sprintf("<tr >\n");
		for ($f=0;$f<count($arreglo[$i]);$f++) {
			$tabla.= sprintf("<td $estilo1 > ".$arreglo[$i][$f]." </td>\n");
		}
		$tabla.= sprintf("</tr>\n");
	}	
	$tabla.= sprintf("</table>\n");
	echo $tabla;
	//return $tabla;
}
/*
 * Permite crear enlaces desde un arreglo de datos
 * Esta funcion recibe una array de datos con los valores
 * 
 * @param
 * 	array $arreglo{title,url,imagen,estatus}
 * 	integer $estilo 0-iconos, 1-texto, 2-icono+texto
 * 	string $vineta para el texto
 * 
 *  Ejemplo del Array de datos
 *  $arreglo[]= array("Facebook","www.facebook.com/","facebook.png",	1);
 *  $arreglo[]= array("Twitter","https://twitter.com/","twitter.png",	1);
 * 	@example
 * 	imprimir_enlaces($redes_sociales) 		- Iconos + link
 * 	imprimir_enlaces($instucionales,1) 		- Texto + link
 *  imprimir_enlaces($instucionales,1,"-") 	- Texto + viñeta + link
 *  imprimir_enlaces($instucionales,2) 		- Iconos + Texto + link
 */ 
function imprimir_enlaces($arreglo,$estilo=0, $vineta=""){
	//$estilo=0 	Imprimir iconos con enlaces
	//$estilo=1 	Imprimir texto con enlaces
	//$estilo=2 	Imprimir iconos + texto con enlaces
	//FILA/COLUMNA PARA IMPRIMIR EL CONTENIDO DE LA TABLA
	$cadena="";
	for ($i=0;$i<count($arreglo);$i++) {
		//for ($f=0;$f<count($arreglo[$i]);$f++) {		
		if ($arreglo[$i][3]==1) {
			if ($estilo == 0 ) {
				$cadena.= sprintf ("<a href=\"". $arreglo[$i][1]."\" target=\"_blank\" title=\"".utf8_decode($arreglo[$i][0])."\"  >"	);	
				$cadena.= sprintf ("<img src=\"". $arreglo[$i][2]."\" style=\"border: 0px solid ; width: 32px; height: 32px;\">");
				$cadena.= sprintf ("</a>\n");	
			}
			if ($estilo == 1 ) {
				if ($vineta != "" ){
					$vineta = $vineta." ";
				}
				$cadena.= sprintf ($vineta."<a href=\"". $arreglo[$i][1]."\" target=\"_blank\"  title=\"".utf8_decode($arreglo[$i][0])."\"   >"	);	
				$cadena.= sprintf (utf8_decode($arreglo[$i][0]));
				$cadena.= sprintf ("</a>\n<br>\n");	
			}
			if ($estilo == 2 ) {
				if ($vineta != "" ){
					$vineta = $vineta." ";
				}
				$cadena.= sprintf ("<a href=\"". $arreglo[$i][1]."\" target=\"_blank\" title=\"".utf8_decode($arreglo[$i][0])."\">"	);
				$cadena.= sprintf ("<img src=\"". $arreglo[$i][2]."\" style=\"border: 0px solid ; width: 16px; height: 16px;\">");
				$cadena.= sprintf ("</a>\n");
				$cadena.= sprintf ($vineta);
				$cadena.= sprintf ("<a href=\"". $arreglo[$i][1]."\" target=\"_blank\" title=\"".utf8_decode($arreglo[$i][0])."\">"	);
				$cadena.= sprintf (utf8_decode($arreglo[$i][0]));
				$cadena.= sprintf ("</a>\n<br>\n");	
			}
		}
		//$cadena.= sprintf("<td $estilo1 > ".$arreglo[$i][$f]." </td>\n");
		//$cadena.= sprintf("<tr >\n");
		//}
		//$tabla.= sprintf("</tr>\n");
	}	
	//$tabla.= sprintf("</table>\n");
	echo $cadena;
}
/*
 * Crea una marquesina con un contenido de noticias
 */
function crear_noticias(){	
$velocidad = 10;
$direcion = "up"; //down=abajo up=arriba
$alto = 60; //tamaño ato de la marquesina
$contenido = "Hola, :P <strong>marquesina</strong><br> aqui la joda que gustes..";
echo "<MARQUEE"
." onmouseover=this.stop()"
." onmouseout=this.start()"
." scrollAmount=2"
." scrollDelay=$velocidad"
." direction=$direcion"
." height=$alto>\n"
."$contenido"
."\n</MARQUEE>\n";
}
//
function ver_arreglo($arreglo,$parar=0){
	echo "<pre>";
	echo "<code>";
	//echo "<div style=\"text-aling:left;border:1px\">";
	 print"<p align=\"LEFT\">";
	//print_r(convertArrayKeysToUtf8($arreglo));
	print_r($arreglo);
	print"</p>";
	//echo "</div>";
	echo "</code>";
	echo "</pre>";
	if ($parar==1){
		die();
	}
}
//
function crear_perfil(){
	//code
}
//
function mostrar_rutas(){
	$keys = array(
		"PATH_INFO",
		"PATH_TRANSLATED",
		"PHP_SELF",
		"REQUEST_URI",
		"SCRIPT_FILENAME",
		"SCRIPT_NAME",
		"QUERY_STRING"
	);
	$info_row = "$_SERVER[SERVER_SOFTWARE] <br>";
	print "Path Information for $_SERVER[SERVER_SOFTWARE]<br><br>";
	foreach($keys as $key) {
		print '$_SERVER["'.$key.'"] = '.$_SERVER[$key]."<br>";
		$info_row .= "$_SERVER[$key]<br>";
	}
	print '__FILE__ = '. __FILE__;
	$info_row .= "".__FILE__."<br>";
	//print "<br><br><br>" . $info_row;
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//
// <!--NO DEJAR LINEAS EN BLANCO-->
// <!--NO DEJAR LINEAS EN BLANCO-->
// <!--NO DEJAR LINEAS EN BLANCO-->
// <!--NO DEJAR LINEAS EN BLANCO-->
// <!--NO DEJAR LINEAS EN BLANCO-->
// <!--NO DEJAR LINEAS EN BLANCO-->
?>