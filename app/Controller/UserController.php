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
}
?>