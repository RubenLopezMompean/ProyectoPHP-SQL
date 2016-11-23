<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/cssproyect.css">
    <title>Registrar</title>
  </head>
  <body>
    <div>
      <h2 class="centrado">Registrar</h2>
      <table>
        <form action="../Controller/alta.php" method="post">

          <tr>
            <td><label>ID:</label></td>
            <td><input name="username" type="text" id="username" required></td>
          </tr>
          <tr>
            <td><label>Password:</label></td>
            <td><input name="password" type="password" id="password" required></td>
          </tr>
          <tr>
            <td><label>Nombre:</label></td>
            <td><input name="nombre" type="text" id="nombre" required></td>
          </tr>
          <tr>
            <td><label>Apellidos:</label></td>
            <td><input name="apellidos" type="text" id="apellidos" required></td>
          </tr>
          <tr>
            <td><label>Email:</label></td>
            <td><input name="email" type="email" id="email" required></td>
          </tr>
          <tr>
            <td class="centrado" colspan="2"><input type="submit" name="enviar" value="ENVIAR"></td>
          </tr>
        </form>
      </table>
      <h4 class="centrado"><a href='index.php'>Volver</a></h4>
    </div>
    <?php include_once 'footer.php'; ?>
  </body>
</html>
