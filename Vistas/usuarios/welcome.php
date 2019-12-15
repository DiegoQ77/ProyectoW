



<?php

require_once '../../Controladores/controlLogin.php';

if(isset($_POST['username']) && isset($_POST['password'])){
$username = $_POST['username'];
$password = $_POST['password'];
$user = new Iniciar();
$resp = $user->entrar($username,$password);
if($resp == 'success'){
    echo "<meta http-equiv=Refresh content=0;url=index.php>";
}
else{
echo $resp;
}
}
?>





