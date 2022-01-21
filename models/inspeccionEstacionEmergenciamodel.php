<?php

class InspeccionEstacionEmergenciaModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($object){

        try {

            $conexion_bbdd = $this->db->connect();

            $query = $conexion_bbdd->prepare('INSERT INTO inspeccion_estacion_emergencia (
                id_tipo_inspeccion,
                sede,
                id_area,
                lugar_inspeccion,
                estacion,
                dni_inspeccionado,
                dni_responsable,
                observacion,
                fecha)
			    VALUES (
                :id_tipo_inspeccion,
                :sede,
                :id_area,
                :lugar_inspeccion,
                :estacion,
                :dni_inspeccionado,
                :dni_responsable,
                :observacion,
                :fecha)');
            
            $query->execute([
                'id_tipo_inspeccion' =>$object['id_tipo_inspeccion'],
                'sede' => $object['sede'],
                'id_area' => $object['id_area'],
                'lugar_inspeccion' => $object['lugar_inspeccion'],
                'estacion' => $object['estacion'],
                'dni_inspeccionado' => $object['dni_inspeccionado'],
                'dni_responsable' => $object['dni_responsable'],
                'observacion' => $object['observacion'],
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

            $query = $conexion_bbdd->prepare('INSERT INTO inspeccion_estacion_emergencia_detalle(
                id_inspeccion_estacion_emergencia,
                id_inspeccion_estacion_emergencia_pregunta,
                condicion,
                clasificacion,
                accion_correctiva,
                dni_responsable,
                fecha_cumplimiento,
                seguimiento,
                evidencia
                )
            VALUES (:id_inspeccion_estacion_emergencia,:id_inspeccion_estacion_emergencia_pregunta,:condicion,:clasificacion,:accion_correctiva,:dni_responsable,:fecha_cumplimiento,:seguimiento,:evidencia)');

            $index = 1;

            foreach($listaDetalle as $detalle) {
                
                $query->bindParam(':id_inspeccion_estacion_emergencia', $id , PDO::PARAM_INT);
                $query->bindParam(':id_inspeccion_estacion_emergencia_pregunta',$index, PDO::PARAM_INT);
                $query->bindParam(':condicion', $detalle['condicion'] , PDO::PARAM_INT);
                $query->bindParam(':clasificacion', $detalle['clasificacion'] , PDO::PARAM_STR);
                $query->bindParam(':accion_correctiva', $detalle['accion_correctiva'] , PDO::PARAM_STR);
                $query->bindParam(':dni_responsable', $detalle['dni_responsable'] , PDO::PARAM_STR);
                $query->bindParam(':fecha_cumplimiento', $detalle['fecha_cumplimiento'] , PDO::PARAM_STR);
                $query->bindParam(':seguimiento', $detalle['seguimiento'] , PDO::PARAM_STR);
                $query->bindParam(':evidencia', $detalle['evidencia'] , PDO::PARAM_STR);

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

            $query = $conexion_bbdd->prepare('INSERT INTO inspeccion_estacion_emergencia_detalle(
                id_inspeccion_estacion_emergencia,
                id_inspeccion_estacion_emergencia_pregunta,
                condicion,
                clasificacion,
                accion_correctiva,
                dni_responsable,
                fecha_cumplimiento,
                seguimiento,
                evidencia
                )
            VALUES (:id_inspeccion_estacion_emergencia,:id_inspeccion_estacion_emergencia_pregunta,:condicion,:clasificacion,:accion_correctiva,:dni_responsable,:fecha_cumplimiento,:seguimiento,:evidencia)');

            $index = 0;

            foreach(json_decode($listaDetalle) as $detalle) {
                
                $query->bindParam(':id_inspeccion_estacion_emergencia', $id , PDO::PARAM_INT);
                $query->bindParam(':id_inspeccion_estacion_emergencia_pregunta',$index, PDO::PARAM_INT);
                $query->bindParam(':condicion', $detalle->condicion , PDO::PARAM_INT);
                $query->bindParam(':clasificacion', $detalle->clasificacion , PDO::PARAM_STR);
                $query->bindParam(':accion_correctiva', $detalle->accion_correctiva , PDO::PARAM_STR);
                $query->bindParam(':dni_responsable', $detalle->dni_responsable , PDO::PARAM_STR);
                $query->bindParam(':fecha_cumplimiento', $detalle->fecha_cumplimiento , PDO::PARAM_STR);
                $query->bindParam(':seguimiento', $detalle->seguimiento , PDO::PARAM_STR);
                $query->bindParam(':evidencia', $detalle->evidencia , PDO::PARAM_STR);

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