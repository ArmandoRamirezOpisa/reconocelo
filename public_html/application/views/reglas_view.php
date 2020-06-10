<div class="row justify-content-center animated apareciendo">
  <div class="col-12">
    <h1 class="text-center">Reglas</h1>
  </div>
  <div class="col-8">
    <div class="panel-group animated apareciendo" id="accordion">
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
                  <div class="card-body">';
                    if($this->session->userdata('empresa') == 41162){
                      if($row['idReglaNombre'] == 'Mecanica'){
                        echo 'Todos los productos participantes tendrán una puntuación acorde a la siguiente tabla:';
                        echo '<table style="width:100%">
                          <tr>
                            <th>Sku </th>
                            <th>Producto</th>
                            <th>Descripcion</th>
                            <th>Puntos</th>
                          </tr>
                        <tr>
                          <td>10021</td>
                          <td>Mi Producto1</td>
                          <td>Presentacion de 10 piezas de la marca XXX</td>
                          <td>1500</td>
                        </tr>
                        <tr>
                          <td>10022</td>
                          <td>Mi Producto 2</td>
                          <td>Pantalla de 40 pulgadas</td>
                          <td>2000</td>
                        </tr>
                        <tr>
                          <td>10023</td>
                          <td>Mi Producto 3</td>
                          <td>Celular con Android</td>
                          <td>2000</td>
                        </tr>
                        <tr>
                          <td>10024</td>
                          <td>Mi Producto 4</td>
                          <td>Caja de herramientas</td>
                          <td>1800</td>
                        </tr>
                      </table>';
                    }else{
                      echo ''.$row['descripcionRegla'].'';
                    }
                  }else{
                    echo ''.$row['descripcionRegla'].'';
                  }
                  /*if($this->session->userdata('empresa') != 41162){
                    if(!$row['idReglaNombre'] == 'Mecanica'){
                      echo ''.$row['descripcionRegla'].'';
                    }
                  }*/
                  echo '</div>
              </div>
          </div>';
          $contador = $contador + 1;
          }
      }
      ?>
    </div>
    <br><br>
  </div>
</div>