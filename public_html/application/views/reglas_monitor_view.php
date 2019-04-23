        <div class="container mt-5">

            <div class="accordion" id="acordeonReglasReconocelo">
                <?php
                    if($reglasMonitor){
                        $contador = 0;
                        foreach($reglasMonitor as $row){
                            echo '<div class="card">
                            <div class="card-header" id="heading'.$row['idReglaNombre'].'">
                                <h2 class="mb-0">
                                    <button class="btn btn-link mr-5" type="button" data-toggle="collapse" data-target="#'.$row['idReglaNombre'].'"';
                                    if($contador == 0){
                                        echo ' aria-expanded="false"';
                                    }else{
                                        echo ' aria-expanded="true"';
                                    }
                                    echo' aria-controls="'.$row['idReglaNombre'].'">
                                        '.$row['regla'].'
                                    </button>
                                    <a id="cambiar-'.$row['idReglaNombre'].'" href="#" class="btn btn-link badge-light mr-5" onclick="cambiarNombreRegla(this)">Cambiar nombre</a>
                                    <form id ="nombre-'.$row['idReglaNombre'].'" class="form-inline" style="display:none;">
                                        <div class="form-group mb-2">
                                            <input type="text" class="form-control-plaintext" id="text-'.$row['idReglaNombre'].'" placeholder="Escribe el nombre que deseas">
                                        </div>
                                        <button id="btn-'.$row['idReglaNombre'].'" type="button" class="btn btn-primary mb-2" onclick="cambiarNombreReglaBtn(this)">Cambiar nombre</button>
                                    </form>
                                </h2>
                            </div>
                            <div id="'.$row['idReglaNombre'].'" class="collapse" aria-labelledby="heading'.$row['idReglaNombre'].'" data-parent="#accordionExample">
                                <div class="card-body">
                                    <textarea class="form-control" id="regla-'.$row['idReglaNombre'].'" rows="3">'.$row['descripcionRegla'].'</textarea>
                                    <button id="'.$row['idReglaNombre'].'" type="button" class="btn btn-primary mt-2" onclick="cambiarRegla(this)""><i class="fas fa-edit"></i> Editar regla</button>
                                </div>
                            </div>
                        </div>';
                        $contador = $contador + 1;
                        }
                    }
                ?>
            </div>

        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col animated apareciendo">
                    <label id="agregarNuevaRegla" for="staticText" class="colorSeleccion" onclick="addNuevaRegla(this)">Agregar Nueva regla <i class="fas fa-plus-circle"></i></label>
                </div>
                <div class="col"></div>
                <div class="col animated apareciendo">
                    <label id="ocultarNuevaRegla" for="staticText1" style="display:none;" class="colorSeleccion" onclick="addNuevaRegla(this)">Ocultar <i class="fas fa-minus-circle"></i></label>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div id="MessageNuevaRegla"></div>
        </div>

        <div id="nuevaReglaData" class="container mt-5 animated apareciendo" style="display:none;">
            <form>
                <div class="form-group">
                    <label for="nombreRegla">Nombre regla</label>
                    <input type="text" class="form-control" id="nuevoNombreRegla" aria-describedby="emailHelp" placeholder="Escribe el nombre de la regla">
                </div>
                <div class="form-group">
                    <label for="descripcionNuevaRegla">Descripcion de la regla</label>
                    <textarea class="form-control" id="DecripcionNuevaRegla" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" onclick="addNuevaReglaData()"><i class="fas fa-save"></i> Crear nueva regla</button>
            </form>
        </div>

        <div class="mt-5"></div>

        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Reglas</h1>";
        </script>