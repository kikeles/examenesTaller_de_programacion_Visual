function agregardatosR(id,respuesta,tipo){
		cadena="id_pregunta="+id+
				"&respuesta=" + respuesta + 
				"&tipo=" + tipo;

		$.ajax({
			type:"POST",
			url:"php/agregarDatosRespuestas.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tablarespuesta').load('componentes/tablaRespuestas.php');
					/*alert("se a agregado con exito :)");*/
				}else{
					alert("Algo fallo en el servidor :(");
				}
			}
		});

		$('input[type="text"]').val('');

}

function agregaformR(datos){

	d=datos.split('||');

	$('#id_respuesta').val(d[0]);
	$('#id_preguntau').val(d[1]);
	$('#respuestau').val(d[2]);
	$('#tipou').val(d[3]);

	
}

function actualizaDatosR(){

	id_r=$('#id_respuesta').val(); 
	id_p=$('#id_preguntau').val();
	pregunta=$('#respuestau').val();
	tipo=$('#tipou').val();

	cadena="id_respuesta="+id_r+
			"&id_pregunta="+id_p+
			"&respuesta=" + pregunta + 
			"&tipo="+tipo;

	$.ajax({
		type:"POST",
		url:"php/actualizaDatosRespuestas.php",
		data:cadena,
		success:function(r){		
			if(r==1){
				$('#tablarespuesta').load('componentes/tablaRespuestas.php');
				/*alert("se ha actualizado con exito :)");*/
			}else{
				alert("Algo fallo en el servidor :(");
			}
		}
	});

}

function preguntarSiNoR(id){
	/*alertify.confirm('Eliminar Datos', '¿Realmente deseas eliminar esta respuesta?', 
	function(){ eliminarDatosR(id) }
    , function(){ aler('se ha cancelado')});*/


    alertify.confirm('Eliminar Datos', '¿Realmente deseas eliminar esta pregunta?',
  function(){
  	eliminarDatos(id); 
    alertify.success('Ok');
  },
  function(){
    alertify.error('Cancelado');
  });
}

function eliminarDatosR(id){

	var cadena="id="+id;

		$.ajax({
			type:"POST",
			url:"php/eliminarDatosRespuestas.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tablarespuesta').load('componentes/tablaRespuestas.php');
					/*alert("Eliminado con exito :)");*/
				}else{
					alert("Fallo el servidor :(");
				}
			}
		});
}