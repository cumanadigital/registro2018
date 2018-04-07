    console.log("javascript - root registrar planteles");
    // 
    var permite_eliminar = false;    
    var username = $('#user_name').attr('oculto');
    var userced = $('#user_name').attr('ocultoced');
    var sesionencode = $('#user_name').attr('sesionencode');
    var arreglo1 = sesionencode.split('&');
    // console.info(arreglo1);
    var parametroArray = new Array();
    for (x=0; x < arreglo1.length; x++) {
      var para1 = arreglo1[x].split('=');
      // parametro.push(para1[0]);
      var indice1 = para1[0];
      var valor1 = para1[1];
      parametroArray[indice1] = valor1;
    }    
    var sesion_cedula = parametroArray['sesion_cedula'];
    var sesion_nivel_usuario  = parametroArray['sesion_nivel_usuario'];
    var sesion_municipio = parametroArray['sesion_municipio'];
    // console.info(parametroArray);
    // 
    // var API_URL_planteles =  "servicios/services.admin.planteles.php?accion=consultar_registros" + "&cedula=" + sesion_cedula + "&municipio=" + sesion_municipio + "&nivel_usuario=" + sesion_nivel_usuario ;
    // // var API_URL_planteles =  "servicios/services.admin.planteles.php?accion=consultar_registros&parametro_user="+parametros_user;
    // // 
    // var API_URL =  "servicios/services.admin.planteles.php";
    // var $table = $('#table').bootstrapTable({url: API_URL_planteles});


    var API_URL_personal =  "servicios/services.admin.planteles.php?accion=consultar_personal_general";
    // $('#table_personal_asignado').bootstrapTable('destroy' ); 
    $('#table_personal_asignado').bootstrapTable({url: API_URL_personal});

    var usernombre = $('#name_user').html();
    var cargouser = $('#cargo_user').html();
    var dptouser = $('#departamento_user').html();
    var userestatus = $('#estatus_loading').attr('estatus');

    var cantdependencias = $('#user_name').attr('cantdependencias');
    
    var variables_session = dato_usuario;

    $alert = $('.alert').hide();

    $alert_mensaje_personal = $('#alert_mensaje_personal').hide();

    
    // $alert = $('#alert_pesronal').hide();
    
    var accion="";
    var total_inicio = 0;


    function actionFormatterPersonal (value,row) {
      console.log(row.nom_personal);
      // Object { nom_id_nomina: "41946", nom_cedula: "11829328", nom_nomina: "FIJO", nom_nombres_apellidos: "HERNANDEZ C OSWALDO E", nom_fecha_ingreso: "04/01/2011", nom_cod_cargo: "100000", nom_cargo: "BACHILLER I", nom_cod_dependencia: "006102200", nom_dependencia: "OFIC DE SUPERV ZONA NO 12", nom_personal: "A", 35 más… }

      if (row.nom_personal == "ADMINISTRATIVO" ) {
          personal='<span class="pull-center badge bg-green">Adm</span>';
      }
      if (row.nom_personal == "DOCENTE" ) {
          personal='<span class="pull-center badge bg-blue">Doc</span>';
      }
      if (row.nom_personal == "OBRERO" ) {
          personal='<span class="pull-center badge bg-yellow">Obr</span>';
      }
      if (row.nom_personal == "COMISION SERVICIO" ) {
          personal='<span class="pull-center badge bg-red">COM</span>';
      }
      return personal;
    }


    function actionFormatterPersonalFuncional (value,row) {
      //console.log(row);
      // Object { nom_id_nomina: "41946", nom_cedula: "11829328", nom_nomina: "FIJO", nom_nombres_apellidos: "HERNANDEZ C OSWALDO E", nom_fecha_ingreso: "04/01/2011", nom_cod_cargo: "100000", nom_cargo: "BACHILLER I", nom_cod_dependencia: "006102200", nom_dependencia: "OFIC DE SUPERV ZONA NO 12", nom_personal: "A", 35 más… }

      if (row.reg_tipo_personal_funcional == "ADMINISTRATIVO" ) {
          personal='<span class="pull-center badge bg-green">Adm</span>';
      }
      if (row.reg_tipo_personal_funcional == "DOCENTE" ) {
          personal='<span class="pull-center badge bg-blue">Doc</span>';
      }
      if (row.reg_tipo_personal_funcional == "OBRERO" ) {
          personal='<span class="pull-center badge bg-yellow">Obr</span>';
      }
      if (row.reg_tipo_personal_funcional == "SUPERVISOR" ) {
          personal='<span class="pull-center badge bg-purpura">Sup</span>';
      }
      if (row.reg_tipo_personal_funcional == "VIGILANCIA" ) {
          personal='<span class="pull-center badge bg-rojo">Vig</span>';
      }
      return personal;
    }
    
    function actionFormatterContactosPersonal (value,row) {
      //console.log(row);
      // Object { nom_id_nomina: "41946", nom_cedula: "11829328", nom_nomina: "FIJO", nom_nombres_apellidos: "HERNANDEZ C OSWALDO E", nom_fecha_ingreso: "04/01/2011", nom_cod_cargo: "100000", nom_cargo: "BACHILLER I", nom_cod_dependencia: "006102200", nom_dependencia: "OFIC DE SUPERV ZONA NO 12", nom_personal: "A", 35 más… }
      var contactos = row.reg_telefono_celular + "</br>" + row.reg_telefono_residencia 
      // + "</br>" + row.reg_red_email;
      return contactos;
    }

    function actionFormatterNombre (value,row) {
      //console.log(row);
      // Object { nom_id_nomina: "41946", nom_cedula: "11829328", nom_nomina: "FIJO", nom_nombres_apellidos: "HERNANDEZ C OSWALDO E", nom_fecha_ingreso: "04/01/2011", nom_cod_cargo: "100000", nom_cargo: "BACHILLER I", nom_cod_dependencia: "006102200", nom_dependencia: "OFIC DE SUPERV ZONA NO 12", nom_personal: "A", 35 más… }
      nombre = row.reg_nombre_completo + " " + row.reg_apellido_completo 
      return nombre;
    }

    function imageFormatter(value,row) {
      // console.info(row)
      var nombre = row.reg_nombre_completo + " " + row.reg_apellido_completo;
      var ruta_foto = "../media/fotos/" + row.nom_cedula + ".jpg";
      if (existeUrl(ruta_foto)){
      var fotod = "<div class='pull-left image'>";;
          fotod+= "<img src='" + ruta_foto + "' alt='User Image' class='mg-circle' height='60px';>";
          fotod+= "</div>";

      }else{
        ruta_foto = "media/carnet/noimage3.png";
        ruta_foto = "media/carnet/noimage.png";
        var fotod = "<div class='pull-left image'>";;
        fotod+= "<img src='" + ruta_foto + "' alt='User Image' class='mg-circle' height='42px';>";
        fotod+= "</div>";

      }
      return fotod
    }


    function showAlert(title, type) {
        $alert.attr('class', 'alert alert-' + type || 'success')
              .html('<i class="glyphicon glyphicon-check"></i> ' + title).show();
        setTimeout(function () {
            $alert.hide();
        }, 5000);
    }