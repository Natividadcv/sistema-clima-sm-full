<?php
    class Calendario extends Conectar{
        /* TODO: Listar Registros */
        public function get_estado(){
            $conectar=parent::Conexion();
            $sql="CALL listar_estado()";
            $query=$conectar->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
