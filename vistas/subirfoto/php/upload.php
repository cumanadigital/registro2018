<?php
    // echo "upload.php";
    // echo $_POST['cedula']; 

// if (isset($_POST['cedula'])) {

    $cedula = $_POST['cedula'];

    // die();

    
    include('class.uploader.php');
    
    $uploader = new Uploader();
    $data = $uploader->upload($_FILES['files'], array(
        'limit' => 1, //Maximum Limit of files. {null, Number}
        'maxSize' => 1, //Maximum Size of files {null, Number(in MB's)}
        'extensions' => array('jpg'), //Whitelist for file extension. {null, Array(ex: array('jpg', 'png'))}
        'required' => true, //Minimum one file is required for upload {Boolean}
        'uploadDir' => '../../../media/carnet/', //Upload directory {String}
        // 'title' => array('name'), //New file name {null, String, Array} *please read documentation in README.md
        'title' => $cedula, //New file name {null, String, Array} *please read documentation in README.md
        'removeFiles' => false, //Enable file exclusion {Boolean(extra for jQuery.filer), String($_POST field name containing json data with file names)}
        'perms' => null, //Uploaded file permisions {null, Number}
        'onCheck' => null, //A callback function name to be called by checking a file for errors (must return an array) | ($file) | Callback
        'onError' => null, //A callback function name to be called if an error occured (must return an array) | ($errors, $file) | Callback
        'onSuccess' => null, //A callback function name to be called if all files were successfully uploaded | ($files, $metas) | Callback
        'onUpload' => null, //A callback function name to be called if all files were successfully uploaded (must return an array) | ($file) | Callback
        'onComplete' => null, //A callback function name to be called when upload is complete | ($file) | Callback
        'onRemove' => 'onFilesRemoveCallback' //A callback function name to be called by removing files (must return an array) | ($removed_files) | Callback
    ));
    
    if($data['isComplete']){
        $files = $data['data'];
        // echo "<pre>";
        // print_r($files);
        $archivo = $files['metas'][0]['file']; // => ../../../media/fotos/11829328.jpg

        echo "<script> function cerrarse(){ window.close() } </script>"; 

        echo  '<div id="content_result" style="text-aling:center;">';
        echo  '<h4>Imagen actualizada correctamente</h4>';
        echo  '<hr>';
        echo  "<img height='200px'src='$archivo'>";
        echo  '<hr>';
        echo  "Debe iniciar sesión nuevamente para ver los cambios";    
        echo  "<form><input type=button value='Cerrar módulo' onclick='cerrarse()'></form>";     
        echo  '</div>';


    }

    if($data['hasErrors']){
        $errors = $data['errors'];
        print_r($errors);
    }
    
    function onFilesRemoveCallback($removed_files){
        foreach($removed_files as $key=>$value){
            $file = '../../../media/carnet/' . $value;
            if(file_exists($file)){
                unlink($file);
            }
        }
        
        return $removed_files;
    }

// }
?>
