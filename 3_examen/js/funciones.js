

function agregardatos(pregunta,tipo,puntaje,tema,estatus){

	if(puntaje<0){
		alert("no puedes agregar numeros negativos");
		$('input[type="text"]').val('');
	}
	else{
		cadena="pregunta=" + pregunta + 
				"&tipo=" + tipo +
				"&puntaje=" + puntaje +
				"&tema=" + tema +
				"&estatus="+ estatus;

		$.ajax({
			type:"POST",
			url:"php/agregarDatos.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('componentes/tabla.php');
					$('#buscador').load('componentes/buscador.php');
					/*alert("se a agregado con exito :)");*/
				}else{
					alert("Algo fallo en el servidor :(");
				}
			}
		});

		$('input[type="text"]').val('');

	}

}

function agregaform(datos){

	d=datos.split('||');

	$('#idpregunta').val(d[0]);
	$('#preguntau').val(d[1]);
	$('#tipou').val(d[2]);
	$('#puntajeu').val(d[3]);
	$('#temau').val(d[4]);
	$('#estatusu').val(d[5]);
	
}

function actualizaDatos(){


	id=$('#idpregunta').val();
	pregunta=$('#preguntau').val();
	tipo=$('#tipou').val();
	puntaje=$('#puntajeu').val();
	tema=$('#temau').val();
	estatus=$('#estatusu').val();

	if(puntaje<0){
		alert("no se pueden agregar numeros negativos")
	}
	else{

		cadena="id="+ id +
				"&pregunta=" + pregunta + 
				"&tipo=" + tipo +
				"&puntaje=" + puntaje +
				"&tema=" + tema +
				"&estatus="+estatus;

		$.ajax({
			type:"POST",
			url:"php/actualizaDatos.php",
			data:cadena,
			success:function(r){
				
				if(r==1){
					$('#tabla').load('componentes/tabla.php');
					/*alert("se ha actualizado con exito :)");*/
				}else{
					alert("Algo fallo en el servidor :(");
				}
			}
		});

	}

}

function preguntarSiNo(id){
	/*alertify.confirm('Eliminar Datos', '¿Realmente deseas eliminar esta pregunta?', 
	function(){ 
	eliminarDatos(id) 
	},
	function(){ 
		aler('se ha cancelado')
	});*/


    alertify.confirm('Eliminar Datos', '¿Realmente deseas eliminar esta pregunta?',
  function(){
  	eliminarDatos(id); 
    alertify.success('Ok');
  },
  function(){
    alertify.error('Cancelado');
  });
}

function eliminarDatos(id){

	var cadena="id="+id;

		$.ajax({
			type:"POST",
			url:"php/eliminarDatos.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('componentes/tabla.php');
				}else{
					alert("Fallo el servidor :(");
				}
			}
		});
}