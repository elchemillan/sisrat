<?php

require('fpdf/fpdf.php');

class PDF1 extends FPDF{
	

	function Header(){
	        // Logos
	        $this->Image('../../assets/logo_ajustado.JPG',15,3,22);
	        $this->Image('../../assets/escudo_municipio.jpg',175,3,22);
	        // Arial bold 15
	        $this->SetFont('Times','B',9);
	        // Título
	        $this->SetY(3);
	        $this->SetX(74);
	        $this->Cell(30,10,'REPUBLICA BOLIVARIANA DE VENEZUELA',0,'C');
	        $this->SetY(7);
	        $this->SetX(62);
	        $this->Cell(30,10,utf8_decode('ALCALDIA DEL MUNICIPIO FERNÁNDEZ FEO DE EL PIÑAL'),0,'C');
	        $this->SetY(11);
	        $this->SetX(65);
	        $this->Cell(30,10,utf8_decode('SERVICIO AUTÓNOMO MUNICIPAL DE RECAUDACIÓN '),0,'C');
	        $this->SetY(17);
	        $this->SetX(80);
	        $this->Cell(65,6,utf8_decode('Y ADMINISTRACIÓN TRIBUTARIA'),0,'C');
	        $this->SetY(19);
	        $this->SetX(93);
	        $this->Cell(30,10,'RIF: G-20016065-9',0,'C');
	        // Salto de línea
	        $this->Ln(20);
	    }


	
}

class planActivi{

	function contruc(){
		$noExpediente ="";
	}

	function primDat(){

		session_start();

		include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $expSQL = "SELECT * FROM comercio where noExpe=".$this->noExpediente."";
        $resExp = $link->query($expSQL);
        $expRes = $resExp->fetch_array();

        $actSQL = "SELECT * FROM actEcon where id=".$expRes["fk_actEcon"]."";
        $resAct = $link->query($actSQL);
        $actRes = $resAct->fetch_array();

        $datComerSQL = "SELECT * FROM datcomer where id=".$expRes["fk_datComer"]."";
        $resDatComer = $link->query($datComerSQL);
        $datComerRes = $resDatComer->fetch_array();

        $divRif = explode("|",$datComerRes["rif"]);
        $rifLetra = $divRif[0];
        $rifNum = $divRif[1];

        $secSQL = "SELECT * FROM sector where id=".$expRes["fk_sector"]."";
        $resSec = $link->query($secSQL);
        $secRes = $resSec->fetch_array();

        $propSQL = "SELECT * FROM propietario where id=".$expRes["fk_propietario"]."";
        $resProp = $link->query($propSQL);
        $propRes = $resProp->fetch_array();

        $cedDiv = explode("|",$propRes["cedula"]);
        $cedLetra = $cedDiv[0];
        $cedNum = $cedDiv[1];

        $usuSQL = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
        $resUsu = $link->query($usuSQL);
        $usuRes = $resUsu->fetch_array();

		$pdf = new PDF1('P','mm','letter');
	    $pdf->SetMargins(20,0,22);
	    $pdf->AliasNbPages();
	    $pdf->AddPage();

        $pdf->SetY(60);
        $pdf->SetX(100);
        $pdf->Cell(16,7,utf8_decode('A. DATOS DEL CONTRIBUYENTE'),0,0,'C');
        $pdf->SetY(70);
        $pdf->SetX(17);
        $pdf->Cell(38,7,utf8_decode('FECHA DE APERTURA'),1,0,'C');
        $pdf->SetY(70);
        $pdf->SetX(55);
        $pdf->Cell(38,7,utf8_decode(''),1,0,'C');
        $pdf->SetY(77);
        $pdf->SetX(17);
        $pdf->Cell(38,5,utf8_decode('Nombre o Razón social'),1,0,'L');
        $pdf->SetY(77);
        $pdf->SetX(55);
        $pdf->Cell(0,5,utf8_decode(''.$expRes["nombre"].''),1,0,'L');
        $pdf->SetY(70);
        $pdf->SetX(93);
        $pdf->Cell(40,7,'COD.CONTRIBUYENTE',1,0,'C');
        $pdf->SetY(70);
        $pdf->SetX(133);
        $pdf->Cell(0,7,''.$expRes["noExpe"].'',1,0,'C');
        $pdf->SetY(40);
        $pdf->SetX(22);
        $pdf->Cell(27,25,'',1,0,'C');
        $pdf->SetY(82);
        $pdf->SetX(17);
        $pdf->Cell(0,5,utf8_decode('Descripción de la Principal Actividad Económica'),1,0,'L');
        $pdf->SetY(87);
        $pdf->SetX(17);
        $pdf->Cell(0,5,utf8_decode(''.$actRes["nombre"].''),1,0,'L');
        $pdf->SetY(92);
        $pdf->SetX(17);
        $pdf->Cell(115,5,utf8_decode('Dirección o Domicilio Fiscal'),1,0,'L');
        $pdf->SetY(97);
        $pdf->SetX(17);
        $pdf->Cell(115,5,utf8_decode(''.$datComerRes["direccion"].''),1,0,'L');
        $pdf->SetY(92);
        $pdf->SetX(132);
        $pdf->Cell(40,5,utf8_decode('Sector'),1,0,'C');
        $pdf->SetY(97);
        $pdf->SetX(132);
        $pdf->Cell(40,5,utf8_decode(''.$secRes["nombre"].''),1,0,'C');
        $pdf->SetY(92);
        $pdf->SetX(172);
        $pdf->Cell(22,5,utf8_decode('COD'),1,0,'C');
        $pdf->SetY(97);
        $pdf->SetX(172);
        $pdf->Cell(22,5,utf8_decode(''.$secRes["codSect"].''),1,0,'C');
        $pdf->SetY(102);
        $pdf->SetX(17);
        $pdf->Cell(45,5,utf8_decode('Registro de Información Fiscal'),1,0,'L');
        $pdf->SetY(107);
        $pdf->SetX(17);
        $pdf->Cell(8,5,utf8_decode(''.$rifLetra.''),1,0,'C');
        $pdf->SetY(107);
        $pdf->SetX(25);
        $pdf->Cell(37,5,utf8_decode(''.$rifNum.''),1,0,'C');
        $pdf->SetY(102);
        $pdf->SetX(62);
        $pdf->Cell(75,5,utf8_decode('Nro. de Identificación Fiscal'),1,0,'C');
        $pdf->SetY(107);
        $pdf->SetX(62);
        $pdf->Cell(75,5,utf8_decode(''.$datComerRes["identFisc"].''),1,0,'C');
        $pdf->SetY(102);
        $pdf->SetX(137);
        $pdf->Cell(57,5,utf8_decode('Capital Suscrito'),1,0,'C');
        $pdf->SetY(107);
        $pdf->SetX(137);
        $pdf->Cell(57,5,utf8_decode(''.$datComerRes["capSusc"].''),1,0,'C');
        $pdf->SetY(112);
        $pdf->SetX(17);
        $pdf->Cell(57,5,utf8_decode('Capital Pagado'),1,0,'C');
        $pdf->SetY(117);
        $pdf->SetX(17);
        $pdf->Cell(57,5,utf8_decode(''.$datComerRes["capPag"].''),1,0,'C');
        $pdf->SetY(112);
        $pdf->SetX(74);
        $pdf->Cell(57,5,utf8_decode('Nro. Telefono'),1,0,'C');
        $pdf->SetY(117);
        $pdf->SetX(74);
        $pdf->Cell(57,5,utf8_decode(''.$datComerRes["telef"].''),1,0,'C');
        $pdf->SetY(112);
        $pdf->SetX(131);
        $pdf->Cell(63,5,utf8_decode('Establecimiento'),1,0,'C');
        $pdf->SetY(117);
        $pdf->SetX(131);
        $pdf->Cell(63,5,utf8_decode(''.$expRes["tipo"].''),1,0,'C');
        $pdf->SetY(124);
        $pdf->SetX(77);
        $pdf->Cell(63,5,utf8_decode('B. DATOS DEL APODERADO O REPRESENTANTE LEGAL'),0,0,'C');
        $pdf->SetY(129);
        $pdf->SetX(17);
        $pdf->Cell(85,5,utf8_decode('Apellidos'),1,0,'C');
        $pdf->SetY(129);
        $pdf->SetX(102);
        $pdf->Cell(0,5,utf8_decode('Nombres'),1,0,'C');
        $pdf->SetY(134);
        $pdf->SetX(17);
        $pdf->Cell(85,5,utf8_decode(''.$propRes["apellido"].''),1,0,'C');
        $pdf->SetY(134);
        $pdf->SetX(102);
        $pdf->Cell(0,5,utf8_decode(''.$propRes["nombre"].''),1,0,'C');
        $pdf->SetY(139);
        $pdf->SetX(17);
        $pdf->Cell(16,5,utf8_decode('Cedula'),1,0,'C');
        $pdf->SetY(139);
        $pdf->SetX(33);
        $pdf->Cell(35,5,utf8_decode(''.$cedLetra.'-'.$cedNum.''),1,0,'C');
        $pdf->SetY(139);
        $pdf->SetX(68);
        $pdf->Cell(23,5,utf8_decode('Estado Civil'),1,0,'C');
        $pdf->SetY(139);
        $pdf->SetX(91);
        $pdf->Cell(30,5,utf8_decode(''.$propRes["estCivil"].''),1,0,'C');
        $pdf->SetY(139);
        $pdf->SetX(121);
        $pdf->Cell(33,5,utf8_decode('Ciudad de Residencia'),1,0,'C');
        $pdf->SetY(139);
        $pdf->SetX(154);
        $pdf->Cell(0,5,utf8_decode(''.$propRes["ciudadResid"].''),1,0,'C');
        $pdf->SetY(144);
        $pdf->SetX(17);
        $pdf->Cell(125,5,utf8_decode('Dirección de Residencia'),1,0,'C');
        $pdf->SetY(144);
        $pdf->SetX(142);
        $pdf->Cell(0,5,utf8_decode('Telefono'),1,0,'C');
        $pdf->SetY(149);
        $pdf->SetX(17);
        $pdf->Cell(125,5,utf8_decode(''.$propRes["direccion"].''),1,0,'C');
        $pdf->SetY(149);
        $pdf->SetX(142);
        $pdf->Cell(0,5,utf8_decode(''.$propRes["telef"].''),1,0,'C');
        $pdf->SetY(156);
        $pdf->SetX(17);
        $pdf->Cell(0,5,utf8_decode('C. DATOS DEL INMUEBLE'),0,0,'C');
        $pdf->SetY(161);
        $pdf->SetX(17);
        $pdf->Cell(120,5,utf8_decode('Propiedad'),1,0,'C');
        $pdf->SetY(161);
        $pdf->SetX(137);
        $pdf->Cell(0,5,utf8_decode(''.$datComerRes["tipProp"].''),1,0,'C');
        $pdf->SetY(166);
        $pdf->SetX(17);
        $pdf->Cell(30,22,utf8_decode('Firma del solicitante'),1,0,'C');
        $pdf->SetY(188);
        $pdf->SetX(17);
        $pdf->Cell(30,5,utf8_decode('Cedula'),1,0,'C');
        $pdf->SetY(166);
        $pdf->SetX(47);
        $pdf->Cell(30,22,utf8_decode(''),1,0,'C');
        $pdf->SetY(188);
        $pdf->SetX(47);
        $pdf->Cell(30,5,utf8_decode(''),1,0,'C');
        $pdf->SetY(166);
        $pdf->SetX(77);
        $pdf->Cell(40,22,utf8_decode(''),1,0,'C');
        $pdf->SetY(188);
        $pdf->SetX(77);
        $pdf->Cell(40,5,utf8_decode('Sello'),1,0,'C');
        $pdf->SetY(166);
        $pdf->SetX(117);
        $pdf->Cell(30,22,utf8_decode('Funcionario receptor'),1,0,'C');
        $pdf->SetY(188);
        $pdf->SetX(117);
        $pdf->Cell(30,5,utf8_decode('Fecha de Recepción'),1,0,'C');
        $pdf->SetY(166);
        $pdf->SetX(147);
        $pdf->Cell(0,22,utf8_decode(''.$usuRes["nombre"].' '.$usuRes["apellido"].''),1,0,'C');
        $pdf->SetY(188);
        $pdf->SetX(147);
        $pdf->Cell(0,5,utf8_decode(''),1,0,'C');

		$pdf->Output('F','../../assets/imprimir/55542.pdf');
        echo'
        <input type="text" id="rutaPdf" value="./assets/imprimir/55542.pdf" />
        <input type="hidden" id="numExp" value="55542">';
	}

	
}






?>