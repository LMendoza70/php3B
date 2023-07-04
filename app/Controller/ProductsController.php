<?php
//require_once("app/Model/ProductsModel.php");
class ProductsController{
    private $vista;
    //private $modelo;

    public function index(){
        $vista="app/View/admin/products/HomeProductsView.php";
        //$modelo=new ProductsModel();
        //$datos=$modelo->getAll();
        include_once("app/View/admin/PlantillaAdminView.php");
    }
}
?>