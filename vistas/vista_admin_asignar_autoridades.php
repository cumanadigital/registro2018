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
          <!-- <button id="boton_minus_busqueda" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> --> 
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
                  <div class="form-inline" role="form">
                      <div class="form-group ">
                          <!-- <span>Municipio: </span> -->
                          <select class="form-control" id="txt_municipio_filtro" name="txt_municipio_filtro" withd="10">
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
                      <div class="form-group">
                          <!-- <span>Dependencia: </span> -->
                          <select class="form-control" id="txt_tipo_dependencia_filtro" name="txt_tipo_dependencia_filtro">
                                  <option value=''>Seleccione Dependencia</option>
                                  <option value='NACIONAL' >NACIONAL</option>
                                  <option value='ESTADAL' >ESTADAL</option>
                                  <option value='MUNICIPAL' >MUNICIPAL</option>
                                  <option value='AUTONOMA' >AUTONOMA</option>
                                  <option value='PRIVADA' >PRIVADA</option>
                                  <option value='PRIVADA SUBVENCIONADA POR MPPE' >PRIVADA SUBVENC. MPPE</option>
                            </select>
                      </div>
                      <button id="btn_filtrar" type="button" class="btn btn-default">Aplicar Filtro</button>
                      <span class="alert"></span>
                  </div>
              </div>


              <table id="table_planteles"
                      data-show-refresh="true"
                      data-show-columns="true"
                      data-search="true"
                      data-pagination="true"
                      data-page-size="5"
                      data-toolbar=".toolbar1"
                      data-filter-control="true"
                      data-query-params="queryParams">
                  <thead>
                    <tr>                     
                     <!-- <th data-field="id_plantelesbase" data-filter-control="select" data-sortable="true" data-halign="center" data-align="center"    >ID</th> -->
                     <th data-field="municipio" data-filter-control="select" data-sortable="true" data-halign="center" data-align="center"    >Municipio</th>
                     <th data-field="cod_plantel" data-filter-control="select" data-sortable="true" data-halign="center" data-align="center"    >Cod. DEA</th>
                     <th data-field="nombre" data-filter-control="select" data-sortable="true" data-halign="center" data-align="center"    >Nombre Plantel</th>
                     <th data-field="tipo_dependencia" data-filter-control="select" data-sortable="true" data-halign="center" data-align="center">Dependencia</th>
                     <th data-field="dir_cedula" data-filter-control="select" data-sortable="true" data-halign="center" data-align="center"    >Cédula</th>
                     <th data-field="dir_nombre" data-filter-control="select" data-sortable="true" data-halign="center" >Nombre</th>                   
                     <th data-field="dir_apellido" data-filter-control="select" data-sortable="true" data-halign="center"  >Apellido</th>                   
                     <th data-field="action" data-align="center" data-formatter="actionFormatter" data-events="actionEvents">Acción</th>
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
                                <div class="input-group">
                                  <input class="form-control" id="txt_dir_cedula" type="text"   name="txt_dir_cedula"  placeholder="Ingrese Cédula" title="Cédula de Identidad" required autocomplete="off">
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
                              <label for="txt_dir_apellido" class="col-sm-4 control-label">Apellidos*</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_dir_apellido" type="text"   name="txt_dir_apellido" title="Ingrese Apellidos Completos" placeholder="Ingrese Apellidos Completos"  pattern="[A-Za-z ]+" required autocomplete="off" >
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_dir_nombre" class="col-sm-4 control-label">Nombre*</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_dir_nombre" type="text"   name="txt_dir_nombre" title="Ingrese Nombres Completos" placeholder="Ingrese Nombres Completos" pattern="[A-Za-z ]+" required autocomplete="off" >
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_dir_personal" class="col-sm-4 control-label">Tipo de Personal</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_dir_personal" type="text" name="txt_dir_personal" disabled >
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_dir_cargo" class="col-sm-4 control-label">Cargo Nómina</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_dir_cargo" type="text"   name="txt_dir_cargo" disabled >
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_dir_fecha_ingreso" class="col-sm-4 control-label">Fecha Ingreso MPPE</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_dir_fecha_ingreso" type="text" name="txt_dir_fecha_ingreso" disabled >
                              </div>
                            </div>
                          </div>
                        </div> 


                        <div class="row">
                          <div class="col-sm-8">
                            <div class="form-group">
                              <label for="txt_direccion" class="col-sm-2 control-label">Dirección de Habitación*</label>
                              <div class="col-sm-10">
                                <input class="form-control" id="txt_direccion" type="text"   name="txt_direccion" title="Ingrese Direccion Completa" placeholder="Ingrese Dirección de Habitación Completa" pattern="[A-Za-z 0-9]+" autocomplete="off" >
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_fecha_nac" class="col-sm-4 control-label">Fecha de Nacimiento</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_fecha_nac" type="date"   name="txt_fecha_nac" title="Ingrese Fecha de Nacimiento" placeholder="01/01/1980" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}" data-pattern-error="Formato Inválido (DD/MM/AAAA)"  autocomplete="off" >
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_dir_celular" class="col-sm-4 control-label">Teléfono Celular</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_dir_celular" type="text"   name="txt_dir_celular" title="Ingrese Teléfono Celular"  placeholder="04XX-9998877"  pattern="^[0][4][12][246][-][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$" data-pattern-error="Formato Inválido (04XX-9998877)"  autocomplete="off" >
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_dir_telefono" class="col-sm-4 control-label">Teléfono Habitación</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_dir_telefono" type="text"   name="txt_dir_telefono" title="Ingrese Teléfono Residencial" placeholder="029X-1234567" pattern="^[0][2][9][1-9][-][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$" data-pattern-error="Formato Inválido (029X-1234567)" autocomplete="off" >
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_dir_email" class="col-sm-4 control-label">Correo</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_dir_email" type="email"   name="txt_dir_email"  title="Ingrese Correo Electrónico Personal" placeholder="Ingrese Correo Electrónico"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" data-error="Correo Electrónico Inválido (micorreo@gmail.com)" autocomplete="off" >
                              </div>
                            </div>
                          </div>
                        </div> 



                        <!-- <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="txt_dir_twitter" class="col-sm-4 control-label">Twitter*</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="txt_dir_twitter" type="text"   name="txt_dir_twitter" placeholder="Ingrese Twitter Personal" title="Ingrese Twitter Personal" required autocomplete="off" >
                              </div>
                            </div>
                          </div>
                        </div> -->
                      
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