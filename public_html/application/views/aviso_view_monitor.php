<!DOCTYPE html>
<html ng-app="login">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Monitor Reconocelo</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="../assets/css/ReconoceloLogin_Monitor.css" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="shortcut icon" href="assets/images/monitorLogLink.png" type="image/x-icon" />
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script> 

    </head>
    <body ng-controller="validarLogin">
    
        <div class="container-fluid">

            <div  class="row mb-4 sizetopbottom">
                <div class="col" style="background: #034889;color: white;">

                    <a class="navbar-brand" href="#">
                        <img src="../assets/images/monitorLog.png" width="150" height="30" alt="" class="img-thumbnail">
                    </a>

                </div> 
            </div>
            
        </div>
        
        <div class="container">
                
            <div class="row justify-content-center mb-4 mt-3">
                
                <div class="span8" style="text-align:center;">
                    <div class="page-header" style="color:#ea3611;">
                        <h1>Aviso de Privacidad</h1>
                    </div>
                </div>

                <div style="text-align:justify;" class="span8">

                    <h3 style="color:#f07b1c;">Política de privacidad:</h3>
     
                    <section id="aviso_privacidad"> 

                        <p>
                            El presente Aviso de privacidad tiene por objeto la protección de los datos personales de 
                            los integrantes de este programa de incentivos mediante su tratamiento legítimo, 
                            controlado e informado, a efecto de garantizar su privacidad, así como su derecho a la 
                            autodeterminación informativa.
                        </p>
        
                        <h3 style="color:#f07b1c;">Información personal:</h3>
        
                        <p>
                            OPISA tratará sus datos personales, en términos de lo previsto en la Ley Federal de 
                            Protección de Datos Personales en Posesión de los Particulares para llevar a cabo alguna 
                            o todas las actividades necesarias para el cumplimiento de las obligaciones que se 
                            originen y deriven de la relación comercial de este programa de incentivos. 
                            Para mayor información.
                        </p>
        
                        <p>
                            El domicilio de OPISA y  del área responsable, es la siguiente dirección: 
                            Vicente Segura NO.10 Int.4 Lomas de Sotelo; Naucalpan, Edo de México C.P. 53390 .
                        </p>
        
                        <h3 style="color:#f07b1c;">Uso de información:</h3>
        
                        <p>
                            Al proporcionar sus datos personales por escrito, a través de una solicitud, formato en 
                            papel, formato digital, correo electrónico, o cualquier otro documento, acepta y 
                            autoriza a OPISA a utilizar y tratar de forma automatizada sus datos personales e 
                            información suministrados, los cuales formarán parte de nuestra base de datos con la 
                            finalidad de usarlos, en forma enunciativa, más no limitativa, para: identificarle, 
                            ubicarle, comunicarle, contactarle, enviarle información y/o bienes, así como para 
                            enviarlos y/o transferirlos a terceros, por cualquier medio que permita la ley para 
                            cumplir con cumplimiento de las obligaciones que se originen y deriven de la relación 
                            comercial de este programa de incentivos.
                        </p>

                    </section>
    
                </div>

                <div class="span8" style="text-align:center;">
                    <h3 style="color:#ea3611;">Seguridad</h3>
                </div>

                <div style="text-align:justify;" class="span8">
    
                    <section id="seguridad">

                        <p>
                            <h4 style="color:#f07b1c;">Direcciones IP:</h4>
                            Nuestros servidores web recolectan su dirección IP para asistirle con el diagnóstico de 
                            problemas o temas de apoyo con nuestros servicios.La información es recolectada únicamente 
                            en conjunto y no puede ser rastreada a un usuario individual.
                        </p>

                        <p>
                            <h4 style="color:#f07b1c;">Cookies y applets:</h4>
                            Utilizamos cookies para brindarle una mejor experiencia. Estas cookies nos permiten 
                            incrementar su Seguridad al almacenar su sesión ID y son una manera de monitorear el 
                            acceso de un usuario único. Este conjunto de información no personal es intercalada y 
                            proporcionada a nosotros para asistir en el análisis del uso del sitio.
                        </p>

                        <p>
                            <h4 style="color:#f07b1c;">Acceso a la información:</h4>
                            Tenemos medidas razonables para mantener la seguridad de cualquier información que 
                            poseemos sobre usted, y para mantener esta información exacta y actualizada.
                        </p>

                        <p>
                            Nuestro equipo de trabajo que está obligado a respetar la confidencialidad de cualquier 
                            información personal que poseamos.
                        </p>

                        <p>
                            OPISA ocasionalmente modificará y corregirá  este aviso de privacidad, por lo tanto le 
                            pedimos que revise este aviso regularmente en esta página de Internet.
                        </p>
        
                        <p>
                            OPISA protegerá sus datos personales en los términos de la Ley, y le comunicará los 
                            elementos contenidos en las fracciones del artículo 16 de la Ley.
                        </p>

                        <p>
                            <br/>
                        </p>

                    </section>

                </div>

            </div>
            
        <script src="../assets/js/angular.min.js" type="text/javascript"></script>
        <script src="../assets/js/ControllerLogin_monitor.js"></script>
        <script src="../assets/js/angular-sanitize.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
            
    </body>
</html>
