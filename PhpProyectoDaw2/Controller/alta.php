<?php
require_once '../Model/Usuario.php';
?>
<!DOCTYPE html>
<html lang="es">

  <head>
    <title>Alta</title>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/cssproyect.css">
  </head>

  <body>
    <?php
    $id = $_POST['username'];
    $password = $_POST['password'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['email'];

    $conexion = ProyectoDB::connectDB();
    $consulta = $conexion->query("SELECT id FROM Usuario WHERE id=\"$id\"");
    $cliente = $consulta->fetchObject();

    if ($_POST['username'] != $cliente->id) {
      $insercion = new Usuario($id, $password, $nombre, $apellidos, $correo);

      $insercion->insertUsuario();
      header("Refresh: 3; url=../View/index.php");
      echo "Usuario dado de alta correctamente.";
    } else {
      echo "nombre de usuario no disponible";
      echo "<br><a href='../View/registrar.php'>Volver a Intentarlo</a>";
    }
    ?>
  </body>
</html>