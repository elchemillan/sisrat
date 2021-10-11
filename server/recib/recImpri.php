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

        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        
        if($_POST["oper"]=="VERPLANILLA"){

            $verExpSQL = "SELECT * FROM comercio where noExpe=".$_POST["noExpediente"]."";
            $restExpSQL = $link->query($verExpSQL);
            $expSQLRest = $restExpSQL->fetch_array();

            $verCotzSQL = "SELECT * FROM cotizaciones where id=".$expSQLRest["fk_cotizaciones"]."";
            $resCotz = $link->query($verCotzSQL);
            $cotzRest = $resCotz->fetch_array();

                $planActPDF->numExpAsoc = $expSQLRest["noExpe"];
                $planActPDF->cotizID = $cotzRest['id'];
                
        }else{
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
        }
        $planActPDF->link2 = $link;
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
    if($accion=="formModfLiquid"){
        if(isset($_POST['numExp'])){
            $imprimir->numExp = $_POST['numExp'];
        }else{
            $imprimir->numExp = "";
        }
        $imprimir->mostLiq();
    }
    if($accion=="ActLiquid"){
        if(isset($_POST['ingreBrut'])){
            $imprimir->ingreBrut = $_POST['ingreBrut'];
        }else{
            $imprimir->ingreBrut = "";
        }
        if(isset($_POST['ingreOtro'])){
            $imprimir->ingreOtro = $_POST['ingreOtro'];
        }else{
            $imprimir->ingreOtro = "";
        }
        if(isset($_POST['totalIngre'])){
            $imprimir->totalIngre = $_POST['totalIngre'];
        }else{
            $imprimir->totalIngre = "";
        }
        if(isset($_POST['procentOrdenan'])){
            $imprimir->procentOrdenan = $_POST['procentOrdenan'];
        }else{
            $imprimir->procentOrdenan = "";
        }
        if(isset($_POST['minTribAnu'])){
            $imprimir->minTribAnu = $_POST['minTribAnu'];
        }else{
            $imprimir->minTribAnu = "";
        }
        if(isset($_POST['expAsoc'])){
            $imprimir->expAsoc = $_POST['expAsoc'];
        }else{
            $imprimir->expAsoc = "";
        }
        if(isset($_POST['liquidacion'])){
            $imprimir->liquidacion = $_POST['liquidacion'];
        }else{
            $imprimir->liquidacion = "";
        }
        $imprimir->ActLiquid();
    }
    if($accion=="cotzMod"){
        if(isset($_POST['numExp'])){
            $imprimir->numExp = $_POST['numExp'];
        }else{
            $imprimir->numExp = "";
        }
        $imprimir->cotzMod();
    }
    if($accion=="upCotz"){
        if(isset($_POST['idCotz'])){
            $imprimir->idCotz = $_POST['idCotz'];
        }else{
            $imprimir->idCotz = "";
        }
        if(isset($_POST['minTrib'])){
            $imprimir->minTrib = $_POST['minTrib'];
        }else{
            $imprimir->minTrib = "";
        }
        if(isset($_POST['aforo'])){
            $imprimir->aforo = $_POST['aforo'];
        }else{
            $imprimir->aforo = "";
        }
        if(isset($_POST['petroBs'])){
            $imprimir->petroBs = $_POST['petroBs'];
        }else{
            $imprimir->petroBs = "";
        }
        if(isset($_POST['montActEcon'])){
            $imprimir->montActEcon = $_POST['montActEcon'];
        }else{
            $imprimir->montActEcon = "";
        }
        if(isset($_POST['montCertBom'])){
            $imprimir->montCertBom = $_POST['montCertBom'];
        }else{
            $imprimir->montCertBom = "";
        }
        if(isset($_POST['montSolv'])){
            $imprimir->montSolv = $_POST['montSolv'];
        }else{
            $imprimir->montSolv = "";
        }
        if(isset($_POST['montPubProp'])){
            $imprimir->montPubProp = $_POST['montPubProp'];
        }else{
            $imprimir->montPubProp = "";
        }
        if(isset($_POST['montRenovLicLic'])){
            $imprimir->montRenovLicLic = $_POST['montRenovLicLic'];
        }else{
            $imprimir->montRenovLicLic = "";
        }
        if(isset($_POST['montAseo'])){
            $imprimir->montAseo = $_POST['montAseo'];
        }else{
            $imprimir->montAseo = "";
        }
        if(isset($_POST['montUsoConf'])){
            $imprimir->montUsoConf = $_POST['montUsoConf'];
        }else{
            $imprimir->montUsoConf = "";
        }
        if(isset($_POST['montCatast'])){
            $imprimir->montCatast = $_POST['montCatast'];
        }else{
            $imprimir->montCatast = "";
        }
        if(isset($_POST['montTasaAdmin'])){
            $imprimir->montTasaAdmin = $_POST['montTasaAdmin'];
        }else{
            $imprimir->montTasaAdmin = "";
        }
        if(isset($_POST['plantElect'])){
            $imprimir->plantElect = $_POST['plantElect'];
        }else{
            $imprimir->plantElect = "";
        }
        $imprimir->upCotz();
    }
    if($accion=="mostDat"){
        if(isset($_POST['numExp'])){
            $imprimir->numExp = $_POST['numExp'];
        }else{
            $imprimir->numExp = "";
        }
        $imprimir->mostDat();
    }
    if($accion=="actDat"){
        if(isset($_POST['numExp'])){
            $imprimir->numExp = $_POST['numExp'];
        }else{
            $imprimir->numExp = "";
        }
        if(isset($_POST['ceduFulRepre '])){
            $imprimir->ceduFulRepre  = $_POST['ceduFulRepre '];
        }else{
            $imprimir->ceduFulRepre  = "";
        }
        if(isset($_POST['nomRaz'])){
            $imprimir->nomRaz = $_POST['nomRaz'];
        }else{
            $imprimir->nomRaz = "";
        }
        if(isset($_POST['sectorContrib'])){
            $imprimir->sectorContrib = $_POST['sectorContrib'];
        }else{
            $imprimir->sectorContrib = "";
        }
        if(isset($_POST['dirContrib'])){
            $imprimir->dirContrib = $_POST['dirContrib'];
        }else{
            $imprimir->dirContrib = "";
        }
        if(isset($_POST['grupNom'])){
            $imprimir->grupNom = $_POST['grupNom'];
        }else{
            $imprimir->grupNom = "";
        }
        if(isset($_POST['CampsubGrup'])){
            $imprimir->CampsubGrup = $_POST['CampsubGrup'];
        }else{
            $imprimir->CampsubGrup = "";
        }
        if(isset($_POST['actEconAper'])){
            $imprimir->actEconAper = $_POST['actEconAper'];
        }else{
            $imprimir->actEconAper = "";
        }
        if(isset($_POST['noExpedien'])){
            $imprimir->noExpedien = $_POST['noExpedien'];
        }else{
            $imprimir->noExpedien = "";
        }
        if(isset($_POST['rifCodComer'])){
            $imprimir->rifCodComer = $_POST['rifCodComer'];
        }else{
            $imprimir->rifCodComer = "";
        }
        if(isset($_POST['rifComer'])){
            $imprimir->rifComer = $_POST['rifComer'];
        }else{
            $imprimir->rifComer = "";
        }
        if(isset($_POST['identFiscContrib'])){
            $imprimir->identFiscContrib = $_POST['identFiscContrib'];
        }else{
            $imprimir->identFiscContrib = "";
        }
        if(isset($_POST['capPagContrib'])){
            $imprimir->capPagContrib = $_POST['capPagContrib'];
        }else{
            $imprimir->capPagContrib = "";
        }
        if(isset($_POST['capSusContrib'])){
            $imprimir->capSusContrib = $_POST['capSusContrib'];
        }else{
            $imprimir->capSusContrib = "";
        }
        if(isset($_POST['TelefContrib'])){
            $imprimir->TelefContrib = $_POST['TelefContrib'];
        }else{
            $imprimir->TelefContrib = "";
        }
        if(isset($_POST['camDocContrib'])){
            $imprimir->camDocContrib = $_POST['camDocContrib'];
        }else{
            $imprimir->camDocContrib = "";
        }
        if(isset($_POST['tipEsta'])){
            $imprimir->tipEsta = $_POST['tipEsta'];
        }else{
            $imprimir->tipEsta = "";
        }
        if(isset($_POST['nomRepCon'])){
            $imprimir->nomRepCon = $_POST['nomRepCon'];
        }else{
            $imprimir->nomRepCon = "";
        }
        if(isset($_POST['apelRepCon'])){
            $imprimir->apelRepCon = $_POST['apelRepCon'];
        }else{
            $imprimir->apelRepCon = "";
        }
        if(isset($_POST['codCedRepre'])){
            $imprimir->codCedRepre = $_POST['codCedRepre'];
        }else{
            $imprimir->codCedRepre = "";
        }
        if(isset($_POST['numCedRep'])){
            $imprimir->numCedRep = $_POST['numCedRep'];
        }else{
            $imprimir->numCedRep = "";
        }
        if(isset($_POST['estRegCon'])){
            $imprimir->estRegCon = $_POST['estRegCon'];
        }else{
            $imprimir->estRegCon = "";
        }
        if(isset($_POST['cidRegCont'])){
            $imprimir->cidRegCont = $_POST['cidRegCont'];
        }else{
            $imprimir->cidRegCont = "";
        }
        if(isset($_POST['dirRegCon'])){
            $imprimir->dirRegCon = $_POST['dirRegCon'];
        }else{
            $imprimir->dirRegCon = "";
        }
        if(isset($_POST['telfRegCon'])){
            $imprimir->telfRegCon = $_POST['telfRegCon'];
        }else{
            $imprimir->telfRegCon = "";
        }
        if(isset($_POST['tipPropInmue'])){
            $imprimir->tipPropInmue = $_POST['tipPropInmue'];
        }else{
            $imprimir->tipPropInmue = "";
        }
        if(isset($_POST['copCedRequi'])){
            $imprimir->copCedRequi = $_POST['copCedRequi'];
        }else{
            $imprimir->copCedRequi = "";
        }
        if(isset($_POST['copRifdRequi'])){
            $imprimir->copRifdRequi = $_POST['copRifdRequi'];
        }else{
            $imprimir->copRifdRequi = "";
        }
        if(isset($_POST['copPropInmue'])){
            $imprimir->copPropInmue = $_POST['copPropInmue'];
        }else{
            $imprimir->copPropInmue = "";
        }
        if(isset($_POST['copPerSant'])){
            $imprimir->copPerSant = $_POST['copPerSant'];
        }else{
            $imprimir->copPerSant = "";
        }
        if(isset($_POST['copPerSant'])){
            $imprimir->copPerSant = $_POST['copPerSant'];
        }else{
            $imprimir->copPerSant = "";
        }
        if(isset($_POST['CarpMar'])){
            $imprimir->CarpMar = $_POST['CarpMar'];
        }else{
            $imprimir->CarpMar = "";
        }
        if(isset($_POST['carSolic'])){
            $imprimir->carSolic = $_POST['carSolic'];
        }else{
            $imprimir->carSolic = "";
        }
        if(isset($_POST['permiBomb'])){
            $imprimir->permiBomb = $_POST['permiBomb'];
        }else{
            $imprimir->permiBomb = "";
        }
        if(isset($_POST['copRegComerRequi'])){
            $imprimir->copRegComerRequi = $_POST['copRegComerRequi'];
        }else{
            $imprimir->copRegComerRequi = "";
        }
        if(isset($_POST['rifComple'])){
            $imprimir->rifComple = $_POST['rifComple'];
        }else{
            $imprimir->rifComple = "";
        }
        $imprimir->actDat();
    }
?>