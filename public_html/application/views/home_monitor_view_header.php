<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <title>Monitor Reconocelo</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="shortcut icon" href="assets/images/reconocelo.ico" type="image/x-icon" />  
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script> 
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
        <link href="../assets/css/2018ReconoceloMonitor.css?ab" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="../assets/js/papaparse.min.js"></script>
    </head>
    <body ng-controller="monitor_controller" onLoad="if ('Navigator' == navigator.appName)document.forms[0].reset();">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg">
            <a id="inicioMonitor" class="navbar-brand" href="javascript:void(0)" onClick = "MonitorNav(this)">
                <img src="../assets/images/monitorLog.png" width="150" height="30" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars fa-lg"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a id="participantes" class="nav-link" href="javascript:void(0)" onClick = "MonitorNav(this)"><i class="fas fa-users mr-2"></i>Participantes</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-piggy-bank mr-2"></i>Depositos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a id="depositosPuntos" class="dropdown-item" href="javascript:void(0)" onClick = "MonitorNav(this)"><i class="fas fa-piggy-bank mr-2"></i>Ver Depositos</a>
                            <div class="dropdown-divider"></div>
                            <a id="depositosPuntosInsertar" class="dropdown-item" href="javascript:void(0)" onClick = "MonitorNav(this)"><i class="fas fa-piggy-bank mr-2"></i>Insertar Depositos</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a id="canjesPuntos" class="nav-link" href="javascript:void(0)" onClick = "MonitorNav(this)"><i class="fas fa-exchange-alt"></i>Canjes</a>
                    </li>
                    <li class="nav-item">
                        <a id="catologoActual" class="nav-link" href="javascript:void(0)" onClick = "MonitorNav(this)"><i class="fas fa-book mr-2"></i>Catalogo Actual</a>
                    </li>
                    <li class="nav-item">
                        <a id="monitorPrograma" class="nav-link" href="javascript:void(0)" onClick = "MonitorNav(this)"><i class="fas fa-chart-pie mr-2"></i>Monitor de programa</a>
                    </li>
                    <li class="nav-item">
                    <a id="reglasMonitor" class="nav-link" href="javascript:void(0)" onClick = "MonitorNav(this)"><i class="fas fa-clipboard-check mr-2"></i>Reglas</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <?php 
                        if($this->session->userdata('CodEmpresa') == "41160"){
                            echo '<img src="../assets/images/41160.png" width="100" height="30" alt="">';
                        }else if($this->session->userdata('CodEmpresa') == "41162"){
                            echo '<img src="../assets/images/41162.png" width="100" height="30" alt="">';
                        }
                    ?>

                    <div class="btn-group">
                        <button class="btn btn-secondary btn-lg" type="button" style="margin-left: 10px;">
                            <i class="fas fa-user-alt mr-2"></i><?php echo $this->session->userdata('empresa'); ?>
                        </button>
                        <button type="button" id="dropdownMenuButton" class="btn btn-lg btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a id="configuracionUsuarioMonitor" class="dropdown-item" href="javascript:void(0)" onClick = "MonitorNav(this)"><i class="fas fa-cog"></i>Configuracion</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)" onClick = "exit()"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar session</a>
                        </div>
                    </div>
                </form>
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