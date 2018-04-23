    console.log("javascript - root movimiento de personal");
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

        // $('#txt_dependencia').select2();
        $("#txt_dependencia2").select2({
          placeholder: 'Seleccione una Opción',
          ajax: {
            url: 'servicios/services.admin.planteles.php',
            dataType: 'json',
            delay: 250,
            language: "es",
            data: function(params) {
                return {
                    accion: 'consultar_dependencias_zona',
                    m: 1,
                    q: params.term, // search term
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            }
            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
          }
        });



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
              // descativamos la cedula
			  $("#txt_cedula_personal").attr('readonly',true);
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
                        // console.info(response);
                        console.info(data_func);
                        
						var reg_id_registropersonal = data_func[0]['reg_id_registropersonal'];
						// console.info("reg_id_registropersonal:-> " +  reg_id_registropersonal);

                        if (reg_id_registropersonal != null) {
							console.info("SI EXISTE + registro de personal");                          
							
							$('#btn_enviar_personal').attr('disabled',true);
							$('#btn_enviar_personal').fadeOut();
							// $('#btn_volver_listado').show();
							// alert("ya tiene algun registro") 
							$("#txt_apellido_funcionario").val(data_func[0]['reg_apellido_completo']);
							$("#txt_nombre_funcionario").val(data_func[0]['reg_nombre_completo']);

							var API_URL_personal_asignado =  "servicios/services.admin.planteles.php?accion=consultar_cargos_asignados&cedula=" + cedula;
							$('#table_cargos_asignados').bootstrapTable('destroy' ); 
							$('#table_cargos_asignados').bootstrapTable({url: API_URL_personal_asignado});
							table_cargos_asignados.show();
							$('#cuadro_datos_laborales').fadeIn();							
                        }else{
                          console.info("EXISTE PERO no tiene cargo funcional");
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
            // console.log(accion);
        }); // fin boton uscar personal
        
        //    __  ___                        __          __       __   ___  __   __   __
        //   |__)  |  |\ |     |    |  |\/| |__) |  /\  |__)     |__) |__  |__) /__` /  \ |\ |  /\  |
        //   |__)  |  | \| ___ |___ |  |  | |    | /~~\ |  \ ___ |    |___ |  \ .__/ \__/ | \| /~~\ |___
        //
        $('#btn_limpiar_personal').click(function(){
          limpiar_datos_personal();
        });

        

		// update and delete 
		//   #     ##    #####  ###     ##    #  #   ####   #  #   ####   #  #   #####   ##
		//  # #   #  #     #     #     #  #   ## #   #      #  #   #      ## #     #    #  #
		// #   #  #        #     #     #  #   # ##   ###    #  #   ###    # ##     #     #
		// #####  #        #     #     #  #   #  #   #      ####   #      #  #     #      #
		// #   #  #  #     #     #     #  #   #  #   #       ##    #      #  #     #    #  #
		// #   #   ##      #    ###     ##    #  #   ####    ##    ####   #  #     #     ##
		// 
		window.actionEventsMOVPER2 = {
			'click .movimiento_personal': function (e, value, row2) {
				accion='movimiento_personal';
				console.log($(this).attr('title'));
        console.info(accion);
				// console.info(value);
				// console.info(row2);
				cuadro_datos_laborales_MOVPER2.hide();
				// ventana_footer.hide();

				
        // cierre: "--"
        // ​pb_municipio: "SUCRE"
        // ​pb_nombre: "OFICINA DE INFORMÁTICA"
        // ​reg_apellido_completo: "HERNANDEZ CAMPOS"
        // ​reg_cargo_funcional: "COORDINADOR"
        // ​reg_cedula: "11829328"
        // ​reg_dependencia_funcional: "PROGRAMACION"
        // ​reg_fecha_ingreso: "01/04/2011"
        // ​reg_horarios_funcional: "08-03"
        // ​reg_horas_adm_obr: "37,5"
        // ​reg_horas_doc11: "0"
        // ​reg_id_plantelesbase: "1168"
        // ​reg_id_registropersonal: "512"
        // ​reg_nombre_completo: "OSWALDO ENRIQUES"
        // ​reg_tiempo_servicio_plantel: "01/11/2011"
        // ​reg_tipo_personal: "ADMINISTRATIVO"
        // ​reg_tipo_personal_funcional: "ADMINISTRATIVO"
        // reg_turno_trabajo: "COMPLETO"

				var id_actual = row2.reg_id_registropersonal;
        console.info(id_actual)
				
				// console.info(row2.reg_id_registropersonal);
				// console.info(row2.reg_id_plantelesbase);
				// console.info(row2.pb_municipio);
				// console.info(row2.pb_nombre);
				// console.info(row2.reg_tipo_personal);
				// console.info(row2.reg_tipo_personal_funcional);
				// console.info(row2.reg_cargo_funcional);

				// console.info(row2.reg_dependencia_funcional);
				// console.info(row2.reg_turno_trabajo);

				// console.info(row2.reg_horas_adm_obr);				
				// console.info(row2.reg_horas_doc11);

				// console.info(row2.reg_fecha_ingreso);
				// console.info(row2.reg_tiempo_servicio_plantel);
				// // reg_tiempo_servicio_plantel

				

				$("#txt_tipo_personal_funcional").val(row2.reg_tipo_personal_funcional);
				$("#txt_cargo_funcion").val(row2.reg_cargo_funcional);
				$("#txt_coordinacion_laboral").val(row2.reg_dependencia_funcional);
				
				$("#txt_turno_trabajo").val(row2.reg_turno_trabajo);
				$("#txt_horario_laboral").val(row2.reg_horarios_funcional);

				$("#txt_fecha_ingreso").val(row2.reg_fecha_ingreso);
				
				$("#txt_horas_doc_funcionario").val(row2.reg_horas_doc11);
				$("#txt_horas_adm_obr_funcionario").val(row2.reg_horas_adm_obr);

				$("#txt_tiempo_servicio").val(row2.reg_tiempo_servicio_plantel);

				cuadro_datos_laborales_MOVPER2.fadeIn();
				ventana_footer.fadeIn();

				// $table.bootstrapTable('getData');
				// $('#table_cargos_asignados').bootstrapTable('getData');
				var datos_table = $('#table_cargos_asignados').bootstrapTable('getData');
				// console.info(datos_table);

        var id_resume = [] ;
        for (var i in datos_table ) {
          // console.info(i);
          if (datos_table[i].reg_id_registropersonal != id_actual ) {
            id_resume.push( datos_table[i].reg_id_registropersonal);  
          }
        }
        console.info(id_resume);

          $('#table_cargos_asignados').bootstrapTable('remove', {
              field: 'reg_id_registropersonal',
              values: id_resume
          });
          $(".movimiento_personal").hide();

			}

		};


    });



	  //  ___            __     __        ___  __      ___     ___  ___  __             __              ___            __  ___    __           __   ___       __
    // |__  |  | |\ | /  ` | /  \ |\ | |__  /__`    |__  \_/  |  |__  |__) |\ |  /\  /__`     /\     |__  |  | |\ | /  `  |  | /  \ |\ |    |__) |__   /\  |  \ \ /
    // |    \__/ | \| \__, | \__/ | \| |___ .__/    |___ / \  |  |___ |  \ | \| /~~\ .__/    /~~\    |    \__/ | \| \__,  |  | \__/ | \|    |  \ |___ /~~\ |__/  |

 

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
	//
	//       __  ___    __          ___  __   __             ___ ___  ___  __
	//  /\  /  `  |  | /  \ |\ |   |__  /  \ |__)  |\/|  /\   |   |  |__  |__)
	// /~~\ \__,  |  | \__/ | \|   |    \__/ |  \  |  | /~~\  |   |  |___ |  \
	// 
	// 
    function actionFormatter_MOVPER2(value,row) {
      var icon="";
      icon+='<a class="movimiento_personal" href="javascript:" title="Reasignar Personal"   ><i class="glyphicon glyphicon-blue2  glyphicon-random"></i></a>  ';
      // icon+='<a class="liberar_personal" href="javascript:" title="Liberar Personal"   ><i class="glyphicon glyphicon-red glyphicon-ban-circle"></i></a>  ';

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


      
    


    function showAlert(title, type) {
        $alert.attr('class', 'alert alert-' + type || 'success')
              .html('<i class="glyphicon glyphicon-check"></i> ' + title).show();
        setTimeout(function () {
            $alert.hide();
        }, 5000);
    }