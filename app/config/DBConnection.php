<?php
    class DBConnection{
        //crear la instancia que va a representar la coneccion a la bd
        private $connection;

        //creamos el constriuctor de la clase donde conectamos a la base de datos 
        public function __construct(){
            //traigo los valores de configuracion para manipular la bd
            require_once('./config.php');
            //creamos la coneccion 
            $this->connection=new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            //manejo de errores
            if($this->connection->connect_error){
                die('Error al conectar a la base de datos : '.$this->conncetion->connect_error)
            }
        }

        //metodo para obtener la coneccion 
        public function getConnection(){
            return $this->connection;
        }

        //metodo para cerrar la coneccion 
        public function closeConnection(){
            $this->connection->close();
        }
    }
?>