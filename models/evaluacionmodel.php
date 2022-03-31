<?php
/*require_once 'entity/evaluacionEntity.php';*/
require_once 'status/repuestas.php';


class EvaluacionModel extends Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function createEvento($evento)
  {
    $conexion_bbdd = $this->db->connect();

    try {

      $query = $conexion_bbdd->prepare("INSERT competencia_evento 
    (idUsuario ,idProyecto,nombre,carpeta) VALUES 
    (:idUsuario ,:idProyecto ,:nombre,:carpeta)");

      $query->execute([
        "idUsuario" => $evento["idUsuario"],
        "nombre" => $evento["nombre"],
        "carpeta" => $evento["carpeta"],
        "idProyecto" => $evento["idProyecto"],
      ]);


      $last_insert_id = $conexion_bbdd->lastInsertId();

      return $last_insert_id;
    } catch (PDOException $exception) {
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }


  public function getListEvento($idProyecto)
  {

    $list = array();

    try {

      $query = $this->db->connect()->prepare("SELECT  
     id,idUsuario,nombre,carpeta,disponible,registro,idProyecto
     FROM competencia_evento
     WHERE idProyecto = :idProyecto
     ");

      $query->execute(["idProyecto" => $idProyecto]);

      while ($row = $query->fetch()) {
        array_push($list, $row);
      }

      return $list;
    } catch (PDOException $exception) {
      echo $exception->getMessage();
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }

  public function updateEvento($evento)
  {
    try {

      $query = $this->db->connect()->prepare("UPDATE competencia_evento  SET 
     nombre = :nombre 
     WHERE id = :id
    
    ");



      $query->execute([
        "nombre" => $evento["nombre"],
        "id" => $evento["id"]
      ]);



      return true;
    } catch (PDOException $exception) {
      echo $exception;
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }



  public function createGroup($evaluacionEntity)
  {

    $conexion_bbdd = $this->db->connect();

    try {

      $query = $conexion_bbdd->prepare("INSERT competencia_grupo 
    (idUsuario ,idEvento ,nombre,descripcion,puestoEvaluador,puestoEvaluado) VALUES 
    (:idUsuario ,:idEvento,:nombre,:descripcion,:puestoEvaluador,:puestoEvaluado)");

      $query->execute([
        "idUsuario" => $evaluacionEntity["idUsuario"],
        "nombre" => $evaluacionEntity["nombre"],
        "descripcion" => $evaluacionEntity["descripcion"],
        "puestoEvaluador" => $evaluacionEntity["puestoEvaluador"],
        "puestoEvaluado" => $evaluacionEntity["puestoEvaluado"],
        "idEvento" => $evaluacionEntity["idEvento"],
      ]);


      $last_insert_id = $conexion_bbdd->lastInsertId();

      return $last_insert_id;
    } catch (PDOException $exception) {
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }


  public function getListGroup($idEvento)
  {

    $list = array();

    try {

      $query = $this->db->connect()->prepare("SELECT  
     id ,idUsuario ,nombre,descripcion,puestoEvaluador,puestoEvaluado,registro
     FROM competencia_grupo 
     WHERE idEvento = :idEvento
     ");

      $query->execute(["idEvento" => $idEvento]);

      while ($row = $query->fetch()) {
        array_push($list, $row);
      }

      return $list;
    } catch (PDOException $exception) {
      echo $exception->getMessage();
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }


  public function updateGroup($evaluacionEntity)
  {

    try {

      $query = $this->db->connect()->prepare("UPDATE competencia_grupo  SET 
     nombre = :nombre ,
     descripcion = :descripcion ,
     puestoEvaluador = :puestoEvaluador,
     puestoEvaluado = :puestoEvaluado

     WHERE id = :id
    
    ");



      $query->execute([
        "nombre" => $evaluacionEntity["nombre"],
        "descripcion" => $evaluacionEntity["descripcion"],
        "puestoEvaluador" => $evaluacionEntity["puestoEvaluador"],
        "puestoEvaluado" => $evaluacionEntity["puestoEvaluado"],
        "id" => $evaluacionEntity["idGroup"]
      ]);



      return true;
    } catch (PDOException $exception) {
      echo $exception;
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }



  public function
  insertBulkUsuario($listEvaluador, $listEvaluado, $idGroup)
  {

    $list = array();

    foreach ($listEvaluador as $evaluador) {
      $data = "( 1 , $idGroup ,'" . $evaluador . "','0')";
      array_push($list, $data);
    }

    foreach ($listEvaluado as $evaluado) {
      $data = "( 2 , $idGroup ,'" . $evaluado . "','0')";
      array_push($list, $data);
    }



    try {

      $pdo = $this->db->connect();
      $query = $pdo->prepare("INSERT INTO competencia_usuario (idTipoUsuario , idGrupo , dni , estadoCreado ) 
                              VALUES " . implode(',', $list));

      $pdo->beginTransaction();
      $query->execute();
      $pdo->commit();

      return true;
    } catch (PDOException $exception) {

      echo $exception;
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
    }
  }




  public function getListEvaluadoAndEvaluador($idGroup)
  {

    $list = array();

    try {

      $query = $this->db->connect()->prepare("SELECT 

rrhh.tabla_aquarius.dni,
ssma.competencia_usuario.idTipoUsuario,
CONCAT(rrhh.tabla_aquarius.nombres , ' ' ,rrhh.tabla_aquarius.apellidos ) AS usuario,
rrhh.tabla_aquarius.dcostos AS descripcionCostos,
rrhh.tabla_aquarius.dcargo AS descripcionCargo
FROM 

ssma.competencia_usuario INNER JOIN rrhh.tabla_aquarius ON ssma.competencia_usuario.dni =  rrhh.tabla_aquarius.dni
WHERE ssma.competencia_usuario.idGrupo = :idGrupo
     ");

      $query->execute(["idGrupo" => $idGroup]);

      while ($row = $query->fetch()) {
        array_push($list, $row);
      }

      return $list;
    } catch (PDOException $exception) {
      echo $exception;
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }


  public function getListSeguimientoEvaluacion($idGroup)
  {

    $list = array();

    try {

      $query = $this->db->connect()->prepare("SELECT 
competencia_evaluacion.id,
competencia_evaluacion.dniEvaluador,
CONCAT(tabla_aquarius_evaluador.nombres , ' ' ,tabla_aquarius_evaluador.apellidos) AS usuarioEvaluador , 
competencia_evaluacion.dniEvaluado,
CONCAT(tabla_aquarius_evaluado.nombres , ' ' ,tabla_aquarius_evaluado.apellidos) AS usuarioEvaluado ,



      competencia_evaluacion.firmaEvaluador,
      competencia_evaluacion.firmaEvaluado,

      competencia_evaluacion.compromiso1 ,
      competencia_evaluacion.compromiso2 ,
      competencia_evaluacion.compromiso3 ,
      competencia_evaluacion.compromiso4 ,
      competencia_evaluacion.compromiso5 ,
      
      competencia_evaluacion.seguridad1,
      competencia_evaluacion.seguridad2 ,
      competencia_evaluacion.seguridad3 ,
      competencia_evaluacion.seguridad4 ,
      competencia_evaluacion.seguridad5 ,

      competencia_evaluacion.estres1 ,
      competencia_evaluacion.estres2 ,
      competencia_evaluacion.estres3 ,
      competencia_evaluacion.estres4 ,
      competencia_evaluacion.estres5 ,
      competencia_evaluacion.oportunidadMejora 




FROM 

competencia_evaluacion INNER JOIN rrhh.tabla_aquarius  AS tabla_aquarius_evaluador ON competencia_evaluacion.dniEvaluador = tabla_aquarius_evaluador.dni
					 INNER JOIN rrhh.tabla_aquarius  AS tabla_aquarius_evaluado ON competencia_evaluacion.dniEvaluado = tabla_aquarius_evaluado.dni
WHERE competencia_evaluacion.idGrupo = :idGrupo

ORDER BY competencia_evaluacion.dniEvaluador DESC
     ");

      $query->execute(["idGrupo" => $idGroup]);

      while ($row = $query->fetch()) {
        array_push($list, $row);
      }

      return $list;
    } catch (PDOException $exception) {
      echo $exception;
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }


  public function getListSeguimientoEvaluacionGeneral($idEvento)
  {

    $list = array();

    try {

      $query = $this->db->connect()->prepare("SELECT 
competencia_grupo.id AS idGrupo,
competencia_evaluacion.id,
competencia_evaluacion.dniEvaluador,
CONCAT(tabla_aquarius_evaluador.nombres , ' ' ,tabla_aquarius_evaluador.apellidos) AS usuarioEvaluador , 
competencia_evaluacion.dniEvaluado,
CONCAT(tabla_aquarius_evaluado.nombres , ' ' ,tabla_aquarius_evaluado.apellidos) AS usuarioEvaluado ,
      competencia_evaluacion.firmaEvaluador,
      competencia_evaluacion.firmaEvaluado,
      competencia_evaluacion.compromiso1 ,
      competencia_evaluacion.compromiso2 ,
      competencia_evaluacion.compromiso3 ,
      competencia_evaluacion.compromiso4 ,
      competencia_evaluacion.compromiso5 ,
      competencia_evaluacion.seguridad1,
      competencia_evaluacion.seguridad2 ,
      competencia_evaluacion.seguridad3 ,
      competencia_evaluacion.seguridad4 ,
      competencia_evaluacion.seguridad5 ,
      competencia_evaluacion.estres1 ,
      competencia_evaluacion.estres2 ,
      competencia_evaluacion.estres3 ,
      competencia_evaluacion.estres4 ,
      competencia_evaluacion.estres5 ,
      competencia_evaluacion.oportunidadMejora,
      competencia_grupo.idEvento
FROM 

competencia_evaluacion INNER JOIN rrhh.tabla_aquarius  AS tabla_aquarius_evaluador ON competencia_evaluacion.dniEvaluador = tabla_aquarius_evaluador.dni
					 INNER JOIN rrhh.tabla_aquarius  AS tabla_aquarius_evaluado ON competencia_evaluacion.dniEvaluado = tabla_aquarius_evaluado.dni
                     INNER JOIN competencia_grupo ON competencia_grupo.id = competencia_evaluacion.idGrupo
WHERE competencia_grupo.idEvento = :idEvento
ORDER BY competencia_evaluacion.dniEvaluador DESC
     ");

      $query->execute(["idEvento" => $idEvento]);

      while ($row = $query->fetch()) {
        array_push($list, $row);
      }

      return $list;
    } catch (PDOException $exception) {
      echo $exception;
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }


  public function getListUsuario($idTipoUsuario, $idGroup)
  {

    $list = array();

    try {

      $query = $this->db->connect()->prepare("SELECT 
ssma.competencia_usuario.dni
FROM ssma.competencia_usuario 
WHERE ssma.competencia_usuario.estadoCreado = 0 AND ssma.competencia_usuario.idTipoUsuario = :idTipoUsuario AND ssma.competencia_usuario.idGrupo = :idGrupo

     ");

      $query->execute(["idTipoUsuario" => $idTipoUsuario, "idGrupo" => $idGroup]);

      while ($row = $query->fetch()) {
        array_push($list, $row);
      }

      return $list;
    } catch (PDOException $exception) {
      echo $exception;
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }


  public function
  insertBulkSeguimiento($idGroup, $listEvaluado, $listEvaluador)
  {

    $list = array();

    foreach ($listEvaluado as $evaluado) {
      foreach ($listEvaluador as $evaluador) {
        $data = " ( $idGroup , 
                    '" . $evaluador["dni"] . "' , 
                    '' ,
                    '" . $evaluado["dni"] . "' , 
                    '' ,
                     0 ,

                    null , 
                    null ,
                    null , 
                    null ,
                    null ,
                    
                    null , 
                    null ,
                    null , 
                    null ,
                    null ,
                    

                    null , 
                    null ,
                    null , 
                    null ,
                    null ,
                    

                    '1999-10-10',
                    ''

                    )";
        array_push($list, $data);
      }
    }


    try {

      $pdo = $this->db->connect();
      $query = $pdo->prepare("INSERT INTO competencia_evaluacion
      (
idGrupo,
dniEvaluador,
firmaEvaluador,
dniEvaluado,
firmaEvaluado,
estado,
compromiso1,
compromiso2,
compromiso3,
compromiso4,
compromiso5,

seguridad1,
seguridad2,
seguridad3,
seguridad4,
seguridad5,

estres1,
estres2,
estres3,
estres4,
estres5,

fechaEvaluacion,
oportunidadMejora)

       VALUES " . implode(',', $list));



      $pdo->beginTransaction();
      $query->execute();
      $pdo->commit();
    } catch (PDOException $exception) {

      echo $exception;
      echo $exception->getMessage();
      //throw $th;
    }
  }

  public function updateListUsuario($idGroup)
  {

    try {

      $query = $this->db->connect()->prepare("UPDATE competencia_usuario SET competencia_usuario.estadoCreado = 1 
      WHERE  competencia_usuario.idGrupo = :idGrupo
     ");

      $query->execute(["idGrupo" => $idGroup]);

      return true;
    } catch (PDOException $exception) {
      echo $exception;
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }

  public function getListSeguimientoByEvaluador($dniEvaluador, $estado)
  {

    $list = array();

    try {

      $query = $this->db->connect()->prepare("SELECT 
competencia_evaluacion.id,
competencia_evaluacion.idGrupo,
tabla_aquarius_evaluado.dni,
CONCAT(tabla_aquarius_evaluado.nombres , ' ' ,tabla_aquarius_evaluado.apellidos) AS usuarioEvaluado ,
tabla_aquarius_evaluado.dcargo AS descripcionCargo,
tabla_aquarius_evaluado.dcostos,
competencia_evaluacion.estado
FROM 

competencia_evaluacion INNER JOIN rrhh.tabla_aquarius  AS tabla_aquarius_evaluado ON competencia_evaluacion.dniEvaluado = tabla_aquarius_evaluado.dni

WHERE competencia_evaluacion.dniEvaluador = :dniEvaluador AND competencia_evaluacion.estado = :estado
     ");

      $query->execute(["dniEvaluador" => $dniEvaluador, "estado" => $estado]);

      while ($row = $query->fetch()) {
        array_push($list, $row);
      }

      return $list;
    } catch (PDOException $exception) {
      echo $exception;
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }


  public function getListSeguimientoByEvaluado($dniEvaluado, $estado)
  {

    $list = array();

    try {

      $query = $this->db->connect()->prepare("SELECT 
competencia_evaluacion.id,
competencia_evaluacion.idGrupo,
tabla_aquarius_evaluador.dni,
CONCAT(tabla_aquarius_evaluador.nombres , ' ' ,tabla_aquarius_evaluador.apellidos) AS usuarioEvaluado ,
tabla_aquarius_evaluador.dcargo AS descripcionCargo,
tabla_aquarius_evaluador.dcostos,
competencia_evaluacion.estado,


      competencia_evaluacion.firmaEvaluador,

      competencia_evaluacion.compromiso1 ,
      competencia_evaluacion.compromiso2 ,
      competencia_evaluacion.compromiso3 ,
      competencia_evaluacion.compromiso4 ,
      competencia_evaluacion.compromiso5 ,
      
      competencia_evaluacion.seguridad1,
      competencia_evaluacion.seguridad2 ,
      competencia_evaluacion.seguridad3 ,
      competencia_evaluacion.seguridad4 ,
      competencia_evaluacion.seguridad5 ,

      competencia_evaluacion.estres1 ,
      competencia_evaluacion.estres2 ,
      competencia_evaluacion.estres3 ,
      competencia_evaluacion.estres4 ,
      competencia_evaluacion.estres5 ,
      competencia_evaluacion.oportunidadMejora 


FROM 

competencia_evaluacion INNER JOIN rrhh.tabla_aquarius  AS tabla_aquarius_evaluador ON competencia_evaluacion.dniEvaluador = tabla_aquarius_evaluador.dni

WHERE competencia_evaluacion.dniEvaluado = :dniEvaluado AND competencia_evaluacion.estado = :estado
     ");

      $query->execute(["dniEvaluado" => $dniEvaluado, "estado" => $estado]);

      while ($row = $query->fetch()) {
        array_push($list, $row);
      }

      return $list;
    } catch (PDOException $exception) {
      echo $exception;
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }

  public function updateEvaluador($data)
  {

    try {

      $query = $this->db->connect()->prepare("UPDATE competencia_evaluacion SET 
      competencia_evaluacion.firmaEvaluador = :firmaEvaluador,
      competencia_evaluacion.estado = :estado,

      competencia_evaluacion.compromiso1 = :compromiso1,
      competencia_evaluacion.compromiso2 = :compromiso2,
      competencia_evaluacion.compromiso3 = :compromiso3,
      competencia_evaluacion.compromiso4 = :compromiso4,
      competencia_evaluacion.compromiso5 = :compromiso5,
      
      competencia_evaluacion.seguridad1 = :seguridad1,
      competencia_evaluacion.seguridad2 = :seguridad2,
      competencia_evaluacion.seguridad3 = :seguridad3,
      competencia_evaluacion.seguridad4 = :seguridad4,
      competencia_evaluacion.seguridad5 = :seguridad5,

      competencia_evaluacion.estres1 = :estres1,
      competencia_evaluacion.estres2 = :estres2,
      competencia_evaluacion.estres3 = :estres3,
      competencia_evaluacion.estres4 = :estres4,
      competencia_evaluacion.estres5 = :estres5,
      competencia_evaluacion.oportunidadMejora = :oportunidadMejora
      
      WHERE  competencia_evaluacion.id = :idCompetenciaEvaluacion
     ");

      $query->execute([

        "idCompetenciaEvaluacion" => $data["idCompetenciaEvaluacion"],
        "firmaEvaluador" => $data["firmaEvaluador"],
        "estado" => 1,
        "compromiso1" => $data["compromiso1"],
        "compromiso2" => $data["compromiso2"],
        "compromiso3" => $data["compromiso3"],
        "compromiso4" => $data["compromiso4"],
        "compromiso5" => $data["compromiso5"],


        "seguridad1" => $data["seguridad1"],
        "seguridad2" => $data["seguridad2"],
        "seguridad3" => $data["seguridad3"],
        "seguridad4" => $data["seguridad4"],
        "seguridad5" => $data["seguridad5"],

        "estres1" => $data["estres1"],
        "estres2" => $data["estres2"],
        "estres3" => $data["estres3"],
        "estres4" => $data["estres4"],
        "estres5" => $data["estres5"],
        "oportunidadMejora" => $data["oportunidadMejora"]

      ]);

      return true;
    } catch (PDOException $exception) {
      echo $exception;
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }


  public function updateEvaluado($data)
  {

    try {

      $query = $this->db->connect()->prepare("UPDATE competencia_evaluacion SET 
      competencia_evaluacion.firmaEvaluado = :firmaEvaluado,
      competencia_evaluacion.estado = :estado
      
      WHERE  competencia_evaluacion.id = :idCompetenciaEvaluacion
     ");

      $query->execute([

        "idCompetenciaEvaluacion" => $data["idCompetenciaEvaluacion"],
        "estado" => $data["estado"],
        "firmaEvaluado" => $data["firmaEvaluado"]

      ]);

      return true;
    } catch (PDOException $exception) {
      echo $exception;
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }


  public function getSeguimientoById($id)
  {

    $list = array();

    try {

      $query = $this->db->connect()->prepare("SELECT 
competencia_evaluacion.id,
competencia_evaluacion.idGrupo,


tabla_aquarius_evaluador.dni AS dniEvaluador,
CONCAT(tabla_aquarius_evaluador.nombres , ' ' ,tabla_aquarius_evaluador.apellidos) AS usuarioEvaluador ,
tabla_aquarius_evaluador.dcargo AS descripcionCargoEvaluador,

tabla_aquarius_evaluado.dni AS dniEvaluado,
CONCAT(tabla_aquarius_evaluado.nombres , ' ' ,tabla_aquarius_evaluado.apellidos) AS usuarioEvaluado ,
tabla_aquarius_evaluado.dcargo AS descripcionCargoEvaluado,


      competencia_evaluacion.estado,
      competencia_evaluacion.firmaEvaluador,
      competencia_evaluacion.firmaEvaluado,

      competencia_evaluacion.compromiso1 ,
      competencia_evaluacion.compromiso2 ,
      competencia_evaluacion.compromiso3 ,
      competencia_evaluacion.compromiso4 ,
      competencia_evaluacion.compromiso5 ,
      
      competencia_evaluacion.seguridad1,
      competencia_evaluacion.seguridad2 ,
      competencia_evaluacion.seguridad3 ,
      competencia_evaluacion.seguridad4 ,
      competencia_evaluacion.seguridad5 ,

      competencia_evaluacion.estres1 ,
      competencia_evaluacion.estres2 ,
      competencia_evaluacion.estres3 ,
      competencia_evaluacion.estres4 ,
      competencia_evaluacion.estres5 ,
      competencia_evaluacion.oportunidadMejora,

competencia_evaluacion.registro
FROM 

competencia_evaluacion INNER JOIN rrhh.tabla_aquarius  AS tabla_aquarius_evaluador ON competencia_evaluacion.dniEvaluador = tabla_aquarius_evaluador.dni

INNER JOIN rrhh.tabla_aquarius  AS tabla_aquarius_evaluado ON competencia_evaluacion.dniEvaluado = tabla_aquarius_evaluado.dni

WHERE competencia_evaluacion.id = :id
ORDER BY competencia_evaluacion.dniEvaluador DESC
     ");

      $query->execute(["id" => $id]);

      while ($row = $query->fetch()) {
        array_push($list, $row);
      }

      return $list;
    } catch (PDOException $exception) {
      echo $exception;
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }

  public function getListGroupByIdAndEstadoCreado(int $idGroup, int $estadoCreado, int $idTipoUsuario)
  {

    $list = array();
    try {

      $query = $this->db->connect()->prepare("SELECT  
     id,idTipoUsuario,idGrupo,dni,estadoCreado
     FROM competencia_usuario
     WHERE idGrupo = :idGroup AND estadoCreado =:estadoCreado AND idTipoUsuario =:idTipoUsuario
     ");

      $query->execute([
        "idGroup" => $idGroup,
        "estadoCreado" => $estadoCreado,
        "idTipoUsuario" => $idTipoUsuario
      ]);

      while ($row = $query->fetch()) {
        array_push($list, $row);
      }

      return $list;
    } catch (PDOException $exception) {
      echo "Paso1";
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }

  public function getListGroupById(int $idGroup, $idTipoUsuario)
  {

    $list = array();

    try {

      $query = $this->db->connect()->prepare("SELECT  
      id,idTipoUsuario,idGrupo,dni,estadoCreado
     FROM competencia_usuario
     WHERE idGrupo = :idGroup AND idTipoUsuario = :idTipoUsuario
     ");

      $query->execute([
        "idGroup" => $idGroup,
        "idTipoUsuario" => $idTipoUsuario,
      ]);

      while ($row = $query->fetch()) {
        array_push($list, $row);
      }

      return $list;
    } catch (PDOException $exception) {
      echo "Paso 2";
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }

  public function updateCompetenciaUsuarioByIdUsuario($idGroup, $idTipoUsuario)
  {

    try {

      $query = $this->db->connect()->prepare("UPDATE competencia_usuario SET competencia_usuario.estadoCreado = 1 
      WHERE  competencia_usuario.idGrupo = :idGrupo AND competencia_usuario.idTipoUsuario = :idTipoUsuario
     ");

      $query->execute(["idGrupo" => $idGroup, "idTipoUsuario" => $idTipoUsuario]);

      return true;
    } catch (PDOException $exception) {
      echo "Paso3";

      echo $exception;
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }

  public function deleteEvento($idEvento)
  {

    try {

      $query = $this->db->connect()->prepare("DELETE FROM competencia_evento  WHERE competencia_evento.id = :id ");

      $query->execute(["id" => $idEvento]);

      return true;
    } catch (PDOException $exception) {

      echo $exception;
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }

  public function deleteGrupo($idGrupo)
  {

    try {

      $query = $this->db->connect()->prepare("DELETE FROM competencia_grupo  WHERE competencia_grupo.id = :id ");

      $query->execute(["id" => $idGrupo]);

      return true;
    } catch (PDOException $exception) {

      echo $exception;
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }
}