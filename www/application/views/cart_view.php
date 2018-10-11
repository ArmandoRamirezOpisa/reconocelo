<div class="row">
<?php
    if($awards)
    {
        
        
        foreach($awards as $row)
        {
           $pp = ""; 
		   $codPremio=$row['codPremio'];           

           while(!(strlen($codPremio)>4))
           $codPremio='0'.$codPremio;
           
           $noChar = strlen($row["Caracts_Esp"]);
           
           if (strlen($noChar > 150))
           {
                $pp = ' ...'; 
           }else{
                $pp = "";
           }    
               
        echo ' 
                  <div class="col-sm-6 col-md-3 card-group mb-2 ">
                   
                     <div class="card bg-light">
                      <img class="card-img-top" src="http://www.opisa.com/incentivos/'.$codPremio.'.jpg" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><b>'.$row["Nombre_Esp"].'</b></h5>
                        <p class="card-text"><b>C&oacute;digo '.$row["codPremio"].'</b>: '.substr($row["Caracts_Esp"],0,140).$pp.'</p>
                           </div>  
  <div class="card-footer">
    <a href="javascript:void(0)" class="btn btn-outline-secondary btn-lg btn-block" role="button" onClick = "showDet('.$row['codPremio'].')">
                                <i class="fas fa-cart-plus mr-3"></i></span><span class="badge">'.number_format($row["ValorPuntos"]).' puntos</span>
                            </a> 


                         
                      </div>
                    </div>
                  </div>

                ';
        }
        
    }
?>

</div>


