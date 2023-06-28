<?php
//este archivo es nuestro enrutador 
//vamos a crear una constante en la que vamos a definir la ruta de nuestra carpeta 
//de controladores
define('controladores','app/Controller/');
// verificamos que se este indicando en la url la variable C 
//con un if comun y corriente 
/*if(isset($_GET['C'])){
    $control=$_GET['C'];
}else{
    $control='';
}*/
//con el operador ternario para que lo vallan estudiando
$control=isset($_GET['C'])?$_GET['C']:'';
//armo mi ruta ejemplo controladores.$control."php"= app/controller/UserController.php
$ruta=controladores.$control.".php";
//verifivcamos si la ruta existe y si contrl no viene vacio
if(!empty($control) && file_exists($ruta)){
    //si la variable control viene llena y la ruta existe en el archivo 
    //requerimos la ruta para poder instancuiar el controlador 
    require_once($ruta);
    $objeto=new $control();
    //nuevamente preguntamos pero ahora por el metodo 
    $metodo=isset($_GET['M'])?$_GET['M']:'';
    //ahora pregu tamos si el metodo existe o si no viene vacia la variable 
    if(!empty($_GET['M']) && method_exists($objeto,$metodo)){
        //si es asi invocamos al metodo pasado por la url del objeto pasado por la url
        $objeto->$metodo();
    }
}else{
    //en caso contrario de que algo falle vamos por nuestro controlador por default
    //definimosla ruta del controlador por default
    require_once("app/Controller/DefaultController.php");
    //instanciamos el controlador 
    $instancia=new DefaultController();
    //ejecutamos el metdo index
    $instancia->index();
}


?>