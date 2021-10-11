<?php


class busquedas{


	function contruct (){
		$numExp = "";
	}

	function mostBus(){
		include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $buscarExp = "SELECT * FROM comercio where noExpe=".$this->numExp."";
        $resBuscarExp = $link->query($buscarExp);
        $buscarExpRes = $resBuscarExp->fetch_array();

        $busProp = "SELECT * FROM propietario where id=".$buscarExpRes["fk_propietario"]."";
        $resBusProp = $link->query($busProp);
        $busPropRes = $resBusProp->fetch_array();

		echo '
		<input type="hidden" id="numExp" value="'.$this->numExp.'">
			<div class ="container">
				<div class="row">
					<div class="col campRec">
						<h4>Expediente encontrado</h4>
					</div>
					<div class="col campRec">
						'.$this->numExp.'
					</div>
				</div>
				<div class="row ">
					<div class="campRec col">
						<b>Nombre: </b>'.$busPropRes["nombre"].' '.$busPropRes["apellido"].'
					</div>
					<div class="col campRec">
						<center><b>Opciones</b></center>
							<div class="row">
									<div class="col">
										<button class="btn btn-primary" onclick="btnCotzImpr()" >Cotizacion</button>
									</div>
									<div class="col">
										<button class="btn btn-primary" onclick="btnImpLiq();">Liquidacion</button>
									</div>
									<div class="col">
										<button class="btn btn-primary" onclick="btnImprPat();">Patente</button>
									</div>
									<div class="col">
										<button class="btn btn-primary" onclick="btnModf()">Modificar</button>
									</div>
							</div>
					</div>
				</div>
			</div>
			<div class="container" id="espacModif">

			</div>
		';
	}
	function mostModif(){
		echo'
			<div class="row">
				<div class="col">
					<buttom onclick="btnLiquid()"class="btn btn-primary">Liquidación</b>
				</div>
				<div class="col">
					<buttom onclick="btnCotzMod()"class="btn btn-primary">Cotización</b>
				</div>
				<div class="col">
					<buttom class="btn btn-primary" onclick="btnMostDat()">Datos</b>
				</div>
			</div>

		';
	}
	function formModfLiquid(){
		echo'hola';
	}
}


?>