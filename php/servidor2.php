<?php
	$numero1=$_GET["n1"];
	$numero2=$_GET["n2"];
	echo "Multiplicacion"."<>";
	echo "<br>";
	$contador=1;
	while($contador<= $numero2){
		echo $numero1."x".$contador."=".($numero1*$contador)."<br>";
		$contador++;
	}

?>