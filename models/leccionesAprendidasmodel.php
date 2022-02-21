<?php

class LeccionesAprendidasModel extends Model{
    
    function __construct()
    {
        parent::__construct();
    }

    public function insert($data){

        try {
            $query = $this->db->connect()->prepare('INSERT INTO lecciones_aprendidas(NOMBRE , URL_PDF , USUARIO ) 
            VALUES (:nombre, :url_pdf , :usuario)');

            $query->execute([
                'nombre' => $data['nombre'],
                'url_pdf' => $data['urlPdf'],
                'usuario' => $data['usuario']
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($data){

        try {
            $query = $this->db->connect()->prepare('DELETE FROM  lecciones_aprendidas WHERE id = :id ');

            $query->execute([
                'id' => $data['id']
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function listLecciones()
    {
        $items = array();

        try {
            $query = $this->db->connect()->query("SELECT 
            ssma.lecciones_aprendidas.id,
            ssma.lecciones_aprendidas.nombre,
            ssma.lecciones_aprendidas.url_pdf,
            ssma.lecciones_aprendidas.registro,
            CONCAT(rrhh.tabla_aquarius.nombres,' ',rrhh.tabla_aquarius.apellidos) AS usuario
    FROM ssma.lecciones_aprendidas INNER JOIN rrhh.tabla_aquarius ON ssma.lecciones_aprendidas.usuario = rrhh.tabla_aquarius.dni
    ORDER BY ssma.lecciones_aprendidas.registro DESC
            ");
            
            while($row = $query->fetch()){
                array_push($items,$row);
            }

            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }



}