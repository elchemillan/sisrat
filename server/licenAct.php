<?php

require('fpdf/fpdf.php');

class pdfGenerl extends FPDF{

	function Header(){
                // Logos
                $this->Image('../../assets/logo_ajustado.JPG',15,7,18);
                $this->Image('../../assets/logoAlcaldia.jpg',163,7,35);
                // Arial bold 15
                $this->SetFont('Times','B',9);
                // Título
                $this->SetY(5);
                $this->SetX(68);
                $this->Cell(30,10,'REPUBLICA BOLIVARIANA DE VENEZUELA',0,'C');
                $this->SetY(9);
                $this->SetX(56);
                $this->Cell(30,10,utf8_decode('ALCALDIA DEL MUNICIPIO FERNÁNDEZ FEO DE EL PIÑAL'),0,'C');
                $this->SetY(13);
                $this->SetX(59);
                $this->Cell(30,10,utf8_decode('SERVICIO AUTÓNOMO MUNICIPAL DE RECAUDACIÓN '),0,'C');
                $this->SetY(19);
                $this->SetX(75);
                $this->Cell(65,6,utf8_decode('Y ADMINISTRACIÓN TRIBUTARIA'),0,'C');
                $this->SetY(21);
                $this->SetX(88);
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

        //VERIFICAR SI LA LICENCIA DE ACTVIDAD ECONOMICA EXISTE CON EL COMERCIO A VERIFICAR Y EL AÑO EN CURSO

        $busExp  = "SELECT * FROM comercio where noExpe=".$this->camExpBus."";
        $resBusExp = $conex->query($busExp);
        $busExpRes = $resBusExp->fetch_array();

        $verLicExp = "SELECT * FROM licactecon where fk_comercio=".$busExpRes["id"]."";
        echo $verLicExp;
        $resVeriLic = $conex->query($verLicExp);
        $veriLicRes = $resVeriLic->fetch_array();



        if($veriLicRes["fechaEmic"]<date("Y")){ // SI EN LA BD EXISTEN PERO CON AÑO MENOR AL ACTUAL
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

            $actEconSQL = "SELECT * FROM actecon where id=".$busExpRes["fk_actEcon"]." ";
            $resActEcon = $conex->query($actEconSQL);
            $actEconRes = $resActEcon->fetch_array();

            $grupbusSQL = "SELECT * FROM grupo where id=".$actEconRes["fk_grupo"]."";
            $resGrupBus = $conex->query($grupbusSQL);
            $grupBusRes = $resGrupBus->fetch_array();

            $subGrupSQL = "SELECT * FROM subgrupo where id=".$actEconRes["fk_grupo"]."";
            $resSubGrup = $conex->query($subGrupSQL);
            $subGrupRes = $resSubGrup->fetch_array();            
        }else{
            //SI LA LICENCIA EXISTE Y ES LA MISMA DEL AÑO EN CURSO 
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

            $actEconSQL = "SELECT * FROM actecon where id=".$busExpRes["fk_actEcon"]." ";
            $resActEcon = $conex->query($actEconSQL);
            $actEconRes = $resActEcon->fetch_array();

            $grupbusSQL = "SELECT * FROM grupo where id=".$actEconRes["fk_grupo"]."";
            $resGrupBus = $conex->query($grupbusSQL);
            $grupBusRes = $resGrupBus->fetch_array();

            $subGrupSQL = "SELECT * FROM subgrupo where id=".$actEconRes["fk_grupo"]."";
            $resSubGrup = $conex->query($subGrupSQL);
            $subGrupRes = $resSubGrup->fetch_array();
        }

        $pdfEcon = new pdfGenerl('P','mm','A4');
        $pdfEcon->SetMargins(20,0,8);
        $pdfEcon->AliasNbPages();
        $pdfEcon->AddPage();
        $pdfEcon->Rect(7,5,195,127);
        $pdfEcon->SetY(39);
        $pdfEcon->SetX(7);
        $pdfEcon->SetFont('Times','B',9);
        $pdfEcon->Cell(50,5,utf8_decode('FECHA DE EMISIÓN'),1,0,'C');
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(7);
        $pdfEcon->Cell(20,5,utf8_decode('Ciudad'),1,0,'C');
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(27);
        $pdfEcon->Cell(10,5,utf8_decode('DÍA'),1,0,'C');
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(37);
        $pdfEcon->Cell(10,5,utf8_decode('MES'),1,0,'C');
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(47);
        $pdfEcon->Cell(10,5,utf8_decode('AÑO'),1,0,'C');
        $pdfEcon->SetY(49);
        $pdfEcon->SetX(7);
        $pdfEcon->Cell(20,5,utf8_decode('El Piñal'),1,0,'C');
        $pdfEcon->SetY(49);
        $pdfEcon->SetX(27);
        $pdfEcon->Cell(30,5,date('d-M-Y'),1,0,'C');
        $pdfEcon->SetY(39);
        $pdfEcon->SetX(77);
        $pdfEcon->Cell(50,5,utf8_decode('FECHA DE VENCIMIENTO'),1,0,'C');
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(77);
        $pdfEcon->Cell(15,5,utf8_decode('DÍA'),1,0,'C');
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(92);
        $pdfEcon->Cell(20,5,utf8_decode('MES'),1,0,'C');
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(112);
        $pdfEcon->Cell(15,5,utf8_decode('AÑO'),1,0,'C');
        $pdfEcon->SetY(49);
        $pdfEcon->SetX(77);
        $pdfEcon->Cell(15,5,date('d'),1,0,'C');
        $pdfEcon->SetY(49);
        $pdfEcon->SetX(92);
        $pdfEcon->Cell(20,5,date('M'),1,0,'C');
        $pdfEcon->SetY(49);
        $pdfEcon->SetX(112);
        $pdfEcon->Cell(15,5,date('Y'),1,0,'C');
        $pdfEcon->SetY(39);
        $pdfEcon->SetX(137);
        $pdfEcon->Cell(25,5,utf8_decode('L.A.E. N°'),1,0,'C');
        $pdfEcon->SetY(39);
        $pdfEcon->SetX(162);
        $pdfEcon->Cell(0,5,substr($actExpRes["nombre"],0,3)."/".$this->correExp."-".$this->camExpBus,1,0,'C');
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(137);
        $pdfEcon->Cell(35,5,'CLASIFICADOR A.E',1,0,'C');
        $pdfEcon->SetY(44);
        $pdfEcon->SetX(172);
        $pdfEcon->Cell(0,5,''.$grupBusRes["codigo"].'-'.$subGrupRes["codigo"].'.'.$actEconRes["codAct"].'',1,0,'C');
        $pdfEcon->SetY(59);
        $pdfEcon->SetX(7);
        $pdfEcon->SetFont('Times','B',11);
        $pdfEcon->Cell(100,5,'Razon Social',1,0,'C');
        $pdfEcon->SetY(64);
        $pdfEcon->SetX(7);
        $pdfEcon->Cell(100,5,''.$busExpRes["nombre"].'',1,0,'C');
        $pdfEcon->SetY(59);
        $pdfEcon->SetX(107);
        $pdfEcon->Cell(0,5,utf8_decode('N° de Cedula de Identidad o RIF:'),1,0,'C');
        $pdfEcon->SetY(64);
        $pdfEcon->SetX(107);
        $pdfEcon->Cell(0,5,utf8_decode(''.$rifFul.''),1,0,'C');
        $pdfEcon->SetY(69);
        $pdfEcon->SetX(7);
        $pdfEcon->Cell(0,5,utf8_decode('Licencia para realizar la siguiente Actividad Económica:'),1,0,'C');
        $pdfEcon->SetY(74);
        $pdfEcon->SetX(7);
        $pdfEcon->Cell(0,5,''.$actEconRes["nombre"].'',1,0,'C');
        $pdfEcon->SetY(79);
        $pdfEcon->SetX(7);
        $pdfEcon->Cell(100,5,'Nombre y Apellido del Representante Legal:',1,0,'C');
        $pdfEcon->SetY(79);
        $pdfEcon->SetX(107);
        $pdfEcon->Cell(0,5,utf8_decode('N° de Cedula de Identidad:'),1,0,'C');
        $pdfEcon->SetY(84);
        $pdfEcon->SetX(7);
        $pdfEcon->Cell(100,5,''.$propRes["nombre"].' '.$propRes["apellido"].'',1,0,'C');
        $pdfEcon->SetY(84);
        $pdfEcon->SetX(107);
        $pdfEcon->Cell(0,5,''.$cedFul.'',1,0,'C');
        $pdfEcon->SetY(89);
        $pdfEcon->SetX(7);
        $pdfEcon->Cell(0,5,utf8_decode('Dirección del Fondo de Comercio:'),1,0,'C');
        $pdfEcon->SetY(94);
        $pdfEcon->SetX(7);
        $pdfEcon->Cell(0,5,utf8_decode(''.$busDatRes["direccion"].''),1,0,'C');
        $pdfEcon->SetY(101);
        $pdfEcon->SetX(7);
        $pdfEcon->SetFont('Times','B',7);
        $pdfEcon->MultiCell(110,2.5,utf8_decode('El incumplimiento del pago de Impuesto de la Licencia de Actividades Económicas, trae consigo la Aplicación del  artículo N° 78 de la Ordenanza de Actividades Económicas del Municipio Fernández Feo, en los cuales se establece la Aplicación de: 
        MULTAS:
        '.chr(127).' Suspensión de la licencia y Cierre temporal del establecimiento.
        '.chr(127).' Cancelación de la Licencia y Clausura del Establecimiento.
        '.chr(127).' Paralización de Actividades Mercantiles.'),0,'C');
        $pdfEcon->SetY(99);
        $pdfEcon->SetX(7);
        $pdfEcon->Cell(110,33,'',1,0,'C');
        $pdfEcon->SetY(99);
        $pdfEcon->SetX(117);
        $pdfEcon->Cell(0,33,'',1,0,'C');
        $pdfEcon->SetY(98);
        $pdfEcon->SetX(64);
        $pdfEcon->SetFont('Times','B',9);
        $pdfEcon->Cell(0,10,'Firma y Sello',0,0,'C');
        $pdfEcon->Image('../../assets/logoAlcaldiaTrans.jpg',140,107,38);
        $pdfEcon->Image('../../assets/logo_ajustado2.png',50,32,96);
        $pdfEcon->Image('../../assets/nombrePatente.png',35,30,135);
        $pdfEcon->Image('../../assets/banderaPatente.png',13,120,92);
        $pdfEcon->SetY(122);
        $pdfEcon->SetX(5);
        $pdfEcon->SetFont('Times','B',5);
        $pdfEcon->MultiCell(115,2,'"UNIDOS CON EL PAGO DE TUS IMPUESTOS, FERNANDEZ FEO TENDRA UN MEJOR DESARROLLO"
        CALLE 3 ENTRE CARRERAS 3 Y 4 PALACIO MUNICIPAL, LA LADO DE LA PLAZA BOLIVAR EL PIÑAL
        TELEFONO: (0277) 2341029
        samratmunicipiofernandezfeo@gmail.com',0,'C');
        $carpeta ='../../assets/imprimir/LAE/'.date("Y").'';
        if(!file_exists($carpeta)){
            mkdir($carpeta,0777,true);
            $pdfEcon->Output('F','../../assets/imprimir/LAE/'.date("Y").'/'.$this->camExpBus.'.pdf');
        }else{
            $pdfEcon->Output('F','../../assets/imprimir/LAE/'.date("Y").'/'.$this->camExpBus.'.pdf');
        }
        echo'|
        <input type="hidden" id="rutaPdf" value="./assets/imprimir/LAE/'.date("Y").'/'.$this->camExpBus.'.pdf" />
        <input type="hidden" id="numExp" value="'.$this->camExpBus.'.pdf">';
    }
    function errorImpri(){
        echo'EXPEDIENTE TIENE COTIZACION REALIZADA';
    }
}



?>