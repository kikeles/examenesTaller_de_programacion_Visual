<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funcionesLogin.js"></script>

	<style type="text/css">
		body{
			background: #F6F9E6;
		}
		
		header{
			width: 100%;
			height: 100px;
			border:2px solid #FFF;
			background: #D4D6B2;
			margin-bottom: 20px;
			text-align: center;
			padding:10px;
		}
		

		#login{
			width: 100%;
			height: 450px;
			margin-bottom: 20px;
			background-color: #ECC47F;
			padding: 40px;
		}

		#iniciarSesion{
			font-size: 30px;
		}
		
		.texto{
			font-size: 20px;	
		}

		#registroAlumno{
			margin:auto;
			padding-top: 40px;
			font-size: 30px;
		}
		
		/*#registroProfesor{
			float: left;
			padding-top: 80px;
			font-size: 30px;
			margin-left: 120px;
		}*/

		.boton{
			font-size: 20px; 
			background: #DE8F07; 
			/*border-radius: 10px;*/
			color: #FFF;
			cursor: pointer;
		}

		footer{
			background: #D4D6B2;
			border:2px solid #FFF;
			font-size: 20px;
			text-align: center;
		}
	</style>
	
</head>
<body>
	<header>
		<h1>Examenes en linea</h1>
	</header>

	<div id="login">
		<form id="iniciarSesion" method="POST" action="controladorPHP/logear.php">
			<table id="iniciarSesion" style="margin:auto; background: #4494DF; color: #FFF;">
				<tr>
					<th colspan="2">Iniciar sesión</th>
				</tr>
				<tr>
					<th style="text-align: right;">Usuario:</th>
					<th><input type="text" name="usuario" id="usuario"  class="texto" required></th>
				</tr>
				<tr>
					<th>Contraseña:</th>
					<th><input type="password" name="password" id="password" class="texto" autocomplete="password" required></th>
				</tr>
				<tr>
					<th colspan="2"><button class="boton" name="btn_ingresar">Ingresar</button></th>
				</tr>
			</table>
		</form><!--cierre del formulario iniciar sesion-->
		<br>
		<form id="registroAlumno">
			<table style="margin:auto;background: #DF7044; color: #000;">
				<tr>
					<th colspan="2">Registro de usuarios</th>
				</tr>
				<tr>
					<th style="text-align: right;">Nombre:</th>
					<th><input type="text" name="" id="nombre" class="texto" pattern="[A-Za-z0-9_-]{2,15}" required></th>
				</tr>
				<tr>
					<th style="text-align: right;">Correo:</th>
					<th><input type="text" name="" id="correo" class="texto" required></th>
				</tr>
				<tr>
					<th style="text-align: right;">Contraseña:</th>
					<th><input type="password" name="password1" id="password1" autocomplete="password" class="texto" pattern="[A-Za-z0-9_-]{1,15}" required></th>
				</tr>
				<tr>
					<th>Verificar contraseña:</th>
					<th><input type="password" name="password2" id="password2" autocomplete="password" class="texto" pattern="[A-Za-z0-9_-]{1,15}" required></th>
				</tr>
				<tr>
					<th colspan="2"><button class="boton" onclick="registrar_usuario()">Registrarse</button></th>
				</tr>
				<tr>
					<th colspan="2"><div id="mensaje"></div></th>
				</tr>
			</table>
		</form><!--cierre del formulario registro-->
		
	</div><!--cierre del login-->

	<footer>
		Footer
	</footer>
</body>
</html>