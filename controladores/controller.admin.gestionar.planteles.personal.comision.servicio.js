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


$(function () {

	
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
	// $("[id*='gestion_polizas']").one("click",function () {

	// $('#btn_buscar_personal_comision_servicio').("click",function(){

	// });
	$('#btn_buscar_personal_comision_servicio').click(function(e) {
	// $('#btn_buscar_personal_comision_servicio').("click",function(){
	    e.stopPropagation();
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
	                var msg1 = "CEDULA REGISTRADA EN NOMINA MPPE \nNo puede ser registrado como Comisión de Sevicio \nDebe ser agregado por el módulo de Registrar Personal";
	                showAlert( 'CEDULA REGISTRADA EN NOMINA MPPE', 'danger');
	                alert(msg1);

	                // showAlert('Registro con éxito!', 'success');
	                $('#btn_enviar_personal_comision_servicio').attr('disabled',true);
					$('#btn_enviar_personal_comision_servicio').hide();
	                
	                $("#txt_apellido_funcionario_comision_servicio").val('REGISTRADO MPPE');
	                $("#txt_nombre_funcionario_comision_servicio").val('REGISTRADO MPPE');

	                $("#txt_cedula_personal_comision_servicio").focus();
	              }else{

	              	if (response.trim() == 'NO REGISTRADO' ) { 
	              		$('#cuadro_comision_de_servicio').find('input, textarea, button, select').attr('disabled',false);
	              		$("#txt_cedula_personal_comision_servicio").attr('disabled',true);
	              		
	              		$('#btn_buscar_personal_comision_servicio').attr('disabled',true);
	    				$('#btn_limpiar_personal_comision_servicio').attr('disabled',false);
	              		
	              		//ACTIVAMOS EL BOTON DE GUARDAR
	              		$('#btn_enviar_personal_comision_servicio').attr('disabled',false);
						$('#btn_enviar_personal_comision_servicio').show();

	              		$("#txt_apellido_funcionario_comision_servicio").focus();
	 
	              		
	              	}else{
	                	var data_func =  JSON.parse(response);
		                // // console.info(data_func);
	              	}
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

	//    __   __  ___  __           ___                   __      __   ___  __   __   __
	//   |__) /  \  |  /  \ |\ |    |__  |\ | \  / |  /\  |__)    |__) |__  |__) /__` /  \ |\ |  /\  |
	//   |__) \__/  |  \__/ | \|    |___ | \|  \/  | /~~\ |  \    |    |___ |  \ .__/ \__/ | \| /~~\ |___
	//
	//
	// $('#btn_enviar_personal_comision_servicio').click(function (e) {
	$("#btn_enviar_personal_comision_servicio").unbind('click').bind('click', function(e){
	    // // activar_datos_personales();
	    e.stopPropagation();
	    accion = "agregar_personal_comision_servicio";
	    console.info(accion);
	    // // console.log($(this).attr('id') + " --> " +  $(this).text());          

	    $('#form_modal_personal_comision_servicio').bootstrapValidator('validate');
	    var isValidForm = $('#form_modal_personal_comision_servicio').data('bootstrapValidator').isValid();
	    // alert(isValidForm);
	    
	    // var id_plantelesbase = $modal_personal.find('input[name="txt_id_plantelesbase"]').val();
	    // var cod_plantel = $modal_personal.find('input[name="txt_cod_plantel_per"]').val();
	    // var cedula_personal = $modal_personal.find('input[name="txt_cedula_personal"]').val();

	    // var nombre      = $modal_personal.find('input[name="txt_nombre_funcionario"]').val();
	    // var apellido  = $modal_personal.find('input[name="txt_apellido_funcionario"]').val();

	    // var sexo        = $("#txt_sexo_funcionario").val();
	    // var civil       = $("#txt_edocivil_funcionario").val();

	    // var fecnac      = $modal_personal.find('input[name="txt_fechanac_funcionario"]').val();
	    // var celular     = $modal_personal.find('input[name="txt_celular_funcionario"]').val();
	    // var telefon     = $modal_personal.find('input[name="txt_telefono_funcionario"]').val();
	    // var correo      = $modal_personal.find('input[name="txt_correo_funcionario"]').val();
	    // var twitter     = $modal_personal.find('input[name="txt_twitter_funcionario"]').val();
	    // var direccion   = $modal_personal.find('input[name="txt_direccion_funcionario"]').val();

	    // var grado       = $("#txt_grado_instruccion").val();
	    // var titulo      = $modal_personal.find('input[name="txt_titulo"]').val();
	    // var instit      = $modal_personal.find('input[name="txt_institucion"]').val();

	    // var discapa     = $("#txt_discapacidad").val()  || [];
	    // var discapatx   = discapa.join( ", " );


	    // // // var multipleVal = $("#txt_discapacidad").val() || [];
	    // // // alert(discapa);
	    // // // var multivv     = multipleVal.join( ", " )
	    // // // console.info(discapa);
	    // // // console.info(discapatx);
	    // // // $("#txt_discapacidad").val(discapatx);
	    // var otra_disca  = $modal_personal.find('input[name="txt_discapacidad_otra"]').val();

	    // var tipoper     = $("#txt_tipo_personal_funcional").val();
	    // var tipofun     = $modal_personal.find('select[name="txt_tipo_personal_funcional"]').val();
	    // var cargof     = $modal_personal.find('input[name="txt_cargo_funcion"]').val();
	    // var coordl     = $modal_personal.find('input[name="txt_coordinacion_laboral"]').val();
	    // var turno     = $("#txt_turno_trabajo").val();

	    // var horario     = $modal_personal.find('input[name="txt_horario_laboral"]').val();
	    // var horasdoc     = $modal_personal.find('input[name="txt_horas_doc_funcionario"]').val();
	    // var horadadm     = $modal_personal.find('input[name="txt_horas_adm_obr_funcionario"]').val();

	    // var fechaing     = $modal_personal.find('input[name="txt_fecha_ingreso"]').val();
	    // var tiempo      = $modal_personal.find('input[name="txt_tiempo_servicio"]').val();

	    // // descativamos la cedula
	    // $("#txt_cedula_personal").attr('readonly',true);
	    // // console.info($("#form_modal_personal").serializeArray());
	    
	    // // if (cedula_personal!=''  ) {
	    // // if(isValidForm){
	    // //   // $('#form_modal_personal').data('formValidation').resetForm();
	    // //   alert("mas fino es valido")  
	    // // }else{
	    // //   alert("oh oh")
	    // // }

	    // // if (cedula_personal!='' && nombre!='' && apellido!= '' && sexo!= '' && civil!= '' && fecnac!= '' && celular!= '' && telefon!= '' && direccion!= '' && grado!= '' && titulo!= '' && tipoper!= '' && tipofun!= '' && cargof!= '' && coordl!= '' && turno!= '' && horario!= '' && horasdoc!= '' && horadadm!= '' && fechaing!= '' && tiempo!= ''  ) {
	    
	    // // $('#registrationForm').bootstrapValidator({
	    // //     // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
	    // //     feedbackIcons: {
	    // //         valid: 'glyphicon glyphicon-ok',
	    // //         invalid: 'glyphicon glyphicon-remove',
	    // //         validating: 'glyphicon glyphicon-refresh'
	    // //     },
	    // //     fields: {
	    // //         birthday: {
	    // //             validators: {
	    // //                 notEmpty: {
	    // //                     message: 'The date of birth is required'
	    // //                 },
	    // //                 date: {
	    // //                     format: 'YYYY/MM/DD',
	    // //                     message: 'The date of birth is not valid'
	    // //                 }
	    // //             }
	    // //         }
	    // //     }
	    // // });
	    // // });

	    if(isValidForm){
	    //   $("#btn_enviar_personal").attr('disabled', true);
	    //   parametros = $("#form_modal_personal").serialize() + '&accion='+ accion;
	      
	    //   API_URL =  "servicios/services.admin.planteles.php";
	    //   // alert(parametros);
	    //   // console.log(parametros);
	    //   $.ajax({
	    //       url: API_URL + ($modal_personal.data('id') || ''),
	    //       type: 'POST',
	    //       data: parametros + "&token1="+rand_code(),
	    //       success: function (response) {
	    //           // $modal_personal.modal('hide');
	    //           // ocultar  cuadros
	              
	    //           desactivar_datos_personales();
	              
	    //           $('#cuadro_datos_laborales').hide();
	    //           $('#cuadro_datos_personal').hide();
	    //           $('#cuadro_listado_personal').fadeIn();

	    //           $('#btn_volver_listado').attr('disabled',true);
	    //           $('#btn_enviar_personal').attr('disabled',true);

	    //           $('#btn_volver_listado').hide();
	    //           $('#btn_enviar_personal').hide();

	    //           // showAlert('Registro con éxito!', 'success');

	    //           $table.bootstrapTable('refresh');
	    //           $('#table_personal_asignado').bootstrapTable('refresh');
	    //           //
	    //           // destruimos la validacion
	    //           // $('#form_modal_personal').validator('destroy');
	    //           $('#form_modal_personal').bootstrapValidator('resetForm', true);
	    //           
	    //       },
	    //       error: function () {
	    //           // $modal_personal.modal('hide');
	    //           showAlert(($modal_personal.data('id') ? 'Update' : 'Create') + ' item error!', 'danger');
	    //       }
	    //   });
	    }else{
	    	alert("Debe verificar los datos ingresados");
	    }
	}); // ./ fin btn_enviar


	//  __  ___                       __          __      __   ___  __   __   __
	// |__)  |  |\ |    |    |  |\/| |__) |  /\  |__)    |__) |__  |__) /__` /  \ |\ |  /\  |
	// |__)  |  | \|    |___ |  |  | |    | /~~\ |  \    |    |___ |  \ .__/ \__/ | \| /~~\ |___
	// 
	//  __   __           __     __           __   ___  __          __     __
	// /  ` /  \  |\/| | /__` | /  \ |\ |    /__` |__  |__) \  / | /  ` | /  \
	// \__, \__/  |  | | .__/ | \__/ | \|    .__/ |___ |  \  \/  | \__, | \__/
	// 
	$('#btn_limpiar_personal_comision_servicio').click(function(e){
		e.stopPropagation();
		limpiar_datos_personal_comision_servicio();
	});

});

// **********************************************************************************************
// 
// **********************************************************************************************
// 
// **********************************************************************************************
// 
// **********************************************************************************************
// 
// **********************************************************************************************
// 
// **********************************************************************************************
// 
// **********************************************************************************************
//  ___            __  ___    __
// |__  |  | |\ | /  `  |  | /  \ |\ |
// |    \__/ | \| \__,  |  | \__/ | \|
// 
// **********************************************************************************************
//               __          __      __       ___  __   __      __   ___  __   __   __
// |    |  |\/| |__) |  /\  |__)    |  \  /\   |  /  \ /__`    |__) |__  |__) /__` /  \ |\ |  /\  |
// |___ |  |  | |    | /~~\ |  \    |__/ /~~\  |  \__/ .__/    |    |___ |  \ .__/ \__/ | \| /~~\ |___
//  __   __           __     __           __   ___  __          __     __
// /  ` /  \  |\/| | /__` | /  \ |\ |    /__` |__  |__) \  / | /  ` | /  \
// \__, \__/  |  | | .__/ | \__/ | \|    .__/ |___ |  \  \/  | \__, | \__/
// 
function limpiar_datos_personal_comision_servicio(){

	$('#cuadro_comision_de_servicio').find('input, textarea, button, select').attr('disabled','disabled');

	$("#txt_cedula_personal_comision_servicio").attr('disabled',false);
	$('#btn_buscar_personal_comision_servicio').attr('disabled',false);
    $('#btn_limpiar_personal_comision_servicio').attr('disabled',true);

    //DESACTIVAMOS EL BOTON DE GUARDAR
	$('#btn_enviar_personal_comision_servicio').attr('disabled',true);
	$('#btn_enviar_personal_comision_servicio').hide();

    $("#txt_cedula_personal_comision_servicio").val('');
	$("#txt_apellido_funcionario_comision_servicio").val('');
    $("#txt_nombre_funcionario_comision_servicio").val('');

    $("#txt_cedula_personal_comision_servicio").focus();

	$("#btn_mostrar_agregar_personal_comision_servicio").click();

};
//  __        __                  ___  __  ___
// /__` |__| /  \ |  |  /\  |    |__  |__)  |
// .__/ |  | \__/ |/\| /~~\ |___ |___ |  \  |
// 
function showAlert(title, type) {
    $alert.attr('class', 'alert alert-' + type || 'success')
          .html('<i class="glyphicon glyphicon-check"></i> ' + title).show();
    setTimeout(function () {
        $alert.hide();
    }, 5000);
}