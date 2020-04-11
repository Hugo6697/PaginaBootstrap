<?php
include "conexion.php";
	
	//se recibe la accion a realizar
	$accion2=$_GET["accion2"];
	switch ($accion2) {
		//se evalua la accion
		case 'agregarPartida':
		//se reciben los datos a innsertar
		$codigoPartida=$_GET["codigoPartida"];
		$nombrePartida=$_GET["nombrePartida"];
		$decripcionPartida=$_GET["decripcionPartida"];
			//se definne la consulta sql a realizar
		$sql="insert into partida values (0, '$codigoPartida','$nombrePartida','$decripcionPartida')";
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
			case 'eliminarPartida':
			$idPartida=$_GET["idPartida"];
			$sql="Delete from partida where idpartida='$idPartida'";
			$ejecutarSQL=$conexion->query($sql);
			if ($ejecutarSQL) {
				echo "1";
				# code...
			}
			else
			{
				echo "0";
			}
			break;

			case 'editarPartida':
			$codigoPartida=$_GET["codigoPartida"];
		    $nombrePartida=$_GET["nombrePartida"];
		    $decripcionPartida=$_GET["decripcionPartida"];
		    //se define la consulta sql a realizar
		    $sql="Update partida set nombrepartida='$nombrePartida',descripcion='$decripcionPartida' where codigo='$codigoPartida'";
		    //se ejecuta la consulta con la base de datos
		    $ejecutarSQL=$conexion->query($sql)or die ("Error al insertar la partida");
		    if($ejecutarSQL){
		    	echo "1";
		    }
		    else
		    {
		    	echo "0";
		    }

				# code...
				break;
			
	}

?>