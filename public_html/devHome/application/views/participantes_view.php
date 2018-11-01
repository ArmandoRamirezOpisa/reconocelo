<div class="container">
    <div class="table-responsive">
        <table class="table table-hover table-sm table-bordered ">
            <thead>
                <tr class="bg-primary text-center">
                    <th scope="col">Codigo de Participante</th>
                    <th scope="col">Id Participante</th>

                    <th scope="col">Nombre</th>

                    <th scope="col">Saldo Actual</th>

                    <th scope="col">Ver Canjes</th>
                </tr>
            </thead>

            <tbody>


                <?php
                foreach ($data as $participante) {
                    echo' <tr>
     
      <td>' . $participante['codParticipante'] . '</td>
          <td>' . $participante['idParticipante'] . '</td>
    
     <td>' . $participante['PrimerNombre'] . '</td>
     
     <td>' . number_format($participante['SaldoActual']) . '</td>
    
     <td class = "text-center">  <a class="nav-link " href="#" onclick="loadSection(\'Participante_Detalle/' . $participante['idParticipante'] . '/' . $participante['PrimerNombre'] . '\',\'navegacion\')"> <i class="far fa-eye"></i></a></td>
         
    </tr>';
                }
                ?>

            </tbody>
        </table>

    </div>
</div>
<script src="../../assets/js/functions.js" type="text/javascript"></script>
