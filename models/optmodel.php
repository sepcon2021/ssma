<?php

class OptModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }


    //INSERTAMOS EN LA TABLA OPT

    public function insertopt($datos)
    {
        try {

            $conexion_bbdd = $this->db->connect();

            $query =  $conexion_bbdd->prepare('INSERT INTO opt (NOMBRE,TIEMPO_PROYECTO,TIEMPO_TRABAJO,AREA,
                                                                    GUARDIA,OCUPACION,TAREA,FECHA,RAZON_OPT,
                                                                    FIRMA_GERENTE,IDUSUARIO,
                                                                    IDPROYECTO,IDAREA,IDAREAOBSERVADA,UBICACION,OPORTUNIDADES,URL_PDF,RESPONSABLE,IDRIESGOCRITICO,IDPETLOG)
                                                                     values 
                                                                    
                                          (:nombre,:tiempo_proyecto,:tiempo_trabajo,:area,
                                                                    :guardia,
                                                                    :ocupacion,:tarea,:fecha,
                                                                    :razon_opt,:firma_gerente,:idusuario,
                                                                    :idproyecto,:idarea,:idareaobservada,:ubicacion,:oportunidades,:url_pdf,:responsable,:idRiesgoCritico,:idPetLog)');
            $query->execute([

                'nombre' => $datos['nombre'],
                'tiempo_proyecto' => $datos['tiempo_proyecto'],
                'tiempo_trabajo' => $datos['tiempo_trabajo'],
                'area' => $datos['area'],
                'guardia' => $datos['guardia'],
                'ocupacion' => $datos['ocupacion'],
                'tarea' => $datos['tarea'],
                'fecha' => $datos['fecha'],
                'razon_opt' => $datos['razon_opt'],
                'firma_gerente' => $datos['firma_gerente'],
                'idusuario' => $datos['idusuario'],
                'oportunidades' => $datos['oportunidades'],
                'idproyecto' => $datos['idProyecto'],
                'idarea' => $datos['idArea'],
                'idareaobservada' => $datos['idAreaObservada'],
                'ubicacion' => $datos['ubicacion'],
                'url_pdf' => '',
                'responsable' => $datos['responsable'],
                'idRiesgoCritico' => $datos['idRiesgoCritico'],
                'idPetLog' => $datos['idPetLog']
            ]);


            $last_insert_id = $conexion_bbdd->lastInsertId();

            return $last_insert_id;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }


    public function insertOptObservacion($datos)
    {
        try {
            $conexion_bbdd = $this->db->connect();

            $query =  $conexion_bbdd->prepare('INSERT INTO optobservacion (IDOPT,PASOS,OBSERVACIONES) values 
                                                        (:idOpt,:pasos,:observaciones)');
            $query->execute([
                'idOpt' => $datos['idOpt'],
                'pasos' => $datos['pasos'],
                'observaciones' => $datos['observaciones']
            ]);


            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }


    public function insertOptRecomendaciones($datos)
    {
        try {
            $conexion_bbdd = $this->db->connect();

            $query =  $conexion_bbdd->prepare('INSERT INTO optrecomendaciones (IDOPT,ACCIONES,FECHA) values 
                                                        (:idOpt,:acciones,:fecha)');
            $query->execute([
                'idOpt' => $datos['idOpt'],
                'acciones' => $datos['acciones'],
                'fecha' => $datos['fecha']
            ]);


            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function insertOptObservadores($datos)
    {
        try {
            $conexion_bbdd = $this->db->connect();

            $query =  $conexion_bbdd->prepare('INSERT INTO optobservadores (IDOPT,NOMBRE) values 
                                                        (:idOpt,:nombre)');
            $query->execute([
                'idOpt' => $datos['idOpt'],
                'nombre' => $datos['nombre'],
               
            ]);


            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function insertOptSeguimiento($datos)
    {
        try {
            $conexion_bbdd = $this->db->connect();

            $query =  $conexion_bbdd->prepare('INSERT INTO optseguimiento (IDOPT,ACCIONES,FECHA) values 
                                                        (:idOpt,:acciones,:fecha)');
            $query->execute([
                'idOpt' => $datos['idOpt'],
                'acciones' => $datos['acciones'],
                'fecha' => $datos['fecha']
            ]);


            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }


    public function buscarByIdOpt($idOpt)
    {

        $rowOpt = array();

        $query = $this->db->connect()->prepare("SELECT
        id ,
        usuario_nombres ,
        usuario_apellidos ,
        proyecto_nombre ,
        area_nombre ,
        ubicacion,
        area_observada_nombre,
        tiempo_proyecto,
        fecha ,
        registro ,
        nombre ,
        tiempo_trabajo,
        guardia,
        ocupacion ,
        tarea ,
        razon_opt ,
        oportunidades ,
        firma_gerente ,
        area,
        responsable,
        riesgoCritico,
        petLog
        FROM view_opt WHERE id = '$idOpt' ORDER BY registro desc");
        try {

            $query->execute();

            while ($row = $query->fetch()) {
                $rowOpt = array(
                    "opt" => $row,
                    "optObservacion" => $this->buscarByIdOptObservaciones($idOpt),
                    "optObservadores" => $this->buscarByIdOptObservadores($idOpt),
                    "optRecomendaciones" => $this->buscarByIdOptRecomendaciones($idOpt)
                );
            }

            return $rowOpt;
        } catch (PDOException $e) {
            return [];
        }
    }


    public function buscarByIdOptObservaciones($idOpt)
    {

        $arrayOptObservaciones = array();

        $query = $this->db->connect()->prepare("SELECT id,pasos,observaciones FROM optobservacion WHERE idOpt=  $idOpt ");
        try {

            $query->execute();

            while ($row = $query->fetch()) {
               
                array_push($arrayOptObservaciones,$row);

            }

            return $arrayOptObservaciones;

        } catch (PDOException $e) {
            return [];
        }
    }

    
    public function buscarByIdOptObservadores($idOpt)
    {

        $arrayOptObservadores = array();

        $query = $this->db->connect()->prepare("SELECT id,nombre FROM optobservadores WHERE idOpt= $idOpt ");
        try {

            $query->execute();

            while ($row = $query->fetch()) {
               
                array_push($arrayOptObservadores,$row);

            }

            return $arrayOptObservadores;

        } catch (PDOException $e) {
            return [];
        }
    }

    public function buscarByIdOptRecomendaciones($idOpt)
    {

        $arrayOptRecomendacion = array();

        $query = $this->db->connect()->prepare("SELECT id,acciones,CAST(fecha AS DATE) AS fecha FROM optrecomendaciones WHERE idOpt= $idOpt");
        try {

            $query->execute();

            while ($row = $query->fetch()) {
               
                array_push($arrayOptRecomendacion,$row);

            }

            return $arrayOptRecomendacion;

        } catch (PDOException $e) {
            return [];
        }
    }


    public function actualizarUrlPdfOpt($idOpt, $urlPdf)
    {

        $query = $this->db->connect()->prepare("UPDATE opt SET url_pdf = :url_pdf WHERE id = :id ");

        try {

            $query->execute(['url_pdf'  => $urlPdf, 'id' => $idOpt]);

            return true;
        } catch (PDOException $e) {
            return $e->intl_get_error_message;
        }
    }

    public function getUrlPdf($id)
    {
        $url_foto = [];

        $query = $this->db->connect()->prepare('SELECT url_pdf FROM opt WHERE id = :id ');

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
