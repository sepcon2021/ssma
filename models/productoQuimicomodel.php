<?php

class ProductoQuimicoModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($object){

        try {


            $conexion_bbdd = $this->db->connect();

            $query = $conexion_bbdd->prepare('INSERT INTO producto_quimico (
            sede,
            id_area,
            ubicacion,
            dni_usuario,
            fecha,
            dni_responsable)
            VALUES (
            :sede,
            :id_area,
            :ubicacion,
            :dni_usuario,
            :fecha,
            :dni_responsable
            )');
            
            $query->execute([
                'sede' => $object['sede'],
                'id_area' => $object['id_area'],
                'ubicacion' => $object['lugar'],
                'dni_usuario' => $object['dni_usuario'],
                'fecha' => $object['fecha'],
                'dni_responsable' => $object['dni_responsable'],
            ]);
            
            $last_insert_id = $conexion_bbdd->lastInsertId();

            return $last_insert_id;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }


    public function insertDetalle($listaDetalle,$id)
    {
        try {

            $conexion_bbdd = $this->db->connect();

            $query = $conexion_bbdd->prepare('INSERT INTO producto_quimico_detalle(
                id_producto_quimico,
                id_producto_quimico_pregunta,
                almacen_producto,
                pit_hidrocarburo,
                observacion)
            VALUES (
                :id_producto_quimico,
                :id_producto_quimico_pregunta,
                :almacen_producto,
                :pit_hidrocarburo,
                :observacion
                )');

            $index = 1;

            foreach($listaDetalle as $detalle) {
                
                $query->bindParam(':id_producto_quimico', $id , PDO::PARAM_INT);
                $query->bindParam(':id_producto_quimico_pregunta',$index, PDO::PARAM_INT);
                $query->bindParam(':almacen_producto', $detalle['almacen_producto'] , PDO::PARAM_INT);
                $query->bindParam(':pit_hidrocarburo', $detalle['pit_hidrocarburo'] , PDO::PARAM_INT);
                $query->bindParam(':observacion', $detalle['observacion'] , PDO::PARAM_STR);

                $query->execute();
                $index++;
            }

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function insertDetalleMovil($listaDetalle,$id)
    {
        try {

            $conexion_bbdd = $this->db->connect();

            $query = $conexion_bbdd->prepare('INSERT INTO producto_quimico_detalle(
                id_producto_quimico,
                id_producto_quimico_pregunta,
                almacen_producto,
                pit_hidrocarburo,
                observacion)
            VALUES (
                :id_producto_quimico,
                :id_producto_quimico_pregunta,
                :almacen_producto,
                :pit_hidrocarburo,
                :observacion
                )');

            $index = 1;

            foreach(json_decode($listaDetalle) as $detalle) {
                
                $query->bindParam(':id_producto_quimico', $id , PDO::PARAM_INT);
                $query->bindParam(':id_producto_quimico_pregunta',$index, PDO::PARAM_INT);
                $query->bindParam(':almacen_producto', $detalle->almacen_producto , PDO::PARAM_INT);
                $query->bindParam(':pit_hidrocarburo', $detalle->pit_hidrocarburo , PDO::PARAM_INT);
                $query->bindParam(':observacion', $detalle->observacion , PDO::PARAM_STR);

                $query->execute();
                $index++;
            }

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}