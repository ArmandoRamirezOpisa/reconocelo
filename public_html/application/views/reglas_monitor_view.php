<!DOCTYPE html>
<html  ng-app="monitor" >
<?php
include 'home_monitor_view_header.php';
?>
        <div class="container">

            <div class="accordion" id="acordeonReglasReconocelo">
                <?php
                    if($reglasMonitor){
                        $contador = 0;
                        foreach($reglasMonitor as $row){
                            echo '<div class="card">
                            <div class="card-header" id="heading'.$row['idReglaNombre'].'">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#'.$row['idReglaNombre'].'"';
                                    if($contador == 0){
                                        echo ' aria-expanded="false"';
                                    }else{
                                        echo ' aria-expanded="true"';
                                    }
                                    echo' aria-controls="'.$row['idReglaNombre'].'">
                                        '.$row['regla'].'
                                    </button>
                                </h2>
                            </div>
                            <div id="'.$row['idReglaNombre'].'" class="collapse" aria-labelledby="heading'.$row['idReglaNombre'].'" data-parent="#accordionExample">
                                <div class="card-body">
                                    <input type="text" class="form-control" value="'.$row['descripcionRegla'].'">
                                </div>
                            </div>
                        </div>';
                        $contador = $contador + 1;
                        }
                    }
                ?>
            </div>

            <div class="mt-5">
                <form class="form-inline">
                    <div class="form-group mb-5">
                        <label for="staticText" class="sr-only">Agregar nueva regla</label>
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class="form-group mx-sm-3 mb-5">
                        <label for="staticText1" class="sr-only">Ocultar</label>
                        <i class="fas fa-minus-circle"></i>
                    </div>
                </form>
            </div>

        </div>

<?php
include 'home_monitor_view_footer.php';
?>

        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Reglas</h1>";
        </script>
</body>
</html>