
function verificar_Login(username,password){
	$.ajax({
		url: '../../Vistas/usuarios/welcome.php' ,
		type: 'POST' ,
		dataType: 'html',
        data: {username:username,
            password: password},
	})
	.done(function(respuesta){
		$("#respuesta").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}

function salir_popup(){
	$.ajax({
		url: '../../Vistas/usuarios/welcome.php' ,
	})
	.done(function(respuesta){
		$("#respuesta").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}

var modal = document.getElementById('id01');
var modal4 = document.getElementById('id04');

window.addEventListener("click", function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        $('input:text[name=username]').val("");
        $('input:password[name=password]').val("");
        salir_popup();
    }
    else if (event.target == modal4){
        modal4.style.display = "none";
    }
})



$(document).on('click','#login', function(){
    var user = $('input:text[name=username]').val();
    var pass = $('input:password[name=password]').val();
    verificar_Login(user,pass);

});

$(document).on('click','#close', function(){
    $('input:text[name=username]').val("");
    $('input:password[name=password]').val("");
    salir_popup();
});


