<?php

require_once '../Model/ProyectoDB.php';
require_once '../Model/Usuario.php';
$conexion = ProyectoDB::connectDB();

/**
  $update = $conexion->query("UPDATE Usuario SET
  password = '" . $_POST["passwordmodificar"] ."',
  nombre = '" . $_POST["nombremodificar"] ."',
  apellidos = '" . $_POST["apellidosmodificar"] ."',
  correo = " . $_POST["correomodificar"] . ",
  direccion = " . $_POST["direccionmodificar"] . ",
  telefono = " . $_POST["telefonomodificar"] . "
  WHERE id = " . $_POST["idmodificar"]);
 */
$modifica = "UPDATE Usuario SET password=\"$_POST[passwordmodificar]\", nombre=\"$_POST[nombremodificar]\", apellidos=\"$_POST[apellidosmodificar]\", correo=\"$_POST[correomodificar]\", direccion=\"$_POST[direccionmodificar]\", telefono=\"$_POST[telefonomodificar]\" WHERE id=\"$_POST[idmodificar]\"";


$conexion->exec($modifica);

include "../View/tabla.php";
