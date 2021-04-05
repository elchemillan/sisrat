<?php

include('../login.php');

$log = new intro;

if(isset($_POST['accion'])){
    $accion = $_POST['accion'];
}else{
    $accion = "nada";
}
if(isset($_POST['usuario'])){
    $log->user = $_POST['usuario'];
}else{
    $log->user="";
}
if(isset($_POST["pass"])){
    $log->pass = $_POST['pass'];
}else{
    $log->pass="";
}

if($accion=="logEntrar"){
    $log->veriLog();
}
if($accion=="fSalir"){
    $log->fSalir();
}
?>