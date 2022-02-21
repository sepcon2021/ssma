<?php
    require_once 'models/usuario.php';

    class MainModel extends Model{
        public function __construct()
        {
            parent::__construct();
        }

        public function getByUserPass($user, $clave){
           $item = new Usuario;

           $query = $this->db->connectrrhh()->prepare('SELECT apellidos,nombres,correo,usuario,ssma,internal,dni
                                                    FROM tabla_aquarius
                                                    WHERE USUARIO = :usuario AND CLAVE = :clave');

           try{
                $query->execute(['usuario'  => $user, 'clave' => SHA1($clave)]);

                while($row = $query->fetch()){
                    $item->apellidos = $row['apellidos'];
                    $item->nombres   = $row['nombres'];
                    $item->correo    = $row['correo'];
                    $item->usuario   = $row['usuario'];
                    $item->ssma      = $row['ssma'];
                    $item->internal     = $row['internal'];
                    $item->dni     = $row['dni'];

                    echo "DNI";
                    echo $item->dni;
                    $item->iniciales = substr( $row['nombres'],0,1).substr($row['apellidos'],0,1 );
                }

                session_start();
                $_SESSION['iniciales']  = $item->iniciales;
                $_SESSION['nivel']      = $item->ssma;
                $_SESSION['nombres']    = $item->nombres." ".$item->apellidos;
                $_SESSION['usuario']    = $item->usuario;
                $_SESSION['internal']    = $item->internal;
                $_SESSION['dni']    = $item->dni;

                return $item;

            }catch(PDOException $e){
                return [];
            }
        }


        public function getUserByDniTrabajador($dni){
            $item = new Usuario;
 
            $query = $this->db->connectrrhh()->prepare('SELECT apellidos,nombres,correo,usuario,ssma,internal,dni
                                                     FROM tabla_aquarius
                                                     WHERE DNI = :dni ');
 
            try{
                 $query->execute(['dni'  => $dni]);
 
                 while($row = $query->fetch()){
                     $item->apellidos = $row['apellidos'];
                     $item->nombres   = $row['nombres'];
                     $item->correo    = $row['correo'];
                     $item->usuario   = $row['usuario'];
                     $item->ssma      = $row['ssma'];
                     $item->internal     = $row['internal'];
                     $item->dni     = $row['dni'];

                     $item->iniciales = substr( $row['nombres'],0,1).substr($row['apellidos'],0,1 );
                 }
 
                 session_start();
                 $_SESSION['iniciales']  = $item->iniciales;
                 $_SESSION['nivel']      = $item->ssma;
                 $_SESSION['nombres']    = $item->nombres." ".$item->apellidos;
                 $_SESSION['usuario']    = $item->usuario;
                 $_SESSION['internal']    = $item->internal;
                 $_SESSION['dni']    = $item->dni;

                 return $item;
 
             }catch(PDOException $e){
                 return [];
             }
         }

        
         public function getUserMovil($user,$pass) {
            $item = new Usuario;

            $query = $this->db->connectrrhh()->prepare('SELECT internal,dni,apellidos,nombres,dcostos,ccostos,dsede,usuario,correo,ccargo,dcargo,perfil,ssma
                                                        FROM tabla_aquarius
                                                        WHERE USUARIO = :usuario AND CLAVE = :clave');

            

            try {
                $query->execute(['usuario'  => $user, 'clave' => SHA1($pass)]);


                while ($row = $query->fetch()) {
                    $item->internal     = $row['internal'];
                    $item->nombres      = $row['nombres'];
                    $item->apellidos      =$row['apellidos'];
                    $item->ssma         = $row['ssma'];
                    $item->usuario      = $row['usuario'];
                    $item->correo      = $row['correo'];

                    $item->dni = $row['dni'];    
                    $item->dcostos = $row['dcostos'];     
                    $item->ccostos   = $row['ccostos'];  
                    $item->dsede = $row['dsede'];
                    $item->ccargo = $row['ccargo'];
                    $item->dcargo = $row['dcargo'];
                    $item->perfil = $row['perfil'];
                }

                if ( !$item->internal )
                {
                    return null;
                }
                
                return $item;

            } catch (PDOException $e) {
                return [];
            }
        }


        public function getUserByDni($dni) {
            $item = new Usuario;

            $query = $this->db->connectrrhh()->prepare('SELECT internal,dni,apellidos,nombres,dcostos,ccostos,dsede,usuario,correo,ccargo,dcargo,perfil,ssma
                                                        FROM tabla_aquarius
                                                        WHERE DNI = :dni');

            

            try {
                $query->execute(['dni'  => $dni]);


                while ($row = $query->fetch()) {
                    $item->internal     = $row['internal'];
                    $item->nombres      = $row['nombres'];
                    $item->apellidos      =$row['apellidos'];
                    $item->ssma         = $row['ssma'];
                    $item->usuario      = $row['usuario'];
                    $item->correo      = $row['correo'];

                    $item->dni = $row['dni'];    
                    $item->dcostos = $row['dcostos'];     
                    $item->ccostos   = $row['ccostos'];  
                    $item->dsede = $row['dsede'];
                    $item->ccargo = $row['ccargo'];
                    $item->dcargo = $row['dcargo'];
                    $item->perfil = $row['perfil'];

                    $item->permiso = $this->getPermiso($item->dni);
                }

                if ( !$item->internal )
                {
                    return null;
                }
                
                return $item;

            } catch (PDOException $e) {
                return [];
            }
        }


        public function getPermiso($dni) {
            $item = array();

            $query = $this->db->connectrrhh()->prepare('SELECT idTypeRole ,dni
                                                        FROM ssma.role
                                                        WHERE DNI = :dni');

            try {
                $query->execute(['dni'  => $dni]);


                while ($row = $query->fetch()) {
                    array_push($item,$row);
                }

                return $item;

            } catch (PDOException $e) {
                return [];
            }
        }


        public function getValuesTops()
        {
            $items = [];

            try {
                $query = $this->db->connect()->query("SELECT
                Count(vwtops.sede) AS tops,
                general.nombre AS sede
                FROM
                vwtops
                INNER JOIN general ON vwtops.sede = general.cod
                WHERE
                general.clase = '00'
                GROUP BY
                vwtops.sede
                ORDER BY
                general.nombre
                 ");
                while($row = $query->fetch()){
                    $item = $row['tops'];

                    array_push($items,$item);
                }

                return $items;
            } catch (PDOException $e) {
                return [];
            }
        }

        public function getSedesTops(){
            $items = [];

            try {
                $query = $this->db->connect()->query("SELECT
                Count(vwtops.sede) AS tops,
                general.nombre AS sede
                FROM
                vwtops
                INNER JOIN general ON vwtops.sede = general.cod
                WHERE
                general.clase = '00'
                GROUP BY
                vwtops.sede
                ORDER BY
                general.nombre
                 ");
                while($row = $query->fetch()){
                    $item = $row['sede'];

                    array_push($items,$item);
                }

                return $items;
            } catch (PDOException $e) {
                return [];
            }
        }

        public function getMonth(){
            $mes = ["ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SETIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"];

            return $mes[date('n')-1];
        }
    }
?>

