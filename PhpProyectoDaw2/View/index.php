<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/cssproyect.css">
    <title>Login</title>
  </head>
  <body>
    <div class="general">
      <div class="d3d">
        <h1 class="login">Login de Usuarios</h1>
        <hr />
      </div>
      <div class="medio">
        <form action="../Controller/checklogin.php" method="post" >

          <label>ID:</label><br>
          <input name="username" type="text" id="username" required>
          <br><br>

          <label>Password:</label><br>
          <input name="password" type="password" id="password" required>
          <br>
          <small><a href='registrar.php'>Registrarme</a></small>
          <br>
          <input type="submit" name="login" value="LOGIN">

        </form>
      </div>
    </div>
    <?php include_once 'footer.php'; ?>
  </body>
</html>
