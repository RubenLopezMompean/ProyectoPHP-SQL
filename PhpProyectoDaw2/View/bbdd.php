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
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="./css/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="./css/cssproyect.css">
    <title>BBDD Usuarios</title>
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="./js/jquery-3.1.1.min.js"></script>
    <script src="./js/js.js"></script>
    <style>
      .centrar{
        display: flex;
        margin: 0;
        padding: 0;
        background-color: #333;
        width:100%;
      }
    </style>
  </head>
  <body>
    <?php
    $conexion = ProyectoDB::connectDB();
    $consulta = $conexion->query("SELECT id, password, nombre, apellidos, correo, direccion, telefono FROM Usuario");
    ?>

    <div class="pull-right text-right">
      <small>Estás logeado como <?php echo $_SESSION['username']; ?><br>
        <a href=../Controller/logout.php>Cerrar Sesion</a></small>
    </div>
    <br><br>  
    <div class="centrar">
      <ul class='nav nav-pills'>
        <li><a href="bbdd.php">Admnistrar usuarios</a></li>
        <li><a href="mensajeBD.php">Administrar mensajes</a></li>
		<li><a href="carrusel.php">Galeria</a></li>
        <li><a href="bandejadeentrada.php">Bandeja de entrada</a></li>
        <li><a href="bandejadesalida.php">Bandeja de salida</a></li>
        <li><a href="conectar.php">Enviar mensaje</a></li>
      </ul>
    </div>
    <?php
    $accion = $_POST['accion'];
    $codigo = $_POST['codigo'];
    if ($accion == "eliminar") {
      $eliminar = "DELETE FROM Usuario WHERE id=\"$_POST[id]\"";
      $conexion->exec($eliminar);
      header("Refresh: 0; url=bbdd.php");
      echo "Usuario eliminado correctamente.";
    }
    if ($accion == "modificar") {
      $modifica = "UPDATE Usuario SET nombre=\"$_POST[nombre]\", apellidos=\"$_POST[apellidos]\", correo=\"$_POST[correo]\", direccion=\"$_POST[direccion]\", telefono=\"$_POST[telefono]\" WHERE id=\"$_POST[id]\"";
      $conexion->exec($modifica);
      header("Refresh: 0; url=bbdd.php");
      echo "Usuario modificado correctamente.";
    }
    if ($accion == "alta") {
      $insercion = "INSERT INTO `Usuario`(`id`, `password`, `nombre`, `apellidos`, `correo`) VALUES ('$_POST[id]','$_POST[pass]','$_POST[nombre]','$_POST[apellidos]','$_POST[correo]')";
      //var_dump($insercion);
      echo $insercion;
      $conexion->exec($insercion);
      header("Refresh: 0; url=bbdd.php");
      echo "Usuario dado de alta correctamente.";
    }
    ?>

    <div class="table-responsive">
      <table class="table table-hover">
        <tr>
          <th class="col-xs-12 col-sm-12 col-md-2">ID</th>
          <th class="col-xs-12 col-sm-12 col-md-2">Nombre</th>
          <th class="col-xs-12 col-sm-12 col-md-2">Apellidos</th>
          <th class="col-xs-12 col-sm-12 col-md-2">Correo</th>
          <th class="col-xs-12 col-sm-12 col-md-2"></th>
          <th class="col-xs-12 col-sm-12 col-md-2"></th>
          <th class="col-xs-12 col-sm-12 col-md-2"></th>
        </tr>
        <?php
        while ($usuario = $consulta->fetchObject()) {
          ?>
          <tr>
            <td class="col-xs-12 col-sm-12 col-md-2"><?= $usuario->id ?></td>
            <td class="col-xs-12 col-sm-12 col-md-2"><?= $usuario->nombre ?></td>
            <td class="col-xs-12 col-sm-12 col-md-2"><?= $usuario->apellidos ?></td>
            <td class="col-xs-12 col-sm-12 col-md-2"><?= $usuario->correo ?></td>
            <td class="col-xs-12 col-sm-12 col-md-2">
              <form onsubmit="bbdd.php" method="post">
                <input type="hidden" name="id" value="<?= $usuario->id ?>">
                <input type="hidden" name="accion" value="eliminar">
                <button class="btn btn-danger" onclick="return confirmSubmit()" href="../Controller/eliminar.php?id=<?= $usuario->id ?>"><i class="material-icons left">mode_edit</i>Eliminar</button>
              </form>
            </td>
            <td class="col-xs-12 col-sm-12 col-md-2">
              <form action="modificar_usuario.php" method="post">
                <input type="hidden" name="id" value="<?= $usuario->id ?>">
                <input type="hidden" name="password" value="<?= $usuario->password ?>">
                <input type="hidden" name="nombre" value="<?= $usuario->nombre ?>">
                <input type="hidden" name="apellidos" value="<?= $usuario->apellidos ?>">
                <input type="hidden" name="correo" value="<?= $usuario->correo ?>">
                <input type="hidden" name="direccion" value="<?= $usuario->direccion ?>">
                <input type="hidden" name="telefono" value="<?= $usuario->telefono ?>">
                <input type="hidden" name="accion" value="modificar">

                <button class="btn btn-primary"><i class="material-icons left">mode_edit</i>Modificar</button>
              </form>
            </td>
            <td class="col-xs-12 col-sm-12 col-md-2"></td>
          </tr>
          <?php
        }
        ?>

        <tr>
          <td class="col-xs-12 col-sm-12 col-md-2"><b>ID</b></td>
          <td class="col-xs-12 col-sm-12 col-md-2"><b>Password</b></td>
          <td class="col-xs-12 col-sm-12 col-md-2"><b>Nombre</b></td>
          <td class="col-xs-12 col-sm-12 col-md-2"><b>Apellidos</b></td>
          <td class="col-xs-12 col-sm-12 col-md-2"><b>Correo</b></td>
          <td class="col-xs-12 col-sm-12 col-md-2"></td>
          <td class="col-xs-12 col-sm-12 col-md-2"></td>
        </tr>
        <tr>    
        <form action="bbdd.php" method="post">
          <td class="col-xs-12 col-sm-12 col-md-2">
            <input class="form-control input-lg" type="text" name="id">
          </td>
          <td class="col-xs-12 col-sm-12 col-md-2">
            <input class="form-control input-lg" type="password" name="pass">
          </td>
          <td class="col-xs-12 col-sm-12 col-md-2">
            <input class="form-control input-lg" type="text" name="nombre">
          </td>
          <td class="col-xs-12 col-sm-12 col-md-2">
            <input class="form-control input-lg" type="text" name="apellidos">
          </td>
          <td class="col-xs-12 col-sm-12 col-md-2">
            <input class="form-control input-lg" type="text" name="correo">          
          </td>
          <td class="col-xs-12 col-sm-12 col-md-2">
            <input type="hidden" name="accion" value="alta">
            <button class="btn btn-success"><i class="material-icons left">done</i>Nuevo Usuario</a>
          </td>
        </form>
        </tr>
      </table>
    </div>
    <br>
    <?php include_once 'footer.php'; ?>
    Número de usuario: <?= $consulta->rowCount() ?>
  </body>
</html>
