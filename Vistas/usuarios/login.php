
<form id="login" method="post" action="../../Controladores/Usuario.php">

      <label for="username">Nombre de Usuario</label>
      <input  required name="login[username]" type="text" >
      
      <label for="password">Password</label>
      <input class="password" required name="login[password]" type="password" />
      <div class="hide-show">
        <span>Show</span>
      </div>
      <button type="submit">Acceder</button>
      <br><br><br>

      
    </form>