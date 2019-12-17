
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





$(document).on('click','#login', function(){
    var user = $('input:text[name=username]').val();
    var pass = $('input:password[name=password]').val();
    verificar_Login(user,pass);

});


