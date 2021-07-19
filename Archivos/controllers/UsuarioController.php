<?php

require_once 'models/usuario.php';

class UsuarioController{

    public function index(){
        echo "Controlador Usuario, Acción index";
    }

    public function registro(){
        require_once 'views/usuario/registro.php';
    }

    public function save(){

        if(isset($_POST)){

            //Validación (Debería hacerse una mejor validación):
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            //var_dump($nombre);
            
            if($nombre && $apellido && $email && $password){
                
                //Creación de objeto
                $usuario = new Usuario();
                
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellido);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
            
                //Guardamos el objeto.
                $save = $usuario->save();

                if ($save) {
                    $_SESSION['register'] = "completo";
                }else{
                    $_SESSION['register'] = "fallido";
                }

            }else{
                $_SESSION['register'] = "fallido";   
            }
            
        }else{
            $_SESSION['register'] = "fallido";        
        }
        
        header("Location:".base_url."Archivos/?controller=usuario&action=registro");
    }

}
?>