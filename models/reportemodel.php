<?php

class ReporteModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function topsReport($proyecto, $fechaInicio, $fechaFin)
    {

        $TODOS_PROYECTOS = 100;
        $sedeSQL = "tops.sede <> '0$proyecto'";

        if ($proyecto != $TODOS_PROYECTOS) {
            $sedeSQL = "tops.sede = '0$proyecto'";
        }

        $statement = "SELECT 
        tops.idtop AS idtop,
        tops.lugar AS lugar,
        CONCAT(tabla_aquarius.nombres,' ',tabla_aquarius.apellidos) AS reportado,
        tops.fecha AS fecha,
        IF ( LENGTH(tops.observacion) > 0 ,tops.observacion, '-' ) AS observacion,
        IF ( LENGTH(tops.actins) > 0 ,tops.actins, '-' )  AS actins,
        IF ( LENGTH(tops.conins) > 0 ,tops.conins, '-' ) AS conins,
        IF ( LENGTH(tops.actseg) > 0 ,tops.actseg, '-' ) AS actseg,
        IF ( LENGTH(tops.relacion) > 0 ,tops.relacion, '-' ) AS relacion,
        IF ( LENGTH(tops.descripcion) > 0 ,tops.descripcion, '-' )  AS descripcion,
        IF ( LENGTH(tops.medidas) > 0 ,tops.medidas, '-' )   AS medidas,
        IF ( LENGTH(tops.potencial) > 0 ,tops.potencial, '-' )   AS potencial,
        tops.reg AS reg,
        IF ( LENGTH(tops.conepp) > 0 ,tops.conepp, '-' )   AS conepp,
        IF ( LENGTH(tops.tipepp) > 0 ,tops.tipepp, '-' )   AS tipepp,
        IF ( LENGTH(tops.otros) > 0 ,tops.otros, '-' )   AS otros,
        IF ( LENGTH(tops.area) > 0 ,tops.area, '-' )   AS area,
        IF ( LENGTH(tops.foto) > 0 ,tops.foto, '-' )   AS foto,
        IF ( LENGTH(tops.iduser) > 0 ,tops.iduser, '-' )   AS iduser,
        IF ( LENGTH(tops.sede) > 0 ,tops.sede, '-' )   AS sede,
        IF ( LENGTH(tops.observado_lugar) > 0 ,tops.observado_lugar, '-' )   AS observado_lugar,
        IF ( LENGTH(tops.observado_puesto) > 0 ,tops.observado_puesto, '-' )   AS observado_puesto,
        IF ( LENGTH(tops.idproyectodetalle) > 0 ,tops.idproyectodetalle, '-' )   AS idproyectodetalle,
        IF ( LENGTH(tiempo_proyecto.id) > 0 ,tiempo_proyecto.id, '-' )   AS idobservado_tiempo,
        IF ( LENGTH(tiempo_proyecto.nombre) > 0 ,tiempo_proyecto.nombre , '-' )   AS tiempo_proyecto,
        IF ( LENGTH(horario_observacion.id) > 0 ,horario_observacion.id , '-' )   AS idobservado_hora,
        IF ( LENGTH(horario_observacion.nombre) > 0 ,horario_observacion.nombre, '-' )   AS horario_observacion,
        IF ( LENGTH(rango_edad.id) > 0 ,rango_edad.id, '-' )   AS idobservado_edad,
        IF ( LENGTH(rango_edad.nombre) > 0 ,rango_edad.nombre, '-' )   AS rango_edad,
        IF ( LENGTH(lesion.id) > 0 ,lesion.id, '-' )   AS idobservado_lesion,
        IF ( LENGTH(lesion.nombre) > 0 ,lesion.nombre, '-' )   AS lesion,
        IF ( LENGTH(obstaculo.id) > 0 ,obstaculo.id, '-' )   AS idobservado_obstaculo,
        IF ( LENGTH(obstaculo.nombre) > 0 ,obstaculo.nombre, '-' )   AS obstaculo,
        IF ( LENGTH(tops.observado_cambio) > 0 ,tops.observado_cambio, '-' )   AS observado_cambio,
        IF ( LENGTH(tops.observado_retroalimentacion) > 0 ,tops.observado_retroalimentacion, '-' )   AS observado_retroalimentacion,
        IF ( LENGTH(tops.observado_reincidente) > 0 ,tops.observado_reincidente, '-' )   AS observado_reincidente,
        IF ( LENGTH(tops.observado_comentario) > 0 ,tops.observado_comentario, '-' )   AS observado_comentario,
        IF ( LENGTH(area_general.nombre) > 0 ,area_general.nombre, '-' )   AS area_nombre,
        IF ( LENGTH(tabla_aquarius.dni) > 0 ,tabla_aquarius.dni, '-' )   AS dni,
        IF ( LENGTH(tops.url_pdf) > 0 ,tops.url_pdf, '-' )   AS url_pdf,
        tops.reg AS registro,
        IF ( LENGTH(seguimiento_aquarius.responsable) > 0 ,seguimiento_aquarius.responsable, '-' ) AS responsable 
				

FROM
        ssma.tops
        
        JOIN (SELECT ssma.area_general.id,ssma.area_general.nombre FROM ssma.area_general) AS area_general ON ssma.tops.idproyectodetalle = area_general.id
        JOIN (SELECT ssma.tiempo_proyecto.id,ssma.tiempo_proyecto.nombre FROM ssma.tiempo_proyecto) AS tiempo_proyecto ON ssma.tops.idobservado_tiempo = tiempo_proyecto.id
        JOIN (SELECT ssma.horario_observacion.id,ssma.horario_observacion.nombre FROM ssma.horario_observacion) AS horario_observacion ON ssma.tops.idobservado_hora = horario_observacion.id
        JOIN (SELECT ssma.rango_edad.id,ssma.rango_edad.nombre FROM ssma.rango_edad) AS rango_edad ON ssma.tops.idobservado_edad = rango_edad.id
        JOIN (SELECT ssma.lesion.id,ssma.lesion.nombre FROM ssma.lesion) AS lesion ON ssma.tops.idobservado_lesion = lesion.id
        JOIN (SELECT ssma.obstaculo.id,ssma.obstaculo.nombre FROM ssma.obstaculo) AS obstaculo ON ssma.tops.idobservado_obstaculo = obstaculo.id
        JOIN (SELECT rrhh.tabla_aquarius.usuario,rrhh.tabla_aquarius.apellidos,rrhh.tabla_aquarius.nombres,rrhh.tabla_aquarius.dni FROM rrhh.tabla_aquarius) AS tabla_aquarius ON ssma.tops.iduser = tabla_aquarius.usuario
        LEFT JOIN(SELECT 
						ssma.seguimiento.iddocumento,
						ssma.seguimiento.dni_propietario,
						CONCAT(tabla_aquarius.nombres,' ',tabla_aquarius.apellidos) AS responsable

						FROM ssma.seguimiento JOIN 
							(
							SELECT 
								rrhh.tabla_aquarius.usuario,
								rrhh.tabla_aquarius.apellidos,
								rrhh.tabla_aquarius.nombres,
								rrhh.tabla_aquarius.dni FROM rrhh.tabla_aquarius
							) 
							
							AS tabla_aquarius
						ON ssma.seguimiento.dni_propietario = tabla_aquarius.dni) AS seguimiento_aquarius
                        ON ssma.tops.idtop = seguimiento_aquarius.iddocumento

                        WHERE tops.reg >= '$fechaInicio'  AND  tops.reg <  DATE_ADD( '$fechaFin' ,INTERVAL 1 DAY) AND $sedeSQL

                        ORDER BY
                        ssma.tops.reg DESC";



        $listReport = array();

        $query = $this->db->connect()->prepare($statement);

        $sede  = $this->master("00");
        $obser = $this->master("01");
        $relac = $this->master("02");
        $tipo = $this->master("03");
        $condicion = $this->master("04");
        $potencial = $this->master("05");
        $actins =  $this->master("06");
        $conins =  $this->master("07");
        $acseg  =  $this->master("08");
        $area = $this->master("09");

        try {

            $query->execute();


            while ($row = $query->fetch()) {


                $rel = $row['relacion'] != "00" ? $relac[(int)$row['relacion']] : "OTROS";
                $tip = $row['tipepp'] != "00" ? $tipo[(int)$row['tipepp']] : "";
                $con = $row['conepp'] != "00" ? $condicion[(int)$row['conepp']] : "";
                $pot = $row['potencial'] != "00" ? $potencial[(int)$row['potencial']] : "";
                $area_text = $row['area'] != "00" ? $area[(int)$row['area']] : "";

                $observacion_detalle = "";
                if ($row['actins'] != "00") {
                    $observacion_detalle =  $actins[(int)$row['actins']];
                } elseif ($row['conins'] != "00") {

                    $observacion_detalle =  $conins[(int)$row['conins']];
                } elseif ($row['actseg'] != "00") {

                    $observacion_detalle =  $acseg[(int)$row['actseg']];
                }

                $observado_cambio = $row['observado_cambio'] == '1' ? 'Si' : 'No';
                $observado_retroalimentacion = $row['observado_retroalimentacion'] == '1' ? 'Si' : 'No';
                $observado_reincidente = $row['observado_reincidente'] == '1' ? 'Si' : 'No';


                $top = array(
                    "reportado" => $row['reportado'],
                    "proyecto" => $sede[(int)$row['sede']],
                    "area" => $row['area_nombre'],
                    "observadoLugar" => $row['observado_lugar'],
                    "fase" => $area_text,
                    "puestoObservado" => $row['observado_puesto'],
                    "tiempoProyecto" => $row['tiempo_proyecto'],
                    "horarioObservacion" => $row['horario_observacion'],
                    "rangoEdad" => $row['rango_edad'],
                    "fecha" => date("d/m/Y", strtotime($row['fecha'])),
                    "registro" => date("d/m/Y", strtotime($row['reg'])),
                    "observacion" => $this->getObservacion($row['observacion']),
                    "observacionDetalle" => $observacion_detalle,
                    "relacion" => $rel,
                    "otros" => $row['otros'],
                    "tipoEpp" => $tip,
                    "condicionEpp" => $con,
                    "descripcion" => $row['descripcion'],
                    "medidas" => $row['medidas'],
                    "potencial" => $pot,
                    "fotos" => $row['foto'],
                    "lesion" => $row['lesion'],
                    "obstaculo" => $row['obstaculo'],
                    "observadoCambio" => $observado_cambio,
                    "observadoRetroalimentacion" => $observado_retroalimentacion,
                    "observadoReincidente" => $observado_reincidente,
                    "observadoComentario" => $row['observado_comentario'],
                    "responsable" => $row['responsable'],

                );


                array_push($listReport, $top);
            }

            return $listReport;
        } catch (PDOException $e) {
            return [];
        }
    }


    function master($clase)
    {

        $query = "SELECT
                    general.nombre
                    FROM
                    general
                    WHERE
                    general.clase = :clase ";


        $query = $this->db->connect()->prepare($query);
        $query->execute(['clase'  => $clase]);
        $salida     = [];

        while ($row = $query->fetch()) {
            array_push($salida, $row['nombre']);
        }

        return $salida;
    }

    function getObservacion($idObservacion)
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




    function seguridadReport($proyecto, $fechaInicio, $fechaFin)
    {

        $listReport = array();

        $TODOS_PROYECTOS = 100;
        $sedeSQL = "sede <> '$proyecto'";

        if ($proyecto != $TODOS_PROYECTOS) {
            $sedeSQL = "sede = '$proyecto'";
        }

        $statement = "SELECT
                        detseguridad.idreg,
                        detseguridad.iddoc,
                        detseguridad.condicion,
                        detseguridad.clasificacion,
                        detseguridad.accion,
                        detseguridad.fecha as fechaCumplimiento,
                        detseguridad.seguimiento,
                        
                        inspeccion_tipo.nombre AS tipo,
                        seguridad.sede,
                        seguridad.lugar,
                        seguridad.fecha AS fechaInspeccion,
                        seguridad.inspeccionado,
                        seguridad.responsable,
                        seguridad.obser01,
                        seguridad.obser02,
                        seguridad.obser03,
                        seguridad.reg AS registro,
                        detseguridad.evidencia,
                        proyectos.nombre AS proyecto ,
                        TIMESTAMPDIFF(DAY, seguridad.fecha , detseguridad.fecha) AS diasImplementacion ,
                        seguridad.ubicacion,
                        area_general.nombre AS area_nombre,
                        tipo_observacion.nombre AS  tipo_observacion


                    FROM
                        detseguridad
                        INNER JOIN seguridad ON detseguridad.iddoc = seguridad.iddoc
                        INNER JOIN general AS proyectos ON seguridad.sede = proyectos.cod 
                        INNER JOIN area_general ON seguridad.idAreaObservada= area_general.id
                        INNER JOIN tipo_observacion ON detseguridad.tipo = tipo_observacion.id
                        INNER JOIN inspeccion_tipo ON inspeccion_tipo.id = seguridad.tipo
                            
                    WHERE  proyectos.clase = '00' AND  seguridad.reg >= '$fechaInicio'  AND  seguridad.reg <  DATE_ADD( '$fechaFin' ,INTERVAL 1 DAY) AND $sedeSQL        
                    
                    ORDER BY seguridad.reg DESC";


        $query = $this->db->connect()->prepare($statement);

        try {

            $query->execute();

            while ($item = $query->fetch()) {

                $seguridad = array(
                    "proyecto" => $item["proyecto"],
                    "areaNombre" => $item["area_nombre"],
                    "ubicacion" => $item["ubicacion"],
                    "fechaInspeccion" => $item["fechaInspeccion"],
                    "registro" => $item["registro"],
                    "inspeccionado" => $item["inspeccionado"],
                    "tipo" => $item["tipo"],
                    "tipoObservacion" => $item["tipo_observacion"],
                    "condicion" => $item["condicion"],
                    "fotos" => $item["evidencia"],
                    "accion" => $item["accion"],
                    "clasificacion" => $this->convertClasificacion($item["clasificacion"]),
                    "diasImplementacion" => $item["diasImplementacion"],
                    "fechaCumplimiento" => $item["fechaCumplimiento"],
                    "responsable" => $item["responsable"],
                    "seguimiento" => $item["seguimiento"]
                );
                array_push($listReport, $seguridad);
            }

            return $listReport;
        } catch (PDOException $e) {
            return [];
        }
    }

    function convertClasificacion($clasificacion)
    {
        $listClasificacion = ["", "A", "B", "C", "", ""];
        return $listClasificacion[(int)$clasificacion];
    }
}

