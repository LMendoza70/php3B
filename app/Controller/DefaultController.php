<?php
//en esta clase definimos el controlador por default, este se llama cunado no indicamos 
//a que controlador queremos llamar 
class DefaultController
{

    //nuestro controlador por default tendra una variable llamada vista que llmara a la 
    //ventana espesifica que yo quiero mostrar en la plantilla
    private $vista;

    //metodo por default este metodo es el encargado de cargar la plnatilla en pantalla
    //junto con la vista que quiero mostrar
    public function index()
    {
        //inicializamos vista con la ruta de la pantalla que queremos llamar
        $vista = "app/View/admin/HomeAdminView.php";
        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            //cargamos la plantilla del administrador que por default se lleva a la variable 
            //vista
            include_once("app/View/admin/PlantillaAdminView.php");
        } else {
            include_once("app/View/admin/Plantilla2AdminView.php");
        }
    }

    //podriamos tener otros metodos para nuestra pantalla por ejemplo mostrar pantallas de error
}
