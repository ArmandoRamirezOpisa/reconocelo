<!DOCTYPE html>
<html  ng-app="monitor" >
<?php
include 'home_monitor_view_header.php';
?>

        <div class="container">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nombre usuario</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Contraseña*</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Confirmar contraseña*</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1">
                </div>
                <button type="submit" class="btn btn-primary">Cambiar</button>
            </form>

</div>

            
<?php
include 'home_monitor_view_footer.php';
?>

        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Restablecer contraseña</h1>";
        </script>
    </body>
</html>