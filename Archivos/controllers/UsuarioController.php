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


    //Comprobamos por post si nos llegan datos
    public function login()
    {
        if (isset($_POST)) {
            //Identificar al usuario
            //Consulta a la base de datos
            $usuario = new Usuario();

            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identify = $usuario->login();

            //Si el usuario existe:
            if ($identify && is_object($identify)) {
                //Entonces creo una sesión con el objeto:
                $_SESSION['identify'] = $identify; 

                //Verifico si es administrador el que se logueó:
                    if($identify->rol == "admin"){
                        //creo una sesión en específico:
                        $_SESSION['admin'] = true;
                    }
            }else{//si el usuario no existe o los datos estan mal:
                $_SESSION['error_login'] = "Identificaión Fallida.";
            }
            

        }
        
        header("Location: ".base_url."index.php");//ojo
    }

    public function logout()
    {
        if (isset($_SESSION['identify'])) {
            unset($_SESSION['identify']);
            unset($_SESSION['error_login']);
        }

        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        header("Location: ".base_url."index.php");//ojo

    }

}
?>