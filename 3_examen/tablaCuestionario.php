<?php 
	session_start();
  	$id_user = $_SESSION['id_usuario'];
  	$tema = $_SESSION['tema'];
  	
	require_once "php/conexion.php";
	$conexion=conexion();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cuestionario</title>
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script type="text/javascript"   src="JQ/seleccion.js"></script>

	<style type="text/css">
		.cajaPrincipal{
			background-color: #E3862D;
			border: solid #E3862D;
			font-size: 25px;
		}

		.botones{
			width: 20%;
			padding: 10px;
			background-color: #68A1EE;
			font-size: 25px;
			cursor: pointer;
			-webkit-box-sizing: border-box;
			-moz-box-sizing:border-box;
			box-sizing: border-box;
		}
		/*eventos del mouse*/
		.div1:hover,.div2:hover,.div3:hover,.div4:hover,.div5:hover,.div6:hover,
		.div7:hover,.div8:hover,.div9:hover,.div10:hover{
			background-color: #68A1EE;
		}

		/*seleccion del cursor al pasar el mause*/
		.div1,.div2,.div3,.div4,.div5,.div6,.div7,.div8,.div9,.div10{
			border: groove;
			border-radius: 5px;
			border-color: red;
			cursor: pointer;
		}
		/*div seleccion de preguntas*/
		#num1,#num2,#num3,#num4,#num5,#num6,#num7,#num8,#num9,#num10{
			display: none;
		}
	</style>

</head>
<body>
	<div class="cajaPrincipal">	
		<?php
		$x_puntos = 0;
		$numPreguntas = 0; 
		echo "<center><h3>Examen de $tema</h3></center>";
		$sqlPreguntas = "select * from preguntas where tema ='".utf8_decode($tema)."'";
		$resultPre=mysqli_query($conexion,$sqlPreguntas);
		$i = 1;
		while($verP=mysqli_fetch_row($resultPre)){
			/*concatenar en una linea los resultados*/ 
			$datosP=$verP[0]."||".
					$verP[1]."||".
					$verP[2]."||".
					$verP[3]."||".
					$verP[4]."||".
					$verP[5];

			echo "<div class=\"div$i\">$i. ".utf8_encode($verP[1])."</div>";
			echo "<div id=\"num$i\">";
			$j = 0;
			$sqlRespuestas = "select * from respuestas where id_preguntas = ".$verP[0];
			$resultRes=mysqli_query($conexion,$sqlRespuestas);
			while ($verR=mysqli_fetch_row($resultRes)) {
				$datosP=$verR[0]."||".
						$verR[1]."||".
						$verR[2]."||".
						$verR[3];
				
				echo "<input type=\"radio\" class=\"$i-$j\" id=\"$i\" name=\"$i\" value=\"$verR[3]\">$verR[2]<br>";

				$j+=1;
			}/*while respuestas*/
			echo "</div>";
			echo "<br><br>";
			$x_puntos+=$verP[3];
			$numPreguntas+=1;
			$i+=1;
		}/*while preguntas*/
		$puntos = $x_puntos/$numPreguntas;

		echo "  <input type=\"hidden\" id=\"numPreguntas\" value=\"$numPreguntas\">  ";
		echo "  <input type=\"hidden\" id=\"tema\" value=\"$tema\">  ";
		echo "  <input type=\"hidden\" id=\"puntos\" value=\"$puntos\">  ";
		echo "  <input type=\"hidden\" id=\"id_usuario\" value=\"$id_user\">  ";
		?>
		<center><input type="button" class="botones" id="btn_jquery" value="Enviar"></center>
		<br><br>
	</div>
	
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		var contar = 1;
		$('#btn_jquery').click(function(){
			if(contar==1){
				var numPreguntas = $('#numPreguntas').val();
				var tema = $('#tema').val();
				var puntos = $('#puntos').val();
				var id = $('#id_usuario').val();

				enviar(numPreguntas,tema,puntos,id);
			}
			else{
				calcular();
			}
			contar+=1;
		});

	});
</script>