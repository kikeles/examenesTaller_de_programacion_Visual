<?php 

	require_once "conexion.php";
	$conexion=conexion();
	
	$pregunta=$_POST['pregunta'];
	$tipo=$_POST['tipo'];
	$puntaje=$_POST['puntaje'];
	$tema=$_POST['tema'];
	$estatus=$_POST['estatus'];

	$sql="INSERT into preguntas (pregunta,tipo,puntaje,tema,estatus)
	values ('$pregunta','$tipo',$puntaje,'$tema','$estatus')";
	echo $result=mysqli_query($conexion,$sql);

 ?>