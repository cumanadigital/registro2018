<form class="form-horizontal" id="form_modal_personal_comision_servicio" role="form" data-toggle="validator" > 

    <div id ="cuadro_datos_personal">
      <!-- <div class="row"  >
        <div class="col-sm-8">
        <div class="callout callout-success callout-min">
          <h4>Datos Personales (Funcionario en Comisión de Servicio)</h4>
        </div>
        </div>
        <div class="col-sm-4">
        <button type="button" name="btn_volver_listado_comision_servicio"           id="btn_volver_listado_comision_servicio"           class="btn btn-warning pull-left"   >Volver al Listado</button>
        </div>
      </div> -->
        <div class="callout callout-success callout-min">
          <h4>Datos Personales (Funcionario en Comisión de Servicio)</h4>
        </div>
        
        <div class="row"  >
          <div class="col-sm-4">
            <div class="form-group">
              <label for="txt_cedula_personal_comision_servicio" class="col-sm-4 control-label">Cédula*</label>
              <div class="col-sm-8">
                <input class="form-control" id="txt_id_plantelesbase_per_comision_servicio" type="hidden" name="txt_id_plantelesbase_per_comision_servicio">
                <input class="form-control" id="txt_cod_plantel_per_comision_servicio" type="hidden"    name="txt_cod_plantel_per_comision_servicio">
                <input class="form-control" id="txt_id_personal_per_comision_servicio" type="hidden"    name="txt_id_personal_per_comision_servicio">
                <div class="input-group">
                  <input class="form-control" id="txt_cedula_personal_comision_servicio" type="text"    name="txt_cedula_personal_comision_servicio" placeholder="Buscar" required>
                  <span class="input-group-btn">
                    <button style="display: none" type="button" name="btn_editar_personal_comision_servicio" id="btn_editar_personal_comision_servicio" class="btn btn-flat"><i class="glyphicon glyphicon-warning glyphicon-edit"></i></button>
                    <button type="button" name="btn_buscar_personal_comision_servicio" id="btn_buscar_personal_comision_servicio" class="btn btn-flat"><i class="fa fa-search"></i></button>
                    <button type="button" name="btn_limpiar_personal_comision_servicio" id="btn_limpiar_personal_comision_servicio" class="btn btn-flat"><i class="fa  fa-trash"></i></button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="txt_apellido_funcionario_comision_servicio" class="col-sm-4 control-label">Apellidos*</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="txt_apellido_funcionario_comision_servicio" name="txt_apellido_funcionario_comision_servicio"  placeholder="Ingrese Apellidos Completos"  pattern="[A-Za-z ]+" required>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="txt_nombre_funcionario_comision_servicio" class="col-sm-4 control-label">Nombres*</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="txt_nombre_funcionario_comision_servicio" name="txt_nombre_funcionario_comision_servicio"  placeholder="Ingrese Nombres Completos" pattern="[A-Za-z ]+" required>
              </div>
            </div>
          </div>
        </div>  <!-- -/ fin row -->


        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="txt_sexo_funcionario" class="col-sm-4 control-label">Sexo*</label>
              <div class="col-sm-8">
                <select class="form-control" id="txt_sexo_funcionario_comision_servicio" name="txt_sexo_funcionario" required>
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
                <select class="form-control" id="txt_edocivil_funcionario_comision_servicio" name="txt_edocivil_funcionario_comision_servicio" required>
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
              <label for="txt_fechanac_funcionario_comision_servicio" class="col-sm-4 control-label">Fecha de Nacimiento*</label>
              <div class="col-sm-8">
                <!-- <input type="text" class="form-control" id="txt_fechanac_funcionario" name="txt_fechanac_funcionario"  placeholder="Fecha de Nacimiento" readonly="readonly"> -->
                <!-- <input type="date" class="form-control" id="txt_fechanac_funcionario" name="txt_fechanac_funcionario"  placeholder="01/01/1980" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}" data-pattern-error="Formato Inválido (DD/MM/AAAA)" required> -->
                <input type="text" class="form-control" id="txt_fechanac_funcionario_comision_servicio" name="txt_fechanac_funcionario_comision_servicio"  placeholder="01/01/1980" required>
              </div>
            </div>
          </div>
        </div>  <!-- -/ fin row -->


        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="txt_celular_funcionario_comision_servicio" class="col-sm-4 control-label">Teléfono Celular*</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="txt_celular_funcionario_comision_servicio" name="txt_celular_funcionario_comision_servicio"  placeholder="04XX-9998877"  pattern="^[0][4][12][246][-][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$" data-pattern-error="Formato Inválido (04XX-9998877)" required >
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="txt_telefono_funcionario_comision_servicio" class="col-sm-4 control-label">Teléfono Resid.*</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="txt_telefono_funcionario_comision_servicio" name="txt_telefono_funcionario_comision_servicio"  placeholder="029X-1234567" pattern="^[0][2][9][1-9][-][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$" data-pattern-error="Formato Inválido (029X-1234567)" required>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="txt_correo_funcionario_comision_servicio" class="col-sm-4 control-label">Correo Electrónico</label>
              <div class="col-sm-8">
                <input type="email" class="form-control" id="txt_correo_funcionario_comision_servicio" name="txt_correo_funcionario_comision_servicio"  placeholder="Ingrese Correo Electrónico"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" data-error="Correo Electrónico Inválido (micorreo@gmail.com)" >
              </div>
            </div>
          </div>                          
        </div>  <!-- -/ fin row -->


        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="txt_twitter_funcionario_comision_servicio" class="col-sm-4 control-label">Twitter</label>
              <div class="col-sm-8">
                <input  type="text" class="form-control" id="txt_twitter_funcionario_comision_servicio" name="txt_twitter_funcionario_comision_servicio" placeholder="Ingrese Red Twitter" pattern="^[_A-z0-9]{1,}$">
              </div>
            </div>
          </div>

          <div class="col-sm-8">
            <div class="form-group">
              <label for="txt_direccion_funcionario_comision_servicio" class="col-sm-2 control-label">Dirección de Habitación*</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="txt_direccion_funcionario_comision_servicio" name="txt_direccion_funcionario_comision_servicio"  placeholder="Ingrese Dirección de Habitación Completa" pattern="[A-Za-z 0-9]+" required>
              </div>
            </div>
          </div>  
        </div>  <!-- -/ fin row -->

        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="txt_grado_instruccion_comision_servicio" class="col-sm-4 control-label">Grado de Instrucción*</label>
              <div class="col-sm-8">
                <select class="form-control" id="txt_grado_instruccion_comision_servicio" name="txt_grado_instruccion_comision_servicio" required>
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
              <label for="txt_titulo_comision_servicio" class="col-sm-4 control-label">Título Obtenido*</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="txt_titulo_comision_servicio" name="txt_titulo_comision_servicio"  placeholder="Título Obtenido" pattern="[A-Za-z ]+" required>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="txt_institucion_comision_servicio" class="col-sm-4 control-label">Institución</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="txt_institucion_comision_servicio" name="txt_institucion_comision_servicio"  placeholder="Institución Educ. Superior" pattern="[A-Za-z ]+">
              </div>
            </div>
          </div>

        </div>  <!-- -/ fin row -->

        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="txt_discapacidad_comision_servicio" class="col-sm-4 control-label">Posee alguna discapacidad*<br><br>Permite selección múltiple, presionado la tecla Ctrl</label>
              <div class="col-sm-8">
                <select class="form-control" id="txt_discapacidad_comision_servicio" name="txt_discapacidad_comision_servicio[]" multiple="" size="10" required>
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
              <label for="txt_discapacidad_otra_comision_servicio" class="col-sm-2 control-label">Otra</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="txt_discapacidad_otra_comision_servicio" name="txt_discapacidad_otra_comision_servicio"  placeholder="En caso de poseer otra discapacidad" pattern="[A-Za-z 0-9]+">
                <p>Para selección múltiple debe mantener presionada la tecla 'Control'</p>
              </div>
            </div>
          </div> 
        </div>  <!-- -/ fin row -->

    </div> <!-- fin cuadro_datos_personal -->

 <!-- 
     __             __   __   __       __       ___  __   __       __   __           __     __            __   ___  __          __     __
    /  ` |  |  /\  |  \ |__) /  \     |  \  /\   |  /  \ /__`     /  ` /  \  |\/| | /__` | /  \ |\ |     /__` |__  |__) \  / | /  ` | /  \
    \__, \__/ /~~\ |__/ |  \ \__/ ___ |__/ /~~\  |  \__/ .__/ ___ \__, \__/  |  | | .__/ | \__/ | \| ___ .__/ |___ |  \  \/  | \__, | \__/

    -->
    <div id ="cuadro_datos_comision_servicio">

        <div class="callout callout-danger callout-min">
          <h4><span id='resumen_laboral'>Datos Comisión de Servicio (Datos de la Institución de Procedencia)</span></h4>
        </div>

        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="txt_comision_institucion" class="col-sm-4 control-label">Institución de Procedencia</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="txt_comision_institucion" name="txt_comision_institucion"  placeholder="Institución de Procedencia" pattern="[A-Za-z]+" required>
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
              <label for="txt_comision_tipo_personal" class="col-sm-4 control-label">Tipo de Personal*</label>
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
              <label for="txt_comision_celular_jefe" class="col-sm-4 control-label">Teléfono Celular*</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="txt_comision_celular_jefe" name="txt_comision_celular_jefe"  placeholder="04XX-9998877"  pattern="^[0][4][12][246][-][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$" data-pattern-error="Formato Inválido (04XX-9998877)" required >
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="txt_comision_telefono_jefe" class="col-sm-4 control-label">Teléfono Contácto*</label>
              <div class="col-sm-8">
                <input class="form-control" id="txt_comision_telefono_jefe" type="text"   name="txt_comision_telefono_jefe" placeholder="Ingrese Teléfono" title="Ingrese Teléfono" required>
              </div>
            </div>
          </div>
        </div>  <!-- -/ fin row -->
        
    </div> <!-- fin cuadro_datos_comision_servicio -->


<!-- 
     __       ___  __   __                __   __   __             ___  __
    |  \  /\   |  /  \ /__`    |     /\  |__) /  \ |__)  /\  |    |__  /__`
    |__/ /~~\  |  \__/ .__/    |___ /~~\ |__) \__/ |  \ /~~\ |___ |___ .__/

 -->
    <div id ="cuadro_datos_laborales">

        <div class="callout callout-success callout-min">
          <h4><span id='resumen_laboral'>Datos Laborales (Lugar de trabajo por parte del MPPE)</span></h4>
        </div>

        <div class="row">

          <div class="col-sm-4">
            <div class="form-group">
              <label for="txt_tipo_personal_funcional_comision_servicio" class="col-sm-4 control-label">Tipo de Funciones*</label>
              <div class="col-sm-8">
                <input class="form-control" id="txt_tipo_personal_comision_servicio" type="hidden" name="txt_tipo_personal_comision_servicio">
                <select class="form-control" id="txt_tipo_personal_funcional_comision_servicio" name="txt_tipo_personal_funcional_comision_servicio" required>
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
              <label for="txt_cargo_funcion_comision_servicio" class="col-sm-4 control-label">Cargo Funcional*</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="txt_cargo_funcion_comision_servicio" name="txt_cargo_funcion_comision_servicio"  placeholder="Cargo Funcional Desempeñado" pattern="[A-Za-z 0-9]+" required>
              </div>
            </div>
          </div>

          
          <div class="col-sm-4">
            <div class="form-group">
              <label for="txt_coordinacion_laboral_comision_servicio" class="col-sm-4 control-label">Coordinación Laboral*</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="txt_coordinacion_laboral_comision_servicio" name="txt_coordinacion_laboral_comision_servicio"  placeholder="Coordinación donde Laboral" pattern="[A-Za-z ]+" required>
              </div>
            </div>
          </div>
        </div>  <!-- -/ fin row -->

        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="txt_turno_trabajo_comision_servicio" class="col-sm-4 control-label">Turno de Trabajo*</label>
              <div class="col-sm-8">
                <select class="form-control" id="txt_turno_trabajo_comision_servicio" name="txt_turno_trabajo_comision_servicio" required>
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
              <label for="txt_horario_laboral_comision_servicio" class="col-sm-4 control-label">Horario Laboral*</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="txt_horario_laboral_comision_servicio" name="txt_horario_laboral_comision_servicio"  placeholder="Ingrese Hora de entrada y salida" pattern="[A-Za-z0-9 -:]+" data-error="Formato Inválido (08:00am-03:00pm)" required>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="txt_tiempo_servicio_comision_servicio" class="col-sm-4 control-label">Fecha Ingreso Coordinación*</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="txt_tiempo_servicio_comision_servicio" name="txt_tiempo_servicio_comision_servicio"  placeholder="31/12/1980" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}" required>
              </div>
            </div>
          </div>

        </div>  <!-- -/ fin row -->


        
    </div> <!-- fin cuadro_datos_laborales -->

   
</form> 
