$(document).ready(function(){
	$("#submenuCerrar").click(function(event){
		window.location="./php/cerrarSession.php";

		
	});
    //mostrar menu fuente
	$("#menuAddFuente").click(function(event){
		$("#columna1").show("slow");//mostrar fromulario fuente
		$("#columna2").hide("slow");//ocultar 
		$("#columna3").hide("slow");
		$("#columnaPartida").hide("fast");
		$("#columnaBanco").hide("fast");
		$("#mostrarFuente1").hide("slow");
		$("#mostrarBanco").hide("fast");
	});

	//mostrar menu partida
	$("#menuAddPartida").click(function(event){
		$("#columnaPartida").show("slow");
		$("#columna2").hide("slow");
		$("#columna3").hide("slow");
		$("#columna1").hide("fast");
		$("#columnaBanco").hide("fast");
		$("#mostrarFuente").hide("slow");
		$("#mostrarBanco").hide("fast");
	});
	//mostar menu banco
	$("#menuAddBanco").click(function(event){
		$("#columnaBanco").show("slow");
		$("#columna2").hide("slow");
		$("#columna3").hide("slow");
		$("#columna1").hide("fast");
		$("#columnaPartida").hide("fast");
		$("#mostrarFuente").hide("slow");
		$("#mostrarFuente1").hide("slow");
	});


	$("#btnAgregarFuente").click(function(event){
		var codigoFuente,decripcionFuente,accion;
		codigoFuente=$("#txtCodigoFuente").val();
		decripcionFuente=$("#txtDescripcionFuente").val();
		if ($("#btnAgregarFuente").val()=="Guardar") {
			accion="agregarFuente";
		}
		if ($("#btnAgregarFuente").val()=="Editar") {
			accion="editarFuente";
		}
		//alert(codigoFuente+"-"+decripcionFuente);
		$.ajax({
		url:"./php/servidor.php",
		type:"GET",
		data:{accion:accion,codigoFuente:codigoFuente,decripcionFuente:decripcionFuente},
		success:function(respuestaPHP){
			//alert(respuestaPHP);
			if(respuestaPHP=="1"){
				alertify.success("Accion Exitoso");
				limpiarCamposFuente();
				$("#btnAgregarFuente").removeClass();
				$("#btnAgregarFuente").val("Guardar");
				$("#txtCodigoFuente").prop("disabled",false);
				$("#btnAgregarFuente").addClass("btn btn-success");
				$("#columna2").load("./php/mostrarFuente.php");
				$("#columna2").show("fast");
			}
			else
			{
				alertify.error("Registro denegado");
			}
		}

		});

	});


	//botonpartida
	$("#btnAgregarPartida").click(function(event){
		var codigoPartida,nombrePartida,decripcionPartida,accion2;
		codigoPartida=$("#txtCodigoPartida").val();
		nombrePartida=$("#txtNombrePartida").val();
		decripcionPartida=$("#txtDescripcionPartida").val();
		if($("#btnAgregarPartida").val()=="Guardar"){
			accion2="agregarPartida";
		}

		if($("#btnAgregarPartida").val()=="Editar"){
			accion2="editarPartida";

		}
		
		//alert(codigoFuente+"-"+decripcionFuente);
		$.ajax({
		url:"./php/serividor1.php",
		type:"GET",
		data:{accion2:accion2,codigoPartida:codigoPartida,nombrePartida:nombrePartida,decripcionPartida:decripcionPartida},
		success:function(respuestaPHP){
			//alert(respuestaPHP);
			if(respuestaPHP=="1"){
				alertify.success("Accion Exitoso");
				limpiarCamposPartida();
				$("#btnAgregarPartida").removeClass();
				$("#btnAgregarPartida").val("Guardar");
				$("#txtCodigoPartida").prop("disabled",false);
				$("#btnAgregarPartida").addClass("btn btn-success");
				$("#columna2").load("./php/mostrarFuente1.php");
				$("#columna2").show("fast");
				
			}
			else
			{
				alertify.error("Registro denegado");
			}
		}
		});
	});
	//boton agregar banco
	$("#btnAgregarBanco").click(function(event){
		var codigoBanco,nombreBanco,recurzo,tipoBanco,accion;
		codigoBanco=$("#txtCodigoBanco").val();
		nombreBanco=$("#txtNombreBanco").val();
		recurzo=$("#txtRecurzo").val();
		tipoBanco=$("#txtTipoBanco").val();
		accion="agregarBanco";
		$.ajax({
		url:"./php/servidor.php",
		type:"GET",
		data:{accion:accion,codigoBanco:codigoBanco,nombreBanco:nombreBanco,recurzo:recurzo,tipoBanco:tipoBanco},
		success:function(respuestaPHP){
			//alert(respuestaPHP);
			if(respuestaPHP=="1"){
				alertify.success("Accion Exitoso");
				limpiarCamposBanco();
				$("#columna2").load("./php/mostrarBanco.php");
				$("#columna2").show("fast");
				
			}
			else
			{
				alertify.error("Registro denegado");
			}
		}
		});
	});




	$("#menu1").click(function(event){
		//swal("Se mostrara el primer apartado");

		$("#columna1").slideDown("slow");
		$("#columnaPartida").hide("fast");

	});
	$("#menu").click(function(event){
		//swal("Se mostrara el primer apartado");
		$("#columna2").slideDown("slow");
	});
	$("#submenu1").click(function(event){
		//swal("Se mostrara el primer apartado");
		$("#columna").slideDown("slow");
	});
	$("#submenu3").click(function(event){
		//swal("Se mostrara el primer apartado");
		$("#columna1").hide("slow");
		$("#columna2").hide("slow");
		$("#columna").hide("slow");
	});
	$("#btnEnviar").click(function(event){
		//recibir los numeros
		var n1,n2;
		n1=$("#txtN1").val();
		n2=$("#txtN2").val();

		//inicia ajax enviando los datos al servidor php
		$.ajax({
			type:"GET",
			url:"./php/servidor.php",
			data:{n1:n1,n2:n2},
			before:function(){
				alert("antes de que el servidor responda");
			},
			success:function(respuestaPHP){
				//alertify.success(respuestaPHP);
				$("#columna2").html("<h1>"+respuestaPHP+"</h1>");
				$("#columna2").slideDown("slow");
				//$("#columna3").html("<h1>"+respuestaPHP+"</h1>");
				//$("#columna3").slideDown("slow");
			}
			
		});
		$.ajax({
			type:"GET",
			url:"./php/servidor2.php",
			data:{n1:n1,n2:n2},
			before:function(){
				alert("antes de que el servidor responda");
			},
			success:function(respuestaPHP){
				$("#columna").html("<h1>"+respuestaPHP+"</h1>");
				$("#columna").slideDown("slow");
			}
			
		});
	});
});
function limpiarCamposFuente(){
	$("#txtCodigoFuente").val("");
	$("#txtDescripcionFuente").val("");
	$("#txtCodigoFuente").focus();
}
function limpiarCamposPartida(){
	$("#txtCodigoPartida").val("");
	$("#txtNombrePartida").val("");
	$("#txtDescripcionPartida").val("");
	$("#txtCodigoPartida").focus();
}
function limpiarCamposBanco(){
	$("#txtCodigoBanco").val("");
	$("#txtNombreBanco").val("");
	$("#txtRecurzo").val("");
	$("#txtTipoBanco").val("");
	$("#txtCodigoBanco").focus();
}

function eliminarFuente(idFuente){
	alertify.confirm("¿Seguro de eliminar la fuente:"+idFuente+"?",function(respuesta){
		if (respuesta) {
			//alertify.success("Se hara el proceso de borrado");
			$.ajax({
				type:"GET",
				url:"./php/servidor.php",
				data:{accion:"eliminarFuente",idFuente:idFuente},
				success:function(respuestaPHP){
					if (respuestaPHP=="1") {
						alertify.success("Se ha eliminado"+"correctamente");
						$("#columna2").load("./php/mostrarFuente.php");

					}
					else
					{
						alertify.log("No se elimino");
					}
				}

				
			});

		}
		else
		{
			alertify.error("Nose borrara");
		}

	});	
}
function eliminarPartida(idPartida){
	alertify.confirm("¿Seguro de eliminar la partida:"+idPartida+"?",function(respuesta){
		if (respuesta) {
			//alertify.success("Se hara el proceso de borrado");
			$.ajax({
				type:"GET",
				url:"./php/serividor1.php",
				data:{accion2:"eliminarPartida",idPartida:idPartida},
				success:function(respuestaPHP){
					if (respuestaPHP=="1") {
						alertify.success("Se ha eliminado"+"correctamente");
						$("#columna2").load("./php/mostrarFuente1.php");

					}
					else
					{
						alertify.log("No se elimino");
					}
				}

				
			});

		}
		else
		{
			alertify.error("Nose borrara");
		}

	});
}
function eliminarBanco(idBanco){
	alertify.confirm("¿Seguro de eliminar Banco:"+idBanco+"?",function(respuesta){
		if (respuesta) {
			//alertify.success("Se hara el proceso de borrado");
			$.ajax({
				type:"GET",
				url:"./php/servidor.php",
				data:{accion:"eliminarBanco",idBanco:idBanco},
				success:function(respuestaPHP){
					if (respuestaPHP=="1") {
						alertify.success("Se ha eliminado"+"correctamente");
						$("#columna2").load("./php/mostrarBanco.php");

					}
					else
					{
						alertify.log("No se elimino");
					}
				}

				
			});

		}
		else
		{
			alertify.error("Nose borrara");
		}

	});
}
function editarFuente(codigoFuente,descripcionFuente){
	$("#txtCodigoFuente").val(codigoFuente);
	$("#txtDescripcionFuente").val(descripcionFuente);
	$("#txtDescripcionFuente").focus();
	$("#txtCodigoFuente").prop('disabled',true);
	$("#btnAgregarFuente").removeClass();
	$("#btnAgregarFuente").addClass("btn btn-primary");
	$("#btnAgregarFuente").val("Editar");

}
function editarPartida(codigoPartida,nombrePartida,decripcionPartida){
	$("#txtCodigoPartida").val(codigoPartida);
    $("#txtNombrePartida").val(nombrePartida);
	$("#txtDescripcionPartida").val(decripcionPartida);
	$("#txtNombrePartida").focus();
	$("#txtCodigoPartida").prop('disabled',true);
	$("#btnAgregarPartida").removeClass();
	$("#btnAgregarPartida").addClass("btn btn-primary");
	$("#btnAgregarPartida").val("Editar");

}

