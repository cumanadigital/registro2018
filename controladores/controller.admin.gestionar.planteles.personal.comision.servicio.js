console.log("javascript controller.admin.gestionar.planteles.personal.comision.servicio");

// $('#form_modal_personal_comision_servicio').find('input, textarea, button, select').attr('disabled','disabled');

 $alert = $('.alert').hide();
 // $alert_mensaje_personal = $('#alert_mensaje_personal').hide();

$('#cuadro_comision_de_servicio').find('input, textarea, button, select').attr('disabled','disabled');


$('#btn_editar_personal_comision_servicio').hide();
$('#btn_buscar_personal_comision_servicio').show();
$('#btn_limpiar_personal_comision_servicio').show();

$('#btn_buscar_personal_comision_servicio').attr('disabled',false);
$('#btn_buscar_personal_comision_servicio').attr('readonly',false);

$('#btn_volver_listado_comision_servicio').attr('disabled',false);

$('#btn_enviar_personal_comision_servicio').attr('disabled',true);



$("#txt_cedula_personal_comision_servicio").attr('readonly',false);
$("#txt_cedula_personal_comision_servicio").attr('disabled',false);
$("#txt_cedula_personal_comision_servicio").focus();

var id_plantelesbase_per_comision_servicio 	= $('#txt_id_plantelesbase_per_comision_servicio').val();
var cod_plantel_per_comision_servicio 		= $('#txt_cod_plantel_per_comision_servicio').val();
console.info(id_plantelesbase_per_comision_servicio);
// alert(id_plantelesbase_per_comision_servicio);

// $('#btn_editar_personal_comision_servicio')
// $('#btn_editar_personal_comision_servicio')

//  __  ___                __             ___  __              __  ___       __   __       __   __           __     __            __   ___  __          __     __
// |__)  |  |\ |     \  / /  \ |    \  / |__  |__)     |    | /__`  |   /\  |  \ /  \     /  ` /  \  |\/| | /__` | /  \ |\ |     /__` |__  |__) \  / | /  ` | /  \
// |__)  |  | \| ___  \/  \__/ |___  \/  |___ |  \ ___ |___ | .__/  |  /~~\ |__/ \__/ ___ \__, \__/  |  | | .__/ | \__/ | \| ___ .__/ |___ |  \  \/  | \__, | \__/
// 
$('#btn_volver_listado_comision_servicio').click(function () {
 	console.info('btn_volver_listado_comision_servicio');
  
	$('#btn_volver_listado_comision_servicio').attr('disabled',true);
	$('#btn_volver_listado_comision_servicio').hide();

	cuadro_listado_personal_comision_servicio.fadeIn();
	table_personal_asignado_comision_servicio.fadeIn();
	
	$('#btn_enviar_personal_comision_servicio').attr('disabled',true);
	$('#btn_enviar_personal_comision_servicio').hide();

	var contenedor = $('#cuadro_comision_de_servicio');
	contenedor.html('');

});
//  __  ___          __        __   __        __      __   ___  __   __   __
// |__)  |  |\ |    |__) |  | /__` /  `  /\  |__)    |__) |__  |__) /__` /  \ |\ |  /\  |
// |__)  |  | \|    |__) \__/ .__/ \__, /~~\ |  \    |    |___ |  \ .__/ \__/ | \| /~~\ |___
//  __   __           __     __           __   ___  __          __     __
// /  ` /  \  |\/| | /__` | /  \ |\ |    /__` |__  |__) \  / | /  ` | /  \
// \__, \__/  |  | | .__/ | \__/ | \|    .__/ |___ |  \  \/  | \__, | \__/
// 
$('#btn_buscar_personal_comision_servicio').click(function () {
    accion ='consultar_comision';
    cedula = $("#txt_cedula_personal_comision_servicio").val();
    id_plantelesbase_per = $("#txt_id_plantelesbase_per_comision_servicio").val();
    // console.log(accion)
    // console.log(cedula);
    // console.log(id_plantelesbase_per);
    if (cedula!='') {
    	parametros =  'cedula=' + cedula + '&accion='+accion +'&id_plantelesbase_per='+id_plantelesbase_per + '&'+sesionencode;
    	$('#btn_buscar_personal_comision_servicio').attr('disabled',true);
    	$('#btn_limpiar_personal_comision_servicio').attr('disabled',false);
      // console.log(parametros);
      // API_URL =  "servicios/services.funcionarios.php";
      API_URL =  "servicios/services.admin.planteles.php";
      $.ajax({
          url: API_URL + ($modal_plantel.data('id') || ''),
          type: 'POST',
          //contentType: 'application/json',
          //data: JSON.stringify(row),
          data: parametros + "&token1="+rand_code(),
          success: function (response) {
              // console.log(response.trim());
              if (response.trim() == 'NOMINA' ) {
                // console.log("es falso");
                // no existe en nomina
                var msg1 = "CEDULA REGISTRADA EN NOMINA MPPE \nDEBE SER AGREGADO POR EL MODULO DE REGISTRAR PERSONAL";
                showAlert( 'CEDULA REGISTRADA EN NOMINA MPPE', 'danger');
                alert(msg1);

                // showAlert('Registro con éxito!', 'success');
                $("#txt_apellido_funcionario_comision_servicio").val('REGISTRADO MPPE');
                $("#txt_nombre_funcionario_comision_servicio").val('REGISTRADO MPPE');

                $("#txt_cedula_personal_comision_servicio").focus();
              }else{  
                var data_func =  JSON.parse(response);
                // // console.info(data_func);
                // $('#cuadro_datos_laborales').fadeIn();
                // var reg_id_registropersonal = data_func[0]['reg_id_registropersonal'];                        
                // var nom_cargo1 = data_func[0]['nom_cargo'];
                // var nom_cod_cargo1 = data_func[0]['nom_cod_cargo'];
                // var nom_nomina1 = data_func[0]['nom_nomina'];
                // // console.log(nom_cargo1);
                // // console.log(nom_cod_cargo1);
                // // console.log(nom_nomina1);
                // var nom_personal = data_func[0]['nom_personal']; 
                // $("#txt_tipo_personal").val(nom_personal);
                // $("#txt_apellido_funcionario").val(data_func[0]['nom_nombres_apellidos']);
                // $('#resumen_laboral').html('Datos Laborales: [' + nom_cod_cargo1 + ' - ' + nom_cargo1  + ' - ' + nom_nomina1 + ']' );
                // if (reg_id_registropersonal == null) {
                //   // console.info("EXISTE PERO no tiene cargo funcional");
                //   $('#btn_enviar_personal').attr('disabled',false);
                //   $('#btn_enviar_personal').fadeIn();
                //   activar_datos_personales();
                //   $('#btn_enviar_personal').attr('disabled',false);
                //   $('#btn_enviar_personal').fadeIn();
                //   // 
                //   activar_datos_laborales();
                //   // 
                //   $("#txt_apellido_funcionario").val(data_func[0]['nom_nombres_apellidos']);
                //   $modal_personal.find('input[name="txt_fecha_ingreso"]').val(data_func[0]['reg_fecha_ingreso']);
                //   $("#txt_nombre_funcionario").val('');
                //   $("#txt_apellido_funcionario").focus();
                // }else{
                //   // console.info("SI EXISTE + registro de personal");                          
                //   $('#btn_enviar_personal').attr('disabled',true);
                //   $('#btn_enviar_personal').fadeOut();
                //   //
                //   // alert("ya tiene algun registro") 
                //   $("#txt_apellido_funcionario").val(data_func[0]['reg_apellido_completo']);
                //   $("#txt_nombre_funcionario").val(data_func[0]['reg_nombre_completo']);
                //   $("#txt_apellido_funcionario").focus();
                //   desactivar_datos_personales();
                // }
                // // 
                // $("#txt_sexo_funcionario").val(data_func[0]['reg_sexo']);
                // $("#txt_edocivil_funcionario").val(data_func[0]['reg_estado_civil']);
                // // 
                // $modal_personal.find('input[name="txt_fechanac_funcionario"]').val(data_func[0]['reg_fecha_nac']);
                // $modal_personal.find('input[name="txt_celular_funcionario"]').val(data_func[0]['reg_telefono_celular']);
                // $modal_personal.find('input[name="txt_telefono_funcionario"]').val(data_func[0]['reg_telefono_residencia']);
                // $modal_personal.find('input[name="txt_correo_funcionario"]').val(data_func[0]['reg_red_email']);
                // $modal_personal.find('input[name="txt_twitter_funcionario"]').val(data_func[0]['reg_red_twitter']);
                // $modal_personal.find('input[name="txt_direccion_funcionario"]').val(data_func[0]['reg_direccion_habitacion']);
                // // 
                // $modal_personal.find('select[name="txt_grado_instruccion"]').val(data_func[0]['reg_grado_instruccion']);
                // $modal_personal.find('input[name="txt_titulo"]').val(data_func[0]['reg_titulo_obtenido']);
                // $modal_personal.find('input[name="txt_institucion"]').val(data_func[0]['reg_institucion_educativa']);
                // // 
                // $("#txt_discapacidad").val(data_func[0]['reg_discapacidad']);
                // $modal_personal.find('input[name="txt_discapacidad_otra"]').val(data_func[0]['reg_discapacidad_otra']);
                // //
                // $modal_personal.find('select[name="txt_tipo_personal_funcional"]').val(data_func[0]['reg_tipo_personal_funcional']);
                // $modal_personal.find('input[name="txt_cargo_funcion"]').val(data_func[0]['reg_cargo_funcional']);
                // $modal_personal.find('input[name="txt_coordinacion_laboral"]').val(data_func[0]['reg_dependencia_funcional']);
                // $modal_personal.find('select[name="txt_turno_trabajo"]').val(data_func[0]['reg_turno_trabajo']);
                // //
                // $modal_personal.find('input[name="txt_horario_laboral"]').val(data_func[0]['reg_horarios_funcional']);
                // $modal_personal.find('input[name="txt_horas_doc_funcionario"]').val(data_func[0]['reg_horas_doc']);
                // //
                // $modal_personal.find('input[name="txt_tiempo_servicio"]').val(data_func[0]['reg_tiempo_servicio_plantel']);
                // $modal_personal.find('input[name="txt_horas_adm_obr_funcionario"]').val(data_func[0]['reg_horas_doc_obr']);
                // // descativamos la cedula
                // $("#txt_cedula_personal").attr('readonly',true);
              }
          },
          error: function () {
              $modal_plantel.modal('hide');
              showAlert(($modal_plantel.data('id') ? 'Update' : 'Create') + ' item error!', 'danger');
          }
      });
    }else{
      alert("Debe ingresar los datos");
    }
}); // fin boton Buscar personal

$('#btn_limpiar_personal_comision_servicio').click(function(){
  limpiar_datos_personal_comision_servicio();
});

function limpiar_datos_personal_comision_servicio(){

	$('#btn_buscar_personal_comision_servicio').attr('disabled',false);
    $('#btn_limpiar_personal_comision_servicio').attr('disabled',true);

    $("#txt_cedula_personal_comision_servicio").val('');
	$("#txt_apellido_funcionario_comision_servicio").val('');
    $("#txt_nombre_funcionario_comision_servicio").val('');

    $("#txt_cedula_personal_comision_servicio").focus();

};

function showAlert(title, type) {
    $alert.attr('class', 'alert alert-' + type || 'success')
          .html('<i class="glyphicon glyphicon-check"></i> ' + title).show();
    setTimeout(function () {
        $alert.hide();
    }, 5000);
}