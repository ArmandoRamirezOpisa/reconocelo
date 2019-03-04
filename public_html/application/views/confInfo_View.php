<div id="messageUpdatePasswordReconocelo" class="row justify-content-center"></div>
<div class="row justify-content-center">
  <div class="col-12 col-md-4">      
    <h5 class="text-center mb-2">Actualiza tu contraseña.</h5>        
    <form class="mt-0" name="myForm">
      <div class="form-group">
        <label for="Password" class="font-weight-bold">Contraseña Actual</label>
        <input type="password" class="form-control" id="passwordOld" aria-describedby="emailHelp" placeholder="Ecribe tu contraseña actual"  name="Password">
        <label for="NuevoPassword" class="font-weight-bold mt-4">Nueva Contraseña</label>
        <input type="password" class="form-control" id="passwordNew" aria-describedby="emailHelp" placeholder="Escribe tu nueva contraseña"  name="NuevoPassword">
        <label for="NuevoPassword2" class="font-weight-bold mt-4">Confirma la contraseña nueva</label>
        <input type="password" class="form-control" id="passwordNewConfirmar" aria-describedby="emailHelp" placeholder="Confirma la nueva contraseña"  name="NuevoPassword2">
        <small id="emailHelp" class="form-text text-muted mt-2">Por seguridad no compartas tu correo electronico.</small>
      </div>
    </form>
    <button class="btn btn-outline-secondary mr-lg-3 mt-3 mb-4" onclick="CambiarContraseña();"><i class="fas fa-exchange-alt"></i> Cambiar contraseña</button>
  </div>  
</div>
