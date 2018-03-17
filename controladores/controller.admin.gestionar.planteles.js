    console.log("javascript - admin gestionar planteles");
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
    var API_URL_planteles =  "servicios/services.admin.planteles.php?accion=consultar_registros" + "&cedula=" + sesion_cedula + "&municipio=" + sesion_municipio + "&nivel_usuario=" + sesion_nivel_usuario ;
    // var API_URL_planteles =  "servicios/services.admin.planteles.php?accion=consultar_registros&parametro_user="+parametros_user;
    // 
    var API_URL =  "servicios/services.admin.planteles.php";
    var $table = $('#table').bootstrapTable({url: API_URL_planteles});
    var $btn_filtrar = $('#btn_filtrar');

    var table_personal_asignado = $('#table')

    // $('#form_modal_personal').bootstrapValidator('validate');

    // $('#table2').bootstrapTable();
    
    $modal_director             = $('#modal_director').modal(   {show: false, backdrop:'static'});

    $modal_plantel              = $('#modal_plantel').modal(    {show: false, backdrop:'static'});

    $modal_cargar_matricula     = $('#modal_matricula').modal(  {show: false, backdrop:'static'});

    $modal_personal             = $('#modal_personal').modal(   {show: false, backdrop:'static'});

    $modal_asignar_autoridades  = $('#ventana_modal_asignar_autoridades').modal({show: false, backdrop:'static'});

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
    $('#btn_editar_personal').hide();
    $('#cuadro_datos_laborales').hide();
    $('#cuadro_datos_personal').hide();
    $('#cuadro_listado_personal').show();

// // $(document).ready(function() {
// //     // $('.js-example-basic-single').select2();

// // });
 
$(function () {
        // 
        //  __  ___                 __   __  ___  __        __            __   __   ___  __        __       __   ___  __   __   __
        // |__)  |  |\ |      |\/| /  \ /__`  |  |__)  /\  |__)      /\  / _` |__) |__  / _`  /\  |__)     |__) |__  |__) /__` /  \ |\ |  /\  |
        // |__)  |  | \| ___  |  | \__/ .__/  |  |  \ /~~\ |  \ ___ /~~\ \__> |  \ |___ \__> /~~\ |  \ ___ |    |___ |  \ .__/ \__/ | \| /~~\ |___
        // 
        $('#btn_mostrar_agregar_personal').click(function () {

          $('#cuadro_listado_personal').hide();
          $('#cuadro_datos_personal').fadeIn();

          $('#btn_volver_listado').attr('disabled',false);
          $('#btn_enviar_personal').attr('disabled',true);
          $('#btn_continuar_datos_laboral').attr('disabled',true);

          $('#btn_volver_listado').show();
          $('#btn_enviar_personal').hide();

          limpiar_datos_personal();

          // $('#form_modal_personal').bootstrapValidator('validate');
          // $('#form_modal_personal').bootstrapValidator('resetForm', true); 
          // $('#form_modal_personal').data('formValidation').resetForm()

        });
        // 
        //  __  ___                __             ___  __              __  ___       __   __
        // |__)  |  |\ |     \  / /  \ |    \  / |__  |__)     |    | /__`  |   /\  |  \ /  \
        // |__)  |  | \| ___  \/  \__/ |___  \/  |___ |  \ ___ |___ | .__/  |  /~~\ |__/ \__/
        // 
        $('#btn_volver_listado').click(function () {
          limpiar_datos_personal();

          $('#cuadro_listado_personal').fadeIn();
          $('#cuadro_datos_personal').hide();
          $('#cuadro_datos_laborales').hide();

          $('#btn_volver_listado').attr('disabled',true);;
          $('#btn_enviar_personal').attr('disabled',false);;

          $('#btn_volver_listado').hide();
          $('#btn_enviar_personal').hide();

          $('#table_personal_asignado').bootstrapTable('refresh');
          // $table.bootstrapTable('refresh');

        });
//         $('#btn_continuar_datos_laboral').click(function(){
//           $('#cuadro_datos_laborales').fadeIn();

//         });
        //    __   __  ___  __           __        __   __        __      __   ___  __   __   __
        //   |__) /  \  |  /  \ |\ |    |__) |  | /__` /  `  /\  |__)    |__) |__  |__) /__` /  \ |\ |  /\  |
        //   |__) \__/  |  \__/ | \|    |__) \__/ .__/ \__, /~~\ |  \    |    |___ |  \ .__/ \__/ | \| /~~\ |___
        //
        $('#btn_buscar_personal').click(function () {

            accion ='consultar_funcionarios';
            cedula = $modal_personal.find('input[name="txt_cedula_personal"]').val();
            id_plantelesbase_per = $modal_personal.find('input[name="txt_id_plantelesbase_per"]').val();
            // console.log(accion)
            // console.log(cedula);
            // console.log(id_plantelesbase_per);
            if (cedula!='') {
              parametros =  'cedula=' + cedula + '&accion='+accion +'&id_plantelesbase_per='+id_plantelesbase_per + '&'+sesionencode;
              $('#btn_buscar_personal').attr('disabled',true);
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
                      if (response.trim() == 'false' ) {
                        // console.log("es falso");
                        // no existe en nomina
                        showAlert( 'CEDULA NO REGISTRADA', 'danger');
                        // showAlert('Registro con éxito!', 'success');
                        $("#txt_apellido_funcionario").val('CEDULA NO REGISTRADA');
                        $("#txt_nombre_funcionario").val('CEDULA NO REGISTRADA');
                        $("#txt_cedula_personal").focus();
                      }else{  
                        var data_func =  JSON.parse(response);
                        // console.info(data_func);
                        $('#cuadro_datos_laborales').fadeIn();
                        var reg_id_registropersonal = data_func[0]['reg_id_registropersonal'];                        
                        var nom_cargo1 = data_func[0]['nom_cargo'];
                        var nom_cod_cargo1 = data_func[0]['nom_cod_cargo'];
                        var nom_nomina1 = data_func[0]['nom_nomina'];
                        // console.log(nom_cargo1);
                        // console.log(nom_cod_cargo1);
                        // console.log(nom_nomina1);
                        var nom_personal = data_func[0]['nom_personal']; 
                        $("#txt_tipo_personal").val(nom_personal);
                        $("#txt_apellido_funcionario").val(data_func[0]['nom_nombres_apellidos']);
                        $('#resumen_laboral').html('Datos Laborales: [' + nom_cod_cargo1 + ' - ' + nom_cargo1  + ' - ' + nom_nomina1 + ']' );
                        if (reg_id_registropersonal == null) {
                          // console.info("EXISTE PERO no tiene cargo funcional");
                          $('#btn_enviar_personal').attr('disabled',false);
                          $('#btn_enviar_personal').fadeIn();
                          activar_datos_personales();
                          $('#btn_enviar_personal').attr('disabled',false);
                          $('#btn_enviar_personal').fadeIn();
                          // 
                          activar_datos_laborales();
                          // 
                          $("#txt_apellido_funcionario").val(data_func[0]['nom_nombres_apellidos']);
                          $modal_personal.find('input[name="txt_fecha_ingreso"]').val(data_func[0]['reg_fecha_ingreso']);
                          $("#txt_nombre_funcionario").val('');
                          $("#txt_apellido_funcionario").focus();
                        }else{
                          // console.info("SI EXISTE + registro de personal");                          
                          $('#btn_enviar_personal').attr('disabled',true);
                          $('#btn_enviar_personal').fadeOut();
                          //
                          // alert("ya tiene algun registro") 
                          $("#txt_apellido_funcionario").val(data_func[0]['reg_apellido_completo']);
                          $("#txt_nombre_funcionario").val(data_func[0]['reg_nombre_completo']);
                          $("#txt_apellido_funcionario").focus();
                          desactivar_datos_personales();
                        }
                        // 
                        $("#txt_sexo_funcionario").val(data_func[0]['reg_sexo']);
                        $("#txt_edocivil_funcionario").val(data_func[0]['reg_estado_civil']);
                        // 
                        $modal_personal.find('input[name="txt_fechanac_funcionario"]').val(data_func[0]['reg_fecha_nac']);
                        $modal_personal.find('input[name="txt_celular_funcionario"]').val(data_func[0]['reg_telefono_celular']);
                        $modal_personal.find('input[name="txt_telefono_funcionario"]').val(data_func[0]['reg_telefono_residencia']);
                        $modal_personal.find('input[name="txt_correo_funcionario"]').val(data_func[0]['reg_red_email']);
                        $modal_personal.find('input[name="txt_twitter_funcionario"]').val(data_func[0]['reg_red_twitter']);
                        $modal_personal.find('input[name="txt_direccion_funcionario"]').val(data_func[0]['reg_direccion_habitacion']);
                        // 
                        $modal_personal.find('select[name="txt_grado_instruccion"]').val(data_func[0]['reg_grado_instruccion']);
                        $modal_personal.find('input[name="txt_titulo"]').val(data_func[0]['reg_titulo_obtenido']);
                        $modal_personal.find('input[name="txt_institucion"]').val(data_func[0]['reg_institucion_educativa']);
                        // 
                        $("#txt_discapacidad").val(data_func[0]['reg_discapacidad']);
                        $modal_personal.find('input[name="txt_discapacidad_otra"]').val(data_func[0]['reg_discapacidad_otra']);
                        //
                        $modal_personal.find('select[name="txt_tipo_personal_funcional"]').val(data_func[0]['reg_tipo_personal_funcional']);
                        $modal_personal.find('input[name="txt_cargo_funcion"]').val(data_func[0]['reg_cargo_funcional']);
                        $modal_personal.find('input[name="txt_coordinacion_laboral"]').val(data_func[0]['reg_dependencia_funcional']);
                        $modal_personal.find('select[name="txt_turno_trabajo"]').val(data_func[0]['reg_turno_trabajo']);
                        //
                        $modal_personal.find('input[name="txt_horario_laboral"]').val(data_func[0]['reg_horarios_funcional']);
                        $modal_personal.find('input[name="txt_horas_doc_funcionario"]').val(data_func[0]['reg_horas_doc']);
                        //
                        $modal_personal.find('input[name="txt_tiempo_servicio"]').val(data_func[0]['reg_tiempo_servicio_plantel']);
                        $modal_personal.find('input[name="txt_horas_adm_obr_funcionario"]').val(data_func[0]['reg_horas_doc_obr']);
                        // descativamos la cedula
                        $("#txt_cedula_personal").attr('readonly',true);
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
        //
        //    __  ___                        __          __       __   ___  __   __   __
        //   |__)  |  |\ |     |    |  |\/| |__) |  /\  |__)     |__) |__  |__) /__` /  \ |\ |  /\  |
        //   |__)  |  | \| ___ |___ |  |  | |    | /~~\ |  \ ___ |    |___ |  \ .__/ \__/ | \| /~~\ |___
        //
        $('#btn_limpiar_personal').click(function(){
          limpiar_datos_personal();
        });
        // 
        //  __   __  ___  __           ___                   __      __                 ___  ___
        // |__) /  \  |  /  \ |\ |    |__  |\ | \  / |  /\  |__)    |__) |     /\  |\ |  |  |__  |
        // |__) \__/  |  \__/ | \|    |___ | \|  \/  | /~~\ |  \    |    |___ /~~\ | \|  |  |___ |___
        //
        $modal_plantel.find('#btn_enviar_plantel').click(function () {
            // console.log($(this).attr('id') + " --> " +  $(this).text());    
            cod_nomina = $modal_plantel.find('input[name="txt_codigo_nomina"]').val();
            plan_nombre = $modal_plantel.find('input[name="txt_plan_nombre"]').val();
            direccion = $modal_plantel.find('input[name="txt_direccion"]').val();
            telefono_fijo = $modal_plantel.find('input[name="txt_telefono_fijo"]').val();
            telefono_otro = $modal_plantel.find('input[name="txt_telefono_otro"]').val();
            correo = $modal_plantel.find('input[name="txt_correo"]').val();
            if (plan_nombre!='' && cod_nomina!= '' && direccion!= '' && telefono_fijo!= '' && correo!= '') {
              parametros = $("#form_modal_plantel").serialize() + '&accion='+ accion;
              API_URL =  "servicios/services.admin.planteles.php";
              $.ajax({
                  url: API_URL + ($modal_plantel.data('id') || ''),
                  type: 'POST',
                  data: parametros + "&token1="+rand_code(),
                  success: function (response) {
                      $modal_plantel.modal('hide');
                      showAlert('Registro con éxito!', 'success');
                      $table.bootstrapTable('refresh');
                  },
                  error: function () {
                      $modal_plantel.modal('hide');
                      showAlert(($modal_plantel.data('id') ? 'Update' : 'Create') + ' item error!', 'danger');
                  }
              });   
            }else{
              alert("Debe ingresar los datos obligatorios");
            }
        }); // ./ fin btn_enviar
        //    __   __  ___  __           ___                   __      __     __   ___  __  ___  __   __
        //   |__) /  \  |  /  \ |\ |    |__  |\ | \  / |  /\  |__)    |  \ | |__) |__  /  `  |  /  \ |__)
        //   |__) \__/  |  \__/ | \|    |___ | \|  \/  | /~~\ |  \    |__/ | |  \ |___ \__,  |  \__/ |  \
        //
        $modal_director.find('#btn_enviar_director').click(function () {
            // console.log($(this).attr('id') + " --> " +  $(this).text());    
            // console.info($("#form_modal_director").serialize() + '&accion='+ accion);
            id_nomina = $modal_director.find('input[name="txt_id_nomina"]').val();
            id_plantelesbase = $modal_director.find('input[name="txt_id_plantelesbase"]').val();
            dir_cedula = $modal_director.find('input[name="txt_dir_cedula"]').val();

            dir_nombre = $modal_director.find('input[name="txt_dir_nombre"]').val();
            dir_apellido = $modal_director.find('input[name="txt_dir_apellido"]').val();
            direccion = $modal_director.find('input[name="txt_direccion"]').val();
            fecha_nac = $modal_director.find('input[name="txt_fecha_nac"]').val();
            dir_telefono = $modal_director.find('input[name="txt_dir_telefono"]').val();
            dir_celular = $modal_director.find('input[name="txt_dir_celular"]').val();
            
            dir_email = $modal_director.find('input[name="txt_dir_email"]').val();
            dir_twitter = $modal_director.find('input[name="txt_dir_twitter"]').val();

            if (dir_nombre!='' && dir_apellido!= '' && direccion!= '' && fecha_nac!= '' && dir_telefono!= '' && dir_celular!= '' && dir_email!= '' && dir_twitter!= '') {
              parametros = $("#form_modal_director").serialize() + '&accion='+ accion;
              API_URL =  "servicios/services.admin.planteles.php";
              $.ajax({
                  url: API_URL + ($modal_plantel.data('id') || ''),
                  type: 'POST',
                  data: parametros + "&token1="+rand_code(),
                  success: function (response) {
                      $modal_director.modal('hide');
                      showAlert('Registro con éxito!', 'success');
                      $table.bootstrapTable('refresh');
                  },
                  error: function () {
                      $modal_director.modal('hide');
                      showAlert(($modal_plantel.data('id') ? 'Update' : 'Create') + ' item error!', 'danger');
                  }
              });   
            }else{
              alert("Debe ingresar los datos obligatorios");
            }
        }); // ./ fin btn_enviar
        // 
        //    __   __  ___  __           ___                   __                ___  __     __
        //   |__) /  \  |  /  \ |\ |    |__  |\ | \  / |  /\  |__)     |\/|  /\   |  |__) | /  ` |  | |     /\
        //   |__) \__/  |  \__/ | \|    |___ | \|  \/  | /~~\ |  \     |  | /~~\  |  |  \ | \__, \__/ |___ /~~\
        //
        $modal_cargar_matricula.find('#btn_enviar_matricula').click(function () {
            // console.log($(this).attr('id') + " --> " +  $(this).text());    
            // 
            var id_plantelesbase = $modal_cargar_matricula.find('input[name="txt_id_plantelesbase"]').val();
            var cod_plantel = $modal_cargar_matricula.find('input[name="txt_cod_plantel"]').val();
            // 
            var total_etapa_maternal = $modal_cargar_matricula.find('input[name="txt_total_etapa_maternal"]').val();
            var total_etapa_preescolar = $modal_cargar_matricula.find('input[name="txt_total_etapa_preescolar"]').val();
            var total_primaria = $modal_cargar_matricula.find('input[name="txt_total_primaria"]').val();
            var total_media_general = $modal_cargar_matricula.find('input[name="txt_total_media_general"]').val();
            var total_media_tecnica = $modal_cargar_matricula.find('input[name="txt_total_media_tecnica"]').val();
            var total_adulto = $modal_cargar_matricula.find('input[name="txt_total_adulto"]').val();
            var total_especial = $modal_cargar_matricula.find('input[name="txt_total_especial"]').val();
            // 
            var total_matricula = 
              parseInt(total_etapa_maternal) + 
              parseInt(total_etapa_preescolar) + 
              parseInt(total_primaria) +
              parseInt(total_media_general) + 
              parseInt(total_media_tecnica) + 
              parseInt(total_adulto) + 
              parseInt(total_especial);
            // 
            // console.log(total_inicio);
            // console.log(total_matricula);

            if (total_matricula>0) { 
              $("#btn_enviar_matricula").attr('disabled', true);
              parametros = $("#form_modal_matricula").serialize() + '&accion='+ accion;
              API_URL =  "servicios/services.admin.planteles.php";
              // console.log(parametros);
              $.ajax({
                  url: API_URL + ($modal_cargar_matricula.data('id') || ''),
                  type: 'POST',
                  data: parametros + "&token1="+rand_code(),
                  success: function (response) {
                      $modal_cargar_matricula.modal('hide');
                      showAlert('Registro con éxito!', 'success');
                      $table.bootstrapTable('refresh');
                  },
                  error: function () {
                      $modal_cargar_matricula.modal('hide');
                      showAlert(($modal_cargar_matricula.data('id') ? 'Update' : 'Create') + ' item error!', 'danger');
                  }
              });

            }else{
              alert("Debe ingresar los datos");
            }
        }); // ./ fin btn_enviar
        //
        //    __   __  ___  __           ___                   __      __   ___  __   __   __
        //   |__) /  \  |  /  \ |\ |    |__  |\ | \  / |  /\  |__)    |__) |__  |__) /__` /  \ |\ |  /\  |
        //   |__) \__/  |  \__/ | \|    |___ | \|  \/  | /~~\ |  \    |    |___ |  \ .__/ \__/ | \| /~~\ |___
        //
        //
        $modal_personal.find('#btn_enviar_personal').click(function () {
            activar_datos_personales();
            accion = "agregar_personal";
            // console.info(accion);
            // console.log($(this).attr('id') + " --> " +  $(this).text());          
 
            $('#form_modal_personal').bootstrapValidator('validate');
            var isValidForm = $('#form_modal_personal').data('bootstrapValidator').isValid();
            // alert(isValidForm);
            
            var id_plantelesbase = $modal_personal.find('input[name="txt_id_plantelesbase"]').val();
            var cod_plantel = $modal_personal.find('input[name="txt_cod_plantel_per"]').val();
            var cedula_personal = $modal_personal.find('input[name="txt_cedula_personal"]').val();

            var nombre      = $modal_personal.find('input[name="txt_nombre_funcionario"]').val();
            var apellido  = $modal_personal.find('input[name="txt_apellido_funcionario"]').val();

            var sexo        = $("#txt_sexo_funcionario").val();
            var civil       = $("#txt_edocivil_funcionario").val();

            var fecnac      = $modal_personal.find('input[name="txt_fechanac_funcionario"]').val();
            var celular     = $modal_personal.find('input[name="txt_celular_funcionario"]').val();
            var telefon     = $modal_personal.find('input[name="txt_telefono_funcionario"]').val();
            var correo      = $modal_personal.find('input[name="txt_correo_funcionario"]').val();
            var twitter     = $modal_personal.find('input[name="txt_twitter_funcionario"]').val();
            var direccion   = $modal_personal.find('input[name="txt_direccion_funcionario"]').val();

            var grado       = $("#txt_grado_instruccion").val();
            var titulo      = $modal_personal.find('input[name="txt_titulo"]').val();
            var instit      = $modal_personal.find('input[name="txt_institucion"]').val();

            var discapa     = $("#txt_discapacidad").val()  || [];
            var discapatx   = discapa.join( ", " );
            // var multipleVal = $("#txt_discapacidad").val() || [];
            // alert(discapa);
            // var multivv     = multipleVal.join( ", " )
            // console.info(discapa);
            // console.info(discapatx);
            // $("#txt_discapacidad").val(discapatx);
            var otra_disca  = $modal_personal.find('input[name="txt_discapacidad_otra"]').val();

            var tipoper     = $("#txt_tipo_personal_funcional").val();
            var tipofun     = $modal_personal.find('select[name="txt_tipo_personal_funcional"]').val();
            var cargof     = $modal_personal.find('input[name="txt_cargo_funcion"]').val();
            var coordl     = $modal_personal.find('input[name="txt_coordinacion_laboral"]').val();
            var turno     = $("#txt_turno_trabajo").val();

            var horario     = $modal_personal.find('input[name="txt_horario_laboral"]').val();
            var horasdoc     = $modal_personal.find('input[name="txt_horas_doc_funcionario"]').val();
            var horadadm     = $modal_personal.find('input[name="txt_horas_adm_obr_funcionario"]').val();

            var fechaing     = $modal_personal.find('input[name="txt_fecha_ingreso"]').val();
            var tiempo      = $modal_personal.find('input[name="txt_tiempo_servicio"]').val();

            // descativamos la cedula
            $("#txt_cedula_personal").attr('readonly',true);
            // console.info($("#form_modal_personal").serializeArray());
            
            // if (cedula_personal!=''  ) {
            // if(isValidForm){
            //   // $('#form_modal_personal').data('formValidation').resetForm();
            //   alert("mas fino es valido")  
            // }else{
            //   alert("oh oh")
            // }

            // if (cedula_personal!='' && nombre!='' && apellido!= '' && sexo!= '' && civil!= '' && fecnac!= '' && celular!= '' && telefon!= '' && direccion!= '' && grado!= '' && titulo!= '' && tipoper!= '' && tipofun!= '' && cargof!= '' && coordl!= '' && turno!= '' && horario!= '' && horasdoc!= '' && horadadm!= '' && fechaing!= '' && tiempo!= ''  ) {
            
            // $('#registrationForm').bootstrapValidator({
            //     // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
            //     feedbackIcons: {
            //         valid: 'glyphicon glyphicon-ok',
            //         invalid: 'glyphicon glyphicon-remove',
            //         validating: 'glyphicon glyphicon-refresh'
            //     },
            //     fields: {
            //         birthday: {
            //             validators: {
            //                 notEmpty: {
            //                     message: 'The date of birth is required'
            //                 },
            //                 date: {
            //                     format: 'YYYY/MM/DD',
            //                     message: 'The date of birth is not valid'
            //                 }
            //             }
            //         }
            //     }
            // });
            // });




            if(isValidForm){
              $("#btn_enviar_personal").attr('disabled', true);
              parametros = $("#form_modal_personal").serialize() + '&accion='+ accion;
              
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
                      
                      desactivar_datos_personales();
                      
                      $('#cuadro_datos_laborales').hide();
                      $('#cuadro_datos_personal').hide();
                      $('#cuadro_listado_personal').fadeIn();

                      $('#btn_volver_listado').attr('disabled',true);
                      $('#btn_enviar_personal').attr('disabled',true);

                      $('#btn_volver_listado').hide();
                      $('#btn_enviar_personal').hide();

                      // showAlert('Registro con éxito!', 'success');

                      $table.bootstrapTable('refresh');
                      $('#table_personal_asignado').bootstrapTable('refresh');
                      //
                      // destruimos la validacion
                      // $('#form_modal_personal').validator('destroy');
                      $('#form_modal_personal').bootstrapValidator('resetForm', true);

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

        //  __  ___           ___        ___  __        __
        // |__)  |  |\ |     |__  | |     |  |__)  /\  |__)
        // |__)  |  | \| ___ |    | |___  |  |  \ /~~\ |  \
        // 
        $btn_filtrar.click(function () {
            console.info('$btn_filtrar');
            $table.bootstrapTable('destroy');
            $table.bootstrapTable({url: API_URL_planteles});
            // $table_planteles.bootstrapTable('refresh');
        });


      
});
    //  ___            __     __        ___  __      ___     ___  ___  __             __              ___            __  ___    __           __   ___       __
    // |__  |  | |\ | /  ` | /  \ |\ | |__  /__`    |__  \_/  |  |__  |__) |\ |  /\  /__`     /\     |__  |  | |\ | /  `  |  | /  \ |\ |    |__) |__   /\  |  \ \ /
    // |    \__/ | \| \__, | \__/ | \| |___ .__/    |___ / \  |  |___ |  \ | \| /~~\ .__/    /~~\    |    \__/ | \| \__,  |  | \__/ | \|    |  \ |___ /~~\ |__/  |

    // 
    //  ___            __     __
    // |__  |  | |\ | /  ` | /  \ |\ |
    // |    \__/ | \| \__, | \__/ | \|
    //  __        __   __        __      __   ___  __   __   __
    // |__) |  | /__` /  `  /\  |__)    |__) |__  |__) /__` /  \ |\ |  /\  |
    // |__) \__/ .__/ \__, /~~\ |  \    |    |___ |  \ .__/ \__/ | \| /~~\ |___
    //  
    function buscar_personal(cedula,id_plantelesbase_per){
        accion ='consultar_funcionarios'; 
        parametros =  'cedula=' + cedula + '&accion='+accion +'&id_plantelesbase_per='+id_plantelesbase_per + '&'+sesionencode;
        $('#btn_buscar_personal').attr('disabled',true);
        API_URL =  "servicios/services.admin.planteles.php";
        $.ajax({
            url: API_URL + ($modal_plantel.data('id') || ''),
            type: 'POST',
            data: parametros + "&token1="+rand_code(),
            success: function (response) {
                if (response.trim() == 'false' ) {
                  // showAlert( 'CEDULA NO REGISTRADA', 'danger');
                  // // showAlert('Registro con éxito!', 'success');
                  // $("#txt_apellido_funcionario").val('CEDULA NO REGISTRADA');
                  // $("#txt_nombre_funcionario").val('CEDULA NO REGISTRADA');
                  // $("#txt_cedula_personal").focus();
                }else{  
                  var data_func =  JSON.parse(response);
                  // console.info(data_func);
                  var reg_id_registropersonal = data_func[0]['reg_id_registropersonal'];
                  var nom_cargo1 = data_func[0]['nom_cargo'];
                  var nom_cod_cargo1 = data_func[0]['nom_cod_cargo'];
                  var nom_nomina1 = data_func[0]['nom_nomina'];

                  var nom_personal = data_func[0]['nom_personal'];
                  // 
                  // $("#txt_cedula_personal").val(cedula);
                  $modal_personal.find('input[name="txt_cedula_personal"]').val(cedula);
                  $("#txt_tipo_personal").val(nom_personal);
                  $("#txt_apellido_funcionario").val(data_func[0]['nom_nombres_apellidos']);
                  $('#resumen_laboral').html('Datos Laborales: [' + nom_cod_cargo1 + ' - ' + nom_cargo1  + ' - ' + nom_nomina1 + ']' );
                  // 
                  $("#txt_apellido_funcionario").val(data_func[0]['nom_nombres_apellidos']);
                  $modal_personal.find('input[name="txt_fecha_ingreso"]').val(data_func[0]['reg_fecha_ingreso']);
                  $("#txt_apellido_funcionario").val(data_func[0]['reg_apellido_completo']);
                  $("#txt_nombre_funcionario").val(data_func[0]['reg_nombre_completo']);
                  // 
                  $("#txt_apellido_funcionario").focus();
                  // 
                  $("#txt_sexo_funcionario").val(data_func[0]['reg_sexo']);
                  $("#txt_edocivil_funcionario").val(data_func[0]['reg_estado_civil']);
                  // 
                  $modal_personal.find('input[name="txt_fechanac_funcionario"]').val(data_func[0]['reg_fecha_nac']);
                  $modal_personal.find('input[name="txt_celular_funcionario"]').val(data_func[0]['reg_telefono_celular']);
                  $modal_personal.find('input[name="txt_telefono_funcionario"]').val(data_func[0]['reg_telefono_residencia']);
                  $modal_personal.find('input[name="txt_correo_funcionario"]').val(data_func[0]['reg_red_email']);
                  $modal_personal.find('input[name="txt_twitter_funcionario"]').val(data_func[0]['reg_red_twitter']);
                  $modal_personal.find('input[name="txt_direccion_funcionario"]').val(data_func[0]['reg_direccion_habitacion']);
                  // 
                  $modal_personal.find('select[name="txt_grado_instruccion"]').val(data_func[0]['reg_grado_instruccion']);
                  $modal_personal.find('input[name="txt_titulo"]').val(data_func[0]['reg_titulo_obtenido']);
                  $modal_personal.find('input[name="txt_institucion"]').val(data_func[0]['reg_institucion_educativa']);
                  // 
                  $("#txt_discapacidad").val(data_func[0]['reg_discapacidad']);
                  $modal_personal.find('input[name="txt_discapacidad_otra"]').val(data_func[0]['reg_discapacidad_otra']);
                  // 
                  $modal_personal.find('select[name="txt_tipo_personal_funcional"]').val(data_func[0]['reg_tipo_personal_funcional']);
                  $modal_personal.find('input[name="txt_cargo_funcion"]').val(data_func[0]['reg_cargo_funcional']);
                  $modal_personal.find('input[name="txt_coordinacion_laboral"]').val(data_func[0]['reg_dependencia_funcional']);
                  $modal_personal.find('select[name="txt_turno_trabajo"]').val(data_func[0]['reg_turno_trabajo']);
                  // 
                  $modal_personal.find('input[name="txt_horario_laboral"]').val(data_func[0]['reg_horarios_funcional']);
                  $modal_personal.find('input[name="txt_horas_doc_funcionario"]').val(data_func[0]['reg_horas_doc']);
                  $modal_personal.find('input[name="txt_tiempo_servicio"]').val(data_func[0]['reg_tiempo_servicio_plantel']);
                  // 
                  $modal_personal.find('input[name="txt_horas_adm_obr_funcionario"]').val(data_func[0]['reg_horas_doc_obr']);
                }
            },
            error: function () {
                $modal_plantel.modal('hide');
                showAlert(($modal_plantel.data('id') ? 'Update' : 'Create') + ' item error!', 'danger');
            }
        });
    };

    //       __  ___              __       __       ___  __   __       __   ___  __   __   __                  ___  __
    //  /\  /  `  |  | \  /  /\  |__)     |  \  /\   |  /  \ /__`     |__) |__  |__) /__` /  \ |\ |  /\  |    |__  /__`
    // /~~\ \__,  |  |  \/  /~~\ |  \ ___ |__/ /~~\  |  \__/ .__/ ___ |    |___ |  \ .__/ \__/ | \| /~~\ |___ |___ .__/

    function activar_datos_personales(){

          // $modal_personal.find('input[name="txt_cedula_personal"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_nombre_funcionario"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_apellido_funcionario"]').attr('disabled',false);
          
          $modal_personal.find('select[name="txt_sexo_funcionario"]').attr('disabled',false);
          $modal_personal.find('select[name="txt_edocivil_funcionario"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_fechanac_funcionario"]').attr('disabled',false);
          
          $modal_personal.find('input[name="txt_celular_funcionario"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_telefono_funcionario"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_correo_funcionario"]').attr('disabled',false);

          $modal_personal.find('input[name="txt_twitter_funcionario"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_direccion_funcionario"]').attr('disabled',false);

          $modal_personal.find('select[name="txt_grado_instruccion"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_titulo"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_institucion"]').attr('disabled',false);

          $modal_personal.find('select[id="txt_discapacidad"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_discapacidad_otra"]').attr('disabled',false);

          // datos laborales
          $modal_personal.find('select[name="txt_tipo_personal_funcional"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_cargo_funcion"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_coordinacion_laboral"]').attr('disabled',false);
          $modal_personal.find('select[name="txt_turno_trabajo"]').attr('disabled',false);

          $modal_personal.find('input[name="txt_horario_laboral"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_horas_doc_funcionario"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_horas_adm_obr_funcionario"]').attr('disabled',false);

          $modal_personal.find('input[name="txt_fecha_ingreso"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_tiempo_servicio"]').attr('disabled',false);

          $("#txt_cedula_personal").attr('readonly',true);
    }

    //       __  ___              __       __       ___  __   __                 __   __   __             ___  __
    //  /\  /  `  |  | \  /  /\  |__)     |  \  /\   |  /  \ /__`     |     /\  |__) /  \ |__)  /\  |    |__  /__`
    // /~~\ \__,  |  |  \/  /~~\ |  \ ___ |__/ /~~\  |  \__/ .__/ ___ |___ /~~\ |__) \__/ |  \ /~~\ |___ |___ .__/

    function activar_datos_laborales(){
          // datos laborales
          $modal_personal.find('select[name="txt_tipo_personal_funcional"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_cargo_funcion"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_coordinacion_laboral"]').attr('disabled',false);
          $modal_personal.find('select[name="txt_turno_trabajo"]').attr('disabled',false);
          //
          $modal_personal.find('input[name="txt_horario_laboral"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_horas_doc_funcionario"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_horas_adm_obr_funcionario"]').attr('disabled',false);

          $modal_personal.find('input[name="txt_fecha_ingreso"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_tiempo_servicio"]').attr('disabled',false);
    }

    function desactivar_datos_personales(){

          $modal_personal.find('input[name="txt_cedula_personal"]').attr('disabled',false);
          $modal_personal.find('input[name="txt_nombre_funcionario"]').attr('disabled',true);
          $modal_personal.find('input[name="txt_apellido_funcionario"]').attr('disabled',true);
          
          $modal_personal.find('select[name="txt_sexo_funcionario"]').attr('disabled',true);
          $modal_personal.find('select[name="txt_edocivil_funcionario"]').attr('disabled',true);
          // $("#txt_sexo_funcionario").val('');
          // $("#txt_edocivil_funcionario").val('');

          $modal_personal.find('input[name="txt_fechanac_funcionario"]').attr('disabled',true);
          $modal_personal.find('input[name="txt_celular_funcionario"]').attr('disabled',true);
          $modal_personal.find('input[name="txt_telefono_funcionario"]').attr('disabled',true);
          $modal_personal.find('input[name="txt_correo_funcionario"]').attr('disabled',true);
          $modal_personal.find('input[name="txt_twitter_funcionario"]').attr('disabled',true);
          $modal_personal.find('input[name="txt_direccion_funcionario"]').attr('disabled',true);

          $modal_personal.find('select[name="txt_grado_instruccion"]').attr('disabled',true);
          $modal_personal.find('input[name="txt_titulo"]').attr('disabled',true);
          $modal_personal.find('input[name="txt_institucion"]').attr('disabled',true);

          $modal_personal.find('select[id="txt_discapacidad"]').attr('disabled',true);
          $modal_personal.find('input[name="txt_discapacidad_otra"]').attr('disabled',true);

          // datos laborales
          $modal_personal.find('select[name="txt_tipo_personal_funcional"]').attr('disabled',true);
          $modal_personal.find('input[name="txt_cargo_funcion"]').attr('disabled',true);
          $modal_personal.find('input[name="txt_coordinacion_laboral"]').attr('disabled',true);
          $modal_personal.find('select[name="txt_turno_trabajo"]').attr('disabled',true);

          $modal_personal.find('input[name="txt_horario_laboral"]').attr('disabled',true);
          $modal_personal.find('input[name="txt_horas_doc_funcionario"]').attr('disabled',true);
          $modal_personal.find('input[name="txt_horas_adm_obr_funcionario"]').attr('disabled',true);

          $modal_personal.find('input[name="txt_fecha_ingreso"]').attr('disabled',true);
          $modal_personal.find('input[name="txt_tiempo_servicio"]').attr('disabled',true);

           $("#txt_cedula_personal").attr('readonly',false);

    }

    function limpiar_datos_personal(){
          // LIMPIAR CAMPOS DE FORMULARIO PERSONAL
          // 
          
          $('#btn_editar_personal').hide();
          $('#btn_buscar_personal').show();
          $('#btn_limpiar_personal').show();
          $('#btn_buscar_personal').attr('disabled',false);
          $('#btn_buscar_personal').attr('readonly',false);
          $('#btn_volver_listado').attr('disabled',false);
          $('#btn_enviar_personal').attr('disabled',true);
          $('#btn_continuar_datos_laboral').attr('disabled',true);

          $('#btn_volver_listado').show();
          $('#btn_enviar_personal').hide();
          $('#btn_continuar_datos_laboral').hide();

          $('#cuadro_datos_laborales').hide();

          $modal_personal.find('input[name="txt_cedula_personal"]').val('');
          $modal_personal.find('input[name="txt_nombre_funcionario"]').val('');
          $modal_personal.find('input[name="txt_apellido_funcionario"]').val('');
          
          // $modal_personal.find('select[name="txt_sexo_funcionario"]').val('');
          // $modal_personal.find('input[name="txt_edocivil_funcionario"]').val('');
          $("#txt_sexo_funcionario").val('');
          $("#txt_edocivil_funcionario").val('');

          $modal_personal.find('input[name="txt_fechanac_funcionario"]').val('');
          $modal_personal.find('input[name="txt_celular_funcionario"]').val('');
          $modal_personal.find('input[name="txt_telefono_funcionario"]').val('');
          $modal_personal.find('input[name="txt_correo_funcionario"]').val('');
          $modal_personal.find('input[name="txt_twitter_funcionario"]').val('');
          $modal_personal.find('input[name="txt_direccion_funcionario"]').val('');

          $("#txt_grado_instruccion").val('');
          $modal_personal.find('input[name="txt_titulo"]').val('');
          $modal_personal.find('input[name="txt_institucion"]').val('');

          $("#txt_discapacidad").val('');
          $modal_personal.find('input[name="txt_discapacidad_otra"]').val('');


          $('#resumen_laboral').html('Datos Laborales');

          $("#txt_tipo_personal_funcional").val('');
          // $modal_personal.find('select[name="txt_tipo_personal_funcional"]').val('');
          $modal_personal.find('input[name="txt_cargo_funcion"]').val('');
          $modal_personal.find('input[name="txt_coordinacion_laboral"]').val('');
          $("#txt_turno_trabajo").val('');

          $modal_personal.find('input[name="txt_horario_laboral"]').val('');
          $modal_personal.find('input[name="txt_horas_doc_funcionario"]').val('');
          $modal_personal.find('input[name="txt_horas_adm_obr_funcionario"]').val('');

          $modal_personal.find('input[name="txt_fecha_ingreso"]').val('');
          $modal_personal.find('input[name="txt_tiempo_servicio"]').val('');

          desactivar_datos_personales();

          $modal_personal.find('input[name="txt_cedula_personal"]').focus();

    };


    function queryParams() {
        var params = {};
        $('#toolbar1').find('select[name]').each(function () {
            params[$(this).attr('name')] = $(this).val();
            // console.info($(this).val())
        });
        return params;
    }

    function responseHandler(res) {
        // console.info(res.rows)
        return res.rows;
    }

    function actionFormatter(value,row) {
        // console.info(row['nivel_estatus']);
        // console.info(row.nivel_estatus);
        var icon="";
        if (row.nivel_estatus == 'ABIERTO' ) {
          icon+='<div class="btn-group">';
          icon+='  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
          icon+='    Seleccione <span class="caret"></span>';
          icon+='  </button>';
          icon+='  <ul class="dropdown-menu pull-right" role="menu">';
          icon+='    <li><a class="update_director" href="javascript:" title="Actualizar Datos del Director(a)"><i class="glyphicon glyphicon-blue glyphicon-user"></i>Actualizar Directivo</a></li>';
          icon+='    <li><a class="update_planteles" href="javascript:" title="Actualizar Datos del Plantel"><i class="glyphicon glyphicon-warning glyphicon glyphicon-home"></i>Actualizar Plantel</a></li>';
          icon+='    <li><a class="update_matricula" href="javascript:" title="Registrar Matricula Estudiantil"><i class="glyphicon glyphicon-red glyphicon-education "></i>Registrar Matricula</a></li>';
          icon+='    <li><a class="insert_personal" href="javascript:" title="Registrar Personal"><i class="glyphicon-blue2 fa fa-users "></i>Registrar Personal</a></li>';           
          icon+='  </ul>';
          icon+='</div>';
        }
        if (row.nivel_estatus == 'CERRADO' ) {
          icon+='  <div class="btn-group">';
          icon+='  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" disabled>';
          icon+='  Cerrado <span class="caret"></span>';
          icon+='</button>';
          // icon+='  <ul class="dropdown-menu pull-right" role="menu">';
          // icon+='    <li><a class="update_director" href="javascript:" title="Actualizar Datos del Director(a)"><i class="glyphicon glyphicon-blue glyphicon-user"></i>Actualizar Directivo</a></li>';
          // icon+='    <li><a class="update_planteles" href="javascript:" title="Actualizar Datos del Plantel"><i class="glyphicon glyphicon-warning glyphicon glyphicon-home"></i>Actualizar Plantel</a></li>';
          // icon+='    <li><a class="update_matricula" href="javascript:" title="Registrar Matricula Estudiantil"><i class="glyphicon glyphicon-red glyphicon-education "></i>Registrar Matricula</a></li>';
          // icon+='    <li><a class="insert_personal" href="javascript:" title="Registrar Personal"><i class="glyphicon-blue2 fa fa-users "></i>Registrar Personal</a></li>';           
          // icon+='  </ul>';
          icon+='</div>';
        }
        // console.info(icon)
        return icon;
        // return [
        //     '<div class="btn-group">',
        //     '  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">',
        //     '    Seleccione <span class="caret"></span>',
        //     '  </button>',
        //     '  <ul class="dropdown-menu pull-right" role="menu">',
        //     '    <li><a class="update_director" href="javascript:" title="Actualizar Datos del Director(a)"><i class="glyphicon glyphicon-blue glyphicon-user"></i>Actualizar Directivo</a></li>',
        //     '    <li><a class="update_planteles" href="javascript:" title="Actualizar Datos del Plantel"><i class="glyphicon glyphicon-warning glyphicon glyphicon-home"></i>Actualizar Plantel</a></li>',
        //     '    <li><a class="update_matricula" href="javascript:" title="Registrar Matricula Estudiantil"><i class="glyphicon glyphicon-red glyphicon-education "></i>Registrar Matricula</a></li>',
        //     '    <li><a class="insert_personal" href="javascript:" title="Registrar Personal"><i class="glyphicon-blue2 fa fa-users "></i>Registrar Personal</a></li>',           
        //     // '    <li><a class="add_autoridades" href="javascript:" title="Asignar Autoridades"><i class="glyphicon glyphicon-green glyphicon glyphicon-edit "></i>Asignar Autoridades</a></li>',
        //     '  </ul>',
        //     '</div>'
        // ].join('');
    }
    

    function actionFormatter2(value,row) {
      var icono1="";
      icono1+='<a class="consultar_personal" href="javascript:" title="Ver Registro"><i class="glyphicon glyphicon-view glyphicon-eye-open"></i></a>  '
      // icono1+='<a class="modificar_personal" href="javascript:" title="Modificar Registro"><i class="glyphicon glyphicon-warning glyphicon-edit"></i></a>  '
      if (sesion_nivel_usuario == 'ROOT' ) {
        icono1+='<a class="eliminar_personal" href="javascript:" title="Eliminar Registro"   ><i class="glyphicon glyphicon-red glyphicon-remove-circle"></i></a>';
      }
      return icono1;
    }

    function StatusFormatter(value, row) {
        var icon = "";
        //console.log(row.estatus);
        if (row.estatus == 1 ) {
          icon = '<span class="pull-center badge bg-green">Activo</span>';
        }else{
          icon ='<span class="pull-center badge bg-red">Inactivo</span>';
        }
        //return '<i class="glyphicon ' + icon + '"></i> ' + row.estatus;
        //return row.estatus;
        return icon;
    }

    function MatriculaFormatter(value, row) {
        var icon = "";
        // console.log(row);
        row.total_etapa_maternal      = row.total_etapa_maternal      | '0'; 
        row.total_etapa_preescolar    = row.total_etapa_preescolar    | '0';
        row.total_primaria            = row.total_primaria            | '0';
        row.total_media_general       = row.total_media_general       | '0';
        row.total_media_tecnica       = row.total_media_tecnica       | '0';
        row.total_adulto              = row.total_adulto              | '0';
        row.total_especial            = row.total_especial            | '0';
        row.total                     = row.total                     | '0';
        total = row.total_etapa_maternal + 
        row.total_etapa_preescolar + 
        row.total_primaria + 
        row.total_media_general + 
        row.total_media_tecnica + 
        row.total_adulto + 
        row.total_especial; 

        if (total != '0' ) {
          icon+= '<b>Total:&nbsp' + total + '</b><br>';  
        }

        if (row.total_etapa_maternal != '0' ) {
          icon+= 'Maternal:&nbsp' + row.total_etapa_maternal + '<br>';  
        }
        if (row.total_etapa_preescolar != '0' ) {
          icon+= 'Preescolar:&nbsp' + row.total_etapa_preescolar + '<br>';  
        }
        if (row.total_primaria != '0' ) {
          icon+= 'Primaria:&nbsp' + row.total_primaria + '<br>';  
        }
        if (row.total_media_general != '0' ) {
          icon+= 'Media General:&nbsp' + row.total_media_general + '<br>';  
        }
        if (row.total_media_tecnica != '0' ) {
          icon+= 'Media Técnica:&nbsp' + row.total_media_tecnica + '<br>';  
        }
        if (row.total_adulto != '0' ) {
          icon+= 'Adultos:&nbsp' + row.total_adulto + '<br>';  
        }
        if (row.total_especial != '0' ) {
          icon+= 'Especial:&nbsp' + row.total_especial + '<br>';  
        }
        // if (row.total != '0' ) {
        //   icon+= 'Total:&nbsp' + row.total + '<br>';  
        // }
        return icon;
    }

    function PersonalFormatter(value, row) {
        var icon = "";
        // console.info(row.total_docente,row.total_administrativo,row.total_obrero )
        row.total_docente           = row.total_docente      | '0'; 
        row.total_administrativo    = row.total_administrativo    | '0';
        row.total_obrero            = row.total_obrero            | '0';
        total_personal = row.total_docente + row.total_administrativo + row.total_obrero;  

        if (total_personal != '0' ) {
          icon+= '<b>Total:&nbsp' + total_personal + '</b><br>';  
        }
        if (row.total_docente != '0' ) {
          icon+= 'Docente:&nbsp' + row.total_docente + '<br>';  
        }
        if (row.total_administrativo != '0' ) {
          icon+= 'Administrativo:&nbsp' + row.total_administrativo + '<br>';  
        }
        if (row.total_obrero != '0' ) {
          icon+= 'Obrero:&nbsp' + row.total_obrero + '<br>';  
        }

        return icon;
    }

    function EstadoFormatter(value, row) {
        var icon = "";
        // console.log(row.estatus);
        // fecha_registro_matricula
        // fecha_registro_datos
        // fecha_registro_personal 
        // fecha_registro_director 
        // console.info("fecha_registro_director " + row.fecha_registro_director);
        // console.info("fecha_registro_datos " + row.fecha_registro_datos);
        // console.info("fecha_registro_matricula " + row.fecha_registro_matricula);
        // console.info("fecha_registro_personal " + row.fecha_registro_personal);

        if (row.fecha_registro_director == null ) {
          icon+='<span class="pull-center badge bg-red">Directivo</span><br>';
        }else{
          icon+= '<span class="pull-center badge bg-green">Directivo</span><br>';
        }

        if (row.fecha_registro_datos == null ) {
          icon+='<span class="pull-center badge bg-red">Plantel</span><br>';
        }else{
          icon+= '<span class="pull-center badge bg-green">Plantel</span><br>';
        }

        if (row.fecha_registro_matricula == null ) {
          icon+='<span class="pull-center badge bg-red">Matrícula</span><br>';
        }else{
          icon+= '<span class="pull-center badge bg-green">Matrícula</span><br>';
        }

        if (row.fecha_registro_personal == null ) {
          icon+='<span class="pull-center badge bg-red">Personal</span><br>';
        }else{
          icon+= '<span class="pull-center badge bg-green">Personal</span><br>';
        }
        return icon;
    }

    function actionFormatterPersonal (value,row) {
      //console.log(row);
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



    function actionFormatterNombre (value,row) {
      //console.log(row);
      // Object { nom_id_nomina: "41946", nom_cedula: "11829328", nom_nomina: "FIJO", nom_nombres_apellidos: "HERNANDEZ C OSWALDO E", nom_fecha_ingreso: "04/01/2011", nom_cod_cargo: "100000", nom_cargo: "BACHILLER I", nom_cod_dependencia: "006102200", nom_dependencia: "OFIC DE SUPERV ZONA NO 12", nom_personal: "A", 35 más… }
      nombre = row.reg_nombre_completo + " " + row.reg_apellido_completo 

      return nombre;
    }

    function actionFormatterHoras (value,row) {
        // console.log(row);
        var icon = "";
        horas_doc = parseFloat(row.reg_horas_doc);
        horas_adm = parseFloat(row.reg_horas_adm);
        horas_obr = parseFloat(row.reg_horas_obr);

        // console.info("reg_horas_doc " + parseFloat(row.reg_horas_doc))
        // console.info("reg_horas_adm " + parseFloat(row.reg_horas_adm))
        // console.info("reg_horas_obr " + parseFloat(row.reg_horas_obr))

        if ( horas_doc > 0 ) {
          icon+= 'Doc:&nbsp' + row.reg_horas_doc + '<br>';  
        }
        if ( horas_adm > 0 ) {
          icon+= 'Adm:&nbsp' + row.reg_horas_adm + '&nbsp';  
        }
        if ( horas_obr > 0 ) {
          icon+= 'Obr:&nbsp' + row.reg_horas_obr + '';  
        }
        return icon;
    }
    
    // update and delete 
    //   #     ##    #####  ###     ##    #  #   ####   #  #   ####   #  #   #####   ##
    //  # #   #  #     #     #     #  #   ## #   #      #  #   #      ## #     #    #  #
    // #   #  #        #     #     #  #   # ##   ###    #  #   ###    # ##     #     #
    // #####  #        #     #     #  #   #  #   #      ####   #      #  #     #      #
    // #   #  #  #     #     #     #  #   #  #   #       ##    #      #  #     #    #  #
    // #   #   ##      #    ###     ##    #  #   ####    ##    ####   #  #     #     ##
    window.actionEvents = {
        'click .update_director': function (e, value, row) {
            // accion='modificar_registro'
            // //console.log(row);
            console.log($(this).attr('title'));
            var titulo = $(this).attr('title') + "<br>[<font color='red'><b>" + row.cod_plantel + "</b></font>] -  <font color='blue'><b>" + row.nombre  + "</b></font>"; 
            
            $modal_director.find('input[name="txt_id_nomina"]').val(row.id_nomina);
            $modal_director.find('input[name="txt_id_plantelesbase"]').val(row.id_plantelesbase);
            $modal_director.find('input[name="txt_cod_plantel"]').val(row.cod_plantel);
            $modal_director.find('input[name="txt_dir_cedula"]').val(row.cedula);
            
            $modal_director.find('input[name="txt_dir_cedula"]').val(row.cedula);
            $modal_director.find('input[name="txt_dir_cedula"]').attr('readonly',true);


            // $modal_director.find('input[name="txt_codigo_nomina"]').val(row.cod_nomina);

            $modal_director.find('input[name="txt_dir_nombre"]').val(row.dir_nombre);
            $modal_director.find('input[name="txt_dir_apellido"]').val(row.dir_apellido);

            $modal_director.find('input[name="txt_direccion"]').val(row.dir_direccion);
            
            $modal_director.find('input[name="txt_fecha_nac"]').val(row.dir_fechanac);

            $modal_director.find('input[name="txt_dir_telefono"]').val(row.dir_telefono);
            $modal_director.find('input[name="txt_dir_celular"]').val(row.dir_celular);

            $modal_director.find('input[name="txt_dir_email"]').val(row.dir_email);
            $modal_director.find('input[name="txt_dir_twitter"]').val(row.dir_twitter);

            accion = "actualizar_director";

            $modal_director.find('button[name="btn_enviar_director"]').text("Actualizar Directivo");
            $modal_director.find('button[name="btn_enviar_director"]').attr('disabled', false);

            showModalName($modal_director,titulo,row);
        },

        'click .update_planteles': function (e, value, row) {
            // accion='modificar_registro'
            // //console.log(row);
            // console.log($(this).attr('title'));
            var titulo = $(this).attr('title') + "<br>[<font color='red'><b>" + row.cod_plantel + "</b></font>] -  <font color='blue'><b>" + row.nombre  + "</b></font>"; 
            // console.info(titulo);

            $modal_plantel.find('input[name="txt_id_plantelesbase"]').val(row.id_plantelesbase);
            $modal_plantel.find('input[name="txt_cod_plantel"]').val(row.cod_plantel);
            $modal_plantel.find('input[name="txt_cod_estadistico"]').val(row.cod_estadistico);

            $modal_plantel.find('input[name="txt_codigo_nomina"]').val(row.cod_nomina);

            $modal_plantel.find('input[name="txt_plan_nombre"]').val(row.nombre);
            $modal_plantel.find('input[name="txt_estado"]').val(row.estado);
            $modal_plantel.find('input[name="txt_municipio"]').val(row.municipio);
            $modal_plantel.find('input[name="txt_parroquia"]').val(row.parroquia);

            $modal_plantel.find('input[name="txt_direccion"]').val(row.direccion);
            $modal_plantel.find('input[name="txt_telefono_fijo"]').val(row.telefono_fijo);
            $modal_plantel.find('input[name="txt_telefono_otro"]').val(row.telefono_otro);
            $modal_plantel.find('input[name="txt_correo"]').val(row.correo);

            $("#txt_tipo_dependencia").attr('disabled', true);
            $("#txt_status").attr('disabled', true);
            $("#txt_categoria").attr('disabled', true);

            $("#txt_tipo_dependencia").val(row.tipo_dependencia);
            $("#txt_status").val(row.estatus);
            $("#txt_categoria").val(row.categoria);


            $("#txt_condicion_estudio").attr('disabled', true);
            $("#txt_tipo_matricula").attr('disabled', true);
            $("#txt_clase_plantel").attr('disabled', true);

            $("#txt_condicion_estudio").val(row.condicion_estudio);
            $("#txt_tipo_matricula").val(row.tipo_matricula);
            $("#txt_clase_plantel").val(row.clase_plantel);


            $("#txt_zona_ubicacion").attr('disabled', true);
            $("#txt_turno").attr('disabled', true);
            $("#txt_modalidad").attr('disabled', true);

            $("#txt_zona_ubicacion").val(row.zona_ubicacion);
            $("#txt_turno").val(row.turno);
            $("#txt_modalidad").val(row.modalidad);
            
            accion = "actualizar_plantel";

            $modal_plantel.find('button[name="btn_enviar_plantel"]').text("Actualizar Plantel");
            $modal_plantel.find('button[name="btn_enviar_plantel"]').attr('disabled', false);

            showModalName($modal_plantel,titulo,row);
        },
        'click .update_matricula': function (e, value, row) {
            accion = "agregar_matricula";
            // console.log(row);
            // console.log($(this).attr('title'));
            // showModal($(this).attr('title'), row); 
            var titulo = $(this).attr('title') + "<br>[<font color='red'><b>" + row.cod_plantel + "</b></font>] -  <font color='blue'><b>" + row.nombre  + "</b></font>"; 
            // console.info(titulo);

            total = row.total_etapa_maternal + 
            row.total_etapa_preescolar + 
            row.total_primaria + 
            row.total_media_general + 
            row.total_media_tecnica + 
            row.total_adulto + 
            row.total_especial;
            total_inicio = total;  
            // console.info(total);
            
            $modal_cargar_matricula.find('input[name="txt_id_plantelesbase"]').val(row.id_plantelesbase);
            $modal_cargar_matricula.find('input[name="txt_cod_plantel"]').val(row.cod_plantel);
            $modal_cargar_matricula.find('input[name="txt_codigo_nomina"]').val(row.cod_nomina);

            if (total>0) {
              $modal_cargar_matricula.find('button[name="btn_enviar_matricula"]').text("Actualizar Matricula");
            }else{
              $modal_cargar_matricula.find('button[name="btn_enviar_matricula"]').text("Agregar Matricula");
            }
            $modal_cargar_matricula.find('input[name="txt_total_etapa_maternal"]').val(row.total_etapa_maternal);
            $modal_cargar_matricula.find('input[name="txt_total_etapa_preescolar"]').val(row.total_etapa_preescolar);
            $modal_cargar_matricula.find('input[name="txt_total_primaria"]').val(row.total_primaria);
            $modal_cargar_matricula.find('input[name="txt_total_media_general"]').val(row.total_media_general);
            $modal_cargar_matricula.find('input[name="txt_total_media_tecnica"]').val(row.total_media_tecnica);
            $modal_cargar_matricula.find('input[name="txt_total_adulto"]').val(row.total_adulto);
            $modal_cargar_matricula.find('input[name="txt_total_especial"]').val(row.total_especial);

            $("#btn_enviar_matricula").attr('disabled', false);
            // $modal_cargar_matricula.find('button[name="btn_enviar_matricula"]')attr('disabled', true);
            
            showModalName($modal_cargar_matricula,titulo,row);
            // showModalName($modal_plantel,titulo,row);
            // showModalName($modal_director,titulo,row);
        },

        'click .insert_personal': function (e, value, row) {
            accion = "agregar_personal";
            // console.log(row);
            // console.log($(this).attr('title'));
            var titulo = $(this).attr('title') + "<br>[<font color='red'><b>" + row.cod_plantel + "</b></font>] -  <font color='blue'><b>" + row.nombre  + "</b></font>"; 
            // console.info(titulo);
            // console.info(accion);
            // console.info(row.id_plantelesbase);
            // console.info(titulo);
            // console.info(row);
            
            // $('#form_modal_personal').bootstrapValidator('validate');
            // $('#form_modal_personal').bootstrapValidator('resetForm', true); 

            $modal_personal.find('input[name="txt_id_plantelesbase_per"]').val(row.id_plantelesbase);
            $modal_personal.find('input[name="txt_cod_plantel_per"]').val(row.cod_plantel);
            $modal_personal.find('button[name="btn_enviar_personal"]').text("Agregar Personal");
            $("#btn_enviar_personal").attr('disabled', true);
            
            limpiar_datos_personal();

            $('#cuadro_datos_laborales').hide();
            $('#cuadro_datos_personal').hide();
            $('#cuadro_listado_personal').show();

            $('#btn_volver_listado').attr('disabled',true);
            $('#btn_enviar_personal').attr('disabled',true);
            $('#btn_continuar_datos_laboral').attr('disabled',true);

            $('#btn_volver_listado').hide();
            $('#btn_continuar_datos_laboral').hide();
            $('#btn_enviar_personal').hide();

            var API_URL_personal =  "servicios/services.admin.planteles.php?accion=consultar_personal_asignado&id_plantelesbase=" + row.id_plantelesbase;
            $('#table_personal_asignado').bootstrapTable('destroy' ); 
            $('#table_personal_asignado').bootstrapTable({url: API_URL_personal});

            showModalName($modal_personal,titulo,row);
        },
        'click .add_autoridades': function (e, value, row) {
            accion='add_autoridades'
            // console.log(e);
            // console.log(value);
            // console.log(row);
            // console.log($(this).attr('title'));
            // alert($(this).attr('title'));
            // showAlert($(this).attr('title'), 'success');
            // showModal($(this).attr('title'), row);
            // plan_codigodea: "OD04691901", 
            // plan_codestadistico: "190018", 
            // plan_codnomina: "123456", 
            // plan_codnominadep: "", 
            // plan_nombre: "U E BOLIVARIANA RIO GRANDE",
            // 
            $('#cuadro_busqueda_datos_laborales').hide();
            var $table2 = $('#table2').bootstrapTable('destroy' );
            // var $table2 = $('#table2').bootstrapTable( { data : data_func } );


            // 
            title_plan_nombre = $(this).attr('title') + ' - ' + row['plan_nombre'] + ' [' + row['plan_codigodea'] + ']';  

            // LIMPIAR CAMPOS DE FORMULARIO AL ABRIR LA MODAL
            $modal_asignar_autoridades.find('input[name="txt_id_plantel"]').val('');
            $modal_asignar_autoridades.find('input[name="txt_id_periodo"]').val('');
            $modal_asignar_autoridades.find('input[name="txt_id_personal"]').val('');
            $modal_asignar_autoridades.find('input[name="txt_cedula_personal"]').val('');
            $modal_asignar_autoridades.find('input[name="txt_nombre_funcionario"]').val('');

            $modal_asignar_autoridades.find('input[name="txt_id_plantel"]').val(row['plan_uid']);

            $modal_asignar_autoridades.find('.modal-title').text(title_plan_nombre);


            $("#btn_enviar_modal").attr('disabled', true);
            // $("#btn_enviar_modal").hide();

            showModalName($modal_asignar_autoridades,$(this).attr('title'), row);
              
        }

        // 'click .remove': function (e, value, row) {
        //     // console.log($(this).attr('title'));
        //     accion='eliminar_registro'
        //     if (row.estatus ==1) {
        //       var estatus ="Activo";
        //     }else{
        //       var estatus ="Inactivo";
        //     }  
        //     if (confirm('Esta seguro de eleminar este item? \n ' + row.nombre_periodo + ' \n ' +row.fecha_inicio + ' - ' +row.fecha_cierre + '\n ' + estatus)) {
        //         $.ajax({
        //             url: API_URL + '?id_periodo=' +row.id_periodo + '&accion=' + accion ,
        //             //type: 'POST',
        //             success: function () {
        //                 $table.bootstrapTable('refresh');
        //                 showAlert('Registro borrado con exito!', 'success');
        //             },
        //             error: function () {
        //                 showAlert('Delete item error!', 'danger');
        //             }
        //         })
        //     }
        // }
    };

    window.actionEvents2 = {
        'click .eliminar_personal': function (e, value, row) {
            accion='eliminar_personal';
            // console.log(accion, row);
            console.log(accion);
            console.log(row.reg_id_registropersonal);
            console.log(row.reg_cedula);
            console.log(row.reg_id_plantelesbase);
            var id_registropersonal = row.reg_id_registropersonal;
            var id_plantelesbase = row.reg_id_plantelesbase;
            // ocultamos el cuadro de seleccion de cargo funcional 
            // $('#cuadro_busqueda_datos_laborales').fadeOut(300);
            // alert("Eliminar personal \n" + row.reg_cedula + "\n" + row.reg_apellido_completo + " " + row.reg_nombre_completo);
            if (confirm('Esta seguro que desea eliminar este Registro? \n ' + row.reg_cedula + "\n" + row.reg_apellido_completo + " " + row.reg_nombre_completo)) {
                $.ajax({
                    url: API_URL + '?id_registropersonal=' +id_registropersonal + '&id_plantelesbase=' + id_plantelesbase + '&accion=' + accion ,
                    //type: 'POST',
                    success: function () {
                        // $table.bootstrapTable('destroy');
                        // $('#table_personal_asignado').bootstrapTable('destroy' ); 
                        $('#table_personal_asignado').bootstrapTable('refresh' ); 
                        // $('#table_personal_asignado').bootstrapTable('destroy' ); 
                        // $('#table_personal_asignado').bootstrapTable({url: API_URL_personal});

                        // $table.bootstrapTable('refresh');
                        // $('#table_personal_asignado').bootstrapTable({url: API_URL_personal});

                        showAlert('Registro borrado con exito!', 'success');
                    },
                    error: function () {
                        showAlert('Delete item error!', 'danger');
                    }
                })
            }
        },
        'click .consultar_personal': function (e, value, row) {
            accion='consultar_personal';
            
            // alert ('click .consultar_personal');
            console.log(accion, row);
            console.log(accion);
            console.log(row.reg_id_registropersonal);
            console.log(row.reg_cedula);
            console.log(row.reg_id_plantelesbase);

            var cedula = row.reg_cedula;
            var id_plantelesbase_per = row.reg_id_registropersonal;
            var id_registropersonal = row.reg_id_registropersonal;
            var id_plantelesbase = row.reg_id_plantelesbase;
            
            desactivar_datos_personales();
            $('#btn_editar_personal').show();
            $('#cuadro_listado_personal').hide(300);
            $('#cuadro_datos_personal').fadeIn(300);
            $('#cuadro_datos_laborales').fadeIn(300);
            
            
            $("#txt_cedula_personal").attr('readonly',true);
            $("#txt_cedula_personal").attr('disabled',true);            
            $('#btn_volver_listado').show();

            $('#btn_volver_listado').show();
            $('#btn_volver_listado').attr('disabled',false);

            $('#btn_buscar_personal').attr('disabled',true);
            $('#btn_limpiar_personal').attr('disabled',true);

            $('#btn_buscar_personal').hide();
            $('#btn_limpiar_personal').hide();

            buscar_personal(cedula,id_plantelesbase_per);
        }
    };


    function showModalName(ventana,title,row) {
      ventana.find('.modal-title').html(title);
      ventana.modal('show');
    }
    //
    function showModal(title, row) {
        // row = row || {
        //     id_periodo: '',
        //     nombre_periodo: '',
        //     //rango_fecha: '',
        //     fecha_inicio:'',
        //     fecha_cierre:'',
        //     estatus: 0
        // }; // default row value
        // console.log(accion);
        // if (accion=='agregar_registros') {
        //   //code
        //   // habilitamos los check - activo
        //   $modal_plantel.find('.modal-title').text(title);
        //   $("#txt_radio_estatus0").prop("checked" , true ) 
        //   $("#txt_radio_estatus0").prop('disabled', false);
        //   $("#txt_radio_estatus1").prop('disabled', true);
        //   //$modal_plantel.find('button[name="btn_enviar_plantel"]').text("Modificar Plantel");
        //   $modal_plantel.find('button[name="btn_enviar_plantel"]').text("Agregar Plantel");
        // }

        // if (accion=='ver_registro') {
        //   $modal_plantel.find('button[name="btn_enviar_plantel"]').text("Ver Plantel");          
        // }

        // if (accion=='modificar_registro' ) {
        //   $modal_plantel.find('button[name="btn_enviar_plantel"]').text("Modificar Plantel");
        // }
        // $modal_plantel.modal('show');
    }

    function showAlert(title, type) {
        $alert.attr('class', 'alert alert-' + type || 'success')
              .html('<i class="glyphicon glyphicon-check"></i> ' + title).show();
        setTimeout(function () {
            $alert.hide();
        }, 5000);
    }