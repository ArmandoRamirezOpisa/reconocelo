<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Monitor Reconocelo</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="shortcut icon" href="assets/images/reconocelo.ico" type="image/x-icon" />  
        <script src="https://kit.fontawesome.com/4d404e5112.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
        <link href="../assets/css/ReconoceloMonitor.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="../assets/js/papaparse.min.js"></script>
    </head>
    <body class="animated apareciendo">
        <nav class="navbar navbar-expand-lg animated apareciendo">
            <a id="inicioMonitor" class="navbar-brand animated apareciendo" href="https://www.reconocelo.com.mx/monitor/">
                <img src="../assets/images/monitorLog.png" width="150" height="30" alt="">
            </a>
        </nav>
        <div id="pru" class="container animated apareciendo">  
            <div class="row justify-content-center mb-4 mt-3 animated apareciendo">
                <div class="col-12 col-md-6 mt-4 animated apareciendo">
                    <div class="card mt-3 animated apareciendo">
                        <div class="card bg-ligh">
                            <img src="../assets/images/reconocelo.png" class="img-fluid animated apareciendo" alt="Responsive image">
                            <div class="card-body">
                                <form autocomplete="off">
                                    <p class="card-title text-center mt-4 h2">Iniciar sesión</p>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-group  mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="" ><i class="fas fa-user"></i> <span style="margin-left: 10px;">Usuario</span></span>
                                                </div>
                                                <input type="text" class="form-control upperCase" id="user" placeholder="Escribe el usuario">
                                            </div>
                                            <div class="input-group  mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" ><i class="fas fa-key"></i> <span style="margin-left: 10px;">Contraseña</span></span>
                                                </div>
                                                <input type="password" class="form-control upperCase" id="password" placeholder="Escribe tu Contraseña">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group mb-0">
                                                <button id="entrarMonitorLogin" type="button" class="btn btn-primary btn-block font-weight-bold" onclick="loginMonitorReconocelo()"><i class="fas fa-sign-in-alt mr-2"></i>Entrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-12 mt-4">
                                        <p id="errorMessage" class="errormessage"><i class="fas fa-exclamation-triangle mr-2"></i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div  class="row mt-4 sizetopbottom">
                    <div class="col bg-ligh">
                        <p class="text-center"><a id="olvidoPassword" href="javascript:void(0)" onClick = "MonitorNav(this)" class="text-center selectElementMonitor"><span class="selectElementMonitor">Olvidaste tu contraseña</span></a></p> 
                    </div>                
                </div>
            </div>
            <div  class="row mt-4 sizetopbottom">
                <div class="col bg-ligh">
                    <p class="text-center bg-ligh"><a href="<?php echo site_url('monitor/AvisoPrivacidad') ?>" class="selectElementMonitor" target="_blank">Aviso de privacidad</a> </p> 
                </div>                
            </div>
        <script src="../assets/js/functionsMonitor.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    </body>
</html>