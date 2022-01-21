<?php

class IpercModel extends Model {
    public function __construct()
    {
        parent::__construct();
    }


    //INSERTAMOS EN LA TABLA IPERC

    public function insertiperc($datos){
        try {

            $conexion_bbdd= $this->db->connect();

            $query =  $conexion_bbdd->prepare('INSERT INTO IPERC
            (IDPROYECTO,IDAREA,UBICACION,NOMBRE_TAREA,FECHA,IDUSUARIO,EMPRESA,RIESGO1,
            COMENTARIO1,RIESGO2,COMENTARIO2,RIESGO3,COMENTARIO3,RIESGO4,COMENTARIO4,RIESGO5,
            COMENTARIO5,RIESGO6,COMENTARIO6,RIESGO7,COMENTARIO7,RIESGO8,COMENTARIO8,RIESGO9,
            COMENTARIO9,RIESGO10,COMENTARIO10,RIESGO11,COMENTARIO11,RIESGO12,COMENTARIO12,
            RIESGO13,COMENTARIO13,RIESGO14,COMENTARIO14,RIESGO15,COMENTARIO15,RIESGO16,COMENTARIO16,
            
            RIESGO_CRITICO1,RIESGO_CRITICO2,RIESGO_CRITICO3,RIESGO_CRITICO4,RIESGO_CRITICO5,RIESGO_CRITICO6,RIESGO_CRITICO7,RIESGO_CRITICO8,RIESGO_CRITICO9,
            RIESGO_MANOS1,RIESGO_MANOS2,RIESGO_MANOS3,
            RIESGO_COVID2,RIESGO_COVID3,RIESGO_COVID4,RIESGO_COVID5,RIESGO_COVID6, RIESGO_COVID7,IDAREAOBSERVADA,URL_PDF)
            
            VALUES 
            
            (:idProyecto,:idArea,:ubicacion,:nombre_tarea,:fecha,:idusuario,:empresa,
            :riesgo1,:comentario1,:riesgo2,:comentario2,:riesgo3,:comentario3,:riesgo4,:comentario4,:riesgo5,:comentario5,
            :riesgo6,:comentario6,:riesgo7,:comentario7,:riesgo8,:comentario8,:riesgo9,:comentario9,:riesgo10,:comentario10,
            :riesgo11,:comentario11,:riesgo12,:comentario12,:riesgo13,:comentario13,:riesgo14,:comentario14,:riesgo15,:comentario15,
            :riesgo16,:comentario16,
            :riesgo_critico1,:riesgo_critico2,:riesgo_critico3,:riesgo_critico4,:riesgo_critico5,:riesgo_critico6,:riesgo_critico7,:riesgo_critico8,:riesgo_critico9,
            :riesgo_manos1,:riesgo_manos2,:riesgo_manos3,
            :riesgo_covid2,:riesgo_covid3,:riesgo_covid4,:riesgo_covid5,:riesgo_covid6,:riesgo_covid7,:idAreaObservada,:url_pdf) ');
           
           
           $query->execute([

            'idProyecto'=>	$datos['idProyecto'],
            'idArea'=>	$datos['idArea'],
            'ubicacion'=>$datos['ubicacion'],
            'nombre_tarea'=>$datos['nombre_tarea'],
            'fecha'=>	$datos['fecha'],
            'idusuario' =>	$datos['idusuario'],
            'empresa' =>	$datos['empresa'],
            'riesgo1'=>	$datos['riesgo1'],
            'comentario1'=>	$datos['comentario1'],
            'riesgo2' => $datos['riesgo2'],
            'comentario2'=>	$datos['comentario2'],
            'riesgo3'=>	$datos['riesgo3'],
            'comentario3'=>	$datos['comentario3'],
            'riesgo4'=>	$datos['riesgo4'],
            'comentario4'=>	$datos['comentario4'],
            'riesgo5'=>	$datos['riesgo5'],
            'comentario5'=>	$datos['comentario5'],
            'riesgo6'=>	$datos['riesgo6'],
            'comentario6'=>	$datos['comentario6'],
            'riesgo7'=>	$datos['riesgo7'],
            'comentario7'=>	$datos['comentario7'],
            'riesgo8'=>	$datos['riesgo8'],
            'comentario8'=>	$datos['comentario8'],
            'riesgo9'=>	$datos['riesgo9'],
            'comentario9'=>	$datos['comentario9'],
            'riesgo10'=>	$datos['riesgo10'],
            'comentario10'=>	$datos['comentario10'],
            'riesgo11'=>	$datos['riesgo11'],
            'comentario11'=>	$datos['comentario11'],
            'riesgo12'=>	$datos['riesgo12'],
            'comentario12'=>	$datos['comentario12'],
            'riesgo13'=>	$datos['riesgo13'],
            'comentario13'=>	$datos['comentario13'],
            'riesgo14'=>	$datos['riesgo14'],
            'comentario14'=>	$datos['comentario14'],
            'riesgo15'=>	$datos['riesgo15'],
            'comentario15'=>	$datos['comentario15'],
            'riesgo16'=>	$datos['riesgo16'],
            'comentario16'=>	$datos['comentario16'],
            'riesgo_critico1'=>	$datos['riesgo_critico1'],
            'riesgo_critico2'=>	$datos['riesgo_critico2'],
            'riesgo_critico3'=>	$datos['riesgo_critico3'],
            'riesgo_critico4'=>	$datos['riesgo_critico4'],
            'riesgo_critico5'=>	$datos['riesgo_critico5'],
            'riesgo_critico6'=>	$datos['riesgo_critico6'],
            'riesgo_critico7'=>	$datos['riesgo_critico7'],
            'riesgo_critico8'=>	$datos['riesgo_critico8'],
            'riesgo_critico9'=>	$datos['riesgo_critico9'],
            'riesgo_manos1'=>	$datos['riesgo_manos1'],
            'riesgo_manos2'=>	$datos['riesgo_manos2'],
            'riesgo_manos3'=>	$datos['riesgo_manos3'],
            'riesgo_covid2'=>	$datos['riesgo_covid2'],
            'riesgo_covid3'=>	$datos['riesgo_covid3'],
            'riesgo_covid4'=>	$datos['riesgo_covid4'],
            'riesgo_covid5'=>	$datos['riesgo_covid5'],
            'riesgo_covid6'=>	$datos['riesgo_covid6'],
            'riesgo_covid7'=>	$datos['riesgo_covid7'],
             'idAreaObservada'=>   $datos['idAreaObservada'],
             'url_pdf'=>   ''

                             ]);


            $last_insert_id = $conexion_bbdd->lastInsertId();

            return $last_insert_id;
            
        } catch (PDOException $e) {
            //echo $e->getMessage();
            return null;
        }
    }

    function findByIdIperc($idIperc)
    {

        $rowOpt = array();

        $query = $this->db->connect()->prepare("SELECT id,
            nombre_proyecto,
            nombre_area,
            area_observada,
            ubicacion,
            nombre_tarea ,
            CAST(fecha AS DATE) AS fecha,
            nombres_usuario,
            apellidos_usuario,
            empresa,
            registro ,
        
            riesgo1 ,
            comentario1 ,
            riesgo2 ,
            comentario2 ,
            riesgo3 ,
            comentario3 ,
            riesgo4 ,
            comentario4 ,
            riesgo5 ,
            comentario5 ,
            riesgo6 ,
            comentario6 ,
            riesgo7 ,
            comentario7 ,
            riesgo8 ,
            comentario8 ,
            riesgo9 ,
            comentario9 ,
            riesgo10 ,
            comentario10 ,
            riesgo11 ,
            comentario11 ,
            riesgo12 ,
            comentario12 ,
            riesgo13 ,
            comentario13 ,
            riesgo14 ,
            comentario14 ,
            riesgo15 ,
            comentario15 ,
            riesgo16 ,
            comentario16 ,
            riesgo_critico1 ,
            riesgo_critico2 ,
            riesgo_critico3 ,
            riesgo_critico4 ,
            riesgo_critico5 ,
            riesgo_critico6 ,
            riesgo_critico7 ,
            riesgo_critico8 ,
            riesgo_critico9 ,
            riesgo_manos1 ,
            riesgo_manos2 ,
            riesgo_manos3 ,
            riesgo_covid1 ,
            riesgo_covid2 ,
            riesgo_covid3 ,
            riesgo_covid4 ,
            riesgo_covid5 ,
            riesgo_covid6 ,
            riesgo_covid7 FROM view_iperc WHERE id = '$idIperc' ");

        try {

            $query->execute();

            while ($row = $query->fetch()) {
                $rowOpt = $row;
            }

            return $rowOpt;
        } catch (PDOException $e) {
            return [];
        }
    }



    public function actualizarUrlPdfIperc($id, $urlPdf)
    {

        echo "UPDATE iperc SET url_pdf = '$urlPdf' WHERE id = '$id' ";
        
        $query = $this->db->connect()->prepare("UPDATE iperc SET url_pdf = :url_pdf WHERE id = :id ");

        try {

            $query->execute(['url_pdf'  => $urlPdf, 'id' => $id]);

            return true;
        } catch (PDOException $e) {
            return $e->json_last_error_msg;
        }
    }

    public function getUrlPdf($id)
    {
        $url_foto = [];

        $query = $this->db->connect()->prepare('SELECT url_pdf FROM iperc WHERE id = :id ');

        $query->execute(['id' => $id]);

        try {

            while ($rs = $query->fetch()) {

                $url_foto = $rs;
            }

            return $url_foto;

        } catch (PDOException $e) {
            return [];
        }
    }


  
}

?>

