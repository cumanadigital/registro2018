<?php 
// print_r($_REQUEST) ;
// print_r ($_REQUEST['cedula']);
$cedula = $_REQUEST['cedula'];
?>
<!DOCTYPE>
<html lang="html">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>SUBIR FOTO</title>
    
	<!--Stylesheets-->
	<link href="css/jquery.filer.css" type="text/css" rel="stylesheet" />
	<link href="css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />

	<!--jQuery-->
	<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> -->
    <!-- jQuery 2.1.4 -->
    <script src="../../apiv3.0/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	

    <script type="text/javascript" src="js/jquery.filer.min.js?v=1.0.5"></script>
	<script type="text/javascript" src="js/custom.js?v=1.0.5"></script>
    
	<!--[if IE]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <style>
        body {
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            background-color: #fff;
            
            margin: 0;
            padding: 20px;
        }
        
        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #eee;
        }
        
        #content {
            width: 90%;   
        }
    </style>

    <script>
        function cerrarse(){
        window.close()
        }
    </script> 

</head>

<body>
    <div id="header">
        <!-- <h1>Foto de usuario</h1> -->
        <p>Módulo para cargar foto del perfl de Usuario</p>
    </div>
    
    <hr />
    
    <div id="content">
        <h4>Buscar archivo de imagen (jpg):</h4>
        <form action="./php/upload.php" method="post" enctype="multipart/form-data">
              <input type="file" name="files[]" id="filer_input" multiple="multiple">
              <input type="hidden" name="cedula" id="cedula" value='<?php echo $cedula;?>' >
              <input type="submit" value="Enviar">
        </form>
        
        <hr>

        <form>
            <input type=button value="Cerrar Ventana" onclick="cerrarse()">
        </form> 
        
        <!-- <h4>Example 2:</h4>
        <input type="file" name="files[]" id="filer_input2" multiple="multiple"> -->
    </div>
    
    </body>
</html>