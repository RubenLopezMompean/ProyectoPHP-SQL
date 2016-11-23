<?php
session_start();
require_once '../Model/ProyectoDB.php';
require_once '../Model/Usuario.php';

if (isset($_SESSION['loggedin']) && $_SESSION['administrador'] == true) {
  
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

$id = $_POST['id'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/cssproyect.css">
    <meta charset="utf-8">
    <title>Modificar usuario</title>
  </head>
  <body>
    <div class="panel panel-primary">
      <table>
        <tr>
        <div class="panel-heading">
          <span class="glyphicon glyphicon-pencil info" aria-hidden="true"></span>
          <th colspan="3">Modificación de datos del cliente</th>
        </div>
        </tr>
        <div class="panel-body">
          <form action="bbdd.php" method="post">
            <tr>
              <td>ID: </td>
              <td><input type="text" name="id" value="<?= $id ?>" readonly="readonly"></td>
            </tr>
            <tr>
              <td>Password: </td>
              <td><input type="text" name="password" value="<?= $password ?>"></td>
            </tr>
            <tr>
              <td>Nombre: </td><td><input type="text" name="nombre" value="<?= $nombre ?>"></td>
            </tr>
            <tr>
              <td>Apellidos: </td>
              <td><input type="text" name="apellidos" value="<?= $apellidos ?>"></td>
            </tr>
            <tr>
              <td>Correo: </td>
              <td><input type="text" name="correo" value="<?= $correo ?>"></td>
            </tr>
            <td>Dirección: </td>
            <td><input type="text" name="direccion" value="<?= $direccion ?>"></td>
            </tr>
            <tr>
              <td>Teléfono: </td>
              <td><input type="numbre" name="telefono" value="<?= $telefono ?>"></td>
            </tr>

            <div class="panel-footer">
              <!--<input type="submit" class="btn btn-success" name="accion" value="Modificar">-->
              <tr>
                <td><button type="submit" class="btn btn-success" name="accion" value="modificar">
                    <span class="glyphicon glyphicon-ok"></span> Modificar
                  </button></td>
                <td><a class="btn btn-danger" href="bbdd.php" role="button">
                    <span class="glyphicon glyphicon-remove"></span>Cancelar
                  </a></td>
              </tr>
            </div>
          </form>
      </table>
    </div>
  </div>
  <?php include_once 'footer.php'; ?>
</body>
</html>