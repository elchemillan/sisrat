<?php

include('../imprimir.php');



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
    	include('../planSolAct.php');
    	$planActPDF = new planActivi;
    	
    	
    	if(isset($_POST['noExpediente'])){
    		$planActPDF->noExpediente = $_POST['noExpediente'];
	    }else{
	        $planActPDF->noExpediente = "nada";
	    }

	    $planActPDF->primDat();
    }
    if($accion=="guarCotiz"){
        include('../planSolAct.php');
        $planActPDF = new cotzAct;

        if(isset($_POST['minTrib'])){
            $planActPDF->minTrib = $_POST['minTrib'];
        }else{
            $planActPDF->minTrib = "nada";
        }
        if(isset($_POST['aforo'])){
            $planActPDF->aforo = $_POST['aforo'];
        }else{
            $planActPDF->aforo = "nada";
        }
        if(isset($_POST['petroBs'])){
            $planActPDF->petroBs = $_POST['petroBs'];
        }else{
            $planActPDF->petroBs = "nada";
        }
        if(isset($_POST['montActEcon'])){
            $planActPDF->montActEcon = $_POST['montActEcon'];
        }else{
            $planActPDF->montActEcon = "nada";
        }
        if(isset($_POST['montCertBom'])){
            $planActPDF->montCertBom = $_POST['montCertBom'];
        }else{
            $planActPDF->montCertBom = "nada";
        }
        if(isset($_POST['montSolv'])){
            $planActPDF->montSolv = $_POST['montSolv'];
        }else{
            $planActPDF->montSolv = "nada";
        }
        if(isset($_POST['montPubProp'])){
            $planActPDF->montPubProp = $_POST['montPubProp'];
        }else{
            $planActPDF->montPubProp = "nada";
        }
        if(isset($_POST['montRenovLicLic'])){
            $planActPDF->montRenovLicLic = $_POST['montRenovLicLic'];
        }else{
            $planActPDF->montRenovLicLic = "nada";
        }
        if(isset($_POST['montAseo'])){
            $planActPDF->montAseo = $_POST['montAseo'];
        }else{
            $planActPDF->montAseo = "nada";
        }
        if(isset($_POST['montUsoConf'])){
            $planActPDF->montUsoConf = $_POST['montUsoConf'];
        }else{
            $planActPDF->montUsoConf = "nada";
        }
        if(isset($_POST['montCatast'])){
            $planActPDF->montCatast = $_POST['montCatast'];
        }else{
            $planActPDF->montCatast = "nada";
        }
        if(isset($_POST['montTasaAdmin'])){
            $planActPDF->montTasaAdmin = $_POST['montTasaAdmin'];
        }else{
            $planActPDF->montTasaAdmin = "nada";
        }
        if(isset($_POST['numExpAsoc'])){
            $planActPDF->numExpAsoc = $_POST['numExpAsoc'];
        }else{
            $planActPDF->numExpAsoc = "nada";
        }
        if(isset($_POST['plantElect'])){
            $planActPDF->plantElect = $_POST['plantElect'];
        }else{
            $planActPDF->plantElect = "nada";
        }

        $planActPDF->impCotz();
    }
    if($accion=="mostLiq"){
        $imprimir->mostLiq();
    }
    if($accion=="guarLiquid"){
        include('../planSolAct.php');
        $planActPDF = new Liquidacion;

        if(isset($_POST['ingreBrut'])){
            $planActPDF->ingreBrut = $_POST['ingreBrut'];
        }else{
            $planActPDF->ingreBrut = "nada";
        }
        if(isset($_POST['ingreOtro'])){
            $planActPDF->ingreOtro = $_POST['ingreOtro'];
        }else{
            $planActPDF->ingreOtro = "nada";
        }
        if(isset($_POST['totalIngre'])){
            $planActPDF->totalIngre = $_POST['totalIngre'];
        }else{
            $planActPDF->totalIngre = "nada";
        }
        if(isset($_POST['procentOrdenan'])){
            $planActPDF->procentOrdenan = $_POST['procentOrdenan'];
        }else{
            $planActPDF->procentOrdenan = "nada";
        }
        if(isset($_POST['minTribAnu'])){
            $planActPDF->minTribAnu = $_POST['minTribAnu'];
        }else{
            $planActPDF->minTribAnu = "nada";
        }
        if(isset($_POST['expAsoc'])){
            $planActPDF->expAsoc = $_POST['expAsoc'];
        }else{
            $planActPDF->expAsoc = "nada";
        } 

        $planActPDF->impriLiquid();
    }
    if($accion=="imprLic"){
        include('../licenAct.php');
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        

        $veriExp = "SELECT * FROM comercio where noExpe=".$_POST['camExpBus']."";
        $resExp = $link->query($veriExp);
        $expRes = $resExp->fetch_array();
        $licencia = new licenciaEcons;
        if(isset($expRes)){
            if($expRes["fk_cotizaciones"]!=0){
                if(isset($_POST['camExpBus'])){
                    $licencia->camExpBus = $_POST['camExpBus'];
                }else{
                    $licencia->camExpBus = "nada";
                } 
                if(isset($_POST['correExp'])){
                    $licencia->correExp = $_POST['correExp'];
                }else{
                    $licencia->correExp = "nada";
                } 
                $licencia->link2 = $link;
                $licencia->imprimirEcon();
            }else{
                $licencia->errorImpri();
            }
        }else{
             $licencia->errorImpri();
        }
        

       
        
    }
?>