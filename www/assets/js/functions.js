//Globales
var contOrder = new Array();

function loadSection(controller,divSel)//Controlador,Div en el que se despliega la vista
{
    $.ajax({
        url:controller,
        async:'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        dataType: "html",
        error: function(object, error, anotherObject){
            alert('Mensaje: '+ object.statusText + 'Status: ' + object.status);
        },
        global: true,
        ifModified: false,
        processData:true,
        success: function(result){
        	//console.log(result);
        	if (result == "0")
        	{
        		console.log("Expiro");
        		window.location.reload();
        	}else{
        		$('#'+divSel).html(result);
        	}
        },
        timeout: 30000,
        type: "GET"
    });
}

var formatNumber = {
	separador: ",", // separador para los miles
	sepDecimal: '.', // separador para los decimales
	formatear:function (num){
		num +='';
		var splitStr = num.split('.');
		var splitLeft = splitStr[0];
		var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
		var regx = /(\d+)(\d{3})/;
		while (regx.test(splitLeft)) {
			splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
		}
		return this.simbol + splitLeft  +splitRight;
	},
	new:function(num, simbol){
		this.simbol = simbol ||'';
		return this.formatear(num);
	}
}






function addItemOrder(idProduct,name,puntos)
{
	//console.log("Agregar:"+idProduct+"-"+name+"-"+puntos);
	////////////////
	var exist = 0;
	//Arma array de productos seleccionados, si el id seleccionado ya se encuentra en el array lo elimina del mismo.
	numE=contOrder.length;

		if (numE==0)
		{
			//Si el array esta vacío agrega el id en la posicion 0
			contOrder = [
							{
								"id":idProduct,
								"cantidad":"1",
								"nombre":name,
								"puntos":puntos
							}
						];
						
						//console.log("Agrega id "+contOrder[0].id+" al array de la orden. Cantidad: "+contOrder[0].cantidad+" Nombre:"+contOrder[0].nombre+" Puntos:"+contOrder[0].puntos);
		}else{
			//A partir del segundo elemento se verifica si existe en el array, si existe se le suma 1 a la cantidad.
			$.each(contOrder, function(k,v){
				if (v.id == idProduct)
				{
					//console.log("Existe el id "+v.id+", se suma uno a la cantidad:"+v.cantidad);
					v.cantidad = parseInt(v.cantidad)+1;
					v.puntos   = parseInt(v.puntos)+puntos;
					exist = 1;
				}
			});
			
			//Si no existe en el array se agrega un nuevo elemento con cantidad 1
			if (exist == 0)
			{
				//console.log("Se inserta el id "+idProduct+" como un nuevo elemento al array");
				contOrder.push(
								{
									"id":idProduct,
									"cantidad":"1",
									"nombre":name,
									"puntos":puntos
								}
							   );
			}
		}
		loadSection("cart_controller/showContentCart/","dvContAw");
		$.notify("Se ha agregado el producto a su orden", "success");
		//console.log("Total de elementos en array: "+contOrder.length);
}

function refreshCar()
{
	//Actualiza las cantidades de los productos en el array
	//console.log("Refresca array");
	$.each(contOrder, function(k,v){
		if($("#in"+v.id).val() == 0){
			alert("La cantidad indicada debe ser mayor a cero");
		}else{
			v.cantidad = $("#in"+v.id).val();
			//console.log("Asigna al id: "+v.id+ "la cantidad: "+v.cantidad);
		}
	});	
	showOrderContent(0);		
}

function deleteItem(item)
{
    swal({
          title: "Eliminara el producto seleccionado ¿Desae continuar?",
          text: "",
          icon: "warning",
          buttons: [
            'No, Cancelar!',
            'Si, Estoy seguro!'
          ],
          dangerMode: true,
        }).then(function(isConfirm) {
          if (isConfirm) {
           //console.log("Eliminara: "+item);
		$.each(contOrder, function(k,v){
			if(item == v.id)
			{
				contOrder.splice(k, 1);
				//console.log("Elimino: "+item);
                                loadSection("cart_controller/showContentCart/","dvContAw");
				$.notify("Se ha eliminado el producto de su orden", "success");
				return false;
			}
		});	
		if (contOrder.length == 0)
		{
			$('#dvContOrder').modal('hide')
			$("#dvCar").html('');
			bloqueaCombos(0);
			//console.log("Orden elimiada");
			//console.log("No.Contenido: "+contOrder.length);
		}else{
			showOrderContent(0);	
		}
          } else {
          //  swal("Cancelled", "Your imaginary file is safe :)", "error");
          }
        });
    
    
    
    
    
	//var r=confirm("Eliminara el producto seleccionado ¿Desae continuar?")
	//if (r==true)
  	//{
		
		
  	//}
}

function delArray()
{
	//Elimina todo el contenido del carrito//
	$.each(contOrder, function(k,v){
		contOrder.splice(k, 1);
	});
	//confirmDelArray();
}

function showDet(id)
{
    loadSection("cart_controller/showItem/"+id,"dvContAw");
}

function sendDataAjaxDuda(idCanjeArticulo,NombreCanjeArticulo,mensaje,tipo){
    
    $.ajax({            type:'POST',
		            url:  "ayuda_Controller/crearComentario",
		            dataType: "json",
		            data:{"idcanje":idCanjeArticulo,"nombre":NombreCanjeArticulo,"mensaje":mensaje,"tipo":tipo},
		            beforeSend: function() {
		                console.log('Procesando, espere por favor...');
		            },
		            success: function(response) {
		                if (response) {
		                 //  $.notify("Envio de tu mensaje finalizado correctamente.", "success");
                                  swal("Mensaje enviado", "Envio de tu mensaje finalizado correctamente.", "success");
                                  document.getElementById("mensaje").value = "";

                                 //   location.reload();
		                    //delArray();//Elimina el contenido del array
		                 //  setTimeout(function(){location.href="http://www.reconocelo.com.mx";}, 3000);
		                } else {
		                
                                    swal("Envio de Mensaje", "Ha ocurrido un error al enviar tu mensaje.", "warning");
                                   // $.notify("Ha ocurrido un error al enviar tu mensaje.", "error");
                                   // swal("Mensaje enviado", "Envio de tu mensaje finalizado correctamente.", "success");  
//  
 //  $("#btnGenCanje").show();
		                   // $("#lblProc").hide();
		                }
		            },
		            error: function(x, e) {
		              swal("Envio de Mensaje", "Ocurrio un error al enviar su mensaje", "warning");
                               // alert("Ocurrio un error al enviar su duda" + e.messager);
		             //   $("#btnGenCanje").show();
		              //  $("#lblProc").hide();
		            }
		        });
         
         
}

function enviarPregunta(idCanjeArticulo,NombreCanjeArticulo,mensaje,tipo){

   switch (tipo) {
        case 1:
          //  alert("aaa");
         //   //console.log('Procesando, espere por favor...');
        // alert(idCanjeArticulo+NombreCanjeArticulo+mensaje); 
        //  console.log('1');       
                   sendDataAjaxDuda(idCanjeArticulo,NombreCanjeArticulo,mensaje,tipo);
         
            break;
        case 2:
           //    alert("aaa");
              //    alert(idCanjeArticulo+NombreCanjeArticulo+mensaje); 
             //         console.log('2');
                      sendDataAjaxDuda(idCanjeArticulo,NombreCanjeArticulo,mensaje,tipo);
        break;
            
        
        case 3:
              // alert("aaa");
                //  alert(idCanjeArticulo+NombreCanjeArticulo+mensaje);  
               //       console.log('3');
                     sendDataAjaxDuda(idCanjeArticulo,NombreCanjeArticulo,mensaje,tipo);
            break;
    }
   // alert("enviado");*/
}




function sendCanje($ptsUser,$ptsCanje)
{
	$('#btnGenCanje').attr('disabled', false);
	
	periodoCanjes = 1;
	if(validaCampos())
	{
		if (periodoCanjes == 1)
		{
		    //$("#btnGenCanje").hide();
		   // $("#lblProc").show();
		    
		    if ($ptsUser >= $ptsCanje )
		    {
                        if ( contOrder.length > 0) {
                    
                      var jsonString = JSON.stringify(contOrder);//Pasa array a formato JSON
			   var address = $("#frmCanjeDir").serializeArray();
		            //data:{"data": jsonString,"ptsCanje":$ptsCanje,"address":$("#frmCanjeDir").serialize()},
		       $.ajax({ 
		            type:'POST',
		            url:  "canje_controller/addCanje",
		            dataType: "json",
		            data:{"data": jsonString,"ptsCanje":$ptsCanje,"address":address},
		            beforeSend: function() {
		                //console.log('Procesando, espere por favor...');
		            },
		            success: function(response) {
		                if (response) {
		                 //   $.notify("La solicitud de canje ha sido almacenada.", "success");
                                   swal("Solicitud de canje", "Tu orden ha sido realizada correctamente", "success");
                                    setTimeout(function(){location.href="http://www.reconocelo.com.mx";}, 3000);
 //delArray();//Elimina el contenido del array
		                   // setTimeout(function(){location.href="http://www.lealtadsandvik.com.mx";}, 3000);
		                } else {
		                    swal("Error de comunicación", "Ha ocurrido un error de comunicación. Intente nuevamente", "warning");
                                 //   $.notify("Ha ocurrido un error de comunicación. Intente nuevamente.", "error");
		                    $("#btnGenCanje").show();
		                    $("#lblProc").hide();
		                }
		            },
		            error: function(x, e) {
		               swal("Error al realizar el canje", "Ocurrio un error al realizar el canje:" + e.messager, "warning");
                               // alert("Ocurrio un error al realizar el canje:" + e.messager);
		                $("#btnGenCanje").show();
		                $("#lblProc").hide();
		            }
		        });
                    
                    
                    
                    
                         }else{
                        //  $.notify("No tienes ningun articulo en tu carrito.", "error");  
                         swal("Operacion no permitida", "No tienes ningun articulo en tu carrito", "warning");
                         // swal("No tienes ningun articulo en tu carrito." + e.messager, "warning");   
                         }
                        
                        
		     
		    }else{
		      swal("Operacion no permitida", "Su saldo es insuficiente para realizar este canje.", "warning");       
             //   $.notify("Su saldo es insuficiente para realizar este canje.", "error");
		     //   $("#btnGenCanje").show();
		      //  $("#lblProc").hide();
		    }
		}else{
                      swal("Operacion no permitida", "No es posible realizar el proceso de canje.", "warning");       
		        //$.notify("No es posible realizar el proceso de canje.", "error");
		}
	}else{
                swal("Operacion no permitida", "Todos los campos son obligatorios.", "warning");  
		//$.notify("Todos los campos son obligatorios.", "error");
	}
}

function exit()
{
   
    
     
      
   
      
      swal({
          title: "¿Esta seguro de cerrar sesion?",
          text: "",
          icon: "warning",
          buttons: [
            'No, Cancelar!',
            'Si, Estoy seguro!'
          ],
          dangerMode: true,
        }).then(function(isConfirm) {
          if (isConfirm) {
            location.href="http://"+location.hostname+"/exit_controller";
          } else {
          //  swal("Cancelled", "Your imaginary file is safe :)", "error");
          }
        });
    
   
    
  
   // bootbox.confirm('message', 'asdas');
/* 
var r = swal("Are you sure you want to do this?", {
  buttons: ["Oh noez!", true],
   });; 
    if (r == true) {
       location.href="http://"+location.hostname+"/exit_controller";
    } else {
      
    }
    */
    
    }
    
function validaCampos()
{
	var datosForm = $("#frmCanjeDir").serializeArray();
	var vc = 0;

	$.each(datosForm, function(k,v){
		if (v.value == "")
		{
			$("#g"+v.name).addClass("has-error");
			vc = 1;
		}else{
			$("#g"+v.name).removeClass("has-error");
		}
		//console.log("name:"+v.name+"___VAL:"+v.value);
	});
	if (vc == 1)
	{
		return false;
	}else{
		return true;
	}
}

function up()
    {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    }
    function CambiarCorreo(){
     var correo = document.getElementsByName("nuevoCorreo")[0].value;
        if (validateEmailLogIn(correo)) {
             
          $.ajax({            type:'POST',
		            url:  "cofInfo_controller/cambiarCorreo",
		            dataType: "json",
		            data:{"correo":correo},
		            beforeSend: function() {
		                console.log('Procesando, espere por favor...');
		            },
		            success: function(response) {
		                if (response) {
		                 //  $.notify("Envio de tu mensaje finalizado correctamente.", "success");
                                  swal("Cambio de email", "Cambio de correo exitosamente", "success");
                                 // document.getElementById("mensaje").value = "";

                                 //   location.reload();
		                    //delArray();//Elimina el contenido del array
		                 //  setTimeout(function(){location.href="http://www.reconocelo.com.mx";}, 3000);
		                } else {
		                
                                    swal("Cambio de email", "Ha ocurrido un error al cambiar el email.", "warning");
                                   // $.notify("Ha ocurrido un error al enviar tu mensaje.", "error");
                                   // swal("Mensaje enviado", "Envio de tu mensaje finalizado correctamente.", "success");  
//  
 //  $("#btnGenCanje").show();
		                   // $("#lblProc").hide();
		                }
		            },
		            error: function(x, e) {
		               swal("Cambio de email", "Ha ocurrido un error al cambiar el email."+e+x, "warning");
                               // alert("Ocurrio un error al enviar su duda" + e.messager);
		             //   $("#btnGenCanje").show();
		              //  $("#lblProc").hide();
		            }
		        });
        
        
    }else{
      swal("Correo invalido", "Ingresa un correo valido", "warning");   
      
    }
        
        return true;
    }


function validateEmailLogIn(correo) {
    var pattern =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
   return pattern.test(correo);   
}
