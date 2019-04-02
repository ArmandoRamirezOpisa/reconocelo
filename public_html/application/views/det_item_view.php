<div class="row">
    <?php
        $count = 0;
        if ($item){
            foreach($item as $row){
                if($count ==0 ){
                    $codPremio=$row['codPremio'];
                    while(!(strlen($codPremio)>4))
                        $codPremio='0'.$codPremio;
                        echo '<div class="col-md-5 animated fadeIn">
                            <img style="background:#fcf6b9;width:100%;height:auto;" src="http://www.opisa.com/incentivos/'.$codPremio.'.jpg" alt="...">
                        </div>
                        <div class="col-md-5">
                            <h2><span class="badge badge-warning">'.number_format($row["ValorPuntos"]).' Puntos</span></h2>
                            <h2 class="font-weight-bold">'.$row["Nombre_Esp"].'</h2>
                            <p style="text-justify">'.$row["Caracts_Esp"].'</p>
                            <p><a class="btn btn-outline-secondary text-white" onClick = "addItemOrder('.$row["codPremio"].',\''.str_replace('"',' ',$row["Nombre_Esp"]).'\','.$row["ValorPuntos"].')"><i class="fas fa-plus-circle mr-2"></i>Agregar</a></p>
                        </div>';
                        $count =1;
                }else{}
            } 
        }
    ?>
</div>
<script>
    $( document ).ready(function() {
        $(document).scrollTop("50");
    });
</script>