<?php


class imprimir{

	function contruc(){
		$noExpediente = "";
	}


	function FormImpri(){
		echo'
		<div class="container-fluid opciones">
			<div class="row">
				<div class="col campRec">
					<h2>Ingrese Nº de expediente </h2>
				</div>
				<div class="col campRec">
					<input type="text" id="noExpediente" class="campos"/> 
				</div>
				<div class="col">
					<buttom class="btn btn-primary" onclick="btnImprimirDat()">Imprimir</buttom>
				</div>
			</div>
		</div>';
	}
}


?>