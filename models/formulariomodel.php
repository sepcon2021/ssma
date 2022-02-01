<?php

require_once 'models/examenDetalle.php';
require_once 'models/pregunta.php';
require_once 'models/alternativa.php';
require_once 'models/examen.php';
require_once 'models/firmaFacilitador.php';


class FormularioModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertExamen($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('INSERT INTO examen 
            (idProyecto,fase,facilitador,cliente,fecha,duracion,idTipo,tema,horaInicio,
            horaFin,duracionProgramada,duracionEfectiva,idCurso,idAreaCapacitacion,detalle,
            nota,estado,idFirmaFacilitador,observacion,finalizo,continuara,fechaContinuacion,temarioA,temarioB,correo,idareaempresa) VALUE

            (:idProyecto,:fase,:facilitador,:cliente,:fecha,:duracion,:idTipo,:tema,:horaInicio,
            :horaFin,:duracionProgramada,:duracionEfectiva,:idCurso,:idAreaCapacitacion,:detalle,
            :nota,:estado,:idFirmaFacilitador,:observacion,:finalizo,:continuara,:fechaContinuacion,:temarioA,:temarioB,:correo,:idareaempresa)');



            $query->execute([
                'idProyecto' => $examen['idProyecto'],
                'fase' => $examen['fase'],
                'facilitador' => $examen['facilitador'],
                'cliente' => $examen['cliente'],
                'fecha' => $examen['fecha'],
                'duracion' => $examen['duracion'],
                'idTipo' => $examen['idTipo'],
                'tema' => $examen['tema'],
                'horaInicio' => $examen['horaInicio'],
                'horaFin' => $examen['horaFin'],
                'duracionProgramada' => $examen['duracionProgramada'],
                'duracionEfectiva' => $examen['duracionEfectiva'],
                'idCurso' => $examen['idCurso'],
                'idAreaCapacitacion' => $examen['idAreaCapacitacion'],
                'detalle' => $examen['detalle'],
                'nota' => $examen['nota'],
                'estado' => $examen['estado'],
                'idFirmaFacilitador' => $examen['idFirmaFacilitador'],
                'observacion' => $examen['observacion'],
                'finalizo' => $examen['finalizo'],
                'continuara' => $examen['continuara'],
                'fechaContinuacion' => $examen['fechaContinuacion'],
                'temarioA' => $examen['temarioA'],
                'temarioB' => $examen['temarioB'],
                'correo' => 0,
                'idareaempresa' => $examen['idAreaEmpresa'],



            ]);

            //EXTRAEMOS EL ID DEL INSERT QUE REALZIAMOS
            // comentario 69 https://www.php.net/manual/en/pdo.lastinsertid.php

            $last_insert_id = $conexion_bbdd->lastInsertId();

            return $last_insert_id;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updateExamenProyecto($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen SET idProyecto = :idProyecto
                                                        WHERE id = :id');

            $query->execute([
                'id' => $examen['id'],
                'idProyecto' => $examen['idProyecto']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updateExamenFase($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen SET fase = :fase
                                                        WHERE id = :id');

            $query->execute([
                'id' => $examen['id'],
                'fase' => $examen['fase']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updateExamenFacilitador($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen SET facilitador = :facilitador
                                                        WHERE id = :id');

            $query->execute([
                'id' => $examen['id'],
                'facilitador' => $examen['facilitador']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }




    public function updateExamenCliente($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen SET cliente = :cliente
                                                        WHERE id = :id');

            $query->execute([
                'id' => $examen['id'],
                'cliente' => $examen['cliente']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function updateExamenDuracion($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen SET duracion = :duracion
                                                        WHERE id = :id');

            $query->execute([
                'id' => $examen['id'],
                'duracion' => $examen['duracion']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updateExamenTema($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen SET tema = :tema
                                                        WHERE id = :id');

            $query->execute([
                'id' => $examen['id'],
                'tema' => $examen['tema']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function updateExamenDuracionProgramada($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen SET duracionProgramada= :duracionProgramada
                                                        WHERE id = :id');

            $query->execute([
                'id' => $examen['id'],
                'duracionProgramada' => $examen['duracionProgramada']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function updateExamenDuracionEfectiva($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen SET duracionEfectiva= :duracionEfectiva
                                                        WHERE id = :id');

            $query->execute([
                'id' => $examen['id'],
                'duracionEfectiva' => $examen['duracionEfectiva']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function updateExamenIdCurso($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen SET idCurso = :idCurso
                                                        WHERE id = :id');

            $query->execute([
                'id' => $examen['id'],
                'idCurso' => $examen['idCurso']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function updateExamenIdAreaCapacitacion($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen SET idAreaCapacitacion = :idAreaCapacitacion
                                                        WHERE id = :id');

            $query->execute([
                'id' => $examen['id'],
                'idAreaCapacitacion' => $examen['idAreaCapacitacion']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }



    public function updateExamenFecha($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen SET fecha = :fecha
                                                        WHERE id = :id');

            $query->execute([
                'id' => $examen['id'],
                'fecha' => $examen['fecha']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updateExamenHoraInicio($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen SET horaInicio = :horaInicio
                                                        WHERE id = :id');

            $query->execute([
                'id' => $examen['id'],
                'horaInicio' => $examen['horaInicio']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updateExamenHoraFin($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen SET horaFin = :horaFin
                                                        WHERE id = :id');

            $query->execute([
                'id' => $examen['id'],
                'horaFin' => $examen['horaFin'],
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updateExamenNota($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen SET nota = :nota
                                                        WHERE id = :id');

            $query->execute([
                'id' => $examen['id'],
                'nota' => $examen['nota'],
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updateExamenFirmaFacilitador($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen SET idFirmaFacilitador = :idFirmaFacilitador
                                                        WHERE id = :id');

            $query->execute([
                'idFirmaFacilitador' => $examen['idFirmaFacilitador'],
                'id' => $examen['id']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function updateEnviarCorreo($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen SET correo = :correo
                                                        WHERE id = :id');

            $query->execute([
                'correo' => $examen['enviarCorreo'],
                'id' => $examen['id']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function updateExamenObservacion($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen SET observacion = :observacion
                                                        WHERE id = :id');

            $query->execute([
                'observacion' => $examen['observacion'],
                'id' => $examen['id']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updateExamenFinalizo($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen 
                                             SET finalizo = :finalizo
                                                        WHERE id = :id');

            $query->execute([
                'finalizo' => $examen['finalizo'],
                'id' => $examen['id']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function updateExamenContinuara($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen 
                                             SET continuara = :continuara
                                                        WHERE id = :id');

            $query->execute([
                'continuara' => $examen['continuara'],
                'id' => $examen['id']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function updateExamenFechaContinuacion($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen 
                                             SET fechaContinuacion = :fechaContinuacion
                                                        WHERE id = :id');

            $query->execute([
                'fechaContinuacion' => $examen['fechaContinuacion'],
                'id' => $examen['id']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function updateExamenTemarioA($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen 
                                             SET temarioA = :temarioA
                                                        WHERE id = :id');

            $query->execute([
                'temarioA' => $examen['temarioA'],
                'id' => $examen['id']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updateExamenTemarioB($examen)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE examen 
                                             SET temarioB = :temarioB
                                                        WHERE id = :id');

            $query->execute([
                'temarioB' => $examen['temarioB'],
                'id' => $examen['id']
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function findByIdExamen($idExamen)
    {
        try {
            $examen = new Examen();


            $query = $this->db->connectformulario()->query("SELECT 
            examen.id,
            examen.idProyecto,
            proyecto.nombre AS nombreProyecto,
            examen.fase,
            examen.facilitador,
            examen.cliente,
            examen.fecha,
            examen.duracion,
            examen.idTipo,
            examen.tema,
            examen.horaInicio,
            examen.horaFin,
            examen.duracionProgramada,
            examen.duracionEfectiva,
            examen.idCurso,
            examen.idAreaCapacitacion,
            examen.detalle,
            examen.nota,
            examen.estado,
            examen.observacion,
            examen.finalizo,
            examen.continuara,
            examen.fechaContinuacion,
            examen.temarioA,
            examen.temarioB,
            examen.idFirmaFacilitador,
            examen.correo,
            examen.idareaempresa
            FROM 
            examen INNER JOIN proyecto ON examen.idProyecto = proyecto.id  WHERE examen.id = '$idExamen' ");

            while ($row = $query->fetch()) {
                $examen->id = $row['id'];
                $examen->idProyecto = $row['idProyecto'];
                $examen->nombreProyecto = $row['nombreProyecto'];
                $examen->fase = $row['fase'];
                $examen->facilitador = $row['facilitador'];
                $examen->cliente = $row['cliente'];
                $examen->fecha = $row['fecha'];
                $examen->duracion = $row['duracion'];
                $examen->idTipo = $row['idTipo'];
                $examen->tema = $row['tema'];
                $examen->horaInicio = $row['horaInicio'];
                $examen->horaFin = $row['horaFin'];

                $examen->duracionProgramada = $row['duracionProgramada'];
                $examen->duracionEfectiva = $row['duracionEfectiva'];
                $examen->idCurso = $row['idCurso'];
                $examen->idAreaCapacitacion = $row['idAreaCapacitacion'];
                $examen->detalle = $row['detalle'];
                $examen->nota = $row['nota'];
                $examen->estado = $row['estado'];

                $examen->observacion = $row['observacion'];
                $examen->finalizo = $row['finalizo'];
                $examen->continuara = $row['continuara'];
                $examen->fechaContinuacion = $row['fechaContinuacion'];
                $examen->temarioA = $row['temarioA'];
                $examen->temarioB = $row['temarioB'];
                $examen->idareaempresa = $row['idareaempresa'];


                $examen->idFirmaFacilitador = $row['idFirmaFacilitador'];
                $examen->correo = $row['correo'];
                $examen->listaPreguntas = $this->listaPreguntas($row['id']);
            }

            return $examen;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }




    public function insertPregunta($pregunta)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('INSERT INTO pregunta (nombre,respuesta,puntaje,idexamen,idtipopregunta,obligatorio)
                                                        VALUES (:nombre,:respuesta,:puntaje,:idexamen,:idtipopregunta,:obligatorio)');

            $query->execute([
                'nombre' => $pregunta['nombre'],
                'respuesta' => $pregunta['respuesta'],
                'puntaje' => $pregunta['puntaje'],
                'idexamen' => $pregunta['idExamen'],
                'idtipopregunta' => $pregunta['idtipopregunta'],
                'obligatorio' => $pregunta['obligatorio'],

            ]);

            //EXTRAEMOS EL ID DEL INSERT QUE REALZIAMOS
            // comentario 69 https://www.php.net/manual/en/pdo.lastinsertid.php

            $last_insert_id = $conexion_bbdd->lastInsertId();

            return $last_insert_id;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updatePreguntaNombre($pregunta)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE pregunta SET nombre = :nombre
                                                                WHERE id = :id');

            $query->execute([
                'nombre' => $pregunta['nombre'],
                'id' => $pregunta['idPregunta']
            ]);


            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updatePreguntaPuntaje($pregunta)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE pregunta SET puntaje = :puntaje
                                                                 WHERE id = :id');

            $query->execute([
                'puntaje' => $pregunta['puntaje'],
                'id' => $pregunta['idPregunta']
            ]);


            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updatePreguntaRespuesta($pregunta)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE pregunta SET respuesta = :respuesta
                                                                 WHERE id = :id');

            $query->execute([
                'respuesta' => $pregunta['respuesta'],
                'id' => $pregunta['idPregunta']
            ]);


            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function updatePreguntaTipo($pregunta)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE pregunta SET idtipopregunta = :idtipopregunta
                                                                 WHERE id = :id');

            $query->execute([
                'idtipopregunta' => $pregunta['idtipopregunta'],
                'id' => $pregunta['idPregunta']
            ]);


            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function deletePregunta($pregunta)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('DELETE FROM  pregunta WHERE id = :id');

            $query->execute([
                'id' => $pregunta['idPregunta']
            ]);


            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function insertAlternativa($alternativa)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('INSERT INTO alternativa (nombre,idpregunta,respuesta)
                                                        VALUES (:nombre,:idpregunta,:respuesta)');

            $query->execute([
                'nombre' => $alternativa['nombre'],
                'idpregunta' => $alternativa['idPregunta'],
                'respuesta' => $alternativa['respuesta'],
            ]);



            $last_insert_id = $conexion_bbdd->lastInsertId();

            return $last_insert_id;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updateAlternativaNombre($alternativa)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE alternativa SET nombre = :nombre
                                                                WHERE id = :id');

            $query->execute([
                'nombre' => $alternativa['nombre'],
                'id' => $alternativa['idAlternativa']
            ]);


            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function updateAlternativaRespuesta($idPregunta, $idAlternativa)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('UPDATE alternativa SET respuesta = 0 WHERE idPregunta = :idPregunta');
            $query->execute(['idPregunta' => $idPregunta]);

            $query = $conexion_bbdd->prepare('UPDATE alternativa SET respuesta = 1
                                                                WHERE id = :id');

            $query->execute([
                'id' => $idAlternativa
            ]);


            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function deleteAlternativa($alternativa)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('DELETE FROM  alternativa WHERE id = :id');

            $query->execute([
                'id' => $alternativa['idAlternativa']
            ]);


            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function listaExamen($codigo, $idAreaEmpresa)
    {
        try {
            $listaExamenDetalle = array();


            $query = $this->db->connectformulario()->query("SELECT 
            id,
            tema,
            fecha,
            tipo
            
            FROM 
            examenDetalle WHERE estado = 1 AND idproyecto = '$codigo' AND idareaempresa = '$idAreaEmpresa' ORDER BY registro DESC");

            while ($row = $query->fetch()) {
                $modelExamenDetalle = new ExamenDetalle;
                $modelExamenDetalle->id = $row['id'];
                $modelExamenDetalle->tema = $row['tema'];
                $modelExamenDetalle->fecha = $row['fecha'];
                $modelExamenDetalle->tipo = $row['tipo'];
                array_push($listaExamenDetalle, $modelExamenDetalle);
            }

            return $listaExamenDetalle;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function listaExamenAscendiente()
    {
        try {
            $listaExamenDetalle = array();


            $query = $this->db->connectformulario()->query('SELECT 
            id,
            tema,
            fecha,
            tipo
            
            FROM 
            examenDetalle WHERE estado = 1 AND  CAST(now() as DATE) = CAST(fecha AS DATE) ORDER BY registro ASC');

            while ($row = $query->fetch()) {
                $modelExamenDetalle = new ExamenDetalle;
                $modelExamenDetalle->id = $row['id'];
                $modelExamenDetalle->tema = $row['tema'];
                $modelExamenDetalle->fecha = $row['fecha'];
                $modelExamenDetalle->tipo = $row['tipo'];
                array_push($listaExamenDetalle, $modelExamenDetalle);
            }

            return $listaExamenDetalle;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function listaPreguntas($idExamen)
    {
        try {
            $listaPreguntas = array();

            $query = $this->db->connectformulario()->prepare('SELECT id,nombre,respuesta,puntaje,idtipopregunta
            FROM pregunta
            WHERE IDEXAMEN = :idexamen');


            $query->execute(['idexamen'  => $idExamen]);

            while ($row = $query->fetch()) {
                $pregunta = new Pregunta;
                $pregunta->id = $row['id'];
                $pregunta->nombre = $row['nombre'];
                $pregunta->respuesta   = $row['respuesta'];
                $pregunta->puntaje    = $row['puntaje'];
                $pregunta->idtipopregunta = $row['idtipopregunta'];
                $pregunta->alternativa = $this->listaAlternativas($row['id']);

                array_push($listaPreguntas, $pregunta);
            }
            return $listaPreguntas;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function listaAlternativas($idPregunta)
    {
        try {
            $listaAlternativa = array();

            $query = $this->db->connectformulario()->prepare('SELECT id,nombre,respuesta
            FROM alternativa
            WHERE IDPREGUNTA = :idpregunta');


            $query->execute(['idpregunta'  => $idPregunta]);

            while ($row = $query->fetch()) {
                $alternativa = new Alternativa;
                $alternativa->id = $row['id'];
                $alternativa->nombre = $row['nombre'];
                $alternativa->respuesta = $row['respuesta'];
                array_push($listaAlternativa, $alternativa);
            }
            return $listaAlternativa;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteExamen($idExamen)
    {
        try {

            $query = $this->db->connectformulario()->prepare("UPDATE examen SET estado = 0  WHERE id =:idExamen");
            $query->execute(['idExamen'  => $idExamen]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }



    public function getListaFirmaFacilitador()
    {

        $listaFirmaFacilitador = array();

        try {

            $query = $this->db->connectformulario()->prepare("SELECT id,nombre,urlImagen FROM firmaFacilitador");
            $query->execute();

            while ($row = $query->fetch()) {
                $firmaFacilitador = new FirmaFacilitador;
                $firmaFacilitador->id = $row['id'];
                $firmaFacilitador->nombre = $row['nombre'];
                $firmaFacilitador->urlImagen = $row['urlImagen'];

                array_push($listaFirmaFacilitador, $firmaFacilitador);
            }


            return $listaFirmaFacilitador;
        } catch (PDOexception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function insertFirmaFacilitador($data)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('INSERT INTO firmaFacilitador (nombre,urlImagen)
                                                        VALUE (:nombre,:urlImagen)');

            $query->execute([
                'nombre' => $data['nombreFacilitador'],
                'urlImagen' => $data['urlImagen']
            ]);

            $last_insert_id = $conexion_bbdd->lastInsertId();

            return $last_insert_id;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }


    public function insertAlternativaBulk($idPregunta, $listaAlternativas)
    {
        try {

            $conexion_bbdd = $this->db->connectformulario();

            $query = $conexion_bbdd->prepare('INSERT INTO alternativa (nombre,idPregunta,respuesta)
            VALUES (:nombre,:idPregunta,:respuesta)');


            foreach ($listaAlternativas as $alternativa) {

                $query->bindParam(':nombre', $alternativa->nombre, PDO::PARAM_STR);
                $query->bindParam(':idPregunta', $idPregunta, PDO::PARAM_INT);
                $query->bindParam(':respuesta', $alternativa->respuesta, PDO::PARAM_INT);
                $query->execute();
            }


            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
