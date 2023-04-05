<?php
/* TODO: Inicio de Session */
session_start();
class Conectar
{
  protected $dbh;

  protected function Conexion()
  {
    try {
      $puerto = 1433;
      /* TODO: Cadena de Conexion */
      //$conectar = $this->dbh = new PDO("sqlsrv:Server=.\SQLEXPRESS,$puerto;Database=CompraVenta", "sa", "12345678");
      $conectar = $this->dbh = new PDO("sqlsrv:Server=.\SQLEXPRESS;Database=CompraVenta", "sa", "12345678");
      return $conectar;
    } catch (Exception $e) {
      /* TODO: En caso de error mostrar mensaje */
      print "Error Conexion BD " . $e->getMessage() . "<br/>";
      die();
    }
  }

  public static function ruta()
  {
    /* TODO: Ruta de acceso del Proyecto (Validar su puerto y nombre de carpeta por el suyo) */
    return "http://localhost/System-Pintura/";
  }
}
