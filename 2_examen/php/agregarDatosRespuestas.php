<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id_p = $_POST['id_pregunta'];
	$pregunta=$_POST['respuesta'];
	$tipo=$_POST['tipo'];

	$sql="INSERT into respuestas (id_preguntas,respuestas,tipo)
	values ($id_p,'$pregunta','$tipo')";
	echo $result=mysqli_query($conexion,$sql);
 ?>