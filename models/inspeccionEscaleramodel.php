<?php

class InspeccionEscaleraModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($object){

        try {


            $conexion_bbdd = $this->db->connect();

            $query = $conexion_bbdd->prepare('INSERT INTO inspeccion_escalera (
            sede,
            id_area,
            dni_supervisor,
            empresa,
            dni_inspeccionado,
            fecha)
            VALUES (
            :sede,
            :id_area,
            :dni_supervisor,
            :empresa,
            :dni_inspeccionado,
            :fecha
            )');
            
            $query->execute([
                'sede' => $object['sede'],
                'id_area' => $object['id_area'],
                'dni_supervisor' => $object['dni_supervisor'],
                'empresa' => $object['empresa'],
                'dni_inspeccionado' => $object['dni_inspeccionado'],
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

            $query = $conexion_bbdd->prepare('INSERT INTO inspeccion_escalera_detalle(
                id_inspeccion_escalera,
                codigo,
                id_tipo_escalera,
                id_condicion,
                comentario
                )
            VALUES (
                :id_inspeccion_escalera,
                :codigo,
                :id_tipo_escalera,
                :id_condicion,
                :comentario
                )');

            foreach($listaDetalle as $detalle) {
                
                $query->bindParam(':id_inspeccion_escalera', $id , PDO::PARAM_INT);
                $query->bindParam(':codigo', $detalle['codigo'] , PDO::PARAM_STR);
                $query->bindParam(':id_tipo_escalera', $detalle['tipo'] , PDO::PARAM_INT);
                $query->bindParam(':id_condicion', $detalle['condicion'] , PDO::PARAM_INT);
                $query->bindParam(':comentario', $detalle['comentario'] , PDO::PARAM_STR);

                $query->execute();
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

            $query = $conexion_bbdd->prepare('INSERT INTO inspeccion_escalera_detalle(
                id_inspeccion_escalera,
                codigo,
                id_tipo_escalera,
                id_condicion,
                comentario
                )
            VALUES (
                :id_inspeccion_escalera,
                :codigo,
                :id_tipo_escalera,
                :id_condicion,
                :comentario
                )');

            foreach(json_decode($listaDetalle) as $detalle) {
                
                $query->bindParam(':id_inspeccion_escalera', $id , PDO::PARAM_INT);
                $query->bindParam(':codigo', $detalle->codigo , PDO::PARAM_STR);
                $query->bindParam(':id_tipo_escalera', $detalle->tipo , PDO::PARAM_INT);
                $query->bindParam(':id_condicion', $detalle->condicion , PDO::PARAM_INT);
                $query->bindParam(':comentario', $detalle->comentario , PDO::PARAM_STR);

                $query->execute();
            }

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}