<?php 
require_once('../conf/config.php');
require_once('../apiv3.0/funciones/funciones3.0.php');
?>
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->
<!-- <script type="text/javascript" src="apiv3.0/plugins/HTML5-Webcam-Plugin-with-jQuery-photobooth/photobooth_min.js"></script> -->

<!-- Select2 -->
<link rel="stylesheet" href="apiv3.0/plugins/select2/select2.min.css">


<div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="box box-solid box-primary ">
      <!--  BOX HEADER      -->
      <div class="box-header with-border">
        <h3 class="box-title">Busqueda</h3>
        <div class="box-tools pull-right">
          <!--<button id="boton_minus_busqueda" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>-->
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
      
      <!--  BOX-BODY  -->
      <div class="box-body">
      <!--CONTENIDO AQUI-->
      <!--CONTENIDO AQUI-->
      <!--CONTENIDO AQUI-->


          <!-- 
          ######  ####### ######   #####  ####### #     #    #    #
          #     # #       #     # #     # #     # ##    #   # #   #
          #     # #       #     # #       #     # # #   #  #   #  #
          ######  #####   ######   #####  #     # #  #  # #     # #
          #       #       #   #         # #     # #   # # ####### #
          #       #       #    #  #     # #     # #    ## #     # #
          #       ####### #     #  #####  ####### #     # #     # #######
          -->
          
          
          <form class="form-horizontal" id="form_modal_personal" role="form" data-toggle="validator">
            <div id="modal_personal">
              <div class="box-body">
                <div class="row"  >
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="txt_cedula_personal" class="col-sm-4 control-label">Cédula*</label>
                      <div class="col-sm-8">
                        <!-- <input class="form-control" id="txt_id_plantelesbase_per" type="hidden" name="txt_id_plantelesbase_per"> -->
                        <!-- <input class="form-control" id="txt_cod_plantel_per" type="hidden"    name="txt_cod_plantel_per"> -->
                        <!-- <input class="form-control" id="txt_id_personal_per" type="hidden"    name="txt_id_personal_per"> -->
                        <div class="input-group">
                          <input class="form-control" id="txt_cedula_personal" type="text"    name="txt_cedula_personal" placeholder="Buscar" required>
                          <span class="input-group-btn">
                            <button type="button" name="btn_buscar_personal" id="btn_buscar_personal" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            <button type="button" name="btn_limpiar_personal" id="btn_limpiar_personal" class="btn btn-flat"><i class="fa  fa-trash"></i></button>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="txt_apellido_funcionario" class="col-sm-4 control-label">Apellidos</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="txt_apellido_funcionario" name="txt_apellido_funcionario" disabled="disabled">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="txt_nombre_funcionario" class="col-sm-4 control-label">Nombres</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="txt_nombre_funcionario" name="txt_nombre_funcionario" disabled="disabled">
                      </div>
                    </div>
                  </div>
              </div>

              <!-- 
                ##      #    ###     ##     ##     ##             #     ##    ###     ##    #  #     #    ###     ##     ##
               #  #    # #   #  #   #  #   #  #   #  #           # #   #  #    #     #  #   ## #    # #   #  #   #  #   #  #
               #      #   #  #  #   #      #  #    #            #   #   #      #     #      # ##   #   #  #  #   #  #    #
               #      #####  ###    # ##   #  #     #           #####    #     #     # ##   #  #   #####  #  #   #  #     #
               #  #   #   #  #  #   #  #   #  #   #  #          #   #  #  #    #     #  #   #  #   #   #  #  #   #  #   #  #
                ##    #   #  #  #    ##     ##     ##           #   #   ##    ###     ##    #  #   #   #  ###     ##     ##

                 #    #             ###    ####   ###     ##     ##    #  #     #    #
                # #   #             #  #   #      #  #   #  #   #  #   ## #    # #   #
               #   #  #             #  #   ###    #  #    #     #  #   # ##   #   #  #
               #####  #             ###    #      ###      #    #  #   #  #   #####  #
               #   #  #             #      #      #  #   #  #   #  #   #  #   #   #  #
               #   #  ####          #      ####   #  #    ##     ##    #  #   #   #  ####
              -->
              
              <div class="row">
                <div class="col-sm12 col-md-12">
                  <table id="table_cargos_asignados"
                      data-page-size="10"
                      data-query-params="queryParams"
                      data-toolbar=".toolbar_MOVPER2"
                      style="display: none;"
                >
                  <thead>
                    <tr>
                     <th data-field="pb_municipio" data-filter-control="select" data-sortable="true" data-halign="center" data-align="center"    >Municipio</th>
                     <th data-field="pb_nombre" data-filter-control="select" data-sortable="true" data-halign="center" data-align="center"    >Dependencia</th>
                     <th data-field="reg_tipo_personal_funcional" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center" data-formatter="actionFormatterPersonalFuncional" >Personal</th>
                     <th data-field="reg_cargo_funcional" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center"        >Cargo Funcional</th>
                     <th data-field="reg_dependencia_funcional" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center">Coordinación Laboral</th>
                     <th data-field="action" data-align="center" data-formatter="actionFormatter_MOVPER2" data-events="actionEvents_MOVPER2"                        >Acción</th>
                   </tr>
                  </thead>
                </table>

                </div> <!--// fin col-sm-->

              </div><!--// fin row-->


              <div id ="cuadro_datos_laborales_MOVPER2" style="display: none;">

                  <br>
                  <div class="callout callout-info callout-min">
                    <h4><span id='resumen_laboral'>Datos Laborales (Lugar de trabajo)</span></h4>
                  </div>


                  <div class="row">

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="txt_dependencia" class="col-sm-4 control-label">Dependencia*</label>
                        <div class="col-sm-8">
                          <!-- <input class="form-control" id="txt_tipo_personal" type="hidden" name="txt_tipo_personal"> -->
                          <select class="form-control" id="txt_dependencia" name="txt_dependencia[]" style="width: 100%;" required>
                            <option value=''>Selecciones</option>  
                            <option value='DEPARTAMENTO 1' >DEPARTAMENTO 1</option>
                            <option value='DEPARTAMENTO 2' >DEPARTAMENTO 2</option>
                            <option value='DEPARTAMENTO 3' >DEPARTAMENTO 3</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="txt_dependencia2" class="col-sm-4 control-label" >Dependencia*</label>
                        <div class="col-sm-8">
                          <!-- <input class="form-control" id="txt_tipo_personal" type="hidden" name="txt_tipo_personal"> -->
                          <select class="form-control select2" id="txt_dependencia2" name="txt_dependencia2[]" multiple="multiple" style="width: 100%;">
                            <option selected="selected">Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                          </select>
                        </div>
                      </div>
                    </div>

                  </div>  <!-- -/ fin row -->


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

            <div class="box-footer" id="ventana_footer" style="display: none;">
              <button type="button" name="btn_enviar_personal"          id="btn_enviar_personal"          class="btn btn-primary submit pull-right"      >Registrar</button>
            </div>

          </div>
          </form>
  

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

<!-- Select2 -->
<script src="apiv3.0/plugins/select2/select2.full.min.js"></script>