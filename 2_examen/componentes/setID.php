<?php
	session_start();
	$_SESSION['variable'] = $_POST["IDpregunta"];
	if(isset($_POST["IDpregunta"]))
	{
	if($_POST["IDpregunta"])
		echo "Ha elegido la pregunta: ".$_POST["IDpregunta"];
	else
		echo "He recibido un campo vacio";
	}
?>