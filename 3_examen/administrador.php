<?php  
  session_start();

  if($_SESSION['usuario']=="")
  {
    header("Location:login.php");
  }

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Tabla Cuestionario</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">

	<script src="librerias/jquery-3.2.1.min.js"></script>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <script src="js/funciones.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>
  <script src="librerias/select2/js/select2.js"></script>
  <style type="text/css">
    /*boton mostrar respuestas*/
    #derecha{
      float:right;
    }
    #tituloPreguntas{
      text-align: center;
    }
  </style>

</head>
<body>
  <a style="float: right; font-size: 25px;" href="controladorPHP/cerrar.php">Cerrar Sesión</a>
	<div class="container">
		<div id="tabla"></div>
	</div>

	<!-- Modal para registros nuevos -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agrega nueva pregunta</h4>
      </div>
      <div class="modal-body">
        	<label>Pregunta</label>
        	<input type="text" name="" id="pregunta" class="form-control input-sm">
        	<label>Tipo</label>
        	<input type="text" name="" id="tipo" class="form-control input-sm">
        	<label>Puntaje</label>
        	<input type="text" name="" id="puntaje" class="form-control input-sm">
        	<label>Tema</label>
        	<input type="text" name="" id="tema" class="form-control input-sm">
          <label>Estatus</label>
          <input type="text" name="" id="estatus" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
        Agregar
        </button>
       
      </div>
    </div>
  </div>
</div>

<!-- Modal para editar de datos -->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
      </div>
      <div class="modal-body">
      		<label>Pregunta</label>
          <input type="text" name="" id="preguntau" class="form-control input-sm">
          <input type="text" hidden="" name=""
          id="idpregunta">
          <label>Tipo</label>
          <input type="text" name="" id="tipou" class="form-control input-sm">
          <label>Puntaje</label>
          <input type="text" name="" id="puntajeu" class="form-control input-sm">
          <label>Tema</label>
          <input type="text" name="" id="temau" class="form-control input-sm">
          <label>Estatus</label>
          <input type="text" name="" id="estatusu" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
        
      </div>
    </div>
  </div>
</div>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla').load('componentes/tabla.php');
	});
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#guardarnuevo').click(function(){
          pregunta=$('#pregunta').val();
          tipo=$('#tipo').val();
          puntaje=$('#puntaje').val();
          tema=$('#tema').val();
          estatus=$('#estatus').val();
          agregardatos(pregunta,tipo,puntaje,tema,estatus);
        });


        $('#actualizadatos').click(function(){
          actualizaDatos();
        });

    });
</script>


