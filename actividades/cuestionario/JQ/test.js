/*variables globales*/
var oportunidad = 0;
var puntos_acomulados = 0;
var listaPreguntas = [];
var listaPreguntas2 = [];
var listaPreguntas3 = [];
var preguntasCorrectas = [];
$(document).ready(function(){
	$('#btn_jquery').click(function(){
		oportunidad += 1;
	    if(oportunidad==1){
	    	var completo = verificador_de_seleccion();
	    	if(completo==true){
	    		$('#btn_php').attr('disabled',true);
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
				    verificar_seleccion(seleccion,4,pregunta,indiceXP);
				    contador+=1;
		    	}
		    	console.log("oportunidad = "+oportunidad);
		    	console.log("respuestas erroneas")
		    	for(var i =0;i<listaPreguntas.length;i++){
		    		console.log(listaPreguntas[i])
		    	}

		    	alert("Primer intento \nPuntos: "+puntos_acomulados);
		    	if(preguntasCorrectas.length == 10){
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
				    verificar_seleccion(seleccion,2,pregunta,indiceXP);
				   	contador+=1;
				
				}
				alert("Segundo intento \nPuntos: "+puntos_acomulados);
				if(preguntasCorrectas.length == 10){
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
					verificar_seleccion(seleccion,1,pregunta,indiceXP);
					contador+=1;
				}
				
				alert("Tercer intento \nPuntos: "+puntos_acomulados);
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
	})

});

var x = 0; /*indice para el arreglo respuestasCorrectas*/
var indice = 0; /*indice para el arreglo listaPreguntas*/
function verificar_seleccion(respuesta,suma,pregunta,idP){
	if (respuesta == "bien"){
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
	while(contador<=10){
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
	document.getElementById('puntos_acomulados').innerHTML="Puntos acomulados-->["+puntos_acomulados+"]";

	var calificacion = (puntos_acomulados*100)/40;
	document.getElementById('calificacion').innerHTML="Tu calificacion es de-->["+calificacion+"]";
}

/*efecto desplegable en las preguntas*/
/*$(document).ready(function(){
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
});*/
