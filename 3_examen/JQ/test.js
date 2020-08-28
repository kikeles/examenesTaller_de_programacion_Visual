/*variables globales*/
var oportunidad = 0;
var puntos_acomulados = 0.0;
var listaPreguntas = [];
var listaPreguntas2 = [];
var listaPreguntas3 = [];
var preguntasCorrectas = [];
var numPreguntas = 0;
var examen = "";
var puntos = 0;
var id_usuario = 0;
function calcular(){
		oportunidad += 1;
	    if(oportunidad==1){
	    	var completo = verificador_de_seleccion();
	    	if(completo==true){
		    	var contador = 1;
		    	var salir = false;
		    	var indiceXP = 0;
		    	while( (contador<=10)&&(salir!=true)){
		    		var pregunta = contador.toString();
		    		var seleccion = "";
					var porNombre = document.getElementsByName(pregunta); 
				    for(var i=0;i<porNombre.length;i++)
				    {
				        if(porNombre[i].checked){
				        	seleccion=porNombre[i].value;
				        	indiceXP = i;
				        }

				    }

				    if(seleccion==""){
				    	salir=true;
				    }
				    else{
				    	verificar_seleccion(seleccion,puntos,pregunta,indiceXP);
				    }
				    
				    contador+=1;
		    	}
		    	console.log("oportunidad = "+oportunidad);
		    	console.log("respuestas erroneas")
		    	for(var i =0;i<listaPreguntas.length;i++){
		    		console.log(listaPreguntas[i])
		    	}

		    	alert("Primer intento \nPuntos: "+puntos_acomulados);
		    	if(preguntasCorrectas.length == numPreguntas){
		    		$('#btn_jquery').attr('disabled',true);
			    	mostrar_resultado();
			    	oportunidad = 4;
		    	}
		    }
		    else{
		    	alert("No dejar preguntas sin seleccionar");
				oportunidad = 0;
		    }
			
		}
		else if(oportunidad==2){/*segunda oportunidad de elejir respuesta usuario*/
			indice = 0;
			var completo = verificador_de_seleccion();
			if(completo==true){
				var valor_puntos = 0.0;
				valor_puntos = parseFloat(puntos)/2;
				var contador = 0;
		    	var salir = false;
		    	var indiceXP = 0;
		    	while((contador<listaPreguntas.length)&&(salir!=true)){
		    		var pregunta = listaPreguntas[contador];
		    		var seleccion = "";
					var porNombre = document.getElementsByName(pregunta); 
				    for(var i=0;i<porNombre.length;i++)
				    {
				        if(porNombre[i].checked){
				        	seleccion=porNombre[i].value;
				        	indiceXP = i;
				        }
				    }

				    if(seleccion==""){
				    	salir=true;
				    }
				    else{
				    	verificar_seleccion(seleccion,valor_puntos,pregunta,indiceXP);
				    }
				
				   	contador+=1;
				
				}
				alert("Segundo intento \nValor por pregunta de "+puntos.toString()+"/2 = "+String(valor_puntos.toFixed(2))+" \nPuntos:"+String(puntos_acomulados));
				if(preguntasCorrectas.length == numPreguntas){
					$('#btn_jquery').attr('disabled',true);
			    	mostrar_resultado();
			    	oportunidad = 4;
		    	}
			}
			else{
				alert("No dejar preguntas sin seleccionar");
				oportunidad = 1;
			}
		}
		else if(oportunidad==3){
			indice = 0;
			var completo = verificador_de_seleccion();
			if(completo==true){
				var valor_puntos = 0.0;
				valor_puntos = parseFloat(puntos)/3;
				var contador = 0;
		    	var salir = false;
		    	var indiceXP = 0;
		    	while((contador<listaPreguntas2.length)&&(salir!=true)){
		    		var pregunta = listaPreguntas2[contador];
		    		var seleccion = "";
					var porNombre = document.getElementsByName(pregunta); 
				    for(var i=0;i<porNombre.length;i++)
				    {
				        if(porNombre[i].checked){
					        seleccion=porNombre[i].value;
					        indiceXP = i;
					    }
				    }

				    if(seleccion==""){
				    	salir=true;
				    }
				    else{
				    	verificar_seleccion(seleccion,valor_puntos,pregunta,indiceXP);
				    }
					
					contador+=1;
				}
				
				alert("Tercer intento \nValor por pregunta de "+puntos.toString()+"/3 = "+String(valor_puntos.toFixed(2))+" \nPuntos:"+String(puntos_acomulados));
				$('#btn_jquery').attr('disabled',true);
				mostrar_resultado();
			}
			else{
				alert("No dejar preguntas sin seleccionar");
				oportunidad = 2;
			}
		}
		else{
			mostrar_resultado();
		}
}


function enviar(num,tema,p,id_user){
	numPreguntas = parseInt(num);
	examen = tema;
	puntos = parseInt(p);
	id_usuario = Number(id_user);

	calcular();
}


var x = 0; /*indice para el arreglo respuestasCorrectas*/
var indice = 0; /*indice para el arreglo listaPreguntas*/
function verificar_seleccion(respuesta,suma,pregunta,idP){
	if (respuesta == "correcta"){
		preguntasCorrectas[x] = pregunta;
		x+=1;
   		puntos_acomulados += suma;
   		desabilitar_preguntas(pregunta);
	}
	else{
		$(".div"+pregunta).css({"background-color":"#E35233"});
		$("#num"+pregunta).css({"background-color":"#E35233"});
		/*dejar en blanco la seleccion del radio button seleccionado por el usuario*/
		$('input[name='+pregunta+']').prop('checked', false);
		/*desabilitar radio button seleccionado*/
		$("."+pregunta+"-"+idP).attr('disabled',true);
		if(oportunidad == 1){
			listaPreguntas[indice] = pregunta;
			indice+=1;
		}else if(oportunidad==2){
			listaPreguntas2[indice] = pregunta;
			indice+=1;
		}
		if(oportunidad==3){
			listaPreguntas3[indice] = pregunta;
			indice+=1;
		}
	}

}

function verificador_de_seleccion(){
	var completo = true;
	var contador = 1;

	while(contador<=numPreguntas){
		var pregunta = contador.toString();
		var seleccion = "";
		var porNombre = document.getElementsByName(pregunta); 
		for(var i=0;i<porNombre.length;i++)
		{
		    if(porNombre[i].checked)
			seleccion=porNombre[i].value;
		}
		if(seleccion==""){
			completo = false;
			break;
		}
		contador+=1;
	}

	return completo;
}


function desabilitar_preguntas(indiceP){
	/*var numP = "#"+indiceP;*/
	$("#num"+indiceP+" input:radio").attr('disabled',true);
	$(".div"+indiceP).css({
		"background-color":"#F7DEBC",
		"opacity":'0.50'
	});
	$("#num"+indiceP).css({
		"background-color":"#F7DEBC",
		"opacity":'0.50'
	});
}


function mostrar_resultado(){
	var puntaje = puntos_acomulados.toFixed(2);
	/*calificacion*/
	var numPuntos=(numPreguntas*puntos)
	var calificacion = (puntos_acomulados*100)/numPuntos;
	/*incorrectas*/
	var incorrectas = numPreguntas-preguntasCorrectas.length;

	/*obtener la fecha actual*/
	var hoy = new Date();
	var dd = hoy.getDate();
	dd = addZero(dd);
	var mm = hoy.getMonth()+1;
	mm = addZero(mm);
	var yyyy = hoy.getFullYear();


	document.getElementsByName("examen")[0].value = examen;
	document.getElementsByName("puntaje")[0].value = puntaje;
	document.getElementsByName("calificacion")[0].value = calificacion.toFixed(2);
	document.getElementsByName("correctas")[0].value = preguntasCorrectas.length;
	document.getElementsByName("incorrectas")[0].value =  incorrectas;
	document.getElementsByName("fecha")[0].value = dd+"/"+mm+"/"+yyyy

	var parametros = {
		"id_usuario":id_usuario,
		"examen":examen,
		"correctas":preguntasCorrectas.length,
		"incorrectas":incorrectas,
		"puntuacion":puntaje,
		"calificacion":calificacion.toFixed(2),
	};

	$.ajax({
		type:"POST",
		url:"controladorPHP/guardarEvaluacion.php",
		data:parametros,
		success:function(r){
			if(r==1){
				alert("Se guardo")
			}
			else{
				alert("Algo Fallo :(")
			}
		}

	});



}

function addZero(i) {
    if (i < 10) {
        i = '0' + i;
    }
    return i;
}

/*efecto desplegable en las preguntas*/
$(document).ready(function(){
	$(".div1").click(function(){
		$("#num1").slideToggle("slow");
	});
	$(".div2").click(function(){
    	$("#num2").slideToggle("slow");
	});
	$(".div3").click(function(){
    	$("#num3").slideToggle("slow");
	});
	$(".div4").click(function(){
    	$("#num4").slideToggle("slow");
	});
	$(".div5").click(function(){
    	$("#num5").slideToggle("slow");
	});
	$(".div6").click(function(){
    	$("#num6").slideToggle("slow");
	});
	$(".div7").click(function(){
    	$("#num7").slideToggle("slow");
	});
	$(".div8").click(function(){
    	$("#num8").slideToggle("slow");
	});
	$(".div9").click(function(){
    	$("#num9").slideToggle("slow");
	});
	$(".div10").click(function(){
    	$("#num10").slideToggle("slow");
	});
});
