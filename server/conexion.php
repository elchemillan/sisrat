<?php
    class conexion{

        var $user = "root";
        var $pass = "Jm010310";
        var $bd = "sisrat";
        var $serv= "localhost";
        var $prefijoBD="";

        function conectar(){
            $link= new mysqli($this->serv, $this->user,$this->pass,$this->bd) 
        or die(mysqli_error());
            return $link;

        }
        
    }
?>