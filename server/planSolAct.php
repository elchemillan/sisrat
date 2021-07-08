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
                $link2 = "";
	}

	function primDat(){

                session_start();

                $expSQL = "SELECT * FROM comercio where noExpe=".$this->noExpediente."";
                $resExp = $link2->query($expSQL);
                $expRes = $resExp->fetch_array();

                $actSQL = "SELECT * FROM actEcon where id=".$expRes["fk_actEcon"]."";
                $resAct = $link2->query($actSQL);
                $actRes = $resAct->fetch_array();

                $datComerSQL = "SELECT * FROM datcomer where id=".$expRes["fk_datComer"]."";
                $resDatComer = $link2->query($datComerSQL);
                $datComerRes = $resDatComer->fetch_array();

                $divRif = explode("|",$datComerRes["rif"]);
                $rifLetra = $divRif[0];
                $rifNum = $divRif[1];

                $secSQL = "SELECT * FROM sector where id=".$expRes["fk_sector"]."";
                $resSec = $link2->query($secSQL);
                $secRes = $resSec->fetch_array();

                $propSQL = "SELECT * FROM propietario where id=".$expRes["fk_propietario"]."";
                $resProp = $link2->query($propSQL);
                $propRes = $resProp->fetch_array();

                $cedDiv = explode("|",$propRes["cedula"]);
                $cedLetra = $cedDiv[0];
                $cedNum = $cedDiv[1];

                $usuSQL = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
                $resUsu = $link2->query($usuSQL);
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
                $carpeta ='../../assets/imprimir/PAC/'.date("Y").'';
                if(!file_exists($carpeta)){
                        mkdir($carpeta,0777,true);
                        $pdfEcon->Output('F','../../assets/imprimir/PAC/'.date("Y").'/'.$this->noExpediente.'.pdf');
                }else{
                        $pdfEcon->Output('F','../../assets/imprimir/PAC/'.date("Y").'/'.$this->noExpediente.'.pdf');
                }
                echo'
                <input type="hidden" id="rutaPdf" value="./assets/imprimir/PAC/'.date("Y").'/'.$this->noExpediente.'.pdf" />
                <input type="hidden" id="numExp" value="'.$this->noExpediente.'.pdf">';
                }

	
}
class cotzAct{

        function contruc(){
                $minTrib = "";
                $aforo  = "";
                $plantElect = "";
                $petroBs = "";
                $montActEcon = "";
                $montCertBom = "";
                $montSolv = "";
                $montPubProp = "";
                $montRenovLicLic = "";
                $montAseo = "";
                $montUsoConf = "";
                $montCatast = "";
                $montTasaAdmin = "";
                $numExpAsoc = "";
        }
        function impCotz(){

                $cotSQL = "INSERT INTO cotizaciones(minTrib,aforo,petro,plantaElec,actEconMont,certBomMont,SolvMont,PublicPropMont,renovLicoMont,aseoMont,usoConMont,catastMont,tasaAdminMont,fechaCot)value(".$this->minTrib.",".$this->aforo.",".$this->petroBs.",'".$this->plantElect."',".$this->montActEcon.",".$this->montCertBom.",".$this->montSolv.",".$this->montPubProp.",".$this->montRenovLicLic.",".$this->montAseo.",".$this->montUsoConf.",".$this->montCatast.",".$this->montTasaAdmin.",'".date("Y-m-d")."')";
                $resCot = $link2->query($cotSQL);
                $cotizID = $link2->insert_id;

                //ACTUALIZAR DATO DE COTIZACION EN TABLA COMERCIO
                $comerSQL = "UPDATE comercio SET fk_cotizaciones=".$cotizID." where noExpe=".$this->numExpAsoc."";
                $link->query($comerSQL);

                //BUSQUEDA DE EXPEDIENTES
                $comerBusSQL = "SELECT * FROM comercio where noExpe=".$this->numExpAsoc."";
                $resComerBus = $link2->query($comerBusSQL);
                $comerBusRes = $resComerBus->fetch_array();

                $propieSQL = "SELECT * FROM propietario where id=".$comerBusRes["fk_propietario"]."";
                $resPropie = $link2->query($propieSQL);
                $propieRes = $resPropie->fetch_array();

                $datComerSQL = "SELECT * FROM datcomer where id=".$comerBusRes["fk_datComer"]."";
                $resDatComer = $link2->query($datComerSQL);
                $datComerRes = $resDatComer->fetch_array();

                $busCotizSQL = "SELECT * FROM cotizaciones where id=".$cotizID."";

                $resBusCotiz = $link2->query($busCotizSQL);
                $busCotizRes = $resBusCotiz->fetch_array();

                $sectSQL = "SELECT * FROM actEcon where id=".$comerBusRes["fk_actEcon"]."";
                $busSect = $link2->query($sectSQL);
                $sectBus = $busSect->fetch_array();

                $busCatgoSQL = "SELECT * FROM grupo where id=".$sectBus["fk_grupo"]."";
                $resBusCatgo = $link2->query($busCatgoSQL);
                $busCatgoRes = $resBusCatgo->fetch_array();

                $busRubSQL = "SELECT * FROM subgrupo where id=".$sectBus["fk_subGrup"]."";
                $resBusRub = $link2->query($busRubSQL);
                $busRubRes = $resBusRub->fetch_array();

                $divRif = explode("|",$datComerRes["rif"]);
                $rifLetra = $divRif[0];
                $rifNum = $divRif[1];

                $divCed = explode("|",$propieRes["cedula"]);
                $cedLetra = $divCed[0];
                $cedNum = $divCed[1];

                $pdf = new PDF1('P','mm','letter');
                $pdf->SetMargins(20,0,22);
                $pdf->AliasNbPages();
                $pdf->AddPage();
                $pdf->SetAlpha(1);
                $pdf->SetY(60);
                $pdf->SetX(55);
                $pdf->Cell(0,7,utf8_decode('COTIZACIÓN DE PAGO'),1,0,'C');
                $pdf->SetY(60);
                $pdf->SetX(17);
                $pdf->Cell(38,7,utf8_decode(''.date("d-m-Y").''),1,0,'C');
                $pdf->SetY(67);
                $pdf->SetX(17);
                $pdf->Cell(10,7,utf8_decode('RIF'),1,0,'C');
                $pdf->SetY(67);
                $pdf->SetX(27);
                $pdf->Cell(28,7,utf8_decode(''.$rifLetra.'-'.$rifNum.''),1,0,'C');
                $pdf->SetY(67);
                $pdf->SetX(55);
                $pdf->Cell(28,7,utf8_decode('Razon Social'),1,0,'C');
                $pdf->SetY(67);
                $pdf->SetX(83);
                $pdf->Cell(0,7,utf8_decode(''.$comerBusRes["nombre"].''),1,0,'C');
                $pdf->SetY(74);
                $pdf->SetX(17);
                $pdf->Cell(15,7,utf8_decode('Licencia'),1,0,'C');
                $pdf->SetY(74);
                $pdf->SetX(32);
                $pdf->Cell(23,7,utf8_decode('Renovación'),1,0,'C');
                $pdf->SetY(74);
                $pdf->SetX(55);
                $pdf->Cell(21,7,utf8_decode('Local'),1,0,'C');
                $pdf->SetY(74);
                $pdf->SetX(76);
                $pdf->Cell(22,7,utf8_decode(''.$datComerRes["tipProp"].''),1,0,'C');
                $pdf->SetY(74);
                $pdf->SetX(98);
                $pdf->Cell(22,7,utf8_decode('Dirección'),1,0,'C');
                $pdf->SetY(74);
                $pdf->SetX(98);
                $pdf->Cell(0,7,utf8_decode(''.$datComerRes["direccion"].''),1,0,'C');
                $pdf->SetY(81);
                $pdf->SetX(17);
                $pdf->Cell(32,7,utf8_decode('Representante Legal'),1,0,'C');
                $pdf->SetY(81);
                $pdf->SetX(49);
                $pdf->Cell(85,7,utf8_decode(''.$propieRes["nombre"].' '.$propieRes["apellido"].''),1,0,'C');
                $pdf->SetY(81);
                $pdf->SetX(134);
                $pdf->Cell(15,7,utf8_decode('Cedula'),1,0,'C');
                $pdf->SetY(81);
                $pdf->SetX(149);
                $pdf->Cell(0,7,utf8_decode(''.$cedLetra.'-'.$cedNum.''),1,0,'C');
                $pdf->SetY(88);
                $pdf->SetX(17);
                $pdf->Cell(25,7,utf8_decode('Telefono'),1,0,'C');
                $pdf->SetY(88);
                $pdf->SetX(42);
                $pdf->Cell(75,7,utf8_decode(''.$datComerRes["telef"].''),1,0,'C');
                $pdf->SetY(88);
                $pdf->SetX(117);
                $pdf->Cell(35,7,utf8_decode('Planta Electrica'),1,0,'C');
                $pdf->SetY(88);
                $pdf->SetX(152);
                $pdf->Cell(0,7,utf8_decode(''.$busCotizRes["plantaElec"].''),1,0,'C');
                $pdf->SetY(95);
                $pdf->SetX(17);
                $pdf->Cell(20,7,utf8_decode('Categoria'),1,0,'C');
                $pdf->SetY(95);
                $pdf->SetX(37);
                $pdf->Cell(50,7,utf8_decode(''.$busCatgoRes["nombre"].''),1,0,'C');
                $pdf->SetY(95);
                $pdf->SetX(87);
                $pdf->Cell(30,7,utf8_decode('Rubro'),1,0,'C');
                $pdf->SetY(95);
                $pdf->SetX(117);
                $pdf->Cell(0,7,utf8_decode(''.$busRubRes["nombre"].''),1,0,'C');
                $pdf->SetY(102);
                $pdf->SetX(17);
                $pdf->Cell(25,7,utf8_decode('Min Tributaria'),1,0,'C');
                $pdf->SetY(102);
                $pdf->SetX(42);
                $pdf->Cell(15,7,utf8_decode(''.$busCotizRes["minTrib"].''),1,0,'C');
                $pdf->SetY(102);
                $pdf->SetX(57);
                $pdf->Cell(25,7,utf8_decode('Aforo'),1,0,'C');
                $pdf->SetY(102);
                $pdf->SetX(82);
                $pdf->Cell(25,7,utf8_decode(''.$busCotizRes["aforo"].''),1,0,'C');
                $pdf->SetY(102);
                $pdf->SetX(107);
                $pdf->Cell(25,7,utf8_decode('Petro Bs'),1,0,'C');
                $pdf->SetY(102);
                $pdf->SetX(132);
                $pdf->Cell(0,7,utf8_decode(''.$busCotizRes["petro"].' Bs.'),1,0,'C');
                $pdf->SetY(109);
                $pdf->SetX(17);
                $pdf->Cell(50,7,utf8_decode('Principal Actividad Económica'),1,0,'C');
                $pdf->SetY(109);
                $pdf->SetX(67);
                $pdf->Cell(0,7,utf8_decode(''.$sectBus["nombre"].''),1,0,'C');
                $pdf->SetY(116);
                $pdf->SetX(17);
                $pdf->Cell(50,7,utf8_decode('Impuestos y Tasas'),1,0,'C');
                $pdf->SetY(116);
                $pdf->SetX(67);
                $pdf->Cell(20,7,utf8_decode('Petro'),1,0,'C');
                $pdf->SetY(116);
                $pdf->SetX(87);
                $pdf->Cell(40,7,utf8_decode('Monto'),1,0,'C');
                $pdf->SetY(116);
                $pdf->SetX(127);
                $pdf->Cell(25,7,utf8_decode('Descuentos'),1,0,'C');
                $pdf->SetY(116);
                $pdf->SetX(152);
                $pdf->Cell(0,7,utf8_decode('Total'),1,0,'C');
                $pdf->SetY(123);
                $pdf->SetX(17);
                $pdf->Cell(50,7,utf8_decode('ACTIVIDAD ECONÓMICA'),1,0,'C');
                $pdf->SetY(123);
                $pdf->SetX(67);
                $pdf->Cell(20,7,utf8_decode(''.round($busCotizRes["actEconMont"]/$busCotizRes["petro"],2).''),1,0,'C'); //Petro
                $pdf->SetY(123);
                $pdf->SetX(87);
                $pdf->Cell(40,7,utf8_decode(''.$busCotizRes["actEconMont"].''),1,0,'C'); //Monto
                $pdf->SetY(123);
                $pdf->SetX(127);
                $pdf->Cell(25,7,utf8_decode('0'),1,0,'C'); //Monto //Descuentos
                $pdf->SetY(123);
                $pdf->SetX(152);
                $pdf->Cell(0,7,utf8_decode(''.$busCotizRes["actEconMont"].''),1,0,'C'); //Total
                $pdf->SetY(130);
                $pdf->SetX(17);
                $pdf->Cell(50,7,utf8_decode('CERTIFICADO BOMBERIL'),1,0,'C');
                $pdf->SetY(130);
                $pdf->SetX(67);
                $pdf->Cell(20,7,utf8_decode(''.round($busCotizRes["certBomMont"]/$busCotizRes["petro"],2).''),1,0,'C'); //Petro
                $pdf->SetY(130);
                $pdf->SetX(87);
                $pdf->Cell(40,7,utf8_decode(''.$busCotizRes["certBomMont"].''),1,0,'C'); //Monto
                $pdf->SetY(130);
                $pdf->SetX(127);
                $pdf->Cell(25,7,utf8_decode('0'),1,0,'C'); //Descuentos
                $pdf->SetY(130);
                $pdf->SetX(152);
                $pdf->Cell(0,7,utf8_decode(''.$busCotizRes["certBomMont"].''),1,0,'C'); //Total
                $pdf->SetY(137);
                $pdf->SetX(17);
                $pdf->Cell(50,7,utf8_decode('SOLVENCIA'),1,0,'C');
                $pdf->SetY(137);
                $pdf->SetX(67);
                $pdf->Cell(20,7,utf8_decode(''.round($busCotizRes["SolvMont"]/$busCotizRes["petro"],2).''),1,0,'C'); //Petro
                $pdf->SetY(137);
                $pdf->SetX(87);
                $pdf->Cell(40,7,utf8_decode(''.$busCotizRes["SolvMont"].''),1,0,'C'); //Monto
                $pdf->SetY(137);
                $pdf->SetX(127);
                $pdf->Cell(25,7,utf8_decode('0'),1,0,'C'); //Descuentos
                $pdf->SetY(137);
                $pdf->SetX(152);
                $pdf->Cell(0,7,utf8_decode(''.$busCotizRes["SolvMont"].''),1,0,'C'); //Total
                $pdf->SetY(144);
                $pdf->SetX(17);
                $pdf->Cell(50,7,utf8_decode('PUBLICIDAD Y PROPAGANDA'),1,0,'C');
                $pdf->SetY(144);
                $pdf->SetX(67);
                $pdf->Cell(20,7,utf8_decode(''.round($busCotizRes["PublicPropMont"]/$busCotizRes["petro"],2).''),1,0,'C'); //Petro
                $pdf->SetY(144);
                $pdf->SetX(87);
                $pdf->Cell(40,7,utf8_decode(''.$busCotizRes["PublicPropMont"].''),1,0,'C'); //Monto
                $pdf->SetY(144);
                $pdf->SetX(127);
                $pdf->Cell(25,7,utf8_decode('0'),1,0,'C'); //Descuentos
                $pdf->SetY(144);
                $pdf->SetX(152);
                $pdf->Cell(0,7,utf8_decode(''.$busCotizRes["PublicPropMont"].''),1,0,'C'); //Total
                $pdf->SetY(151);
                $pdf->SetX(17);
                $pdf->Cell(50,7,utf8_decode('RENOV. DE LIC. DE LICORES'),1,0,'C');
                $pdf->SetY(151);
                $pdf->SetX(67);
                $pdf->Cell(20,7,utf8_decode(''.round($busCotizRes["renovLicoMont"]/$busCotizRes["petro"],2).''),1,0,'C'); //Petro
                $pdf->SetY(151);
                $pdf->SetX(87);
                $pdf->Cell(40,7,utf8_decode(''.$busCotizRes["renovLicoMont"].''),1,0,'C'); //Monto
                $pdf->SetY(151);
                $pdf->SetX(127);
                $pdf->Cell(25,7,utf8_decode('0'),1,0,'C'); //Descuentos
                $pdf->SetY(151);
                $pdf->SetX(152);
                $pdf->Cell(0,7,utf8_decode(''.$busCotizRes["renovLicoMont"].''),1,0,'C'); //Total
                $pdf->SetY(158);
                $pdf->SetX(17);
                $pdf->Cell(50,7,utf8_decode('ASEO URBANO'),1,0,'C');
                $pdf->SetY(158);
                $pdf->SetX(67);
                $pdf->Cell(20,7,utf8_decode(''.round($busCotizRes["aseoMont"]/$busCotizRes["petro"],2).''),1,0,'C'); //Petro
                $pdf->SetY(158);
                $pdf->SetX(87);
                $pdf->Cell(40,7,utf8_decode(''.$busCotizRes["aseoMont"].''),1,0,'C'); //Monto
                $pdf->SetY(158);
                $pdf->SetX(127);
                $pdf->Cell(25,7,utf8_decode('0'),1,0,'C'); //Descuentos
                $pdf->SetY(158);
                $pdf->SetX(152);
                $pdf->Cell(0,7,utf8_decode(''.$busCotizRes["aseoMont"].''),1,0,'C'); //Total
                $pdf->SetY(165);
                $pdf->SetX(17);
                $pdf->Cell(50,7,utf8_decode('USO CONFORME'),1,0,'C');
                $pdf->SetY(165);
                $pdf->SetX(67);
                $pdf->Cell(20,7,utf8_decode(''.round($busCotizRes["usoConMont"]/$busCotizRes["petro"],2).''),1,0,'C'); //Petro
                $pdf->SetY(165);
                $pdf->SetX(87);
                $pdf->Cell(40,7,utf8_decode(''.$busCotizRes["usoConMont"].''),1,0,'C'); //Monto
                $pdf->SetY(165);
                $pdf->SetX(127);
                $pdf->Cell(25,7,utf8_decode('0'),1,0,'C'); //Descuentos
                $pdf->SetY(165);
                $pdf->SetX(152);
                $pdf->Cell(0,7,utf8_decode(''.$busCotizRes["usoConMont"].''),1,0,'C'); //Total
                $pdf->SetY(172);
                $pdf->SetX(17);
                $pdf->Cell(80,7,utf8_decode('TOTAL A PAGAR SIN CATASTRO'),1,0,'C'); //Total a pagar
                $pdf->SetY(172);
                $pdf->SetX(97);

                $montTotalSCast = $busCotizRes["usoConMont"]+$busCotizRes["aseoMont"]+$busCotizRes["renovLicoMont"]+$busCotizRes["PublicPropMont"]+$busCotizRes["SolvMont"]+$busCotizRes["certBomMont"]+$busCotizRes["actEconMont"];
                $pdf->Cell(0,7,utf8_decode(''.$montTotalSCast.''),1,0,'C'); //Total a pagar
                $pdf->SetY(179);
                $pdf->SetX(17);
                $pdf->Cell(80,7,utf8_decode('TASA ADMINISTRATIVA SEGÚN ART. 08 L.A.E.'),1,0,'C');
                $pdf->SetY(179);
                $pdf->SetX(97);
                $pdf->Cell(0,7,utf8_decode(''.$busCotizRes["tasaAdminMont"].''),1,0,'C');
                $pdf->SetY(186);
                $pdf->SetX(17);
                $pdf->Cell(80,7,utf8_decode('PAGO DEFINITIVO'),1,0,'C');
                $pdf->SetY(186);
                $pdf->SetX(97);
                $pdf->Cell(0,7,utf8_decode(''.$busCotizRes["tasaAdminMont"]+$montTotalSCast.''),1,0,'C');
                $pdf->SetY(193);
                $pdf->SetX(17);
                $pdf->Cell(80,7,utf8_decode('TOTAL EN PETRO'),1,0,'C');
                $pdf->SetY(193);
                $pdf->SetX(97);
                $pdf->Cell(0,7,utf8_decode(''.round(($busCotizRes["tasaAdminMont"]+$montTotalSCast)/$busCotizRes["petro"],2).''),1,0,'C');

                $carpeta ='../../assets/imprimir/COTZ/'.date("Y").'';
                if(!file_exists($carpeta)){
                        mkdir($carpeta,0777,true);
                        $pdfEcon->Output('F','../../assets/imprimir/COTZ/'.date("Y").'/'.$this->numExpAsoc.'.pdf');
                }else{
                        $pdfEcon->Output('F','../../assets/imprimir/COTZ/'.date("Y").'/'.$this->numExpAsoc.'.pdf');
                }
                echo'
                <input type="text" id="rutaPdf" value="./assets/imprimir/COTZ/'.date("Y").'/'.$this->numExpAsoc.'.pdf" />
                <input type="hidden" id="numExp" value="'.$this->numExpAsoc.'.pdf">';
        }
}

class Liquidacion{

        function construc(){
                $ingreBrut = "";
                $ingreOtro = "";
                $totalIngre = "";
                $procentOrdenan = "";
                $minTribAnu = "";
                $expAsoc = "";
                $link2= "";
                $liquid = "";
        }


        function impriLiquid(){

                if($this->liquid == 0){

                        $liquidSQL = "INSERT INTO liquidaciones(ingreBrutos,otroIngre,totalIngre,porcenOrden,minTrib)value(".$this->ingreBrut.",".$this->ingreOtro.",".$this->totalIngre.",".$this->procentOrdenan.",".$this->minTribAnu.") ";
                        $resLiquid = $this->link2->query($liquidSQL);
                        $idLiquid = $this->link2->insert_id;

                        $comerSQL = "UPDATE comercio SET fk_liquid=".$idLiquid." where noExpe=".$this->expAsoc."";
                        $this->link2->query($comerSQL);

                        $busComerSQL = "SELECT * FROM comercio where noExpe=".$this->expAsoc."";
                        $resBusComer = $this->link2->query($busComerSQL);
                        $busComerRes = $resBusComer->fetch_array();

                        $busSectSQL = "SELECT * FROM sector where id=".$busComerRes["fk_sector"]."";
                        $resBusSect = $this->link2->query($busSectSQL);
                        $busSectRes = $resBusSect->fetch_array();

                        $busActEcon = "SELECT * FROM actEcon where id=".$busComerRes["fk_actEcon"]."";
                        $resActEcon = $this->link2->query($busActEcon);
                        $actEconRes = $resActEcon->fetch_array();

                        $busDatComer = "SELECT * FROM datcomer where id=".$busComerRes["fk_datComer"]."";
                        $resDatComer = $this->link2->query($busDatComer);
                        $datComerRes = $resDatComer->fetch_array();

                        $propSQL = "SELECT * FROM propietario where id=".$busComerRes["fk_propietario"]."";
                        $resProp = $this->link2->query($propSQL);
                        $propRes = $resProp->fetch_array();

                        $divRif = explode("|",$datComerRes["rif"]);
                        $rifLetra = $divRif[0];
                        $rifNum = $divRif[1];

                        $liquiSQL = "SELECT * FROM liquidaciones where id=".$busComerRes["fk_liquid"]."";
                        $resLiqui = $this->link->query($liquiSQL);
                        $liquiRes = $resLiqui->fetch_array();
                }       

                if($this->liquid != 0){
                        $busComerSQL = "SELECT * FROM comercio where noExpe=".$this->expAsoc."";
                        $resBusComer = $this->link2->query($busComerSQL);
                        $busComerRes = $resBusComer->fetch_array();

                        $busSectSQL = "SELECT * FROM sector where id=".$busComerRes["fk_sector"]."";
                        $resBusSect = $this->link2->query($busSectSQL);
                        $busSectRes = $resBusSect->fetch_array();

                        $busActEcon = "SELECT * FROM actEcon where id=".$busComerRes["fk_actEcon"]."";
                        $resActEcon = $this->link2->query($busActEcon);
                        $actEconRes = $resActEcon->fetch_array();

                        $busDatComer = "SELECT * FROM datcomer where id=".$busComerRes["fk_datComer"]."";
                        $resDatComer = $this->link2->query($busDatComer);
                        $datComerRes = $resDatComer->fetch_array();

                        $propSQL = "SELECT * FROM propietario where id=".$busComerRes["fk_propietario"]."";
                        $resProp = $this->link2->query($propSQL);
                        $propRes = $resProp->fetch_array();

                        $divRif = explode("|",$datComerRes["rif"]);
                        $rifLetra = $divRif[0];
                        $rifNum = $divRif[1];

                        $liquiSQL = "SELECT * FROM liquidaciones where id=".$busComerRes["fk_liquid"]."";
                        $resLiqui = $this->link2->query($liquiSQL);
                        $liquiRes = $resLiqui->fetch_array();
                }

                $pdf = new PDF1('P','mm','A4');
                $pdf->SetMargins(20,0,22);
                $pdf->AliasNbPages();
                $pdf->AddPage();

                $pdf->SetY(40);
                $pdf->SetX(105);
                $pdf->Cell(50,7,utf8_decode('COD. CONTRIBUYENTE'),1,0,'C');
                $pdf->SetY(40);
                $pdf->SetX(155);
                $pdf->Cell(0,7,utf8_decode(''),1,0,'C');
                $pdf->SetY(47);
                $pdf->SetX(105);
                $pdf->Cell(50,7,utf8_decode('Casificador de Act. Economica'),1,0,'C');
                $pdf->SetY(47);
                $pdf->SetX(155);
                $pdf->Cell(0,7,utf8_decode(''),1,0,'C');
                $pdf->SetY(58);
                $pdf->SetX(17);
                $pdf->Cell(0,7,utf8_decode('A. DATOS DEL CONTRIBUYENTE'),1,0,'C');
                $pdf->SetY(65);
                $pdf->SetX(17);
                $pdf->Cell(30,7,utf8_decode('DEFINITIVA'),1,0,'C');
                $pdf->SetY(65);
                $pdf->SetX(47);
                $pdf->Cell(20,7,utf8_decode('Fecha:'),1,0,'C');
                $pdf->SetY(65);
                $pdf->SetX(67);
                $pdf->Cell(20,7,utf8_decode(''.date("d-m-Y").''),1,0,'C');
                $pdf->SetY(65);
                $pdf->SetX(147);
                $pdf->Cell(0,7,utf8_decode('Fecha Gravable'),1,0,'C');
                $pdf->SetY(72);
                $pdf->SetX(17);
                $pdf->Cell(130,7,utf8_decode('RAZON SOCIAL O NOMBRE'),1,0,'C');
                $pdf->SetY(79);
                $pdf->SetX(17);
                $pdf->Cell(130,7,utf8_decode(''.$busComerRes["nombre"].''),1,0,'C');
                $pdf->SetY(72);
                $pdf->SetX(147);
                $pdf->Cell(24,7,utf8_decode('DESDE'),1,0,'C');
                $pdf->SetY(79);
                $pdf->SetX(147);
                $pdf->Cell(24,7,utf8_decode('01/01/'.date("Y").''),1,0,'C');
                $pdf->SetY(72);
                $pdf->SetX(171);
                $pdf->Cell(0,7,utf8_decode('HASTA'),1,0,'C');
                $pdf->SetY(79);
                $pdf->SetX(171);
                $pdf->Cell(0,7,utf8_decode('31/12/'.date("Y").''),1,0,'C');
                $pdf->SetY(86);
                $pdf->SetX(17);
                $pdf->Cell(130,7,utf8_decode('DESCRIPCIÓN DE LA PRINCIPAL ACT. ECONÓMICA'),1,0,'C');
                $pdf->SetY(93);
                $pdf->SetX(17);
                $pdf->Cell(130,7,utf8_decode(''.$actEconRes["nombre"].''),1,0,'C');
                $pdf->SetY(86);
                $pdf->SetX(147);
                $pdf->Cell(24,7,utf8_decode(''.$busSectRes["nombre"].''),1,0,'C');
                $pdf->SetY(86);
                $pdf->SetX(171);
                $pdf->Cell(0,7,utf8_decode(''.$busSectRes["codSect"].''),1,0,'C');
                $pdf->SetY(100);
                $pdf->SetX(17);
                $pdf->Cell(60,7,utf8_decode('Registro de Informacion Fiscal(RIF)'),1,0,'C');
                $pdf->SetY(100);
                $pdf->SetX(77);
                $pdf->Cell(60,7,utf8_decode('Cambio de Domicilio'),1,0,'C');
                $pdf->SetY(100);
                $pdf->SetX(137);
                $pdf->Cell(0,7,utf8_decode('Nº de Identificación Fiscal'),1,0,'C');
                $pdf->SetY(107);
                $pdf->SetX(17);
                $pdf->Cell(10,7,utf8_decode(''.$rifLetra.''),1,0,'C');
                $pdf->SetY(107);
                $pdf->SetX(27);
                $pdf->Cell(50,7,utf8_decode(''.$rifNum.''),1,0,'C');
                $pdf->SetY(107);
                $pdf->SetX(77);
                $pdf->Cell(15,7,utf8_decode('SI'.$datComerRes["cambDomi"].''),1,0,'C');
                $pdf->SetY(107);
                $pdf->SetX(92);
                if($datComerRes["cambDomi"]=="Si"){
                        $pdf->Cell(15,7,utf8_decode('X'),1,0,'C');
                }else{
                        $pdf->Cell(15,7,utf8_decode(''),1,0,'C');
                }
                
                $pdf->SetY(107);
                $pdf->SetX(107);
                $pdf->Cell(15,7,utf8_decode('NO'),1,0,'C');
                $pdf->SetY(107);
                $pdf->SetX(122);
                if($datComerRes["cambDomi"]=="No"){
                        $pdf->Cell(15,7,utf8_decode('X'),1,0,'C');
                }else{
                        $pdf->Cell(15,7,utf8_decode(''),1,0,'C');
                }
                $pdf->SetY(107);
                $pdf->SetX(137);
                $pdf->Cell(10,7,utf8_decode(''),1,0,'C');
                $pdf->SetY(107);
                $pdf->SetX(147);
                $pdf->Cell(0,7,utf8_decode(''),1,0,'C');
                $pdf->SetY(114);
                $pdf->SetX(17);
                $pdf->Cell(30,7,utf8_decode('Capital Pagado'),1,0,'C');
                $pdf->SetY(114);
                $pdf->SetX(47);
                $pdf->Cell(30,7,utf8_decode(''.$datComerRes["capPag"].''),1,0,'C');
                $pdf->SetY(114);
                $pdf->SetX(77);
                $pdf->Cell(30,7,utf8_decode('Capital Suscrito'),1,0,'C');
                $pdf->SetY(114);
                $pdf->SetX(107);
                $pdf->Cell(30,7,utf8_decode(''.$datComerRes["capSusc"].''),1,0,'C');
                $pdf->SetY(114);
                $pdf->SetX(137);
                $pdf->Cell(30,7,utf8_decode('Nº Telefono'),1,0,'C');
                $pdf->SetY(114);
                $pdf->SetX(167);
                $pdf->Cell(0,7,utf8_decode(''.$datComerRes["telef"].''),1,0,'C');
                $pdf->SetY(121);
                $pdf->SetX(17);
                $pdf->Cell(0,7,utf8_decode('ORGANIZACIÓN ECONÓMICA DEL CONTRIBUYENTE'),1,0,'C');
                $pdf->SetY(128);
                $pdf->SetX(17);
                $pdf->Cell(40,7,utf8_decode('Establecimiento Unico'),1,0,'C');
                $pdf->SetY(128);
                $pdf->SetX(57);
                if($datComerRes["tipProp"]=="Único"){
                        $pdf->Cell(15,7,utf8_decode('X'),1,0,'C');
                }else{
                        $pdf->Cell(15,7,utf8_decode(''),1,0,'C');
                }
                $pdf->SetY(128);
                $pdf->SetX(72);
                $pdf->Cell(30,7,utf8_decode('Casa Matriz'),1,0,'C');
                $pdf->SetY(128);
                $pdf->SetX(102);
                if($datComerRes["tipProp"]=="Casa Matriz"){
                        $pdf->Cell(15,7,utf8_decode('X'),1,0,'C');
                }else{
                        $pdf->Cell(15,7,utf8_decode(''),1,0,'C');
                }
                $pdf->SetY(128);
                $pdf->SetX(117);
                $pdf->Cell(30,7,utf8_decode('Sucursal'),1,0,'C');
                $pdf->SetY(128);
                $pdf->SetX(147);
                if($datComerRes["tipProp"]=="Sucursal"){
                        $pdf->Cell(15,7,utf8_decode('X'),1,0,'C');
                }else{
                        $pdf->Cell(15,7,utf8_decode(''),1,0,'C');
                }
                $pdf->SetY(128);
                $pdf->SetX(162);
                $pdf->Cell(20,7,utf8_decode('Agencia'),1,0,'C');
                $pdf->SetY(128);
                $pdf->SetX(182);
                if($datComerRes["tipProp"]=="Agencia"){
                        $pdf->Cell(0,7,utf8_decode('X'),1,0,'C'); 
                }else{
                        $pdf->Cell(0,7,utf8_decode(''),1,0,'C'); 
                }
                $pdf->SetY(135);
                $pdf->SetX(17);
                $pdf->Cell(0,7,utf8_decode('B. DATOS DEL APODERADO O REPRESENTANTE LEGAL'),1,0,'C');
                $pdf->SetY(142);
                $pdf->SetX(17);
                $pdf->Cell(40,7,utf8_decode('Nombre y Apellido'),1,0,'C');
                $pdf->SetY(142);
                $pdf->SetX(57);
                $pdf->Cell(0,7,utf8_decode(''.$propRes["nombre"].' '.$propRes["apellido"].''),1,0,'C');
                $pdf->SetY(149);
                $pdf->SetX(17);
                $pdf->Cell(25,12,utf8_decode('Cedula'),1,0,'C');
                $pdf->SetY(149);
                $pdf->SetX(42);
                $divCedula = explode("|",$propRes["cedula"]);
                $cedNum = $divCedula[1];
                $cedLetra = $divCedula[0];
                $pdf->Cell(35,12,utf8_decode(''.$cedLetra.'-'.$cedNum.''),1,0,'C');
                $pdf->SetY(149);
                $pdf->SetX(77);
                $pdf->Cell(40,6,utf8_decode('Estado Civil'),1,0,'C');
                $pdf->SetY(155);
                $pdf->SetX(77);
                $pdf->Cell(40,6,utf8_decode(''.$propRes["estCivil"].''),1,0,'C');
                $pdf->SetY(149);
                $pdf->SetX(117);
                $pdf->Cell(40,6,utf8_decode('Ciudad de Residencia'),1,0,'C');
                $pdf->SetY(155);
                $pdf->SetX(117);
                $pdf->Cell(40,6,utf8_decode(''.$propRes["ciudadResid"].''),1,0,'C');
                $pdf->SetY(149);
                $pdf->SetX(157);
                $pdf->Cell(0,6,utf8_decode('Telefono'),1,0,'C');
                $pdf->SetY(155);
                $pdf->SetX(157);
                $pdf->Cell(0,6,utf8_decode(''.$propRes["telef"].''),1,0,'C');
                $pdf->SetY(161);
                $pdf->SetX(17);
                $pdf->Cell(20,7,utf8_decode('Dirección'),1,0,'C');
                $pdf->SetY(161);
                $pdf->SetX(37);
                $pdf->Cell(0,7,utf8_decode(''.$propRes["direccion"].''),1,0,'C');
                $pdf->SetY(168);
                $pdf->SetX(17);
                $pdf->Cell(0,7,utf8_decode('C. AUTOLIQUIDACIÓN DE IMPUESTO MUNICIPAL'),1,0,'C');
                $pdf->SetY(175);
                $pdf->SetX(17);
                $pdf->Cell(80,5,utf8_decode('Concepto'),1,0,'C');
                $pdf->SetY(175);
                $pdf->SetX(97);
                $pdf->Cell(50,5,utf8_decode('Ingresos'),1,0,'C');
                $pdf->SetY(175);
                $pdf->SetX(147);
                $pdf->Cell(0,5,utf8_decode('Egresos'),1,0,'C');
                $pdf->SetY(180);
                $pdf->SetX(17);
                $pdf->Cell(80,5,utf8_decode('INGRESOS BRUTOS'),1,0,'L');
                $pdf->SetY(180);
                $pdf->SetX(97);
                $pdf->Cell(50,5,utf8_decode(''.$liquiRes["ingreBrutos"].''),1,0,'C');
                $pdf->SetY(180);
                $pdf->SetX(147);
                $pdf->Cell(0,5,utf8_decode(''),1,0,'C');
                $pdf->SetY(185);
                $pdf->SetX(17);
                $pdf->Cell(80,5,utf8_decode('OTROS INGRESOS'),1,0,'L');
                $pdf->SetY(185);
                $pdf->SetX(97);
                $pdf->Cell(50,5,utf8_decode(''.$liquiRes["otroIngre"].''),1,0,'C');
                $pdf->SetY(185);
                $pdf->SetX(147);
                $pdf->Cell(0,5,utf8_decode(''),1,0,'C');
                $pdf->SetY(190);
                $pdf->SetX(17);
                $pdf->Cell(80,5,utf8_decode('TOTAL INGRESOS'),1,0,'L');
                $pdf->SetY(190);
                $pdf->SetX(97);
                $pdf->Cell(50,5,utf8_decode(''.$liquiRes["totalIngre"].''),1,0,'C');
                $pdf->SetY(190);
                $pdf->SetX(147);
                $pdf->Cell(0,5,utf8_decode(''),1,0,'C');
                $pdf->SetY(195);
                $pdf->SetX(17);
                $pdf->Cell(80,5,utf8_decode('TOTAL BASE IMPONIBLE'),1,0,'L');
                $pdf->SetY(195);
                $pdf->SetX(97);
                $totalIngre = $liquiRes["totalIngre"]+$liquiRes["otroIngre"]+$liquiRes["ingreBrutos"];
                $pdf->Cell(50,5,utf8_decode(''.$totalIngre.''),1,0,'C');
                $pdf->SetY(195);
                $pdf->SetX(147);
                $pdf->Cell(0,5,utf8_decode('asdasd'),1,0,'C');
                $pdf->SetY(200);
                $pdf->SetX(17);
                $pdf->Cell(130,5,utf8_decode('PORCENT. APLICAR DE CONFORMIDAD CON LA ORDENANZA'),1,0,'C');
                $pdf->SetY(200);
                $pdf->SetX(147);
                $pdf->Cell(0,5,utf8_decode(''.$liquiRes["porcenOrden"].''),1,0,'C');
                $pdf->SetY(205);
                $pdf->SetX(17);
                $pdf->Cell(130,5,utf8_decode('TOTAL IMPUESTO'),1,0,'C');
                $pdf->SetY(205);
                $pdf->SetX(147);
                $totalInpuest = $liquiRes["porcenOrden"]*$totalIngre;
                $pdf->Cell(0,5,utf8_decode(''.$totalInpuest.''),1,0,'C');
                $pdf->SetY(210);
                $pdf->SetX(17);
                $pdf->Cell(130,5,utf8_decode('MINIMO TRIBUTABLE ANUAL'),1,0,'C');
                $pdf->SetY(210);
                $pdf->SetX(147);
                $pdf->Cell(0,5,utf8_decode(''.$liquiRes["minTrib"].''),1,0,'C');
                $pdf->SetY(215);
                $pdf->SetX(17);
                $pdf->Cell(130,5,utf8_decode('TOTAL DE IMPUESTO MUNICIPAL'),1,0,'C');
                $pdf->SetY(215);
                $pdf->SetX(147);
                $pdf->Cell(0,5,utf8_decode(''.$totalInpuest.''),1,0,'C');
                $pdf->SetY(220);
                $pdf->SetX(17);
                $pdf->Cell(130,5,utf8_decode('TOTAL DE IMPUESTO MUNICIPAL + L.A.E '),1,0,'C');
                $pdf->SetY(220);
                $pdf->SetX(147);
                $pdf->Cell(0,5,utf8_decode(''.$totalInpuest.''),1,0,'C');
                $pdf->SetY(225);
                $pdf->SetX(17);
                $pdf->SetFont('Times','',7);
                $pdf->MultiCell(72,3,utf8_decode('Yo '.$propRes["nombre"].' '.$propRes["apellido"].', Declaro que los datos y cifras que aparecen en la presente declaración son una copia fiel y exacta de los datos contenidos en los libros de contabilidad y que han sido llevados de acuerdo a los principios de contabilidad generalmente aceptados,de acuerdo  a las disposiciones legales.'),1,'L');
                $pdf->SetY(255);
                $pdf->SetX(17);
                $pdf->SetFont('Times','B',9);
                $pdf->Cell(42,5,utf8_decode('Firma del Representante legal'),1,0,'C');
                $pdf->SetY(240);
                $pdf->SetX(17);
                $pdf->Cell(42,20,utf8_decode(''),1,0,'C');
                $pdf->SetY(240);
                $pdf->SetX(59);
                $pdf->Cell(30,20,utf8_decode(''),1,0,'C');
                $pdf->SetY(255);
                $pdf->SetX(59);
                $pdf->SetFont('Times','B',9);
                $pdf->Cell(30,5,utf8_decode('Cedula'),1,0,'C');
                $pdf->SetY(225);
                $pdf->SetX(89);
                $pdf->Cell(58,30,utf8_decode(''),1,0,'C');
                $pdf->SetY(255);
                $pdf->SetX(89);
                $pdf->SetFont('Times','B',8);
                $pdf->Cell(58,5,utf8_decode('FUNCIONARIO RECEPTOR Y SELLO '),1,0,'C');
                $pdf->SetY(225);
                $pdf->SetX(147);
                $pdf->SetFont('Times','B',9);
                $pdf->Cell(0,15,utf8_decode(''),1,0,'C');
                $pdf->SetY(240);
                $pdf->SetX(147);
                $pdf->Cell(20,8,utf8_decode('Nro. C.P.C.'),1,0,'C');
                $pdf->SetY(240);
                $pdf->SetX(167);
                $pdf->Cell(0,8,utf8_decode(''),1,0,'C');
                $pdf->SetY(248);
                $pdf->SetX(147);
                $pdf->Cell(20,12,utf8_decode('Redactor'),1,0,'C');
                $pdf->SetY(248);
                $pdf->SetX(167);
                $pdf->Cell(0,12,utf8_decode(''),1,0,'C');

                $carpeta ='../../assets/imprimir/LIQ/'.date("Y").'';
                if(!file_exists($carpeta)){
                        mkdir($carpeta,0777,true);
                        $pdf->Output('F','../../assets/imprimir/LIQ/'.date("Y").'/'.$this->expAsoc.'.pdf');
                }else{
                        $pdf->Output('F','../../assets/imprimir/LIQ/'.date("Y").'/'.$this->expAsoc.'.pdf');
                }
                echo'
                <input type="hidden" id="rutaPdf" value="./assets/imprimir/LIQ/'.date("Y").'/'.$this->expAsoc.'.pdf" />
                <input type="hidden" id="numExp" value="'.$this->expAsoc.'.pdf">';
        }
}






?>