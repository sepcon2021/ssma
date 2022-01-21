<?php

class InspeccionOficinasModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($object){

        try {

            $conexion_bbdd = $this->db->connect();

            $query = $conexion_bbdd->prepare('INSERT INTO 
            inspeccion_oficina (
                id_tipo_inspeccion,
                sede,
                id_area,
                lugar_inspeccion,
                dni_inspeccionado,
                dni_responsable,
                observacion_uno,observacion_dos,observacion_tres,
                fecha)
			VALUES (
                :id_tipo_inspeccion,
                :sede,
                :id_area,
                :lugar_inspeccion,
                :dni_inspeccionado,
                :dni_responsable,
                :observacion_uno,:observacion_dos,:observacion_tres,
                :fecha)');
            
            $query->execute([
                'id_tipo_inspeccion' =>$object['id_tipo_inspeccion'],
                'sede' => $object['sede'],
                'id_area' => $object['id_area'],
                'lugar_inspeccion' => $object['lugar_inspeccion'],
                'dni_inspeccionado' => $object['dni_inspeccionado'],
                'dni_responsable' => $object['dni_responsable'],
                'observacion_uno' => $object['observacion_uno'],
                'observacion_dos' => $object['observacion_dos'],
                'observacion_tres' => $object['observacion_tres'],
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

            $query = $conexion_bbdd->prepare('INSERT INTO inspeccion_oficina_detalle(
                id_inspeccion_oficina,
                respuesta,
                condicion,
                calificacion,
                accion_correctiva,
                dni_responsable,
                fecha_cumplimiento,
                seguimiento,id_inspeccion_oficina_pregunta,evidencia)
            VALUES (:id_inspeccion_oficina,:respuesta,:condicion,:calificacion,:accion_correctiva,:dni_responsable,:fecha_cumplimiento,:seguimiento,:id_inspeccion_oficina_pregunta,:evidencia)');

            $index = 1;

            foreach($listaDetalle as $detalle) {
                
                $query->bindParam(':id_inspeccion_oficina', $id , PDO::PARAM_INT);
                $query->bindParam(':respuesta', $detalle['respuesta'] , PDO::PARAM_INT);
                $query->bindParam(':condicion', $detalle['condicion'] , PDO::PARAM_STR);
                $query->bindParam(':calificacion', $detalle['calificacion'] , PDO::PARAM_STR);
                $query->bindParam(':accion_correctiva', $detalle['accion_correctiva'] , PDO::PARAM_STR);
                $query->bindParam(':dni_responsable', $detalle['dni_responsable'] , PDO::PARAM_STR);
                $query->bindParam(':fecha_cumplimiento', $detalle['fecha_cumplimiento'] , PDO::PARAM_STR);
                $query->bindParam(':seguimiento', $detalle['seguimiento'] , PDO::PARAM_STR);
                $query->bindParam(':id_inspeccion_oficina_pregunta',$index, PDO::PARAM_INT);
                $query->bindParam(':evidencia',$detalle['archivos'], PDO::PARAM_STR);

                
                $query->execute();
                $index++;
            }

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function insertDetallesMovil($listaDetalle,$id)
    {
        try {


            $conexion_bbdd = $this->db->connect();

            $query = $conexion_bbdd->prepare('INSERT INTO inspeccion_oficina_detalle(
                id_inspeccion_oficina,
                respuesta,
                condicion,
                calificacion,
                accion_correctiva,
                dni_responsable,
                fecha_cumplimiento,
                seguimiento,id_inspeccion_oficina_pregunta,evidencia)
            VALUES (:id_inspeccion_oficina,:respuesta,:condicion,:calificacion,:accion_correctiva,:dni_responsable,:fecha_cumplimiento,:seguimiento,:id_inspeccion_oficina_pregunta,:evidencia)');

            $index = 1;

            foreach( json_decode($listaDetalle) as $detalle) {

                $prueba = '';
                $respuesta =  intval($detalle->respuesta);
                $clasificacion =  intval($detalle->clasificacion);

                $query->bindParam(':id_inspeccion_oficina', $id , PDO::PARAM_INT);
                $query->bindParam(':respuesta', $respuesta , PDO::PARAM_INT);
                $query->bindParam(':condicion', $detalle->condicion , PDO::PARAM_STR);
                $query->bindParam(':calificacion', $clasificacion , PDO::PARAM_INT);
                $query->bindParam(':accion_correctiva', $detalle->accion_correctiva , PDO::PARAM_STR);
                $query->bindParam(':dni_responsable', $detalle->dni_responsable , PDO::PARAM_STR);
                $query->bindParam(':fecha_cumplimiento', $detalle->fecha_cumplimiento , PDO::PARAM_STR);
                $query->bindParam(':seguimiento', $detalle->seguimiento , PDO::PARAM_STR);
                $query->bindParam(':id_inspeccion_oficina_pregunta',$index, PDO::PARAM_INT);
                $query->bindParam(':evidencia',$prueba, PDO::PARAM_STR);

                
                $query->execute();
                $index++;

            }


        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}