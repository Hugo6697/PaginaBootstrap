<?php
//definir los datos de conexion
	$servidor="localhost";
	$user="root";
	$password="";
	$bd="poliza";
	$conexion=new mysqli($servidor,$user,$password,$bd) or
		die("Error al conectar a la base de Datos");
?>