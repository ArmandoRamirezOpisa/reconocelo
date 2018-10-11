
<div class="row">
<?php
    $fini = new DateTime($this->session->userdata('fini'));
    $ffin = new DateTime($this->session->userdata('ffin'));
    $hoy  = new DateTime($this->session->userdata('fecha'));

    if ($item)
    {
       foreach($item as $row)
       { 
    	   $codPremio=$row['codPremio'];           
    
           while(!(strlen($codPremio)>4))
           $codPremio='0'.$codPremio;
           
           
           echo '
                    <div class="col-md-5">
                        <img style="background:#fcf6b9;width:100%;height:auto;" src="http://www.opisa.com/incentivos/'.$codPremio.'.jpg" alt="...">
                    </div>
                    <div class="col-md-5">
                        <h3>'.number_format($row["ValorPuntos"]).' Puntos</h3>
                        <h2>'.$row["Nombre_Esp"].'</h2>
                        <p style="text-align:center">'.$row["Caracts_Esp"].'</p>
                ';
          if ($fini <= $hoy && $ffin >= $hoy)
          {
            echo '<p><a class="btn btn-warning" onClick = "addItemOrder('.$row["codPremio"].',\''.str_replace('"',' ',$row["Nombre_Esp"]).'\','.$row["ValorPuntos"].')"><span class="glyphicon glyphicon-shopping-cart btn-lg"></span> Agregar</a></p>';
          }else{
            echo '
                  <div class="alert alert-info">
                    <strong>Periodo de Canje!</strong><br>  '.substr($this->session->userdata('fini'),0,10).'  al  '.substr($this->session->userdata('ffin'),0,10).'
                  </div>
            ';
          }

          echo '</div>';
       } 
    }
?>
</div>