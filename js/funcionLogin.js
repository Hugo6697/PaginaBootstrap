$(document).ready(function(){
	$('#login-button').click(function(){
		$('#login-button').fadeOut("slow",function(){
			$("#container").fadeIn();
			TweenMax.from("container", .4, {scale:0,ease:Sine.easeInOut});
			TweenMax.to("container", .4, {scale:1,ease:Sine.easeInOut});

		});
	});
	$("#btnIngresar").click(function(event){
		var user,password,ruta;
		user=$("#txtUsuario").val();
		password=$("#txtPassword").val();

		//alert(user+"--"+pasword)
		$.ajax({
			type:"GET",
			url:"./php/servidor.php",
			data:{accion:"buscarUsuario",user:user,password:password},
			success:function(respuesta){
				switch(respuesta){
					case '1':
					alertify.success("Entro un administrador");
					ruta="PanelAdministrador.php";
					$(location).attr('href',ruta);
					break;

					case '2':
					alertify.error("Entro una secretaria");
					ruta="panelSecretaria.html";
					$(location).attr('href',ruta);
					break;

					case '0':
					alertify.error("no existe el usuario");
					limpiarCampos();
					break;
				}
			}
		});
	});

});

function limpiarCampos(){
		$("#txtUsuario").val("");
		$("#txtPassword").val("");
		$("#txtUsuario").focus();

}