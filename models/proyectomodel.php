<?php

require_once 'status/repuestas.php';

class Proyect
{

  public $id;
  public $nombre;
  public $detalle;

  function __construct($id, $nombre, $detalle)
  {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->detalle = $detalle;
  }
}


class ProyectoModel extends Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function getProyectos()
  {

    $lista_proyect = array();

    //TRAEMOS DESDE UN JSON LOS PROYECTOS QUE ESTAN DENTRO DEL PROYECTO
    $JsonParser = file_get_contents("public/data/data.json");

    $myarray = json_decode($JsonParser, true);

    foreach ($myarray as &$valor) {
      // $model_proyect=new Proyect($valor['id'],$valor['nombre']);
      // array_push( $lista_proyect,$model_proyect);

    }


    return  $lista_proyect;
  }

  public function getProyectosbbdd()
  {

    //$listas = '';
    $lista_ubicacion = array();

    try {
      $query = $this->db->connect()->query("SELECT
                                                    id,nombre,detalle
                                                FROM
                                                proyecto");


      while ($row = $query->fetch()) {

        //   $listas .= "<option value='$row[id]'>$row[nombre]</option>";

        $model_ubicacion = new Proyect($row['id'], $row['nombre'], $row['detalle']);
        array_push($lista_ubicacion, $model_ubicacion);
      }
      return $lista_ubicacion;
    } catch (PDOexception $e) {
      echo $e->getMessage();
      return false;
    }
  }


  public function getListSede()
  {

    $lista_ubicacion = array();

    try {
      $query = $this->db->connect()->query("SELECT
                                                    id,nombre
                                                FROM
                                                sede");

      while ($row = $query->fetch()) {
        array_push($lista_ubicacion, $row);
      }
      return $lista_ubicacion;
    } catch (PDOexception $e) {
      $respuesta =  new respuestas();
      echo json_encode($respuesta->error_404());
      exit;
    }
  }
}