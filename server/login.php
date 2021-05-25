<?php

class intro{

    var $user = "";
    var $pass = "";
    
    function login(){
        echo'
            <link rel="stylesheet" href="./src/stylus/login.css">
                <div class="wrapper fadeInDown">
                    <div id="formContent">
                        <!-- Tabs Titles -->

                        <!-- Icon -->
                        <div class="fadeIn first">
                        <img src="./assets/logo_ajustado.png" id="icon" alt="User Icon" />
                        </div>

                        <!-- Login Form -->
                        <input type="text" id="fUser" class="fadeIn second" name="login" placeholder="login">
                        <input type="password" id="fPass" class="fadeIn third" name="login" placeholder="password">
                        <input type="submit" id="entrar" class="fadeIn fourth" onClick="btnEntrar()"value="Entrar">
                    </div>
                </div>
        ';
    }
    function veriLog(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $sql= "SELECT * from usuarios where nick='".$this->user."' and pass='".$this->pass."' ";
        $respuesta = $link->query($sql);
        $resFilas= $respuesta->num_rows;
        $filasRes = $respuesta->fetch_array();
        if($resFilas != 0){
            session_start();
            $_SESSION["usuario"]= $filasRes["nick"];
            $_SESSION["pass"]= $filasRes["pass"];
            $_SESSION["nivel"]= $filasRes["nivel"];
            header("http://10.200.0.62:8080/SisCast/index.php");
        }
    }
}


?>