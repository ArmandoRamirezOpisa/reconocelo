<?php
  if($depositover){
?>
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Numero de transaccion</label>
    <select class="form-control" id="numTransaccion">
      <option value="Selecciona">Selecciona:</option>
      <?php
        foreach($depositover as $row){
          echo '<option value='.$row['idDeposito'].'>'.$row['idDeposito'].'</option>';
        }
      ?>
    </select>
  </div>
  <button type="button" id="ActivarDepositos" class="btn btn-primary" onclick="uploadPuntosDepo()"><i class="fas fa-check"></i> Activar puntos</button>
</form>
<?php
  }
?>