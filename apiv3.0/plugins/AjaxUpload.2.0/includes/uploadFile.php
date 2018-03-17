
<?php
include('../../../../apiv3.0/funciones/funciones3.0.php');

// Tiempo de espera del script
// Este lo usamos para emular mas o menos el comportamiento en un servidor web no local
// Ya que muchas veces al ejecutarlo de fomra local no se aprecia bien el funcionamiento.
ver_arreglo($_POST);
sleep(3);

ini_set("display_errors", 1);

// Definimos variables generales
$foto_user = "media/carnet/" . $_POST['sesion_userfoto'].".jpg";
// $foto_user = $_POST['cedula'];
//print_r ($_POST);
//define("maxUpload", 5000);
define("maxUpload", 50000000);
define("maxWidth", 1200);
define("maxHeight", 1200);
//define("uploadURL", '../../../../media/carnet/');
define("uploadURL", '../../../../media/carnet/');
//define("uploadURL", '/media/carnet/');
define("fileName", 'foto_');


// Tipos MIME
$fileType = array('image/jpeg','image/pjpeg','image/png');

// Bandera para procesar imagen
$pasaImgSize = false;

//bandera de error al procesar la imagen
$respuestaFile = false;

// nombre por default de la imagen a subir
$fileName = '';
// error del lado del servidor
$mensajeFile = 'ERROR EN EL SCRIPT';

// Obtenemos los datos del archivo
$tamanio = $_FILES['userfile']['size'];
$tipo = $_FILES['userfile']['type'];
$archivo = $_FILES['userfile']['name'];

// Tamaño de la imagen
$imageSize = getimagesize($_FILES['userfile']['tmp_name']);
						
// Verificamos la extensión del archivo independiente del tipo mime
$extension = explode('.',$_FILES['userfile']['name']);
$num = count($extension)-1;

// Creamos el nombre del archivo dependiendo la opción
$imgFile = fileName.time().'.'.$extension[$num];
//$imgFile = $_SESSION['sesion_userfoto'].'.'.$extension[$num];
//$imgFile = $foto_user.'.'.$extension[$num];
//echo  $imgFile;



$datosarchivo .= "<br> tamanio:  ".$tamanio."<br>";
$datosarchivo .= "tipo   :  ". $tipo."<br>";
$datosarchivo .= "archivo:  ". $archivo."<br>";
$datosarchivo .= "imageSize max witdh ". $imageSize[0] . "<br>";
$datosarchivo .= "imageSize maxHeigth" . $imageSize[1] . "<br>";
$datosarchivo .= "extension [num] ". $extension[$num] . "<br>";
$datosarchivo .= "num       ". $num       . "<br>";
$datosarchivo .= "imgFile   ". $imgFile . "<br>";
$datosarchivo .= "imageSize ". $imageSize . "<br>";

//echo $datosarchivo;
// Verificamos el tamaño válido para los logotipos
if($imageSize[0] <= maxWidth && $imageSize[1] <= maxHeight)
	$pasaImgSize = true;

// Verificamos el status de las dimensiones de la imagen a publicar
if($pasaImgSize == true)
{

	// Verificamos Tamaño y extensiones
	if(in_array($tipo, $fileType) && $tamanio>0 && $tamanio<=maxUpload && ($extension[$num]=='jpg' || $extension[$num]=='png'))
	{
		// Intentamos copiar el archivo
		if(is_uploaded_file($_FILES['userfile']['tmp_name']))
		{
			//echo "archivo temporal creado"	;
			if(move_uploaded_file($_FILES['userfile']['tmp_name'], uploadURL.$imgFile))
			{
				$respuestaFile = 'done';
				$fileName = $imgFile;
				$mensajeFile = $imgFile;
			}
			else
				// error del lado del servidor
				$mensajeFile = 'No se pudo subir el archivo'. $datosarchivo;
		}
		else
			// error del lado del servidor
			$mensajeFile = 'No se pudo subir el archivo'. $datosarchivo;
	}
	else
		// Error en el tamaño y tipo de imagen
		$mensajeFile = 'Verifique el tamaño y tipo de imagen'. $datosarchivo;
					
}
else
	// Error en las dimensiones de la imagen
	$mensajeFile = 'Verifique las dimensiones de la Imagen'. $datosarchivo;

$salidaJson = array("respuesta" => $respuestaFile,
					"mensaje" => $mensajeFile,
					"fileName" => $fileName);

echo json_encode($salidaJson);
?>
