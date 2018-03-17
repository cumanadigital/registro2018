    console.log("javascript - root asignar autoridades");
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
    //  

    $modal_director             = $('#modal_director').modal(   {show: false, backdrop:'static'});

    var API_URL_personal =  "servicios/services.admin.planteles.php?accion=consultar_planteles_municipio";
    // $('#table_personal_asignado').bootstrapTable('destroy' ); 
    $('#table_planteles').bootstrapTable({url: API_URL_personal});

    var $table_planteles = $('#table_planteles');
    var $btn_filtrar = $('#btn_filtrar');
    
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

    // * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
    // * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
    
    $(function () {
        $btn_filtrar.click(function () {
            console.info('$btn_filtrar');
            $table_planteles.bootstrapTable('destroy');
            $table_planteles.bootstrapTable({url: API_URL_personal});
            // $table_planteles.bootstrapTable('refresh');
        });
    });

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

    // * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
    // * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
    // * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
    //
    // ####    ##    ###    #   #    #    #####  #####  ####   ###     ##
    // #      #  #   #  #   ## ##   # #     #      #    #      #  #   #  #
    // ###    #  #   #  #   # # #  #   #    #      #    ###    #  #    #
    // #      #  #   ###    # # #  #####    #      #    #      ###      #
    // #      #  #   #  #   #   #  #   #    #      #    #      #  #   #  #
    // #       ##    #  #   #   #  #   #    #      #    ####   #  #    ##
    // 
    function actionFormatter(value,row) {
      // console.info(row);
      var icon="";
        icon+='<div class="btn-group">';
        icon+='  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
        icon+='    Seleccione <span class="caret"></span>';
        icon+='  </button>';
        icon+='  <ul class="dropdown-menu pull-right" role="menu">';
        icon+='    <li><a class="actualiza_director" href="javascript:" title="Asignar Nuevo Director(a)"><i class="glyphicon glyphicon-blue glyphicon-user"></i>Asignar Nuevo Director(a)</a></li>';
        icon+='  </ul>';
        icon+='</div>';
      return icon;
    }

    function actionFormatterNombre (value,row) {
      //console.log(row);
      // Object { nom_id_nomina: "41946", nom_cedula: "11829328", nom_nomina: "FIJO", nom_nombres_apellidos: "HERNANDEZ C OSWALDO E", nom_fecha_ingreso: "04/01/2011", nom_cod_cargo: "100000", nom_cargo: "BACHILLER I", nom_cod_dependencia: "006102200", nom_dependencia: "OFIC DE SUPERV ZONA NO 12", nom_personal: "A", 35 más… }
      nombre = row.reg_nombre_completo + " " + row.reg_apellido_completo 
      return nombre;
    }
    //
    // #      ###    #   #  ###    ###      #    ###           ###    ###    ###    ####    ##    #####   ##    ###
    // #       #     ## ##  #  #    #      # #   #  #          #  #    #     #  #   #      #  #     #    #  #   #  #
    // #       #     # # #  #  #    #     #   #  #  #          #  #    #     #  #   ###    #        #    #  #   #  #
    // #       #     # # #  ###     #     #####  ###           #  #    #     ###    #      #        #    #  #   ###
    // #       #     #   #  #       #     #   #  #  #          #  #    #     #  #   #      #  #     #    #  #   #  #
    // ####   ###    #   #  #      ###    #   #  #  #          ###    ###    #  #   ####    ##      #     ##    #  #
    //
    function limpiar_director(){
      
      $modal_director.find('input[name="txt_dir_cedula"]').attr('readonly',false);

      $modal_director.find('input[name="txt_dir_cedula"]').val('');
      $modal_director.find('input[name="txt_dir_nombre"]').val('');
      $modal_director.find('input[name="txt_dir_apellido"]').val('');

      $("#txt_dir_personal").val('');
      $("#txt_dir_cargo").val('');
      $("#txt_dir_fecha_ingreso").val('');    


      $modal_director.find('input[name="txt_direccion"]').val('');

      $modal_director.find('input[name="txt_fecha_nac"]').val('');

      $modal_director.find('input[name="txt_dir_telefono"]').val('');
      $modal_director.find('input[name="txt_dir_celular"]').val('');

      $modal_director.find('input[name="txt_dir_email"]').val('');
      $modal_director.find('input[name="txt_dir_twitter"]').val('');
    }
    //
    // ###    ####    ##      #     ##    #####  ###    #  #     #    ###           ###    ###    ###    ####    ##    #####   ##    ###
    // #  #   #      #  #    # #   #  #     #     #     #  #    # #   #  #          #  #    #     #  #   #      #  #     #    #  #   #  #
    // #  #   ###     #     #   #  #        #     #     #  #   #   #  #  #          #  #    #     #  #   ###    #        #    #  #   #  #
    // #  #   #        #    #####  #        #     #     ####   #####  ###           #  #    #     ###    #      #        #    #  #   ###
    // #  #   #      #  #   #   #  #  #     #     #      ##    #   #  #  #          #  #    #     #  #   #      #  #     #    #  #   #  #
    // ###    ####    ##    #   #   ##      #    ###     ##    #   #  #  #          ###    ###    #  #   ####    ##      #     ##    #  #
    //                                                                       #####
    function desactivar_director(){

      $modal_director.find('input[name="txt_dir_cedula"]').attr('disabled', false);
      $modal_director.find('input[name="txt_dir_cedula"]').attr('readonly', false);
      $modal_director.find('input[name="txt_dir_nombre"]').attr('disabled', true);
      $modal_director.find('input[name="txt_dir_apellido"]').attr('disabled', true);

      $modal_director.find('input[name="txt_direccion"]').attr('disabled', true);

      $modal_director.find('input[name="txt_fecha_nac"]').attr('disabled', true);

      $modal_director.find('input[name="txt_dir_telefono"]').attr('disabled', true);
      $modal_director.find('input[name="txt_dir_celular"]').attr('disabled', true);

      $modal_director.find('input[name="txt_dir_email"]').attr('disabled', true);
      $modal_director.find('input[name="txt_dir_twitter"]').attr('disabled', true);

      $('#btn_buscar_personal').attr('disabled',false);
      $modal_director.find('button[name="btn_enviar_director"]').attr('disabled', true);
    }

    function activar_director(){

      $modal_director.find('input[name="txt_dir_cedula"]').attr('readonly', true);
      $modal_director.find('input[name="txt_dir_nombre"]').attr('disabled', false);
      $modal_director.find('input[name="txt_dir_apellido"]').attr('disabled', false);

      $modal_director.find('input[name="txt_direccion"]').attr('disabled', false);

      $modal_director.find('input[name="txt_fecha_nac"]').attr('disabled', false);

      $modal_director.find('input[name="txt_dir_telefono"]').attr('disabled', false);
      $modal_director.find('input[name="txt_dir_celular"]').attr('disabled', false);

      $modal_director.find('input[name="txt_dir_email"]').attr('disabled', false);
      $modal_director.find('input[name="txt_dir_twitter"]').attr('disabled', false);

      $('#btn_buscar_personal').attr('disabled',true);
      $modal_director.find('button[name="btn_enviar_director"]').attr('disabled', false);
    }

    function limpiar_datos_personal(){
        limpiar_director();
        desactivar_director();
        $modal_director.find('input[name="txt_dir_cedula"]').focus();
    };
    //
    // update and delete 
    //   #     ##    #####  ###     ##    #  #          ####   #  #   ####   #  #   #####   ##
    //  # #   #  #     #     #     #  #   ## #          #      #  #   #      ## #     #    #  #
    // #   #  #        #     #     #  #   # ##          ###    #  #   ###    # ##     #     #
    // #####  #        #     #     #  #   #  #          #      ####   #      #  #     #      #
    // #   #  #  #     #     #     #  #   #  #          #       ##    #      #  #     #    #  #
    // #   #   ##      #    ###     ##    #  #          ####    ##    ####   #  #     #     ##
    // 
    window.actionEvents = {
        'click .actualiza_director': function (e, value, row) {
            // accion='modificar_registro'
            // //console.log(row);
            console.log($(this).attr('title'));
            var titulo = $(this).attr('title') + "<br>[<font color='red'><b>" + row.cod_plantel + "</b></font>] -  <font color='blue'><b>" + row.nombre  + "</b></font>"; 
            
            $modal_director.find('input[name="txt_id_nomina"]').val(row.id_nomina);
            $modal_director.find('input[name="txt_id_plantelesbase"]').val(row.id_plantelesbase);
            $modal_director.find('input[name="txt_cod_plantel"]').val(row.cod_plantel);
            
            accion = "actualizar_director";

            limpiar_datos_personal();

            $modal_director.find('button[name="btn_enviar_director"]').text("Asignar Nuevo Director(a)");

            showModalName($modal_director,titulo,row);
        }
    };



    // // 
    //  ####    ##    #####   ##    #  #   ####    ##
    //  #   #  #  #     #    #  #   ## #   #      #  #
    //  ####   #  #     #    #  #   # ##   ###     #
    //  #   #  #  #     #    #  #   #  #   #        #
    //  #   #  #  #     #    #  #   #  #   #      #  #
    //  ####    ##      #     ##    #  #   ####    ##
    //
    //
    // ####   #####  #  #          #      ###    #   #  ###    ###      #    ###           ###    ####   ###     ##     ##    #  #     #    #
    // #   #    #    ## #          #       #     ## ##  #  #    #      # #   #  #          #  #   #      #  #   #  #   #  #   ## #    # #   #
    // ####     #    # ##          #       #     # # #  #  #    #     #   #  #  #          #  #   ###    #  #    #     #  #   # ##   #   #  #
    // #   #    #    #  #          #       #     # # #  ###     #     #####  ###           ###    #      ###      #    #  #   #  #   #####  #
    // #   #    #    #  #          #       #     #   #  #       #     #   #  #  #          #      #      #  #   #  #   #  #   #  #   #   #  #
    // ####     #    #  #          ####   ###    #   #  #      ###    #   #  #  #          #      ####   #  #    ##     ##    #  #   #   #  ####
    // 
    $('#btn_limpiar_personal').click(function(){
          limpiar_datos_personal();
    });
    //    __   __  ___  __           __        __   __        __      __   ___  __   __   __
    //   |__) /  \  |  /  \ |\ |    |__) |  | /__` /  `  /\  |__)    |__) |__  |__) /__` /  \ |\ |  /\  |
    //   |__) \__/  |  \__/ | \|    |__) \__/ .__/ \__, /~~\ |  \    |    |___ |  \ .__/ \__/ | \| /~~\ |___
    //
    $('#btn_buscar_personal').click(function () {  
        accion ='consultar_funcionarios';
        cedula = $modal_director.find('input[name="txt_dir_cedula"]').val();
        id_plantelesbase = $modal_director.find('input[name="txt_id_plantelesbase"]').val();
        console.log(accion)
        console.log(cedula);
        console.log(id_plantelesbase);
        if (cedula!='') {
          parametros =  'cedula=' + cedula + '&accion='+accion +'&id_plantelesbase='+id_plantelesbase + '&'+sesionencode;
          $('#btn_buscar_personal').attr('disabled',true);
          // console.log(parametros);
          API_URL =  "servicios/services.admin.planteles.php";
          $.ajax({
              url: API_URL + ($modal_director.data('id') || ''),
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
                    $("#txt_dir_apellido").val('CEDULA NO REGISTRADA');
                    $("#txt_dir_nombre").val('CEDULA NO REGISTRADA');
                    $("#txt_dir_cedula").focus();
                  }else{  
                    var data_func =  JSON.parse(response);
                    console.info(data_func);
                    // alert(data_func);
                    // // $('#cuadro_datos_laborales').fadeIn();
                    // var reg_id_registropersonal = data_func[0]['reg_id_registropersonal'];
                    // // console.info("reg_id_registropersonal:-> " +  reg_id_registropersonal);
                    
                    // var nom_cargo1 = data_func[0]['nom_cargo'];
                    // var nom_cod_cargo1 = data_func[0]['nom_cod_cargo'];
                    // var nom_nomina1 = data_func[0]['nom_nomina'];
                    // console.log(nom_cargo1);
                    // console.log(nom_cod_cargo1);
                    // console.log(nom_nomina1);

                    // // txt_tipo_personal
                    
                    // nom_cod_cargo: "8032N"
                    // nom_cargo: "OBRERO GENERAL II"
                    // nom_nomina: "FIJO"
                    // nom_personal: "OBRERO"

                    var nom_cod_cargo = data_func[0]['nom_cod_cargo'];
                    var nom_cargo     = data_func[0]['nom_cargo'];
                    
                    var nom_nomina    = data_func[0]['nom_nomina'];
                    var nom_personal  = data_func[0]['nom_personal'];

                    var fecha_ingreso =  data_func[0]['nom_fecha_ingreso'];
                    
                    var dir_personal  = nom_personal + " - " +  nom_nomina;
                    var dir_cargo     = nom_cod_cargo + " - " +  nom_cargo;


                    // reg_apellido_completo
                    // reg_nombre_completo
                    // reg_fecha_nac
                    // reg_telefono_celular
                    // reg_telefono_residencia
                    // reg_direccion_habitacion      

                    var reg_direccion_habitacion  = data_func[0]['reg_direccion_habitacion']; 
                    var reg_telefono_celular      = data_func[0]['reg_telefono_celular']; 
                    var reg_telefono_residencia   = data_func[0]['reg_telefono_residencia']; 
                    var reg_fecha_nac             = data_func[0]['reg_fecha_nac'];
                    var reg_email                 = data_func[0]['reg_red_email'];

                    var reg_apellido_completo     = data_func[0]['reg_apellido_completo']; 
                    var reg_nombre_completo       = data_func[0]['reg_nombre_completo'];           
                    
                    if (reg_nombre_completo ==null) {
                      $("#txt_dir_apellido").val(data_func[0]['nom_nombres_apellidos']);
                      $("#txt_dir_nombre").val('');
                    }else{
                      $("#txt_dir_apellido").val(reg_apellido_completo);
                      $("#txt_dir_nombre").val(reg_nombre_completo);
                    }
                    $("#txt_direccion").val(reg_direccion_habitacion);
                    $("#txt_fecha_nac").val(reg_fecha_nac);
                    $("#txt_dir_celular").val(reg_telefono_celular);
                    $("#txt_dir_telefono").val(reg_telefono_residencia);
                    $("#txt_dir_email").val(reg_email);

                    $("#txt_dir_personal").val(dir_personal);
                    $("#txt_dir_cargo").val(dir_cargo);
                    $("#txt_dir_fecha_ingreso").val(fecha_ingreso);


                    activar_director();
                    $("#txt_dir_apellido").focus();

                  }
                   
                  
              },
              error: function () {
                  $modal_director.modal('hide');
                  showAlert(($modal_director.data('id') ? 'Update' : 'Create') + ' item error!', 'danger');
              }
          });
            
        }else{
          alert("Debe ingresar los datos");
        }
        // console.log(accion);
    }); // fin boton uscar personal
    

    //    __   __  ___  __           ___                   __      __     __   ___  __  ___  __   __
    //   |__) /  \  |  /  \ |\ |    |__  |\ | \  / |  /\  |__)    |  \ | |__) |__  /  `  |  /  \ |__)
    //   |__) \__/  |  \__/ | \|    |___ | \|  \/  | /~~\ |  \    |__/ | |  \ |___ \__,  |  \__/ |  \
    //
    $modal_director.find('#btn_enviar_director').click(function () {
      // console.log($(this).attr('id') + " --> " +  $(this).text());
      // alert($(this).attr('id') + " --> " +  $(this).text()) 
      accion ='actualizar_director';   
      console.info($("#form_modal_director").serialize() + '&accion='+ accion);
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
      // dir_twitter = $modal_director.find('input[name="txt_dir_twitter"]').val();
      
      $('#form_modal_director').validator('validate');

      if (dir_apellido!= '' && dir_nombre!='' ) {
      // if (dir_apellido!= '' && dir_nombre!='' &&  direccion!= '' && fecha_nac!= '' && dir_telefono!= '' && dir_celular!= '' && dir_email!= '') {
        parametros = $("#form_modal_director").serialize() + '&accion='+ accion;
        API_URL =  "servicios/services.admin.planteles.php";
        $.ajax({
            url: API_URL + ($modal_director.data('id') || ''),
            type: 'POST',
            data: parametros + "&token1="+rand_code(),
            success: function (response) {
                $modal_director.modal('hide');
                showAlert('Registro con éxito!', 'success');
                $table_planteles.bootstrapTable('refresh');
            },
            error: function () {
                $modal_director.modal('hide');
                showAlert(($modal_director.data('id') ? 'Update' : 'Create') + ' item error!', 'danger');
            }
        });   
      }else{
        alert("Debe ingresar los datos obligatorios");
      }
    }); // ./ fin btn_enviar


    function showModalName(ventana,title,row) {
      ventana.find('.modal-title').html(title);
      ventana.modal('show');
    }

    function showAlert(title, type) {
        $alert.attr('class', 'alert alert-' + type || 'success')
              .html('<i class="glyphicon glyphicon-check"></i> ' + title).show();
        setTimeout(function () {
            $alert.hide();
        }, 5000);
    }