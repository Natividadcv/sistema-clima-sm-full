<?php
/* TODO: Inicio de Session */
session_start();
class Conectar
{
  protected $dbh;

  protected function Conexion()
  {
    try {
      
      /* TODO: Cadena de Conexion */
      //$conectar = $this->dbh = new PDO("sqlsrv:Server=.\SQLEXPRESS,$puerto;Database=CompraVenta", "sa", "12345678");
      $conectar = $this->dbh = new PDO("mysql:host=sql355.main-hosting.eu;dbname=u433272284_climacoolsm", "u433272284_clima", "Q=E#*[[3f");
      //$conectar = $this->dbh = new PDO("mysql:host=localhost;port=3310;dbname=clima_cool", "root", "");


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
    return "http://localhost/MYSQL-System-Pintura/";
  }
}
