<?php
/*
Este es un controlador frontal, es decir, se encarga de
recoger un parametro con una url y ve a que controlador
pertenece para cargar ese archivo.
*/

require_once 'config/db.php';

//Cargamos el autoload.php, para tener acceso a todos los controladores
require_once 'autoload.php';

require_once 'config/parameters.php';

require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';


function show_error(){
    $error = new ErrorController();
    $error->index();
}

//Comprobamos si llega el controlador por la URL:
if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';

}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = controller_default;
}else{
    show_error();
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

    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $action_default = action_default;
        $controlador->$action_default();//en este caso, llamo a la acción por default en parameters.php
    }else{
        show_error();
    }
}else{
    show_error();
}

require_once 'views/layout/footer.php';


//quedamos: http://localhost:3000/Archivos/?controller=producto&action=index
?>