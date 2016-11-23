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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./css/cssproyect.css">
    <title>Perfil</title>
  </head>
  <body>
    <?php require_once 'menu.php'; ?> 
    <div>
      <h2>EN CONSTRUCCION</h2>
    </div>
    <?php include_once 'footer.php'; ?>
  </body>
</html>