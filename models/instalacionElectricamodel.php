<?php

class InstalacionElectricaModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($object){

        try {


            $conexion_bbdd = $this->db->connect();

            $query = $conexion_bbdd->prepare('INSERT INTO instalacion_electrica (
            sede,
            id_area,
            obra_fase,
            campamento,
            dni_inspeccionado,
            dni_responsable,
            informe,
            fecha)
            VALUES (
            :sede,
            :id_area,
            :obra_fase,
            :campamento,
            :dni_inspeccionado,
            :dni_responsable,
            :informe,
            :fecha
            )');
            
            $query->execute([
                'sede' => $object['sede'],
                'id_area' => $object['id_area'],
                'obra_fase' => $object['obra'],
                'campamento' => $object['campamento'],
                'dni_inspeccionado' => $object['dni_usuario'],
                'dni_responsable' => $object['dni_responsable'],
                'informe' => $object['informe'],
                'fecha' => $object['fecha'],
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

            $query = $conexion_bbdd->prepare('INSERT INTO instalacion_electrica_detalle(
                id_instalacion_electrica,
                id_instalacion_electrica_pregunta,
                estado,
                observacion)
            VALUES (
                :id_instalacion_electrica,
                :id_instalacion_electrica_pregunta,
                :estado,
                :observacion
                )');

            $index = 1;

            foreach($listaDetalle as $detalle) {
                
                $query->bindParam(':id_instalacion_electrica', $id , PDO::PARAM_INT);
                $query->bindParam(':id_instalacion_electrica_pregunta',$index, PDO::PARAM_INT);
                $query->bindParam(':estado', $detalle['estado'] , PDO::PARAM_INT);
                $query->bindParam(':observacion', $detalle['observacion'] , PDO::PARAM_INT);

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

            $query = $conexion_bbdd->prepare('INSERT INTO instalacion_electrica_detalle(
                id_instalacion_electrica,
                id_instalacion_electrica_pregunta,
                estado,
                observacion)
            VALUES (
                :id_instalacion_electrica,
                :id_instalacion_electrica_pregunta,
                :estado,
                :observacion
                )');

            $index = 1;

            foreach(json_decode($listaDetalle) as $detalle) {
                
                $query->bindParam(':id_instalacion_electrica', $id , PDO::PARAM_INT);
                $query->bindParam(':id_instalacion_electrica_pregunta',$index, PDO::PARAM_INT);
                $query->bindParam(':estado', $detalle->estado , PDO::PARAM_INT);
                $query->bindParam(':observacion', $detalle->observacion , PDO::PARAM_INT);

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