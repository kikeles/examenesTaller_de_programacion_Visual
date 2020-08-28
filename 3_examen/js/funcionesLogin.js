function verificar_usuario(){
	
}



function verificar_correo(){


}

function registrar_usuario(){
	var nombre = document.getElementById("nombre").value;
	var correo = document.getElementById("correo").value;
	var pass1 = document.getElementById("password1").value;
	var pass2 = document.getElementById("password2").value;
	var tipo = "usuario";

	if(pass1==pass2){

		var parametros = {
			"nombre":nombre,
			"correo":correo,
			"password":pass1,
			"tipo":tipo
		};

		$.ajax({
			type:"POST",
			url:"controladorPHP/registroUsuario.php",
			data:parametros,
			success:function(respuesta){
				/*limpiar campos*/
				$('input[type="text"]').val('');
				$('input[type="password"]').val('');
				$("#mensaje").html(respuesta);	
			}
		});


	}
	else{
		alert("Las contrasenas no coinciden \nvuelve a ingresarlas")
	}


}