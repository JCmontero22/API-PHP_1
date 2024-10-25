<?php 

    session_start();

    class conexion 
    {
        protected $dbh;

        protected function conexion() {

            try {
                $conectar = $this->dbh = new PDO("mysql: local=localhost; dbname=Appi_PHP","root", "");    
                return $conectar;    
            } catch (\Exception $e) {
                print "Error conexion DB: " . $e->getMessage() . "</br>";
                die();
            }
        }

        public function set_names() {
            return $this->dbh->query("SET NAMES 'utf8'");
        }

        public function select($query) {
            $conexion = $this->conexion();
            $sql = $conexion->prepare($query);
            $sql->execute();
            return $sql->fetchAll();
        }

        public function execute($query) {
            $conexion = $this->conexion();
            $sql = $conexion->prepare($query);
            $sql->execute();
            return $sql->rowCount();
        }
        
    }
    