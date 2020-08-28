<?php  
	require_once"../php/conexion.php";
	$conexion = conexion();

	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$pass = $_POST['password'];
	$tipo = $_POST['tipo'];


	/*verificar si existe este correo en la base de datos*/
	$sqlCorreo = "select correo from usuarios where correo = '$correo' ";
	$result=mysqli_query($conexion,$sqlCorreo);
	$ver=mysqli_fetch_row($result);

	
	
	if(empty($ver))
	{
		$passwd_cifrado = password_hash($pass, PASSWORD_DEFAULT);

		$sql = "INSERT into usuarios (correo,nombre,passwd,tipo) values('$correo','$nombre','$passwd_cifrado','$tipo'); ";

		if($result=mysqli_query($conexion,$sql))
		{
			echo "<script>alert('Se a guardado con exito')</script>";
		}
	}
	else
	{
		echo "<script>alert('El correo $ver[0] ya existe')</script>";
	}


?>