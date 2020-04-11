<?php
//mostrar los datoss almacenados en la tabla fuentes

include "conexion.php";
$consultaSQL="Select *from fuente";
//ejecutamos la consulta
$ejecutarConsulta=$conexion->query($consultaSQL);
//rrecorre los elementos de la consulta dentro de un array y almacenarlas en una variable cada fila
?>

<script type="text/javascript">
	
	$(document).ready(function(){
$("#tablaFuente").DataTable();
});
</script>

<?php
echo "<table id='tablaFuente' class='display'>";
echo "<thead><th>Id</th><th>Codigo</th><th>Descripcion</th><th>Eliminar</th><th>Editar</th></thead>";
while($fila=$ejecutarConsulta->fetch_array()){
	//moistramos cada fila del array
	echo "<tr>";
	echo "<td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td><td><p class='btn btn-primary' onclick ='eliminarFuente(".$fila[0].")'>Eliminar</p></td>
	<td><p class='btn btn-dark' onclick=editarFuente(".$fila[1].",'".$fila[2]."')>Editar</p></td>";
	echo "</tr>";
}
echo "</table>";
?>