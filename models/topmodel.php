<?php

require_once 'models/toppdfmodel.php';
require_once 'models/registromodel.php';

class Topmodel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare('INSERT INTO TOPS (IDTOP,SEDE,LUGAR,REPORTADO,FECHA,
                                                                            OBSERVACION,ACTINS,CONINS,ACTSEG,RELACION,
                                                                            DESCRIPCION,MEDIDAS,POTENCIAL,CONEPP,TIPEPP,
                                                                            OTROS,AREA,FOTO,IDUSER,IDAREA,IDUBICACION)
                                        VALUES (:idtop,:sede,:lugar,:reportado,:fecha,
                                                :observacion,:acsues,:cosues,:actseg,:relacion,
                                                :preventiva,:correctiva,:perdida,:conepp,:tipepp,
                                                :otros,:area,:foto,:user,:idarea,:idubicacion)');
            $query->execute([
                'idtop' => $datos['idtop'],
                'sede' => $datos['sede'],
                'lugar' => $datos['lugar'],
                'reportado' => $datos['reportado'],
                'fecha' => $datos['fecha'],
                'observacion' => $datos['observacion'],
                'acsues' => $datos['acsues'],
                'cosues' => $datos['cosues'],
                'actseg' => $datos['actseg'],
                'otros' => $datos['otros'],
                'relacion' => $datos['relacion'],
                'tipepp' => $datos['tipepp'],
                'conepp' => $datos['conepp'],
                'preventiva' => $datos['preventiva'],
                'correctiva' => $datos['correctiva'],
                'perdida' => $datos['perdida'],
                'area' => $datos['area'],
                'foto' => $datos['foto'],
                'user' => $datos['user'],
                'idarea' => $datos['areaGeneral'],
                'idubicacion' => $datos['ubicacionGeneral'],
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function insertMovil($datos)
    {
        try {

            $conexion_bbdd = $this->db->connect();

            $query = $conexion_bbdd->prepare('INSERT INTO TOPS (IDTOP,SEDE,LUGAR,REPORTADO,FECHA,
                                                                            OBSERVACION,ACTINS,CONINS,ACTSEG,RELACION,
                                                                            DESCRIPCION,MEDIDAS,POTENCIAL,CONEPP,TIPEPP,
                                                                            OTROS,AREA,FOTO,IDUSER,IDAREA,IDUBICACION,

                                                                            OBSERVADO_LUGAR,OBSERVADO_PUESTO,IDOBSERVADO_TIEMPO,
                                                                            IDOBSERVADO_HORA ,IDOBSERVADO_EDAD,
                                                                            IDOBSERVADO_LESION ,IDOBSERVADO_OBSTACULO,OBSERVADO_CAMBIO,
                                                                            OBSERVADO_RETROALIMENTACION,OBSERVADO_REINCIDENTE,
                                                                            OBSERVADO_COMENTARIO,IDPROYECTODETALLE,IDPUESTOOBSERVADO)

                                            VALUES (:idtop,:sede,:lugar,:reportado,:fecha,
                                                :observacion,:acsues,:cosues,:actseg,:relacion,
                                                :preventiva,:correctiva,:perdida,:conepp,:tipepp,
                                                :otros,:area,:foto,:user,:idarea,:idubicacion,

                                                :observado_lugar,:observado_puesto,:idobservado_tiempo,
                                                :idobservado_hora ,:idobservado_edad,:idobservado_lesion,
                                                :idobservado_obstaculo,:observado_cambio,:observado_retroalimentacion,
                                                :observado_reincidente,:observado_comentario,:idproyectodetalle,:idpuestoobservado)');

            $query->execute([
                'idtop' => $datos['idtop'],
                'sede' => $datos['sede'],
                'lugar' => $datos['lugar'],
                'reportado' => $datos['reportado'],
                'fecha' => $datos['fecha'],
                'observacion' => str_pad($datos['observacion'], 2, "0", STR_PAD_LEFT),
                'acsues' => str_pad($datos['acsues'], 2, "0", STR_PAD_LEFT),
                'cosues' => str_pad($datos['cosues'], 2, "0", STR_PAD_LEFT),
                'actseg' => str_pad($datos['actseg'], 2, "0", STR_PAD_LEFT),
                'otros' => $datos['otros'],
                'relacion' => str_pad($datos['relacion'], 2, "0", STR_PAD_LEFT),
                'tipepp' => str_pad($datos['tipepp'], 2, "0", STR_PAD_LEFT),
                'conepp' => str_pad($datos['conepp'], 2, "0", STR_PAD_LEFT),
                'preventiva' => $datos['preventiva'],
                'correctiva' => $datos['correctiva'],
                'perdida' => str_pad($datos['perdida'], 2, "0", STR_PAD_LEFT),
                'area' => str_pad($datos['area'], 2, "0", STR_PAD_LEFT),
                'foto' => $datos['foto'],
                'user' => $datos['user'],
                'idarea' => '1',
                'idubicacion' => '1',
                'observado_lugar' => $datos['observado_lugar'],
                'observado_puesto' => $datos['observado_puesto'],
                'idobservado_tiempo' => $datos['idobservado_tiempo'],
                'idobservado_hora' => $datos['idobservado_hora'],
                'idobservado_edad' => $datos['idobservado_edad'],
                'idobservado_lesion' => $datos['idobservado_lesion'],
                'idobservado_obstaculo' => $datos['idobservado_obstaculo'],
                'observado_cambio' => $datos['observado_cambio'],
                'observado_retroalimentacion' => $datos['observado_retroalimentacion'],
                'observado_reincidente' => $datos['observado_reincidente'],
                'observado_comentario' => $datos['observado_comentario'],
                'idproyectodetalle' => $datos['idproyectodetalle'],
                'idpuestoobservado' => $datos['idpuestoobservado'],

            ]);

            //$last_insert_id = $conexion_bbdd->lastInsertId();

            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }




    public function insertNew($datos)
    {
        try {
            $query = $this->db->connect()->prepare('INSERT INTO TOPS2

                                                                    (
                                                                        IDPROYECTO ,
                                                                        IDAREA ,
                                                                        UBICACION ,
                                                                        IDAREAOBSERVADA  ,
                                                                        FECHA ,
                                                                        IDTOPOBSERVACION ,
                                                                        IDTOPOBSERVACIONDETALLE ,
                                                                        IDTOPRELACIONADO ,
                                                                        IDTOPTIPO ,
                                                                        IDTOPCONDICION ,
                                                                        OTROSOBSERVACION ,
                                                                        DESCRIPCION_OBSERVACION ,
                                                                        MEDIDA_CORRECTIVA ,
                                                                        IDPOTENCIAL ,
                                                                        FOTO ,

                                                                        OBSERVADO_PUESTO ,
                                                                        IDOBSERVADO_TIEMPO  ,
                                                                        IDOBSERVADO_HORA  ,
                                                                        IDOBSERVADO_EDAD  ,
                                                                        IDOBSERVADO_LESION  ,
                                                                        IDOBSERVADO_OBSTACULO  ,
                                                                        OBSERVADO_CAMBIO ,
                                                                        OBSERVADO_RETROALIMENTACION ,
                                                                        OBSERVADO_REINCIDENTE ,
                                                                        OBSERVADO_COMENTARIO ,

                                                                        IDUSUARIO ,
                                                                        USUARIO )

                                            VALUES (


                                                :idproyecto ,
                                                :idArea ,
                                                :ubicacion ,
                                                :idAreaObservada  ,
                                                :fecha,
                                                :idTopObservacion ,
                                                :idTopObservacionDetalle ,
                                                :idTopRelacionado ,
                                                :idTopTipo ,
                                                :idTopCondicion ,
                                                :otrosObservacion ,
                                                :descripcion_observacion ,
                                                :medida_correctiva ,
                                                :idPotencial ,
                                                :foto ,

                                                :observado_puesto ,
                                                :idobservado_tiempo  ,
                                                :idobservado_hora  ,
                                                :idobservado_edad  ,
                                                :idobservado_lesion  ,
                                                :idobservado_obstaculo  ,
                                                :observado_cambio ,
                                                :observado_retroalimentacion ,
                                                :observado_reincidente ,
                                                :observado_comentario ,

                                                :idUsuario ,
                                                :usuario

                                            )');

            $query->execute([
                'idproyecto' => $datos['idproyecto'],
                'idArea' => $datos['idArea'],
                'ubicacion' => $datos['ubicacion'],
                'idAreaObservada' => $datos['idAreaObservada'],
                'fecha' => $datos['fecha'],
                'idTopObservacion' => $datos['idTopObservacion'],
                'idTopObservacionDetalle' => $datos['idTopObservacionDetalle'],
                'idTopRelacionado' => $datos['idTopRelacionado'],
                'idTopTipo' => $datos['idTopTipo'],
                'idTopCondicion' => $datos['idTopCondicion'],
                'otrosObservacion' => $datos['otrosObservacion'],
                'descripcion_observacion' => $datos['descripcion_observacion'],
                'medida_correctiva' => $datos['medida_correctiva'],
                'idPotencial' => $datos['idPotencial'],
                'foto' => $datos['foto'],
                'observado_puesto' => $datos['observado_puesto'],
                'idobservado_tiempo' => $datos['idobservado_tiempo'],
                'idobservado_hora' => $datos['idobservado_hora'],
                'idobservado_edad' => $datos['idobservado_edad'],
                'idobservado_lesion' => $datos['idobservado_lesion'],
                'idobservado_obstaculo' => $datos['idobservado_obstaculo'],
                'observado_cambio' => $datos['observado_cambio'],
                'observado_retroalimentacion' => $datos['observado_retroalimentacion'],
                'observado_reincidente' => $datos['observado_reincidente'],
                'observado_comentario' => $datos['observado_comentario'],
                'idUsuario' => $datos['idUsuario'],
                'usuario' => $datos['usuario'],

            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getTopById($idtop)
    {

        $query = $this->db->connect()->prepare('SELECT
                idtop,
                lugar,
                reportado,
                fecha,
                observacion,
                actins,
                conins,
                actseg,
                relacion,
                descripcion,
                medidas,
                potencial,
                reg,
                conepp,
                tipepp,
                otros,
                area,
                foto,
                iduser,
                sede,
                observado_lugar,
                observado_puesto,
                tiempo_proyecto,
                horario_observacion,
                rango_edad,
                lesion,
                obstaculo,
                observado_cambio ,
                observado_retroalimentacion,
                observado_reincidente,
                observado_comentario,
                area_nombre

                FROM
                view_tops

                    WHERE idtop = :idtop ');


        $query->execute(['idtop' => $idtop]);

        try {

            $sede = $this->master("00");
            $obser = $this->master("01");
            $relac = $this->master("02");

            $actins = $this->master("06");
            $conins = $this->master("07");
            $acseg = $this->master("08");

            $tipo = $this->master("03");
            $condicion = $this->master("04");
            $potencial = $this->master("05");
            $area = $this->master("09");

            while ($rs = $query->fetch()) {

                $topPdfModel = new TopPdfModel();

                $rel = $rs['relacion'] != "00" ? $relac[(int) $rs['relacion']] : "OTROS";
                $tip = $rs['tipepp'] != "00" ? $tipo[(int) $rs['tipepp']] : "";
                $con = $rs['conepp'] != "00" ? $condicion[(int) $rs['conepp']] : "";
                $pot = $rs['potencial'] != "00" ? $potencial[(int) $rs['potencial']] : "";
                $area_text = $rs['area'] != "00" ? $area[(int) $rs['area']] : "";

                $observacion_detalle = "";
                if ($rs['actins'] != "00") {

                    $observacion_detalle = $actins[(int) $rs['actins']];
                } elseif ($rs['conins'] != "00") {

                    $observacion_detalle = $conins[(int) $rs['conins']];
                } elseif ($rs['actseg'] != "00") {

                    $observacion_detalle = $acseg[(int) $rs['actseg']];
                }

                $observado_cambio = $rs['observado_cambio'] == '1' ? 'Si' : 'No';
                $observado_retroalimentacion = $rs['observado_retroalimentacion'] == '1' ? 'Si' : 'No';
                $observado_reincidente = $rs['observado_reincidente'] == '1' ? 'Si' : 'No';


                $topPdfModel->id = $rs['idtop'];
                $topPdfModel->reportado = $rs['reportado'];
                $topPdfModel->sede = $sede[(int) $rs['sede']];
                $topPdfModel->area_nombre = $rs['area_nombre'];
                $topPdfModel->observado_lugar = $rs['observado_lugar'];
                $topPdfModel->area_text = $area_text;
                $topPdfModel->observado_puesto = $rs['observado_puesto'];
                $topPdfModel->tiempo_proyecto = $rs['tiempo_proyecto'];
                $topPdfModel->horario_observacion = $rs['horario_observacion'];
                $topPdfModel->rango_edad = $rs['rango_edad'];
                $topPdfModel->fecha = date("d/m/Y", strtotime($rs['fecha']));
                $topPdfModel->observacion = $this->getObservacion($rs['observacion']);
                $topPdfModel->observacion_detalle = $observacion_detalle;
                $topPdfModel->rel = $rel;
                $topPdfModel->otros = $rs['otros'];
                $topPdfModel->tip = $tip;
                $topPdfModel->con = $con;
                $topPdfModel->descripcion = $rs['descripcion'];
                $topPdfModel->medidas = $rs['medidas'];
                $topPdfModel->pot = $pot;
                $topPdfModel->foto = $rs['foto'];
                $topPdfModel->lesion = $rs['lesion'];
                $topPdfModel->obstaculo = $rs['obstaculo'];
                $topPdfModel->observado_cambio = $observado_cambio;
                $topPdfModel->observado_retroalimentacion = $observado_retroalimentacion;
                $topPdfModel->observado_reincidente = $observado_reincidente;
                $topPdfModel->observado_comentario = $rs['observado_comentario'];

                return $topPdfModel;
            }
        } catch (PDOException $e) {
            return [];
        }
    }


    public function listaTopByDni($dni,$periodo)
    {
        $periodo = $this->periodoTiempo($periodo);

        $listaTops = array();

        $query = $this->db->connect()->prepare("SELECT 

        ssma.tops.idtop,
        ssma.tops.observacion,
        ssma.tops.fecha,
        ssma.tops.reg
        
        FROM ssma.tops INNER JOIN rrhh.tabla_aquarius ON ssma.tops.iduser  = rrhh.tabla_aquarius.usuario
        WHERE rrhh.tabla_aquarius.dni = :dni  $periodo ORDER BY ssma.tops.reg DESC
        ");


        $query->execute(['dni' => $dni]);

        try {

            while ($rs = $query->fetch()) {

                $registroModel = new RegistroModel;

                $registroModel->id =  $rs['idtop'];
                $registroModel->fecha = $rs['fecha'] ;
                $registroModel->registro = $rs['reg'];
                $registroModel->observacion = $this->getObservacion($rs['observacion']);

                array_push($listaTops, $registroModel);
            }

            return $listaTops;
        } catch (PDOException $e) {
            return [];
        }
    }

    function periodoTiempo($periodo)
    {

        if ($periodo == 1) {
            $sql = 'AND CAST(ssma.tops.reg AS DATE) = CAST(now() AS DATE) ';
        }
        if ($periodo == 2) {
            $sql = 'AND CAST(ssma.tops.reg AS DATE) BETWEEN  DATE_SUB(NOW(),INTERVAL 7 DAY) AND CAST(now() AS DATE) ';
        }
        if ($periodo == 3) {
            $sql = 'AND CAST(ssma.tops.reg AS DATE) BETWEEN  DATE_SUB(NOW(),INTERVAL 30 DAY) AND CAST(now() AS DATE) ';
        }
        if ($periodo == 4) {
            $sql = '';
        }
        return $sql;
    }

    public function master($clase)
    {

        $salida = [];

        try {
            $query = $this->db->connect()->query("SELECT
                                                            general.nombre
                                                            FROM
                                                            general
                                                            WHERE
                                                            general.clase = '$clase'");

            while ($rs = $query->fetch()) {

                array_push($salida, $rs['nombre']);
            }
            return $salida;
        } catch (PDOexception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getObservacion($idObservacion)
    {
        $data = '[{"id":"01","state":false,"nombre":"Acto sub estándar "},{"id":"02","state":false,"nombre":"Condición sub estándar"},{"id":"03","state":false,"nombre":"Acto Seguro"}]';
        $json = json_decode($data, true);

        $name = "";

        foreach ($json as $value) {
            if ($value['id'] == $idObservacion) {
                $name = $value['nombre'];
            }
        }

        return $name;
    }


    public function actualizarUrlPdf($id, $urlPdf)
    {

        $query = $this->db->connect()->prepare("UPDATE tops SET url_pdf = :url_pdf WHERE idtop = :id ");

        try {

            $query->execute(['url_pdf'  => $urlPdf, 'id' => $id]);

            return true;
        } catch (PDOException $e) {
            return $e->intl_get_error_message;
        }
    }


    public function getUrlPdf($id)
    {
        $url_foto = [];

        $query = $this->db->connect()->prepare('SELECT url_pdf FROM tops WHERE idtop = :idtop ');

        $query->execute(['idtop' => $id]);

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
