<!DOCTYPE html>
<html  ng-app="monitor" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Monitor Reconocelo</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="shortcut icon" href="assets/images/reconocelo.ico" type="image/x-icon" />  
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script> 
        <link href="../assets/css/2018ReconoceloMonitor.css" rel="stylesheet" type="text/css"/>
    </head>
    <body ng-controller="monitor_controller">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg fixed-top " >
            <div class="container" >
                <a class="navbar-brand" href="#">
                    <img src="../assets/images/monitorLog.png" width="150" height="30" alt="" class="img-thumbnail">

                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars fa-lg"></i>  
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">   
                        <li class="nav-item">

                            <a class="nav-link " href="#" ng-click="loadSection('ObtenerParticipantes','navegacion')"> <i class="fas fa-users mr-2"></i>Participantes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" ng-click="message()"><i class="fas fa-piggy-bank mr-2"></i>Depositos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-book mr-2"></i>Catalogo Actual</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-chart-pie mr-2"></i>Monitor de programa</a>
                        </li>   
                      
                   
                        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user-alt mr-2"></i>   <?php echo $this->session->userdata('empresa'); ?>                    
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
             <a class="nav-link text-dark" href="#" ng-click="exit()"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar session</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
                        
                        
                       
                    
                    
                    </ul>
                </div>
            </div>
        </nav>          
        <!-- Navigation --> 
            <div id="navegacion"></div>
            
        <script src="../assets/js/angular.min.js" type="text/javascript"></script>
        <script src="../assets/js/angular-sanitize.js" type="text/javascript"></script>
        <script src="../assets/js/angular-route.min.js" type="text/javascript"></script>
        <script src="../assets/js/_01_Controller_Routing.js" type="text/javascript"></script>  
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>      
    </body>
</html>
