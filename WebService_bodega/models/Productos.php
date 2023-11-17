<?php
    class Productos extends Conectar{

        public function get_productos(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM productos";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_productos($Nombre,$Precio,$Cantidad,$Fecha_Ven){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO productos(Codigo_Pro,Nombre,Precio,Cantidad,Fecha_Ven) VALUES (NULL,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Nombre);
            $sql->bindValue(2, $Precio);
            $sql->bindValue(3, $Cantidad);
            $sql->bindValue(4, $Fecha_Ven);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_productos($Codigo_Pro,$Nombre,$Precio,$Cantidad,$Fecha_Ven){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE productos SET Nombre = ?, Precio = ?, Cantidad = ?, Fecha_Ven = ? WHERE Codigo_Pro = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Nombre);
            $sql->bindValue(2, $Precio);
            $sql->bindValue(3, $Cantidad);
            $sql->bindValue(4, $Fecha_Ven);
            $sql->bindValue(5, $Codigo_Pro);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_productos($Codigo_Pro){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="DELETE productos where Codigo_Pro = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Codigo_Pro);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }

?>