<?php


include("../reportes.php");

	$report = new reportes;

	if(isset($_POST['accion'])){
    	$accion = $_POST['accion'];
	}else{
	    $accion = "nada";
	}

	if($accion=="opReport"){
		$report->opReport();
	}
	if($accion=="fechForm"){
		$report->fechForm();
	}
	if($accion=="sectForm"){
		$report->sectForm();
	}
	if($accion=="reporFech"){

		include("../impriRepor.php");

		$imRep= new impriRepor;

		if(isset($_POST['diaRep'])){
    		$imRep->diaRep = $_POST['diaRep'];
		}else{
		    $imRep->diaRep="";
		}
		if(isset($_POST['mesRep'])){
    		$imRep->mesRep = $_POST['mesRep'];
		}else{
		    $imRep->mesRep="";
		}
		if(isset($_POST['anoRep'])){
    		$imRep->anoRep = $_POST['anoRep'];
		}else{
		    $imRep->anoRep="";
		}

		if(isset($_POST['diaDes'])){
    		$imRep->diaDes = $_POST['diaDes'];
		}else{
		    $imRep->diaDes="";
		}
		if(isset($_POST['mesDes'])){
    		$imRep->mesDes = $_POST['mesDes'];
		}else{
		    $imRep->mesDes="";
		}
		if(isset($_POST['anoDes'])){
    		$imRep->anoDes = $_POST['anoDes'];
		}else{
		    $imRep->anoDes="";
		}
		
		$imRep->reportFech();
	}
	if($accion=="imprSector"){
		include("../impriRepor.php");

		$imRep= new impriSect();

		if(isset($_POST['sect'])){
    		$imRep->sect = $_POST['sect'];
		}else{
		    $imRep->sect="";
		}
		$imRep->sectorRepor();
	}
	if($accion=="actForm"){
		$report->actForm();
	}
	if($accion=="imprAct"){

		include("../impriRepor.php");

		$imAct= new imprAct;

		if(isset($_POST['actEcon'])){
    		$imAct->actEcon = $_POST['actEcon'];
		}else{
		    $imAct->actEcon="";
		}
		$imAct->actImpri();
	}
	if($accion=="complReg"){
		include("../impriRepor.php");

		$imAct= new totalReg;

		$imAct->impTotReg();
	}
?>