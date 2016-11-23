<?php
require_once '../Model/ProyectoDB.php';
require_once '../Model/Usuario.php';

$conexion = ProyectoDB::connectDB();
    $id = $_POST['id'];
    $consulta = $conexion->query("SELECT id, password, nombre, apellidos, correo FROM Usuario");
    $eliminar = new Usuario($id);
    $eliminar->delete();
    header("Refresh: 0; url=../View/bbdd.php");
    echo "Usuario eliminado correctamente.";        
      