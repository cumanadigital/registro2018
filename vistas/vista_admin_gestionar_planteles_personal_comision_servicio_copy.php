<form class="form-horizontal" id="form_modal_personal_comision_servicio" role="form" data-toggle="validator" > 
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
                          <option value='MAESTRIA'>MAESTRIA</option>
                          <option value='ESPECIALIDAD'>ESPECIALIDAD</option>
                          <option value='DOCTORADO'>DOCTORADO</option>
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


              <!-- 
               __             __   __   __       __       ___  __   __       __   __           __     __            __   ___  __          __     __
              /  ` |  |  /\  |  \ |__) /  \     |  \  /\   |  /  \ /__`     /  ` /  \  |\/| | /__` | /  \ |\ |     /__` |__  |__) \  / | /  ` | /  \
              \__, \__/ /~~\ |__/ |  \ \__/ ___ |__/ /~~\  |  \__/ .__/ ___ \__, \__/  |  | | .__/ | \__/ | \| ___ .__/ |___ |  \  \/  | \__, | \__/
              
              -->
              <div id ="cuadro_datos_comision_servicio">

                  <div class="callout callout-warning callout-min">
                    <h4><span id='resumen_laboral'>Datos Comisión de Servicio (Institución de Origen)</span></h4>
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="txt_comision_institución" class="col-sm-4 control-label">Institución de Procedencia</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="txt_comision_institución" name="txt_comision_institución"  placeholder="Institución de Procedencia" pattern="[A-Za-z]+" required>
                        </div>
                      </div>
                    </div>                              
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="txt_comision_municipio" class="col-sm-4 control-label">Municipio*</label>
                        <div class="col-sm-8">
                          <select class="form-control" id="txt_comision_municipio" name="txt_comision_municipio" withd="6" required>
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
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="txt_comision_ciudad" class="col-sm-4 control-label">Ciudad*</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="txt_comision_ciudad" name="txt_comision_ciudad"  placeholder="Ciudad" pattern="[A-Za-z ]+" required>
                        </div>
                      </div>
                    </div>
                  </div>  <!-- -/ fin row -->

                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="txt_comison_jefe" class="col-sm-4 control-label">Jefe Inmediato*</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="txt_comison_jefe" name="txt_comison_jefe"  placeholder="Ingrese Nombre del Jefe Inmediato" pattern="[A-Za-z]+" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="txt_comsion_telefono_jefe" class="col-sm-4 control-label">Teléfono Contácto*</label>
                        <div class="col-sm-8">
                          <input class="form-control" id="txt_comsion_telefono_jefe" type="text"   name="txt_comsion_telefono_jefe" placeholder="Ingrese Teléfono" title="Ingrese Teléfono" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="txt_comision_jefe_email" class="col-sm-4 control-label">Correo*</label>
                        <div class="col-sm-8">
                          <input class="form-control" id="txt_comision_jefe_email" type="email"   name="txt_comision_jefe_email" placeholder="Ingrese Correo Electrónico" title="Ingrese Correo Electrónico" required >
                        </div>
                      </div>
                    </div>
                  </div> <!-- -/ fin row -->

                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="txt_comision_tipo_personal" class="col-sm-4 control-label">Tipo de Personal</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="txt_comision_tipo_personal" name="txt_comision_tipo_personal"  placeholder="Tipo de Personal" pattern="[A-Za-z]+" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="txt_comision_cargo_funcional" class="col-sm-4 control-label">Cargo Desempeñado*</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="txt_comision_cargo_funcional" name="txt_comision_cargo_funcional"  placeholder="Cargo Funcional Desempeñado" pattern="[A-Za-z 0-9]+" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="txt_comision_departamento_laboral" class="col-sm-4 control-label">Departamento Laboral*</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="txt_comision_departamento_laboral" name="txt_comision_departamento_laboral"  placeholder="Coordinación donde Laboral" pattern="[A-Za-z ]+" required>
                        </div>
                      </div>
                    </div>
                  </div>  <!-- -/ fin row -->

                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="txt_comison_jefe" class="col-sm-4 control-label">Jefe Inmediato*</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="txt_comison_jefe" name="txt_comison_jefe"  placeholder="Ingrese Nombre del Jefe Inmediato" pattern="[A-Za-z]+" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="txt_comsion_telefono_jefe" class="col-sm-4 control-label">Teléfono Contácto*</label>
                        <div class="col-sm-8">
                          <input class="form-control" id="txt_comsion_telefono_jefe" type="text"   name="txt_comsion_telefono_jefe" placeholder="Ingrese Teléfono" title="Ingrese Teléfono" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="txt_comision_jefe_email" class="col-sm-4 control-label">Correo*</label>
                        <div class="col-sm-8">
                          <input class="form-control" id="txt_comision_jefe_email" type="email"   name="txt_comision_jefe_email" placeholder="Ingrese Correo Electrónico" title="Ingrese Correo Electrónico" required >
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
