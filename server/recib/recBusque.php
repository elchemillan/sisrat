<?php

include('../busquedas.php');

	$busque = new busquedas;


	if(isset($_POST['accion'])){
    	$accion = $_POST['accion'];
	}else{
	    $accion = "nada";
	}
	if(isset($_POST['numExp'])){
    	$busque->numExp = $_POST['numExp'];
	}else{
	    $busque->numExp = "nada";
	}


	if($accion=="buscarExpediente"){
		$busque->mostBus();
	}

?>