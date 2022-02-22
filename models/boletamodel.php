<?php
    class BoletaModel extends Model {
        public function __construct()
        {
            parent::__construct();
        }


        public function listBoletas($year){
        
            $listaPreguntas = array();

            try {
                
                $query = $this->db->connect()->query("SELECT 
                                                     rrhh.tabla_boletas.estado,
                                                     rrhh.tabla_boletas.fecha,
                                                     rrhh.tabla_boletas.revizado,
                                                     rrhh.tabla_boletas.dni,
                                                     rrhh.tabla_boletas.periodo,
                                                     rrhh.tabla_boletas.mes,
                                                     rrhh.tabla_boletas.anio
                                                     FROM 
                                                     rrhh.tabla_boletas
                                                     WHERE anio = '$year' 
    
                ");
    
                while ($row = $query->fetch()) {
                
                    array_push($listaPreguntas,$row);
                }
    
                return $listaPreguntas;
    
            } catch (PDOexception $e) {
                echo $e->getMessage();
                return false;
            }
        }
    
    
        public function listAquarius($codigoCostos){

 
            
            $listaPreguntas = array();


    
            try {
                $query = $this->db->connect()->query("SELECT 
                                                     DISTINCT(rrhh.tabla_aquarius.dni),
                                                     CONCAT(rrhh.tabla_aquarius.apellidos , ' ', rrhh.tabla_aquarius.nombres) AS usuario,
                                                     rrhh.tabla_aquarius.fecha_ingreso AS fechaIngreso,
                                                     rrhh.tabla_aquarius.dcargo AS descripcionCargo,
                                                     rrhh.tabla_aquarius.dcostos AS descripcionCostos,
                                                     rrhh.tabla_aquarius.estado
    
                                                     FROM rrhh.tabla_aquarius
                                                        INNER JOIN (SELECT DISTINCT(rrhh.tabla_boletas.dni)   FROM rrhh.tabla_boletas) AS  boletas
                                                        ON rrhh.tabla_aquarius.dni = boletas.dni
                                                 

                                                     WHERE  rrhh.tabla_aquarius.ccostos = '$codigoCostos' 

                                                     
                ");

          
    
                while ($row = $query->fetch()) {
                
                    array_push($listaPreguntas,$row);

                }

    
                return $listaPreguntas;
    
            } catch (PDOexception $e) {
                echo $e->getMessage();
                return false;
            }
        }
        

        public function listAquariusPrueba($codigoSede , $codigoCostos){

 
            
            $listaPreguntas = array();

            

    
            try {
                $query = $this->db->connect()->query("SELECT 
                                                     DISTINCT(rrhh.tabla_aquarius.dni),
                                                     CONCAT(rrhh.tabla_aquarius.apellidos , ' ', rrhh.tabla_aquarius.nombres) AS usuario,
                                                     rrhh.tabla_aquarius.fecha_ingreso AS fechaIngreso,
                                                     rrhh.tabla_aquarius.dcargo AS descripcionCargo,
                                                     rrhh.tabla_aquarius.dcostos AS descripcionCostos,
                                                     rrhh.tabla_aquarius.estado
    
                                                     FROM rrhh.tabla_aquarius
                                                        INNER JOIN (SELECT DISTINCT(rrhh.tabla_boletas.dni)   FROM rrhh.tabla_boletas) AS  boletas
                                                        ON rrhh.tabla_aquarius.dni = boletas.dni
                                                 

                                                     WHERE  rrhh.tabla_aquarius.ccostos = '$codigoCostos'  AND rrhh.tabla_aquarius.csede = '$codigoSede'

                                                     
                ");

          
    
                while ($row = $query->fetch()) {
                
                    array_push($listaPreguntas,$row);

                }

    
                return $listaPreguntas;
    
            } catch (PDOexception $e) {
                echo $e->getMessage();
                return false;
            }
        }
        
    
        public function listProyecto(){
            
            $listaProyecto = array();
    
            try {
    
                $query = $this->db->connect()->query("SELECT 
													
                rrhh.tabla_aquarius.ccostos AS codigo,
                rrhh.tabla_aquarius.dcostos AS nombre
                                                                  FROM rrhh.tabla_aquarius
                                                                     INNER JOIN (SELECT DISTINCT(rrhh.tabla_boletas.dni) FROM rrhh.tabla_boletas) AS  boletas
                                                                     ON rrhh.tabla_aquarius.dni = boletas.dni
                                                              
             
                                                                  WHERE 
                                                                  rrhh.tabla_aquarius.estado = 'AC' AND  (
                                                                  rrhh.tabla_aquarius.ccostos =  '030000' OR 
                                                                  rrhh.tabla_aquarius.ccostos =  '0600.1' OR 
                                                                  rrhh.tabla_aquarius.ccostos =  '060000' OR 
                                                                  rrhh.tabla_aquarius.ccostos =  '280000' OR 
                                                                  rrhh.tabla_aquarius.ccostos =  '283000' OR 
                                                                  rrhh.tabla_aquarius.ccostos =  '300000' OR 
                                                                  rrhh.tabla_aquarius.ccostos =  '020000'
                                                                 
                                                                  
                                                                  )
                                                                  GROUP BY rrhh.tabla_aquarius.ccostos
                ");
    
                while ($row = $query->fetch()) {
                
                    array_push($listaProyecto,$row);
                }
    
                return $listaProyecto;
    
            } catch (PDOexception $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function listSede(){
            
            $list = array();
    
            try {
    
                $query = $this->db->connect()->query("SELECT rrhh.tabla_aquarius.csede, rrhh.tabla_aquarius.dsede 
                FROM rrhh.tabla_aquarius 
                WHERE rrhh.tabla_aquarius.csede <> '004' AND 
                        rrhh.tabla_aquarius.csede <> '003' AND
                        rrhh.tabla_aquarius.csede <> '009' AND
                        rrhh.tabla_aquarius.csede <> '008'
                GROUP BY rrhh.tabla_aquarius.dsede
                ");
    
                while ($row = $query->fetch()) {
                
                    array_push($list,$row);
                }
    
                return $list;
    
            } catch (PDOexception $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
