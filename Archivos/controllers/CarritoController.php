<?php

require_once 'models/producto.php';

class CarritoController{

    public function index(){
        //var_dump($_SESSION['carrito']);
        //die();
        $carrito = $_SESSION['carrito'];
        require_once 'views/carrito/index.php';
    }

    public function add()
    {
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        }else{
            header("Location: ".base_url."index.php");//redirección
        }


        if (isset($_SESSION['carrito'])) {//Si ya existe la Sesión

            $counter = 0;

            foreach ($_SESSION['carrito'] as $indice => $elemento) {

                if($elemento['id_producto'] == $producto_id){
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }

        }

        if(!isset($counter) || $counter == 0){
   
            $producto = new Producto();

            $producto->setId($producto_id);
            $objetoProducto = $producto->getOne();

            //Añadir al carrito
            if(is_object($objetoProducto)){
                //Creo una sesión array.
                $_SESSION['carrito'][] = array(
                    "id_producto" => $objetoProducto->id,
                    "precio" => $objetoProducto->precio,
                    "unidades" => 1,
                    "producto" => $objetoProducto
                );
            }
        }             
        
        header("Location: ".base_url."Archivos/?controller=carrito&action=index");//redirección
    }

    public function remove()
    {
        
    }

    public function deleteAll()
    {
        unset($_SESSION['carrito']);
        header("Location: ".base_url."Archivos/?controller=carrito&action=index");//redirección
    }
}
?>