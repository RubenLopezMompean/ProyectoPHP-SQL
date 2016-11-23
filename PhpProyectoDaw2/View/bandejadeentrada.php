<?php
session_start();

require_once '../Model/ProyectoDB.php';
require_once '../Model/Usuario.php';


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  
} else {
  echo "Esta pagina es solo para usuarios registrados.<br>";
  echo "<br><a href='index.php'>Login</a>";
  echo "<br><br><a href='registrar.html'>Registrarme</a>";

  exit;
}

$now = time();

if ($now > $_SESSION['expire']) {
  session_destroy();

  echo "Su sesion a terminado,
  <a href='index.php'>Necesita Hacer Login</a>";
  exit;
}

$conexion = ProyectoDB::connectDB();

$emisor = $_POST['emisor'];

$receptor = $_SESSION['username'];

$asunto = $_POST['asunto'];

$mensaje = $_POST['mensaje'];

$estado = 0;

$consulta = $conexion->query("SELECT * FROM mensaje where receptor =\"$receptor\"");
?>
<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/cssproyect.css">
    <title>Bandeja de entrada</title>
  </head>

  <body>
    <?php include_once 'menu.php'; ?>
    <div class="mensajeCentrado">
      <?php
      while ($usuario = $consulta->fetchObject()) {
        ?>
        <table class="mens">
          <tr>
            <td class="ref">idmensaje: </td>
            <td class="contenido"><?= $usuario->idmensaje ?></td>
          </tr>
          <tr>
            <td class="ref">Emisor: </td>
            <td class="contenido"><?= $usuario->emisor ?></td>
          </tr>
          <tr>
            <td class="ref">Receptor</td>
            <td class="contenido"><?= $usuario->receptor ?></td>
          </tr>
          <tr>
            <td class="ref">Asunto: </td>
            <td class="contenido"><?= $usuario->asunto ?></td>
          </tr>
          <tr>
            <td class="ref">Mensaje: </td>
            <td class="contenido"><?= $usuario->mensajes ?></td>
          </tr>
        </table>
        <hr>
        <?php
      }
      ?>
    </div>
    <?php include_once 'footer.php'; ?>
  </body>
</html>