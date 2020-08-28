<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id=$_POST['id'];
	$pregunta=$_POST['pregunta'];
	$tipo=$_POST['tipo'];
	$puntaje=$_POST['puntaje'];
	$tema=$_POST['tema'];
	$estatus=$_POST['estatus'];

	$sql="UPDATE preguntas set pregunta='$pregunta',
		tipo='$tipo',
		puntaje=$puntaje,
		tema='$tema',
		estatus='$estatus'
		where id=$id";
	echo $result=mysqli_query($conexion,$sql);

 ?>