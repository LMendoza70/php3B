<?php
    class UserModel{
        //definimos el atributo para conectar el modelo de usuario a la base de datos
        private $UserConnection;

        //creamos el contructor de la clase para inicializar nuestro atributo UserConnection
        public function __construct(){
            //requerimos llamar a la clase DBConnection
            require_once('app/config/DBConnection.php');
            //instanciamos a UserConnection de DBConnection
            $this->UserConnection=new DBConnection();
        }

        //ahora si viene la ligica del modelo
        
        //metodo para obtener todos los usuarios de la tabla user
        public function getAll(){
            //paso 1 creo la consulta
            $sql="SELECT * FROM user";
            //paso 2 obtengo la coneccion a la base de datos 
            $connection =$this->UserConnection->getConnection();
            //paso 3 ejecuto la consulta 
            $result= $connection->query($sql);
            //paso 4 verifico errores y acomodo el resultado
            //paso 4.1 creamos un arreglo que alamacene los resultados 
            $users=array();
            //paso 4.2 recorremos $result para ir pasando cada rengon al $users
            while($user=$result->fetch_assoc()){
                $users[]=$user;
            }
            //paso 5 cierro la coneccion a la bd
            $this->UserConnection->closeConnection();
            //paso 6 arrojo resultados 
            return $users;
        }
        //metodo que obtiene un usuario por su id
        public function getById($id){
            //paso 1 creo la consulta
            $sql="SELECT * FROM user WHERE IdUser = $id";
            //paso 2 obtengo la coneccion a la base de datos 
            $connection =$this->UserConnection->getConnection();
            //paso 3 ejecuto la consulta 
            $result= $connection->query($sql);
            //paso 4 verifico errores y acomodo el resultado
            //verificamos que la conslta traiga resultados
            if($result && $result->num_rows > 0){
                $user=$result->fetch_assoc();
            }else{
                $user=false;
            }
            //paso 5 cierro la coneccion a la bd
            $this->UserConnection->closeConnection();
            //paso 6 arrojo resultados 
            return $user;
        }

        //metodo que nos permita hacer un logueo
        public function getCredenctials($us,$ps){
            //paso 1 creo la consulta
            $sql="SELECT * FROM user WHERE Usuario = $us AND Password = $ps";
            //paso 2 obtengo la coneccion a la base de datos 
            $connection =$this->UserConnection->getConnection();
            //paso 3 ejecuto la consulta 
            $result= $connection->query($sql);
            //paso 4 verifico errores y acomodo el resultado
            //verificamos que la conslta traiga resultados
            if($result && $result->num_rows > 0){
                $user=$result->fetch_assoc();
            }else{
                $user=false;
            }
            //paso 5 cierro la coneccion a la bd
            $this->UserConnection->closeConnection();
            //paso 6 arrojo resultados 
            return $user;
        }

        //metodo para insertar un usuario

        //metodo para eliminar un usuario

        //metodo para editar un usuario
    }
?>