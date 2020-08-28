<?php  
	require_once"../php/conexion.php";
	$conexion = conexion();

	$id_usuario = $_POST['id_usuario'];
	$examen = $_POST['examen'];
	$correctas = $_POST['correctas'];
	$incorrectas = $_POST['incorrectas'];
	$puntuacion = $_POST['puntuacion'];
	$calificacion = $_POST['calificacion'];

	$sql = "INSERT into evaluacion (id_usuario,examen,correctas,incorrectas,puntuacion,calificacion) values($id_usuario,'$examen',$correctas,$incorrectas,'$puntuacion','$calificacion');";
	echo $result=mysqli_query($conexion,$sql);

?>