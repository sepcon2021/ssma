<?php 

class InspeccionCamillaModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($object){

        try {

            $conexion_bbdd = $this->db->connect();

            $query = $conexion_bbdd->prepare('INSERT INTO inspeccion_camilla (
                id_tipo_inspeccion,
                sede,
                id_area,
                lugar_inspeccion,
                dni_inspeccionado,
                dni_responsable,
                observacion_uno,
                observacion_dos,
                observacion_tres,
                fecha)
			    VALUES (
                :id_tipo_inspeccion,
                :sede,
                :id_area,
                :lugar_inspeccion,
                :dni_inspeccionado,
                :dni_responsable,
                :observacion_uno,
                :observacion_dos,
                :observacion_tres,
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

            $query = $conexion_bbdd->prepare('INSERT INTO inspeccion_camilla_detalle(
                id_inspeccion_camilla,
                ubicacion,
                condicion_camilla,
                collarin_cervical,
                fijador_cabezera,
                ubicacion_camilla,
                senalizacion_camilla,
                ferula_neumatica,
                arnes_sujecion,
                proteccion_camilla,
                clasificacion,
                accion_correctiva,
                fecha_cumplimiento,
                seguimiento)
            VALUES (
                :id_inspeccion_camilla,
                :ubicacion,
                :condicion_camilla,
                :collarin_cervical,
                :fijador_cabezera,
                :ubicacion_camilla,
                :senalizacion_camilla,
                :ferula_neumatica,
                :arnes_sujecion,
                :proteccion_camilla,
                :clasificacion,
                :accion_correctiva,
                :fecha_cumplimiento,
                :seguimiento
            )');


            foreach($listaDetalle as $detalle) {
                
                $query->bindParam(':id_inspeccion_camilla', $id , PDO::PARAM_INT);
                $query->bindParam(':ubicacion', $detalle['ubicacion'] , PDO::PARAM_INT);
                $query->bindParam(':condicion_camilla', $detalle['condicion_camilla'] , PDO::PARAM_STR);
                
                $query->bindParam(':collarin_cervical', $detalle['collarin_cervical'] , PDO::PARAM_STR);
                $query->bindParam(':fijador_cabezera', $detalle['fijador_cabezera'] , PDO::PARAM_STR);
                $query->bindParam(':ubicacion_camilla', $detalle['ubicacion_camilla'] , PDO::PARAM_STR);
                $query->bindParam(':senalizacion_camilla', $detalle['senalizacion_camilla'] , PDO::PARAM_STR);
                $query->bindParam(':ferula_neumatica', $detalle['ferula_neumatica'] , PDO::PARAM_STR);
                $query->bindParam(':arnes_sujecion', $detalle['arnes_sujecion'] , PDO::PARAM_STR);
                $query->bindParam(':proteccion_camilla', $detalle['proteccion_camilla'] , PDO::PARAM_STR);


                $query->bindParam(':clasificacion', $detalle['clasificacion'] , PDO::PARAM_STR);
                $query->bindParam(':accion_correctiva', $detalle['accion_correctiva'] , PDO::PARAM_STR);
                $query->bindParam(':fecha_cumplimiento', $detalle['fecha_cumplimiento'] , PDO::PARAM_STR);
                $query->bindParam(':seguimiento', $detalle['seguimiento'] , PDO::PARAM_STR);

                $query->execute();

            }

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}