<?php


require('fpdf/fpdf.php');

class pdfReport extends FPDF{

	function Header(){
				// Logos
	                $this->Image('../../assets/logo_ajustado.JPG',70,7,18);
	                $this->Image('../../assets/logoAlcaldia.jpg',185,7,35);
                // Arial bold 15
	                $this->SetFont('Times','B',9);
	            // Título
	                $this->SetY(5);
	                $this->SetX(103);
	                $this->Cell(30,10,'REPUBLICA BOLIVARIANA DE VENEZUELA',0,'C');
	                $this->SetY(9);
	                $this->SetX(91);
	                $this->Cell(30,10,utf8_decode('ALCALDIA DEL MUNICIPIO FERNÁNDEZ FEO DE EL PIÑAL'),0,'C');
	                $this->SetY(13);
	                $this->SetX(93);
	                $this->Cell(30,10,utf8_decode('SERVICIO AUTÓNOMO MUNICIPAL DE RECAUDACIÓN '),0,'C');
	                $this->SetY(19);
	                $this->SetX(108);
	                $this->Cell(65,6,utf8_decode('Y ADMINISTRACIÓN TRIBUTARIA'),0,'C');
	                $this->SetY(21);
	                $this->SetX(122);
	                $this->Cell(30,10,'RIF: G-20016065-9',0,'C');
                // Salto de línea
                	$this->Ln(20);
	}
}

class impriRepor{

	function contruct(){
        $diaRep = "";
        $mesRep = "";
        $anoRep = "";
        $diaDes = "";
        $mesDes = "";
        $anoDes = "";
    }
    function reportFech(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $fechaRep = "".$this->anoRep."/".$this->mesRep."/".$this->diaRep."";
        $fechaDes = "".$this->anoDes."/".$this->mesDes."/".$this->diaDes.""; 

        $verFechSQL = "SELECT * FROM comercio where fecha between '".$fechaRep."' AND '".$fechaDes."'";
        $ResFechaVer = $link->query($verFechSQL);

    	$pdfEcon = new pdfReport('L','mm','A4');
        $pdfEcon->SetMargins(20,0,8);
        $pdfEcon->AliasNbPages();
        $pdfEcon->AddPage();
        $pdfEcon->SetY(39);
        $pdfEcon->SetX(112);
        $pdfEcon->SetFont('Times','B',12);
        $pdfEcon->Cell(50,5,utf8_decode('Reporte por Fecha'),0,0,'C');
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(30);
        $pdfEcon->Cell(20,5,utf8_decode('Fecha a verificar hola'),0,0,'C');
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(207);
        $pdfEcon->Cell(20,5,utf8_decode('Cantidad de Registros: '),0,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(22);
        $pdfEcon->Cell(15,7,utf8_decode('No.'),1,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(37);
        $pdfEcon->Cell(99,7,utf8_decode('Comercio'),1,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(136);
        $pdfEcon->Cell(50,7,utf8_decode('Expediente'),1,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(186);
        $pdfEcon->Cell(50,7,utf8_decode('Sector'),1,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(236);
        $pdfEcon->Cell(30,7,utf8_decode('Fecha de Act.'),1,0,'C');
        $num= 1;
        $comerFech=0;
        $y=60;
        while($comerFech = $ResFechaVer->fetch_array()){
            $sectComerSQL = "SELECT * FROM sector where id=".$comerFech["fk_sector"]."";
            $resSectComer = $link->query($sectComerSQL);
            $sectComerRes = $resSectComer->fetch_array();

            $pdfEcon->SetY($y);
            $pdfEcon->SetX(22);
            $pdfEcon->Cell(15,7,utf8_decode(''.$num.''),1,0,'C');
            $pdfEcon->SetY($y);
            $pdfEcon->SetX(37);
            $pdfEcon->Cell(99,7,utf8_decode(''.$comerFech["nombre"].''),1,0,'C');
            $pdfEcon->SetY($y);
            $pdfEcon->SetX(136);
            $pdfEcon->Cell(50,7,utf8_decode(''.$comerFech["noExpe"].''),1,0,'C');
            $pdfEcon->SetY($y);
            $pdfEcon->SetX(186);
            $pdfEcon->Cell(50,7,''.$sectComerRes["nombre"].'',1,0,'C');
            $pdfEcon->SetY($y);
            $pdfEcon->SetX(236);
            $pdfEcon->Cell(30,7,utf8_decode(''.$comerFech["fecha"].''),1,0,'C');

            $num++;
            $y = $y+7;
        }
        $regTot = $num-1;
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(227);
        $pdfEcon->Cell(20,5,utf8_decode(''.$regTot.''),0,0,'C');

        $carpeta ='../../assets/imprimir/REP/DATE/'.date("Y").'';

        if(!file_exists($carpeta)){
            mkdir($carpeta,777,true);
            $pdfEcon->Output('F','../../assets/imprimir/REP/DATE/'.date("Y").'/rep'.date("dMY").'.pdf');
        }else{
            $pdfEcon->Output('F','../../assets/imprimir/REP/DATE/'.date("Y").'/rep'.date("dMY").'.pdf');
        }
        echo'|
        <input type="hidden" id="rutaPdf" value="./assets/imprimir/REP/DATE/'.date("Y").'/rep'.date("dMY").'.pdf"/>
        <input type="hidden" id="numExp" value="rep'.date("dMY").'.pdf">';
    }
}
class impriSect{

    function contruct(){
        $sect = "";
    }
    function sectorRepor(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $sectComerSQL = "SELECT * FROM sector where id='".$this->sect."'";
        $resSectComer = $link->query($sectComerSQL);
        $sectComerRes = $resSectComer->fetch_array();

        $expBusSQL = "SELECT * FROM comercio where fk_sector=".$sectComerRes["id"]."";
        $resExp = $link->query($expBusSQL);

    	$pdfEcon = new pdfReport('L','mm','A4');
        $pdfEcon->SetMargins(20,0,8);
        $pdfEcon->AliasNbPages();
        $pdfEcon->AddPage();
        $pdfEcon->SetY(39);
        $pdfEcon->SetX(112);
        $pdfEcon->SetFont('Times','B',12);
        $pdfEcon->Cell(50,5,utf8_decode('Reporte por Sector'),0,0,'C');
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(30);
        $pdfEcon->Cell(20,5,'Sector a verificar: '.$sectComerRes["nombre"].'',0,0,'C');
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(207);
        $pdfEcon->Cell(20,5,utf8_decode('Cantidad de Registros: '),0,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(22);
        $pdfEcon->Cell(15,7,utf8_decode('No.'),1,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(37);
        $pdfEcon->Cell(99,7,utf8_decode('Comercio'),1,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(136);
        $pdfEcon->Cell(50,7,utf8_decode('Expediente'),1,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(186);
        $pdfEcon->Cell(50,7,utf8_decode('Sector'),1,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(236);
        $pdfEcon->Cell(30,7,utf8_decode('Fecha de Act.'),1,0,'C');
        $num= 1;
        $comerFech=0;
        $y=60;
        while($comerFech = $resExp->fetch_array()){
            

            $pdfEcon->SetY($y);
            $pdfEcon->SetX(22);
            $pdfEcon->Cell(15,7,utf8_decode(''.$num.''),1,0,'C');
            $pdfEcon->SetY($y);
            $pdfEcon->SetX(37);
            $pdfEcon->Cell(99,7,utf8_decode(''.$comerFech["nombre"].''),1,0,'C');
            $pdfEcon->SetY($y);
            $pdfEcon->SetX(136);
            $pdfEcon->Cell(50,7,utf8_decode(''.$comerFech["noExpe"].''),1,0,'C');
            $pdfEcon->SetY($y);
            $pdfEcon->SetX(186);
            $pdfEcon->Cell(50,7,''.$sectComerRes["nombre"].'',1,0,'C');
            $pdfEcon->SetY($y);
            $pdfEcon->SetX(236);
            $pdfEcon->Cell(30,7,utf8_decode(''.$comerFech["fecha"].''),1,0,'C');

            $num++;
            $y = $y+7;
        }
        $regTot = $num-1;
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(229);
        $pdfEcon->Cell(20,5,utf8_decode(''.$regTot.''),0,0,'C');

        $carpeta ='../../assets/imprimir/SEC/DATE/'.date("Y").'';

        if(!file_exists($carpeta)){
            mkdir($carpeta,0777,true);
            $pdfEcon->Output('F','../../assets/imprimir/SEC/DATE/'.date("Y").'/sec'.date("dMY").'.pdf');
        }else{
            $pdfEcon->Output('F','../../assets/imprimir/SEC/DATE/'.date("Y").'/sec'.date("dMY").'.pdf');
        }
        echo'|
        <input type="hidden" id="rutaPdf" value="./assets/imprimir/SEC/DATE/'.date("Y").'/sec'.date("dMY").'.pdf"/>
        <input type="hidden" id="numExp" value="sec'.date("dMY").'.pdf">';
    }

}

class imprAct{

    function construct(){
        $imprAct = "";
        $actEcon = "";
    }

    function actImpri(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $verActEconSQL = "SELECT * FROM actecon where id=".$this->actEcon."";
        $resActEcon = $link->query($verActEconSQL);
        $actEconRes = $resActEcon->fetch_array();

        $verExpSQL = "SELECT * FROM comercio where fk_actEcon=".$actEconRes["id"]."";
        $resExp = $link->query($verExpSQL);

        $pdfEcon = new pdfReport('L','mm','A4');
        $pdfEcon->SetMargins(20,0,8);
        $pdfEcon->AliasNbPages();
        $pdfEcon->AddPage();
        $pdfEcon->SetY(39);
        $pdfEcon->SetX(112);
        $pdfEcon->SetFont('Times','B',12);
        $pdfEcon->Cell(50,5,utf8_decode('Reporte por Act. Economica'),0,0,'C');
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(30);
        $pdfEcon->Cell(20,5,'Act. Econ: '.$actEconRes["nombre"].'',0,0,'C');
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(207);
        $pdfEcon->Cell(20,5,utf8_decode('Cantidad de Registros: '),0,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(22);
        $pdfEcon->Cell(15,7,utf8_decode('No.'),1,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(37);
        $pdfEcon->Cell(99,7,utf8_decode('Comercio'),1,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(136);
        $pdfEcon->Cell(50,7,utf8_decode('Expediente'),1,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(186);
        $pdfEcon->Cell(50,7,utf8_decode('Act. Econ'),1,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(236);
        $pdfEcon->Cell(30,7,utf8_decode('Fecha de Act.'),1,0,'C');
        $num= 1;
        $comerFech=0;
        $y=60;

        while($comerFech = $resExp->fetch_array()){

            $verActEconSQL2 = "SELECT * FROM actecon where id=".$this->actEcon."";
            $resActEcon2 = $link->query($verActEconSQL2);
            $actEconRes2 = $resActEcon2->fetch_array();

            $pdfEcon->SetY($y);
            $pdfEcon->SetX(22);
            $pdfEcon->Cell(15,7,utf8_decode(''.$num.''),1,0,'C');
            $pdfEcon->SetY($y);
            $pdfEcon->SetX(37);
            $pdfEcon->Cell(99,7,utf8_decode(''.$comerFech["nombre"].''),1,0,'C');
            $pdfEcon->SetY($y);
            $pdfEcon->SetX(136);
            $pdfEcon->Cell(50,7,utf8_decode(''.$comerFech["noExpe"].''),1,0,'C');
            $pdfEcon->SetY($y);
            $pdfEcon->SetX(186);
            $pdfEcon->Cell(50,7,''.$actEconRes2["nombre"].'',1,0,'C');
            $pdfEcon->SetY($y);
            $pdfEcon->SetX(236);
            $pdfEcon->Cell(30,7,utf8_decode(''.$comerFech["fecha"].''),1,0,'C');

            $num++;
            $y = $y+7;
        }
        $regTot = $num-1;
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(229);
        $pdfEcon->Cell(20,5,utf8_decode(''.$regTot.''),0,0,'C');

        $carpeta ='../../assets/imprimir/ACECON/'.date("Y").'';

        if(!file_exists($carpeta)){
            mkdir($carpeta,0777,true);
            $pdfEcon->Output('F','../../assets/imprimir/ACECON/'.date("Y").'/repAct'.date('dMY').'.pdf');
        }else{
            $pdfEcon->Output('F','../../assets/imprimir/ACECON/'.date("Y").'/repAct'.date('dMY').'.pdf');
        }
        echo'|
        <input type="hidden" id="rutaPdf" value="./assets/imprimir/ACECON/'.date("Y").'/repAct'.date('dMY').'.pdf"/>
        <input type="hidden" id="numExp" value="repAct'.date('dMY').'.pdf">';
    }

}
class totalReg{

    function construct(){

    }
    function impTotReg(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $verComerSQL = "SELECT * FROM comercio ";
        $resComerSQL = $link->query($verComerSQL);

        $pdfEcon = new pdfReport('L','mm','A4');
        $pdfEcon->SetMargins(20,0,8);
        $pdfEcon->AliasNbPages();
        $pdfEcon->AddPage();
        $pdfEcon->SetY(39);
        $pdfEcon->SetX(112);
        $pdfEcon->SetFont('Times','B',12);
        $pdfEcon->Cell(50,5,utf8_decode('Total de Registros en el Sistema'),0,0,'C');
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(207);
        $pdfEcon->Cell(20,5,utf8_decode('Cantidad de Registros: '),0,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(22);
        $pdfEcon->Cell(15,7,utf8_decode('No.'),1,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(37);
        $pdfEcon->Cell(99,7,utf8_decode('Comercio'),1,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(136);
        $pdfEcon->Cell(50,7,utf8_decode('Expediente'),1,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(186);
        $pdfEcon->Cell(50,7,utf8_decode('Act. Econ'),1,0,'C');
        $pdfEcon->SetY(53);
        $pdfEcon->SetX(236);
        $pdfEcon->Cell(30,7,utf8_decode('Fecha de Act.'),1,0,'C');
        $num= 1;
        $comerFech=0;
        $y=60;

        while($comerFech = $resComerSQL->fetch_array()){

            $verActEconSQL2 = "SELECT * FROM actecon where id=".$comerFech["fk_actEcon"]."";
            $resActEcon2 = $link->query($verActEconSQL2);
            $actEconRes2 = $resActEcon2->fetch_array();

            $pdfEcon->SetY($y);
            $pdfEcon->SetX(22);
            $pdfEcon->Cell(15,7,utf8_decode(''.$num.''),1,0,'C');
            $pdfEcon->SetY($y);
            $pdfEcon->SetX(37);
            $pdfEcon->Cell(99,7,utf8_decode(''.$comerFech["nombre"].''),1,0,'C');
            $pdfEcon->SetY($y);
            $pdfEcon->SetX(136);
            $pdfEcon->Cell(50,7,utf8_decode(''.$comerFech["noExpe"].''),1,0,'C');
            $pdfEcon->SetY($y);
            $pdfEcon->SetX(186);
            $pdfEcon->Cell(50,7,''.$actEconRes2["nombre"].'',1,0,'C');
            $pdfEcon->SetY($y);
            $pdfEcon->SetX(236);
            $pdfEcon->Cell(30,7,utf8_decode(''.$comerFech["fecha"].''),1,0,'C');

            $num++;
            $y = $y+7;
        }
        $regTot = $num-1;
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(229);
        $pdfEcon->Cell(20,5,utf8_decode(''.$regTot.''),0,0,'C');

        $carpeta ='../../assets/imprimir/TOTAL/'.date("Y").'';

        if(!file_exists($carpeta)){
            mkdir($carpeta,0777,true);
            $pdfEcon->Output('F','../../assets/imprimir/TOTAL/'.date("Y").'/Tot'.date('dMY').'.pdf');
        }else{
            $pdfEcon->Output('F','../../assets/imprimir/TOTAL/'.date("Y").'/Tot'.date('dMY').'.pdf');
        }
        echo'|
        <input type="hidden" id="rutaPdf" value="./assets/imprimir/TOTAL/'.date("Y").'/Tot'.date('dMY').'.pdf"/>
        <input type="hidden" id="numExp" value="Tot'.date('dMY').'.pdf">';
    }
}
?>