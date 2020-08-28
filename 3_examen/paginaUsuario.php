<?php  
	session_start();

	if($_SESSION['usuario']=="")
	{
		header("Location:login.php");
	}
	

	require_once"php/conexion.php";
	$conexion=conexion();

	$id = $_SESSION['id_usuario'];
	$sql="select * from usuarios where id = $id";
	$result=mysqli_query($conexion,$sql);
	$datos=mysqli_fetch_row($result);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cuestionario</title>
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script type="text/javascript"   src="JQ/seleccion.js"></script>
	<style type="text/css">
		body{
			background: #F6F9E6;
		}
		
		header{
			width: 100%;
			height: 105px;
			border:2px solid #FFF;
			background: #FAF1B9;
			margin-bottom: 10px;
		}
		
		#examenes{
			float: left;
			/*border: solid;*/
			width: 350px;
			height: 80px;
			padding:10px;
			font-size: 22px;
		}

		#titulo{
			float: left;
			/*border: solid;*/
			width: 460px;
			height: 80px;
			padding:10px;
			text-align: center;
			font-size: 25px;
		}
		
		#informacion{
			float: left;
			/*border: solid;*/
			width: 450px;
			height: 80px;
			padding:10px;
		}

		#container{
			margin-top: 20px;
			margin-left: 150px;
			margin-bottom: 20px;
			width: 1000px;
			height: 500px;
			border:2px solid #000;
			background-color: #E3862D;
			overflow-y: scroll;
		}
		
		.boton{
			font-size: 18px; 
			background: #94C6EA; 
			border-radius: 20px;
			color: #FFF;
			cursor: pointer;
		}

		footer{
			background: #FAF1B9;
			border:2px solid #FFF;
			text-align: center;
		}
	</style>

</head>
<body>
	
	<header>
		<div id="examenes">
			Selecciona tu examen:
			<select id="tema" style="font-size: 17px;">
			<?php
				$arreglo = array();
				$cont = 0;
				$j = 1; 
				$sql="select tema from preguntas";
				$result=mysqli_query($conexion,$sql);
				$num_filas = mysqli_num_rows($result);
				if($num_filas==0){
					echo '<option value="">Ninguno</option>';
				}
				else{

					while($tema=mysqli_fetch_row($result))
					{
						
						if($cont>=1){
							$elementos = 0;
							for ($i=0; $i < $j ; $i++) { 
								
								if($arreglo[$i]==$tema[0]){
									continue;
								}
								else{
									$elementos+=1;
								}
							}

							if($elementos==$j){
								$j+=1;
								$arreglo[$j-1] = $tema[0];
							}

							
						}
						else{
							$arreglo[$j-1] = $tema[0]; 
						}

						$cont+=1;
					}

	 				/*mostrar examenes*/
					for ($i=0; $i < count($arreglo); $i++) {
						$examen = $arreglo[$i]; 
						echo '<option value="'.utf8_encode($examen).'">'.utf8_encode($examen).'</option>';
					}

				}
				
			?>
			</select>
			<br>
			<button class="boton" id="btn_comenzarExamen">Comenzar</button>
			<br>
			<a href="controladorPHP/cerrar.php">Cerrar sesión</a>&nbsp;&nbsp;
			<a href="paginaUsuario.php">Refrescar</a>
		</div>
		<div id="titulo">
			<?php 
			echo "Bienvenido $datos[2]"; ?> <br>
			<div style="text-align: center;margin-left: 10px; font-size: 20px; ">
				Ver mis examenes:
				<select id="examen" style="font-size: 17px;">
				<?php
				$arreglo = array();
				$j = 1; 
				$cont = 0;
				$sql="select examen from evaluacion where id_usuario = $id";
				$result=mysqli_query($conexion,$sql);
				$num_filas = mysqli_num_rows($result);
				if($num_filas==0){
	 				/*no hay examenes que mostrar*/
					echo '<option value="">Ninguno</option>';
				}
				else{
		
					while($tema=mysqli_fetch_row($result))
					{
						
						if($cont>=1){
							$elementos = 0;
							for ($i=0; $i < $j ; $i++) { 
								
								if($arreglo[$i]==$tema[0]){
									continue;
								}
								else{
									$elementos+=1;
								}
							}

							if($elementos==$j){
								$j+=1;
								$arreglo[$j-1] = $tema[0];
							}

							
						}
						else{
							$arreglo[$j-1] = $tema[0]; 
						}

						$cont+=1;
					}

	 				/*mostrar examenes echos por el usuario*/
					for ($i=0; $i < count($arreglo); $i++) {
						$examen = $arreglo[$i]; 
						echo '<option value="'.utf8_encode($examen).'">'.utf8_encode($examen).'</option>';
					}

				}

			?>
					
				</select>
				&nbsp;&nbsp;<button class="boton" id="btn_mostrar">Mostrar</button>
			</div>
		</div>
		<div id="informacion">
			<table border="1" style="text-align: right;float: left; font-size: 18px;">
				<tr>
					<th>Examen</th>
					<th><input type="text" name="examen" style="width: 90px;font-weight: bold;" disabled></th>
					<th>Correctas</th>
					<th><input type="text" name="correctas" style="width: 90px;font-weight: bold;" disabled></th>
				</tr>
				<tr>
					<th>Puntaje obtenido</th>
					<th><input type="text" name="puntaje" style="width: 90px;font-weight: bold;" disabled></th>
					<th>Incorrectas</th>
					<th><input type="text" name="incorrectas" style="width: 90px;font-weight: bold;" disabled></th>
				</tr>
				<tr>
					<th>Calificación</th>
					<th><input type="text" name="calificacion" style="width: 90px;font-weight: bold;" disabled></th>
					<th>Fecha</th>
					<th><input type="text" name="fecha" style="width: 90px;font-weight: bold;" disabled></th>
				</tr>
			</table>

		</div>
	</header>

	<div id="container">
		<div id="cuestionario"></div>
	</div>
	
	<footer>
		<h3>Footer</h3>
	</footer>

</body>
</html>

<script type="text/javascript">
	$('#btn_comenzarExamen').click(function(){

		var tema = $('#tema').val();

		var url = "http://localhost/programacion_visual_IV/3_parcial/examen_3parcial/componentes/setTema.php"

	    $.post(url,{"tema":tema},function(respuesta){
			/*alert(respuesta);*/
			$('#cuestionario').load('tablaCuestionario.php');
		});

	});

	$('#btn_mostrar').click(function(){

		var examen = $('#examen').val();

		var url = "http://localhost/programacion_visual_IV/3_parcial/examen_3parcial/componentes/setTema.php"

	    $.post(url,{"examen":examen},function(respuesta){
			/*alert(respuesta);*/
			$('#cuestionario').load('infoExamenes.php');
		});

	});


</script>