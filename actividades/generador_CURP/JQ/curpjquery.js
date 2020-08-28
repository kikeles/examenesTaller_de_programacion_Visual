$(document).ready(function(){
	//funcion al enviar datos del formulario
	$("#btn_boton").click(function(){
		var es1 = false,es2 = false,es3 = false,es4 = false;
		var nombre = $("#txt_nombre").val();
		es1 = validarEspacios(nombre);
		var paterno = $("#txt_paterno").val();
		es2 = validarEspacios(paterno);
		var materno = $("#txt_materno").val();
		es3 = validarEspacios(materno);
		var nacimiento = $("#txt_nacimiento").val();
		es4 = validarEspacios(nacimiento);
		var estado = $("#txt_estado").val();

		//var genero = $("input:radio").val();
		var porNombre = document.getElementsByName("txt_genero");
		var resultado="ninguno";  
	    for(var i=0;i<porNombre.length;i++)
	    {
	        if(porNombre[i].checked)
	        resultado=porNombre[i].value;
	    }
	    var genero = resultado;

	    //evaluar si existen espacios
		if(es1 == true  || es2 == true || es3 == true || es4 == true){
			alert ("No puede contener espacios");
			//limpiar campos
			document.getElementById('txt_nombre').value = "";
			document.getElementById('txt_paterno').value = "";
			document.getElementById('txt_materno').value = "";
			document.getElementById('txt_nacimiento').value = "";
			document.getElementById('mostrar_curp').innerHTML="";
		}
		else{
			alert ("Ok tu CURP se ha generado");//click para generar curp
			console.log("Nombre: "+nombre);
			console.log("Paterno: "+paterno);
			console.log("Materno: "+materno);
			console.log("Estado:  "+estado);
			console.log("Fecha: "+nacimiento);
			console.log("Genero: "+genero);

			//limpiar campos
			document.getElementById('txt_nombre').value = "";
			document.getElementById('txt_paterno').value = "";
			document.getElementById('txt_materno').value = "";
			document.getElementById('txt_nacimiento').value = "";

			curp(nombre,paterno,materno,estado,nacimiento,genero);
		}

	})
});

function validarEspacios(cadena){
	var noValido = /\s/;
    var texto = cadena;//tomamos en una variable
	if(noValido.test(texto)){ // se chequea el regex de que el string no tenga espacio
	    return true; 
	}

}

function curp(nombre,paterno,materno,estado,nacimiento,genero){
	//seccion 4 primeras lestras
	var seccion_N1 = paterno.substring(0,1);
	var vocalAP = paterno.split("");
	var indiceOM = 0;//primera letra del primer apellido y la primer vocal
	var vocal = "";
	for(var i = 1; i < vocalAP.length;i++){
		var aux = vocalAP[i];
		if((aux == "a") || (aux == "e") || (aux == "i") || (aux == "o") || (aux == "u")){
			indiceOM = i;
			vocal = aux;
			console.log("omitir variable: "+aux);
			break;
		} 
	}
	var seccion_N2 = materno.substring(0,1);
	var seccion_N3 = nombre.substring(0,1);
	var seccion_Nombre = seccion_N1+vocal+seccion_N2+seccion_N3;

	//seccion fecha de nacimiento
	var seccion_F = nacimiento.split("/");
	var dato1 = seccion_F[2].substring(2);//los 2 ultimos numeros del ano de nacimiento
	var dato2 = seccion_F[1];//numero del mes 
	var dato3 = seccion_F[0];//numero del dia de nacimiento
	var seccion_Fecha = dato1+dato2+dato3;

	//seccion genero
	var seccion_Genero = genero;

	//seccion entidad federativa 2 letras
	var seccion_Entidad = estado;

	//seccion consonantes
	var letra ="", aux = "";
	var i = 0;
	var arreglo1 = paterno.split("");
	for(i = 1; i < arreglo1.length;i++){
		aux = arreglo1[i];
		if((aux !== "a") && (aux !== "e") && (aux !== "i") && (aux !== "o") && (aux !== "u")&&(i != indiceOM)){
			letra = aux;
			break;
		}
	}
	var seccion_C1 = letra;

	var arreglo2 = materno.split("");
	for(var j = 1; j < arreglo2.length;j++){
		aux = arreglo2[j];
		if((aux !== "a") && (aux !== "e") && (aux !== "i") && (aux !== "o") && (aux !== "u")){
			letra = aux;
			break;
		}
	}
	var seccion_C2 = letra;

	var arreglo3 = nombre.split("");
	for(var k = 1; k < arreglo3.length;k++){
		aux = arreglo3[k];
		if((aux !== "a") && (aux !== "e") && (aux !== "i") && (aux !== "o") && (aux !== "u")){
			letra = aux;
			break;
		}
	}
	var seccion_C3 = letra;
	var seccion_Consonantes = seccion_C1+seccion_C2+seccion_C3;

	//seccion siglo
	var seccion_Siglo = 0;

	//seccion renapo numero aleatorio
	var aleatorio = [1,2,3,4,5,6,7,8,9];
	var indice = Math.floor(Math.random()*aleatorio.length);


	var curp = seccion_Nombre.toUpperCase()+seccion_Fecha+seccion_Genero+seccion_Entidad+
	seccion_Consonantes.toUpperCase()+seccion_Siglo+indice;


	document.getElementById('mostrar_curp').innerHTML="Tu CURP:<br>"+curp;
}



