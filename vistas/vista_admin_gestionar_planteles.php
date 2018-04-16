<?php 
require_once('../conf/config.php');
require_once('../apiv3.0/funciones/funciones3.0.php');
// ver_arreglo($_POST);
$nivel_usuario = $_POST['sesion_nivel_usuario'];
?>
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->
<!-- <script type="text/javascript" src="apiv3.0/plugins/HTML5-Webcam-Plugin-with-jQuery-photobooth/photobooth_min.js"></script> -->
<div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="box box-solid box-primary ">
      <!--  BOX HEADER      -->
      <div class="box-header with-border">
        <h3 class="box-title">Dependencias</h3>
        <div class="box-tools pull-right">
          <!--<button id="boton_minus_busqueda" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>-->
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
      
      <!--  BOX-BODY  -->
      <div class="box-body">
      <!--CONTENIDO AQUI-->
      <!--CONTENIDO AQUI-->
      <!--CONTENIDO AQUI-->
          <div class="row"> 
            <div class="col-sm12 col-md-12">
              <div id="toolbar1" class="toolbar1">
                <?php if ($nivel_usuario == 'ROOT' ) { ?>
                <div class="form-inline" role="form">
                  <div class="form-group ">
                    <!-- <span>Municipio: </span> -->
                    <select class="form-control" id="txt_tipo_dependencia_filtro" name="txt_tipo_dependencia_filtro" withd="6">
                      <option value='PLANTELES' >PLANTELES</option>
                      <option value='ZONA EDUCATIVA' >ZONA EDUCATIVA</option>
                      <option value='CIRCUITOS EDUCATIVOS' >CIRCUITOS EDUCATIVOS</option>
                    </select>
                    <select class="form-control" id="txt_municipio_filtro" name="txt_municipio_filtro" withd="6">
                      <option value=''>Seleccione Municipio</option> 
                      <option value='ANDRES ELOY BLANCO' >ANDRES ELOY BLANCO</option>
                      <option value='ANDRES MATA' >ANDRES MATA</option>
                      <option value='ARISMENDI' >ARISMENDI</option>
                      <option value='BENITEZ' >BENITEZ</option>
                      <option value='BERMUDEZ' >BERMUDEZ</option>
                      <option value='BOLIVAR' >BOLIVAR</option>
                      <option value='CAJIGAL' >CAJIGAL</option>
                      <option value='CRUZ SALMERON ACOSTA' >CRUZ SALMERON ACOSTA</option>
                      <option value='LIBERTADOR' >LIBERTADOR</option>
                      <option value='MARIÑO' >MARIÑO</option>
                      <option value='MEJIA' >MEJIA</option>
                      <option value='MONTES' >MONTES</option>
                      <option value='RIBERO' >RIBERO</option>
                      <option value='SUCRE' >SUCRE</option>
                      <option value='VALDEZ' >VALDEZ</option>
                    </select>
                  </div>
                  <button id="btn_filtrar" type="button" class="btn btn-default">Consultar</button>
                  <span class="alert"></span>
                  </div>
                <?php } ?>

                <?php if ($nivel_usuario == 'USUARIO' ) { ?>
                <div class="form-inline" role="form">
                  <div class="form-group ">
                    <!-- <span>Municipio: </span> -->
                    <select class="form-control" id="txt_tipo_dependencia_filtro" name="txt_tipo_dependencia_filtro" withd="6">
                      <!-- <option value='PLANTELES' >PLANTELES</option> -->
                      <option value='ZONA EDUCATIVA' >ZONA EDUCATIVA</option>
                      <!-- <option value='CIRCUITOS EDUCATIVOS' >CIRCUITOS EDUCATIVOS</option> -->
                    </select>
                    <select class="form-control" id="txt_municipio" name="txt_municipio" withd="6"  disabled="disabled">
                      <option value=''>Seleccione Municipio</option> 
                      <option value='ANDRES ELOY BLANCO' >ANDRES ELOY BLANCO</option>
                      <option value='ANDRES MATA' >ANDRES MATA</option>
                      <option value='ARISMENDI' >ARISMENDI</option>
                      <option value='BENITEZ' >BENITEZ</option>
                      <option value='BERMUDEZ' >BERMUDEZ</option>
                      <option value='BOLIVAR' >BOLIVAR</option>
                      <option value='CAJIGAL' >CAJIGAL</option>
                      <option value='CRUZ SALMERON ACOSTA' >CRUZ SALMERON ACOSTA</option>
                      <option value='LIBERTADOR' >LIBERTADOR</option>
                      <option value='MARIÑO' >MARIÑO</option>
                      <option value='MEJIA' >MEJIA</option>
                      <option value='MONTES' >MONTES</option>
                      <option value='RIBERO' >RIBERO</option>
                      <option value='SUCRE' >SUCRE</option>
                      <option value='VALDEZ' >VALDEZ</option>
                    </select>
                  </div>
                  <button id="btn_filtrar" type="button" class="btn btn-default">Consultar</button>
                  <span class="alert"></span>
                  </div>
                <?php } ?>
                </div>
            </div>
          </div>
          <?php //print_r($nivel_usuario); ?>
          <div class="row">
            <div class="col-sm12 col-md-12">
              <!-- 
              ___       __                __                 ___  ___       ___  __      __   ___  __     __  ___  __   __
               |   /\  |__) |     /\     |__) |     /\  |\ |  |  |__  |    |__  /__`    |__) |__  / _` | /__`  |  |__) /  \
               |  /~~\ |__) |___ /~~\    |    |___ /~~\ | \|  |  |___ |___ |___ .__/    |  \ |___ \__> | .__/  |  |  \ \__/ 
             -->
              <table id="table"
               data-show-refresh="true"
               data-show-columns="true"
               data-search="true"
               data-show-export="true"
               data-pagination="true"
               data-page-size="5"
               data-page-list="[5, 10, 25, 50, 100]"
               data-toolbar=".toolbar1"
               data-filter-control="true"
               data-query-params="queryParams">
                <thead>
                <tr>
                        <th data-field="id_plantelesbase"  data-filter-control="input"   data-sortable="true" data-halign="center" data-align="center" >Id</th>
                        <th data-field="municipio"         data-filter-control="select"  data-sortable="true" data-halign="center" data-align="center" >Municipio</th>
                        <th data-field="cod_plantel"       data-filter-control="input"   data-sortable="true" data-halign="center" data-align="center" >Código DEA</th>
                        <th data-field="nombre"            data-filter-control="input"   data-sortable="true" data-halign="center" data-align="left"   >Nombre de la Dependencia</th>
                        <!-- <th data-field="cod_estadistico"   data-filter-control="input"   data-sortable="true" data-halign="center" data-align="center" >C. Estadistico</th> -->
                        <th data-field="cod_nomina"   data-filter-control="input"   data-sortable="true" data-halign="center" data-align="center" >C. Nómina</th>                   
                        <!-- <th data-field="parroquia"  data-filter-control="input"   data-sortable="true" data-halign="center" data-align="center" >Parroquia</th> -->
                        <!-- <th data-field="total"             data-filter-control="select"  data-sortable="true"  data-halign="center" data-align="center" >Matricula</th> -->
                        <th data-field="matricula"         data-filter-control="select"  data-sortable="false" data-halign="center" data-align="left" data-formatter="MatriculaFormatter" >Matricula</th>

                        <th data-field="personal"          data-filter-control="select"  data-sortable="false" data-halign="center" data-align="left"   data-formatter="PersonalFormatter"  >Personal</th>
                        <th data-field="actualizado"       data-filter-control="input"   data-sortable="true"  data-halign="center" data-align="center" data-formatter="EstadoFormatter"  >Estatus</th>
                <?php if ($nivelusuario='DIRECTOR' || $nivelusuario='ADMIN' || $nivelusuario='ROOT'  ) {?>        
                        <th data-field="action"
                            data-align="center"
                            data-formatter="actionFormatter"
                            data-events="actionEvents">Acción</th>
                <?php } ?>
                </tr>
              </thead>
            </table>

            </div> <!--// fin col-sm-->
          </div><!--// fin row-->



          <!-- 
          ######  ### ######  #######  #####  ####### ### #     # #######
          #     #  #  #     # #       #     #    #     #  #     # #     #
          #     #  #  #     # #       #          #     #  #     # #     #
          #     #  #  ######  #####   #          #     #  #     # #     #
          #     #  #  #   #   #       #          #     #   #   #  #     #
          #     #  #  #    #  #       #     #    #     #    # #   #     #
          ######  ### #     # #######  #####     #    ###    #    #######
           -->
          <form class="form-horizontal" id="form_modal_director" > 
            <div id="modal_director" class="modal fade">
              <div class="modal-dialog" id="modal-dialog-xl">
                <div class="modal-content">

                  <div class="modal-header"> <!-- modal-header --> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Directivo</h4>
                  </div> <!-- ./ modal-header -->

                  <div class="modal-body">
                      <div class="box-body">

                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_dir_cedula" class="col-sm-4 control-label">Cédula*</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_id_nomina" type="hidden" name="txt_id_nomina">
                                <input class="form-control" id="txt_id_plantelesbase" type="hidden" name="txt_id_plantelesbase">
                                <input class="form-control" id="txt_cod_plantel" type="hidden" name="txt_cod_plantel">
                                <input class="form-control" id="txt_dir_cedula" type="text"   name="txt_dir_cedula"  placeholder="Ingrese Cédula" title="Cédula de Identidad" required autocomplete="off">
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_dir_nombre" class="col-sm-4 control-label">Nombre*</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_dir_nombre" type="text"   name="txt_dir_nombre" placeholder="Ingrese Nombre" title="Ingrese Nombre Completo" required autocomplete="off" >
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_dir_apellido" class="col-sm-4 control-label">Apellido*</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_dir_apellido" type="text"   name="txt_dir_apellido" placeholder="Ingrese Apellido"  title="Ingrese Apellido Completo" required autocomplete="off" >
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-8">
                            <div class="form-group">
                              <label for="txt_direccion" class="col-sm-2 control-label">Dirección*</label>
                              <div class="col-sm-10">
                                <input class="form-control" id="txt_direccion" type="text"   name="txt_direccion" placeholder="Ingrese Dirección" title="Ingrese Direccion Completa" required autocomplete="off" >
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_fecha_nac" class="col-sm-4 control-label">Fecha Nac.*</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_fecha_nac" type="date"   name="txt_fecha_nac" placeholder="Ingrese Fecha de Nacimiento" title="Ingrese Fecha de Nacimiento" required autocomplete="off" >
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_dir_telefono" class="col-sm-4 control-label">Teléfono Resid.*</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_dir_telefono" type="text"   name="txt_dir_telefono" placeholder="Ingrese Teléfono" title="Ingrese Teléfono Residencial" required autocomplete="off" >
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_dir_celular" class="col-sm-4 control-label">Teléfono Celular*</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_dir_celular" type="text"   name="txt_dir_celular" placeholder="Ingrese Teléfono Celular" title="Ingrese Teléfono Celular" required autocomplete="off" >
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_dir_email" class="col-sm-4 control-label">Correo*</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_dir_email" type="email"   name="txt_dir_email" placeholder="Ingrese Correo Electrónico Personal" title="Ingrese Correo Electrónico Personal" required autocomplete="off" >
                              </div>
                            </div>
                          </div>
                        </div> 

                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_dir_twitter" class="col-sm-4 control-label">Twitter*</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_dir_twitter" type="text"   name="txt_dir_twitter" placeholder="Ingrese Twitter Personal" title="Ingrese Twitter Personal" required autocomplete="off" >
                              </div>
                            </div>
                          </div>
                        </div>
                      
                      </div><!-- /.box-body -->
                  </div> <!--/.modal-body-->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" name="btn_enviar_director" id="btn_enviar_director"  class="btn btn-primary submit">Enviar</button>
                  </div> 
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </form> 



          <!-- 
          ######  #          #    #     # ####### ####### #
          #     # #         # #   ##    #    #    #       #
          #     # #        #   #  # #   #    #    #       #
          ######  #       #     # #  #  #    #    #####   #
          #       #       ####### #   # #    #    #       #
          #       #       #     # #    ##    #    #       #
          #       ####### #     # #     #    #    ####### #######
           -->
          <form class="form-horizontal" id="form_modal_plantel" > 
            <div id="modal_plantel" class="modal fade">
              <div class="modal-dialog" id="modal-dialog-xl">
                <div class="modal-content">
                  <div class="modal-header"> <!-- modal-header --> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Plantel</h4>
                  </div> <!-- ./ modal-header -->

                  <div class="modal-body">
                      <div class="box-body">

                        <div class="row">
                          <div class="col-sm-8">
                            <div class="form-group">
                              <label for="txt_plan_nombre" class="col-sm-2 control-label">Nombre Completo*</label>
                              <div class="col-sm-10">
                                <input class="form-control" id="txt_id_plantelesbase" type="hidden" name="txt_id_plantelesbase">
                                <input class="form-control" id="txt_cod_plantel" type="hidden" name="txt_cod_plantel">
                                <input class="form-control" id="txt_plan_nombre" type="text"   name="txt_plan_nombre" placeholder="Ingrese Nombre Completo del Plantel" title="Ingrese Nombre Completo del Plantel" required autocomplete="off" >
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4"></div>
                        </div>

                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_cod_plantel" class="col-sm-4 control-label">Código DEA*</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_cod_plantel" type="text"   name="txt_cod_plantel" placeholder="Ingrese Código Administrativo" title="Ingrese Código Administrativo" required autocomplete="off" readonly="readonly">
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_cod_estadistico" class="col-sm-4 control-label">Código Estad.*</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_cod_estadistico" type="text"   name="txt_cod_estadistico" placeholder="Ingrese Código Estadístico"  title="Ingrese Código Administrativo" required autocomplete="off" readonly="readonly">
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_codigo_nomina" class="col-sm-4 control-label">Código Nómina*</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_codigo_nomina" type="text"   name="txt_codigo_nomina" placeholder="Ingrese Código Nómina del Plantel" title="Ingrese Código Nómina del Plantel" required autocomplete="off" >
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_estado" class="col-sm-4 control-label">Estado</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_estado" type="text"   name="txt_estado" placeholder="Ingrese valor" readonly="readonly" >
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_municipio" class="col-sm-4 control-label">Municipio</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_municipio" type="text"   name="txt_municipio" placeholder="Ingrese valor" readonly="readonly" >
                              </div>
                            </div>
                          </div>
                        
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_categoria" class="col-sm-4 control-label">Parroquia</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_parroquia" type="text"   name="txt_parroquia" placeholder="Ingrese valor" readonly="readonly">                                
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-8">
                            <div class="form-group">
                              <label for="txt_direccion" class="col-sm-2 control-label">Dirección Completa*</label>
                              <div class="col-sm-10">
                                <input class="form-control" id="txt_direccion" type="text"   name="txt_direccion" placeholder="Ingrese valor" >
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4"></div>
                        </div>

                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_telefono_fijo" class="col-sm-4 control-label">Teléfono Fijo*</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_telefono_fijo" type="text"   name="txt_telefono_fijo" placeholder="Ingrese valor" >
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_telefono_otro" class="col-sm-4 control-label">Otro Teléfono</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_telefono_otro" type="text"   name="txt_telefono_otro" placeholder="Ingrese valor" >
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_correo" class="col-sm-4 control-label">Correo*</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_correo" type="text"   name="txt_correo" placeholder="Ingrese valor" >
                              </div>
                            </div>
                          </div>
                        </div>                        

                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_tipo_dependencia" class="col-sm-4 control-label">Tipo Dependencia</label>
                              <div class="col-sm-8">
                                <select class="form-control" id="txt_tipo_dependencia" name="txt_tipo_dependencia">
                                  <option value=''>Seleccione</option>  
                                  <option value='NACIONAL' >NACIONAL</option>
                                  <option value='ESTADAL' >ESTADAL</option>
                                  <option value='MUNICIPAL' >MUNICIPAL</option>
                                  <option value='AUTONOMA' >AUTONOMA</option>
                                  <option value='PRIVADA' >PRIVADA</option>
                                  <option value='PRIVADA SUBVENCIONADA POR MPPE' >PRIVADA SUBVENCIONADA POR MPPE</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_status" class="col-sm-4 control-label">Estatus</label>
                              <div class="col-sm-8">
                                <select class="form-control" id="txt_status" name="txt_status">
                                  <option value=''>Seleccione</option>  
                                  <option value='ACTIVO' >ACTIVO</option>
                                  <option value='INACTIVO' >INACTIVO</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_categoria" class="col-sm-4 control-label">Categoria</label>
                              <div class="col-sm-8">
                                <select class="form-control" id="txt_categoria" name="txt_categoria">
                                  <option value=''>Seleccione</option>  
                                  <option value='CIVIL' >CIVIL</option>
                                  <option value='RELIGIOSO' >RELIGIOSO</option>
                                </select>                                
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_condicion_estudio" class="col-sm-4 control-label">Condición de Estudio</label>
                              <div class="col-sm-8">
                                <select class="form-control" id="txt_condicion_estudio" name="txt_condicion_estudio">
                                  <option value=''>Seleccione</option>  
                                  <option value='EXTERNADO' >EXTERNADO</option>
                                  <option value='INTERNADO' >INTERNADO</option>
                                  <option value='SEMI-INTERNADO' >SEMI-INTERNADO</option>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_tipo_matricula" class="col-sm-4 control-label">Tipo de Matricula</label>
                              <div class="col-sm-8">
                                <select class="form-control" id="txt_tipo_matricula" name="txt_tipo_matricula">
                                  <option value=''>Seleccione</option>  
                                  <option value='MIXTO' >MIXTO</option>
                                  <option value='FEMENINO' >FEMENINO</option>
                                </select>                                
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_clase_plantel" class="col-sm-4 control-label">Clase de Plantel</label>
                              <div class="col-sm-8">
                                <select class="form-control" id="txt_clase_plantel" name="txt_clase_plantel">
                                  <option value=''>Seleccione</option>  
                                  <option value='CONCENTRADO' >CONCENTRADO</option>
                                  <option value='GRADUADO' >GRADUADO</option>
                                  <option value='UNITARIO' >UNITARIO</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          
                        </div>

                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_zona_ubicacion" class="col-sm-4 control-label">Zona de Ubicacion</label>
                              <div class="col-sm-8">
                                <select class="form-control" id="txt_zona_ubicacion" name="txt_zona_ubicacion">
                                  <option value=''>Seleccione</option>  
                                  <option value='RURAL' >RURAL</option>
                                  <option value='URBANA' >URBANA</option>
                                </select>                                
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_turno" class="col-sm-4 control-label">Turno</label>
                              <div class="col-sm-8">
                                <select class="form-control" id="txt_turno" name="txt_turno">
                                  <option value=''>Seleccione</option>  
                                  <option value='COMPLETO' >COMPLETO</option>
                                  <option value='MAÑANA' >MAÑANA</option>
                                  <option value='MAÑANA' >TARDE</option>
                                  <option value='MAÑANA-TARDE' >MAÑANA-TARDE</option>
                                  <option value='INTEGRAL-MIXTO' >INTEGRAL-MIXTO</option>
                                  <option value='NOCTURNO' >NOCTURNO</option>
                                  <option value='SABATINO' >SABATINO</option>
                                </select>                                
                              </div>
                            </div>
                          </div>

                           <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_modalidad" class="col-sm-4 control-label">Modalidad</label>
                              <div class="col-sm-8">
                                <select class="form-control" id="txt_modalidad" name="txt_modalidad">
                                  <option value=''>Seleccione</option>  
                                  <option value='SISTEMA REGULAR' >SISTEMA REGULAR</option>
                                  <option value='EDUCACIÓN ESPECIAL' >EDUCACIÓN ESPECIAL</option>
                                  <option value='JÓVENES, ADULTOS Y ADULTAS' >JÓVENES, ADULTOS Y ADULTAS</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      
                      </div><!-- /.box-body -->
                  </div> <!--/.modal-body-->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" name="btn_enviar_plantel" id="btn_enviar_plantel"  class="btn btn-primary submit">Enviar</button>
                  </div> 
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </form>


          <!-- 
          #     #    #    ####### ######  ###  #####  #     # #          #
          ##   ##   # #      #    #     #  #  #     # #     # #         # #
          # # # #  #   #     #    #     #  #  #       #     # #        #   #
          #  #  # #     #    #    ######   #  #       #     # #       #     #
          #     # #######    #    #   #    #  #       #     # #       #######
          #     # #     #    #    #    #   #  #     # #     # #       #     #
          #     # #     #    #    #     # ###  #####   #####  ####### #     #
           -->

          <form class="form-horizontal" id="form_modal_matricula" > 
            <div id="modal_matricula" class="modal fade">
              <div class="modal-dialog" id="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header"> <!-- modal-header --> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Carga Matrícula Estudiantil</h4>
                  </div> <!-- ./ modal-header -->
                  <div class="modal-body">
                      <div class="box-body">

                        <div class="form-group">
                          <label for="txt_total_etapa_maternal" class="col-sm-4 control-label">Etapa Maternal</label>
                          <div class="col-sm-6">
                            <input class="form-control" id="txt_id_plantelesbase" type="hidden" name="txt_id_plantelesbase">
                            <input class="form-control" id="txt_cod_plantel" type="hidden" name="txt_cod_plantel">
                            <input class="form-control" id="txt_total_etapa_maternal" type="text"   name="txt_total_etapa_maternal" placeholder="Ingrese valor" >
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="txt_total_etapa_preescolar" class="col-sm-4 control-label">Etapa Preescolar</label>
                          <div class="col-sm-6">
                            <input class="form-control" id="txt_total_etapa_preescolar" type="text"   name="txt_total_etapa_preescolar" placeholder="Ingrese valor" >
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="txt_total_primaria" class="col-sm-4 control-label">Etapa Primaria</label>
                          <div class="col-sm-6">
                            <input class="form-control" id="txt_total_primaria" type="text"   name="txt_total_primaria" placeholder="Ingrese valor" >
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="txt_total_media_general" class="col-sm-4 control-label">Media General</label>
                          <div class="col-sm-6">
                            <input class="form-control" id="txt_total_media_general" type="text"   name="txt_total_media_general" placeholder="Ingrese valor" >
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="txt_total_media_tecnica" class="col-sm-4 control-label">Media Técnica</label>
                          <div class="col-sm-6">
                            <input class="form-control" id="txt_total_media_tecnica" type="text"   name="txt_total_media_tecnica" placeholder="Ingrese valor" >
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="txt_total_adulto" class="col-sm-4 control-label">Adulto</label>
                          <div class="col-sm-6">
                            <input class="form-control" id="txt_total_adulto" type="text"   name="txt_total_adulto" placeholder="Ingrese valor" >
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="txt_total_especial" class="col-sm-4 control-label">Especial</label>
                          <div class="col-sm-6">
                            <input class="form-control" id="txt_total_especial" type="text"   name="txt_total_especial" placeholder="Ingrese valor" >
                          </div>
                        </div>

                      </div><!-- /.box-body -->
                  </div> <!--/.modal-body-->

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" name="btn_enviar_matricula" id="btn_enviar_matricula"  class="btn btn-primary submit">Registrar</button>
                  </div> 
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </form> 

          <!-- 
          ######  ####### ######   #####  ####### #     #    #    #
          #     # #       #     # #     # #     # ##    #   # #   #
          #     # #       #     # #       #     # # #   #  #   #  #
          ######  #####   ######   #####  #     # #  #  # #     # #
          #       #       #   #         # #     # #   # # ####### #
          #       #       #    #  #     # #     # #    ## #     # #
          #       ####### #     #  #####  ####### #     # #     # #######
          -->
           <form class="form-horizontal" id="form_modal_personal" role="form" data-toggle="validator" > 
            <div id="modal_personal" class="modal fade">
              <div class="modal-dialog" id="modal-dialog-xl">
                <div class="modal-content"> 
                  
                  <div class="modal-header"> <!-- modal-header --> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Carga Personal que Labora en la Institución</h4>
                  </div> <!-- ./ modal-header -->

                  <div class="modal-body">
                      
                    <div class="box-body">


                        <div class="row" id="cuadro_listado_personal">

                            <div class="col-sm-12">
                              
                              <div class="row"> 
                                <div class="col-sm12 col-md-12">
                                  <p class="toolbar2" id="toolbar2">
                                    <a class="create btn btn-default" id="btn_mostrar_agregar_personal" href="javascript:">Agregar Personal</a>
                                    <span class="alert" id="alert_pesronal"></span>
                                  </p>
                                </div>
                              </div>
                              <!-- 
                              ___       __        ___      __   ___  __   __   __                           __     __             __   __
                               |   /\  |__) |    |__      |__) |__  |__) /__` /  \ |\ |  /\  |         /\  /__` | / _` |\ |  /\  |  \ /  \
                               |  /~~\ |__) |___ |___ ___ |    |___ |  \ .__/ \__/ | \| /~~\ |___ ___ /~~\ .__/ | \__> | \| /~~\ |__/ \__/
                                -->
                                <table id="table_personal_asignado"
                                    data-show-refresh="true"
                                    data-show-columns="true"
                                    data-search="true"
                                    data-pagination="true"
                                    data-page-size="5"
                                    data-query-params="queryParams"
                                    data-toolbar=".toolbar2"
                                    data-filter-control="true"
                                    data-url="archivo.json"
                              >
                                <thead>
                                  <tr>
                                   <th data-field="image" data-halign="center" data-align="center" data-formatter="imageFormatter">Foto</th>
                                   <th data-field="reg_cedula" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center"    >Cédula</th>
                                   <th data-field="nombre_completo" data-filter-control="select" data-sortable="false" data-halign="center" data-formatter="actionFormatterNombre" >Nombre y Apellido</th>                   
                                   <th data-field="nom_personal" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center" data-formatter="actionFormatterPersonal" >Nómina</th>
                                   <th data-field="nom_cargo" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center"  >Cargo Nómina</th>
                                   <th data-field="reg_tipo_personal_funcional" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center" data-formatter="actionFormatterPersonalFuncional" >Personal</th>
                                   <th data-field="reg_cargo_funcional" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center"        >Cargo Funcional</th>
                                   <th data-field="reg_dependencia_funcional" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center">Coordinación Laboral</th>
                                   <th data-field="reg_horas_doc" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center" data-formatter="actionFormatterHoras" >Horas</th>
                                   <!-- <th data-field="reg_horas_adm" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center"  >Horas Adm/Obr</th> -->
                                   <th data-field="action" data-align="center" data-formatter="actionFormatter2" data-events="actionEvents2"                        >Acción</th>
                                 </tr>
                                </thead>
                              </table>

                            </div>
                        
                        </div> <!-- fin ./ cuadro_listado_personal -->

                        <div id ="cuadro_datos_personal">

                            <div class="callout callout-info callout-min">
                              <h4>Datos Personales</h4>

                            </div>
                             <!-- <hr><strong>Datos Personales</strong><hr> -->
                          
                          <div class="row"  >
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="txt_cedula_personal" class="col-sm-4 control-label">Cédula*</label>
                                <div class="col-sm-8">
                                  <input class="form-control" id="txt_id_plantelesbase_per" type="hidden" name="txt_id_plantelesbase_per">
                                  <input class="form-control" id="txt_cod_plantel_per" type="hidden"    name="txt_cod_plantel_per">
                                  <input class="form-control" id="txt_id_personal_per" type="hidden"    name="txt_id_personal_per">
                                  <div class="input-group">
                                    <input class="form-control" id="txt_cedula_personal" type="text"    name="txt_cedula_personal" placeholder="Buscar" required>
                                    <span class="input-group-btn">
                                      <button type="button" name="btn_editar_personal" id="btn_editar_personal" class="btn btn-flat"><i class="glyphicon glyphicon-warning glyphicon-edit"></i></button>
                                      <button type="button" name="btn_buscar_personal" id="btn_buscar_personal" class="btn btn-flat"><i class="fa fa-search"></i></button>
                                      <button type="button" name="btn_limpiar_personal" id="btn_limpiar_personal" class="btn btn-flat"><i class="fa  fa-trash"></i></button>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="txt_apellido_funcionario" class="col-sm-4 control-label">Apellidos*</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="txt_apellido_funcionario" name="txt_apellido_funcionario"  placeholder="Ingrese Apellidos Completos"  pattern="[A-Za-z ]+" required>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="txt_nombre_funcionario" class="col-sm-4 control-label">Nombres*</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="txt_nombre_funcionario" name="txt_nombre_funcionario"  placeholder="Ingrese Nombres Completos" pattern="[A-Za-z ]+" required>
                                </div>
                              </div>
                            </div>
                          </div>  <!-- -/ fin row -->


                          <div class="row">
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="txt_sexo_funcionario" class="col-sm-4 control-label">Sexo*</label>
                                <div class="col-sm-8">
                                  <select class="form-control" id="txt_sexo_funcionario" name="txt_sexo_funcionario" required>
                                    <option value=''>Seleccione</option>  
                                    <option value='MASCULINO' >MASCULINO</option>
                                    <option value='FEMENINO' >FEMENINO</option>
                                  </select> 
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="txt_edocivil_funcionario" class="col-sm-4 control-label">Estado Civil*</label>
                                <div class="col-sm-8">
                                  <select class="form-control" id="txt_edocivil_funcionario" name="txt_edocivil_funcionario" required>
                                    <option value=''>Seleccione</option>  
                                    <option value='SOLTERO'>SOLTERO/SOLTERA</option>
                                    <option value='CASADO'>CASADO/CASADA</option>
                                    <option value='CONCUBINATO'>CONCUBINATO</option>
                                    <option value='DIVORCIADO'>DIVORCIADO/DIVORCIADA</option>
                                    <option value='VIUDO'>VIUDO/VIUDA</option>
                                  </select> 

                                </div>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="txt_fechanac_funcionario" class="col-sm-4 control-label">Fecha de Nacimiento*</label>
                                <div class="col-sm-8">
                                  <!-- <input type="text" class="form-control" id="txt_fechanac_funcionario" name="txt_fechanac_funcionario"  placeholder="Fecha de Nacimiento" readonly="readonly"> -->
                                  <!-- <input type="date" class="form-control" id="txt_fechanac_funcionario" name="txt_fechanac_funcionario"  placeholder="01/01/1980" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}" data-pattern-error="Formato Inválido (DD/MM/AAAA)" required> -->
                                  <input type="text" class="form-control" id="txt_fechanac_funcionario" name="txt_fechanac_funcionario"  placeholder="01/01/1980" required>
                                </div>
                              </div>
                            </div>
                          </div>  <!-- -/ fin row -->


                          <div class="row">
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="txt_celular_funcionario" class="col-sm-4 control-label">Teléfono Celular*</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="txt_celular_funcionario" name="txt_celular_funcionario"  placeholder="04XX-9998877"  pattern="^[0][4][12][246][-][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$" data-pattern-error="Formato Inválido (04XX-9998877)" required >
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="txt_telefono_funcionario" class="col-sm-4 control-label">Teléfono Resid.*</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="txt_telefono_funcionario" name="txt_telefono_funcionario"  placeholder="029X-1234567" pattern="^[0][2][9][1-9][-][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$" data-pattern-error="Formato Inválido (029X-1234567)" required>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="txt_correo_funcionario" class="col-sm-4 control-label">Correo Electrónico</label>
                                <div class="col-sm-8">
                                  <input type="email" class="form-control" id="txt_correo_funcionario" name="txt_correo_funcionario"  placeholder="Ingrese Correo Electrónico"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" data-error="Correo Electrónico Inválido (micorreo@gmail.com)" >
                                  <!-- <div class="help-block with-errors"></div> -->
                                </div>
                              </div>
                            </div>                          
                          </div>  <!-- -/ fin row -->


                          <div class="row">
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="txt_twitter_funcionario" class="col-sm-4 control-label">Twitter</label>
                                <div class="col-sm-8">
                                  <input  type="text" class="form-control" id="txt_twitter_funcionario" name="txt_twitter_funcionario" placeholder="Ingrese Red Twitter" pattern="^[_A-z0-9]{1,}$">
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-8">
                              <div class="form-group">
                                <label for="txt_direccion_funcionario" class="col-sm-2 control-label">Dirección de Habitación*</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="txt_direccion_funcionario" name="txt_direccion_funcionario"  placeholder="Ingrese Dirección de Habitación Completa" pattern="[A-Za-z 0-9]+" required>
                                </div>
                              </div>
                            </div>  
                          </div>  <!-- -/ fin row -->

                          <div class="row">
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="txt_grado_instruccion" class="col-sm-4 control-label">Grado de Instrucción*</label>
                                <div class="col-sm-8">
                                  <select class="form-control" id="txt_grado_instruccion" name="txt_grado_instruccion" required>
                                    <option value=''>Seleccione</option>  
                                    <option value='PRIMARIA INCOMPLETA'>PRIMARIA INCOMPLETA</option>
                                    <option value='PRIMARIA'>PRIMARIA</option>
                                    <option value='SECUNDARIA'>SECUNDARIA</option>
                                    <option value='BACHILLER'>BACHILLER</option>
                                    <option value='TECNICO MEDIO'>TECNICO MEDIO</option>
                                    <option value='TECNICO SUPERIOR'>TECNICO SUPERIOR</option>
                                    <option value='LICENCIATURA'>LICENCIATURA</option>
                                    <option value='INGENIERIA'>INGENIERIA</option>
                                    <option value='PROFESOR'>PROFESOR(A)</option>
                                    <option value='ABOGADO'>ABOGADO</option>
                                    <option value='ARQUITECTO'>ARQUITECTO</option>
                                    <option value='ODONTOLOGO'>ODONTOLOGO</option>
                                    <option value='SOCIOLOGO'>SOCIOLOGO</option>
                                    <option value='MEDICO'>MEDICO</option>
                                    <option value='ESPECIALIDAD'>ESPECIALIDAD</option>
                                    <option value='MAESTRIA'>MAESTRIA</option>
                                    <option value='DOCTORADO'>DOCTORADO</option>
                                    <option value='OTRO'>OTRO</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="txt_titulo" class="col-sm-4 control-label">Título Obtenido*</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="txt_titulo" name="txt_titulo"  placeholder="Título Obtenido" pattern="[A-Za-z ]+" required>
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="txt_institucion" class="col-sm-4 control-label">Institución</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="txt_institucion" name="txt_institucion"  placeholder="Institución Educativa" pattern="[A-Za-z ]+">
                                </div>
                              </div>
                            </div>

                          </div>  <!-- -/ fin row -->

                          <div class="row">
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="txt_discapacidad" class="col-sm-4 control-label">Posee alguna discapacidad*<br><br>Permite selección múltiple, presionado la tecla Ctrl</label>
                                <div class="col-sm-8">
                                  <select class="form-control" id="txt_discapacidad" name="txt_discapacidad[]" multiple="" size="10" required>
                                    <!-- <option value=''>Seleccione</option>   -->
                                    <option value='NINGUNA' selected='selected'>NINGUNA</option>
                                    <option value='VISUAL'>VISUAL</option>
                                    <option value='AUDITIVA'>AUDITIVA</option>
                                    <option value='TACTIL'>TACTIL</option>
                                    <option value='GUSTATIVA'>GUSTATIVA</option>
                                    <option value='OLFATIVA'>OLFATIVA</option>
                                    <option value='MOTORAS O MOTRICES'>MOTORAS O MOTRICES</option>
                                    <option value='AUSENCIA DE EXTREMIDAD'>AUSENCIA DE EXTREMIDAD</option>
                                    <option value='INTELECTUAL-COGNITIVO-PSICOSOCIAL'>INTELECTUAL-COGNITIVO-PSICOSOCIAL</option>
                                    <option value='OTRA'>OTRA</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-8">
                              <div class="form-group">
                                <label for="txt_discapacidad_otra" class="col-sm-2 control-label">Otra</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="txt_discapacidad_otra" name="txt_discapacidad_otra"  placeholder="En caso de poseer otra discapacidad" pattern="[A-Za-z 0-9]+">
                                  <p>Para selección múltiple debe mantener presionada la tecla 'Control'</p>
                                </div>
                              </div>
                            </div> 
                          </div>  <!-- -/ fin row -->

                        </div> <!-- fin cuadro_datos_personal -->

                        <div id ="cuadro_datos_laborales">

                            <div class="callout callout-info callout-min">
                              <h4><span id='resumen_laboral'>Datos Laborales (Lugar de trabajo)</span></h4>
                            </div>

                            <div class="row">

                              <div class="col-sm-4">
                                <div class="form-group">
                                  <label for="txt_tipo_personal_funcional" class="col-sm-4 control-label">Tipo de Funciones*</label>
                                  <div class="col-sm-8">
                                    <input class="form-control" id="txt_tipo_personal" type="hidden" name="txt_tipo_personal">
                                    <select class="form-control" id="txt_tipo_personal_funcional" name="txt_tipo_personal_funcional" required>
                                      <option value=''>Funciones Laborales</option>  
                                      <option value='ADMINISTRATIVO' >ADMINISTRATIVO</option>
                                      <option value='DOCENTE' >DOCENTE</option>
                                      <option value='OBRERO' >OBRERO</option>
                                      <option value='SUPERVISOR' >SUPERVISOR</option>
                                      <option value='VIGILANCIA' >VIGILANCIA</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="col-sm-4">
                                <div class="form-group">
                                  <label for="txt_cargo_funcion" class="col-sm-4 control-label">Cargo Funcional*</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="txt_cargo_funcion" name="txt_cargo_funcion"  placeholder="Cargo Funcional Desempeñado" pattern="[A-Za-z 0-9]+" required>
                                  </div>
                                </div>
                              </div>

                              
                              <div class="col-sm-4">
                                <div class="form-group">
                                  <label for="txt_coordinacion_laboral" class="col-sm-4 control-label">Coordinación Laboral*</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="txt_coordinacion_laboral" name="txt_coordinacion_laboral"  placeholder="Coordinación donde Laboral" pattern="[A-Za-z ]+" required>
                                  </div>
                                </div>
                              </div>
                            </div>  <!-- -/ fin row -->

                            <div class="row">
                              <div class="col-sm-4">
                                <div class="form-group">
                                  <label for="txt_turno_trabajo" class="col-sm-4 control-label">Turno de Trabajo*</label>
                                  <div class="col-sm-8">
                                    <select class="form-control" id="txt_turno_trabajo" name="txt_turno_trabajo" required>
                                      <option value=''>Seleccione</option>  
                                      <option value='COMPLETO' >COMPLETO</option>
                                      <option value='MAÑANA' >MAÑANA</option>
                                      <option value='MAÑANA' >TARDE</option>
                                      <option value='MAÑANA-TARDE' >MAÑANA-TARDE</option>
                                      <option value='INTEGRAL-MIXTO' >INTEGRAL-MIXTO</option>
                                      <option value='CONVENCIONAL' >CONVENCIONAL</option>
                                      <option value='NOCTURNO' >NOCTURNO</option>
                                      <option value='SABATINO' >SABATINO</option>
                                      <option value='POR HORAS' >POR HORAS</option>
                                    </select>
                                  </div>
                                </div>
                              </div>

                              <div class="col-sm-4">
                                <div class="form-group">
                                  <label for="txt_horario_laboral" class="col-sm-4 control-label">Horario Laboral*</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="txt_horario_laboral" name="txt_horario_laboral"  placeholder="Ingrese Hora de entrada y salida" pattern="[A-Za-z0-9 -:]+" data-error="Formato Inválido (08:00am-03:00pm)" required>
                                  </div>
                                </div>
                              </div>

                               <div class="col-sm-4">
                              <div class="form-group">
                                <label for="txt_fecha_ingreso" class="col-sm-4 control-label">Fecha Ingreso al MPPE*</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="txt_fecha_ingreso" name="txt_fecha_ingreso"  placeholder="31/12/1980" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}" required>
                                </div>
                              </div>
                            </div>

                            </div>  <!-- -/ fin row -->



                            <div class="row">
                              
                              <div class="col-sm-4">
                                <div class="form-group">
                                  <label for="txt_horas_doc_funcionario" class="col-sm-4 control-label">Horas Docentes*</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control"  id="txt_horas_doc_funcionario" name="txt_horas_doc_funcionario"  placeholder="Horas Docentes que labora (HH,MM)" pattern="[0-9]+(,[0-9]+)?$" data-pattern-error="Formato Inválido (HH,MM)" required>
                                  </div>
                                </div>
                              </div>

                              <div class="col-sm-4">
                                <div class="form-group">
                                  <label for="txt_horas_adm_obr_funcionario" class="col-sm-4 control-label">Horas Adm/Obr*</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="txt_horas_adm_obr_funcionario" name="txt_horas_adm_obr_funcionario"  placeholder="Horas Adm/Obr que labora (HH,MM)" pattern="[0-9]+(,[0-9]+)?$" data-pattern-error="Formato Inválido (HH,MM)" required>
                                  </div>
                                </div>
                              </div>

                              <div class="col-sm-4">
                                <div class="form-group">
                                  <label for="txt_tiempo_servicio" class="col-sm-4 control-label">Fecha Ingreso Coordinación*</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="txt_tiempo_servicio" name="txt_tiempo_servicio"  placeholder="31/12/1980" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}" required>
                                  </div>
                                </div>
                              </div>

                            </div>  <!-- -/ fin row -->

                        
                        </div> <!-- fin cuadro_datos_laborales -->


                    </div><!-- /.box-body -->
                  
                  </div> <!--/.modal-body-->

                  <div class="modal-footer">
                    <button type="button" name="btn_volver_listado"           id="btn_volver_listado"           class="btn btn-warning pull-left"   >Volver al Listado</button>
                    <!-- <button type="button" name="btn_continuar_datos_laboral"  id="btn_continuar_datos_laboral"  class="btn btn-success pull-left"   >Continuar con Datos Laborales</button> -->
                    <button type="button" name="btn_enviar_personal"          id="btn_enviar_personal"          class="btn btn-primary submit"      >Registrar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div> 



                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </form> 



          <!-- 
           __   __           __     __           __   ___     __   ___  __          __     __
          /  ` /  \  |\/| | /__` | /  \ |\ |    |  \ |__     /__` |__  |__) \  / | /  ` | /  \
          \__, \__/  |  | | .__/ | \__/ | \|    |__/ |___    .__/ |___ |  \  \/  | \__, | \__/
          
          -->
            
              <div id="modal_personal_comision_servicio" class="modal fade">
                <div class="modal-dialog" id="modal-dialog-xl">
                  <div class="modal-content">

                        <div class="modal-header"> <!-- modal-header --> 
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Carga de Personal Comisión de Servicio que Labora en la Institución</h4>
                          <span class="alert" id="alert_pesronal"></span>
                        </div> <!-- ./ modal-header -->

                        <div class="modal-body">
                            
                          <div class="box-body">

                              <div class="row" id="cuadro_listado_personal_comision_servicio" >

                                  <div class="col-sm-12">
                                    
                                    <div class="row"> 
                                      <div class="col-sm12 col-md-12">
                                        <p class="toolbar2_comision" id="toolbar2_comision">
                                          <input class="form-control" id="txt_id_plantelesbase_per_comision_servicio" type="hidden" name="txt_id_plantelesbase_per_comision_servicio">
                                          <input class="form-control" id="txt_cod_plantel_per_comision_servicio" type="hidden"    name="txt_cod_plantel_per_comision_servicio">
                                          <!-- <input class="form-control" id="txt_id_personal_per_comision_servicio" type="hidden"    name="txt_id_personal_per_comision_servicio"> -->
                                          <a class="create btn btn-default" id="btn_mostrar_agregar_personal_comision_servicio" href="javascript:">Nuevo Personal en Comisión de Servicio</a>
                                          <span class="alert" id="alert_pesronal"></span>
                                        </p>
                                      </div>
                                    </div>
                                    <!-- 
                                    ___       __        ___      __   ___  __   __   __                           __     __             __   __
                                     |   /\  |__) |    |__      |__) |__  |__) /__` /  \ |\ |  /\  |         /\  /__` | / _` |\ |  /\  |  \ /  \
                                     |  /~~\ |__) |___ |___     |    |___ |  \ .__/ \__/ | \| /~~\ |___     /~~\ .__/ | \__> | \| /~~\ |__/ \__/

                                      __   __           __     __           __   ___     __   ___  __          __     __
                                     /  ` /  \  |\/| | /__` | /  \ |\ |    |  \ |__     /__` |__  |__) \  / | /  ` | /  \
                                     \__, \__/  |  | | .__/ | \__/ | \|    |__/ |___    .__/ |___ |  \  \/  | \__, | \__/
                 
                                      -->
                                      <table id="table_personal_asignado_comision_servicio"
                                          data-show-refresh="true"
                                          data-show-columns="true"
                                          data-search="true"
                                          data-pagination="true"
                                          data-page-size="5"
                                          data-query-params="queryParams"
                                          data-toolbar=".toolbar2_comision"
                                          data-filter-control="true"
                                    >
                                      <thead>
                                        <tr>
                                         <th data-field="reg_cedula" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center"    >Cédula</th>
                                         <th data-field="nombre_completo" data-filter-control="select" data-sortable="false" data-halign="center" data-formatter="actionFormatterNombre" >Nombre y Apellido</th>                   
                                         <!-- <th data-field="nom_personal" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center" data-formatter="actionFormatterPersonal" >Nómina</th> -->
                                         <!-- <th data-field="nom_cargo" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center"  >Cargo Nómina</th> -->
                                         <th data-field="reg_tipo_personal_funcional" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center" data-formatter="actionFormatterPersonalFuncional" >Personal</th>
                                         <th data-field="reg_cargo_funcional" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center"        >Cargo Funcional</th>
                                         <th data-field="reg_dependencia_funcional" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center">Coordinación Laboral</th>
                                         <!-- <th data-field="reg_horas_doc" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center" data-formatter="actionFormatterHoras" >Horas</th> -->
                                         <!-- <th data-field="reg_horas_adm" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center"  >Horas Adm/Obr</th> -->
                                         <th data-field="reg_dependencia_comision" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center">Institución</th>
                                         <th data-field="action" data-align="center" data-formatter="actionFormatter2" data-events="actionEvents2"                        >Acción</th>
                                       </tr>
                                      </thead>
                                    </table>

                                  </div>
                              
                              </div> <!-- fin ./ cuadro_listado_personal_comision_servicio -->

                              

                              <div id="cuadro_comision_de_servicio" >
                                  <!-- <form class="form-horizontal" id="form_modal_personal_comision_servicio" role="form">
                                    
                                  </form>  -->
                              </div>

                                        
                          </div><!-- /.box-body -->
                        
                        </div> <!--/.modal-body-->

                        <div class="modal-footer">
                          <button type="button" name="btn_volver_listado_comision_servicio"           id="btn_volver_listado_comision_servicio"           class="btn btn-warning pull-left"   >Volver al Listado</button>
                          <button type="button" name="btn_enviar_personal_comision_servicio"          id="btn_enviar_personal_comision_servicio"          class="btn btn-primary submit"      >Registrar</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div> 

                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->










          <!-- 
             #    #     # ####### ####### ######  ### ######     #    ######  #######  #####
            # #   #     #    #    #     # #     #  #  #     #   # #   #     # #       #     #
           #   #  #     #    #    #     # #     #  #  #     #  #   #  #     # #       #
          #     # #     #    #    #     # ######   #  #     # #     # #     # #####    #####
          ####### #     #    #    #     # #   #    #  #     # ####### #     # #             #
          #     # #     #    #    #     # #    #   #  #     # #     # #     # #       #     #
          #     #  #####     #    ####### #     # ### ######  #     # ######  #######  #####
           -->

          	










      <!--./.....CONTENIDO AQUI-->
      <!--./.....CONTENIDO AQUI-->
      <!--./.....CONTENIDO AQUI-->
                        
      </div><!-- /.box-body -->
    </div><!-- /.box -->    
  </div><!-- /.col-sm-12 -->               
</div>

<!--...javascript AQUI-->
<!--...javascript AQUI-->
<!--...javascript AQUI-->
<script src="apiv3.0/plugins/bootstrap-table/bootstrap-table.js"></script>
<script src="apiv3.0/plugins/bootstrap-table/locale/bootstrap-table-es-SP.js"></script>
