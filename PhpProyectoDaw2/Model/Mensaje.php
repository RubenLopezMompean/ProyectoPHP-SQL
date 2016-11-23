<?php
require_once 'ProyectoDB.php';

class Mensaje {
  private $idmensaje;
  private $emisor;
  private $receptor;
  private $asunto;
  private $mensajes;
  private $estado;
  
  function __construct($idmensaje, $emisor, $receptor, $asunto, $mensajes, $estado) {
    $this->idmensaje = $idmensaje;
    $this->emisor = $emisor;
    $this->receptor = $receptor;
    $this->asunto = $asunto;
    $this->mensajes = $mensajes;
    $this->estado = $estado;
  }

  public function getEmisor() {
    return $this->emisor;
  }

  public function getReceptor() {
    return $this->receptor;
  }

  public function getAsunto() {
    return $this->asunto;
  }

  public function getEstado() {
    return $this->estado;
  }  
  
  public function insertMensaje() {
    $conexion = ProyectoDB::connectDB();
    $insercion = "insert into mensaje (emisor, receptor, asunto, mensajes, estado) VALUES"
                      . " (\"".$this->emisor."\","
                      . " \"".$this->receptor."\","
                      . " \"".$this->asunto."\", "
                      . "\"".$this->mensajes."\", "
                      . "\"".$this->estado."\")";
    $conexion->exec($insercion);
  }

  public function deleteMensaje() {
    $conexion = ProyectoDB::connectDB();
    $borrado = "DELETE FROM mensaje WHERE idmensaje=\"".$this->idmensaje."\"";
    $conexion->exec($borrado);
  }
  
  public static function getEmisores() {
    $conexion = ProyectoDB::connectDB();
    $seleccion = "SELECT * FROM mensaje";
    $consulta = $conexion->query($seleccion);
    
    $mensajitos = [];
    
    while ($registro = $consulta->fetchObject()) {
      $mensaitos[] = new Mensaje($registro->idmensaje, $emisor->emisor, $receptor->receptor, $asunto->asunto, $mensaje->mensaje, $estado->estado);
    }
   
    return $mensajitos;    
  }
  
  public static function getMensajeByEmisor($emisor) {
    $conexion = ProyectoDB::connectDB();
    $seleccion = "SELECT * FROM mensaje WHERE emisor=\"".$emisor."\"";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();
    $mensaje = new Mensaje($registro->idmensaje, $emisor->emisor, $receptor->receptor, $asunto->asunto, $mensaje->mensaje, $estado->estado);
    
    return $mensaje;    
  }
  public static function getMensajeByReceptor($receptor) {
    $conexion = ProyectoDB::connectDB();
    $seleccion = "SELECT * FROM mensaje WHERE receptor=\"".$receptor."\"";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();
    $mensaje = new Mensaje($registro->idmensaje, $emisor->emisor, $receptor->receptor, $asunto->asunto, $mensaje->mensaje, $estado->estado);
    
    return $mensaje;    
  }
}
