
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

$(document).on('click','#tabla tr', function(){
    var href = $(this).find("a").attr("href");
    if(href) {
        window.location = href;
    }
});

$(document).ready(function () {   
    $('#tabla').DataTable({
		"scrollX": false,
		"buttons": [
            {
                text: 'My button',
                action: function ( e, dt, node, config ) {
                    alert( 'Button activated' );
                }
            }
        ],
		"dom":"<'row'<'col-sm-6'l><'col-sm-6'f>>" +
		"<'row'<'col-sm-12'tr>>" +
		"<'row'<'col-sm-6'i><'col-sm-6 text-center'p>>",
        "language": {
                "lengthMenu": "Numero de Filas:  _MENU_",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            }
    });     
});

