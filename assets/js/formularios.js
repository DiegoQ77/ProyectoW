$('#validar').click(function() {
    if (!$("#form")[0].checkValidity()) {
        $("#form").find('button[type="submit"]').click();
        return false;
    } else {
        $("#popup").click();
    }
});

$('#validar1').click(function() {
    if (!$("#form1")[0].checkValidity()) {
        $("#form1").find('button[type="submit"]').click();
        return false;
    } else {
        $("#popup1").click();
    }
});