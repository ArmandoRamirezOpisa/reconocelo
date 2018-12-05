<?php
include 'home_view_header.php';
?>

        <form>
            <div class="form-group">
                <label for="exampleFormControlSelect1" class="font-weight-bold lblText"> * Selecciona tu tipo de pregunta</label>
                <div id="tipoBusqueda">
                    <select class="form-control" id="exampleFormControlSelect1" name="preguntas">
                   <?php 
                     
                  
                   foreach ($preguntas as $key => $value) {
                    echo '<option>'.$value["TipoPregunta"].'</option>';   
                   }
                   ?>
                 
                </select>  
                </div>
               
                <div id="articulo">
                 <label for="exampleFormControlSelect2" class="font-weight-bold lblText"> * Selecciona tu articulo </label>
                 
                 <select class="form-control" id="exampleFormControlSelect2" name="articulo">
                   <?php 
                   foreach ($ordenes as $key => $value) {
                    
                    echo '<option>'.$value["idCanje"].'-'.$value["Nombre_Esp"].'</option>';   
                   }
                   ?>
                 
                </select>
                </div>
                <div id="orden">
                  <label for="exampleFormControlSelect3" class="font-weight-bold lblText"> * Selecciona tu orden </label>
                
                  <select class="form-control" id="exampleFormControlSelect3" name="orden">
                   <?php 
                   foreach ($ordenesFolio as $key => $value) {
                    
                    echo '<option>'.$value["idCanje"].'</option>';   
                   }
                   ?>
                 
                </select>
                 </div>
                <label for="mensaje" class="font-weight-bold lblText">* Describe la duda</label>
                <textarea class="form-control" id="mensaje" rows="3" ></textarea>
 
                
              <button id="btnenviarPregunta" onclick="enviar_pregunta()" type="button" class="btn btn-outline-secondary mb-2 mt-2" ><i class="fas fa-flag-checkered mr-2"></i>Enviar pregunta</button>
            </div>


        </form>

    <script>
    function enviar_pregunta(){

        if ($('#mensaje').val().trim()=="") {

            $.notify("Debe de agregar una descripcion para poder enviar su duda", "error");

        }else{
               
            var pregunta =$('select[name=preguntas]').val();
            var orden = $('select[name=orden]').val();
            var mensaje = $('#mensaje').val();
            var articulo = $('select[name=articulo]').val(); 
          
            if (pregunta == "Sobre mi orden") {

                if (orden ==null) {
                
                    swal("Operación no permitida", "No existen ordenes afiliadas a su cuenta", "warning");

                }else{

                    alert('Correcto');
                  enviarPregunta1(orden,'',mensaje,2);   
                } 
          
         }else if (pregunta =="Articulo de mi orden") {
             
            if (articulo ==null) {
                
                swal("Operación no permitida", "No existen articulos afiliadas a su cuenta", "warning");

            }else{

                var fields = articulo.split('-');
                var idCanjeArticulo = fields[0];
                var NombreCanjeArticulo = fields[1];
                alert(idCanjeArticulo,NombreCanjeArticulo,mensaje,1)
                enviarPregunta1(idCanjeArticulo,NombreCanjeArticulo,mensaje,1); 

            } 

        }else{

            alert(' ',' ',mensaje,3);
            enviarPregunta1(' ',' ',mensaje,3);
              
          }
          
      }
    
    }
    
    
    
    function  estado_form(){
      
        
        
        
        if ($('select[name=preguntas]').val()=="Sobre mi orden") {
   
    $("#orden").show();  
    $("#articulo").hide(); 
        
        }
 
 else if ($('select[name=preguntas]').val()=="Articulo de mi orden") {
    $("#articulo").show(); 
   
   $("#orden").hide(); 
     }else{
       $("#orden").hide();  
    $("#articulo").hide();   
         
     }
  
     
     
    }
    estado_form();
    
$( "#tipoBusqueda" )
  .change(function() {
 
    estado_form();
               // alert();
  });

  /* Funcion de prueba */
function enviarPregunta1(idCanjeArticulo, NombreCanjeArticulo, mensaje, tipo) {

    alert('idCanjeArticulo' + idCanjeArticulo);
    alert('NombreCanjeArticulo' + NombreCanjeArticulo);
    alert('mensaje' + mensaje);
    alert('tipo' + tipo);

    
        $.ajax({
        type: 'POST',
        url: "ayuda_Controller/crearComentarioPrueba",
        dataType: "json",
        data: { "idcanje": idCanjeArticulo, "nombre": NombreCanjeArticulo, "mensaje": mensaje, "tipo": tipo },
        beforeSend: function() {
            console.log('Procesando, espere por favor...');
        },
        success: function(response) {
            if (response) {
                swal("Mensaje enviado", "Envio de tu mensaje finalizado correctamente.", "success");
                document.getElementById("mensaje").value = "";
            } else {
                swal("Envio de Mensaje", "Ha ocurrido un error al enviar tu mensaje.", "warning");
            }
        },
        error: function(x, e) {
            swal("Envio de Mensaje", "Ocurrio un error al enviar su mensaje", "warning");
        }
    });
    
    

}
/* Fin funcion de prueba */
  
</script>

<?php
include 'home_view_footer.php';
?>