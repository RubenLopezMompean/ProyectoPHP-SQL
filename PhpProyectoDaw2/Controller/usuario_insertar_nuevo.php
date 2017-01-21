<?php 
require_once '../Model/ProyectoDB.php';
require_once '../Model/Usuario.php';
$conexion = ProyectoDB::connectDB();

 $insercion = "INSERT INTO Usuario (id, password, nombre, apellidos, correo, tipousuario ) "
         . "VALUES ('$_POST[idnuevo]','$_POST[passwordnuevo]','$_POST[nombrenuevo]', '$_POST[apellidosnuevo]','$_POST[correonuevo]','$_POST[tipousuarionuevo]')";
                        //echo $insercion;
                        $conexion->exec($insercion);
                    //    echo "<h2>Usuario dado de alta correctamente.</h2>";

include "../View/tabla.php";


