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

            $usuario = new Usuario();

            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellidos($_POST['apellido']);
            $usuario->setEmail($_POST['email']);

            //$usuario->setPassword($_POST['password']);
            

            $save = $usuario->save();

            if ($save) {
                echo "Registro completado.";
            }else{
                echo "Registro fallido.";
            }

        }
    }

}
?>