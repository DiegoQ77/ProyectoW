$("#validar").click(function() {
    if (!$("#form")[0].checkValidity()) {
        $("#form").find('button[type="submit"]').click();
        return false;
    } 
    else {
        $("#popup").click();
    }
});
$("#validar1").click(function() {
    if (!$("#form1")[0].checkValidity()) {
        $("#form1").find('button[type="submit"]').click();
        return false;
    } 
    else {
        $("#popup1").click();
    }
});

var uploadField = document.getElementById("file");
uploadField.onchange = function() {
    if (!/\.(jpg|png|gif)$/i.test(this.files[0].name)) {
        $("#mensaje").text("El archivo a adjuntar no es una imagen");
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