<?php
    class Trabajador{
        public $apellidos;
        public $nombres;
        public $domicilio;
        public $sexo;
    }

    
    class IncidenciasModel extends Model{
        
        //HEREDAMOS TODOS LO METODOS DE MODEL QUE CONTENIA UNA INSTANCIA DE LA BASE DE DAROS DE connect()

        public function __construct()
        {
            parent::__construct();
        }

        public function getWorkerbyDni($dni){
            $items = [];

            try {
                $query = $this->db->connect()->query("SELECT
                rrhh.tabla_aquarius.internal,
                rrhh.tabla_aquarius.dni,
                rrhh.tabla_aquarius.apellidos,
                rrhh.tabla_aquarius.nombres,
                rrhh.tabla_aquarius.estado,
                rrhh.tabla_aquarius.ccostos,
                rrhh.tabla_aquarius.csede,
                rrhh.tabla_aquarius.dcostos,
                rrhh.tabla_aquarius.dcargo,
                ssma.nomina.sexo,
                ssma.nomina.sangre,
                ssma.nomina.gsangre,
                ssma.nomina.estado_civil,
                SUBSTR( ssma.nomina.fecha_nacimiento, 1, 10 ) AS fnacimiento,
                ssma.nomina.dsede,
                ssma.nomina.edad,
                ssma.nomina.direccion,
                ssma.lugar.departamento AS depa_nacim,
                ssma.ubigeo.departamento AS depa_dom,
                ssma.ubigeo.provincia AS prov_dom,
                ssma.ubigeo.distrito AS dist_dom
            FROM
                rrhh.tabla_aquarius
                LEFT JOIN nomina ON rrhh.tabla_aquarius.dni = ssma.nomina.dni
                LEFT JOIN ubigeo AS lugar ON ssma.nomina.ubigeo_lnacimiento = ssma.lugar.ubigeo
                LEFT JOIN ubigeo ON ssma.nomina.ubigeo_domicilio = ssma.ubigeo.ubigeo
            WHERE
                rrhh.tabla_aquarius.dni = '$dni'");
                
                while($row = $query->fetch()){
                    $items = $row;
                }

                return $items;
            } catch (PDOexception $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function insert($datos){ 
            try{ 
                $query = $this->db->connect()->prepare('INSERT INTO INCIDENCIAS (iddoc,proyecto,cliente,materialmenor,materialmayor,
                                                                                    derramemenor,derramemayor,conherido,sinherido,vehicularmenor,
                                                                                    vehicularmayor,fac,mto,rwc,lti,
                                                                                    ftl,incidente,eo,lugar,fecha,
                                                                                    hora,persona,documento,sexo,edad,
                                                                                    nacimiento,domicilio,civil,dpto,prov,
                                                                                    dist,cargo,instruccion,descripcion,acciones,
                                                                                    elaborado,usuario,foto,seguro,ubicacion,idAreaObservada)
                                                        VALUES (:iddoc,:proyecto,:cliente,:materialmenor,:materialmayor,
                                                                :derramemenor,:derramemayor,:conherido,:sinherido,:vehicularmenor,
                                                                :vehicularmayor,:fac,:mto,:rwc,:lti,
                                                                :ftl,:incidente,:eo,:lugar,:fecha,
                                                                :hora,:persona,:documento,:sexo,:edad,
                                                                :nacimiento,:domicilio,:civil,:dpto,:prov,
                                                                :dist,:cargo,:instruccion,:descripcion,:acciones,
                                                                :elaborado,:usuario,:foto,:seguro,:ubicacion,:idAreaObservada)');
                

                $query->execute([
                    'iddoc'             => $datos['iddoc'],
                    'proyecto'          => $datos['proyecto'],
                    'cliente'           => $datos['cliente'],
                    'materialmenor'     => $datos['materialmenor'],
                    'materialmayor'     => $datos['materialmayor'],
                    'derramemenor'      => $datos['derramemenor'],
                    'derramemayor'      => $datos['derramemayor'],
                    'conherido'         => $datos['conherido'],
                    'sinherido'         => $datos['sinherido'],
                    'vehicularmenor'    => $datos['vehicularmenor'],
                    'vehicularmayor'    => $datos['vehicularmayor'],
                    'fac'               => $datos['fac'],
                    'mto'               => $datos['mto'],
                    'rwc'               => $datos['rwc'],
                    'lti'               => $datos['lti'],
                    'ftl'               => $datos['ftl'],
                    'incidente'         => $datos['incidente'],
                    'eo'                => $datos['eo'],
                    'lugar'             => $datos['lugar'],
                    'fecha'             => $datos['fecha'],
                    'hora'              => $datos['hora'],
                    'persona'           => $datos['persona'],
                    'documento'         => $datos['documento'],
                    'sexo'              => $datos['sexo'],
                    'edad'              => $datos['edad'],
                    'nacimiento'        => $datos['nacimiento'],
                    'domicilio'         => $datos['domicilio'],
                    'civil'             => $datos['civil'],
                    'dpto'              => $datos['dpto'],
                    'prov'              => $datos['prov'],
                    'dist'              => $datos['dist'],
                    'cargo'             => $datos['cargo'],
                    'instruccion'       => $datos['instruccion'],
                    'descripcion'       => $datos['descripcion'],
                    'acciones'          => $datos['acciones'],
                    'elaborado'         => $datos['elaborado'],
                    'usuario'           => $datos['usuario'],
                    'foto'              => $datos['foto'],
                    'seguro'            => $datos['seguro'],
                    'ubicacion'              => $datos['ubicacion'],
                    'idAreaObservada'              => $datos['idAreaObservada']


                ]);
                return true;
            }catch(PDOException $e){
                                echo $e->getMessage();

               return false;
            }
        }

        public function getIncidenciaById($iddoc)
        {
    
            $items = [];
    
            try {
                $query = $this->db->connect()->query("SELECT
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
                    general.nombre,
                    area_general.nombre AS area_nombre
                    FROM
                    incidencias
                    INNER JOIN general ON incidencias.proyecto = general.cod
                    INNER JOIN area_general ON incidencias.idAreaObservada=area_general.id
                    WHERE
                    incidencias.iddoc = '$iddoc' AND
                    general.clase = 00");
    
    
    
                while ($row = $query->fetch()) {                    
                    $items = $row;
    
                }
    
                return $items;
            } catch (PDOException $e) {
                return false;
            }
        }


        public function actualizarUrlPdf($id, $urlPdf)
        {
    
            $query = $this->db->connect()->prepare("UPDATE incidencias SET url_pdf = :url_pdf WHERE iddoc = :id ");
    
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
    
            $query = $this->db->connect()->prepare('SELECT url_pdf FROM incidencias WHERE iddoc = :id ');
    
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