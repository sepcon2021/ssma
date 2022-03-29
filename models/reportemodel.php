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
        IF ( LENGTH(seguimiento_aquarius.responsable) > 0 ,seguimiento_aquarius.responsable, '-' ) AS responsable ,
        tops.url_pdf
				
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
          "url_pdf" => $row["url_pdf"],

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
    $sedeSQL = "sede <> '0$proyecto'";

    if ($proyecto != $TODOS_PROYECTOS) {
      $sedeSQL = "sede = '0$proyecto'";
    }

    $statement = "SELECT
                        proyectos.nombre AS proyecto ,
                        seguridad.fecha AS fechaInspeccion,
                        seguridad.inspeccionado AS inspeccionRealizada,
                        inspeccion_tipo.nombre AS tipoInspeccion,
                        tipo_observacion.nombre AS  condicionActo,
                        detseguridad.detalle AS descripcionCondicionActo,
                        detseguridad.evidencia AS evidenciaEncontrada,
                        detseguridad.accion AS accionCorrectiva,
                        detseguridad.clasificacion,
                        TIMESTAMPDIFF(DAY, seguridad.fecha , detseguridad.fecha) AS diasImplementacion ,
                        detseguridad.fecha as fechaImplementacion,
                        seguridad.responsable AS responsableEjecucion,
                        detseguridad.seguimiento AS comentariosAdicionales,
                        area_general.nombre AS area,
                        seguridad.ubicacion AS ubicacion,
                        detseguridad.condicion AS tipoCondicionActo,
                        seguridad.responsable AS responsableArea,
                        seguridad.reg AS registro,
                        detseguridad.iddoc

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
          "fechaInspeccion" => $item["fechaInspeccion"],
          "inspeccionRealizada" => $item["inspeccionRealizada"],
          "tipoInspeccion" => $item["tipoInspeccion"],
          "condicionActo" => $item["condicionActo"],
          "descripcionCondicionActo" => $item["descripcionCondicionActo"],
          "evidenciaEncontrada" => $item["evidenciaEncontrada"],
          "accionCorrectiva" => $item["accionCorrectiva"],
          "clasificacion" => $this->convertClasificacion($item["clasificacion"]),
          "diasImplementacion" => $item["diasImplementacion"],
          "fechaImplementacion" => $item["fechaImplementacion"],
          "responsableEjecucion" => $item["responsableEjecucion"],
          "comentariosAdicionales" => $item["comentariosAdicionales"],
          "area" => $item["area"],
          "ubicacion" => $item["ubicacion"],
          "tipoCondicionActo" => $item["tipoCondicionActo"],
          "responsableArea" => $item["responsableArea"],
          "registro" => $item["registro"]

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

  function incidenciaReport($proyecto, $fechaInicio, $fechaFin)
  {
    $listReport = array();

    $TODOS_PROYECTOS = 100;
    $sedeSQL = "incidencias.proyecto <> '0$proyecto'";

    if ($proyecto != $TODOS_PROYECTOS) {
      $sedeSQL = "incidencias.proyecto = '0$proyecto'";
    }

    $statement = "SELECT
        incidencias.iddoc,
        incidencias.proyecto,
        incidencias.cliente,
        incidencias.lugar,
        incidencias.fecha,
        incidencias.hora,
        incidencias.descripcion,
        incidencias.reg,
        incidencias.elaborado,
        incidencias.foto,

        incidencias.materialmenor,
        incidencias.materialmayor,
        incidencias.derramemenor,
        incidencias.derramemayor,
        incidencias.conherido,
        incidencias.sinherido,
        incidencias.vehicularmenor,
        incidencias.vehicularmayor,
        incidencias.fac,
        incidencias.mto,
        incidencias.rwc,
        incidencias.lti,
        incidencias.ftl,
        incidencias.incidente,
        incidencias.eo,
        incidencias.persona,
        incidencias.documento,
        incidencias.sexo,
        incidencias.edad,
        incidencias.nacimiento,
        incidencias.domicilio,
        incidencias.civil,
        incidencias.dpto,
        incidencias.prov,
        incidencias.dist,
        incidencias.cargo,
        incidencias.instruccion,
        incidencias.acciones,
        incidencias.usuario,
        incidencias.seguro,
        incidencias.acciones,
        incidencias.url_pdf AS urlPdf,
        area_general.nombre AS area_nombre,
        proyectos.nombre AS  proyectoNombre

        FROM
        
        incidencias

        INNER JOIN general AS proyectos ON incidencias.proyecto = proyectos.cod
        INNER JOIN area_general ON incidencias.idAreaObservada=area_general.id
        
        WHERE
            proyectos.clase = 00 AND incidencias.reg >= '$fechaInicio'  AND  incidencias.reg <  DATE_ADD( '$fechaFin' ,INTERVAL 1 DAY) AND $sedeSQL    
        ORDER BY  incidencias.reg DESC";

    $query = $this->db->connect()->prepare($statement);

    try {

      $query->execute();

      while ($item = $query->fetch()) {

        $seguridad = array(
          "iddoc" => $item["iddoc"],
          "proyectoNombre" => $item["proyectoNombre"],
          "cliente" => $item["cliente"],
          "lugar" => $item["lugar"],
          "fecha" => $item["fecha"],
          "hora" => $item["hora"],
          "descripcion" => $item["descripcion"],
          "elaborado" => $item["elaborado"],
          "foto" => $item["foto"],
          "materialMenor" => $item["materialmenor"],
          "materialMayor" => $item["materialmayor"],
          "derrameMenor" => $item["derramemenor"],
          "derrameMayor" => $item["derramemayor"],
          "conHerido" => $item["conherido"],
          "sinHerido" => $item["sinherido"],
          "vehicularMenor" => $item["vehicularmenor"],
          "vehicularMayor" => $item["vehicularmayor"],
          "fac" => $item["fac"],
          "mto" => $item["mto"],
          "rwc" => $item["rwc"],
          "lti" => $item["lti"],
          "ftl" => $item["ftl"],
          "incidente" => $item["incidente"],
          "eo" => $item["eo"],
          "persona" => $item["persona"],
          "documento" => $item["documento"],
          "sexo" => $item["sexo"],
          "edad" => $item["edad"],
          "nacimiento" => $item["nacimiento"],
          "domicilio" => $item["domicilio"],
          "civil" => $item["civil"],
          "dpto" => $item["dpto"],
          "prov" => $item["prov"],
          "dist" => $item["dist"],
          "cargo" => $item["cargo"],
          "instruccion" => $item["instruccion"],
          "acciones" => $item["acciones"],
          "usuario" => $item["usuario"],
          "seguro" => $item["seguro"],
          "acciones" => $item["acciones"],
          "areaNombre" => $item["area_nombre"],
          "urlPdf" => $item["urlPdf"]
        );
        array_push($listReport, $seguridad);
      }

      return $listReport;
    } catch (PDOException $e) {
      return [];
    }
  }


  public function optReport($proyecto, $fechaInicio, $fechaFin)
  {

    $listReport = array();

    $TODOS_PROYECTOS = 100;
    $sedeSQL = "idProyecto <> '0$proyecto'";

    if ($proyecto != $TODOS_PROYECTOS) {
      $sedeSQL = "idProyecto = '0$proyecto'";
    }


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
        FROM view_opt 
        WHERE  registro >= '$fechaInicio'  AND  registro <  DATE_ADD('$fechaFin',INTERVAL 1 DAY) AND $sedeSQL ORDER BY registro desc
        ");
    try {

      $query->execute();

      while ($item = $query->fetch()) {
        $opt = array(
          "opt" => $item,
          "optObservacion" => $this->buscarByIdOptObservaciones($item["id"]),
          "optObservadores" => $this->buscarByIdOptObservadores($item["id"]),
          "optRecomendaciones" => $this->buscarByIdOptRecomendaciones($item["id"]),
        );

        array_push($listReport, $opt);
      }

      return $listReport;
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

        array_push($arrayOptObservaciones, $row);
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
        array_push($arrayOptObservadores, $row);
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
        array_push($arrayOptRecomendacion, $row);
      }
      return $arrayOptRecomendacion;
    } catch (PDOException $e) {
      return [];
    }
  }


  public function ipercReport($proyecto, $fechaInicio, $fechaFin)
  {

    $listReport = array();

    $TODOS_PROYECTOS = 100;
    $sedeSQL = "idProyecto <> '0$proyecto'";

    if ($proyecto != $TODOS_PROYECTOS) {
      $sedeSQL = "idProyecto = '0$proyecto'";
    }


    $query = $this->db->connect()->prepare("SELECT 
            id,
            idProyecto,
            nombre_proyecto,
            nombre_area,
            ubicacion,
            area_observada,
            nombre_tarea,
            fecha,
            nombres_usuario,
            apellidos_usuario,
            empresa,
            idTipoRiesgo,
            tipoRiesgo,
            registro,
            riesgo1,
            comentario1,
            riesgo2,
            comentario2,
            riesgo3,
            comentario3,
             riesgo4,
            comentario4,
             riesgo5,
            comentario5,
             riesgo6,
            comentario6,
             riesgo7,
            comentario7,
             riesgo8,
            comentario8,
             riesgo9,
            comentario9,
             riesgo10,
             comentario10,
             riesgo11,
             comentario11,
             riesgo12,
             comentario12,
             riesgo13,
             comentario13,
             riesgo14,
             comentario14,
             riesgo15,
             comentario15,
             riesgo16,
             comentario16,
    
            riesgo_critico1 ,
             comentario_critico1,
            riesgo_critico2 ,
             comentario_critico2,
            riesgo_critico3 ,
             comentario_critico3,
            riesgo_critico4 ,
             comentario_critico4,
            riesgo_critico5 ,
             comentario_critico5,
            riesgo_critico6 ,
             comentario_critico6,
            riesgo_critico7 ,
             comentario_critico7,
            riesgo_critico8 ,
             comentario_critico8,
            riesgo_critico9 ,
             comentario_critico9,
             riesgo_critico10 ,
            comentario_critico10,
                    riesgo_critico11 ,
            comentario_critico11,
                    riesgo_critico12 ,
            comentario_critico12,
                    riesgo_critico13 ,
            comentario_critico13,
                    riesgo_critico14 ,
            comentario_critico14,
                    riesgo_critico15 ,
            comentario_critico15,
                    riesgo_critico16 ,
            comentario_critico16,
                    riesgo_critico17 ,
            comentario_critico17,
                    riesgo_critico18 ,
            comentario_critico18,
                    riesgo_critico19 ,
            comentario_critico19,
                    riesgo_critico20 ,
            comentario_critico20, 
                riesgo_manos1,
                riesgo_manos2,
                riesgo_manos3,
                riesgo_covid2,
                riesgo_covid3,
                riesgo_covid4,
                riesgo_covid5,
                riesgo_covid6,
                riesgo_covid7 
                FROM view_iperc_nuevo 
                WHERE registro >= '$fechaInicio'  AND registro < DATE_ADD('$fechaFin',INTERVAL 1 DAY) AND $sedeSQL  ORDER BY registro DESC ");


    try {

      $query->execute();

      while ($item = $query->fetch()) {
        $iperc = array(

          "id" =>       $item["id"],
          "idProyecto" =>       $item["idProyecto"],
          "nombre_proyecto"    =>       $item["nombre_proyecto"],
          "nombre_area"    =>       $item["nombre_area"],
          "ubicacion"  =>       $item["ubicacion"],
          "area_observada" =>       $item["area_observada"],
          "nombre_tarea"   =>       $item["nombre_tarea"],
          "fecha"  =>       $item["fecha"],
          "nombres_usuario"    =>       $item["nombres_usuario"],
          "apellidos_usuario"  =>       $item["apellidos_usuario"],
          "empresa"    =>       $item["empresa"],
          "idTipoRiesgo"   =>       $item["idTipoRiesgo"],
          "tipoRiesgo" =>       $item["tipoRiesgo"],
          "registro"   =>       $item["registro"],
          "riesgo1"    =>       $item["riesgo1"],
          "comentario1"    =>       $item["comentario1"],
          "riesgo2"    =>       $item["riesgo2"],
          "comentario2"    =>       $item["comentario2"],
          "riesgo3"    =>       $item["riesgo3"],
          "comentario3"    =>       $item["comentario3"],
          "riesgo4"   =>       $item["riesgo4"],
          "comentario4"    =>       $item["comentario4"],
          "riesgo5"   =>       $item["riesgo5"],
          "comentario5"    =>       $item["comentario5"],
          "riesgo6"   =>       $item["riesgo6"],
          "comentario6"    =>       $item["comentario6"],
          "riesgo7"   =>       $item["riesgo7"],
          "comentario7"    =>       $item["comentario7"],
          "riesgo8"   =>       $item["riesgo8"],
          "comentario8"    =>       $item["comentario8"],
          "riesgo9"   =>       $item["riesgo9"],
          "comentario9"    =>       $item["comentario9"],
          "riesgo10"  =>       $item["riesgo10"],
          "comentario10"  =>       $item["comentario10"],
          "riesgo11"  =>       $item["riesgo11"],
          "comentario11"  =>       $item["comentario11"],
          "riesgo12"  =>       $item["riesgo12"],
          "comentario12"  =>       $item["comentario12"],
          "riesgo13"  =>       $item["riesgo13"],
          "comentario13"  =>       $item["comentario13"],
          "riesgo14"  =>       $item["riesgo14"],
          "comentario14"  =>       $item["comentario14"],
          "riesgo15"  =>       $item["riesgo15"],
          "comentario15"  =>       $item["comentario15"],
          "riesgo16"  =>       $item["riesgo16"],
          "comentario16"  =>       $item["comentario16"],
          "riesgo_critico1"   =>       $item["riesgo_critico1"],
          "comentario_critico1"   =>       $item["comentario_critico1"],
          "riesgo_critico2"   =>       $item["riesgo_critico2"],
          "comentario_critico2"   =>       $item["comentario_critico2"],
          "riesgo_critico3"   =>       $item["riesgo_critico3"],
          "comentario_critico3"   =>       $item["comentario_critico3"],
          "riesgo_critico4"   =>       $item["riesgo_critico4"],
          "comentario_critico4"   =>       $item["comentario_critico4"],
          "riesgo_critico5"   =>       $item["riesgo_critico5"],
          "comentario_critico5"   =>       $item["comentario_critico5"],
          "riesgo_critico6"   =>       $item["riesgo_critico6"],
          "comentario_critico6"   =>       $item["comentario_critico6"],
          "riesgo_critico7"   =>       $item["riesgo_critico7"],
          "comentario_critico7"   =>       $item["comentario_critico7"],
          "riesgo_critico8"   =>       $item["riesgo_critico8"],
          "comentario_critico8"   =>       $item["comentario_critico8"],
          "riesgo_critico9"   =>       $item["riesgo_critico9"],
          "comentario_critico9"   =>       $item["comentario_critico9"],
          "riesgo_critico10" =>       $item["riesgo_critico10"],
          "comentario_critico10"   =>       $item["comentario_critico10"],
          "riesgo_critico11"  =>       $item["riesgo_critico11"],
          "comentario_critico11"   =>       $item["comentario_critico11"],
          "riesgo_critico12"  =>       $item["riesgo_critico12"],
          "comentario_critico12"   =>       $item["comentario_critico12"],
          "riesgo_critico13"  =>       $item["riesgo_critico13"],
          "comentario_critico13"   =>       $item["comentario_critico13"],
          "riesgo_critico14"  =>       $item["riesgo_critico14"],
          "comentario_critico14"   =>       $item["comentario_critico14"],
          "riesgo_critico15"  =>       $item["riesgo_critico15"],
          "comentario_critico15"   =>       $item["comentario_critico15"],
          "riesgo_critico16"  =>       $item["riesgo_critico16"],
          "comentario_critico16"   =>       $item["comentario_critico16"],
          "riesgo_critico17"  =>       $item["riesgo_critico17"],
          "comentario_critico17"   =>       $item["comentario_critico17"],
          "riesgo_critico18"  =>       $item["riesgo_critico18"],
          "comentario_critico18"   =>       $item["comentario_critico18"],
          "riesgo_critico19"  =>       $item["riesgo_critico19"],
          "comentario_critico19"   =>       $item["comentario_critico19"],
          "riesgo_critico20"  =>       $item["riesgo_critico20"],
          "comentario_critico20"   =>       $item["comentario_critico20"],
          "riesgo_manos1"  =>       $item["riesgo_manos1"],
          "riesgo_manos2"  =>       $item["riesgo_manos2"],
          "riesgo_manos3"  =>       $item["riesgo_manos3"],
          "riesgo_covid2"  =>       $item["riesgo_covid2"],
          "riesgo_covid3"  =>       $item["riesgo_covid3"],
          "riesgo_covid4"  =>       $item["riesgo_covid4"],
          "riesgo_covid5"  =>       $item["riesgo_covid5"],
          "riesgo_covid6"  =>       $item["riesgo_covid6"],
          "riesgo_covid7"   =>       $item["riesgo_covid7"],

        );

        array_push($listReport, $iperc);
      }

      return $listReport;
    } catch (PDOException $e) {
      return [];
    }
  }

  public function iperRiesgoCritico()
  {

    $listReport = array();

    $query = $this->db->connect()->prepare("SELECT id_riesgo_critico,nombre FROM  riesgo_critico_pregunta");

    try {

      $query->execute();

      while ($item = $query->fetch()) {
        array_push($listReport, $item);
      }

      return $listReport;
    } catch (PDOException $e) {
      return [];
    }
  }


  public function ptarReport($proyecto, $fechaInicio, $fechaFin)
  {


    $listReport = [];

    $TODOS_PROYECTOS = 100;
    $sedeSQL = "idProyecto <> '$proyecto'";

    if ($proyecto != $TODOS_PROYECTOS) {
      $sedeSQL = "idProyecto = '$proyecto'";
    }

    $query = $this->db->connect()->prepare("SELECT 
                                                fechaelaboracion,
                                                proyecto,
                                                cliente,
                                                semana,
                                                fase,
                                                usuario,
                                                area,
                                                ubicacion,
                                                registro,

                                                observacionPt1,
                                                observacionPt2,
                                                observacionPt3,
                                                observacionPt4,
                                                observacionPt5,
                                                observacionPt6,
                                                observacionPt7,
                                                observacionPt8,
                                                observacionPt9,
                                                observacionPt10,
                                                observacionPt11,

                                                observacionAst1,
                                                observacionAst2,
                                                observacionAst3,
                                                observacionAst4,
                                                observacionAst5,
                                                observacionAst6,
                                                observacionAst7,
                                                observacionAst8,
                                                observacionAst9,
                                                observacionAst10,
                                                observacionAst11,
                                                observacionAst12,
                                                observacionAstDetalle10,
                                                observacionAstDetalle11,
                                                observacionAstDetalle12


                                                FROM 
                                                    ptar_report
                                                WHERE registro >= '$fechaInicio'  AND registro < DATE_ADD('$fechaFin',INTERVAL 1 DAY) AND $sedeSQL  ORDER BY registro DESC 

                                                    ");

    try {

      $query->execute();

      while ($item = $query->fetch()) {
        array_push($listReport, $item);
      }

      return $listReport;
    } catch (PDOException $e) {
      return [];
    }
  }


  public function gerencialReport($proyecto, $fechaInicio, $fechaFin)
  {


    $listReport = [];

    $TODOS_PROYECTOS = 100;
    $sedeSQL = "idProyecto <> '$proyecto'";

    if ($proyecto != $TODOS_PROYECTOS) {
      $sedeSQL = "idProyecto = '$proyecto'";
    }

    $query = $this->db->connect()->prepare("SELECT 
                                                idProyecto,
                                                proyecto , 
                                                razonsocial , 
                                                ruc , 
                                                domicilio , 
                                                acteconomica , 
                                                responsable1 , 
                                                numeroTrabajadores ,
                                                areasinspeccion , 
                                                fechainspeccion ,
                                                responsableInspeccion , 
                                                tipoInspeccion , 
                                                otros , 
                                                notas , 
                                                visita , 

                                                conclusiones , 
                                                responsabletrabajo ,
                                                responsablecargo, 
                                                fecharegistro ,
                                                usuario , 

                                                registroSistema , 
                                                saludOcupacional1 , 
                                                saludOcupacionalDetalle1 , 
                                                saludOcupacional2 , 
                                                saludOcupacionalDetalle2 , 
                                                saludOcupacional3 , 
                                                saludOcupacionalDetalle3 , 
                                                saludOcupacional4 , 
                                                saludOcupacionalDetalle4 , 
                                                saludOcupacional5 , 
                                                saludOcupacionalDetalle5 , 
                                                saludOcupacional6 , 
                                                saludOcupacionalDetalle6 , 
                                                saludOcupacional7 , 
                                                saludOcupacionalDetalle7 , 
                                                saludOcupacional8 , 
                                                saludOcupacionalDetalle8 , 
                                                seguridad1 , 
                                                seguridadDetalle1 , 
                                                seguridad2 , 
                                                seguridadDetalle2 , 
                                                seguridad3 , 
                                                seguridadDetalle3 , 
                                                seguridad4 , 
                                                seguridadDetalle4 , 
                                                seguridad5 , 
                                                seguridadDetalle5 , 
                                                seguridad6 , 
                                                seguridadDetalle6 , 
                                                seguridad7 , 
                                                seguridadDetalle7 , 
                                                seguridad8 , 
                                                seguridadDetalle8 , 
                                                seguridad9 , 
                                                seguridadDetalle9 , 
                                                seguridad10 , 
                                                seguridadDetalle10 , 
                                                seguridad11 , 
                                                seguridadDetalle11 , 
                                                medioAmbiente1 , 
                                                medioAmbienteDetalle1 , 
                                                medioAmbiente2 , 
                                                medioAmbienteDetalle2 , 
                                                medioAmbiente3 , 
                                                medioAmbienteDetalle3 , 
                                                medioAmbiente4 , 
                                                medioAmbienteDetalle4 , 
                                                medioAmbiente5 , 
                                                medioAmbienteDetalle5 

                                                FROM gerencial
                                                WHERE registroSistema >= '$fechaInicio'  AND registroSistema < DATE_ADD('$fechaFin',INTERVAL 1 DAY) AND $sedeSQL  ORDER BY registroSistema DESC 

                                                    ");

    try {

      $query->execute();

      while ($item = $query->fetch()) {
        array_push($listReport, $item);
      }

      return $listReport;
    } catch (PDOException $e) {
      return [];
    }
  }


  public function suspencionReport($proyecto, $fechaInicio, $fechaFin)
  {


    $listReport = [];

    $TODOS_PROYECTOS = 100;
    $sedeSQL = "idProyecto <> '$proyecto'";

    if ($proyecto != $TODOS_PROYECTOS) {
      $sedeSQL = "idProyecto = '$proyecto'";
    }

    $query = $this->db->connect()->prepare("SELECT 
                                                idProyecto,
                                                proyecto, 
                                                fase , 
                                                responsable , 
                                                cargo , 
                                                fecha , 
                                                hora ,
                                                conduccion , 
                                                ptar , 
                                                confinados , 
                                                energias , 
                                                excavaciones , 
                                                altura , 
                                                caliente , 
                                                izaje , 
                                                
                                                otros , 
                                                descripcion , 
                                                acciones , 
                                                riesgo , 
                                                duracion , 
                                                jefe , 
                                                numeroPersonas ,
                                                observaciones , 
                                                usuario , 
                                                registro
                                                FROM report_suspencion
                                                WHERE registro >= '$fechaInicio'  AND registro < DATE_ADD('$fechaFin',INTERVAL 1 DAY) AND $sedeSQL  ORDER BY registro DESC 

                                                    ");

    try {

      $query->execute();

      while ($item = $query->fetch()) {
        array_push($listReport, $item);
      }

      return $listReport;
    } catch (PDOException $e) {
      return [];
    }
  }



  public function inspeccionBotiquinReport($proyecto, $fechaInicio, $fechaFin)
  {


    $listReport = [];

    $TODOS_PROYECTOS = 100;
    $sedeSQL = "idProyecto <> '$proyecto'";

    if ($proyecto != $TODOS_PROYECTOS) {
      $sedeSQL = "idProyecto = '$proyecto'";
    }

    $query = $this->db->connect()->prepare("SELECT     
        tipo_inspeccion,
        idProyecto,
        sede, 
        area,
        lugar_inspeccion,
        usuario,
        responsable_area,
        fecha,
        registro,
        ubicacion,
        condicion,
        clasificacion,
        accion_correctiva,
        usuario_responsable_detalle,
        fecha_cumplimiento,
        seguimiento,
        evidencia
        FROM view_inspeccion_botiquin
        WHERE registro >= '$fechaInicio'  AND registro < DATE_ADD('$fechaFin',INTERVAL 1 DAY) AND $sedeSQL  ORDER BY registro DESC 

                                                    ");

    try {

      $query->execute();

      while ($item = $query->fetch()) {


        $data = array(
          "tipo_inspeccion" => $item["tipo_inspeccion"],
          "sede" => $item["sede"],
          "area" => $item["area"],
          "lugar_inspeccion" => $item["lugar_inspeccion"],
          "usuario" => $item["usuario"],
          "responsable_area" => $item["responsable_area"],

          "fecha" => $item["fecha"],
          "registro" => $item["registro"],
          "ubicacion" => $item["ubicacion"],
          "condicion" => $item["condicion"],
          "clasificacion" => $item["clasificacion"],
          "accion_correctiva" => $item["accion_correctiva"],
          "usuario_responsable_detalle" => $item["usuario_responsable_detalle"],
          "fecha_cumplimiento" => $item["fecha_cumplimiento"],
          "seguimiento" => $item["seguimiento"],
          "evidencia" => $item["evidencia"]
        );
        array_push($listReport, $data);
      }

      return $listReport;
    } catch (PDOException $e) {
      return [];
    }
  }
}