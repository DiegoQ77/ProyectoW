$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url: 'Buscar.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}

function cambiar_lista(cantidad){
	$.ajax({
		url: 'Buscar.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {cantidad: cantidad},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}

function cambiar_pagina(pagina){
	$.ajax({
		url: 'Buscar.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {pagina: pagina},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}

$(document).on('keyup','#caja_busqueda', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
});

$(document).on('change','#eleccion', function(){
	var valor = $(this).val();
	cambiar_lista(valor);
	$("#caja_busqueda").val('');
});


$(document).on('click','#pag', function(){
	var valor = $(this).val();
	cambiar_pagina(valor);
	$("#caja_busqueda").val('');
});