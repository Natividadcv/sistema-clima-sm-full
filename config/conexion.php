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
      //$conectar = $this->dbh = new PDO("mysql:host=sql355.main-hosting.eu;dbname=u433272284_climacoolsm", "u433272284_clima", "Q=E#*[[3f");
      $conectar = $this->dbh = new PDO("mysql:host=localhost;port=3310;dbname=clima_cool", "root", "");
      //$conectar->exec("set names utf8");



      return $conectar;
    } catch (Exception $e) {
      /* TODO: En caso de error mostrar mensaje */
      print "Error Conexion BD " . $e->getMessage() . "<br/>";
      die();
    }
  }

public static function ruta()
{
  $host = $_SERVER['HTTP_HOST'];
  $uri = $_SERVER['REQUEST_URI'];

  /* Verificar si la ruta actual es localhost */
  if($host == 'localhost') {
    return "http://localhost/CLIMA/";
  } else {
    return "http://192.168.178.218/CLIMA/";
  }
}



}

