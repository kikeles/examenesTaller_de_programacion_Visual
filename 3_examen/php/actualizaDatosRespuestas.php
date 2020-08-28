<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id_r=$_POST['id_respuesta'];
	$id_p=$_POST['id_pregunta'];
	$respuesta=$_POST['respuesta'];
	$tipo=$_POST['tipo'];

	$sql="update respuestas set respuestas='$respuesta',tipo='$tipo' where id=$id_r and id_preguntas = $id_p";
	echo $result=mysqli_query($conexion,$sql);

 ?>