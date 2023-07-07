<?php
require_once("app/Model/UserModel.php");
class UserController{
    private $vista;
    private $modelo;

    public function index(){
        $vista="app/View/admin/users/HomeUserView.php";
        $modelo=new UserModel();
        $datos=$modelo->getAll();
        include_once("app/View/admin/PlantillaAdminView.php");
    }

    public function CallFormLogin(){
        $vista="app/View/admin/users/HomeLoginView.php";
        include_once("app/View/admin/PlantillaAdminView.php");
    }

    public function Login(){
        $vista="app/View/admin/HomeAdminView.php";
        $modelo=new UserModel();
        $user=isset($_POST['user'])?$_POST['password']:'no logueado';
        $usuario=$modelo->getCredenctials( $_POST['user'],$_POST['password'] ); 
               
        include_once("app/View/admin/PlantillaAdminView.php");
    }

    //creamos el metodo para llamar al formulario de agregar usuario
    public function CallUserAdd(){
        $vista="app/View/admin/users/AddUserView.php";
        include_once("app/View/admin/PlantillaAdminView.php");
    }
    //creamos el metodo para agregar un usuario
    public function Add(){
        //verificamos que el metodo venga por post
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //creamos un arreglo para almacenar los datos del formulario
            $datos=array(
                'Nombre'=>$_POST['nombre'],
                'ApPaterno'=>$_POST['apaterno'],
                'ApMaterno'=>$_POST['amaterno'],
                'Usuario'=>$_POST['user'],
                'Password'=>$_POST['password'],
                'Sexo'=>$_POST['sexo'],
                'FchNacimiento'=>$_POST['fchnac']
            );

            //procesamiento del archivo
            if(isset($_FILES['avatar']) && $_FILES['avatar']['error']===UPLOAD_ERR_OK ){
                //OBTENEMOS LA INFORMACION DEL ARCHIVO CARGADO EN EL FORMULARIO
                $nombreArchivo=$_FILES['avatar']['name'];
                $tipoArchivo=$_FILES['avatar']['type'];
                $tamanoArchivo=$_FILES['avatar']['size'];
                $rutaTemporal=$_FILES['avatar']['tmp_name'];
                //validamos que el formato del archivo sea el indicado
                $extenciones=array('jpg','jpeg','png');
                $extencion=pathinfo($nombreArchivo,PATHINFO_EXTENSION);
                if(!in_array($extencion,$extenciones)){
                    echo "El archivo tiene un formato no valido";
                    exit;
                }
                //validamos el tamaño maximo del archivo
                $tamanomaximo=2*1024*1024;
                if($tamanoArchivo>$tamanomaximo){
                    echo "ya mejor sube un video o una lona";
                    exit;
                }

                //definimos el nombre que va a tener la imagen en el servidor 
                $nombreArchivo= uniqid('Avatar_').'.'.$extencion;
                //definimos la ruta destino
                $rutaDestino="app/src/img/avatars/".$nombreArchivo;
                //movemos el archivo de la tura temporal al destino final
                if(!move_uploaded_file($rutaTemporal,$rutaDestino)){
                    echo "Error al cargar el archivo al servidor";
                    exit;
                }
                //ahora si incluimos el nombre al arreglo que se almacena en la bd
                $datos['Avatar']=$nombreArchivo;
            }
            //creamos una instancia de UserModel
            $modelo=new UserModel();
            //llamamos al metodo add
            $result=$modelo->add($datos);
            //verificamos el resultado
            if($result){
                //si es verdadero lo redireccionamos a la vista de usuarios
                header('Location: http://localhost/php3b/?C=UserController&M=index');
            }else{
                //si es falso lo redireccionamos a la vista de agregar usuario
                header('Location: http://localhost/php3b/?C=User&M=CallUserAdd');
            }
        }
    }

    //creamos el metodo para llamar al formulario de editar usuario
    public function CallFormEdit(){
        //verificamos que el metodo venga por get
        if($_SERVER['REQUEST_METHOD']=='GET'){
            //creamos una instancia de UserModel
            $modelo=new UserModel();
            //llamamos al metodo getById
            $datos=$modelo->getById($_GET['id']);
            //verificamos el resultado
            if($datos){
                //si es verdadero lo redireccionamos a la vista de editar usuario
                $vista="app/View/admin/users/EditUserView.php";
                include_once("app/View/admin/PlantillaAdminView.php");
            }else{
                //si es falso lo redireccionamos a la vista de usuarios
                header('Location: http://localhost/php3b/?C=UserController&M=index');
            }
        }
    }
    //creamos el metodo para editar un usuario
    public function Edit(){
        //verificamos que el metodo de envio de datos sea POST
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //almacenamos los datos enviados por el formulario en un arreglo
            $datos=array(
                'IdUser'=>$_POST['id'],//agregamos el id del usuario a editar
                'Nombre'=>$_POST['nombre'],
                'ApPaterno'=>$_POST['apaterno'],
                'ApMaterno'=>$_POST['amaterno'],
                'Usuario'=>$_POST['user'],
                'Password'=>$_POST['password'],
                'Sexo'=>$_POST['sexo'],
                'FchNacimiento'=>$_POST['fchnac'],
                'Avatar'=>$_POST['avatar']
            );
            //procesamiento del archivo
            if(isset($_FILES['avatar']) && $_FILES['avatar']['error']===UPLOAD_ERR_OK ){
                //OBTENEMOS LA INFORMACION DEL ARCHIVO CARGADO EN EL FORMULARIO
                $nombreArchivo=$_FILES['avatar']['name'];
                $tipoArchivo=$_FILES['avatar']['type'];
                $tamanoArchivo=$_FILES['avatar']['size'];
                $rutaTemporal=$_FILES['avatar']['tmp_name'];
                //validamos que el formato del archivo sea el indicado
                $extenciones=array('jpg','jpeg','png');
                $extencion=pathinfo($nombreArchivo,PATHINFO_EXTENSION);
                if(!in_array($extencion,$extenciones)){
                    echo "El archivo tiene un formato no valido";
                    exit;
                }
                //validamos el tamaño maximo del archivo
                $tamanomaximo=2*1024*1024;
                if($tamanoArchivo>$tamanomaximo){
                    echo "ya mejor sube un video o una lona";
                    exit;
                }

                //definimos el nombre que va a tener la imagen en el servidor 
                $nombreArchivo= uniqid('Avatar_').'.'.$extencion;
                //definimos la ruta destino
                $rutaDestino="app/src/img/avatars/".$nombreArchivo;
                //movemos el archivo de la tura temporal al destino final
                if(!move_uploaded_file($rutaTemporal,$rutaDestino)){
                    echo "Error al cargar el archivo al servidor";
                    exit;
                }
                //eliminamos el archivo anterior
                //obtengo los datos originales para tener el nombre de la imagen anterior
                $this->modelo=new UserModel();
                $anterior=$this->modelo->getById($_POST['id']);
                if(!empty($anterior['Avatar'])){
                    unlink("app/src/img/avatars/".$anterior['Avatar']);
                }
                //ahora si incluimos el nombre al arreglo que se almacena en la bd
                $datos['Avatar']=$nombreArchivo;
            }

            //llamamos al metodo del modelo que actualiza los datos del usuario
            $modelo=new UserModel();
            $modelo->update($datos);
            //redireccionamos al index de usuarios
            header("Location:http://localhost/php3b/?C=UserController&M=index");
        }
    }

    //Creamos el metodo para eliminar un usuario de la base de datos, este metodo se llamara una vez que 
        //se haya confirmado la eliminacion del usuario en la vista de index mediante un confirm de javascript
        public function Delete(){
            //verificamos que el metodo de envio de datos sea GET
            if($_SERVER['REQUEST_METHOD']=='GET'){
                //obtenemos el id del usuario a eliminar
                $id=$_GET['id'];
                //llamamos al metodo del modelo que elimina al usuario de la base de datos
                $this->modelo=new UserModel();
                $dato=$this->modelo->getById($_GET['id']);
                $modelo2=new UserModel();
                if($modelo2->Delete($id)){
                    if(!empty($dato['Avatar'])){
                        unlink("app/src/img/avatars/".$anterior['Avatar']);
                    }
                }
                
                //redireccionamos al index de usuarios
                header("Location:http://localhost/php3b/?c=UserController&m=index");
            }
        }


}
?>