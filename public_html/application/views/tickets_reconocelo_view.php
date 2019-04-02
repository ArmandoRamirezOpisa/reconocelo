<!DOCTYPE html >
<html ng-app="ControllerWorks">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <title>Reconocelo</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="../../assets/css/2018Reconocelo.css?a" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src="https://use.fontawesome.com/1f2183b84e.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <link rel="shortcut icon" href="../../assets/images/reconocelo.ico" type="image/x-icon" />
    </head>
    <body ng-controller="Reconocelo" data-ng-init="init()" onLoad="if ('Navigator'== navigator.appName)document.forms[0].reset();" class="animated apareciendo">
        <div id="navbar"></div>
        <div class="row justify-content-center mt-4 mb-4 animated apareciendo">
            <div class="col-12 col-md-4 mt-4">
                <img src="../../assets/images/reconocelo.png" class="img-fluid mt-4" alt="Responsive image">
            </div>
        </div>




        <form>
            <div class="form-group animated apareciendo">
                <label for="exampleFormControlSelect1" class="font-weight-bold lblText"> * Selecciona tu tipo de pregunta</label>
                <div id="tipoBusqueda">
                    <select class="form-control" id="exampleFormControlSelect1" name="preguntas" onchange="selectOptionTicket(this)">
                        <option>Selecciona</option>
                        <?php 
                  
                            foreach ($preguntas as $key => $value) {
                                echo '<option>'.$value["TipoPregunta"].'</option>';   
                            }

                        ?>
                    </select>  
                </div>
               
                <div id="orden">
                    <label for="exampleFormControlSelect3" class="font-weight-bold lblText"> * Selecciona tu orden </label>
                    <select class="form-control" id="exampleFormControlSelect3" name="orden" disabled>
                        <option>Selecciona</option>
                        <?php 

                            foreach ($ordenesFolio as $key => $value) {
                                echo '<option>'.$value["idCanje"].'</option>';   
                            }

                        ?>
                    </select>
                 </div>

                <div id="articulo" style="display:none;">
                    <label for="exampleFormControlSelect2" class="font-weight-bold lblText"> * Selecciona tu articulo </label>
                    <select class="form-control" id="exampleFormControlSelect2" name="articulo">
                        <option>Selecciona</option>
                        <?php 

                            foreach ($ordenes as $key => $value) {
                                echo '<option>'.$value["idCanje"].'-'.$value["Nombre_Esp"].'</option>';   
                            }

                        ?>
                    </select>
                </div>

                <div id="temaOtro" style="display:none;">
                    <label for="exampleForControlText" class="font-weight-bold lblText">* Describe el tema</label>
                    <input id="mensajeOtro" class="form-control" type="text">
                </div>

                <label for="mensaje" class="font-weight-bold lblText">* Describe la duda</label>
                <textarea class="form-control" id="mensaje" rows="3" ></textarea>
 
                
              <button id="btnenviarPregunta" onclick="enviar_pregunta()" type="button" class="btn btn-outline-secondary mb-2 mt-2" ><i class="fas fa-flag-checkered mr-2"></i>Enviar pregunta</button>
            </div>


        </form>

    <script>
    
    function  estado_form(){
      
        
        
        
        if ($('select[name=preguntas]').val()=="Sobre mi orden") {
   
    $("#orden").show();  
    $("#articulo").hide(); 
        
        }
 
 else if ($('select[name=preguntas]').val()=="Articulo de mi orden") {
    $("#articulo").show(); 
   
   $("#orden").hide(); 
     }else{
       $("#orden").hide();  
    $("#articulo").hide();   
         
     }
  
     
     
    }
    estado_form();
    
$( "#tipoBusqueda" )
  .change(function() {
 
    estado_form();
               // alert();
  });
  
</script>




        <div class="row mt-5 fixed-bottom justify-content-center" style="background: #034889;color: #F25917;">
            <div class="col-auto " id="footer">
                <a href="javascript:void(0)" onclick="loadSection('aviso_controller', 'dvSecc')" class="linkPrivacy">Aviso de privacidad</a>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="../../assets/js/notify.js?a"></script>
        <script src="../../assets/js/functions.js?a"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="../../assets/js/controller.js?a"></script>
        <script>
                            loadSection("cart_controller/getCategory", "dvSecc");
                            loadSection("cart_controller/getCategoryNavbar", "navbar");
        </script>
    </body>
</html>