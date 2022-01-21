<?php

class GasComprimidoModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($object){

        try {


            $conexion_bbdd = $this->db->connect();

            $query = $conexion_bbdd->prepare('INSERT INTO gas_comprimido (
            sede,
            id_area,
            lugar,
            empresa,
            dni_usuario,
            fecha,
            dni_responsable)
            VALUES (
            :sede,
            :id_area,
            :lugar,
            :empresa,
            :dni_usuario,
            :fecha,
            :dni_responsable
            )');
            
            $query->execute([
                'sede' => $object['sede'],
                'id_area' => $object['id_area'],
                'lugar' => $object['lugar'],
                'empresa' => $object['empresa'],
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

            $query = $conexion_bbdd->prepare('INSERT INTO gas_comprimido_detalle(
                id_gas_comprimido,
                id_gas_comprimido_pregunta,
                respuesta,
                observacion)
            VALUES (
                :id_gas_comprimido,
                :id_gas_comprimido_pregunta,
                :respuesta,
                :observacion
                )');

            $index = 1;

            foreach($listaDetalle as $detalle) {
                
                $query->bindParam(':id_gas_comprimido', $id , PDO::PARAM_INT);
                $query->bindParam(':id_gas_comprimido_pregunta',$index, PDO::PARAM_INT);
                $query->bindParam(':respuesta', $detalle['respuesta'] , PDO::PARAM_INT);
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

            $query = $conexion_bbdd->prepare('INSERT INTO gas_comprimido_detalle(
                id_gas_comprimido,
                id_gas_comprimido_pregunta,
                respuesta,
                observacion)
            VALUES (
                :id_gas_comprimido,
                :id_gas_comprimido_pregunta,
                :respuesta,
                :observacion
                )');

            $index = 1;

            foreach(json_decode($listaDetalle) as $detalle) {
                
                $query->bindParam(':id_gas_comprimido', $id , PDO::PARAM_INT);
                $query->bindParam(':id_gas_comprimido_pregunta',$index, PDO::PARAM_INT);
                $query->bindParam(':respuesta', $detalle->respuesta , PDO::PARAM_INT);
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