<div class="col-md-12 animated apareciendo">
	<h2>Contenido de la orden</h2>
	<div class="table-responsive animated apareciendo">
		<div id="MessageCarrito"></div>
		<table class="table ">  
  		<thead class="thead navcolor text-white">
    		<tr>
				<th scope="col">C&oacute;digo</th>
				<th scope="col">Nombre</th>
				<th scope="col">Cantidad</th>
				<th scope="col">Valor Puntos</th>
				<th scope="col">Eliminar</th>
    		</tr>
	  	</thead>
	    <tbody id="bodyContentCart">	
	    </tbody>
	  </table>
	</div>
  <br>
</div>
<br>
</div>
<div class="row justify-content-center animated apareciendo">
	<div class="col-6">
		<div class="card card-column bg-light mb-3 animated apareciendo">
  			<div class="card-header">
				<h2 class= "text-center">
					<i class="fas fa-map-marker-alt mr-2"></i>Direcci&oacute;n de entrega
				</h2>
			</div>
  			<div class="card-body">
    			<h5 class="card-title">
					Ingrese o actualice la direcci&oacute;n a la que ser&aacute;n enviados los productos.
				</h5>
				<form id="frmCanjeDir">
			  	<div class="form-group" id="gedo">
					<input type="text" class="form-control" id="num" name="num" placeholder="Calle y Número" required>
			  	</div>
			  	<div class="form-group" id="gdelmuni">
					<input type="text" class="form-control" id="col" name="col" placeholder="Colonia" required>	
			  	</div>
			  	<div class="form-group" id="gcol">
					<input type="text" class="form-control" id="delmuni" name="delmuni" placeholder="Delegación/Municipio" required>
			  	</div>
			  	<div class="form-group" id="gnum">
					<input type="text" class="form-control" id="edo" name="edo" placeholder="Estado" required>
			  	</div>
			  	<div class="form-group" id="gcp">
			    	<input type="text" class="form-control" id="cp"  maxlength="5" name="cp" placeholder="C.P." required>
			  	</div>
          		<div class="form-group" id="telefono">
				    <input type="tel" class="form-control" id="tel" name="tel" placeholder="telefono" required>
			  	</div>
  				<div class="form-group" id="ref">
			    	<input type="text" class="form-control" id="refer" name="refer" placeholder="Referencia del domicilio" required>
			  	</div>
				</form>
				<div class="d-flex justify-content-end">
	    		<button id="btnGenCanje" onclick="sendCanje(<?php echo $this->session->userdata('puntos'); ?>,totPuntos)" type="button" class="btn btn-outline-secondary" ><i class="fas fa-flag-checkered mr-2"></i>Finalizar compra</button>
				</div>
  			</div>
		</div>
	</div>
</div>
<script>
	var str = "";
	var c = 0;
	var ctd;
	var totPuntos = 0;
	if(contOrder.length == 0){
    	$('#numeroCarrito').html(contOrder.length);
  	}else{
    	$('#numeroCarrito').html('<strong>'+contOrder.length+'</strong>');
  	}
	if(contOrder.length == 0){
		document.getElementById("btnGenCanje").disabled = true;
		$('#MessageCarrito').html('<div class="alert alert-warning" role="warning"><div class="row"><div class="col-5"></div><div class="col">No hay premios agregados</div><div class="col"></div></div></div>')
	}else{
		document.getElementById("btnGenCanje").disabled = false;
	}
	$.each(contOrder, function(k,v){
		totPuntos = totPuntos + v.puntos;
		if (totPuntos == 0){
			ctd = "class = 'warning'"; 
			c = 1;
		}else{
			ctd = "";
			c = 0;
		}
		str += "<tr "+ctd+"><td>"+v.id+"</td><td>"+v.nombre+"</td><td>"+v.cantidad+"</td><td>"+Number(v.puntos)+"</td><td><a class='borrarCarritoReconocelo' onClick='deleteItem("+v.id+")'><span class='far fa-trash-alt ml-2' aria-hidden='true'></span></a></td></tr>";
		$("#bodyContentCart").html(str);
	});
	str = "<tr><td colspan = 3 style ='text-align:right;'><h2>Total:</h2></td><td><h2>"+Number(totPuntos)+"</h2></td></tr>";
	str += "<tr><td border=0><button id=\"addGenCanje\" onclick=\"loadSection('home/getAwards/1','dvSecc')\" type=\"button\" class=\"btn btn-outline-secondary\"><i class=\"fas fa-shopping-basket mr-2\"></i>Continuar comprando</button></td></tr>";
	$("#bodyContentCart").append(str);
</script>
<script>
$(document).ready(function () {
	$("#cp").keypress(function (e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			return false;
    	}
   	});
});
</script>