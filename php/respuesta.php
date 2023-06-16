<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta ... </title>
</head>
<body>
    <?php 
    //obtenemos losvalores del formulario
    $usuario=$_POST['user'];
    $contrasenia=$_POST['password'];
    //declaro variables de referencia para el logueo
    $us="luis";
    $ps="1111";
    $res="";

    if($usuario==$us && $contrasenia==$ps){
        //en caso de que sean iguales algo pasa
        $res="Correcto";
    }else{
        //en caso de que no, pasa otra cosa
        $res="Incorrecto";
    }
    ?>

    <h1>Respuesta</h1>
    <h2>Hola : <?php echo($usuario) ?> </h2>
    <h2>Tu logueo es : <?= $res ?> </h2>
</body>
</html>