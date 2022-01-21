<?php
    class Anexo5Model extends Model {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($datos){
           try{ 
                $query = $this->db->connect()->prepare('INSERT INTO anexo5 (iddoc,trabajador,
                                                                            fecha_ingreso,num_fotocheck,
                                                                            ocupacion,fecha_documento,url_firma_trabajador,
                                                                            url_firma_supervisor,usuario)
                                                        VALUES (:iddoc,:trabajador,:fecha_ingreso,:num_fotocheck,:ocupacion,:fecha_documento,:url_firma_trabajador,:url_firma_supervisor,:usuario)');



                $query->execute([
                                    'iddoc'=> $datos['iddoc'],
                                    'trabajador' =>  $datos['trabajador'],
                                    'fecha_ingreso' => $datos['fecha_ingreso'],
                                    'num_fotocheck' =>  $datos['num_fotocheck'],
                                    'ocupacion' => $datos['ocupacion'],
                                    'fecha_documento' =>  $datos['fecha_documento'],
                                    'url_firma_trabajador' =>  $datos['url_firma_trabajador'],
                                    'url_firma_supervisor' =>  $datos['url_firma_supervisor'],
                                    'usuario' =>  $datos['usuario']
                                ]);
                return true;
            }catch(PDOException $e){
               echo $e->getMessage();
               return false;
            }
        }

    }
?>