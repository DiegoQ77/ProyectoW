
var x = document.getElementsByClassName("ver");
$(document).on('click','#tabla tr', function(){
    var href = $(this).find(x).attr("href");
    if(href && !$('#modal5').is(':visible')) {
        window.location = href;
    }
});

$(document).ready(function () {   
    $('#tabla').DataTable({
		"scrollX": false,
		"columnDefs": [
			{ "orderable": false, "targets": 8 }
		  ],
		"pagingType": "full_numbers",
		"dom":"<'row'<'col-sm-2'f><'col-sm'l><'col-sm-12'>>" +
		"<'row'<'col-sm-12'tr>>" +
		"<'row'<'col-sm-6'i><'col-sm-6'p>>",
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

