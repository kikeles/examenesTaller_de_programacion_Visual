<?php 
		$nombre = $_POST['txt_nombre'];
		$es1 = empty($nombre);
		$paterno = $_POST['txt_paterno'];
		$es2 = empty($paterno);
		$materno = $_POST['txt_materno'];
		$es3 = empty($materno);
		$nacimiento = $_POST['txt_nacimiento'];
		$es4 = empty($nacimiento);
		$genero = $_POST['txt_genero'];
		$es5 = empty($genero);
		$estado = $_POST['txt_estado'];

	//evaluar si existen espacios
	if($es1 == true  || $es2 == true || $es3 == true || $es4 == true || $es5 == true){
		echo "ERROR No puede contener espacios...";
	}
	else{
		//click para generar curp
		echo "Nombre:  $nombre";
		echo "<br>Paterno:  $paterno";
		echo "<br>Materno:  $materno";
		echo "<br>Estado:  $estado";
		echo "<br>Fecha:  $nacimiento";
		echo "<br>Genero:  $genero";


		curp($nombre,$paterno,$materno,$estado,$nacimiento,$genero);
	}


function curp($nombre,$paterno,$materno,$estado,$nacimiento,$genero){
	//seccion 4 primeras lestras

	$seccion_N1 = substr($paterno,0,1);
	$indiceOM = 0;//primera letra del primer apellido y la primer vocal
	$vocalAP = $paterno;
	$vocal = "";
	for($i = 1; $i < strlen($vocalAP);$i++){
		$aux = $vocalAP[$i];
		if(($aux == "a") || ($aux == "e") || ($aux == "i") || ($aux == "o") || ($aux == "u")){
			$indiceOM = $i;
			$vocal = $aux;
			echo "<br>omitir variable: ".$aux;
			break;
		} 
	}
	$seccion_N2 = substr($materno,0,1);
	$seccion_N3 = substr($nombre,0,1);
	$seccion_Nombre = $seccion_N1.$vocal.$seccion_N2.$seccion_N3;

	//seccion fecha de nacimiento
	$seccion_F = explode("/",$nacimiento);
	$dato1 = $seccion_F[2];//los 2 ultimos numeros del ano de nacimiento
	$dato2 = $seccion_F[1];//numero del mes 
	$dato3 = $seccion_F[0];//numero del dia de nacimiento
	$seccion_Fecha = substr($dato1,2).$dato2.$dato3;

	//seccion genero
	$seccion_Genero = $genero;

	//seccion entidad federativa 2 letras
	$seccion_Entidad = $estado;

	//seccion consonantes
	//apellido paterno
	for($i = 1; $i < strlen($paterno);$i++){//obtenemos las letras de los apellidos
		$aux = $paterno[$i];
		if(($aux != "a") && ($aux != "e") && ($aux != "i") && ($aux != "o") && ($aux != "u")&&($i!=$indiceOM)){
			$letra = $aux;
			break;
		}
	}
	$seccion_C1 = $letra;
	//apellido materno
	for($j = 1; $j < strlen($materno);$j++){
		$aux = $materno[$j];
		if(($aux != "a") && ($aux != "e") && ($aux != "i") && ($aux != "o") && ($aux != "u")){
			$letra = $aux;
			break;
		}
	}
	$seccion_C2 = $letra;
	//nombre
	for($k = 1; $k < strlen($nombre);$k++){
		$aux = $nombre[$k];
		if(($aux != "a") && ($aux != "e") && ($aux != "i") && ($aux != "o") && ($aux != "u")){
			$letra = $aux;
			break;
		}
	}
	$seccion_C3 = $letra;
	
	$seccion_consonantes = $seccion_C1.$seccion_C2.$seccion_C3;

	//seccion siglo
	$seccion_Siglo = 0;

	//seccion renapo numero aleatorio
	$indice = rand(1,9);


	$curp = strtoupper($seccion_Nombre).$seccion_Fecha.$seccion_Genero.$seccion_Entidad.strtoupper($seccion_consonantes).$seccion_Siglo.$indice;


	echo "<br><br>Tu Curp es:  $curp";
}

?>