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

    // ventana_personal             = $('#ventana_personal').modal(   {show: false, backdrop:'static'});
    ventana_personal      = $('#ventana_personal');
    ventana_footer = $("#ventana_footer");
    ventana_footer.hide();

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
  
    var cuadro_datos_laborales_MOVPER2 = $("#cuadro_datos_laborales_MOVPER2");

    var API_URL_personal =  "servicios/services.admin.planteles.php?accion=consultar_cargos_asignados";
    var table_cargos_asignados = $('#table_cargos_asignados')
    // $('#table_cargos_asignados').bootstrapTable('destroy' ); 
    // $('#table_cargos_asignados').bootstrapTable({url: API_URL_personal});
    table_cargos_asignados.hide();
    // $('#cuadro_listado_personal').show();


 
    $(function () {

        $('#txt_dependencia').select2();

        $("#txt_dependencia2").select2();


        //    __   __  ___  __           __        __   __        __      __   ___  __   __   __
        //   |__) /  \  |  /  \ |\ |    |__) |  | /__` /  `  /\  |__)    |__) |__  |__) /__` /  \ |\ |  /\  |
        //   |__) \__/  |  \__/ | \|    |__) \__/ .__/ \__, /~~\ |  \    |    |___ |  \ .__/ \__/ | \| /~~\ |___
        //

        $('#btn_buscar_personal').click(function () {

            
            accion ='consultar_cargos_asignados';
            cedula = $("#txt_cedula_personal").val();
            // id_plantelesbase_per = ventana_personal.find('input[name="txt_id_plantelesbase_per"]').val();
            console.log(accion)
            console.log(cedula);
            // console.log(id_plantelesbase_per);
            if (cedula!='') {
              parametros =  'cedula=' + cedula + '&accion='+accion + '&'+sesionencode;
              $('#btn_buscar_personal').attr('disabled',true);
              // console.log(parametros);
              // API_URL =  "servicios/services.funcionarios.php";
              API_URL =  "servicios/services.admin.planteles.php";
              $.ajax({
                  url: API_URL,
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
                        console.info(data_func);

                        
                        var API_URL_personal =  "servicios/services.admin.planteles.php?accion=consultar_cargos_asignados&cedula=" + cedula;
                        $('#table_cargos_asignados').bootstrapTable('destroy' ); 
                        $('#table_cargos_asignados').bootstrapTable({url: API_URL_personal});
                        table_cargos_asignados.show();


                        $('#cuadro_datos_laborales').fadeIn();
                        var reg_id_registropersonal = data_func[0]['reg_id_registropersonal'];
                        // console.info("reg_id_registropersonal:-> " +  reg_id_registropersonal);

                        if (reg_id_registropersonal == null) {
                          console.info("EXISTE PERO no tiene cargo funcional");
                          // $("#txt_apellido_funcionario").val(data_func[0]['nom_nombres_apellidos']);
                          // ventana_personal.find('input[name="txt_nombre_funcionario"]').val('');
                          
                          $('#btn_enviar_personal').attr('disabled',false);
                          $('#btn_enviar_personal').fadeIn();
                          activar_datos_personales();
                          $('#btn_enviar_personal').attr('disabled',false);
                          $('#btn_enviar_personal').fadeIn();
                          // 
                          activar_datos_laborales();
                          // $("#txt_tipo_personal_funcional").focus();
                          // 
                          $("#txt_apellido_funcionario").val(data_func[0]['nom_nombres_apellidos']);
                          ventana_personal.find('input[name="txt_fecha_ingreso"]').val(data_func[0]['reg_fecha_ingreso']);
                          $("#txt_nombre_funcionario").val('');
                          $("#txt_apellido_funcionario").focus();
                        }else{
                          console.info("SI EXISTE + registro de personal");                          
                          $('#btn_enviar_personal').attr('disabled',true);
                          $('#btn_enviar_personal').fadeOut();
                          // $('#btn_volver_listado').show();
                          // alert("ya tiene algun registro") 
                          $("#txt_apellido_funcionario").val(data_func[0]['reg_apellido_completo']);
                          $("#txt_nombre_funcionario").val(data_func[0]['reg_nombre_completo']);

                          // reg_nombre_completo
                          // reg_apellido_completo
                          // txt_fecha_ingreso

                          $("#txt_apellido_funcionario").focus();
                          // desactivar_datos_personales();
                        }
                          
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
            // console.log(accion);
        }); // fin boton uscar personal
        
        //    __  ___                        __          __       __   ___  __   __   __
        //   |__)  |  |\ |     |    |  |\/| |__) |  /\  |__)     |__) |__  |__) /__` /  \ |\ |  /\  |
        //   |__)  |  | \| ___ |___ |  |  | |    | /~~\ |  \ ___ |    |___ |  \ .__/ \__/ | \| /~~\ |___
        //
        $('#btn_limpiar_personal').click(function(){
          limpiar_datos_personal();
        });

        
    });


    function limpiar_datos_personal(){
          // LIMPIAR CAMPOS DE FORMULARIO PERSONAL 
          $('#btn_buscar_personal').attr('disabled',false);
          $('#btn_buscar_personal').attr('readonly',false);

          // $('#btn_limpiar_personal').attr('disabled',true);
          // $('#btn_limpiar_personal').attr('readonly',true);

          $('#btn_enviar_personal').attr('disabled',true);
          $('#btn_enviar_personal').hide();

          $("#txt_cedula_personal").val('');
          $("#txt_cedula_personal").attr('readonly',false);
          $("#txt_cedula_personal").attr('disabled',false);
          $("#txt_cedula_personal").focus();

          $("#txt_nombre_funcionario").val('');
          $("#txt_apellido_funcionario").val('');

          table_cargos_asignados.bootstrapTable('destroy' ); 
          table_cargos_asignados.hide();
          cuadro_datos_laborales_MOVPER2.hide();
          ventana_footer.hide();

    };
    

    function actionFormatter_MOVPER2(value,row) {
      var icon = '<a class="movimiento_personal" href="javascript:" title="Reasignar Personal"   ><i class="glyphicon glyphicon-blue2  glyphicon-random"></i></a>';
      // var icon="";
      //     icon+='<div class="btn-group">';
      //     icon+='  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
      //     icon+='    Seleccione <span class="caret"></span>';
      //     icon+='  </button>';
      //     icon+='  <ul class="dropdown-menu pull-right" role="menu">';
      //     icon+='    <li><a class="movimiento_personal" href="javascript:" title="Movimiento Interno de Personal"><i class="glyphicon glyphicon-orange glyphicon-random"></i>Movimiento Interno de Personal</a></li>';
      //     icon+='  </ul>';
      //     icon+='</div>';
          
      return icon;
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


  
    window.actionEvents_MOVPER2 = {
        'click .movimiento_personal': function (e, value, row) {
            // accion='modificar_registro'
            console.log(row);
            console.log($(this).attr('title'));

            cuadro_datos_laborales_MOVPER2.fadeIn();
            ventana_footer.fadeIn();

        }

    };


    function showAlert(title, type) {
        $alert.attr('class', 'alert alert-' + type || 'success')
              .html('<i class="glyphicon glyphicon-check"></i> ' + title).show();
        setTimeout(function () {
            $alert.hide();
        }, 5000);
    }