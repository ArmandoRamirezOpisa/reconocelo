<div class="row justify-content-center">
  <div class="col-12">
    <h1 class="text-center">Reglas</h1>
  </div>
  <div class="col-8">
    <div class="panel-group" id="accordion">
      <!--Inicio cajas de las reglas, como acordeon -->
      <?php
        if ($cat){
          $contando = 0;
          $collapses = array("collapseOne", "collapseTwo", "collapseThree","collapseT","collapseFour","collapseFive","collapseSix");
          $longitud = count($collapses);
          while($contando <=6){
            foreach($cat as $row){
              echo '<div class="panel panel-warning">
                <div class="panel-heading">
                  <h4 class="panel-title">              
                    <a data-toggle="collapse" data-parent="#accordion" href="#'.$collapses[$contando].'">'.
                      $row["regla"].'
                    </a>
                  </h4>
                </div>
                <div id="'.$collapses[$contando].'" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <p>'.$row["descripcionRegla"].'</p>
                  </div>
                </div>
              </div>';
              $contando++;
            }
          }
        }
      ?>
      <!--Fin cajas de las reglas, como acordeon -->
    </div>
    <br>
    <br>
  </div>
</div>