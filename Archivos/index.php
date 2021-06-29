<?php
/*
Este es un controlador frontal, es decir, se encarga de
recoger un parametro con una url y ve a que controlador
pertenece para cargar ese archivo.
*/

//Cargamos el autoload.php, para tener acceso a todos los controladores
require_once 'autoload.php';

//Comprobamos si llega el controlador por la URL:
if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';
}else{
    echo "La página que buscas no existe.";
    exit();
}

//Compruebo si existe el controlador:
if(class_exists($nombre_controlador)){
    //Si existe, creo el objeto:
    $controlador = new $nombre_controlador();

    //Compruebo si llega la acción y si el método existe dentro del
    //controlador:
    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();//llamo al metodo action
    }else{
        echo "La pagina que buscas no existe.";
    }
}else{
    echo "La páina que buscas no existe.";
}
?>