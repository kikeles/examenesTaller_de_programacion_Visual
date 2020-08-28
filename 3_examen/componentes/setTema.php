<?php  
	session_start();
	$_SESSION['tema'] = $_POST['tema'];
	$_SESSION['examen'] = $_POST['examen'];
	if(isset($_POST["tema"]))
	{
		if($_POST["tema"])
			echo "Ha desidido comenzar el examen de ".$_POST["tema"];
		else
			echo "Algo fallo :(";
	}
	else if(isset($_POST["examen"]))
	{
		if($_POST["examen"])
			echo "Resultados del examen de ".$_POST["examen"];
		else
			echo "Algo fallo :(";
	}

?>