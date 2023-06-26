<?php
include_once("app/Model/UserModel.php");
class UserController{

    private $Model;
    private $vista;

    public function index(){
        $vista="app/View/HomeUserView.php";
        include_once("app/View/PlantillaAdminView.php");
    }
}
?>