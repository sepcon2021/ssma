<?php

class InspeccionTableroModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($object){

        try {


            $conexion_bbdd = $this->db->connect();


            $query = $conexion_bbdd->prepare('INSERT INTO inspeccion_tablero (
            sede,
            id_area,
            ubicacion,
            codigo_tag,
            aprobado,
            dni_usuario,
            fecha,
            dni_responsable,
            descripcion)
            VALUES (
            :sede,
            :id_area,
            :ubicacion,
            :codigo_tag,
            :aprobado,
            :dni_usuario,
            :fecha,
            :dni_responsable,
            :descripcion
            )');
            
            $query->execute([
                'sede' => $object['sede'],
                'id_area' => $object['id_area'],
                'ubicacion' => $object['ubicacion'],
                'codigo_tag' => $object['codigo_tag'],
                'aprobado' => $object['aprobado'],
                'dni_usuario' => $object['dni_usuario'],
                'fecha' => $object['fecha'],
                'dni_responsable' => $object['dni_responsable'],
                'descripcion' => $object['descripcion'],
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

            $query = $conexion_bbdd->prepare('INSERT INTO inspeccion_tablero_detalle(
                id_inspeccion_tablero,
                id_tipo_inspeccion_tablero,
                aplica,
                cumple
                )
            VALUES (
                :id_inspeccion_tablero,
                :id_tipo_inspeccion_tablero,
                :aplica,
                :cumple
                )');

            $index = 1;

            foreach($listaDetalle as $detalle) {
                
                $query->bindParam(':id_inspeccion_tablero', $id , PDO::PARAM_INT);
                $query->bindParam(':id_tipo_inspeccion_tablero', $index , PDO::PARAM_INT);
                $query->bindParam(':aplica', $detalle['aplica'] , PDO::PARAM_INT);
                $query->bindParam(':cumple', $detalle['cumple'] , PDO::PARAM_INT);

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

            $query = $conexion_bbdd->prepare('INSERT INTO inspeccion_tablero_detalle(
                id_inspeccion_tablero,
                id_tipo_inspeccion_tablero,
                aplica,
                cumple
                )
            VALUES (
                :id_inspeccion_tablero,
                :id_tipo_inspeccion_tablero,
                :aplica,
                :cumple
                )');

            $index = 1;

            foreach(json_decode($listaDetalle) as $detalle) {
                
                $query->bindParam(':id_inspeccion_tablero', $id , PDO::PARAM_INT);
                $query->bindParam(':id_tipo_inspeccion_tablero', $index , PDO::PARAM_INT);
                $query->bindParam(':aplica', $detalle->aplica , PDO::PARAM_INT);
                $query->bindParam(':cumple', $detalle->cumple , PDO::PARAM_INT);

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