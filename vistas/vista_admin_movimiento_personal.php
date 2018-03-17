<?php 
require_once('../conf/config.php');
require_once('../apiv3.0/funciones/funciones3.0.php');
?>
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->
<!-- <script type="text/javascript" src="apiv3.0/plugins/HTML5-Webcam-Plugin-with-jQuery-photobooth/photobooth_min.js"></script> -->


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
            <div class="box-body">


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
                  <table id="table_personal_asignado"
                      data-show-refresh="true"
                      data-show-columns="true"
                      data-search="true"
                      data-pagination="true"
                      data-page-size="5"
                      data-query-params="queryParams"
                      data-toolbar=".toolbar2"
                      data-filter-control="true"
                >
                  <thead>
                    <tr>
                     <th data-field="pb_municipio" data-filter-control="select" data-sortable="true" data-halign="center" data-align="center"    >Municipio</th>
                     <th data-field="pb_nombre" data-filter-control="select" data-sortable="true" data-halign="center" data-align="center"    >Dependencia</th>
                     <!-- <th data-field="image" data-formatter="imageFormatter">Foto</th> -->
                     <!-- <th data-field="reg_cedula" data-filter-control="select" data-sortable="true" data-halign="center" data-align="center"    >Cédula</th> -->
                     <!-- <th data-field="reg_nombre_completo" data-filter-control="select" data-sortable="true" data-halign="center" >Nombre</th>                    -->
                     <!-- <th data-field="reg_apellido_completo" data-filter-control="select" data-sortable="true" data-halign="center"  >Apellido</th>                    -->
                     <th data-field="nom_personal" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center" data-formatter="actionFormatterPersonal" >Nómina</th>
                     <th data-field="nom_cargo" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center"  >Cargo Nómina</th>
                     <th data-field="reg_tipo_personal_funcional" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center" data-formatter="actionFormatterPersonalFuncional" >Personal</th>
                     <th data-field="reg_cargo_funcional" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center"        >Cargo Funcional</th>
                     <th data-field="reg_dependencia_funcional" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center">Coordinación Laboral</th>
                     <!-- <th data-field="reg_telefono_celular" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center" data-formatter="actionFormatterContactosPersonal" >Contáctos</th> -->
                     <!-- <th data-field="reg_telefono_residencia" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center"  >Residencial</th> -->
                     <!-- <th data-field="reg_red_email" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center"  >Correo</th> -->
                     <th data-field="action" data-align="center" data-formatter="actionFormatter2" data-events="actionEvents2"                        >Acción</th>
                   </tr>
                  </thead>
                </table>

                </div> <!--// fin col-sm-->
              </div><!--// fin row-->




            </div><!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>

              <!-- <button type="button" name="btn_volver_listado"           id="btn_volver_listado"           class="btn btn-warning pull-left"   >Volver al Listado</button> -->
              <!-- <button type="button" name="btn_continuar_datos_laboral"  id="btn_continuar_datos_laboral"  class="btn btn-success pull-left"   >Continuar con Datos Laborales</button> -->
              <button type="button" name="btn_enviar_personal"          id="btn_enviar_personal"          class="btn btn-primary submit pull-right"      >Registrar</button>
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> -->
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