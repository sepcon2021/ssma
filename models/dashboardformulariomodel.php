<?php

require_once 'models/examenDetalle.php';
require_once 'models/pregunta.php';
require_once 'models/alternativa.php';
require_once 'models/examen.php';


class DashboardFormularioModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }




    public function listaExamenByFecha($codigoproyecto)
    {
        try {
            $listaExamenDetalle=array();


            $query = $this->db->connectformulario()->query("SELECT 
            id,
            tema,
            fecha,
            tipo,
            areaEmpresa
            
            FROM 
            examenDetalle   WHERE fecha >= cast(now() as date) AND estado = 1 AND idproyecto = '$codigoproyecto' ");

            while($row = $query->fetch()){
                $modelExamenDetalle=new ExamenDetalle;
                $modelExamenDetalle->id=$row['id'];
                $modelExamenDetalle->tema=$row['tema'];
                $modelExamenDetalle->fecha=$row['fecha'];
                $modelExamenDetalle->tipoNombre=$row['tipo'];
                $modelExamenDetalle->areaEmpresa = $row['areaEmpresa'];
                array_push($listaExamenDetalle,$modelExamenDetalle);
                
            }

            return $listaExamenDetalle;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


}
