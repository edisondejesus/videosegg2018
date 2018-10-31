<!DOCTYPE html>
<html>
<head>
	<title>Contador de visitas</title>
</head>
<body>
	<header>
		<h1>Contador de visitas Videosegg</h1>
	</header>
<div style="background:black; color:white; height: 500px; width: 800px; font-size:30px;">
<?php
	include'conexion.php';
	$fecha_hoy = date("Ymd");
	$sql= "select * from  visita where fecha_visita='$fecha_hoy'";
	$result = $conexion->query($sql);

	
	echo "VISITAS HOY: ".$result->num_rows ."<br><br>";

	$sql= "select * from  visita";
		$result = $conexion->query($sql);

	echo "VISITAS EN TOTAL: ".$result->num_rows;
?>

</div>


</body>
</html>