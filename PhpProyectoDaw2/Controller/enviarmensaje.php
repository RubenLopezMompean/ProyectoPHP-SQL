<?php
session_start();

require_once '../Model/Mensaje.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  
} else {
  echo "Esta pagina es solo para usuarios registrados.<br>";
  echo "<br><a href='../index.php'>Login</a>";
  echo "<br><br><a href='../View/registrar.php'>Registrarme</a>";

  exit;
}

$now = time();

if ($now > $_SESSION['expire']) {
  session_destroy();

  echo "Su sesion a terminado,
  <a href='../index.php'>Necesita Hacer Login</a>";
  exit;
}
?><!DOCTYPE html>
<html lang="es">

  <head>
    <title>Panel de Control</title>
    <link rel="stylesheet" type="text/css" href="../View//css/cssproyect.css">
    <meta charset = "utf-8">
  </head>

  <body>
    <?php
    $emisor = $_SESSION['username'];

    $receptor = $_POST['receptor'];

    $asunto = $_POST['asunto'];

    $mensaje = $_POST['mensaje'];

    $estado = 0;

    $insertar = new Mensaje("", $emisor, $receptor, $asunto, $mensaje, $estado);
    $insertar->insertMensaje();
    if ($insertar) {
      echo "Mensaje enviado correctamente";
      header("Refresh: 3; url=../View/conectar.php");
    } else {
      "Error al enviar el mensaje";
    }
    ?>
  </body>
</html>