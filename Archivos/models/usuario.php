<?php

class Usuario{

    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $imagen;

    //Conexión base de datos:
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

 
    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

    }

 
    public function getApellidos()
    {
        return $this->apellidos;
    }


    public function setApellidos($apellidos)
    {
        $this->apellidos =  $this->nombre = $this->db->real_escape_string($apellidos);

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email =  $this->nombre = $this->db->real_escape_string($email);

        return $this;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        
        $this->password = password_hash($this->db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);

        return $this;
    }


    public function getImagen()
    {
        return $this->imagen;
    }


    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /*Metodos propios: */

    public function save(){

        $sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', 
        '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null)";

        $save = $this->db->query($sql);

        $result = false;

        if($save){
            $result = true;
        }

        return $result;

    }
}

?>