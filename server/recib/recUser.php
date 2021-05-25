<?php

include("../usuario.php");

	$usuar = new usuarios;


	if(isset($_POST['accion'])){
        $accion = $_POST['accion'];
    }else{
        $accion = "nada";
    }
    if(isset($_POST['nomUser'])){
        $usuar->nomUser = $_POST['nomUser'];
    }else{
        $usuar->nomUser = "nada";
    }
    if(isset($_POST['apeUser'])){
        $usuar->apeUser = $_POST['apeUser'];
    }else{
        $usuar->apeUser = "nada";
    }
    if(isset($_POST['cedFulUser'])){
        $usuar->cedFulUser = $_POST['cedFulUser'];
    }else{
        $usuar->cedFulUser = "nada";
    }
    if(isset($_POST['correoUser'])){
        $usuar->correoUser = $_POST['correoUser'];
    }else{
        $usuar->correoUser = "nada";
    }
    if(isset($_POST['nickUser'])){
        $usuar->nickUser = $_POST['nickUser'];
    }else{
        $usuar->nickUser = "nada";
    }
    if(isset($_POST['passUser'])){
        $usuar->passUser = $_POST['passUser'];
    }else{
        $usuar->passUser = "nada";
    }
    if(isset($_POST['departUsu'])){
        $usuar->departUsu = $_POST['departUsu'];
    }else{
        $usuar->departUsu = "nada";
    }
    if(isset($_POST['NivelUsu'])){
        $usuar->NivelUsu = $_POST['NivelUsu'];
    }else{
        $usuar->NivelUsu = "nada";
    }

    if($accion=="MenuUser"){
    	$usuar->menuUser();
    }
    if($accion=="formRegUser"){
    	$usuar->formRegUser();
    }
    if($accion=="GuarUser"){
        $usuar->guardUser();
    }


?>