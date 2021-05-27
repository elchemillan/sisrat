<?php

require('fpdf/fpdf.php');

class pdfGenerl extends FPDF{

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

class licenciaEcons{

    function contruct(){
        $camExpBus = "";
        $correExp = "";
        $link2 = "";

    }
    function imprimirEcon(){

        $conex = $this->link2;

        $busExp  = "SELECT * FROM comercio where noExpe=".$this->camExpBus."";
        $resBusExp = $conex->query($busExp);
        $busExpRes = $resBusExp->fetch_array();

        $busPropSQL = "SELECT * FROM propietario where id=".$busExpRes["fk_propietario"]."";
        $resProp = $conex->query($busPropSQL);
        $propRes = $resProp->fetch_array();

        $divced = explode("|",$propRes["cedula"]);
        $cedLetra = $divced[0];
        $cedNum = $divced[1];
        $cedFul = "".$cedLetra."-".$cedNum."";

        $busDatExp = "SELECT * FROM datcomer where id=".$busExpRes["fk_datComer"]."";
        $resBusDat = $conex->query($busDatExp);
        $busDatRes = $resBusDat->fetch_array();

        $divRif = explode("|",$busDatRes["rif"]);
        $rifNum = $divRif[1];
        $rifLetra = $divRif[0];
        $rifFul = "".$rifLetra."-".$rifNum."";

        $busActExp = "SELECT * FROM actecon where id=".$busExpRes["fk_actEcon"]."";
        $resActExp = $conex->query($busActExp);
        $actExpRes = $resActExp->fetch_array();

        $guarLicEcon = "INSERT INTO licactecon(fk_comercio,fechaEminc,fechaVenci,codContribuyente,corr,fk_actEcon)value(".$busExpRes["id"].",'".date("Y-m-d")."','".date("Y")."-12-31',".$this->camExpBus.",".$this->correExp.",".$busExpRes["fk_actEcon"].")";
        $conex->query($guarLicEcon);
        $idLicEcon= $conex->insert_id;

        $upLicExp = "UPDATE comercio SET fk_licEcon=".$idLicEcon." where id=".$busExpRes["id"]."";
        $conex->query($upLicExp);

        $actEconSQL = "SELECT * FROM actecon where actecon.id=".$busExpRes["fk_actEcon"]." ";
        $resActEcon = $conex->query($actEconSQL);
        $actEconRes = $resActEcon->fetch_array();

        $grupbusSQL = "SELECT * FROM grupo where id=".$actEconRes["fk_grupo"]."";
        $resGrupBus = $conex->query($grupbusSQL);
        $grupBusRes = $resGrupBus->fetch_array();

        $subGrupSQL = "SELECT * FROM subgrupo where id=".$actEconRes["fk_grupo"]."";
        $resSubGrup = $conex->query($subGrupSQL);
        $subGrupRes = $resSubGrup->fetch_array();


        $pdfEcon = new pdfGenerl('P','mm','A4');
        $pdfEcon->SetMargins(20,0,22);
        $pdfEcon->AliasNbPages();
        $pdfEcon->AddPage();

        $pdfEcon->SetY(40);
        $pdfEcon->SetX(78);
        $pdfEcon->SetFont('Times','B',19);
        $pdfEcon->Cell(50,7,utf8_decode($grupSQL.'LICENCIA DE ACTIVIDADES ECONOMICAS'),0,0,'C');
        $pdfEcon->SetY(54);
        $pdfEcon->SetX(17);
        $pdfEcon->SetFont('Times','B',9);
        $pdfEcon->Cell(50,7,utf8_decode('FECHA DE EMISIÓN'),1,0,'C');
        $pdfEcon->SetY(61);
        $pdfEcon->SetX(17);
        $pdfEcon->Cell(20,7,utf8_decode('Ciudad'),1,0,'C');
        $pdfEcon->SetY(61);
        $pdfEcon->SetX(37);
        $pdfEcon->Cell(10,7,utf8_decode('DÍA'),1,0,'C');
        $pdfEcon->SetY(61);
        $pdfEcon->SetX(47);
        $pdfEcon->Cell(10,7,utf8_decode('MES'),1,0,'C');
        $pdfEcon->SetY(61);
        $pdfEcon->SetX(57);
        $pdfEcon->Cell(10,7,utf8_decode('AÑO'),1,0,'C');
        $pdfEcon->SetY(68);
        $pdfEcon->SetX(17);
        $pdfEcon->Cell(20,7,utf8_decode('El Piñal'),1,0,'C');
        $pdfEcon->SetY(68);
        $pdfEcon->SetX(37);
        $pdfEcon->Cell(30,7,date('d-M-Y'),1,0,'C');
        $pdfEcon->SetY(54);
        $pdfEcon->SetX(77);
        $pdfEcon->Cell(50,7,utf8_decode('FECHA DE VENCIMIENTO'),1,0,'C');
        $pdfEcon->SetY(61);
        $pdfEcon->SetX(77);
        $pdfEcon->Cell(15,7,utf8_decode('DÍA'),1,0,'C');
        $pdfEcon->SetY(61);
        $pdfEcon->SetX(92);
        $pdfEcon->Cell(20,7,utf8_decode('MES'),1,0,'C');
        $pdfEcon->SetY(61);
        $pdfEcon->SetX(112);
        $pdfEcon->Cell(15,7,utf8_decode('AÑO'),1,0,'C');
        $pdfEcon->SetY(68);
        $pdfEcon->SetX(77);
        $pdfEcon->Cell(15,7,date('d'),1,0,'C');
        $pdfEcon->SetY(68);
        $pdfEcon->SetX(92);
        $pdfEcon->Cell(20,7,date('M'),1,0,'C');
        $pdfEcon->SetY(68);
        $pdfEcon->SetX(112);
        $pdfEcon->Cell(15,7,date('Y'),1,0,'C');
        $pdfEcon->SetY(54);
        $pdfEcon->SetX(137);
        $pdfEcon->Cell(15,7,utf8_decode('L.A.E. N°'),1,0,'C');
        $pdfEcon->SetY(54);
        $pdfEcon->SetX(152);
        $pdfEcon->Cell(0,7,substr($actExpRes["nombre"],0,3)."/".$this->correExp."-".$this->camExpBus,1,0,'C');
        $pdfEcon->SetY(61);
        $pdfEcon->SetX(137);
        $pdfEcon->Cell(35,7,'CLASIFICADOR A.E',1,0,'C');
        $pdfEcon->SetY(61);
        $pdfEcon->SetX(172);
        $pdfEcon->Cell(0,7,''.$grupBusRes["codigo"].'-'.$subGrupRes["codigo"].'.'.$actEconRes["codAct"].'',1,0,'C');
        $pdfEcon->SetY(83);
        $pdfEcon->SetX(17);
        $pdfEcon->SetFont('Times','B',11);
        $pdfEcon->Cell(90,7,'Razon Social',1,0,'C');
        $pdfEcon->SetY(90);
        $pdfEcon->SetX(17);
        $pdfEcon->Cell(90,7,''.$busExpRes["nombre"].'',1,0,'C');
        $pdfEcon->SetY(83);
        $pdfEcon->SetX(107);
        $pdfEcon->Cell(0,7,utf8_decode('N° de Cedula de Identidad o RIF:'),1,0,'C');
        $pdfEcon->SetY(90);
        $pdfEcon->SetX(107);
        $pdfEcon->Cell(0,7,utf8_decode(''.$rifFul.''),1,0,'C');
        $pdfEcon->SetY(97);
        $pdfEcon->SetX(17);
        $pdfEcon->Cell(0,7,utf8_decode('Licencia para realizar la siguiente Actividad Económica:'),1,0,'C');
        $pdfEcon->SetY(104);
        $pdfEcon->SetX(17);
        $pdfEcon->Cell(0,7,''.$actEconRes["nombre"].'',1,0,'C');
        $pdfEcon->SetY(111);
        $pdfEcon->SetX(17);
        $pdfEcon->Cell(90,7,'Nombre y Apellido del Representante Legal:',1,0,'C');
        $pdfEcon->SetY(111);
        $pdfEcon->SetX(107);
        $pdfEcon->Cell(0,7,utf8_decode('N° de Cedula de Identidad:'),1,0,'C');
        $pdfEcon->SetY(118);
        $pdfEcon->SetX(17);
        $pdfEcon->Cell(90,7,''.$propRes["nombre"].' '.$propRes["apellido"].'',1,0,'C');
        $pdfEcon->SetY(118);
        $pdfEcon->SetX(107);
        $pdfEcon->Cell(0,7,''.$cedFul.'',1,0,'C');

        $pdfEcon->Output('F','../../assets/imprimir/52548.pdf');
        echo'|
        <input type="hidden" id="rutaPdf" value="./assets/imprimir/52548.pdf" />
        <input type="hidden" id="numExp" value="52548">';
    }
    function errorImpri(){
        echo'EXPEDIENTE TIENE COTIZACION REALIZADA';
    }
}



?>