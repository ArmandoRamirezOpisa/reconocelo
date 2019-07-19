<!DOCTYPE html >
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="reconocelo, incentivos, premios, opisa">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <title>Reconocelo</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="assets/css/2018Reconocelo.css?ab" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src="https://use.fontawesome.com/1f2183b84e.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <link rel="shortcut icon" href="assets/images/reconocelo.ico" type="image/x-icon" />
    </head>
    <body onLoad="if ('Navigator' == navigator.appName)document.forms[0].reset();">
        <div class="row fixed-top mb-4 animated apareciendo">
            <div class="col-12 mb-4">
                <nav class="navbar navbar-expand-lg navbar-light navcolor">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-th text-white" aria-hidden="true"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <a class="navbar-brand   text-white font-weight-bold" href="#">Saldo <span class="badge badge-warning ml-2" id="saldo"><?php echo number_format($this->session->userdata('puntos')); ?> puntos</span></a>
                        <form class="form-inline my-2 my-lg-0">
                            <div class="dropdown" data-toggle="tooltip" title="Categorias">
                                <button class=" btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-archive mr-1" aria-hidden="true"></i>Categorias
                                </button>
                                <div id="categoriasReconocelo" class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenuButton">            
                                    <?php
                                        if($cat){
                                            foreach($cat as $row){
                                                $act = "";
                                                if ($row["CodCategoria"] == 1){
                                                    $act = "active";
                                                }
                                                echo '<a id="a'.$row["CodCategoria"].'" href="javascript:void(0)" onClick="selCat('.$row["CodCategoria"].',\'a'.$row["CodCategoria"].'\')" class="dropdown-item '.$act.'" >'.$row["nbCategoria"].'</a>';
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </form>
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ml-lg-5">
                            <li class="nav-item nav-item-menuReconocelo">
                                <button data-toggle="tooltip" title="Reglas" class="btn btn-outline-secondary mr-lg-3" onclick="loadSection('Home/reglas','dvSecc')"><i class="fa fa-list-alt mr-1" aria-hidden="true"></i>Reglas</button>
                            </li>
                            <li class="nav-item nav-item-menuReconocelo">
                                <button data-toggle="tooltip" title="Premios" class="btn btn-outline-secondary mr-lg-3" onclick="loadSection('Home/getAwards/1','dvSecc')"><i class="fa fa-gift mr-1" aria-hidden="true"  ></i>Premios</button>
                            </li>
                            <li class="nav-item nav-item-menuReconocelo">
                                <button data-toggle="tooltip" title="Canjes" class="btn btn-outline-secondary mr-lg-3" onclick="loadSection('Home/getCanjes','dvSecc')"><i class=" fas fa-archive  mr-1" aria-hidden="true"></i>Canjes</button>
                            </li>
                            <li class="nav-item nav-item-menuReconocelo">
                                <button data-toggle="tooltip" title="Carritos" class="btn btn-outline-secondary mr-lg-3" onclick="loadSection('Home/showContentCart','dvSecc')"><i class="fa fa-shopping-cart  mr-1" aria-hidden="true"></i>Carrito <span id="numeroCarrito" class="badge badge-light"></span></button>
                            </li>
                            <li class="nav-item nav-item-menuReconocelo">
                                <button data-toggle="tooltip" title="Ayuda" class="btn btn-outline-secondary mr-lg-3" onclick="loadSection('Home/ayuda','dvSecc')"><i class="fas fa-question-circle  mr-1" aria-hidden="true"></i>Ayuda</button>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0 animated apareciendo">
                            <div class="dropdown">
                                <img src="<?= base_url() ?>/assets/images/<?=   $data = $this->session->userdata('empresa'); ?>.png"  alt="logo"  width="100" class="mr-2">
                                <button class=" btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="far fa-user-circle mr-1" aria-hidden="true"></i><?php echo $this->session->userdata('nombre'); ?>
                                </button>
                                <div class="dropdown-menu text-white " aria-labelledby="dropdownMenuButton2">
                                    <a class="dropdown-item text-white" href="javascript:void(0)" onclick="loadSection('home/info','dvSecc')"><i class="fas fa-sun mr-1" aria-hidden="true"></i>Conf.Personal</a>  
                                    <a class="dropdown-item text-white" href="javascript:void(0)" onClick = "exit()"><i class="fas fa-sign-out-alt mr-1" aria-hidden="true"></i>Salir</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row justify-content-center mt-4 mb-4 animated apareciendo" id="homeReconocelo">
            <div class="col-12 col-md-4 mt-4">
                <?if($this->session->userdata('urlEmp') == 'https://reconocelo.com.mx/'){?>
                    <img src="assets/images/reconocelo.png" class="img-fluid mt-4" alt="Responsive image">
                    <?}else{?>
                        <img src="<?= base_url() ?>/assets/images/<?=   $data = $this->session->userdata('empresa'); ?>.png" class="img-fluid mt-4" alt="Responsive image">';
                    <?}?>
            </div>
        </div>