<div id="nombreLogin">
  <p>Estás logeado como <?php echo $_SESSION['username']; ?></p>
  <a href=../Controller/logout.php>Cerrar Sesion</a>
</div>
<br><br>  
<div>
  <?php
  if ($_SESSION['administrador'] == true) {
    ?>
    <ul class='menu'>
      <li><a href="bbdd.php">Admnistrar usuarios</a></li>
      <li><a href="mensajeBD.php">Administrar mensajes</a></li>
      <li><a href="carrusel.php">Galeria</a></li>
      <li><a href="bandejadeentrada.php">Bandeja de entrada</a></li>
      <li><a href="bandejadesalida.php">Bandeja de salida</a></li>
      <li><a href="conectar.php">Enviar mensaje</a></li>
    </ul>
    <?php
  } else {
    ?>
    <ul class='menu'>
      <li><a href="panel-control.php">Inicio</a></li>
      <li><a href="perfil.php">Mi perfil</a></li>
      <li><a href="carrusel.php">Galeria</a></li>
      <li><a href="bandejadeentrada.php">Bandeja de entrada</a></li>
      <li><a href="bandejadesalida.php">Bandeja de salida</a></li>
      <li><a href="conectar.php">Enviar mensaje</a></li>
    </ul>
  </div>
  <?php
}
?>