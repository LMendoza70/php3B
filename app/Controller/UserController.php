<?php
require_once("app/Model/UserModel.php");
class UserController{
    private $vista;
    private $modelo;

    public function index(){
        $vista="app/View/HomeUserView.php";
        $modelo=new UserModel();
        $datos=$modelo->getAll();
        include_once("app/View/PlantillaAdminView.php");
    }

    public function CallFormLogin(){
        $vista="app/View/HomeLoginView.php";
        include_once("app/View/PlantillaAdminView.php");
    }

    public function Login(){
        $vista="app/View/HomeAdminView.php";
        $modelo=new UserModel();
        $user=isset($_POST['user'])?$_POST['password']:'no logueado';
        $usuario=$modelo->getCredenctials( $_POST['user'],$_POST['password'] ); 
               
        include_once("app/View/PlantillaAdminView.php");
    }

    //creamos el metodo para llamar al formulario de agregar usuario
    public function CallUserAdd(){
        $vista="app/View/AddUserView.php";
        include_once("app/View/PlantillaAdminView.php");
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
                header('Location: index.php?controller=User&action=index');
            }else{
                //si es falso lo redireccionamos a la vista de agregar usuario
                header('Location: index.php?controller=User&action=CallUserAdd');
            }
        }
    }
}
?>