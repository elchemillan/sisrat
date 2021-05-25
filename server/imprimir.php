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
	function mostLiq(){
		echo'
			<div class="container-fluid">
				<div class="row">
					<div class="col titSect">
						<h3>REGISTRO DE DATOS PARA LIQUIDACIÓN</h3>
					</div>
				</div>
				<div class="row">
					<div class="col campRec">
						<b>Ingresos Brutos</b>
					</div>
					<div class="col campRec">
						<input type="text" class="campos tamCamp" id="ingreBrut" />
					</div>
					<div class="col campRec">
						<b>Otros Ingresos</b>
					</div>
					<div class="col campRec">
						<input type="text" class="campos tamCamp" id="ingreOtro" />
					</div>
				</div>
				<div class="row">
					<div class="col campRec">
						<b>Total Ingresos</b>
					</div>
					<div class="col campRec">
						<input type="text" class="campos tamCamp" id="totalIngre" />
					</div>
					<div class="col campRec">
						<b>Porcentage, Aplicar de Conformidad de la Ordenanza</b>
					</div>
					<div class="col campRec">
						<input type="text" class=" campos tamCamp" id="procentOrdenan">
					</div>
				</div>
				<div class="row">
					<div class="col campRec">
						<b>Min. Tributable Anual</b>
					</div>
					<div class="col campRec">
						<input type="text" class="campos tamCamp" id="minTribAnu"/>
					</div>
					<div class="col campRec">
						<b>Exp Asociado</b>
					</div>
					<div class="col campRec">
						<input type="text" class="campos tamCamp" id="expAsoc">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<button class="btn btn-primary" onclick="btnGuarLiquid()"/>Guardar</button>
					</div>
				</div>
			</div>
		';
	}
}


?>