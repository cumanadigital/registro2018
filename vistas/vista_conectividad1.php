<?php
include('../apiv3.0/funciones/funciones3.0.php');
$estatus = $_POST['userestatus'];
$departamento = $_POST['dptouser'];
?>
<div class="row">
    <div class="col-sm-12 col-md-12">




            









            
            <div class="box box-solid box-primary ">
                    <!--  BOX HEADER      -->
                    <div class="box-header with-border">
                        <h3 class="box-title">Conectividad</h3>

                        <div class="box-tools pull-right">
                            <!--<button id="boton_minus_busqueda" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>-->
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    
                    <!--  BOX-BODY  -->
                    <div class="box-body">
                    <!--CONTENIDO AQUI-->
                    <!--CONTENIDO AQUI-->
                    <!--CONTENIDO AQUI-->
                    <!-- <p class="toolbar" id="toolbar1">
                        <a class="create btn btn-default" id="btn_crear_profesor" href="javascript:">Agregar</a>
                        <a class="create btn btn-default" id="btn_print_profesor" href="javascript:">Listado General</a>
                        <span class="alert"></span>
                    </p> -->
<!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txtmodalidad">Nivel/Modalidad</label>
              <div class="col-md-4">
                <select id="txtmodalidad" name="txtmodalidad" class="form-control">
                  <option value="1">Nivel 1</option>
                  <option value="2">Nivel 1</option>
                </select>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txt_institucion">Institución</label>  
              <div class="col-md-4">
              <input id="txt_institucion" name="txt_institucion" placeholder="" class="form-control input-md" type="text">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txt_director">Director</label>  
              <div class="col-md-5">
              <input id="txt_director" name="txt_director" placeholder="" class="form-control input-md" required="" type="text">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txt_cedula">Cédula</label>  
              <div class="col-md-4">
              <input id="txt_cedula" name="txt_cedula" placeholder="" class="form-control input-md" required="" type="text">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txt_teldirector">Teléfono Director</label>  
              <div class="col-md-4">
              <input id="txt_teldirector" name="txt_teldirector" placeholder="" class="form-control input-md" required="" type="text">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txt_contacto">Otro contacto</label>  
              <div class="col-md-5">
              <input id="txt_contacto" name="txt_contacto" placeholder="Con sus funciones" class="form-control input-md" required="" type="text">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txt_telcontacto">Teléfono Contacto</label>  
              <div class="col-md-4">
              <input id="txt_telcontacto" name="txt_telcontacto" placeholder="" class="form-control input-md" required="" type="text">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txtestado">Estado</label>  
              <div class="col-md-4">
              <input id="txtestado" name="txtestado" placeholder="Sucre" class="form-control input-md" required="" type="text">
                
              </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txt_municipio 1">Municipio</label>
              <div class="col-md-4">
                <select id="txt_municipio 1" name="txt_municipio 1" class="form-control">
                  <option value="1">Municipio 1</option>
                  <option value="2">Municipio 1</option>
                </select>
              </div>
            </div>

            <!-- Multiple Radios (inline) -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txt_estatusconectividad">Estatus Conectividad</label>
              <div class="col-md-4"> 
                <label class="radio-inline" for="txt_estatusconectividad-0">
                  <input name="txt_estatusconectividad" id="txt_estatusconectividad-0" value="1" checked="checked" type="radio">
                  Operativa
                </label> 
                <label class="radio-inline" for="txt_estatusconectividad-1">
                  <input name="txt_estatusconectividad" id="txt_estatusconectividad-1" value="2" type="radio">
                  Inoperativa
                </label>
              </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txt_observaciones">Observaciones</label>
              <div class="col-md-4">                     
                <textarea class="form-control" id="txt_observaciones" name="txt_observaciones">Ingrese sus observaciones</textarea>
              </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txt_direccion">Dirección</label>
              <div class="col-md-4">                     
                <textarea class="form-control" id="txt_direccion" name="txt_direccion">Dirección Completa con algún punto de referencia</textarea>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txt_conectividad">Conectividad</label>  
              <div class="col-md-5">
              <input id="txt_conectividad" name="txt_conectividad" placeholder="Conectividad que posee" class="form-control input-md" type="text">
                
              </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="btn_enviar">Acciones</label>
              <div class="col-md-8">
                <button id="btn_enviar" name="btn_enviar" class="btn btn-primary">Enviar</button>
                <button id="btn_cancelar" name="btn_cancelar" class="btn btn-danger">Cancelar</button>
              </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txt_parroquia">Parroquia</label>
              <div class="col-md-4">
                <select id="txt_parroquia" name="txt_parroquia" class="form-control">
                  <option value="1">Parroquia 1</option>
                  <option value="2">Parroquia 2</option>
                </select>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txt_numero">N° Asignado</label>  
              <div class="col-md-4">
              <input id="txt_numero" name="txt_numero" placeholder="Teléfono Fijo" class="form-control input-md" required="" type="text">
                
              </div>
            </div>

            </fieldset>
            </form>


                    <!--./.....CONTENIDO AQUI-->
                    <!--./.....CONTENIDO AQUI-->
                    <!--./.....CONTENIDO AQUI-->
                        
                    </div><!-- /.box-body -->
             </div><!-- /.box -->    
            
    </div>



    
</div>
</div>


<script src="apiv3.0/plugins/bootstrap-table/bootstrap-table.js"></script>
<script src="apiv3.0/plugins/bootstrap-table/locale/bootstrap-table-es-SP.js"></script>
<!--<script src="apiv3.0/plugins/bootstrap-table/extensions/filter-control/bootstrap-table-filter-control.js"></script>-->


<script>

//CargarJS('apiv3.0/plugins/bootstrap-table/locale/bootstrap-table-es-SP.js');
//CargarJS('apiv3.0/plugins/bootstrap-table/bootstrap-table.js');

$('#btn_registrar_planilla, #btn_cancelar_planilla').on("click", function(event){
    console.log($(this).attr('id'));
  console.log($(this).text());
});


  
function queryParams(params) {
  return {};
}

</script>
