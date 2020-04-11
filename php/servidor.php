<?php
	include "conexion.php";
	
	/*$numero1=$_GET["n1"];
	$numero2=$_GET["n2"];
	$r=$numero1+$numero2;
	echo "El resultado es: ".$r."<br>";
	*/



	//se recibe la accion a realizar
	$accion=$_GET["accion"];
	switch ($accion) {
		//se evalua la accion
		case 'agregarFuente':
		//se reciben los datos a innsertar
		$codigoFuente=$_GET["codigoFuente"];
		$decripcionFuente=$_GET["decripcionFuente"];
			//se definne la consulta sql a realizar
		$sql="insert into fuente values (0, '$codigoFuente','$decripcionFuente')";
		//se ejecuta la consulta con la bd
		$ejecutarSQL=$conexion->query($sql)or die ("Error al insertar Fuente");
		//echo $ejecutarSQL;
		if($ejecutarSQL){
			echo "1";
		}else
		{
			echo "0";
		}
		break;

		//EditarFuente

		case 'editarFuente':
		//se reciben los datos a innsertar
		$codigoFuente=$_GET["codigoFuente"];
		$decripcionFuente=$_GET["decripcionFuente"];
			//se definne la consulta sql a realizar

		$sql="Update fuente set Descripcion='$decripcionFuente' where codigo='$codigoFuente'";
		//$sql="insert into fuente values (0, '$codigoFuente','$decripcionFuente')";
		//se ejecuta la consulta con la bd
		$ejecutarSQL=$conexion->query($sql)or die ("Error al insertar Fuente");
		//echo $ejecutarSQL;
		if($ejecutarSQL){
			echo "1";
		}else
		{
			echo "0";
		}
		break;


			//inicio de case agregarPartida
		case 'agregarPartida':
		//se reciben los datos a innsertar
		$codigoPartida=$_GET["codigoPartida"];
		$nombrePartida=$_GET["nombrePartida"];
		$tipoPartida=$_GET["tipoPartida"];
			//se definne la consulta sql a realizar
		//$sql="Update partida set nombre='$nombrePartida',tipo='$tipoPartida' where codigoPartida='$codigoPartida'";
		$sql="insert into partida values (0, '$codigoPartida','$nombrePartida','$tipoPartida')";
		//se ejecuta la consulta con la bd
		$ejecutarSQL=$conexion->query($sql)or die ("Error al insertar Fuente");
		//echo $ejecutarSQL;
		if($ejecutarSQL){
			echo "1";
		}else
		{
			echo "0";
		}
			break;

			//fin de case agregarPartida

			case 'editarPartida':
		//se reciben los datos a innsertar
		$codigoPartida=$_GET["codigoPartida"];
		$nombrePartida=$_GET["nombrePartida"];
		$tipoPartida=$_GET["tipoPartida"];
			//se definne la consulta sql a realizar
		//$sql="insert into partida values (0, '$codigoPartida','$nombrePartida','$tipoPartida')";
		$sql="Update partida set nombre='$nombrePartida',tipo='$tipoPartida' where codigoPartida='$codigoPartida'";
		//se ejecuta la consulta con la bd
		$ejecutarSQL=$conexion->query($sql)or die ("Error al insertar Fuente");
		//echo $ejecutarSQL;
		if($ejecutarSQL){
			echo "1";
		}else
		{
			echo "0";
		}
			break;
			case 'agregarBanco':
			$codigoBanco=$_GET["codigoBanco"];
			$nombreBanco=$_GET["nombreBanco"];
			$recurzo=$_GET["recurzo"];
			$tipoBanco=$_GET["tipoBanco"];
			$sql="insert into banco values (0, '$codigoBanco','$nombreBanco','$recurzo','$tipoBanco')";
			$ejecutarSQL=$conexion->query($sql)or die ("Error al insertar el Banco");
			if($ejecutarSQL){
				echo "1";
			}
			else
			{
				echo "0";
			}
			break;

			

			case 'eliminarFuente':
			$idFuente=$_GET["idFuente"];
			$sql="Delete from fuente where idfuente='$idFuente'";
			$ejecutarSQL=$conexion->query($sql);
			if ($ejecutarSQL) {
				echo "1";
				# code...
			}
			else{
				echo "2";
			}

			break;

			case 'buscarUsuario':
			$usuario=$_GET["user"];
			$password=$_GET["password"];

			$sql="Select *from usuario where usuario='$usuario' and password='$password'";

			$ejecutarSQL=$conexion->query($sql);

			$totalUsuario=$ejecutarSQL->num_rows;
			if ($totalUsuario==1) {
				$fila=$ejecutarSQL->fetch_array();
				session_start();
				$_SESSION["admin"]=$fila[1];
				echo $fila[3];
			}
			else{
				echo "0";
			}

			break;



			case 'eliminarPartida':
			$idPartida=$_GET["idPartida"];
			$sql="Delete from partida where IdPartida='$idPartida'";
			$ejecutarSQL=$conexion->query($sql);
			if ($ejecutarSQL) {
				echo "1";
				# code...
			}
			else{
				echo "2";
			}

			break;



	}

?>