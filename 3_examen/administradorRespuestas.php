<?php 
  session_start();
  
  if($_SESSION['usuario']=="")
  {
    header("Location:login.php");
  }

  $id = $_SESSION['variable'];

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
  <script src="js/funcionesRespuestas.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>
  <script src="librerias/select2/js/select2.js"></script>
  
  <style type="text/css">
    #tituloRespuestas{
      text-align: center;
    }
  </style>

</head>
<body>
  
	<div class="container">
		<div id="tablarespuesta"></div>
	</div>

	<!-- Modal para registros respuestas nuevas -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agrega nueva respuesta</h4>
      </div>
      <div class="modal-body">
          <input type="hidden" name="" id="id_pregunta" value="<?php echo $id ?>">
        	<label>Respuesta</label>
        	<input type="text" name="" id="respuesta" class="form-control input-sm">
        	<label>Tipo</label>
        	<input type="text" name="" id="tipo" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarRespuesta">
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
          <input type="text" hidden="" name="" id="id_respuesta">
          <input type="hidden" name="" id="id_preguntau" value="<?php echo $id ?>">
      		<label>Respuesta</label>
          <input type="text" name="" id="respuestau" class="form-control input-sm">
          <label>Tipo</label>
          <input type="text" name="" id="tipou" class="form-control input-sm">
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
		$('#tablarespuesta').load('componentes/tablaRespuestas.php');
	});
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#guardarRespuesta').click(function(){
          id_p = $('#id_pregunta').val();
          console.log("id_p=",id_p);
          respuesta=$('#respuesta').val();
          tipo=$('#tipo').val();
          agregardatosR(id_p,respuesta,tipo);
        });


        $('#actualizadatos').click(function(){
          actualizaDatosR();
        });

    });
</script>