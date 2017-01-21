<?php
require_once '../Model/ProyectoDB.php';
require_once '../Model/Usuario.php';
$conexion = ProyectoDB::connectDB();
?>

<h3 align="center">Listado Usuarios
  <span id="cabeza"></span> 
  <select id="idtipo">
    <option value="">------</option>
    <?php
    $consulta2 = $conexion->query("SELECT id, nombre 
			FROM Usuario
			ORDER BY nombre");

    while ($fila2 = $consulta2->fetchObject()) {
      ?>
      <option value="<?= $fila2->id ?>"
      <?php if (!empty($_POST["id"]) && $_POST["id"] == $fila2->id) echo ' selected="selected" ' ?>
              ><?= $fila2->id ?></option>
            <?php } ?>
  </select>
  <input id="filtrar" type="button" value="filtrar" />
  <img src="images/nuevo.png" width="20" height="20" id="nuevo" title="Nuevo Usuario">
</h3>
<h3 align="center">Búsqueda por ID <input type="text" id="buscausuario" value=""></h3>
