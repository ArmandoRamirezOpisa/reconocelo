<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Mantenimiento</title>
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="assets/images/reconocelo.ico"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/1f2183b84e.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
        <link rel="stylesheet" type="text/css" href="assets/css/hamburgers.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/animsition.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/daterangepicker.css">
        <link rel="stylesheet" type="text/css" href="assets/css/util.css">
	    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    </head>
    <body>
	
	    <div class="limiter">
		    <div class="container-login100">
			    <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				    <form class="login100-form validate-form flex-sb flex-w">
					    <span class="login100-form-title p-b-32">
						    Ingresa
					    </span>

					    <span class="txt1 p-b-11">
						    Usuario
					    </span>
					    <div class="wrap-input100 validate-input m-b-36" data-validate = "Usuario es requerido">
						    <input class="input100" type="text" name="username" >
						    <span class="focus-input100"></span>
					    </div>
					
					    <span class="txt1 p-b-11">
                            Contraseña
					    </span>
					    <div class="wrap-input100 validate-input m-b-12" data-validate = "Contraseña es requerida">
						    <span class="btn-show-pass">
							    <i class="fa fa-eye"></i>
						    </span>
						    <input class="input100" type="password" name="pass" >
						    <span class="focus-input100"></span>
					    </div>

					    <div class="container-login100-form-btn">
						    <button id="ingMantenimiento" class="login100-form-btn" onclick="loginMantenimiento()">
							    Ingresa
						    </button>
					    </div>

				    </form>
			    </div>
		    </div>
	    </div>
	
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="assets/js/animsition.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="functionsMantenimiento.js"></script>
	    <script src="assets/js/select2.min.js"></script>
	    <script src="assets/js/moment.min.js"></script>
	    <script src="assets/js/daterangepicker.js"></script>
	    <script src="assets/js/countdowntime.js"></script>
	    <script src="assets/js/main.js"></script>

    </body>
</html>