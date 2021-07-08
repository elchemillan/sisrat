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

        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $verExp = "SELECT * FROM comercio where noExpe=".$_POST['noExpediente']."";
        $resVerExp = $link->query($verExp);
        $verExpRes = $resVerExp->fetch_array();

        if($_POST["oper"]=="VERPLANILLA"){

            $verLiquidSQL = "SELECT * FROM liquidaciones where id=".$verExpRes["fk_liquid"]."";
            
            $resLiquid = $link->query($verLiquidSQL);
            $liquidRes = $resLiquid->fetch_array();

            if(isset($liquidRes['ingreBrut'])){
                $planActPDF->ingreBrut = $liquidRes['ingreBrut'];
            }else{
                $planActPDF->ingreBrut = "nada";
            }
            if(isset($liquidRes['ingreOtro'])){
                $planActPDF->ingreOtro = $liquidRes['ingreOtro'];
            }else{
                $planActPDF->ingreOtro = "nada";
            }
            if(isset($liquidRes['totalIngre'])){
                $planActPDF->totalIngre = $liquidRes['totalIngre'];
            }else{
                $planActPDF->totalIngre = "nada";
            }
            if(isset($liquidRes['procentOrdenan'])){
                $planActPDF->procentOrdenan = $liquidRes['procentOrdenan'];
            }else{
                $planActPDF->procentOrdenan = "nada";
            }
            if(isset($liquidRes['minTribAnu'])){
                $planActPDF->minTribAnu = $liquidRes['minTribAnu'];
            }else{
                $planActPDF->minTribAnu = "nada";
            }
            if(isset($_POST['noExpediente'])){
                $planActPDF->expAsoc = $_POST['noExpediente'];
            }else{
                $planActPDF->expAsoc = "nada";
            } 
            if(isset($_POST['noExpediente'])){
                $planActPDF->noExpediente = $_POST['noExpediente'];
            }else{
                $planActPDF->noExpediente = "nada";
            }
                $planActPDF->liquid = $verExpRes["fk_liquid"];
                $planActPDF->link2= $link;
        }else{
            $planActPDF->liquid = 0;
            $planActPDF->link2= $link;
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
            if(isset($_POST['noExpediente'])){
                $planActPDF->expAsoc = $_POST['noExpediente'];
            }else{
                $planActPDF->expAsoc = "nada";
            } 
            if(isset($_POST['noExpediente'])){
                $planActPDF->noExpediente = $_POST['noExpediente'];
            }else{
                $planActPDF->noExpediente = "nada";
            }
        }

        

        $planActPDF->impriLiquid();
    }
    if($accion=="imprLic"){
        include('../licenAct.php');
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $numExp = $_POST['camExpBus'];


        $veriExp = "SELECT * FROM comercio where noExpe=".$numExp."";
        $resExp = $link->query($veriExp);
        $expRes = $resExp->fetch_array();
        $licencia = new licenciaEcons;
        if(isset($expRes)){
            if($expRes["fk_cotizaciones"]!=0){
                if(isset($_POST['camExpBus'])){
                    $licencia->camExpBus = $expRes["noExpe"];
                }else{
                    $licencia->camExpBus = "nada";
                } 
                $veriCor ="SELECT * FROM licactecon where fk_comercio=".$expRes["id"]."";
                $resVeriCor = $link->query($veriCor);
                $veriCorRes = $resVeriCor->fetch_array();
                if($veriCorRes["fechaEminc"] < date("Y")){
                    if(isset($_POST['correExp'])){
                        $licencia->correExp = $_POST['correExp'];
                    }else{
                        $licencia->correExp = "nada";
                    } 
                    $licencia->link2 = $link;
                    $licencia->imprimirEcon();
                }else{
                    $licencia->correExp = $veriCorRes["corr"];
                    $licencia->link2 = $link;
                    $licencia->imprimirEcon();
                }
            }else{
                $licencia->errorImpri();
            }
        }else{
             $licencia->errorImpri();
        }
        
    }
?>