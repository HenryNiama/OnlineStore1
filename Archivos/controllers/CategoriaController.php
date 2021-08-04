<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class CategoriaController{

    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save()
    {
        Utils::isAdmin();
        
        //Guardar la cateogría en la BDD
        if (isset($_POST) && isset($_POST['nombre'])) {
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
        }


        header("Location: ".base_url."Archivos/?controller=Categoria&action=index");//ojo
    }

    public function ver()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            //cONSEGUIR CATEGORIAS
            $categoria = new Categoria();
            $categoria->setId($id);
            $objetoCategoria = $categoria->getOne();     
            
            //CONSEGUIR PRODUCTOS POR CATEGORIA
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategory();
        }

        require_once 'views/categoria/ver.php';
    }
}
?>