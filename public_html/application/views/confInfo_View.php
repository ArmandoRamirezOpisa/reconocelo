
<div class="row justify-content-center mb-4">
    <div class="col-12 col-md-4">
        
        <h5 class="text-center mb-5">Usted podra recibir notificaciones del estado de sus canjes y poder recuperar su cuenta en caso de perdida con su correo electronico.</h5>
            
        <form class="mt-5" name="myForm">
            
    <!--        
  <div class="form-group">
    <label for="emailViejo" class="font-weight-bold">Correo Electronico</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $this->session->userdata('email');?>" name="emailViejo" readonly="true">
    <label for="email" class="font-weight-bold mt-4">Nuevo Correo Electronico</label>
    <input name="nuevoCorreo" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Nuevo email">
    
    <small id="emailHelp" class="form-text text-muted">Por seguridad no compartas tu correo electronico.</small>
   
  
  </div>
</form>
         <button class="btn btn-outline-secondary mr-lg-3 mt-3" onclick="CambiarCorreo();"><i class="fas fa-question-circle  mr-2" aria-hidden="true"></i>Acambiar email</button>
     -->
    </div>
   
</div>


<div class="row justify-content-center">
    <div class="col-12 col-md-4">
        
        <h5 class="text-center mb-2">Cambio de contraseña</h5>
            
        <form class="mt-0" name="myForm">
            
            
  <div class="form-group">
    <label for="Password" class="font-weight-bold">Contraseña Actual</label>
    <input type="password" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Contraseña actual"  name="Password">
    <label for="NuevoPassword" class="font-weight-bold mt-4">Nueva Contraseña</label>
    <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Nueva contraseña"  name="NuevoPassword">
     <label for="NuevoPassword2" class="font-weight-bold mt-4">Nueva Contraseña</label>
    <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Repita la nueva contraseña"  name="NuevoPassword2">
    <small id="emailHelp" class="form-text text-muted">Por seguridad no compartas tu correo electronico.</small>
   
  
  </div>
</form>
         <button class="btn btn-outline-secondary mr-lg-3 mt-3 mb-4" onclick="CambiarCorreo();"><i class="fas fa-question-circle  mr-2" aria-hidden="true"></i>Acambiar email</button>
    </div>
    
</div>

