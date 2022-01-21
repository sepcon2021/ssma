<?php

class InspeccionTallerModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($object){

        try {

            $conexion_bbdd = $this->db->connect();

            $query = $conexion_bbdd->prepare('INSERT INTO 
            inspeccion_taller (
                sede,
                id_area,
                lugar,
                dni_inspeccionado,
                dni_responsable,
                fecha)
			VALUES (
                :sede,
                :id_area,
                :lugar,
                :dni_inspeccionado,
                :dni_responsable,
                :fecha)');
            
            $query->execute([
                'sede' => $object['sede'],
                'id_area' => $object['id_area'],
                'lugar' => $object['lugar'],
                'dni_inspeccionado' => $object['dni_inspeccionado'],
                'dni_responsable' => $object['dni_responsable'],
                'fecha' => $object['fecha']

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

            $query = $conexion_bbdd->prepare('INSERT INTO inspeccion_taller_detalle(
                id_inspeccion_taller,
                id_inspeccion_taller_pregunta,
                id_inspeccion_taller_calificacion,
                observacion)
            VALUES (
                :id_inspeccion_taller,
                :id_inspeccion_taller_pregunta,
                :id_inspeccion_taller_calificacion,
                :observacion)');

            $index = 1;

            foreach($listaDetalle as $detalle) {
                
                $query->bindParam(':id_inspeccion_taller', $id , PDO::PARAM_INT);
                $query->bindParam(':id_inspeccion_taller_pregunta',$index, PDO::PARAM_INT);
                $query->bindParam(':id_inspeccion_taller_calificacion', isset($detalle['calificacion']) ? $detalle['calificacion'] : 5 , PDO::PARAM_INT);
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

            $query = $conexion_bbdd->prepare('INSERT INTO inspeccion_taller_detalle(
                id_inspeccion_taller,
                id_inspeccion_taller_pregunta,
                id_inspeccion_taller_calificacion,
                observacion)
            VALUES (
                :id_inspeccion_taller,
                :id_inspeccion_taller_pregunta,
                :id_inspeccion_taller_calificacion,
                :observacion)');

            $index = 1;

            foreach( json_decode($listaDetalle) as $detalle) {

                $calificacion = isset($detalle->calificacion) ? $detalle->calificacion : 5 ;
                $observacion =  $detalle->observacion;
                
                $query->bindParam(':id_inspeccion_taller', $id , PDO::PARAM_INT);
                $query->bindParam(':id_inspeccion_taller_pregunta',$index, PDO::PARAM_INT);
                $query->bindParam(':id_inspeccion_taller_calificacion', $calificacion , PDO::PARAM_INT);
                $query->bindParam(':observacion',$observacion , PDO::PARAM_STR);

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