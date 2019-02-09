<style type="text/css">
.lbldetalle{
	color:#2196F3;
}
.h3titulo{
	margin-left: 30px;
	color:#2196F3;
}
.user-profile-content{
	margin-top: 25px;
}
.comment-text-area {
  float: center;
  width: calc(100% - 15px);
  height: auto;
  background-color: red;
  padding-bottom: 25px;
}

.textinput {
  float:left;
  width: 100%;
  min-height: 175px;
  outline: none;
  resize: none;
  border: 1px solid #f0f0f0;
  margin-bottom: 20px;
  font-size: 13px;
  padding: 12px;
}

input:read-only { 
    background-color: #E9E9E9;
}

</style>

<style>
    .f{
        padding: 10px;
    }
    fieldset{
         padding-left: 20px;
         background-color: rgb(247,247,247);  
         border-radius: 10px 10px 10px 10px;
    }
    strong{
        font-size: 15px;
        color: rgb(68,130,150);
    }
    .input{
        border-radius: 10px 10px 10px 10px;
    }
    .d{
        height: 20px;
        width: 60px;
    }
    .preguntas{
        padding-right: 25px;
        padding-top: 12px;
    }
    legend{
        font-size: 18px;
    }
</style>

<div class="pull-left breadcrumb_admin clear_both">
	<div class="pull-left page_title theme_color">
		<h1>Pacientes</h1>
		<h2 class="active"><?php echo $paciente->idPaciente != null ? "Actualizar Paciente" : "Registrar Paciente";  ?></h2>
	</div>
	<div class="pull-right">
		<ol class="breadcrumb">
			<li><a href="?c=Inicio">Inicio</a></li>
			<li><a href="?c=Paciente">Pacientes</a></li>
			<li class="active"><?php echo $paciente->idPaciente != null ? "Actualizar Paciente" : "Registrar Paciente"; ?></li>
		</ol>
	</div>
</div>
<div class="container clear_both padding_fix">
	<div class="row">
		<div class="col-md-12">
			<div class="block-web">
				<div class="header">
					<div class="row" style="margin-top: 15px; margin-bottom: 12px;">
						<div class="col-sm-8">
							<div class="actions"> </div>
							
						</div>
						<div class="col-md-4">
							<div class="btn-group pull-right">
								<div class="actions">
								</div>
							</div>
						</div>
					</div>
				</div><!--hola-->
				<!-- SmartWizard html -->
				<div class="porlets-content">
					<div  class="form-horizontal row-border" > <!--acomodo-->
						<form class="" id="myForm" action="?c=Paciente&a=Guardar" method="post" role="form" enctype="multipart/form-data" parsley-validate novalidate data-toggle="validator">
							<div id="smartwizard">
								<ul>
									<li><a href="#general">General</a></li>
									<li><a href="#historial">Historial Clinico</a></li>
									<li><a href="#atm">ATM</a></li>
									<li><a href="#odontograma">Odontograma</a></li>
									<li><a href="#radiografia">Radiografia</a></li>
									<li><a href="#pagos">Historial de Pagos</a></li>
								</ul>
								<div>
									
									<div id="general"> 
					                  	<div class="user-profile-content">
					                    	<input type="hidden" name="idPaciente" value="<?php echo $paciente->idPaciente != null ? $paciente->idPaciente : 0;  ?>"/>
					                    	<div id="form-step-0" role="form" data-toggle="validator">
					                      		<fieldset>
                        <div class="row">
                          <h3 class="h3titulo">Datos Generales</h3>                        
                          <div class="form-row"><!--DATOS PARA SISTEMA-->
                           
                            <div class="col-md-3 mb-3">
                              <label for="fecIngreso" control-label">Fecha de Ingreso<strog class="theme_color">*</strog></label>
                              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input required name="fecIngreso" id="fecIngreso" type="date" value="<?php echo $paciente->idPaciente!=null ? $paciente->fecIngreso : "" ?>" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-3 mb-3">
                              <label for="folio" class="control-label">Folio<strog class="theme_color">*</strog></label>
                              <input required onkeypress=" return soloNumeros(event);" name="folio" maxlength="10" id="folio" type="text" autofocus class="form-control" value="<?php echo $paciente->folio;?>" placeholder="Folio"/>
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>                        
                          <div class="row"></div>
                          <div class="form-row"><!--DATOS GENERALES-->
                            <div class="col-md-4 mb-3">
                              <label for="nombre" class="control-label">Nombre<strong class="theme_color">*</strong></label>
                              <input required onkeypress=" return soloLetras(event);" name="nombre" maxlength="60" id="nombre" type="text" autofocus class="form-control" value="<?php echo $paciente->nombre;?>" placeholder="Nombre del paciente"/>
                              <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                              <label for="apePat" class="control-label">Ap. Paterno<strong class="theme_color">*</strong></label>
                              <input required onkeypress=" return soloLetras(event);" name="apePat" maxlength="60" id="apePat" type="text" autofocus class="form-control" value="<?php echo $paciente->apePat;?>" placeholder="Apellido paterno del paciente"/>
                              <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                              <label for="apeMat" class="control-label">Ap. Materno</label>
                              <input onkeypress=" return soloLetras(event);" name="apeMat" maxlength="60" id="apeMat" type="text" autofocus class="form-control" value="<?php echo $paciente->apeMat;?>" placeholder="Apellido materno del paciente"/>
                              <div class="help-block with-errors"></div>
                            </div> 
                            <div class="row"></div>
                            
                            <div class="col-md-2 mb-2">
                              <label for="sexo" class="control-label">Sexo<strong class="theme_color">*</strong></label>
                              <select required name="sexo" class="form-control">
                                <?php if($paciente->idPaciente==null){ ?>
                                <option value="">
                                  Seleccione...
                                </option>
                                <?php } if($paciente->idPaciente!=null){ ?>
                                <option value="<?php echo $paciente->sexo?>">
                                  <?php echo $paciente->sexo; ?>
                                </option>
                                <?php } ?>
                                <option>
                                  Hombre
                                </option>
                                <option>
                                  Mujer
                                </option>
                              </select>
                              <div class="help-block with-errors"></div>
                            </div>
                            
                            <div class="col-md-1 mb-1">
                              <label for="edad" class="control-label">Edad<strong class="theme_color">*</strong></label>
                              <input required onkeypress="return soloNumeros(event);" name="edad" maxlength="8" id="edad" type="text" autofocus class="form-control" value="<?php echo $paciente->edad;?>"/>
                              <div class="help-block with-errors"></div>
                            </div>  
                            <div class="col-md-3 mb-3">
                              <label for="fecNacimiento" control-label">Fecha de Nacimiento<strog class="theme_color">*</strog></label>
                              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input required name="fecNacimiento" id="fecNacimiento" type="date" value="<?php echo $paciente->idPaciente!=null ? $paciente->fecNacimiento : "" ?>" class="form-control">
                              </div>
                            </div> 
                            <div class="col-md-3 mb-3">
                              <label for="lugNacimiento" class="control-label">Lugar de Nacimiento<strong class="theme_color">*</strong></label>
                              <input required onkeypress="return soloLetras(event);" name="lugNacimiento" maxlength="60" id="lugNacimiento" type="text" autofocus class="form-control" value="<?php echo $paciente->lugNacimiento;?>" placeholder="Donde nacio?"/>
                              <div class="help-block with-errors"></div>
                            </div>                            
                          </div> 
                        </div> 
                      </fieldset>
                      <br>
                      <div class="row"></div>
                      <fieldset>
                        <div class="row">                    
                          <div class="form-row">
                            <h3 class="h3titulo">Domicilio</h3><!--DATOS DE DOMICILIO-->
                            <div class="col-md-4 mb-3">
                              <label for="calle" class="control-label">Calle<strog class="theme_color">*</strog></label>
                              <input required name="calle" maxlength="60" id="calle" type="text" autofocus class="form-control" value="<?php echo $paciente->calle;?>" placeholder="Ingrese la calle o vialidad"/>
                              <div class="help-block with-errors"></div>
                            </div>
                            
                            <div class="col-md-2 mb-2">
                              <label for="telCasa" class="control-label">Numero:<strog class="theme_color">*</strog></label>
                              <input placeholder="Ingrese el numero de la casa" required onkeypress=" return soloNumeros(event);" onkeypress="return soloNumeros(event);" type="text" name="telCasa" id="telCasa" value="<?php echo $paciente->telCasa;?>" class="form-control mask" >
                              <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                              <label for="colonia" class="control-label">Colonia<strog class="theme_color">*</strog></label>
                              <input required name="colonia" maxlength="60" id="colonia" type="text" autofocus class="form-control" value="<?php echo $paciente->colonia;?>" placeholder="Ingrese la colonia o asentamiento"/>
                              <div class="help-block with-errors"></div>
                            </div>
                             <div class="col-md-4 mb-3">
                              <label for="codPos" class="control-label">Cod. Postal<strog class="theme_color">*</strog></label>
                              <input required onkeypress="return soloNumeros(event);" name="codPos" maxlength="5" id="codPos" type="text" autofocus class="form-control" value="<?php echo $paciente->codPos;?>" placeholder="Ingrese un codigo postal"/>
                              <div class="help-block with-errors"></div>
                            </div>
                             <div class="col-md-4 mb-3">
                              <label for="localidad" class="control-label">Localidad<strog class="theme_color">*</strog></label>
                              <input required onkeypress="return soloLetras(event);" name="localidad" maxlength="60" id="localidad" type="text" autofocus class="form-control" value="<?php echo $paciente->localidad;?>" placeholder="Localidad o municipio al que pertenec"/>
                              <div class="help-block with-errors"></div>
                            </div>
                             <div class="col-md-4 mb-3">
                              <label for="estado" class="control-label">Estado<strog class="theme_color">*</strog></label>
                              <input required onkeypress="return soloLetras(event);" name="estado" maxlength="60" id="estado" type="text" autofocus class="form-control" value="<?php echo $paciente->estado;?>" placeholder="Estado al que pertenece"/>
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      <br>
                      <div class="row"></div>
                      <fieldset>
                        <div class="row">                    
                          <div class="form-row">
                            <h3 class="h3titulo">Información Adicional</h3><!--INFORMACION ADICIONAL-->
                            <br>
                            <div class="col-md-4 mb-3">
                              <label for="numero" class="control-label">Correo<strog class="theme_color">*</strog></label>
                              <input required name="numero" id="numero" type="text" autofocus class="form-control" value="<?php echo $paciente->numero;?>" placeholder="Ingrese el correo"/>
                              <div class="help-block with-errors"></div>
                            </div>
                            

                            <div class="col-md-2 mb-2">
                              <label for="telCel" class="control-label">Tel. Celular</label>
                              <input parsley-rangelength="[1,14]" onkeypress="return soloNumeros(event);" type="text" placeholder="(999)999-999" name="telCel" id="telCel" value="<?php echo $paciente->telCel;?>" class="form-control mask" data-inputmask="'mask':'(999) 999-9999'">
                              <div class="help-block with-errors"></div>
                            </div>

                            <div class="col-md-4 mb-3">
                              <label for="ocupacion" class="control-label">Ocupación<strog class="theme_color">*</strog></label>
                              <input required onkeypress="return soloLetras(event);" name="ocupacion" maxlength="45" id="ocupacion" type="text" autofocus class="form-control" value="<?php echo $paciente->ocupacion;?>" placeholder="Ingrese el ocupacion de la casa"/>
                              <div class="help-block with-errors"></div>
                            </div>

                            <div class="col-md-2 mb-3">
                              <label for="estCivil" class="control-label">Estado Civil<strong class="theme_color">*</strong></label>
                              <select required name="estCivil" class="form-control">
                                <?php if($paciente->idPaciente==null){ ?>
                                <option value="">
                                  Seleccione...
                                </option>
                                <?php } if($paciente->idPaciente!=null){ ?>
                                <option value="<?php echo $paciente->sexo?>">
                                  <?php echo $paciente->estCivil; ?>
                                </option>
                                <?php } ?>
                                <option>
                                  Soltero(a)
                                </option>
                                <option>
                                  Casado(a)
                                </option>
                                <option>
                                  Divorciado(a)
                                </option>
                                <option>
                                  Viudo(a)
                                </option>
                                <option>
                                  Union libre
                                </option>
                              </select>
                              <div class="help-block with-errors"></div>
                            </div>
                            <div class="row"></div>
                             <div class="col-md-4 mb-3">
                              <label required for="perResp" class="control-label">Persona Responsable<strog class="theme_color">*</strog></label>
                              <input onkeypress="return soloLetras(event);" name="perResp" maxlength="60" id="perResp" type="text" autofocus class="form-control" value="<?php echo $paciente->perResp;?>" placeholder="Nombre de la persona responsable del paciente"/>
                              <div class="help-block with-errors"></div>
                            </div>
                             <div class="col-md-6 mb-6">
                              <label for="motConsulta" class="control-label">Motivo de la Consulta</label>
                              <input name="motConsulta" maxlength="150" id="motConsulta" type="text" autofocus class="form-control" value="<?php echo $paciente->motConsulta;?>" placeholder="Describa brevemente el motivo de la consulta"/>
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>
                        </div>
                      </fieldset><br><br>
                      <div class="form-group">
                        <div class="col-12"></div>
                          <div class="col-sm-offset-7 col-sm-5">
                            <a href="?c=Paciente" class="btn btn-default"> Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                          </div>
                        </div>
					                    	</div><!--/form step 0-->
				                  		</div> <!--/user profile content-->
					                </div> <!--/General-->


									<!--/SECCION PARA HISTORIAL CLINICO DEL PACIENTE-->
					                <div id="historial">
					                  	<div class="user-profile-content">
					                  		<input type="hidden" name="idClinico" value="<?php echo $histCli->idClinico != null ? $histCli->idClinico : 0;  ?>"/>
							                    <div class="row">
							                        <div class="col-6 col-sm-5"> 
							                            <p><strong>Nombre: </strong></p>
							                        </div>
							                        <div class="col-6 col-sm-3"> 
							                            <p><strong>Folio: </strong> <input type="text" class="input"></p>
							                        </div>
							                    </div>
							                    <div class="row" style="border: 1px solid gray; border-radius: 10px 10px 10px 10px; padding-top: 10px;" >
							                        <div class="col-4 col-sm-4"> 
							                            <fieldset>
			                            					<legend>Examen de tejidos</legend>
			                            					<div class="row">
			                              						<div class="col-md-6 f">
																	<p><strong>Duros</strong></p>
																	<p><input name="esmalte" type="checkbox" <?php if($histCli->esmalte=="1" ){ ?> checked <?php } ?>>Esmalte</p>
																	<p><input name="dentina" type="checkbox" <?php if($histCli->dentina=="1"){ ?> checked <?php } ?>>Dentina</p>
																</div>
																<div class="col-md-5 f">
																	<p><strong>Rx</strong></p>
																	<p><input name="raiz" type="checkbox" <?php if($histCli->raiz=="1"){ ?> checked <?php } ?>>Raíz</p>
																	<p><input name="huesos" type="checkbox" <?php if($histCli->huesos=="1"){ ?> checked <?php } ?>>Huesos</p>
																</div>
			                            					</div><br><br>
								                            <div class="row">
								                              	<div class="col-md-6 f">
									                                <p><strong>Blandos</strong> </p>
									                                <p><input name="encia" type="checkbox" <?php if($histCli->encia=="1"){ ?> checked <?php } ?>>Encia</p>
									                                <p><input name="inEpil" type="checkbox" <?php if($histCli->inEpil=="1"){ ?> checked <?php } ?>>Inserción Epitelial</p>
									                                <p><input name="lengua" type="checkbox" <?php if($histCli->lengua=="1"){ ?> checked <?php } ?>>Lengua</p>
									                                <p><input name="pulpo" type="checkbox" <?php if($histCli->pulpo=="1"){ ?> checked <?php } ?>>Pulpa (Alteraciones)</p>
									                                <p><input name="velPal" type="checkbox" <?php if($histCli->velPal=="1"){ ?> checked <?php } ?>>Carillos</p>
									                                <p><input name="carrillo" type="checkbox" <?php if($histCli->carrillo=="1"){ ?> checked <?php } ?>>Encia</p>
							                              		</div>
								                              	<div class="col-md-6 f">
									                                <p><strong>Oclusión</strong></p>
									                                <p><input name="soMordidaH" type="checkbox" <?php if($histCli->soMordidaH=="1"){ ?> checked <?php } ?>>Sobre Mordida H</p>
									                                <p><input name="soMordidaV" type="checkbox" <?php if($histCli->soMordidaV=="1"){ ?> checked <?php } ?>>Sobre Mordida V</p>
									                                <p><input name="morAbierta" type="checkbox" <?php if($histCli->morAbierta=="1"){ ?> checked <?php } ?>>Mordida Abierta</p>
									                                <p><input name="desBruxismo" type="checkbox" <?php if($histCli->desBruxismo=="1"){ ?> checked <?php } ?>>Desgaste Bruxismo</p>
									                                <p><input name="anoclusion" type="checkbox" <?php if($histCli->anoclusion=="1"){ ?> checked <?php } ?>>Anoclusión</p>
								                              	</div>
								                            </div>
			                          					</fieldset>
							                        </div>
							                        <div class="col-4 col-sm-5"> 
							                            <div class="row">
							                                <div class="col-md-6">
							                                    <fieldset>
							                                		<legend>Exploración Fisica</legend>
							                                		<div class="row">
							                                  			<div class="col-md-4 f">
							                                    			<p><strong>Cara</strong></p>
							                                  			</div>
								                                  		<div class="col-md-6 f">
										                                    <p><input name="simetrica" type="checkbox" <?php if($histCli->simetrica=="1"){ ?> checked <?php } ?>>Simétrica</p>
										                                    <p><input name="asimetrica" type="checkbox" <?php if($histCli->asimetrica=="1"){ ?> checked <?php } ?>>Asimétrica</p>
								                                  		</div>
							                                		</div>
									                                <div class="row">
									                                  	<div class="col-md-4 f">
								                                    		<p><strong>Craneo</strong></p>
									                                  	</div>
									                                  	<div class="col-md-6 f">
										                                    <p><input name="braquicefalo" type="checkbox" <?php if($histCli->braquicefalo=="1"){ ?> checked <?php } ?>>Braquicéfalo</p>
										                                    <p><input name="mesocefalo" type="checkbox" <?php if($histCli->mesocefalo=="1"){ ?> checked <?php } ?>>Mesocéfalo</p>
										                                    <p><input name="dolicefalo" type="checkbox" <?php if($histCli->dolicefalo=="1"){ ?> checked <?php } ?>>Dolicefalo</p>
									                                  	</div>
									                                </div>
									                                <div class="row">
									                                  	<div class="col-md-4 f">
									                                    	<p><strong>Perfil</strong></p>
									                                  	</div>
									                                  	<div class="col-md-6 f">
										                                    <p><input name="recto" type="checkbox" <?php if($histCli->recto=="1"){ ?> checked <?php } ?>>Recto</p>
										                                    <p><input name="concavo" type="checkbox" <?php if($histCli->concavo=="1"){ ?> checked <?php } ?>>Concavo</p>
										                                    <p><input name="convexo" type="checkbox" <?php if($histCli->convexo=="1"){ ?> checked <?php } ?>>Convexo</p>
									                                  	</div>
									                                </div>
							                              		</fieldset>
	                            							</div>
							                                <div class="col-md-6">
							                                    <fieldset>
							                                		<legend>Antecedentes</legend>
									                                <div class="row">
																		<p><input name="sarampion" type="checkbox" <?php if($histCli->sarampion=="1"){ ?> checked <?php } ?>>Sarampión</p>
																		<p><input name="viruela" type="checkbox" <?php if($histCli->viruela=="1"){ ?> checked <?php } ?>>Viruela</p>
																		<p><input name="parotidis" type="checkbox" <?php if($histCli->parotidis=="1"){ ?> checked <?php } ?>>Parotiditis</p>
																		<p><input name="diabetes" type="checkbox" <?php if($histCli->diabetes=="1"){ ?> checked <?php } ?>>Diabetes</p>
																		<p><input name="hipertension" type="checkbox" <?php if($histCli->hipertension=="1"){ ?> checked <?php } ?>>Hipertensión</p>
																		<p><input name="tiroides" type="checkbox" <?php if($histCli->tiroides=="1"){ ?> checked <?php } ?>>Tiroides</p>
																		<p><input name="hipotiroidismo" type="checkbox" <?php if($histCli->hipotiroidismo=="1"){ ?> checked <?php } ?>>Hipotiroidismo</p>
																		<p><input name="proCoagulacion" type="checkbox" <?php if($histCli->proCoagulacion=="1"){ ?> checked <?php } ?>>Problemas de Coagulación</p>
																		<p><input name="alergias" id="alergias" type="checkbox" <?php if($histCli->alergias=="1"){ ?> checked <?php } ?>>Alergias <input name="descAlergias" id="descAlergias" value="<?php echo $histCli->descAlergias;?>" type="text" class="form-control" placeholder="¿Cuales...?" style="width: 80px;"></p><br><br>
									                                </div>
							                              		</fieldset>
							                                </div>
							                            </div>
							                            <div class="row">
							                                <div class="col-md-12">
							                                    <fieldset>
									                            	<legend>Higiene Bucal</legend>
								                            		<div class="row">
								                              			<div class="col-md-6 f">
											                                <p><input name="buena" type="checkbox" <?php if($histCli->buena=="1"){ ?> checked <?php } ?>>Buena</p>
											                                <p><input name="mala" type="checkbox" <?php if($histCli->mala=="1"){ ?> checked <?php } ?>>Mala</p>
								                              			</div>
								                              			<div class="col-md-6 f">
											                                <p><input name="tomAlcohol" type="checkbox" <?php if($histCli->tomAlcohol=="1"){ ?> checked <?php } ?>>Bebe Alcohol</p>
											                                <p><input name="fuma" type="checkbox" <?php if($histCli->fuma=="1"){ ?> checked <?php } ?>>Fuma</p>
								                              			</div>
								                            		</div>
								                          		</fieldset>
							                                </div>
							                            </div>
							                        </div>
							                        <div class="col-4 col-sm-3"> 
							                            <fieldset>
							                                <legend>Tipo de Consulta</legend>
							                        		<div class="row">
							                          			<div class="col-md-6 f">
									                                <p><input name="emergencia" type="checkbox" <?php if($histCli->emergencia=="1"){ ?> checked <?php } ?>>Emergencia</p>
									                                <p><input name="revision" type="checkbox" <?php if($histCli->revision=="1"){ ?> checked <?php } ?>>Revisión</p>
									                                <p><input name="limpieza" type="checkbox" <?php if($histCli->limpieza=="1"){ ?> checked <?php } ?>>Limpieza</p>
									                                <p><input name="canes" type="checkbox" <?php if($histCli->canes=="1"){ ?> checked <?php } ?>>Caries</p>
							                          			</div>
								                              	<div class="col-md-6 f">
									                                <p><input name="puente" type="checkbox" <?php if($histCli->puente=="1"){ ?> checked <?php } ?>>Puente</p>
									                                <p><input name="extraccion" type="checkbox" <?php if($histCli->extraccion=="1"){ ?> checked <?php } ?>>Extracción</p>
									                                <p><input name="prostodoncia" type="checkbox" <?php if($histCli->prostodoncia=="1"){ ?> checked <?php } ?>>Prostodoncia</p>
								                              	</div>
							                        		</div>
							                            </fieldset>
							                            <fieldset>
							                            	<legend>Aparatos y Sistemas</legend>
								                            <div class="row">
								                              	<div class="col-md-12 f">
									                                <p><input name="apRespiratorio" type="checkbox" <?php if($histCli->apRespiratorio=="1"){ ?> checked <?php } ?>>Aparato Respiratorio</p>
									                                <p><input name="apCardiovascular" type="checkbox" <?php if($histCli->apCardiovascular=="1"){ ?> checked <?php } ?>>Aparato Cardiovascular</p>
									                                <p><input name="apDigestivo" type="checkbox" <?php if($histCli->apDigestivo=="1"){ ?> checked <?php } ?>>Aparato Digestivo</p>
									                                <p><input name="sisNervioso" type="checkbox" <?php if($histCli->sisNervioso=="1"){ ?> checked <?php } ?>>Sistema Nervioso</p>
									                                <p><input name="apUrinario" type="checkbox" <?php if($histCli->apUrinario=="1"){ ?> checked <?php } ?>>Aparato Genito-Urinario</p>
									                                <p><input name="cicMestrual"id="cicMestrual" type="checkbox" <?php if($histCli->cicMestrual=="1"){ ?> checked <?php } ?>>Ciclo Menstrual <input onkeypress=" return soloNumeros(event);" name="infCicMes" id="infCicMes" value="<?php echo $histCli->infCicMes;?>" type="text" class="form-control" placeholder="..." style="width: 80px;"></p> 
									                                <p><input name="embarazo" id="embarazo"  type="checkbox" <?php if($histCli->embarazo=="1"){ ?> checked <?php } ?>>Embarazo <input onkeypress=" return soloNumeros(event);"  name="meses" id="meses" value="<?php echo $histCli->meses;?>" type="text" class="form-control" placeholder="Meses" style="width: 80px;"></p>
								                              	</div>
								                            </div>
							                          	</fieldset>
							                        </div>
							                        <div class="row" style="margin-left: 5px; margin-top: 15px;">
							                            <div class="col-md-5 f">
							                                <fieldset class="preguntas">
																<p>
																    ¿Alguna vez has recibido atención odontológica? 
																    <strong class="pull-right">Si&nbsp;<input class="input d" type="radio" name="prg1"  value="1" <?php if($histCli->prg1=="1"){ ?> checked <?php } ?>>&nbsp;&nbsp;No&nbsp;<input class="input d" type="radio" name="prg1" value="2" <?php if($histCli->prg1=="2" || $histCli->idPaciente==null ){ ?> checked <?php } ?>></strong>
																</p><br>
																<p>
																    ¿Con qu frecuencia se cepilla los dientes? 
																    <strong class="pull-right"><input  required onkeypress=" return soloNumeros(event);" name="prg2" value="<?php echo $histCli->prg2;?>" type="text" class="form-control" placeholder="Cuantas veces a al dia" style="width: 150px;"></strong>
																</p><br>
																<p>
																    <label for="">¿Le han administrado enstecia local?</label>
																    <strong class="pull-right">Si&nbsp;<input class="input d" type="radio" name="prg3"  value="1" <?php if($histCli->prg3=="1"){ ?> checked <?php } ?>>&nbsp;&nbsp;No&nbsp;<input class="input d" type="radio" name="prg3" value="2" <?php if($histCli->prg3=="2" || $histCli->idPaciente==null ){ ?> checked <?php } ?>></strong>
																</p><br>
																<p>
																    ¿Ha sido sometido a algun procedimiento quirúrgico <br> en alguna época de su vida? 
																    <strong class="pull-right">Si&nbsp;<input class="input d" type="radio" name="prg4" value="1" <?php if($histCli->prg4=="1"){ ?> checked <?php } ?>>&nbsp;&nbsp;No&nbsp;<input class="input d" type="radio" name="prg4" value="2" <?php if($histCli->prg4=="2" || $histCli->idPaciente==null ){ ?> checked <?php } ?>></strong>
																</p>
																<p><input name="infPrg3" value="<?php echo $histCli->infPrg3;?>" type="text" class="form-control" placeholder="¿Cual?" style="width: 300px;"></p>                          
																	</p>
							                                </fieldset>
							                            </div>
							                            <div class="form-group">
															<div class="col-sm-offset-7 col-sm-5">
																<a href="?c=Paciente" class="btn btn-default"> Cancelar</a>
																<button type="submit" class="btn btn-primary">Guardar</button>
															</div>
														</div><br><br>
							                        </div>
							                    </div>
										</div><!--user-profile-content-->
							        </div><!--/hisCli-->


									<!--/SECCION PARA ATM DEL PACIENTE-->
                <div id="atm" class="">
                 <div class="user-profile-content"> 
                    <input type="hidden" name="idAtm" value="<?php echo $atm->idAtm != null ? $atm->idAtm : 0;  ?>"/> 
                    <div id="form-step-2" role="form" data-toggle="validator">
                    <div class="row">
                      <div class="col-md-6 mb-6">
                        <label for="nombre3" class="control-label"><strog class="theme_color">Nombre del Paciente</strog></label>
                        <input name="nombre3" id="nombre3" type="text" class="form-control disabled"  value="<?php echo $paciente->nombre;?>" placeholder="PACIENTE QUE SE ESTA REGISTRANDO" />
                      </div>      
                    </div><br><br>                        
                      <h3 class="h3titulo">ATM</h3>                 
                      <br>

                      <div class="col-md-6">
                        <fieldset> 
                        <div class="form-row">
                          <div class="col-md-6 mb-4">
                            <label for="linMedia" class="control-label">Linea Media</label>
                            <input name="linMedia" maxlength="60" id="linMedia" type="text" autofocus class="form-control" value="<?php echo $atm->linMedia;?>" />
                          </div>
                          <div class="col-md-6 mb-4">
                            <label for="habitos" class="control-label">Habitos</label>
                            <input name="habitos" maxlength="60" id="habitos" type="text" autofocus class="form-control" value="<?php echo $atm->habitos;?>" />
                          </div>
                          <div class="col-md-6 mb-4">
                            <label for="bruxismo" class="control-label">Bruxismo</label>
                            <input name="bruxismo" maxlength="60" id="bruxismo" type="text" autofocus class="form-control" value="<?php echo $atm->bruxismo;?>" />
                          </div>
                           <div class="col-md-6 mb-4">
                            <label for="crepitacion" class="control-label">Crepitación</label>
                            <input name="crepitacion" maxlength="60" id="crepitacion" type="text" autofocus class="form-control" value="<?php echo $atm->crepitacion;?>" />
                            <div class="help-block with-errors"></div>
                          </div>
                           <div class="col-md-6 mb-4">
                            <label for="infDolor" class="control-label">Dolor</label>
                            <p><input name="dolDerecha" id="dolDerecha" type="checkbox" <?php if($atm->dolDerecha=="1"){ ?> checked <?php } ?>>Abrir</p>
                            <p><input name="dolIzquierda" id="dolIzquierda" type="checkbox" <?php if($atm->dolIzquierda=="1"){ ?> checked <?php } ?>>Cerrar</p>
                            <input name="infDolor" maxlength="60" id="infDolor" type="text" autofocus class="form-control" value="<?php echo $atm->infDolor;?>" />
                            <div class="help-block with-errors"></div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <label for="infChasquido" class="control-label">Chasquidos</label>
                            <p><input name="chaArriba" type="checkbox" <?php if($atm->chaArriba=="1"){ ?> checked <?php } ?>>Derecho</p>
                            <p><input name="chaAbajo" type="checkbox" <?php if($atm->chaAbajo=="1"){ ?> checked <?php } ?>>Izquierdo</p>
                            <input name="infChasquido" maxlength="60" id="infChasquido" type="text" autofocus class="form-control" value="<?php echo $atm->infChasquido;?>" />
                          </div>
                        
                          </div>
                        </fieldset>
                      </div>

                      <div class="col-md-6">
                        <fieldset>
                            <div class="form-row">
                              <div class="col-md-4 mb-3">
                                <label for="maxAbertura" class="control-label">Max. Abertura(mm)</label>
                                <input onkeypress="return soloNumeros(event);" name="maxAbertura" maxlength="10" id="maxAbertura" type="text" autofocus class="form-control" value="<?php echo $atm->maxAbertura;?>" />
                                <div class="help-block with-errors"></div>
                              </div>
                              <div class="col-md-4 mb-3">
                                <label for="izquierdo" class="control-label">Izquierdo(mm)</label>
                                <input onkeypress="return soloNumeros(event);" name="izquierdo" maxlength="10" id="izquierdo" type="text" autofocus class="form-control" value="<?php echo $atm->izquierdo;?>" />
                                <div class="help-block with-errors"></div>
                              </div>
                              <div class="col-md-4 mb-3">
                                <label for="derecho" class="control-label">Derecho(mm)</label>
                                <input onkeypress="return soloNumeros(event);" name="derecho" maxlength="10" id="derecho" type="text" autofocus class="form-control" value="<?php echo $atm->derecho;?>" />
                                <div class="help-block with-errors"></div>
                              </div>
                               <div class="col-md-4 mb-3">
                                <label for="potrusion" class="control-label">Potrusión(mm)</label>
                                <input onkeypress="return soloNumeros(event);" name="potrusion" maxlength="10" id="potrusion" type="text" autofocus class="form-control" value="<?php echo $atm->potrusion;?>" />
                                <div class="help-block with-errors"></div>
                              </div>
                               <div class="col-md-4 mb-3">
                                <label for="regresion" class="control-label">Regresión(mm)</label>
                                <input onkeypress="return soloNumeros(event);" name="regresion" maxlength="10" id="regresion" type="text" autofocus class="form-control" value="<?php echo $atm->regresion;?>" />
                                <div class="help-block with-errors"></div>
                              </div>
                               <div class="col-md-4 mb-3">
                                <label for="peso" class="control-label">Peso(Kg)</label>
                                <input onkeypress="return soloNumeros(event);" name="peso" maxlength="10" id="peso" type="text" autofocus class="form-control" value="<?php echo $atm->peso;?>" />
                                <div class="help-block with-errors"></div>
                              </div>
                              <div class="col-md-4 mb-3">
                                <label for="talla" class="control-label">Talla(Mts)</label>
                                <input onkeypress="return soloNumeros(event);" name="talla" maxlength="10" id="talla" type="text" autofocus class="form-control" value="<?php echo $atm->talla;?>" />
                                <div class="help-block with-errors"></div>
                              </div>
                              <div class="col-md-4 mb-3">
                                <label for="temp" class="control-label">Temperatura(°C)</label>
                                <input onkeypress="return soloNumeros(event);" name="temp" maxlength="10" id="temp" type="text" autofocus class="form-control" value="<?php echo $atm->temp;?>" />
                                <div class="help-block with-errors"></div>
                              </div>
                               <div class="col-md-4 mb-3">
                                <label for="pa" class="control-label">PA(mm/hg)</label>
                                <input onkeypress="return soloNumeros(event);" name="pa" maxlength="10" id="pa" type="text" autofocus class="form-control" value="<?php echo $atm->pa;?>" />
                                <div class="help-block with-errors"></div>
                              </div>
                               <div class="col-md-4 mb-3">
                                <label for="pulso" class="control-label">Pulso(x')</label>
                                <input onkeypress="return soloNumeros(event);" name="pulso" maxlength="10" id="pulso" type="text" autofocus class="form-control" value="<?php echo $atm->pulso;?>" />
                                <div class="help-block with-errors"></div>
                              </div>   
                               <div class="col-md-4 mb-3">
                                <label for="fr" class="control-label">FR(x')</label>
                                <input onkeypress="return soloNumeros(event);" name="fr" maxlength="10" id="fr" type="text" autofocus class="form-control" value="<?php echo $atm->fr;?>" />
                                <div class="help-block with-errors"></div>
                              </div>                                                                                                                     
                            </div>    
                        </fieldset>
                        <br><br>
                      <div class="form-group">
                        <div class="col-12"></div>
                          <div class="col-sm-offset-7 col-sm-5">
                            <a href="?c=Paciente" class="btn btn-default"> Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                          </div>
                        </div>
                        </form>
                      </div>

                    </div><!--/form step 2-->
                  </div> <!--/user profile content-->
                </div><!--/atm-->

									<div id="odontograma" class="">
										<div class="user-profile-content">
											<div id="form-step-2" role="form" data-toggle="validator">
												<h3 class="h3titulo">Odontograma</h3>
												<div class="form-group" >
													<div class="col-sm-4 center" style="margin-left: 100px; ">
														<img src="assets/images/odontograma1.jpg" width="90%" >
														<img src="assets/images/odontograma2.jpg" width="100%" >
													</div>
													<div class="col-sm-6" style="margin-right: 70px; width: 50%;">
														<form id="uploadOdontograma" action="index.php?c=paciente&a=GuardarOdontograma" method="post">
															<input type="hidden" name="idPaciente" id="idPaciente" value="<?php echo $paciente->idPaciente != null ? $paciente->idPaciente : 0;  ?>"/>
															<div id="div-error2">
																<!--Aqui se muestran los mensajes del odontograma-->
															</div>
															
															<fieldset>
																<legend>Observaciones</legend>
																<div class="row">
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk18" <?php echo $paciente->od18 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>18</label>
																		<input type="text" class="col-sm-8" id="inp18" <?php echo $paciente->od18 != "" ? "" : "readonly"; ?> name="inp18" value="<?php echo $paciente->idPaciente != null ? $paciente->od18 : ""; ?>">
																	</div>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk21" <?php echo $paciente->od21 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>21</label>
																		<input type="text" class="col-sm-8" <?php echo $paciente->od21 != "" ? "" : "readonly"; ?> id="inp21" name="inp21" value="<?php echo $paciente->idPaciente != null ? $paciente->od21 : "";?>">
																	</div><br><br>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk17" <?php echo $paciente->od17 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>17</label>
																		<input type="text" class="col-sm-8" <?php echo $paciente->od17 != "" ? "" : "readonly"; ?> id="inp17" name="inp17" value="<?php echo $paciente->idPaciente != null ? $paciente->od17 : "";?>">
																	</div>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk22" <?php echo $paciente->od22 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>22</label>
																		<input type="text" class="col-sm-8" <?php echo $paciente->od22 != "" ? "" : "readonly"; ?> id="inp22" name="inp22" value="<?php echo $paciente->idPaciente != null ? $paciente->od22 : "";?>">
																	</div><br><br>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk16" <?php echo $paciente->od16 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>16</label>
																		<input type="text" class="col-sm-8" <?php echo $paciente->od16 != "" ? "" : "readonly"; ?> id="inp16" name="inp16" value="<?php echo $paciente->idPaciente != null ? $paciente->od16 : "";?>">
																	</div>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk23" <?php echo $paciente->od23 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>23</label>
																		<input type="text" class="col-sm-8" <?php echo $paciente->od23 != "" ? "" : "readonly"; ?> id="inp23" name="inp23" value="<?php echo $paciente->idPaciente != null ? $paciente->od23 : "";?>">
																	</div><br><br>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk15" <?php echo $paciente->od15 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>15</label>
																		<input type="text" class="col-sm-8" <?php echo $paciente->od15 != "" ? "" : "readonly"; ?> id="inp15" name="inp15" value="<?php echo $paciente->idPaciente != null ? $paciente->od15 : "";?>">
																	</div>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk24" <?php echo $paciente->od24 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>24</label>
																		<input type="text" class="col-sm-8" <?php echo $paciente->od24 != "" ? "" : "readonly"; ?> id="inp24" name="inp24" value="<?php echo $paciente->idPaciente != null ? $paciente->od24 : "";?>">
																	</div><br><br>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk14" <?php echo $paciente->od14 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>14</label>
																		<input type="text" class="col-sm-8" <?php echo $paciente->od14 != "" ? "" : "readonly"; ?> id="inp14" name="inp14" value="<?php echo $paciente->idPaciente != null ? $paciente->od14 : "";?>">
																	</div>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk25" <?php echo $paciente->od25 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>25</label>
																		<input type="text" class="col-sm-8" <?php echo $paciente->od25 != "" ? "" : "readonly"; ?> id="inp25" name="inp25" value="<?php echo $paciente->idPaciente != null ? $paciente->od25 : "";?>">
																	</div><br><br>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk13" <?php echo $paciente->od13 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>13</label>
																		<input type="text" class="col-sm-8" <?php echo $paciente->od13 != "" ? "" : "readonly"; ?> id="inp13" name="inp13" value="<?php echo $paciente->idPaciente != null ? $paciente->od13 : "";?>">
																	</div>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk26" <?php echo $paciente->od26 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>26</label>
																		<input type="text" class="col-sm-8" <?php echo $paciente->od26 != "" ? "" : "readonly"; ?> id="inp26" name="inp26" value="<?php echo $paciente->idPaciente != null ? $paciente->od26 : "";?>">
																	</div><br><br>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk12" <?php echo $paciente->od12 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>12</label>
																		<input type="text" class="col-sm-8" <?php echo $paciente->od12 != "" ? "" : "readonly"; ?> id="inp12" name="inp12" value="<?php echo $paciente->idPaciente != null ? $paciente->od12 : "";?>">
																	</div>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk27" <?php echo $paciente->od27 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>27</label>
																		<input type="text" class="col-sm-8" <?php echo $paciente->od27 != "" ? "" : "readonly"; ?> id="inp27" name="inp27" value="<?php echo $paciente->idPaciente != null ? $paciente->od27 : "";?>">
																	</div><br><br>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk11" <?php echo $paciente->od11 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>11</label>
																		<input type="text" class="col-sm-8"1  <?php echo $paciente->od11 != "" ? "" : "readonly"; ?> id="inp11" name="inp11" value="<?php echo $paciente->idPaciente != null ? $paciente->od11 : "";?>">
																	</div>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk28" <?php echo $paciente->od28 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>28</label>
																		<input type="text" class="col-sm-8" <?php echo $paciente->od28 != "" ? "" : "readonly"; ?> id="inp28" name="inp28" value="<?php echo $paciente->idPaciente != null ? $paciente->od28 : "";?>">
																	</div><br><br>
																</div>
																<legend></legend>
																<div class="row">
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk48" <?php echo $paciente->od48 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>48</label>
																		<input type="text" class="col-sm-8"  <?php echo $paciente->od48 != "" ? "" : "readonly"; ?>  id="inp48" name="inp48" value="<?php echo $paciente->idPaciente != null ? $paciente->od48 : "";?>">
																	</div>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk31" <?php echo $paciente->od31 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>31</label>
																		<input type="text" class="col-sm-8"  <?php echo $paciente->od31 != "" ? "" : "readonly"; ?>  id="inp31" name="inp31" value="<?php echo $paciente->idPaciente != null ? $paciente->od31 : "";?>">
																	</div><br><br>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk47" <?php echo $paciente->od47 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>47</label>
																		<input type="text" class="col-sm-8"  <?php echo $paciente->od47 != "" ? "" : "readonly"; ?>  id="inp47" name="inp47" value="<?php echo $paciente->idPaciente != null ? $paciente->od47 : "";?>">
																	</div>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk32" <?php echo $paciente->od32 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>32</label>
																		<input type="text" class="col-sm-8"  <?php echo $paciente->od32!= "" ? "" : "readonly"; ?>  id="inp32" name="inp32" value="<?php echo $paciente->idPaciente != null ? $paciente->od32 : "";?>">
																	</div><br><br>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk46" <?php echo $paciente->od46 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>46</label>
																		<input type="text" class="col-sm-8"  <?php echo $paciente->od46!= "" ? "" : "readonly"; ?>  id="inp46" name="inp46" value="<?php echo $paciente->idPaciente != null ? $paciente->od46 : "";?>">
																	</div>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk33" <?php echo $paciente->od33 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>33</label>
																		<input type="text" class="col-sm-8"  <?php echo $paciente->od33 != "" ? "" : "readonly"; ?>  id="inp33" name="inp33" value="<?php echo $paciente->idPaciente != null ? $paciente->od33 : "";?>">
																	</div><br><br>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk45" <?php echo $paciente->od45 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>45</label>
																		<input type="text" class="col-sm-8"  <?php echo $paciente->od45!= "" ? "" : "readonly"; ?>  id="inp45" name="inp45" value="<?php echo $paciente->idPaciente != null ? $paciente->od45 : "";?>">
																	</div>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk34" <?php echo $paciente->od34 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>34</label>
																		<input type="text" class="col-sm-8"  <?php echo $paciente->od34 != "" ? "" : "readonly"; ?>  id="inp34" name="inp34" value="<?php echo $paciente->idPaciente != null ? $paciente->od34 : "";?>">
																	</div><br><br>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk44" <?php echo $paciente->od44 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>44</label>
																		<input type="text" class="col-sm-8"  <?php echo $paciente->od44!= "" ? "" : "readonly"; ?>  id="inp44" name="inp44" value="<?php echo $paciente->idPaciente != null ? $paciente->od44 : "";?>">
																	</div>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk35" <?php echo $paciente->od35 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>35</label>
																		<input type="text" class="col-sm-8"  <?php echo $paciente->od35!= "" ? "" : "readonly"; ?>  id="inp35" name="inp35" value="<?php echo $paciente->idPaciente != null ? $paciente->od35 : "";?>">
																	</div><br><br>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk43" <?php echo $paciente->od43 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>43</label>
																		<input type="text" class="col-sm-8"  <?php echo $paciente->od43!= "" ? "" : "readonly"; ?>  id="inp43" name="inp43" value="<?php echo $paciente->idPaciente != null ? $paciente->od43 : "";?>">
																	</div>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk36" <?php echo $paciente->od36 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>36</label>
																		<input type="text" class="col-sm-8"  <?php echo $paciente->od36!= "" ? "" : "readonly"; ?>  id="inp36" name="inp36" value="<?php echo $paciente->idPaciente != null ? $paciente->od36 : "";?>">
																	</div><br><br>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk42" <?php echo $paciente->od42 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>42</label>
																		<input type="text" class="col-sm-8"  <?php echo $paciente->od42!= "" ? "" : "readonly"; ?>  id="inp42" name="inp42" value="<?php echo $paciente->idPaciente != null ? $paciente->od42 : "";?>">
																	</div>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk37" <?php echo $paciente->od37 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>37</label>
																		<input type="text" class="col-sm-8"  <?php echo $paciente->od37!= "" ? "" : "readonly"; ?>  id="inp37" name="inp37" value="<?php echo $paciente->idPaciente != null ? $paciente->od37 : "";?>">
																	</div><br><br>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk41" <?php echo $paciente->od41 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>41</label>
																		<input type="text" class="col-sm-8"  <?php echo $paciente->od41!= "" ? "" : "readonly"; ?>  id="inp41" name="inp41" value="<?php echo $paciente->idPaciente != null ? $paciente->od41 : "";?>">
																	</div>
																	<div class="col-sm-6">
																		<input type="checkbox" class="col-sm-2" id="chk38" <?php echo $paciente->od38 != "" ? "checked" : ""; ?>> 
																		<label class="col-sm-2"><span class="custom-checkbox"></span>38</label>
																		<input type="text" class="col-sm-8"  <?php echo $paciente->od38!= "" ? "" : "readonly"; ?>  id="inp38" name="inp38" value="<?php echo $paciente->idPaciente != null ? $paciente->od38 : "";?>">
																	</div><br><br>
																</div> 
																<div class="col-sm-3 pull-right">
																	<br><br><button class="btn btn-success" style="width: 100%;">Actualizar</button>
																</div>																	
															</fieldset>
														</form>
													</div>
												</div><!--/form-group-->
												<div class="form-group">
													<class class="col-sm-10 "></class>
													<div class="col-sm-1 pull-right">
														<a href="?c=Paciente" class="btn btn-default"> Cancelar</a>
													</div>
													<div class="col-sm-1 pull-right">
														<button type="submit" class="btn btn-primary">Guardar</button>
													</div>
												</div><!--/form-group-->
											</div><!--form-step-3-->
										</div><!--user-profile-content-->
									</div><!--odontograma-->

									<div id="radiografia">
										<div class="user-profile-content">
											<div id="form-step-0" role="form" data-toggle="validator">
												<h3 class="h3titulo" >Radiografia</h3>
												<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
													<input type="hidden" name="idPaciente"  value="<?php echo $paciente->idPaciente != null ? $paciente->idPaciente : 0;  ?>"/>
														<div class="form-group" style="margin-top: 45px;">
															<div class="col-sm-4 center" style="margin-left: 100px; ">
																<img src="imagenes/<?php echo $paciente->img1 != null ? $paciente->img1 : "default.png";?>" style="height: 550px; width: 450px; border-radius: 10px; margin-top: 5px;" >
															</div>
															<div class="col-sm-6" style="margin-right: 40px; width: 50%;">
																<fieldset><legend>Observaciones: </legend>
																	<div class="comment-text-area">
																      	<textarea class="textinput" placeholder="Escriba aquí..." id="observaciones" name="observaciones"><?php echo $paciente->observaciones != null ? $paciente->observaciones  : "";?></textarea>
																    </div>
																</fieldset>
																<div id="respuesta">
																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="col-sm-offset-7 col-sm-5">
																
															<input type="file" name="file" id="file" required />
															<input type="submit" value="Subir" class="submit" />															
															</div>
														</div>
														<div class="form-group">
															<div class="col-sm-offset-7 col-sm-5">
																<button type="submit" class="btn btn-primary">Guardar</button>
																<a href="?c=Paciente" class="btn btn-default"> Cancelar</a>
															</div>
														</div>
												</form>
											</div>
										</div>
									</div>

									<div id="pagos">
										<div class="user-profile-content">
											<div id="form-step-0" role="form" data-toggle="validator">
												<h3 class="h3titulo">Historial de Pagos</h3>
												

												<input type="hidden" name="idPaciente"  value="<?php echo $paciente->idPaciente != null ? $paciente->idPaciente : 0;  ?>"/>

												<input type="hidden" name="fechaNacimiento" id="fechaNacimiento"  value="<?php echo $paciente->fechaNacimiento != null ? $paciente->fechaNacimiento : 0;  ?>"/>

												<div class="form-group">
													<fieldset class="col-sm-7" style="margin-left: 40px;">
						                                <legend>TX Realizado</legend>
					                                    <div class="table-responsive">
									                        <table class="display table table-bordered table-striped">
									                            <thead>
									                                <tr>
									                                	
									                                    <th>tx Realizado</th>
									                                    <th>Fecha</th>
									                                    <th>Costo</th>
									                                    <th>Cantidad</th>
									                                    <th>Subtotal</th>
									                                    <th>Opción</th>
									                                </tr>
									                            </thead>
									                            <tbody>
									                                <?php  foreach($this->model->ListarTx($paciente->idPaciente) as $p): ?>
								                                    <tr class="grade">
								                                    	
								                                        <td><?php echo $p->nombre ?></td>
								                                        <td><?php echo $p->fecha ?></td>
								                                        <td><?php echo $p->costo ?></td>
								                                        <td><?php echo $p->cantidad ?></td>
								                                        <td><?php echo $p->subtotal ?></td>
								                                        <td class="center">

									                                        <a class="btn btn-primary btn-sm" role="button" onclick="actualizarTx(<?php echo $p->idTx; ?>);" data-target="#modalCrudTx" href="#modalCrudTx" role="button" data-toggle="modal"><i class="fa fa-edit"></i></a>

									                                        <a class="btn btn-danger btn-sm" onclick="eliminarTx(<?php echo $p->idTx; ?>)" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button">
									                                            <i class="fa fa-eraser"></i></a>
								                                        </td>
								                                    </tr>
								                                     <?php endforeach; ?>
									                            </tbody>
									                            <tfoot>
									                            	<tr>
									                                    <th></th>
									                                    <th></th>
									                                    <th></th>
									                                    <th>Total</th>
									                                    <th><?php foreach($this->model->TotalTx($paciente->idPaciente) as $t): echo $t->total; endforeach;?></th>
									                                    <th></th>
									                                </tr>
									                            </tfoot>

									                        </table>
									                    </div>
									                     <div class="form-group">
															<div class="col-sm-offset-7 col-sm-5">
																<a href="#modalAgregarTx"  data-toggle="modal" data-target="#modalAgregarTx" class="btn btn-default"> Agregar Tx</a>
															</div>
														</div><!--/form-group-->
						                            </fieldset>
						                            <fieldset class="col-sm-4 pull-right" style="margin-right: 40px;">
						                                <legend>Pagos</legend>
						                                <div class="table-responsive">
						                                    <table class="display table table-bordered table-striped">
									                            <thead>
									                                <tr>
									                                    <th>Fecha</th>
									                                    <th>Abono</th>
									                                    <th>Saldo</th>
									                                    <th>Opción</th>
									                                </tr>
									                            </thead>
									                            <tbody>
									                            	<?php $total = 0; $total2 = 0; foreach($this->model->ListarPagos($paciente->idPaciente) as $p): 
									                            		
     																	$total+=$p->abono; $total2 = $t->total - $total;?>
     																	

									                                    <tr class="grade">
									                                        <td><?php echo $p->fecha ?></td>
									                                        <td><?php echo $p->abono ?></td>
									                                        <td><?php echo $total2?></td>
									                                        <td class="center">

									                                        <a class="btn btn-primary btn-sm" role="button" onclick="actualizarPago(<?php echo $p->idPago; ?>);" data-target="#modalCrudPago" href="#modalCrudPago" role="button" data-toggle="modal">
									                                        	<i class="fa fa-edit"></i>
									                                        </a>


									                                        <a class="btn btn-danger btn-sm" onclick="eliminarPago(<?php echo $p->idPago; ?>)" href="#modalEliminarPago"  data-toggle="modal" data-target="#modalEliminarPago" role="button">
									                                            <i class="fa fa-eraser"></i>
									                                        </a>
									                                        </td>
									                                    </tr>
								                                	<?php endforeach; ?>
									                            </tbody>
									                            <tfoot>
									                            	<tr>
									                                    <th>Total</th>
									                                    <th>Abonado:</th>
									                                    <th>Saldo total: $<?php echo $total2 ?></th>
									                                    <th></th>
									                                </tr>
									                            </tfoot>
									                        </table>
									                    </div>
									                    <div class="form-group">
															<div class="col-sm-offset-7 col-sm-5">
																<a href="#modalAgregarPago"  data-toggle="modal" data-target="#modalAgregarPago" class="btn btn-default"> Agregar Pago</a>
															</div>
														</div><!--/form-group-->
						                            </fieldset>
												</div><!--/form-group-->
												
												<div class="form-group">
													<div class="col-sm-offset-7 col-sm-5">
														<a href="?c=Paciente" class="btn btn-default"> Cancelar</a>
														<button type="submit" class="btn btn-primary">Guardar</button>
													</div>
												</div>
											</div>
										</div>
									</div> <!--/Pagos-->

								</form>
							</div>
						</div><!--/block-web-->
					</div>
				</div><!--/porlets-content-->
			</div><!--/block-web-->
		</div><!--/col-md-12-->
	</div><!--/row-->
</div><!--/container clear_both padding_fix-->

<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 60%;">
        <div class="modal-content" id="div-modal-contennt">
        <!--************************En esta sección se incluye el modal de informacion de registro y apoyo***************************-->
            <div class="modal-body">
                <div class="row">
                    <div class="block-web">
                        <div class="header">
                            <h3 class="content-header theme_color">&nbsp;Eliminar la cita</h3>
                        </div>
                        <div class="porlets-content" style="margin-bottom: -50px;">
                            <h4>¿Esta segúro que desea eliminar este registro?"</h4>
                        </div><!--/porlets-content-->
                    </div><!--/block-web-->
                </div>
            </div>
            <div class="modal-footer" style="margin-top: -10px;">
                <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">
                    <form action="?c=paciente&a=EliminarTx" enctype="multipart/form-data" method="post">
                        <input type="text" name="idTx" id="txtIdTx" hidden>
                        <input type="text" name="idPaciente" id="idPaciente" hidden <?php echo "value=". "'" .$paciente->idPaciente . "'"?> >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div><!--/modal-content--> 
    </div><!--/modal-dialog--> 
</div><!--/modal-fade--> 

<div class="modal fade" id="modalEliminarPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 60%;">
        <div class="modal-content" id="div-modal-contennt">
        <!--************************En esta sección se incluye el modal de informacion de registro y apoyo***************************-->
            <div class="modal-body">
                <div class="row">
                    <div class="block-web">
                        <div class="header">
                            <h3 class="content-header theme_color">&nbsp;Eliminar la cita</h3>
                        </div>
                        <div class="porlets-content" style="margin-bottom: -50px;">
                            <h4>¿Esta segúro que desea eliminar este registro?"</h4>
                        </div><!--/porlets-content-->
                    </div><!--/block-web-->
                </div>
            </div>
            <div class="modal-footer" style="margin-top: -10px;">
                <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">
                    <form action="?c=paciente&a=EliminarPago" enctype="multipart/form-data" method="post">
                        <input hidden type="text" name="idPago" id="txtIdPago">
                        <input type="text" name="idPaciente" id="idPaciente" hidden <?php echo "value=". "'" .$paciente->idPaciente . "'"?> >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div><!--/modal-content--> 
    </div><!--/modal-dialog--> 
</div><!--/modal-fade--> 

<div class="modal fade" id="modalAgregarTx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 30%;">
        <div class="modal-content" id="div-modal-contennt">
        	<form action="?c=paciente&a=GuardarTx" id="form-curp"; enctype="multipart/form-data" method="post" parsley-validate novalidate-->
                <div class="modal-body">
                    <div class="block-web">
                        <div class="header">
                            <h3 class="content-header h3subtitulo"> Agregar Tx </h3>
                        </div>
                        <div class="porlets-content" style="margin-bottom: -50px;">
                            <input hidden name="idTx" />
                            <input type="text" name="idPaciente" id="idPaciente" hidden <?php echo "value=". "'" .$paciente->idPaciente . "'"?> >
                             
                            <div class="form-group">
                                <div class="col-sm-4 center">
                                    <label>Tx Realizado: </label>
                                </div>
                                <div class="col-sm-8 center" >
                                    <input name="nombre"  maxlength="50" id="nombre" type="text"   onkeyup="mayus(this);" class="form-control"  placeholder="Ingrese el nombre del Tx Realizado" required">
                                </div>
                            </div><!--/form-group--> <br><br>
                            
                            <div class="form-group">
                                <div class="col-sm-4 center">
                                    <label>Fecha: </label>
                                </div>
                                <div class="col-sm-8">
                                    <input name="fecha" id="fecha" type="date" class="form-control" value="<?php date_default_timezone_set('America/Mexico_City'); echo date("Y")."-".date("m")."-".date("d") ?>" >
                                </div>
                            </div><!--/form-group--> <br><br>

                            <div class="form-group">
                                <div class="col-sm-4 center">
                                    <label>Costo: </label>
                                </div>
                                <div class="col-sm-8">
                                    <input name="costo" id="costo" type="number" class="form-control"  placeholder="Costo" required>
                                </div>
                            </div><!--/form-group--> <br><br>

                            <div class="form-group">
                                <div class="col-sm-4 center">
                                    <label>Cantidad: </label>
                                </div>
                                <div class="col-sm-8">
                                    <input name="cantidad" id="cantidad" type="number" class="form-control"  placeholder="cantidad" required>
                                </div>
                            </div><!--/form-group--> <br><br>

                        </div><!--/porlets-content-->
                    </div><!--/block-web-->
                </div>
                	<div class="modal-footer" style="margin-top: -10px;">
                    <div class="row ">
						<div class="col-sm-8 pull-right">
                             <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div><!--/modal-content--> 
    </div><!--/modal-dialog--> 
</div><!--/modal-fade--> 

<div class="modal fade" id="modalAgregarPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 30%;">
        <div class="modal-content" id="div-modal-contennt">
        	<form action="?c=paciente&a=GuardarPago" id="form-curp"; enctype="multipart/form-data" method="post" parsley-validate novalidate-->
                <div class="modal-body">
                    <div class="block-web">
                        <div class="header">
                            <h3 class="content-header h3subtitulo"> Agregar Pago </h3>
                        </div>
                        <div class="porlets-content" style="margin-bottom: -50px;">
                            <input hidden name="idTx" />
                            <input type="text" name="idBen" id="idBen" hidden <?php echo "value=". "'" .$paciente->idPaciente . "'"?> >
                             
                            <div class="form-group">
                                <div class="col-sm-4 center">
                                    <label>Fecha: </label>
                                </div>
                                <div class="col-sm-8 center" >
                                    <input name="fecha"  maxlength="50" id="fecha" type="date" class="form-control" required value="<?php date_default_timezone_set('America/Mexico_City'); echo date("Y")."-".date("m")."-".date("d") ?>">
                                </div>
                            </div><!--/form-group--> <br><br>
                            <input type="text" value="<?php echo ($p->saldo)?>" id="total" name="total" class="form-control"  hidden>

                            <div class="form-group">
                                <div class="col-sm-4 center">
                                    <label>Abono: </label>
                                </div>
                                <div class="col-sm-8">
                                    <input name="abono" id="abono" type="text" class="form-control" onkeypress=" return soloNumeros(event);" required>
                                </div>
                            </div><!--/form-group--> <br><br>

                            <div class="form-group">
                                <div class="col-sm-4 center">
                                    <label>Saldo: </label>
                                </div>
                                <div class="col-sm-8">
                                    <input name="saldo" id="saldo" type="number" class="form-control" disabled="">
                                </div>
                            </div><!--/form-group--> <br><br>

                        </div><!--/porlets-content-->
                    </div><!--/block-web-->
                </div>
                <div class="modal-footer" style="margin-top: -10px;">
                    <div class="row ">
						            <div class="col-sm-8 pull-right">
                             <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancelar</button>
                              <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div><!--/modal-content--> 
    </div><!--/modal-dialog--> 
</div><!--/modal-fade--> 

<div class="modal fade" id="modalCrudTx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel default blue_border horizontal_border_1"  id="div-modal-content1">

        </div><!--/modal-content-->
    </div><!--/modal-dialog-->
</div><!--/modal-fade-->

<div class="modal fade" id="modalCrudPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel default blue_border horizontal_border_1"  id="div-modal-content2">
            
        </div><!--/modal-content-->
    </div><!--/modal-dialog-->
</div><!--/modal-fade-->


<script type="text/javascript">


actualizarTx = function (idTx){
        var idTx=idTx;
        $.post("index.php?c=paciente&a=CrudEditarTx", {
            idTx: idTx
        }, function(modal) {
            $("#div-modal-content1").html(modal);
            console.log(modal);
        }); 
        
    };

    actualizarPago = function (idPago){
        var idPago=idPago;
        $.post("index.php?c=paciente&a=CrudEditarPago", {
            idPago: idPago
        }, function(modal) {
            $("#div-modal-content2").html(modal);
            console.log(modal);
        }); 
        
    };

 $('#uploadOdontograma').submit(function() {
		      $.ajax({
		        type: 'POST',
		        url: $(this).attr('action'),
		        data: $(this).serialize(),
		        success: function(respuesta) {
		          console.log(respuesta);
		          if(respuesta == "ok"){
		             location.href = "?c=inicio";
		          }else{
		            $('#div-error2').html('<div class="alert alert-danger"><i class="fa fa-warning"></i>'+respuesta+'</div>');
		         }
		       }
		     })      
		      return false;
		    }); 

	function curp2date() {
		var miCurp =document.getElementById('curp').value;
		var m = miCurp.match( /^\w{4}(\w{2})(\w{2})(\w{2})/
			);
		var anyo = parseInt(m[1],10)+1900;
		if( anyo < 1950 ) anyo += 100;
		var mes = parseInt(m[2], 10)-1;
		var dia = parseInt(m[3], 10);

		var fech = new Date( anyo, mes, dia );
		document.getElementById("fechaNacimiento").value = fech;
	}

</script>
