<?php
//mostrar los datoss almacenados en la tabla fuentes

include "conexion.php";
$consultaSQL="Select *from partida";
//ejecutamos la consulta
$ejecutarConsulta=$conexion->query($consultaSQL);
?>
<script type="text/javascript">
	
	$(document).ready(function(){
      $("#tablaPartida").DataTable();
});
</script>

<?php
//rrecorre los elementos de la consulta dentro de un array y almacenarlas en una variable cada fila
echo "<table id='tablaPartida' class='display'>";
echo "<thead><th>Id</th><th>Codigo</th><th>Nombre</th><th>Descripcion</th><th>Eliminar</th><th>Editar</th></thead>";
while($fila=$ejecutarConsulta->fetch_array()){
	//moistramos cada fila del array
	echo "<tr>";
	echo "<td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td><td><p class='btn btn-primary' onclick ='eliminarPartida(".$fila[0].")'>Eliminar</p></td>
	<td><p class='btn btn-dark' onclick=editarPartida(".$fila[1].",'".$fila[2]."','".$fila[3]."')>Editar</p></td>";
	echo "</tr>";
}

echo "</table>";
?>