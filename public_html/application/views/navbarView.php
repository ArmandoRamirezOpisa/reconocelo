<div class="row fixed-top mb-4">

            <div class="col-12 mb-4">

                <nav class="navbar navbar-expand-lg navbar-light navcolor ">
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
                                <div class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenuButton">
                                    
        <?php
            if($cat)
            {
                foreach($cat as $row)
                {
                    $act = "";
                    if ($row["CodCategoria"] == 1)
                    {
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
                            <li class="nav-item">
                                <button data-toggle="tooltip" title="Reglas" class="btn btn-outline-secondary mr-lg-3" onclick="loadSection('reglas_controller','dvSecc')"><i class="fa fa-list-alt mr-1" aria-hidden="true"></i>Reglas</button>
                            </li>
                            <li class="nav-item">
                                <button data-toggle="tooltip" title="Premios" class="btn btn-outline-secondary mr-lg-3" onclick="loadSection('cart_controller/getCategory','dvSecc')"><i class="fa fa-gift mr-1" aria-hidden="true"  ></i>Premios</button>
                            </li>
                            <li class="nav-item">
                                <button data-toggle="tooltip" title="Canjes" class="btn btn-outline-secondary mr-lg-3" onclick="loadSection('canje_controller/getCanjes','dvSecc')"><i class=" fas fa-archive  mr-1" aria-hidden="true"></i>Canjes</button>
                            </li>
                            <li class="nav-item">
                                <button data-toggle="tooltip" title="Carritos" class="btn btn-outline-secondary mr-lg-3" onclick="loadSection('cart_controller/showContentCart','dvSecc')"><i class="fa fa-shopping-cart  mr-1" aria-hidden="true"></i>Carrito</button>
                            </li>
                              <li class="nav-item">
                                <button data-toggle="tooltip" title="Ayuda" class="btn btn-outline-secondary mr-lg-3" onclick="loadSection('ayuda_Controller','dvSecc')"><i class="fas fa-question-circle  mr-1" aria-hidden="true"></i>Ayuda</button>
                            </li>
                           <!-- 
                            <li class="nav-item">
                                <button class="btn btn-outline-secondary mr-lg-3" onclick="loadSection('ticket_controller','dvSecc')"><i class="far fa-life-ring  mr-1" aria-hidden="true"></i>Tickets</button>
                            </li>
                           -->
                        </ul>
<!--
                        <form class="form-inline mr-5">
                            <input class="form-control mr-sm-2" type="search" placeholder="Busqueda de premio" aria-label="Search">
                            <button class="btn btn-outline-dark font-weight-bold my-2 my-sm-0" type="submit"><i class="fa fa-search mr-1" aria-hidden="true"></i>Buscar</button>
                        </form>
-->
                        <form class="form-inline my-2 my-lg-0">
                            <div class="dropdown">
   <img src="<?= base_url() ?>/assets/images/<?=   $data = $this->session->userdata('empresa'); ?>.png"  alt="logo"  width="90" class="mr-2">
       
                                <button class=" btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="far fa-user-circle mr-1" aria-hidden="true"></i><?php echo $this->session->userdata('nombre'); ?>
  </button>
                                <div class="dropdown-menu text-white " aria-labelledby="dropdownMenuButton2">
                                 <a class="dropdown-item text-white" href="javascript:void(0)" onclick="loadSection('cofInfo_controller/info','dvSecc')"><i class="fas fa-sun mr-1" aria-hidden="true"></i>Conf.Personal</a>  
                                <a class="dropdown-item text-white" href="javascript:void(0)" onClick = "exit()"><i class="fas fa-sign-out-alt mr-1" aria-hidden="true"></i>Salir</a>
                               
                                
                                </div>
                            </div>
                        </form>
                    </div>
                </nav>

            </div>




        </div>
