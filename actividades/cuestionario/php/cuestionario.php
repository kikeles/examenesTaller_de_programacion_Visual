<?php

	/*importar archivo de la clase para el DOM*/
	require "../../simple-html-dom/simple_html_dom.php";

	$html = file_get_html("../cuestionarioPHP.html");

	$html->find("#puntos_acomulados");
	verificar_seleccion();
	//$contador = 0
	/*$p1 = $_POST['1'];
	$p2 = $_POST['2'];
	$p3 = $_POST['3'];
	$p4 = $_POST['4'];
	$p5 = $_POST['5'];
	$p6 = $_POST['6'];
	$p7 = $_POST['7'];
	$p8 = $_POST['8'];
	$p9 = $_POST['9'];
	$p10 = $_POST['10'];*/



	/*$html->find("#puntos_acomulados",0)->innertext = "1-pregunta: ".$p1;
	echo $html;*/


	/*echo "pregunta 1: ".$p1."<br>";
	echo "pregunta 2: ".$p2."<br>";
	echo "pregunta 3: ".$p3."<br>";
	echo "pregunta 4: ".$p4."<br>";
	echo "pregunta 5: ".$p5."<br>";
	echo "pregunta 6: ".$p6."<br>";
	echo "pregunta 7: ".$p7."<br>";
	echo "pregunta 8: ".$p8."<br>";
	echo "pregunta 9: ".$p9."<br>";
	echo "pregunta 10: ".$p10;*/


function verificar_seleccion(){
	$completo = true;
	for($i=1;$i<=10;$i++){
		$indice = (string)$i;
		$value = $_POST[$indice];
		if($value == ""){
			$completo = false;
			break;
		}
		else{
			//echo "$i-pregunta-".$value."<br>";
			$html->find("#puntos_acomulados",0)->innertext = "$i-pregunta: ".$value."<br>";
			echo $html;
		}
		
	}

	if($completo==true){
		$html->find("#calificacion",0)->innertext ="completo"
		echo $html;
	}
	else{
		$html->find("#calificacion",0)->innertext ="completo"
		echo $html;
	}

}

?>