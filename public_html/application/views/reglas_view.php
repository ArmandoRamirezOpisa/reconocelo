<div class="row justify-content-center animated apareciendo">
  <div class="col-12">
    <h1 class="text-center">Reglas</h1>
  </div>
  <div class="col-8">
    <div class="panel-group animated apareciendo" id="accordion">
      <!--Inicio cajas de las reglas, como acordeon -->
      <?php
        if($cat){
          $contador = 0;
          foreach($cat as $row){
              echo '<div class="card animated apareciendo">
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
                    '.$row['descripcionRegla'].'
                  </div>
              </div>
          </div>';
          $contador = $contador + 1;
          }
      }


      ?>
      <!--Fin cajas de las reglas, como acordeon -->
    </div>
    <br>
    <br>
  </div>
</div>