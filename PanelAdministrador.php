
<?php
session_start();
if ($_SESSION["admin"]=="") {
	echo "<script>alert('Debes iniciar sesion');window.location='index2.html';</script>";

	# code...
}
else
{
	$nombreUsuario=$_SESSION["admin"];
}

?>
<html>
<head>
	<title>Sistema Poliza</title>
	<meta charset="UTF-8">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
	<link href="css/estilos.css" rel="stylesheet" type="text/css"/>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/Funciones.js" type="text/javascript"></script>
	<link href="css/alertify.core.css" rel="stylesheet" type="text/css"/>
	<link href="css/alertify.default.css" rel="stylesheet" type="text/css"/>
	<link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	<script src="js/alertify.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/sweetalert.min.js" type="text/javascript"></script>
	<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script>
		function solonumeros(e){
			key=e.keyCode || e.which;
			teclado=String.fromCharCode(key);
			numeros="0123456789";
			especiales="8-37-38-46";
			teclado_especial=false;
			for(var i in especiales){
				if(key==especiales[i]){
					teclado_especial=true;

				}

			}
			if(numeros.indexOf(teclado)==-1 && !teclado_especial){
				return false;


			}


		}
	</script>
	<script>
		function sololetras(e){
	      key=e.keyCode || e.which;
	      teclado=String.fromCharCode(key).toLowerCase();
	      letras=" abcdefghijklmnñopqrstuvwxyz";
	      especiales="8-37-38-46-164";
	      teclado_especial=false;
	 for(var i in especiales){
		if(key==especiales[i]){
			teclado_especial=true;
		}

	}
	if(letras.indexOf(teclado)==-1 && !teclado_especial){
		return false;

	}

}
	</script>
</head>
<script>
	$(document).ready(function(){
		alertify.alert("<p class='alert alert-success'>Bienvenido <?php echo $nombreUsuario; ?></p>");

		
	});
</script>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<p class="navbar-brand"><img src="img/fondo.jpg" style="width: 120px;"></p>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#uno">
		<span class=" navbar-toggler-icon"></span>	
		</button>
		<div class="collapse navbar-collapse" id="uno">
			<ul class="navbar-nav">
				<li class="nav-item"><span class="nav-link encima" id="menu1">Formulario</span></li>
				<li class="nav-item"><span class="nav-link encima" id="menu2">Apartado2</span></li>
				<li class="nav-item dropdown">
					<span class="nav-link drop down-toggle encima" data-toggle="dropdown" id="navbardrop">Agregar</span>
					<div class="dropdown-menu">
						<span class="dropdown-item encima" id="menuAddFuente">Fuentes</span>
						<span class="dropdown-item encima" id="menuAddPartida">Partidas</span>
						<span class="dropdown-item encima" id="menuAddBanco">Bancos</span>
						<span class="dropdown-item encima" id="submenuCerrar">Cerrar Session</span>
					</div>
					
				</li>                                                
				
			</ul>
		</div>
		
	</nav>
	<div class="container" >
		<p class="alert alert-primary">Pagina con BootStrap</p>
		<div class="row">
			<div class="col-12 col-md-4 " id="columna1" style="display: none;">
				<p class="alert alert-success">Agregar Fuente</p>
				<form>
					Codigo Fuente: <input type="text" id="txtCodigoFuente" onkeypress="return solonumeros(event)"  placeholder="Introduce el codigo fuente"class="form form-control">
					Descripcion: <input type="text" id="txtDescripcionFuente" onkeypress="return sololetras(event)" placeholder="Introduce la descripcion"class="form form-control">
					<input type="button" id="btnAgregarFuente" value="Guardar" class="btn btn-warning " >
					<input type="button" id="btnNuevo" value="Nuevo" class="btn btn-primary " >
				</form>
			</div>
			<div class="col-12 col-md-4 " id="columnaPartida" style="display: none;">
				<p class="alert alert-success">Agregar partida</p>
				<form>
					Codigo Partida: <input type="text" id="txtCodigoPartida" onkeypress="return solonumeros(event)"  class="form form-control">
					Nombre Partida: <input type="text" id="txtNombrePartida" onkeypress="return sololetras(event)" class="form form-control">
					Descripcion: <input type="text" id="txtDescripcionPartida" onkeypress="return sololetras(event)" class="form form-control">
					<input type="button" id="btnAgregarPartida" value="Guardar" class="btn btn-warning " >
					<input type="button" id="btnNuevo" value="Nuevo" class="btn btn-primary " >
				</form>
			</div>
			<div class="col-12 col-md-4 " id="columnaBanco" style="display: none;">
				<p class="alert alert-success">Agregar Bancos</p>
				<form>
					Clave Banco: <input type="text" id="txtCodigoBanco" onkeypress="return solonumeros(event)"  class="form form-control">
					Nombre Banco: <input type="text" id="txtNombreBanco" onkeypress="return sololetras(event)" class="form form-control">
					Recurzo: <input type="text" id="txtRecurzo" onkeypress="return sololetras(event)" class="form form-control">
					Tipo Banco: <input type="text" id="txtTipoBanco" onkeypress="return sololetras(event)"class="form form-control">
					<input type="button" id="btnAgregarBanco" value="Guardar" class="btn btn-warning " >
					<input type="button" id="btnNuevo" value="Nuevo" class="btn btn-primary " >
				</form>
			</div>
			<div class="col-12 col-md-8 " style="display: none" id="columna2">
				segunda columna
			</div>
			<div class="col-12 col-md-8 " style="display: none" id="columna2">
				tercera columna
			</div>
		</div>
	</div>

</body>
</html>