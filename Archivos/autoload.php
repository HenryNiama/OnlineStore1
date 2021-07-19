<?php

    function controllers_autoload ($classname) {

        $path = "controllers/";
        $extension = ".php";
        $fullPath = $path . $classname . $extension;

        if(!file_exists($fullPath)){
            return false;
        }

        include $fullPath;
        
    }      
    

    spl_autoload_register('controllers_autoload');

?>