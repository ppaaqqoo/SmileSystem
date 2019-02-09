<title>SmileSystem - Inicio</title>
<style>
    .perfil{
        font-size: 18px;
        margin-left: 20px;
    }
    .clock{
        height:20%;
    }
</style>

<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>Inicio</h1>
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
                      <h2 class="content-header theme_color" style="margin-top: -5px;"> Inicio </h2>
                    </div>
                    <div class="col-md-4">
                      <div class="btn-group pull-right">
                        <div class="actions">
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!--hola-->
                    <div class="row" style="margin-top: 15px; margin-bottom: 12px;">
                      <div class="col-md-1">
                      </div>

                      <div class="col-md-3" style="padding-top: 20px;">
                        <div id="calendar" style="width: 310px; height: 210px;">
                        </div>
                      </div>
                      <div class="col-md-1" style="padding-top: 20px;">
                        <div id="clock" style="margin-left: 30px;"></div>
                      </div>  
                      <div class="col-md-2" id="nomas"">
                        <img src="assets/images/perfil.jpg"  width="160px" style="margin-left: 90px;">
                      </div> 
                      <div class="col-md-4 pull-left" style="text-align: center;">
                        <br><br>
                          <p><h2 class="perfil">Medico Cirujano Dentista </h2></p><br>
                           <p><h2 class="perfil">Doctora Johana Dominguez Nuñez</h2></p><br>
                           <p><h2 class="perfil">CED PROF 8166276 UAZ</h2></p>
                      </div>
                                
                 
                    </div>
                <div class="porlets-content">
                    <div class="center">
                        <h2>Citas para el día de hoy</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="display table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Número de Teléfono</th>
                                    <th>Diagnostico</th>
                                    <th><b>Hora de cita</b></th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php foreach($this->model->ListarHoy() as $r): ?>
                                    <tr class="grade">
                                        <td><?php echo $r->nombre ?> </td>
                                        <td><?php echo $r->telefono ?> </td>
                                        <td><?php echo $r->diagnostico ?> </td>
                                        <td><?php echo $r->hora ?> </td>                                        
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th>Nombre</th>
                                <th>Folio</th>
                                <th>Diagnostico</th>
                                <th>Hora de Cita</th>
                              </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
