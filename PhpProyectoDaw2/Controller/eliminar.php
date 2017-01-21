<?php

require_once '../Model/ProyectoDB.php';
require_once '../Model/Usuario.php';
$conexion = ProyectoDB::connectDB();

$consulta = $conexion->query("DELETE FROM Usuario 
			WHERE id = '" . $_GET["id"] . "'");

$conexion->exec($consulta);
