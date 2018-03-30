<form class="form-horizontal" id="form_modal_personal_comision_servicio" role="form"> 
  <div id="modal_personal_comision_servicio" class="modal fade">
    <div class="modal-dialog" id="modal-dialog-xl">
      <div class="modal-content"> 
        
        <div class="modal-header"> <!-- modal-header --> 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Carga de Personal Comisión de Servicio que Labora en la Institución</h4>
        </div> <!-- ./ modal-header -->

        <div class="modal-body">
            
          <div class="box-body">


              <div class="row" id="cuadro_listado_personal_comision_servicio">

                  <div class="col-sm-12">
                    
                    <div class="row"> 
                      <div class="col-sm12 col-md-12">
                        <p class="toolbar2_comision" id="toolbar2_comision">
                          <a class="create btn btn-default" id="btn_mostrar_agregar_personal_comision_servicio" href="javascript:">Agregar Personal</a>
                          <span class="alert" id="alert_pesronal"></span>
                        </p>
                      </div>
                    </div>
                    <!-- 
                    ___       __        ___      __   ___  __   __   __                           __     __             __   __
                     |   /\  |__) |    |__      |__) |__  |__) /__` /  \ |\ |  /\  |         /\  /__` | / _` |\ |  /\  |  \ /  \
                     |  /~~\ |__) |___ |___ ___ |    |___ |  \ .__/ \__/ | \| /~~\ |___ ___ /~~\ .__/ | \__> | \| /~~\ |__/ \__/

                      __   __           __     __           __   ___     __   ___  __          __     __
                     /  ` /  \  |\/| | /__` | /  \ |\ |    |  \ |__     /__` |__  |__) \  / | /  ` | /  \
                     \__, \__/  |  | | .__/ | \__/ | \|    |__/ |___    .__/ |___ |  \  \/  | \__, | \__/
 
                      -->
                      <table id="table_personal_asignado"
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
                         <th data-field="reg_horas_doc" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center" data-formatter="actionFormatterHoras" >Horas</th>
                         <!-- <th data-field="reg_horas_adm" data-filter-control="select" data-sortable="false" data-halign="center" data-align="center"  >Horas Adm/Obr</th> -->
                         <th data-field="action" data-align="center" data-formatter="actionFormatter2" data-events="actionEvents2"                        >Acción</th>
                       </tr>
                      </thead>
                    </table>

                  </div>
              
              </div> <!-- fin ./ cuadro_listado_personal_comision_servicio -->



                        
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
