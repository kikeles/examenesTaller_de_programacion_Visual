<?php
	
	/*al final del archivo.php pones ?accion=select_all para que imprima la accion
	ejemplo
	http://localhost/programacion_visual_IV/2_parcial/php/preguntas.php?accion=select_all
	*/

	require_once("conexion/conexion.php");


	if (isset($_GET['accion'])) {
		# code...
		$accion = $_GET['accion'];

		switch ($accion) {
			case 'insert into':
				# code...
				break;
			case 'delete':
				# code...
				break;
			case 'update':
				# code...
				break;
			case 'select_id':
				$sql = "select * from preguntas where id = :id";
				break;
			case 'select_all':
				$sql = "select * from preguntas";

				$sentencia = $mbd->prepare($sql);
				if ($sentencia->execute()) {
					 while ($fila = $sentencia->fetch()) {
					 	echo "<table>";
						echo "<tr>";
						echo "<th>CustomerID</th>";
						echo "<td>".$fila[0]."</td>";
						echo "<th>Pregunta</th>";
						echo "<td>".$fila[1]."</td>";
						echo "<th>Tipo</th>";
						echo "<td>".$fila[2]."</td>";
						echo "<th>Puntaje</th>";
						echo "<td>".$fila[3]."</td>";
						echo "<th>Tema</th>";
						echo "<td>".$fila[4]."</td>";
						echo "<th>Estatus</th>";
						echo "<td>".$fila[5]."</td>";
					  }


				}

				break;
			default:
				# code...
				break;
		}
	 
	}

?>