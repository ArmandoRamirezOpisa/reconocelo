<p class="display-5"><?php  echo urldecode($nombre);?> </p>
<?php 
  if(!$data){
    echo '<p class="display-5">SIN CANJES EXISTENTES</p> ';  
  }
  else{
    echo '<table class="table table-hover table-sm table-bordered ">
      <thead>
        <tr class="bg-primary text-center">
          <th scope="col">idCanje</th>
          <th scope="col">feSolicitud</th>
          <th scope="col">Nombre_Esp</th>
          <th scope="col">Status</th>
          <th scope="col">Mensajeria</th>
          <th scope="col">NumeroGuia</th>
          <th scope="col">puntos</th>
        </tr>
      </thead>
      <tbody>';
      foreach ($data as $participante) { 
        echo' <tr>
          <td>'.$participante['idCanje'].'</td>
          <td>'.$participante['feSolicitud'].'</td>
          <td>'.$participante['Nombre_Esp'].'</td>
          <td>'.$participante['Status'].'</td>
          <td>'.number_format($participante['Mensajeria']).'</td>
          <td>'.number_format($participante['NumeroGuia']).'</td>
          <td>'.number_format($participante['puntos']).'</td>
        </tr>'; 
      }
      echo '</tbody>
    </table>';  
  }
?>
<script src="../../assets/js/functions.js" type="text/javascript"></script>