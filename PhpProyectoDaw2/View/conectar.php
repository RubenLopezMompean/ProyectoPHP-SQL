<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  
} else {
  echo "Esta pagina es solo para usuarios registrados.<br>";
  echo "<br><a href='index.php'>Login</a>";
  echo "<br><br><a href='registrar.php'>Registrarme</a>";

  exit;
}

$now = time();

if ($now > $_SESSION['expire']) {
  session_destroy();

  echo "Su sesion a terminado,
  <a href='index.php'>Necesita Hacer Login</a>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/cssproyect.css">
    <title>Enviar mensaje</title>
  </head>
  <body>
    <?php include_once 'menu.php'; ?>
    <div id="mandarMensaje">
      <form method="post" action="../Controller/enviarmensaje.php">

        De: <br>

        <input type="text" name="emisor" style="border-width:0;" readonly="readonly" value="<?= $_SESSION['username'] ?>"> <br>

        Para: <br>

        <input type="text" name="receptor"> <br>

        Asunto: <br>

        <input type="text" name="asunto"> <br>

        Mensaje: <br>
        <textarea name="mensaje" style="width: 300px; height: 125px;"></textarea> <br>

        <input type="submit" value="Enviar" name="envio">

      </form>
    </div>
    <?php include_once 'footer.php'; ?>
  </body>
</html>