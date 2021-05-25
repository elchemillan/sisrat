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

    }
    function imprimirEcon(){
        

        $pdfEcon = new pdfGenerl('P','mm','A4');
        $pdfEcon->SetMargins(20,0,22);
        $pdfEcon->AliasNbPages();
        $pdfEcon->AddPage();

        $pdfEcon->SetY(40);
        $pdfEcon->SetX(78);
        $pdfEcon->SetFont('Times','B',19);
        $pdfEcon->Cell(50,7,utf8_decode('LICENCIA DE ACTIVIDADES ECONOMICAS'),0,0,'C');
        $pdfEcon->SetY(54);
        $pdfEcon->SetX(17);
        $pdfEcon->SetFont('Times','B',10);
        $pdfEcon->Cell(50,7,utf8_decode('FECHA DE EMISIÓN'),1,0,'C');

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