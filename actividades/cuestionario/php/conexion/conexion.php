<?php
	$host="127.0.0.1";
	$bd="examen";
	$usuario="root";
	$contraseña="";




	try {
	    $mbd = new PDO('mysql:host=127.0.0.1;dbname=examen', $usuario, $contraseña);
	    echo "conexion establecida";
	} catch (PDOException $e) {
	    print "¡Error!: " . $e->getMessage() . "<br/>";
	    die();
	}
	
?>