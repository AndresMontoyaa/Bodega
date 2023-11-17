<?php
    class Operaciones extends Conectar{

        public function get_operaciones(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM operaciones";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_operaciones($Fecha_Venta,$Tipo){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO operaciones(Codigo_Pro,Fecha_Venta,Tipo) VALUES (NULL,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Fecha_Venta);
            $sql->bindValue(2, $Tipo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_operaciones($Codigo_Pro,$Fecha_Venta,$Tipo){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE operaciones SET Fecha_Venta = ?, Tipo = ? WHERE Codigo_Pro = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Fecha_Venta);
            $sql->bindValue(2, $Tipo);
            $sql->bindValue(3, $Codigo_Pro);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_operaciones($Codigo_Pro){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="DELETE operaciones WHERE Codigo_Pro = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Codigo_Pro);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }

?>