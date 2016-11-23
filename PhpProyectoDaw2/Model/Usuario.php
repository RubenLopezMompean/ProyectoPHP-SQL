<?php

require_once 'ProyectoDB.php';

class Usuario {
  private $id;
  private $password;
  private $nombre;
  private $apellidos;
  private $correo;
  
  function __construct($id, $password, $nombre, $apellidos, $correo) {
    $this->id = $id;
    $this->password = $password;
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->correo = $correo;
  }

  public function getId() {
    return $this->id;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function getApellidos() {
    return $this->apellidos;
  }

  public function getCorreo() {
    return $this->correo;
  }  
  
  public function insertUsuario() {
    $conexion = ProyectoDB::connectDB();
    $insercion = "INSERT INTO Usuario (id, password, nombre, apellidos, correo) VALUES "
            . "(\"".$this->id."\", "
            . "\"".$this->password."\",  "
            . "\"".$this->nombre."\",  "
            . "\"".$this->apellidos."\", "
            . "\"".$this->correo."\")";
    $conexion->exec($insercion);
  }

  public function delete() {
    $conexion = ProyectoDB::connectDB();
    $borrado = "DELETE FROM usuario WHERE id=\"".$this->id."\"";
    $conexion->exec($borrado);
  }
  
  public static function getUsuarios() {
    $conexion = ProyectoDB::connectDB();
    $seleccion = "SELECT * FROM usuario";
    $consulta = $conexion->query($seleccion);
    
    $usuarios = [];
    
    while ($registro = $consulta->fetchObject()) {
      $usuarios[] = new Usuario($registro->id, $registro->password, $registro->nombre, $registro->apellidos, $registro->correo);
    }
   
    return $usuarios;    
  }
  
  public static function getUsuarioById($id) {
    $conexion = ProyectoDB::connectDB();
    $seleccion = "SELECT * FROM usuario WHERE id=\"".$id."\"";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();
    $usuario = new Usuario($registro->id, $registro->password, $registro->nombre, $registro->apellidos, $registro->correo);
    
    return $usuario;    
  }
}
