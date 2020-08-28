var curso = "";
var horaXsemana = 0;
var materia = "";
$(document).ready(function(){
	//formulario 1
	$('#btn_siguiente_1').click(function(){
		materia = $('#txt_materia').val();
		
		horaXsemana = $('#txt_hora').val();

		var porNombre = document.getElementsByName('radio_boton');
		var resultado="ninguno";  
	    for(var i=0;i<porNombre.length;i++)
	    {
	        if(porNombre[i].checked)
	        resultado=porNombre[i].value;
	    }
	    curso = resultado;

	    validarSeccion_1(materia,horaXsemana,curso);
	})

	//formulario 2
	$('#btn_calcular_faltas').click(function(){
		//seleccionar el ciclo
	    if(curso === "semestre"){
	    	var porNombre = document.getElementsByName('radio_ciclo');
			var resultado="ninguno";  
		    for(var i=0;i<porNombre.length;i++)
		    {
		        if(porNombre[i].checked)
		        resultado=porNombre[i].value;
		    }
		    var seleccion = resultado;
		 
	    	if((seleccion === "ciclo A")){
				var mes1 = $('#txt_marzo').val();
				var mes2 = $('#txt_abril').val();
				var mes3 = $('#txt_mayo').val();
				var mes4 = $('#txt_junio').val();
				var mes5 = $('#txt_julio').val();
				var mes6 = $('#txt_agosto').val();
				
				validarSeccion_2(mes1,mes2,mes3,mes4,mes5,mes6);
			
			}
			else if(seleccion === "ciclo B"){
				var mes1 = $('#txt_septiembre').val();
				var mes2 = $('#txt_octubre').val();
				var mes3 = $('#txt_noviembre').val();
				var mes4 = $('#txt_diciembre').val();
				var mes5 = $('#txt_enero').val();
				var mes6 = $('#txt_febrero').val();

				validarSeccion_2(mes1,mes2,mes3,mes4,mes5,mes6);

	    	}
	    }	
	    else{
	    	var porNombre = document.getElementsByName('radio_ciclo');
			var resultado="ninguno";  
		    for(var i=0;i<porNombre.length;i++)
		    {
		        if(porNombre[i].checked)
		        resultado=porNombre[i].value;
		    }
		    var seleccion = resultado;
		    
	    	if(seleccion === "ciclo A"){
				var mes1 = $('#txt_marzo').val();
				var mes2 = $('#txt_abril').val();
				var mes3 = $('#txt_mayo').val();
				var mes4 = $('#txt_junio').val();
				var mes5 = $('#txt_julio').val();
				var mes6 = $('#txt_agosto').val();
				
				validarSeccion_2(mes1,mes2,mes3,mes4,mes5,mes6);
			}
			else if(seleccion === "ciclo B"){
				var mes1 = $('#txt_septiembre').val();
				var mes2 = $('#txt_octubre').val();
				var mes3 = $('#txt_noviembre').val();
				var mes4 = $('#txt_diciembre').val();
				var mes5 = $('#txt_enero').val();
				var mes6 = $('#txt_febrero').val();
				
				validarSeccion_2(mes1,mes2,mes3,mes4,mes5,mes6);
			}

	    }

	})

	$('#btn_calcular_promedio').click(function(){
			var parcial1 = $('#txt_parcial_1').val();
			var parcial2 = $('#txt_parcial_2').val();
			var parcial3 = $('#txt_parcial_3').val();

			var validacion = validarSeccion_3(parcial1,parcial2,parcial3);

			if(validacion == true){
				var p = promedioGeneral(parcial1,parcial2,parcial3);

				console.log("promedio: "+p)
				if(p >= 70){
				document.getElementById('mostrar_calificacion').innerHTML="Tu calificación: "+p.toFixed(2)+" ...[APROBADO]";
				}
			    else if(p < 70){
				document.getElementById('mostrar_calificacion').innerHTML="Tu calificación: "+p.toFixed(2)+" ...[REPROBADO]";
				}
			}
			
	})
	

});


function validarSeccion_1(mat,hXs,cur){
	if(cur==="semestre"){
		if((mat>=0)||(mat<=0)){
			alert("Campo [Materia] ERROR - no poner numeros \n ingresa el nombre de la materia");
		}
		else if(hXs==-1){
			alert("Campo [Horas por semana] ERROR - No poner numero negativo ni letras");
		}
		else if((hXs>4)||(hXs<3)){
			alert("Solo se aceptan valores entre 3 y 4 [SEMESTRE]");
		}
		else{
			$('#txt_marzo').attr('disabled',false);
		    $('#txt_abril').attr('disabled',false);
		    $('#txt_mayo').attr('disabled',false);
		    $('#txt_junio').attr('disabled',false);
		    $('#txt_julio').attr('disabled',false);
		    $('#txt_agosto').attr('disabled',false);
		    $('#txt_septiembre').attr('disabled',false);
		    $('#txt_octubre').attr('disabled',false);
		    $('#txt_noviembre').attr('disabled',false);
		    $('#txt_diciembre').attr('disabled',false);
		    $('#txt_enero').attr('disabled',false);
		    $('#txt_febrero').attr('disabled',false);
		    $('#radio_ciclo').attr('disabled',false);
		    $('#radio_ciclo').attr('disabled',false);
		    $('#btn_calcular_faltas').attr('disabled',false);
		}
	}
	else if(cur=="cuatrimestre"){
		if((mat>=0)||(mat<=0)){
			alert("Campo [Materia] ERROR - no poner numeros \n ingresa el nombre de la materia");
		}
		else if(hXs==-1){
			alert("Campo [Horas por semana] ERROR - No poner numero negativo ni letras");
		}
		else if((hXs>6)||(hXs<5)){
			alert("Solo se aceptan valores entre 5 y 6 [CUATRIMESTRE]");
		}
		else{
			$('#txt_marzo').attr('disabled',false);
		    $('#txt_abril').attr('disabled',false);
		    $('#txt_mayo').attr('disabled',false);
		    $('#txt_junio').attr('disabled',false);
		    $('#txt_julio').attr('disabled',false);
		    $('#txt_agosto').attr('disabled',false);
		    $('#txt_septiembre').attr('disabled',false);
		    $('#txt_octubre').attr('disabled',false);
		    $('#txt_noviembre').attr('disabled',false);
		    $('#txt_diciembre').attr('disabled',false);
		    $('#txt_enero').attr('disabled',false);
		    $('#txt_febrero').attr('disabled',false);
		    $('#radio_ciclo').attr('disabled',false);
		    $('#radio_ciclo').attr('disabled',false);
		    $('#btn_calcular_faltas').attr('disabled',false);
		}
	}
	
}


function validarSeccion_2(mes1,mes2,mes3,mes4,mes5,mes6){
	if(curso ==="semestre"){
		if((mes1=='')||(mes2=='')||(mes3=='')||(mes4=='')||(mes5=='')||(mes6=='')){
			alert("No dejar espacios vacios");
		}
		else if((mes1 == -1)||(mes2 == -1)||(mes3 == -1)||(mes4 == -1)||(mes5 == -1)||(mes6 == -1)){
			alert("numeros negativos no validos");
		}
		else{
			semestre(mes1,mes2,mes3,mes4,mes5,mes6,horaXsemana);
		}
	}
	else if(curso ==="cuatrimestre"){
		if((mes1=='')||(mes2=='')||(mes3=='')||(mes4=='')||(mes5=='')||(mes6=='')){
			alert("No dejar espacios vacios");
		}
		else if((mes1 == -1)||(mes2 == -1)||(mes3 == -1)||(mes4 == -1)||(mes5 == -1)||(mes6 == -1)){
			alert("numeros negativos no validos");
		}
		else{
			cuatrimestre(mes1,mes2,mes3,mes4,mes5,mes6,horaXsemana);
		}
	}

}


function validarSeccion_3(p1,p2,p3){
	if((p1<=0)||(p1>100)){
		alert("Parcial 1: ERROR - no se aceptan numeros en 0, negativos o mayores a 100");
	}
	else if((p2<=0)||(p2>100)){
		alert("Parcial 2: ERROR - no se aceptan numeros en 0, negativos o mayores a 100");
	}
	else if((p3<=0)||(p3>100)){
		alert("Parcial 3: ERROR - no se aceptan numeros en 0, negativos o mayores a 100");
	}
	else{
		return true;
	}
	return false;
}


function habilitar_boton_1(){ //habilitar el boton hasta que haya llenado los espacios
		var mat = $('#txt_materia').val();
		var horaXs = $('#txt_hora').val();

		var porNombre = document.getElementsByName('radio_boton');
		var resultado='';  
	    for(var i=0;i<porNombre.length;i++)
	    {
	        if(porNombre[i].checked)
	        resultado=porNombre[i].value;
	    }
	    var seleccion = resultado;

	if((mat!=null)&&(mat!='')&&(horaXs!=null)&&(horaXs!='')&&(seleccion!=null)&&(seleccion!='')){
		$('#btn_siguiente_1').attr('disabled',false);
	}
	else{
		$('#btn_siguiente_1').attr('disabled',true);
	}
}



//funcion para calcular el porcentaje de las faltas
function semestre(m1,m2,m3,m4,m5,m6,h){
	var suma = parseInt(m1)+parseInt(m2)+parseInt(m3)+parseInt(m4)+parseInt(m5)+parseInt(m6);
	console.log("suma: "+suma)
	var horas = (h * 24);
	console.log("horas: "+horas)
	var resultado = ((suma * 100) / horas);
	console.log("resultado: "+resultado)
	if(resultado <= 20){
		console.log('ORDINARIO: '+resultado);
		$('#txt_parcial_1').attr('disabled',false);
		$('#txt_parcial_2').attr('disabled',false);
		$('#txt_parcial_3').attr('disabled',false);
		$('#btn_calcular_promedio').attr('disabled',false);
		document.getElementById('mostrar_faltas').innerHTML="ORDINARIO<br>"+resultado.toFixed(2)+"%";
	}
	else if((resultado > 20)&&(resultado < 35)){
		document.getElementById('mostrar_faltas').innerHTML="EXTRAORDINARIO<br>"+resultado.toFixed(2)+"%";
	}
	else if(resultado >= 35){
		document.getElementById('mostrar_faltas').innerHTML="REPETIR<br>"+resultado.toFixed(2)+"%";
	}
	
}


function cuatrimestre(m1,m2,m3,m4,m5,m6,h){
	var suma = parseInt(m1)+parseInt(m2)+parseInt(m3)+parseInt(m4)+parseInt(m5)+parseInt(m6);
	console.log("suma: "+suma)
	var horas = (h * 16);
	console.log("horas: "+horas)
	var resultado = ((suma * 100) / horas);
	console.log("resultado: "+resultado)
	if(resultado <= 20){
		$('#txt_parcial_1').attr('disabled',false);
		$('#txt_parcial_2').attr('disabled',false);
		$('#txt_parcial_3').attr('disabled',false);
		$('#btn_calcular_promedio').attr('disabled',false);
		document.getElementById('mostrar_faltas').innerHTML="ORDINARIO<br>"+resultado.toFixed(2)+"%";
	}
	else if((resultado > 20)&&(resultado < 35)){
		
		document.getElementById('mostrar_faltas').innerHTML="EXTRAORDINARIO<br>"+resultado.toFixed(2)+"%";
	}
	else if(resultado >= 35){
		
		document.getElementById('mostrar_faltas').innerHTML="REPETIR<br>"+resultado.toFixed(2)+"%";
	}
	
}


function promedioGeneral(p1,p2,p3){
	var suma = parseInt(p1)+parseInt(p2)+parseInt(p3);
	console.log("suma de parciales: "+suma)
	var resultadoFinal = suma / 3;
	console.log("resultado: "+resultadoFinal)
	return resultadoFinal;
}
