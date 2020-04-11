<?php
include "conexion.php";
$consultaSQL="Select *from banco";
//ejecutamos la consulta
$ejecutarConsulta=$conexion->query($consultaSQL);
?>
<script type="text/javascript">
	
	$(document).ready(function(){
$("#tablaBanco").DataTable();
});
</script>
<?php
echo "<table id='tablaBanco' class='display'>";
echo "<thead><th>Id</th><th>Codigo</th><th>Nombre</th><th>Recurzo</th><th>Tipo</th><th>Eliminar</th><th>Editar</th></thead>";
while($fila=$ejecutarConsulta->fetch_array()){
	//moistramos cada fila del array
	echo "<tr>";
	echo "<td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td><td>".$fila[4]."</td><td><p class='btn btn-primary' onclick ='eliminarBanco(".$fila[0].")'>Eliminar</p></td>
	<td><p class='btn btn-dark' onclick=editarBanco(".$fila[1].",'".$fila[2]."','".$fila[3]."','".$fila[4]."')>Editar</p></td>";
	echo "</tr>";
}
echo "</table>";
?>