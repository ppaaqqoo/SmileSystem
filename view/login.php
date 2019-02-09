<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>SmileSystem - Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>INSEZAC | LOGIN</title>
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/admin.css" rel="stylesheet" type="text/css" />
</head>
<style>
    body{
        background-color: rgb(247,247,247);  
    }
    #logo{
        max-width: 100%; 
        margin-top: 150px;
        margin-left: 10%;
    }
    #imgLogin{
        width: 40%;
    }
</style>
<body>

    <div class="row">
        <div class="col-md-6">
            <center><img src="assets/images/smileSystem.jpeg" id="logo"></center>
        </div>
        <div class="col-md-6">
            <div class="login_content" >
                <center><img src="assets/images/log.png" id="imgLogin"></center>
                <div class="panel-heading border login_heading" style="margin-top: 10px;">INICIAR SESIÓN</div>  
                <div id="div-error"></div>
                <form role="form" action="index.php?c=Login&a=Acceder" class="form-horizontal" method="post" id="form-login" >
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="text" placeholder="Usuario" name="usuario" id="inputEmail3" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="password" placeholder="Contraseña" name="password" id="inputPassword3" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=" col-sm-10">
                            <button class="btn btn-success" style="width: 100%;">Iniciar</button>
                        </div>
                    </div>
                    <div class="form-group center">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-1">
                            <input type="checkbox" class="form-control">
                        </div>
                        <div class="col-sm-8" style="margin-top: 10px;">
                            <label>Mantener la sesión iniciada</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="assets/js/jquery-2.1.0.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/common-script.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script type="text/javascript">
    $('#form-login').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(respuesta) {
                console.log(respuesta);
                if(respuesta == "ok"){
                    location.href = "?c=inicio";
                }else{
                    $('#div-error').html('<div class="alert alert-danger"><i class="fa fa-warning"></i>'+ respuesta +'</div>');
                }
            }   
        })      
        return false;
    }); 
</script>
   
</html>
