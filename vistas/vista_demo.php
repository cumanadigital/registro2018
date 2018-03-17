<?php
require_once('../apiv3.0/funciones/funciones3.0.php');
ver_arreglo($_POST);
?>
<div class="row">
    <div class="col-sm-12 col-md-12">
        
        
        <div class="box box-primary" >
            <div class="box-header with-border">
                <h3 class="box-title"><strong>Solicitud de Cursos Dirigidos - Departamento de <?php echo $_POST['dptouser'];?></strong></h3>
            </div><!-- /.box-header -->
            <?php
            //Array
            //(
            //    [dptouser] => Administración
            //    [cargouser] => Estudiante
            //    [userestatus] => activo
            //    [token1] => Fdf?D?9Fb07:A73D24¡3
            //)
            $estatus = $_POST['userestatus'];
            $departamento = $_POST['dptouser'];
            ?>
            
            <?php if ($estatus!='activo') { ?>
                    <h1>USUARIO INACTIVO</h1>
            <?php }else{ ?>
            
            
            <!-- form start -->
            <!--class="form-horizontal"-->
            <form role="form" >
            <div class="box-body">
                <!--CONTENIDO BODY-->
                    
                    <div class="col-sm-12 col-md-12" >
                        <div class="row">
                            
                            <div class="col-sm4 col-md-4">
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="control-label" for="txt_codigoasignatura">Código Asignatura</label>
                                      <input id="txt_codigoasignatura" name="txt_codigoasignatura" type="search" placeholder="Código Asignatura" class="form-control input-md" required="">
                                  </div>
                            </div>
                            
                            <div class="col-sm4 col-md-4">
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="control-label" for="txtasignatura">Nombre de la Asignatura</label>  
                                        <input id="txtasignatura" name="txtasignatura" type="text" placeholder="Asignatura" class="form-control input-md">
                                </div>
                            </div>
                            
                            <div class="col-sm4 col-md-4">
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="control-label" for="txt_creditos">Créditos</label>  
                                    <input id="txt_creditos" name="txt_creditos" type="text" placeholder="Créditos" class="form-control input-md" required="">  
                                </div>
                            </div>
                        </div>
                    
                    </div>

                <div class="col-sm-12 col-md-12" >
                    <div class="row">
                        
                        <div class="col-sm-8 col-md-8">
                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="control-label" for="txtarea_motivosolicitud">Motivo</label>
                                <textarea class="form-control" id="txtarea_motivosolicitud" name="txtarea_motivosolicitud">Motivo de la Solicitud</textarea>
                            </div>
                        </div>
                        <!--<div class="col-sm-4 col-md-4"> ..</div>-->
                        <!--<div class="col-sm-4 col-md-4"> </div>-->
                        
                    </div>
                </div>

                <div class="col-sm-12 col-md-12" >
                    <div class="row">
                        
                        <div class="col-sm-8 col-md-8"><strong>Si adicional al Curso Dirigido usted inscribió otras materias, por favor indiquelas a continuación:<br><br></strong>
                        </div>
                        <!--<div class="col-sm-4 col-md-4"> ..</div>-->
                        <!--<div class="col-sm-4 col-md-4"> ..</div>-->
                        
                    </div>
                </div>
                
                
                               
               
                
                


                
                <div class="col-sm-12 col-md-12" >
                    <div class="row">
                        
                        <div class="col-sm-12 col-md-12">
                            
                            <!-- Multiple Radios -->
                            <div class="form-group">
                              <label class="control-label" for="txt_radio_opciones">
                                Selecione una de las opciones de acuerdo a su condición</label>
                              <!--<div class="col-md-8">-->
                                
                                <div class="radio">
                                  <label for="txt_radio_opciones-0">
                                    <input type="radio" name="txt_radio_opciones" id="txt_radio_opciones-0" value="1" checked="checked">
                                    Que el estudiante haya cursado y aprobado todas las asignaturas correspondientes a su plan de estudios.
                                  </label>
                                  </div>
                                <div class="radio">
                                  <label for="txt_radio_opciones-1">
                                    <input type="radio" name="txt_radio_opciones" id="txt_radio_opciones-1" value="2">
                                    Que el estudiante este cursando las últimas asignaturas y una de ellas no se haya ofrecido en ese semestre.
                                  </label>
                                  </div>

                            </div>
                            <!--</div>-->
                            
                        </div>
                        <!--<div class="col-sm-4 col-md-4"> ..</div>-->
                        <!--<div class="col-sm-4 col-md-4"> ..</div>-->
                        
                    </div>
                </div>
                
                <!--<div class="col-sm-12 col-md-12" >-->
                <!--    <div class="row">-->
                <!--        -->
                <!--        <div class="col-sm-4 col-md-4"> ..</div>-->
                <!--        <div class="col-sm-4 col-md-4"> ..</div>-->
                <!--        <div class="col-sm-4 col-md-4"> ..</div>-->
                <!--        -->
                <!--    </div>-->
                <!--</div>-->
                
                
                    
                    
                    
                    
                    
                    
        
            </div><!-- /.box-body -->
                
            <div class="box-footer">
                <!-- Button (Double) -->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="btn_registrar_solicursodirigido">Acción</label>
                  <div class="col-md-8">
                    <button id="btn_registrar_solicursodirigido" name="btn_registrar_solicursodirigido" class="btn btn-primary">Registrar</button>
                    <button id="btn_cancelar_solicursodirigido" name="btn_cancelar_solicursodirigido" class="btn btn-danger">Cancelar</button>
                  </div>
                </div>
            </div>
        </form>
            
                
            <?php } ?>
            
    
    
            
            
        </div><!-- /.box -->
        
    
    </div>
</div>  
    
    