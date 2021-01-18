<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OPISA</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css?a" rel="stylesheet">
  </head>
  <body>
    <div id="header"></div>
    <div id="logo">
      <img class="imgLogo" src="assets/images/logo.png">
    </div>
    <div id="bann"></div>
    <p class="text-center" id="btnPCart">
      <button type="button" class="btn btn-info" onClick="loadSection('cart_controller/showContentCart/','dvContAw')">Ver contenido del carrito <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></button>
    </p>    
<script>
    if (contOrder.length > 0){
        $("#btnPCart").show();
    }else{
        $("#btnPCart").hide();
    }
</script>