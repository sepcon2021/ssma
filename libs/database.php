<?php 
    class Database{
        //atributos
        private $host;
        private $db;
        private $user;
        private $password;
        private $charset;
        private $dbe;
        private $dbFormulario;

        //metodos
        public function __construct()
        {
            $this->host = constant('HOST');
            $this->db = constant('DB');
            $this->dbe = constant('DBE');
            $this->user = constant('USER');
            $this->password = constant('PASSWORD');
            $this->charset = constant('CHARSET');
            $this->dbFormulario = constant('DBFORMULARIO');

        }

        function connect(){
            try{
                    $connection = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset; 
                    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false,
                ];
                $pdo = new PDO($connection,$this->user, $this->password, $options);
                return $pdo;
            }catch(PDOException $e){
                print_r('Error connection:'.$e->getMessage());
            };            
        }

        function connectrrhh(){
            try{
                    $connection = "mysql:host=".$this->host.";dbname=".$this->dbe.";charset=".$this->charset; 
                    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false,
                ];
                $pdo = new PDO($connection,$this->user, $this->password, $options);
                return $pdo;
            }catch(PDOException $e){
                print_r('Error connection:'.$e->getMessage());
            };            
        }

        function connectformulario(){
            try{
                    $connection = "mysql:host=".$this->host.";dbname=".$this->dbFormulario.";charset=".$this->charset; 
                    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false,
                ];
                $pdo = new PDO($connection,$this->user, $this->password, $options);
                return $pdo;
            }catch(PDOException $e){
                print_r('Error connection:'.$e->getMessage());
            };            
        }

    }
?>