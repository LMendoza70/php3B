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
                'FchNacimiento'=>$_POST['fchnac']
            );
            //llamamos al metodo del modelo que actualiza los datos del usuario
            $modelo=new UserModel();
            $modelo->update($datos);
            //redireccionamos al index de usuarios
            header("Location:http://localhost/php3b/?C=UserController&M=index");
        }
    }


}
?>