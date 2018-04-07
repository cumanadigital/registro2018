<?php 
require_once('../conf/config.php');
require_once('../apiv3.0/funciones/funciones3.0.php');
?>
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->

<div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="box box-solid box-primary ">
      <!--  BOX HEADER      -->
      <div class="box-header with-border">
        <h3 class="box-title">Planteles</h3>
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
              <p class="toolbar" id="toolbar1">
                <!-- <a class="create btn btn-default" id="btn_crear_registro"href="javascript:">Agregar Plantel</a> -->
                <span class="alert"></span>
              </p>
            </div>
          </div>
          
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
                      data-url="archivo.json"
                >
                  <thead>
                    <tr>
                     <th data-field="pb_municipio" data-filter-control="select" data-sortable="true" data-halign="center" data-align="center"    >Municipio</th>
                     <th data-field="pb_nombre" data-filter-control="select" data-sortable="true" data-halign="center" data-align="center"    >Dependencia</th>
                     <th data-field="image" data-halign="center" data-align="center"  data-formatter="imageFormatter">Foto</th>
                     <th data-field="reg_cedula" data-filter-control="select" data-sortable="true" data-halign="center" data-align="center"    >Cédula</th>
                     <th data-field="reg_nombre_completo" data-filter-control="select" data-sortable="true" data-halign="center" >Nombre</th>                   
                     <th data-field="reg_apellido_completo" data-filter-control="select" data-sortable="true" data-halign="center"  >Apellido</th>                   
                     <th data-field="nom_personal" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center" data-formatter="actionFormatterPersonal" >Nómina</th>
                     <th data-field="nom_cargo" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center"  >Cargo Nómina</th>
                     <th data-field="reg_tipo_personal_funcional" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center" data-formatter="actionFormatterPersonalFuncional" >Personal</th>
                     <th data-field="reg_cargo_funcional" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center"        >Cargo Funcional</th>
                     <th data-field="reg_dependencia_funcional" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center">Coordinación Laboral</th>
                     <th data-field="reg_telefono_celular" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center" data-formatter="actionFormatterContactosPersonal" >Contáctos</th>
                     <!-- <th data-field="reg_telefono_residencia" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center"  >Residencial</th> -->
                     <!-- <th data-field="reg_red_email" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center"  >Correo</th> -->
                     <!-- <th data-field="action" data-align="center" data-formatter="actionFormatter2" data-events="actionEvents2"                        >Acción</th> -->
                   </tr>
                  </thead>
                </table>

            </div> <!--// fin col-sm-->
          </div><!--// fin row-->


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