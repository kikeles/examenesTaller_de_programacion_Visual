<?php 
	session_start();
  	$id_user = $_SESSION['id_usuario'];
  	$examen = $_SESSION['examen'];

	require_once "php/conexion.php";
	$conexion=conexion();


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Informacion de examenes</title>
	<script src="librerias/jquery-3.2.1.min.js"></script>

	<style type="text/css">
		#caja-de-informacion{
			width: 100%;
			background-color: #E3862D;
			border: solid #E3862D;
			font-size: 25px;
		}

		.infoTabla{
			margin:auto;
			margin-top: 50px;
		}

	</style>

</head>
<body>
	
	<div id="caja-de-informacion">
		
		<?php

			$sql = "SELECT examen, correctas, incorrectas, puntuacion, calificacion, fecha FROM evaluacion WHERE id_usuario = $id_user AND examen = '$examen';";
			$result=mysqli_query($conexion,$sql);
			while($info=mysqli_fetch_row($result)){
				echo "<table border=\"1\" class=\"infoTabla\" > ";
				echo "<tr><th>Examen</th><th>$info[0]</th>";
				echo "<tr><th>Correctas</th><th>$info[1]</th>";
				echo "<tr><th>Incorrectas</th><th>$info[2]</th>";
				echo "<tr><th>Puntuación</th><th>$info[3]</th>";
				echo "<tr><th>Calificación</th><th>$info[4]</th>";
				echo "<tr><th>Fecha</th><th>$info[5]</th>";
				echo "</table>";
			}

			mysqli_close($conexion);
		?>


	</div>

</body>
</html>