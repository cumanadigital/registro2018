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
            <div class="col-sm-4 col-md-4">
              <p class="toolbar" id="toolbar1">
                <!-- <a class="create btn btn-default" id="btn_crear_registro" href="javascript:">Agregar Plantel</a> -->
                <span class="alert"></span>
              </p>
            </div>
          </div>


          <div class="row">
            <div class="col-sm12 col-md-12">
              <table id="table"
               data-show-refresh="true"
               data-show-columns="true"
               data-search="true"
               data-show-export="true"
               data-pagination="true"
               data-page-size="5"
               data-page-list="[5, 10, 25, 50, 100]"
               data-query-params="queryParams"
               data-toolbar=".toolbar"
               data-filter-control="true">
                <thead>
                <tr>
                        <th data-field="id_plantelesbase"  data-filter-control="input"   data-sortable="true" data-halign="center" data-align="center" >Id</th>
                        <th data-field="municipio"         data-filter-control="select"  data-sortable="true" data-halign="center" data-align="center" >Municipio</th>
                        <th data-field="cod_plantel"       data-filter-control="input"   data-sortable="true" data-halign="center" data-align="center" >Código DEA</th>
                        <th data-field="nombre"            data-filter-control="input"   data-sortable="true" data-halign="center" data-align="left"   >Plantel</th>
                        <!-- <th data-field="cod_estadistico"   data-filter-control="input"   data-sortable="true" data-halign="center" data-align="center" >C. Estadistico</th> -->
                        <!-- <th data-field="cod_nomina"   data-filter-control="input"   data-sortable="true" data-halign="center" data-align="center" >C. Nómina</th>                    -->
                        <!-- <th data-field="parroquia"  data-filter-control="input"   data-sortable="true" data-halign="center" data-align="center" >Parroquia</th> -->
                        <!-- <th data-field="total"             data-filter-control="select"  data-sortable="true"  data-halign="center" data-align="center" >Matricula</th> -->
                        <!-- <th data-field="matricula"         data-filter-control="select"  data-sortable="false" data-halign="center" data-align="left" data-formatter="MatriculaFormatter" >Matricula</th> -->

                        <!-- <th data-field="personal"          data-filter-control="select"  data-sortable="false" data-halign="center" data-align="left"   data-formatter="PersonalFormatter"  >Personal</th> -->
                        <!-- <th data-field="personal"          data-filter-control="select"  data-sortable="false" data-halign="center" data-align="left"    >Estatus</th> -->
                        <th data-field="actualizado"       data-filter-control="input"   data-sortable="true"  data-halign="center" data-align="center" data-formatter="EstadoFormatter"  >Estatus</th>
                        <th data-field="action"
                            data-align="center"
                            data-formatter="actionFormatter"
                            data-events="actionEvents">Acción</th>
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