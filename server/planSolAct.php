<?php

require('fpdf/fpdf.php');

class PDF1 extends FPDF{
	

	function Header(){
	        // Logos
	        $this->Image('../../assets/logo_ajustado.JPG',10,3,30);
	        $this->Image('../../assets/escudo_municipio.jpg',175,3,30);
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

	function primDat(){
		$pdf = new PDF1('P','mm','letter');
	    $pdf->SetMargins(20,0,22);
	    $pdf->AliasNbPages();
	    $pdf->AddPage();

	    $pdf->SetY(50);
        $pdf->SetX(140);
        $pdf->Cell(10,10,'COD.CONTRIBUYENTE');
        $pdf->SetY(60);
        $pdf->SetX(100);
        $pdf->Cell(16,7,utf8_decode('A. DATOS DEL CONTRIBUYENTE'),0,0,'C');
        $pdf->SetY(60);
        $pdf->SetX(21);
        $pdf->Cell(16,7,utf8_decode('FECHA DE APERTURA'),0,0,'C');

		$pdf->Output('F','../../assets/imprimir/55542.pdf');
        echo'
        <input type="text" id="rutaPdf" value="./assets/imprimir/55542.pdf" />
        <input type="hidden" id="numExp" value="55542">';
	}

	
}






?>