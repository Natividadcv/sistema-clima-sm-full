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


        public function update_completeTask($id)
        {
        $conectar = parent::Conexion();
        $sql = "CALL completar_instalacion (?)";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $id);
        $query->execute();
        }

        public function update_undoTaskCompletion($id)
        {
        $conectar = parent::Conexion();
        $sql = "CALL deshacer_completado (?)";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $id);
        $query->execute();
        }


    }
?>
