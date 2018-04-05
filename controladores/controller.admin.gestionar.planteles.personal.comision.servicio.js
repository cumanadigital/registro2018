console.log("javascript controller.admin.gestionar.planteles.personal.comision.servicio");

// $('#form_modal_personal_comision_servicio').find('input, textarea, button, select').attr('disabled','disabled');

 $alert = $('.alert').hide();
 // $alert_mensaje_personal = $('#alert_mensaje_personal').hide();
// id_plantelesbase29 
$('#cuadro_comision_de_servicio').find('input, textarea, button, select').attr('disabled','disabled');


$('#btn_editar_personal_comision_servicio').hide();
$('#btn_buscar_personal_comision_servicio').show();
$('#btn_limpiar_personal_comision_servicio').show();

$('#btn_buscar_personal_comision_servicio').attr('disabled',false);
$('#btn_buscar_personal_comision_servicio').attr('readonly',false);

$('#btn_volver_listado_comision_servicio').attr('disabled',false);

$('#btn_enviar_personal_comision_servicio').attr('disabled',true);

// txt_id_plantelesbase_per_comision_servicio
// txt_cod_plantel_per_comision_servicio
// txt_id_personal_per_comision_servicio

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
	              		// $("#txt_cedula_personal_comision_servicio").attr('disabled',true);
	              		$("#txt_cedula_personal_comision_servicio").attr('readonly',true);

	              		
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
	//  __  ___          ___                   __      __   ___  __   __   __
	// |__)  |  |\ |    |__  |\ | \  / |  /\  |__)    |__) |__  |__) /__` /  \ |\ |  /\  |
	// |__)  |  | \|    |___ | \|  \/  | /~~\ |  \    |    |___ |  \ .__/ \__/ | \| /~~\ |___
	// 
	//  __   __           __     __           __   ___  __          __     __
	// /  ` /  \  |\/| | /__` | /  \ |\ |    /__` |__  |__) \  / | /  ` | /  \
	// \__, \__/  |  | | .__/ | \__/ | \|    .__/ |___ |  \  \/  | \__, | \__/
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

	    // isValidForm = true;
	    if(isValidForm){
	    	// DESACTIVAMO SEL BOTON ENVIAR
	    	$("#btn_enviar_personal_comision_servicio").attr('disabled', true);
	    	
	    	parametros = $("#form_modal_personal_comision_servicio").serialize() + '&accion='+ accion;
	      	// DESACTIVAMOS TODO EL FORMULARIO
	      	$('#cuadro_comision_de_servicio').find('input, textarea, button, select').attr('disabled','disabled');

	    	API_URL =  "servicios/services.admin.planteles.php";
		    // alert(parametros);
		    // console.log(parametros);
			$.ajax({
				url: API_URL + ($modal_personal.data('id') || ''),
				type: 'POST',
				data: parametros + "&token1="+rand_code(),
				success: function (response) {
					// $modal_personal.modal('hide');
					// ocultar  cuadros

					// desactivar_datos_personales();

					// $('#cuadro_datos_laborales').hide();
					// $('#cuadro_datos_personal').hide();
					// $('#cuadro_listado_personal').fadeIn();

					// $('#btn_volver_listado').attr('disabled',true);
					// $('#btn_enviar_personal').attr('disabled',true);

					// $('#btn_volver_listado').hide();
					// $('#btn_enviar_personal').hide();

					showAlert('Registro con éxito!', 'success');

					// $table.bootstrapTable('refresh');
					// $('#table_personal_asignado').bootstrapTable('refresh');
					// //
					// // destruimos la validacion
					// // $("#form_modal_personal_comision_servicio").validator('destroy');
					// $("#form_modal_personal_comision_servicio").bootstrapValidator('resetForm', true);

				},
				error: function () {
					// $modal_personal.modal('hide');
					showAlert(($modal_personal.data('id') ? 'Update' : 'Create') + ' item error!', 'danger');
				}
			});
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

	// $("#txt_cedula_personal_comision_servicio").attr('disabled',false);
	$("#txt_cedula_personal_comision_servicio").attr('readonly',false);
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