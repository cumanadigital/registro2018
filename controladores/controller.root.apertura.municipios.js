    console.log("javascript - root apertura municipios");
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
    
    var API_URL_planteles =  "servicios/services.admin.planteles.php?accion=consultar_planteles_municipio" + "&cedula=" + sesion_cedula + "&municipio=" + sesion_municipio + "&nivel_usuario=" + sesion_nivel_usuario ;
    // var API_URL_planteles =  "servicios/services.admin.planteles.php?accion=consultar_registros&parametro_user="+parametros_user;
    // 
    var API_URL =  "servicios/services.admin.planteles.php";
    var $table = $('#table').bootstrapTable({url: API_URL_planteles});


    // var API_URL_personal =  "servicios/services.admin.planteles.php?accion=consultar_personal_general";
    // // $('#table_personal_asignado').bootstrapTable('destroy' ); 
    // $('#table_personal_asignado').bootstrapTable({url: API_URL_personal});

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

// {"id_nomina":"13623","cedula":"12289899","nombres_apellidos":"ESPINOZA MIRELYS DEL V.","cod_cargo":"1124DI","cargo":"DOC. IV \/AULA","cod_dependencia":"006970129","cuenta_bancaria":"01020645670000032722","sep1":"---","id_plantelesbase":"1","cod_plantel":"OD04711901","cod_estadistico":"190866","cod_nomina":null,"estado":"SUCRE","municipio":"ANDRES ELOY BLANCO","parroquia":"MARI\u00d1O","nombre":"C E I VALLE LINDO SAN AGUSTIN","denominacion":null,"zona_educativa":"SUCRE","tipo_dependencia":"NACIONAL","estatus":"ACTIVO","fundacion":null,"direccion":"CALLE ORINOCO CC BOYACA","correo":"AEB.VALLELINDO@GMAIL.COM","telefono_fijo":"2943411210","telefono_otro":"4163803210","zona_ubicacion":null,"clase_plantel":"UNITARIO","categoria":"CIVIL","condicion_estudio":"EXTERNADO","tipo_matricula":"MIXTO","turno":"MA\u00d1ANA-TARDE","modalidad":"SISTEMA REGULAR","dir_nombre":"MIRELYS DEL VALLE","dir_apellido":"ESPINOZA","dir_direccion":null,"dir_fechanac":null,"dir_telefono":"4263803210","dir_celular":"0","dir_email":"CEI.VALLELINDOSANAGUSTI.AEB@ZESUCRE.COM.VE","dir_twitter":null,"total_etapa_maternal":null,"total_etapa_preescolar":null,"total_primaria":null,"total_media_general":null,"total_media_tecnica":null,"total_adulto":null,"total_especial":null,"total":null,"total_docente":null,"total_administrativo":null,"total_obrero":null,"fecha_registro_matricula":null,"fecha_registro_datos":null,"fecha_registro_personal":null,"fecha_registro_director":null,"nivel_estatus":"CERRADO","cierre":"---"},

function EstadoFormatter(value, row) {
    var icon = "";
    // console.info(row.nivel_estatus);
    if (row.nivel_estatus == 'ABIERTO' ) {
      icon+='<span class="pull-center badge bg-green">ABIERTO</span><br>';
    }
    if (row.nivel_estatus == 'CERRADO' ) {
      icon+= '<span class="pull-center badge bg-red">CERRADO</span><br>';
    }
    return icon;
}

function actionFormatter(value,row) {
    // console.info(row['nivel_estatus']);
    // console.info(row.nivel_estatus);
    var icon="";
      icon+='<div class="btn-group">';
      icon+='  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
      icon+='    Seleccione <span class="caret"></span>';
      icon+='  </button>';
      icon+='  <ul class="dropdown-menu pull-right" role="menu">';
    if (row.nivel_estatus == 'ABIERTO' ) {
      icon+='    <li><a class="desactivar_plantel" href="javascript:" title="Desactivar Plantel"><i class="glyphicon glyphicon-blue glyphicon-user"></i>Desactivar Plantel</a></li>';
    }
    if (row.nivel_estatus == 'CERRADO' ) {
      icon+='    <li><a class="activar_plantel" href="javascript:" title="Activar Plantel"><i class="glyphicon glyphicon-warning glyphicon glyphicon-home"></i>Activar Plantel</a></li>';
    }  
      icon+='  </ul>';
      icon+='</div>';
    return icon;
}


window.actionEvents = {
    'click .activar_plantel': function (e, value, row) {
        accion='activar_plantel';
        nivel_estatus ='ABIERTO';
        // console.log(row.id_plantelesbase);
        var id_plantelesbase = row.id_plantelesbase;
        if ( confirm('Esta seguro que desea cambiar el Estatus de este Registro? \n\n' + row.cod_plantel + ' - ' + row.nombre + '\n' + 'MUNICIPIO ' + row.municipio)) {
            $.ajax({
                url: API_URL + '?&id_plantelesbase=' + id_plantelesbase + '&nivel_estatus=' + nivel_estatus + '&accion=' + accion ,
                //type: 'POST',
                success: function () {
                    $table.bootstrapTable('refresh' ); 
                    showAlert('Registro actualizado con exito!', 'success');
                },
                error: function () {
                    showAlert('Delete item error!', 'danger');
                }
            })
        }
    },
    'click .desactivar_plantel': function (e, value, row) {
        accion='activar_plantel';
        nivel_estatus ='CERRADO';
        // console.log(row.id_plantelesbase);
        var id_plantelesbase = row.id_plantelesbase;
        if ( confirm('Esta seguro que desea cambiar el Estatus de este Registro? \n\n' + row.cod_plantel + ' - ' + row.nombre + '\n' + 'MUNICIPIO ' + row.municipio)) {
            $.ajax({
                url: API_URL + '?&id_plantelesbase=' + id_plantelesbase + '&nivel_estatus=' + nivel_estatus + '&accion=' + accion ,
                //type: 'POST',
                success: function () {
                    $table.bootstrapTable('refresh' ); 
                    showAlert('Registro actualizado con exito!', 'success');
                },
                error: function () {
                    showAlert('Delete item error!', 'danger');
                }
            })
        }
    }
};


function showAlert(title, type) {
    $alert.attr('class', 'alert alert-' + type || 'success')
          .html('<i class="glyphicon glyphicon-check"></i> ' + title).show();
    setTimeout(function () {
        $alert.hide();
    }, 5000);
}