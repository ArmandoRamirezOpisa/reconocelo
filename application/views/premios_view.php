<div class="container-fluid mt-4">
    <div id="dvContAw" class="col-md-12">
        <div class="row">
            <?php
                if($awards){
                    $nombre = '';
                    foreach($awards as $row){
                        $pp = ""; 
                        $codPremio=$row['codPremio'];
                        $nombre = strpos($row["Nombre_Esp"], $row["Marca"]);
                        while(!(strlen($codPremio)>4))
                            $codPremio='0'.$codPremio; 
                            $noChar = strlen($row["Caracts_Esp"]); 
                            if (strlen($noChar > 150)){
                                $pp = ' ...'; 
                            }else{
                                $pp = "";
                            }         
                        echo '<div class="col-sm-6 col-md-3 card-group mb-2 animated apareciendo">     
                            <div class="card bg-light">
                                <img class="card-img-top" src="http://www.opisa.com/incentivos/'.$codPremio.'.jpg" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><b>'. $row["Nombre_Esp"] .'';
                                    if($nombre === false){
                                        echo  '('.$row["Marca"].')</b></h5>';
                                    }else{
                                        echo  '</b></h5>';
                                    }
                                    echo '<p class="card-text"><b>C&oacute;digo '.$row["codPremio"].'</b>: '.substr($row["Caracts_Esp"],0,140).$pp.'</p>
                                </div>
                                <div data-toggle="tooltip" title="Agregar al carrito" class="card-footer">
                                    <a href="javascript:void(0)" class="btn btn-outline-secondary btn-lg btn-block" role="button" onClick = "showDet('.$row['codPremio'].')">
                                        <i class="fas fa-eye mr-3"></i></span><span class="badge">'.number_format($row["ValorPuntos"]).' puntos</span>
                                    </a>
                                </div>
                            </div>
                        </div>';
                    }  
                }
            ?>
        </div>
    </div>
</div>
<script>
    var dAct = "a1";
    function selCat(idCat,id){
        $("#"+dAct).removeClass("active");
        dAct = id;
        $("#"+id).addClass("active");
       loadSection('Home/getAwards/'+idCat,'dvSecc');
    }
    up();
    function up(){
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    }
    $("#selProd").change(function(){
        selCat($("#selProd").val(),1);
    });
</script>