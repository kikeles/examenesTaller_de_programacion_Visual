<?php 
	session_start();

	require_once "../php/conexion.php";
	$conexion=conexion();

 ?>

<div class="row">
	<div class="col-sm-12">
	<div id="tituloRespuestas"><h2>Tabla de edición de respuestas </h2></div>
		<table class="table table-hover table-condensed table-bordered">
		<p>Solo se aceptan los tipos <strong>"correcta"</strong> e <strong>"incorrecta"</strong></p>
		<caption>
			<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
				Agregar Respuesta
				<span class="glyphicon glyphicon-plus"></span>
			</button>
		</caption>
			<?php 
				$id_p = $_SESSION['variable'];
				$sql = "select * from preguntas where id = $id_p";
				$res = mysqli_query($conexion, $sql);
				/* array asociativo */
				$fila = mysqli_fetch_array($res, MYSQLI_ASSOC);
			 ?>
			<tr><td bgcolor="#E5C888" colspan="4">
				<center><?php echo $fila['pregunta'] ?></center>		
				</td>
			</tr>
			<tr style="background-color: #36A8EE;">
				<td>Respuesta</td>
				<td>Tipo</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>

			<?php
				/*include("tabla.php");*/
				$sql = "select * from respuestas where id_preguntas = $id_p";

				$result=mysqli_query($conexion,$sql);
				while($ver=mysqli_fetch_row($result)){ 

					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".$ver[3];
			 ?>

			<tr>
				<td><?php echo utf8_encode($ver[2]) ?></td>
				<td><?php echo utf8_encode($ver[3]) ?></td>
				<td>
					<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaformR('<?php echo $datos ?>')">
						
					</button>
				</td>
				<td>
					<button class="btn btn-danger glyphicon glyphicon-remove" 
					onclick="preguntarSiNoR('<?php echo $ver[0] ?>')">
						
					</button>
				</td>
			</tr>
			<?php 
		} /*cierre del while */
			?>
		</table>
	</div>
</div>

