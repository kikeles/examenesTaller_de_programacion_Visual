<?php 
	session_start();
	$_SESSION['variable'] = 0;
	require_once "../php/conexion.php";
	$conexion=conexion();

 ?>
<div class="row">
	<div class="col-sm-12">
	<div id="tituloPreguntas"><h2>Tabla de edición de preguntas </h2></div>
		<table class="table table-hover table-condensed table-bordered">
		<caption>
			<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
				Agregar Pregunta
				<span class="glyphicon glyphicon-plus"></span>
			</button>
			<div id="derecha">
				<button class="btn btn-secondary glyphicon glyphicon-file" id="btn_id" >
					<a href="http://localhost/programacion_visual_IV/2_parcial/examen_2parcial/principalRespuestas.php" target="_blank">Mostrar
					</a>
			
				</button>
			</div>
		</caption>
			<tr style="background-color: #E5C888;">
				<td>Pregunta</td>
				<td>Tipo</td>
				<td>Puntaje</td>
				<td>Tema</td>
				<td>Estatus</td>
				<td>Editar</td>
				<td>Eliminar</td>
				<td>Respuestas
				</td>
			</tr>

			<?php 
				$sql = "select * from preguntas";

				$result=mysqli_query($conexion,$sql);
				while($ver=mysqli_fetch_row($result)){ 
					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3]."||".
						   $ver[4]."||".
						   $ver[5];
			 ?>

			<tr>
				<td><?php echo utf8_encode($ver[1]) ?></td>
				<td><?php echo utf8_encode($ver[2]) ?></td>
				<td><?php echo utf8_encode($ver[3]) ?></td>
				<td><?php echo utf8_encode($ver[4]) ?></td>
				<td><?php echo utf8_encode($ver[5]) ?></td>
				<td>
					<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>');">
					</button>
				</td>
				<td>
					<button class="btn btn-danger glyphicon glyphicon-remove" 
					onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
					</button>
				</td>
				<td>
					<input type="radio" name="id_p" id="id_p" value="<?php echo $ver[0] ?>">
				</td>
			</tr>
			<?php 
		} /*cierre del while */
			?>
		</table>
	</div>
</div>



<script type="text/javascript">
  $(document).ready(function(){
    $("#btn_id").click(function(){
    	var id = 0;
        var porNombre = document.getElementsByName("id_p");
        var resultado="ninguno";  
        for(var i=0;i<porNombre.length;i++)
        {
          if(porNombre[i].checked)
          resultado=porNombre[i].value;
        }

		var ID = resultado;

        console.log("id =", ID);
        if(ID=="ninguno"){
        	alert("Selecciona una pregunta")
        	return false;
        }
        else{
        	var url = "http://localhost/programacion_visual_IV/2_parcial/examen_2parcial/componentes/setID.php"

	        $.post(url,{"IDpregunta":ID},function(respuesta){
				/*alert(respuesta);*/
			});

        }
        

        /*$.ajax({

        	url:"http://localhost/programacion_visual_IV/2_parcial/examen_2parcial/componentes/setID.php",
			type:"POST",
			data:{este: id},
			success:function(r){
				if(r==1){
					window.location.href = 'http://localhost/programacion_visual_IV/2_parcial/examen_2parcial/componentes/getID.php';
					se debe poner la direccion de la pagina a enviar
					alert("se a agregado con exito :)");
				}else{
					alert("Algo fallo en el servidor :(");
				}
			}
		});*/
       
    });
  });
</script>

