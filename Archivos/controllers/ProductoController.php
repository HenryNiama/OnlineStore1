<?php

require_once 'models/producto.php';


class ProductoController{

    public function index(){

        $producto = new Producto();
        $productos = $producto->getRandom(6);

        //Renderizar vista
        require_once 'views/producto/destacados.php'; 
    }
    
    public function gestion(){

        Utils::isAdmin(); //Compruebo si es un administrador

        $producto = new Producto();
        
        $productos = $producto->getAll();
        
        require_once 'views/producto/gestion.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }

    public function save()
    {
        Utils::isAdmin();

        if(isset($_POST)){

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

           if($nombre && $descripcion && $precio && $stock && $categoria){
                $producto = new Producto();

                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);

                //Guardar la imágen
                if(isset($_FILES['imagen'])){

                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                    if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif") {
                        
                        if (!is_dir('uploads/images')) {//Si no existe el directorio
                            mkdir('uploads/images', 0777, true); //Lo creo
                        }
                        move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                        $producto->setImagen($filename); // guardo la img
                    }

                }


                $save;
                $actualizado;

                //Si me llega como parametro un id, entonces, 
                //va a editar/actualizar la prenda en la BDD:
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $producto->setId($id);
                    //$save=$producto->update();
                    $actualizado=$producto->update();
                    
                }else{
                    $save = $producto->save();
                }

                
                if($save){
                    $_SESSION['producto'] = "completed";
                    
                }else{
                    $_SESSION['producto'] = "failed";
                }

                
                if($actualizado){
                    $_SESSION['actualizado'] = "completed";
                }else{
                    $_SESSION['actualizado'] = "failed";
                }
                

           }else{
               $_SESSION['producto'] = "failed";
           } 
        }else{
            $_SESSION['producto'] = "failed";
        }

        //redirección:
        header('Location:'.base_url.'Archivos/?controller=producto&action=gestion');
    }

    public function editar()
    {
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $edit = true;

            $id = $_GET['id'];

            $producto = new Producto();
            $producto->setId($id);
            $prod = $producto->getOne();

            require_once 'views/producto/crear.php';
        }else{
            header('Location:'.base_url.'Archivos/?controller=producto&action=gestion');
        }
       
    }

    public function eliminar()
    {
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $producto = new Producto();
            $producto->setId($id);

            $delete = $producto->delete();

            if ($delete) {
                $_SESSION['delete'] = 'completed';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else {
            $_SESSION['delete'] = 'failed';
        }

        //redirección:
        header('Location:'.base_url.'Archivos/?controller=producto&action=gestion');
    }

    public function ver()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $producto = new Producto();
            $producto->setId($id);
            $prod = $producto->getOne();           
        }

        require_once 'views/producto/ver.php';
    }
}
?>