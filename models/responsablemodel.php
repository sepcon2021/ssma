<?php

class ResponsableModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function listaResponsableByProyectoByFase($idProyecto,$idFase)
    {

        $listaResponsable = array();

        $query = $this->db->connect()->prepare("SELECT  rrhh.tabla_aquarius.dni, 
        CONCAT(rrhh.tabla_aquarius.nombres, ' ' , rrhh.tabla_aquarius.apellidos)  AS nombres
        FROM ssma.responsable INNER JOIN rrhh.tabla_aquarius ON ssma.responsable.dni = rrhh.tabla_aquarius.dni  
        WHERE ssma.responsable.idProyecto = :idProyecto  AND  ssma.responsable.idFase = :idFase ");


        try {

            $query->execute(['idProyecto'  => $idProyecto, 'idFase' => $idFase ]);


            while ($row = $query->fetch()) {

                $responsable = array(
                    "dni" => $row['dni'],
                    "nombres" => $row['nombres']
                );

                array_push($listaResponsable,$responsable);
            }

            return $listaResponsable;
        } catch (PDOException $e) {
            return [];
        }
    }


    public function listaResponsableByProyecto($idProyecto)
    {

        $listaResponsable = array();

        $query = $this->db->connect()->prepare("SELECT  rrhh.tabla_aquarius.dni, 
        CONCAT(rrhh.tabla_aquarius.nombres, ' ' , rrhh.tabla_aquarius.apellidos)  AS nombres,
        rrhh.tabla_aquarius.dcargo AS cargo
        FROM ssma.responsable INNER JOIN rrhh.tabla_aquarius ON ssma.responsable.dni = rrhh.tabla_aquarius.dni  
        WHERE ssma.responsable.idProyecto = :idProyecto ");


        try {

            $query->execute(['idProyecto'  => $idProyecto]);


            while ($row = $query->fetch()) {

                $responsable = array(
                    "dni" => $row['dni'],
                    "nombres" => $row['nombres'],
                    "cargo" => $row['cargo']
                );

                array_push($listaResponsable,$responsable);
            }

            return $listaResponsable;
        } catch (PDOException $e) {
            return [];
        }
    }


}