<?php

include('../imprimir.php');
include('../planSolAct.php');

	$imprimir = new imprimir;
	

	if(isset($_POST['accion'])){
    	$accion = $_POST['accion'];
	}else{
	    $accion = "nada";
	}

    if($accion=="FormImpri"){
        $imprimir->FormImpri();
    }
    if($accion=="impriDat"){
    	
    	$planActPDF = new planActivi;
    	
    	
    	if(isset($_POST['noExpediente'])){
    		$planActPDF->noExpediente = $_POST['noExpediente'];
	    }else{
	        $planActPDF->noExpediente = "nada";
	    }

	    $planActPDF->primDat();
    }
?>