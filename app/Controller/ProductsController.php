<?php
//require_once("app/Model/ProductsModel.php");
class ProductsController{
    private $vista;
    //private $modelo;

    public function index(){
        $vista="app/View/HomeProductsView.php";
        //$modelo=new ProductsModel();
        //$datos=$modelo->getAll();
        include_once("app/View/PlantillaAdminView.php");
    }
}
?>