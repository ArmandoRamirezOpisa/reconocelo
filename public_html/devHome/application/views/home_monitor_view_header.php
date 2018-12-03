
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Monitor Reconocelo</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="shortcut icon" href="assets/images/reconocelo.ico" type="image/x-icon" />  
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script> 
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
        <link href="../assets/css/2018ReconoceloMonitor.css" rel="stylesheet" type="text/css"/>
    </head>
    <body ng-controller="monitor_controller">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg fixed-top " >
            <div class="container" >
                <a id="inicioMonitor" class="navbar-brand" href="javascript:void(0)" onClick = "MonitorNav(this)">

                    <img src="../assets/images/monitorLog.png" width="150" height="30" alt="" class="img-thumbnail">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars fa-lg"></i>  
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">   
                        <li class="nav-item">
                            <a id="participantes" class="nav-link " href="javascript:void(0)" onClick = "MonitorNav(this)"> <i class="fas fa-users mr-2"></i>Participantes</a>
                        </li>
                        <li class="nav-item">
                            <a id="depositosPuntos" class="nav-link" href="javascript:void(0)" onClick = "MonitorNav(this)"><i class="fas fa-piggy-bank mr-2"></i>Depositos en puntos</a>
                        </li>
                        <li class="nav-item">
                            <a id="catologoActual" class="nav-link" href="javascript:void(0)" onClick = "MonitorNav(this)"><i class="fas fa-book mr-2"></i>Catalogo Actual</a>
                        </li>
                        <li class="nav-item">
                            <a id="monitorPrograma" class="nav-link" href="javascript:void(0)" onClick = "MonitorNav(this)"><i class="fas fa-chart-pie mr-2"></i>Monitor de programa</a>
                        </li>   
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-alt mr-2"></i>   <?php echo $this->session->userdata('empresa'); ?>                    
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="nav-link text-dark" href="javascript:void(0)" onClick = "exit()"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar session</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>          
        <!-- Navigation --> 
        <div class="container">
            <div class="row justify-content-center mb-4 mt-3">
                <div id="navegacionMonitor" class="card-deck mt-3">
                    <img src="../assets/images/reconocelo.png" class="img-fluid" alt="Responsive image">
                </div>
            </div>
        </div>