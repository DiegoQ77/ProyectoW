$("#validar").click(function() {
    if (!$("#form")[0].checkValidity()) {
        $("#form").find('button[type="submit"]').click();
        return false;
    } 
});

$("#validar1").click(function() {
    if (!$("#form1")[0].checkValidity()) {
        $("#form1").find('button[type="submit"]').click();
        return false;
    } 
});

var uploadField = document.getElementById("file");
uploadField.onchange = function() {
    if (!/\.(jpg|png|gif)$/i.test(this.files[0].name)) {
        $("#mensaje").text("Este archivo no es una imagen");
        this.value = "";
    }
    else if (this.files[0].size > 1048576) {
        $("#mensaje").text("La imagen no debe superar los 1MB");
        this.value = "";
    } 
    else{
        $("#mensaje").text("");
    }
};



function eliminar(username,password){
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



