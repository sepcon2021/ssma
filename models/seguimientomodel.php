<?php

require_once 'models/acciones.php';
require_once 'models/jefe.php';
require_once 'models/estado.php';
require_once 'public/email/email.php';
require_once 'models/seguimiento.php';
require_once 'models/accionDetalle.php';

class SeguimientoModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insertarSeguimiento($seguimiento)
    {
        try {

            $conexion_bbdd = $this->db->connect();

            $query = $conexion_bbdd->prepare('INSERT INTO seguimiento (iddocumento,idtipodocumento,dni_propietario,idestado,fecha_cumplimiento,comentario)
                                                        VALUES (:iddocumento,:idtipodocumento,:dni_propietario,:idestado,:fecha_cumplimiento,:comentario)');



            $query->execute([
                'iddocumento' => $seguimiento['iddocumento'],
                'idtipodocumento' => $seguimiento['idtipodocumento'],
                'dni_propietario' => $seguimiento['dni_propietario'],
                'idestado' => 1,
                'fecha_cumplimiento' => null,
                'comentario' => ''
            ]);

            $this->insertarSeguimientoDetalle($conexion_bbdd->lastInsertId(),$seguimiento['dni_propietario'],1);


            $last_insert_id = $conexion_bbdd->lastInsertId();

            return $last_insert_id;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function listaAccionesPorEstado($idEstado, $dni)
    {

        $listaAcciones = array();

        $query = $this->db->connect()->prepare("SELECT 
                                                seguimiento.id,
                                                seguimiento.dni_propietario,
                                                tipo_documento.nombre,
                                                seguimiento.iddocumento,
                                                seguimiento.idtipodocumento,
                                                seguimiento.idestado,
                                                CAST(seguimiento.fecha AS date) AS fecha,
                                                CAST(seguimiento.fecha_cumplimiento as date) AS fecha_cumplimiento

                                                FROM 

                                                        seguimiento INNER JOIN tipo_documento ON seguimiento.idtipodocumento = tipo_documento.id 


                                                WHERE  

                                                        seguimiento.idestado = :idEstado AND seguimiento.dni_propietario = :dni ");



        try {

            $query->execute(['idEstado'  => $idEstado, 'dni' => $dni]);


            while ($row = $query->fetch()) {
                $accion = new Accion;
                $accion->id = $row['id'];
                $accion->dniPropietario = $row['dni_propietario'];
                $accion->nombreDocumento = $row['nombre'];
                $accion->idDocumento = $row['iddocumento'];
                $accion->idTipoDocumento = $row['idtipodocumento'];
                $accion->idEstado = $row['idestado'];
                $accion->fecha = $row['fecha'];
                $accion->fecha_cumplimiento = $row['fecha_cumplimiento'];

                array_push($listaAcciones, $accion);
            }

            return $listaAcciones;
        } catch (PDOException $e) {
            return [];
        }
    }


    public function listaAccionesPorEstadoProceso($dni)
    {

        $listaAcciones = array();

        $query = $this->db->connect()->prepare("SELECT 
                                                seguimiento.id,
                                                seguimiento.dni_propietario,
                                                tipo_documento.nombre,
                                                seguimiento.iddocumento,
                                                seguimiento.idtipodocumento,
                                                seguimiento.idestado,
                                                CAST(seguimiento.fecha AS date) AS fecha,
                                                CAST(seguimiento.fecha_cumplimiento as date) AS fecha_cumplimiento

                                                FROM 

                                                        seguimiento INNER JOIN tipo_documento ON seguimiento.idtipodocumento = tipo_documento.id 


                                                WHERE  

                                                        (seguimiento.idestado = 2 OR seguimiento.idestado = 3) AND seguimiento.dni_propietario = :dni ");



        try {

            $query->execute(['dni' => $dni]);


            while ($row = $query->fetch()) {
                $accion = new Accion;
                $accion->id = $row['id'];
                $accion->dniPropietario = $row['dni_propietario'];
                $accion->nombreDocumento = $row['nombre'];
                $accion->idDocumento = $row['iddocumento'];
                $accion->idTipoDocumento = $row['idtipodocumento'];
                $accion->idEstado = $row['idestado'];
                $accion->fecha = $row['fecha'];
                $accion->fecha_cumplimiento = $row['fecha_cumplimiento'];

                array_push($listaAcciones, $accion);
            }

            return $listaAcciones;
        } catch (PDOException $e) {
            return [];
        }
    }


    public function detalleAccionTop($idEstado, $dni)
    {

        $query = $this->db->connect()->prepare("SELECT 
                                                seguimiento.id,
                                                seguimiento.dni_propietario,
                                                tipo_documento.nombre,
                                                seguimiento.iddocumento,
                                                seguimiento.idtipodocumento,
                                                seguimiento.idestado,
                                                seguimiento.fecha 

                                                FROM 

                                                        seguimiento INNER JOIN tipo_documento ON seguimiento.idtipodocumento = tipo_documento.id 


                                                WHERE  

                                                        seguimiento.idestado = :idEstado AND seguimiento.dni_propietario = :dni ");



        try {

            $query->execute(['idEstado'  => $idEstado, 'dni' => $dni]);


            while ($row = $query->fetch()) {
                $accion = new Accion;
                $accion->id = $row['id'];
                $accion->dniPropietario = $row['dni_propietario'];
                $accion->nombreDocumento = $row['nombre'];
                $accion->idDocumento = $row['iddocumento'];
                $accion->idTipoDocumento = $row['idtipodocumento'];
                $accion->idEstado = $row['idestado'];
                $accion->fecha = $row['fecha'];

                array_push($listaAcciones, $accion);
            }

            return $listaAcciones;
        } catch (PDOException $e) {
            return [];
        }
    }


    public function actualizarEstadoDocumento($idEstado, $idSeguimiento,$dni)
    {

        $query = $this->db->connect()->prepare("UPDATE seguimiento SET idestado = :idEstado WHERE id = :id ");

        try {

            $query->execute(['idEstado'  => $idEstado, 'id' => $idSeguimiento]);

            $this->insertarSeguimientoDetalle($idSeguimiento,$dni,$idEstado);

            return true;
        } catch (PDOException $e) {
            return $e->intl_get_error_message;
        }
    }

    public function detalleSeguimiento($id)
    {

        $query = $this->db->connect()->prepare("SELECT 
                                                id,
                                                iddocumento,
                                                idtipodocumento,
                                                dni_propietario,
                                                idestado,
                                                fecha_cumplimiento,
                                                comentario,
                                                fecha,
                                                accion_propuesta
                                                FROM seguimiento WHERE id = :id ");



        try {

            $query->execute(['id'  => $id]);

            $seguimiento = new Seguimient;

            while ($row = $query->fetch()) {
                $seguimiento->id = $row['id'];
                $seguimiento->iddocumento = $row['iddocumento'];
                $seguimiento->idtipodocumento = $row['idtipodocumento'];
                $seguimiento->dni_propietario = $row['dni_propietario'];
                $seguimiento->idestado = $row['idestado'];
                $seguimiento->fecha_cumplimiento = $row['fecha_cumplimiento'];
                $seguimiento->comentario = $row['comentario'];
                $seguimiento->fecha = $row['fecha'];
                $seguimiento->accion_propuesta = $row['accion_propuesta'];
            }

            return $seguimiento;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function listaJefes()
    {

        $listaJefes = array();

        $query = $this->db->connectrrhh()->prepare("SELECT nombres,apellidos,dni,correo,dcargo FROM rrhh.tabla_aquarius WHERE dcargo LIKE '%Tecnolog%' OR dcargo LIKE '%SSMA - Seguridad%'");



        try {

            $query->execute();


            while ($row = $query->fetch()) {
                $jefe = new Jefe;
                $jefe->nombres = $row['nombres'];
                $jefe->apellidos = $row['apellidos'];
                $jefe->dni = $row['dni'];
                $jefe->correo = $row['correo'];



                array_push($listaJefes, $jefe);
            }

            return $listaJefes;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function jefeDetalle($dni)
    {

        $query = $this->db->connectrrhh()->prepare("SELECT 
                                                nombres,apellidos,dni,corporativo
                                                FROM tabla_aquarius WHERE dni = :dni");



        try {

            $query->execute(['dni'  => $dni]);

            $jefe = new Jefe;

            while ($row = $query->fetch()) {
                $jefe->nombres = $row['nombres'];
                $jefe->apellidos = $row['apellidos'];
                $jefe->dni = $row['dni'];
                $jefe->correo = $row['corporativo'];
            }

            return $jefe;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function reasignarSeguimiento($dniPropietario, $idSeguimiento)
    {

        $query = $this->db->connect()->prepare("UPDATE seguimiento SET dni_propietario = :dniPropietario WHERE id = :idSeguimiento ");

        try {

            $query->execute(['dniPropietario'  => $dniPropietario, 'idSeguimiento' => $idSeguimiento]);

            return true;
        } catch (PDOException $e) {

            return false;
        }
    }


    public function detallesAccion($idSeguimiento)
    {

        $accion = new Accion;

        $query = $this->db->connect()->prepare("SELECT 
                                                seguimiento.id,
                                                seguimiento.dni_propietario,
                                                tipo_documento.nombre,
                                                seguimiento.iddocumento,
                                                seguimiento.idtipodocumento,
                                                seguimiento.idestado,
                                                seguimiento.fecha 

                                                FROM 

                                                        seguimiento INNER JOIN tipo_documento ON seguimiento.idtipodocumento = tipo_documento.id 


                                                WHERE  

                                                        seguimiento.id = :id ");



        try {

            $query->execute(['id'  => $idSeguimiento]);


            while ($row = $query->fetch()) {

                $accion->id = $row['id'];
                $accion->dniPropietario = $row['dni_propietario'];
                $accion->nombreDocumento = $row['nombre'];
                $accion->idDocumento = $row['iddocumento'];
                $accion->idTipoDocumento = $row['idtipodocumento'];
                $accion->idEstado = $row['idestado'];
                $accion->fecha = $row['fecha'];
            }

            return $accion;
        } catch (PDOException $e) {
            return null;
        }
    }



    public function insertarEvidencia($listaEvidencia, $idAccion)
    {
        try {

            $conexion_bbdd = $this->db->connect();

            $query = $conexion_bbdd->prepare('INSERT INTO evidencia (idSeguimiento,nombre)
                                                        VALUES (:idSeguimiento ,:nombre)');

            $listaEvidencia = explode(",",$listaEvidencia);

            foreach ($listaEvidencia as $evidencia) {
                $query->bindParam(':idSeguimiento', $idAccion, PDO::PARAM_INT);
                $query->bindParam(':nombre', $evidencia, PDO::PARAM_STR);
                $query->execute();
            }


            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }



    public function actualizarFechaSeguimiento($fechaCumpliento,$accionPropuesta, $idSeguimiento,$dni)
    {
        $estadoProceso = 3;

        $query = $this->db->connect()->prepare("UPDATE seguimiento SET fecha_cumplimiento = :fecha_cumplimiento ,accion_propuesta = :accionPropuesta, idestado = $estadoProceso WHERE id = :id ");

        try {

            $query->execute(['fecha_cumplimiento'  => $fechaCumpliento, 'accionPropuesta'  => $accionPropuesta,'id' => $idSeguimiento]);

            $this->insertarSeguimientoDetalle($idSeguimiento,$dni,$estadoProceso);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function listaEvidencia($idAccion)
    {

        $listaJefes = array();

        $query = $this->db->connect()->prepare("SELECT 
                                                nombre
                                                FROM evidencia WHERE idSeguimiento = :idSeguimiento");



        try {

            $query->execute(['idSeguimiento' => $idAccion]);


            while ($row = $query->fetch()) {
                array_push($listaJefes, $row['nombre']);
            }

            return $listaJefes;
        } catch (PDOException $e) {
            return [];
        }
    }


    public function insertarSeguimientoDetalle($idseguimiento, $dniPropietario,$estado)
    {
        try {

            $conexion_bbdd = $this->db->connect();

            $query = $conexion_bbdd->prepare('INSERT INTO seguimiento_detalle (idseguimiento,dni_propietario,idestado)
                                                        VALUES (:idseguimiento,:dni_propietario,:idestado)');



            $query->execute([
                'idseguimiento' => $idseguimiento,
                'dni_propietario' => $dniPropietario,
                'idestado'=> $estado
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function listaEstadoDocumento($idAccion)
    {

        $listaEstadosDocumento = array();

        $query = $this->db->connect()->prepare("SELECT 
        rrhh.tabla_aquarius.dni,
        CONCAT(rrhh.tabla_aquarius.nombres,' ',rrhh.tabla_aquarius.apellidos) AS usuario,
        estado.nombre AS estado,
        seguimiento_detalle.fecha
        
        FROM seguimiento_detalle 
        INNER JOIN estado ON seguimiento_detalle.idestado = estado.id 
        INNER JOIN rrhh.tabla_aquarius ON seguimiento_detalle.dni_propietario = rrhh.tabla_aquarius.dni
        
        WHERE seguimiento_detalle.idseguimiento = :idseguimiento ORDER BY seguimiento_detalle.fecha ");



        try {

            $query->execute(['idseguimiento' => $idAccion]);


            while ($row = $query->fetch()) {

                $estadoDocumento = new EstadoDocumento;
                $estadoDocumento->dni = $row['dni'];
                $estadoDocumento->usuario = $row['usuario'];
                $estadoDocumento->estado = $row['estado'];
                $estadoDocumento->fecha = $row['fecha'];

                array_push($listaEstadosDocumento, $estadoDocumento);
            }

            return $listaEstadosDocumento;
        } catch (PDOException $e) {
            return [];
        }
    }


    public function insertarSeguimientoGeneral($idDocumento, $dniPropietario, $urlPDF, $idTipoDocumento, $nombreDocumento)
    {
        // Agregar tabla seguimiento

        $idSeguimiento = $this->insertarSeguimiento([
            'iddocumento' => $idDocumento,
            'idtipodocumento' => $idTipoDocumento,
            'dni_propietario' => $dniPropietario
        ]);

        $propietario =  $this->jefeDetalle($dniPropietario);

        //Crear un array

        $datos = array(
            "propietario" => $propietario,
            "idSeguimiento" => $idSeguimiento,
            "nombreDocumento" => $nombreDocumento,
            "urlPdf" => $urlPDF
        );

        // Enviar correo de asignación
        $email = new Email;
        $email->enviarNotificacionAsignadoFactorizado($datos);
    }

    public function actualizarComentario($idSeguimiento,$comentario)
    {

        $query = $this->db->connect()->prepare("UPDATE seguimiento SET comentario = CONCAT(comentario,' ',:comentario) WHERE id = :id ");

        try {

            $query->execute(['id' => $idSeguimiento,'comentario'  => $comentario]);

            return true;
        } catch (PDOException $e) {
            return $e->intl_get_error_message;
        }
    }

    public function dashboardAccionesTop($proyecto)
    {

        $listaAccionesDetalle = array();


        $query = $this->db->connect()->prepare("SELECT 
        seguimiento.id,
		tops.foto AS foto ,
        '-' AS peligroRiesgo ,
        tops.url_pdf AS hallazgo,
        IF(seguimiento.accion_propuesta IS NULL, '-', seguimiento.accion_propuesta ) AS accionPropuesta ,
        CONCAT(rrhh.tabla_aquarius.nombres,' ',rrhh.tabla_aquarius.apellidos) AS responsable,

        CAST(seguimiento.fecha AS DATE) AS fechaInicio,
        seguimiento.fecha_cumplimiento AS fechaCompromiso,
        (SELECT seguimiento_detalle.fecha 
        FROM seguimiento_detalle 
        WHERE seguimiento_detalle.idestado = 4 AND seguimiento_detalle.idseguimiento = seguimiento.id ) AS fechaCumplimiento,

        IF (CONCAT( DATEDIFF(seguimiento.fecha_cumplimiento,CAST(seguimiento.fecha AS DATE)) , ' días') IS NULL , '-', CONCAT( DATEDIFF(seguimiento.fecha_cumplimiento,CAST(seguimiento.fecha AS DATE)) , ' días') ) AS plazo,
		
        area_general.nombre  AS frenteTrabajo,
        estado.nombre AS estado,
        seguimiento.comentario
        FROM seguimiento INNER JOIN tops ON seguimiento.iddocumento = tops.idtop 
				 INNER JOIN area_general ON tops.idproyectodetalle = area_general.id
				 INNER JOIN rrhh.tabla_aquarius ON seguimiento.dni_propietario = rrhh.tabla_aquarius.dni
                 INNER JOIN estado ON seguimiento.idestado = estado.id 
                 
                 ".$this->sqlProyecto($proyecto)."

                 ORDER BY seguimiento.fecha DESC       
                 ");



        try {

            $query->execute();


            while ($row = $query->fetch()) {

                $accionDetalle = new AccionDetalle;
                $accionDetalle->id = $row['id'];
                $accionDetalle->foto = $row['foto'];
                $accionDetalle->peligroRiesgo = $row['peligroRiesgo'];
                $accionDetalle->hallazgo = $row['hallazgo'];
                $accionDetalle->accionPropuesta = $row['accionPropuesta'];
                $accionDetalle->responsable = $row['responsable'];
                $accionDetalle->fechaInicio = $row['fechaInicio'];
                $accionDetalle->fechaCumplimiento = $row['fechaCumplimiento'];
                $accionDetalle->plazo = $row['plazo'];
                $accionDetalle->frenteTrabajo = $row['frenteTrabajo'];
                $accionDetalle->estado = $row['estado'];
                $accionDetalle->comentario = $row['comentario'];
                $accionDetalle->evidencia = $this->listaEvidenciaDetalle($row['id']);


                array_push($listaAccionesDetalle, $accionDetalle);
            }

            return $listaAccionesDetalle;

        } catch (PDOException $e) {
            return [];
        }
    }


    public function dashboardAccionesByIdSeguimiento($idSeguimiento)
    {


        $listaAccionesDetalle = array();

        $query = $this->db->connect()->prepare("SELECT 
        seguimiento.id,
		tops.foto AS foto ,
        '' AS peligroRiesgo ,
        tops.url_pdf AS hallazgo,
        seguimiento.accion_propuesta AS accionPropuesta ,
        CONCAT(rrhh.tabla_aquarius.nombres,' ',rrhh.tabla_aquarius.apellidos) AS responsable,

        CAST(seguimiento.fecha AS DATE) AS fechaInicio,
        IF (seguimiento.fecha_cumplimiento IS NULL , '-' , seguimiento.fecha_cumplimiento)AS fechaCompromiso,
        (SELECT seguimiento_detalle.fecha 
        FROM seguimiento_detalle 
        WHERE seguimiento_detalle.idestado = 4 AND seguimiento_detalle.idseguimiento = seguimiento.id ) AS fechaCumplimiento,


        CONCAT( DATEDIFF(seguimiento.fecha_cumplimiento,CAST(seguimiento.fecha AS DATE)) , ' días') AS plazo,
		area_general.nombre  AS frenteTrabajo,
        estado.nombre AS estado,
        seguimiento.comentario
        FROM seguimiento INNER JOIN tops ON seguimiento.iddocumento = tops.idtop 
				 INNER JOIN area_general ON tops.idproyectodetalle = area_general.id
				 INNER JOIN rrhh.tabla_aquarius ON seguimiento.dni_propietario = rrhh.tabla_aquarius.dni
                 INNER JOIN estado ON seguimiento.idestado = estado.id WHERE seguimiento.id = :idSeguimiento");



        try {

            $query->execute(['idSeguimiento'  => $idSeguimiento]);


            while ($row = $query->fetch()) {

                $accionDetalle = new AccionDetalle;
                $accionDetalle->id = $row['id'];
                $accionDetalle->foto = $row['foto'];
                $accionDetalle->peligroRiesgo = $row['peligroRiesgo'];
                $accionDetalle->hallazgo = $row['hallazgo'];
                $accionDetalle->accionPropuesta = $row['accionPropuesta'];
                $accionDetalle->responsable = $row['responsable'];
                $accionDetalle->fechaInicio = $row['fechaInicio'];
                $accionDetalle->fechaCompromiso = $row['fechaCompromiso'];
                $accionDetalle->fechaCumplimiento = $row['fechaCumplimiento'];
                $accionDetalle->plazo = $row['plazo'];
                $accionDetalle->frenteTrabajo = $row['frenteTrabajo'];
                $accionDetalle->estado = $row['estado'];
                $accionDetalle->comentario = $row['comentario'];
                $accionDetalle->evidencia = $this->listaEvidenciaDetalle($row['id']);
                $accionDetalle->listaEstados = $this->listaEstadosDetalle($row['id']);


                array_push($listaAccionesDetalle, $accionDetalle);
            }

            return $listaAccionesDetalle;

        } catch (PDOException $e) {
            return [];
        }
    }

    public function listaEvidenciaDetalle($idSeguimiento)
    {

        $listaEvidenciaDetalle = array();

        $query = $this->db->connect()->prepare("SELECT nombre FROM evidencia WHERE idSeguimiento = :idSeguimiento");



        try {

            $query->execute(['idSeguimiento'  => $idSeguimiento]);


            while ($row = $query->fetch()) {
                //$listaEvidenciaDetalle = $row;
                array_push($listaEvidenciaDetalle,$row);
            }

            return $listaEvidenciaDetalle;
            
        } catch (PDOException $e) {
            return [];
        }
    }
    
    public function listaEstadosDetalle($idSeguimiento)
    {

        $listaEstadosDetalle = array();

        $query = $this->db->connect()->prepare("SELECT 
        CONCAT(rrhh.tabla_aquarius.nombres,' ',rrhh.tabla_aquarius.apellidos) AS responsable,
		estado.nombre AS estado,
        seguimiento_detalle.fecha
        FROM seguimiento_detalle INNER JOIN rrhh.tabla_aquarius ON seguimiento_detalle.dni_propietario = rrhh.tabla_aquarius.dni
						        INNER JOIN estado ON seguimiento_detalle.idestado = estado.id WHERE seguimiento_detalle.idseguimiento = :idSeguimiento");



        try {

            $query->execute(['idSeguimiento'  => $idSeguimiento]);


            while ($row = $query->fetch()) {
                array_push($listaEstadosDetalle,$row);
            }

            return $listaEstadosDetalle;
            
        } catch (PDOException $e) {
            return [];
        }
    }
    

    public function dashboardAccionesSeguridad($proyecto)
    {

        $listaAccionesDetalle = array();

        $query = $this->db->connect()->prepare("SELECT 
        seguimiento.id,
		seguridadDetalle.evidenciaencontrada AS foto ,
        '' AS peligroRiesgo ,
        seguridaddetalle.url_pdf AS hallazgo,
        IF(seguimiento.accion_propuesta IS NULL, '-', seguimiento.accion_propuesta ) AS accionPropuesta ,
        CONCAT(rrhh.tabla_aquarius.nombres,' ',rrhh.tabla_aquarius.apellidos) AS responsable,

        CAST(seguimiento.fecha AS DATE) AS fechaInicio,
        IF (seguimiento.fecha_cumplimiento IS NULL , '-' , seguimiento.fecha_cumplimiento)AS fechaCompromiso,
        (SELECT seguimiento_detalle.fecha 
        FROM seguimiento_detalle 
        WHERE seguimiento_detalle.idestado = 4 AND seguimiento_detalle.idseguimiento = seguimiento.id ) AS fechaCumplimiento,

        IF (CONCAT( DATEDIFF(seguimiento.fecha_cumplimiento,CAST(seguimiento.fecha AS DATE)) , ' días') IS NULL , '-', CONCAT( DATEDIFF(seguimiento.fecha_cumplimiento,CAST(seguimiento.fecha AS DATE)) , ' días') ) AS plazo,
		
        seguridadDetalle.area  AS frenteTrabajo,
        estado.nombre AS estado,
        seguimiento.comentario



        FROM seguimiento INNER JOIN seguridadDetalle ON seguimiento.iddocumento = seguridadDetalle.id
				 INNER JOIN rrhh.tabla_aquarius ON seguimiento.dni_propietario = rrhh.tabla_aquarius.dni
                 INNER JOIN estado ON seguimiento.idestado = estado.id 
                 
                 ".$this->sqlProyecto($proyecto)."
                 
                 ORDER BY seguimiento.fecha DESC 
                 
                 ");



        try {

            $query->execute();


            while ($row = $query->fetch()) {

                $accionDetalle = new AccionDetalle;
                $accionDetalle->id = $row['id'];
                $accionDetalle->foto = $row['foto'];
                $accionDetalle->peligroRiesgo = $row['peligroRiesgo'];
                $accionDetalle->hallazgo = $row['hallazgo'];
                $accionDetalle->accionPropuesta = $row['accionPropuesta'];
                $accionDetalle->responsable = $row['responsable'];
                $accionDetalle->fechaInicio = $row['fechaInicio'];
                $accionDetalle->fechaCompromiso = $row['fechaCompromiso'];
                $accionDetalle->fechaCumplimiento = $row['fechaCumplimiento'];
                $accionDetalle->plazo = $row['plazo'];
                $accionDetalle->frenteTrabajo = $row['frenteTrabajo'];
                $accionDetalle->estado = $row['estado'];
                $accionDetalle->comentario = $row['comentario'];
                $accionDetalle->evidencia = $this->listaEvidenciaDetalle($row['id']);
                $accionDetalle->listaEstados = $this->listaEstadosDetalle($row['id']);


                array_push($listaAccionesDetalle, $accionDetalle);
            }

            return $listaAccionesDetalle;

        } catch (PDOException $e) {
            return [];
        }
    }

    function sqlProyecto($proyecto){
        $sqlProyecto = "";
        
        if($proyecto != 100){
            $sqlProyecto = " WHERE ssma.tops.sede LIKE '%$proyecto%' ";
        }
        return $sqlProyecto;
    }

}
