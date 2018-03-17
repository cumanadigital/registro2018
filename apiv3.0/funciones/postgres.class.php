<?php
class Postgres {
    public  $conexion= null;
    public  $servidor="";
    public  $usuario="";
    public  $contrasena="";
    public  $bd="";
    public  $query="";
    // 
    public function __construct ($servidor, $base, $user, $pass) {
        $this->servidor = $servidor;
        $this->bd = $base;
        $this->usuario  = $user;
        $this->contrasena = $pass;
        $this->Conectar();
    }
    // 
    public function Conectar () {
        if(!($this->conexion = pg_connect("host=$this->servidor dbname=$this->bd user=$this->usuario password=$this->contrasena")))
            {echo "ERROR al intentar conectar a la base de datos...";}
        //return $this->conexion;
    }
    // 
    public function ObtenerCadenaConexion() {
        return "host=$this->servidor dbname=$this->bd user=$this->usuario password=***********";
    }
    // 
    public function ConsultarSql($sql){
        try {
            if($this->conexion == null) {throw new Exception("Debe establecer una conexion con la bd"); exit;}
            if($sql == "" || count($sql) == 0){ throw new Exception("Debe pasar un aconsulta sql"); exit;}
            if(!($this->query=pg_query($this->conexion, $sql))){
                throw new Exception("<b>Hay un error en la Consulta SQL</b> ".$sql); 
                return $this->query;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        } 
    }
    // 
    public function ObtenerFilas(){
        return pg_fetch_array($this->query);
    }
    public function ObtenerFilas1(){
        return   pg_fetch_all($this->query);
		//return pg_fetch_all($this->query);
    }
    // 
    public function ObtenerFilasID(){
        return pg_fetch_row($this->query);
    }
	// 
	function ObtenerFilasArray(){
		$dato = "";
		while ($fila = $this->ObtenerFilas()  ) { 
			$dato[] = $fila ; 
		}	
		return $dato;
	}
    // 
    function ObtenerFilasArrayAll(){
        $dato = "";
        while ($fila = $this->ObtenerFilasAsoc()  ) { 
            $dato[] = $fila ; 
        }   
        return $dato;
    }
    // 
	public function ObtenerFilasAsoc(){
        return pg_fetch_assoc($this->query);
    }
    // 
    public function ObtenerFilasAsocAll(){
        return pg_fetch_assoc($this->query);
    }
    // 
    public function NumeroDeFilas(){
        return pg_num_rows($this->query);
    }
    // 
    public function NumeroDeFilasAfectadas(){
        return pg_affected_rows ($this->query);
    }
}
?>
<?php 
// function sql($sql,$Postgres){
//     $arr_=null;
//     $Postgres->consultar($sql);
//     while($fila=$Postgres->ObtenerFilas()){
//            $arr_[]=$fila;
//     };
//     return $arr_;
// }
// 
// function sql2($sql,$Postgres){
//     $arr_=null;
//     $Postgres->consultar($sql);
//     while($fila=$Postgres->ObtenerFilasAsoc()){
//            $arr_[]=$fila;
//     };
//     return $arr_;
// }
// 
// 
// 
/*
 * PERMITE EJECUTAR UNA CONSULTA SQL
 */
function consultar($sql,$Postgres){
    $arr_=null;
    $Postgres->ConsultarSql($sql);
    while($fila=$Postgres->ObtenerFilasAsoc()){
        $arr_[]=$fila;
    };
    return $arr_;
}
/*
 * RETORNA NUMERO DE FILAS OBTENIDAS DE UN RESULTADO
 */
function numresult($resultado) {
    $number = mysql_num_rows ($resultado);
    return $number;
}
/*
 */
// $Postgres=new Postgres(DB_SERVER,DB_NAME,DB_USER,DB_PASSWORD);
// // $uid=(string) new SUID();
// $fecha_reg=date("Y-m-d H:i:s");
?>