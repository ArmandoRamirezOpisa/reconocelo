<div class="row">
    <div class="col-12">
        <h1 class="text-center"><i class="far fa-life-ring  mr-2"></i>Bienvenido al Centro de Respuestas Reconócelo</h1>
        <p class="text-center lead">Aqui podras visualizar las respuestas a tus preguntas realizadas</p>
    </div>
</div>

<div class="row justify-content-center mt-4">
    
    <div class="col-8">  


<?php 
if (count($tickets)>0  && $tickets !=null) {
  foreach ($tickets as $key => $value) {
  
    if ($value['idCanje']=='0') {
      $value['idCanje']='## ';  
    }
    
    if ($value['status'] =='0') {
   // echo "<h3>Ticket : ".$value['IdTicket']." de Canje : ".$value['idCanje']."<span class=\"badge badge-danger\">Tema Abierto</span>"."</h3>";    
    
     echo "<div class=\"card bg-light mb-3\">
  <h5 class=\"card-header\"><i class=\"far fa-comment-alt mr-2\"></i><span class=\"font-weight-bold mr-4\">Ticket: ".$value['IdTicket']."<i class=\"fas fa-trophy ml-3 mr-2\"></i> Canje : ".$value['idCanje']."</span><small class=\"text-muted\"> Fecha de creacion : ".$value['FechaCreacion']."</small> <span class=\"badge badge-danger  ml-4\"><i class=\"fas fa-unlock-alt mr-2\"></i> Abierto</span></h5> 
  <div class=\"card-body\">
 <h5 class=\"card-title text-center font-weight-bold\">Categoria de ticket: ".$value['TipoPregunta']."</h5>
 <p class=\"card-text font-weight-bold\"><i class=\"fas fa-exclamation-triangle mr-3\"></i>Descripcion del problema : </p><p>".$value['mensaje'] ."</p>

  </div>
</div>";
    
    
    
    }else{
 echo "<div class=\"card   bg-light mb-3\">
  <h5 class=\"card-header\"><i class=\"far fa-comment-alt mr-2\"></i><span class = \"font-weight-bold mr-4\">Ticket: ".$value['IdTicket']."<i class=\"fas fa-trophy ml-3 mr-2\"></i> Canje : ".$value['idCanje']."</span><small class\"text-muted\"> Fecha de creacion : ".$value['FechaCreacion'] ."</small><span class=\"badge badge-success  ml-4\"><i class=\"fas fa-lock mr-2\"></i> Cerrado</span></h5> 
  
<div class=\"card-body\">
     <h5 class=\"card-title text-center font-weight-bold\">Categoria de ticket: ".$value['TipoPregunta']."</h5>
   <p class=\"card-text font-weight-bold\"><i class=\"fas fa-exclamation-triangle mr-3\"></i>Descripcion del problema : </p><p>".$value['mensaje'] ."</p>
    <p class=\"card-text text-right font-weight-bold\"><i class=\"far fa-star mr-3\"></i>Solucion : ".$value['solucion'] ."</p>
    
  </div>
  <div class=\"card-footer text-muted\">
   Fecha de Solucion :".$value['FechaFinalizacion']."
  </div>
</div>";   

// echo "<h3>Ticket : ".$value['IdTicket']." de Canje : ".$value['idCanje']."<span class=\"badge badge-success\">Tema Cerrado</span>"."</h3>";  
   // echo "<p class=\"lead\">Descripcion : ".$value['mensaje']."</p>"; 
   // echo "<p class=\"lead\"><b>Solucion : </b>".$value['solucion']."</p>";  
    }
   
  
   
}  
}else{
    echo "<h1 class=\"text-center\">NO EXISTEN TICKETS</h1>";
    
}



//print_r($tickets);
?>
</div>  
    </div>
<script>
up();
</script>