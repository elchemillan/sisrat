<?php

class reportes{


	function contruct(){

	}

	function opReport(){
		echo'
            <div class="container-fluid opciones">
                <div class="row">
                    <div class="col">
                        <button onclick="btnFechForm()" class="btn btn-primary">FECHA</button>
                    </div>
                    <div class="col">
                        <button onclick="btnSectForm()" class="btn btn-primary">SECTOR</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary" onclick="btnActForm()">ACTIVIDAD</button>
                    </div>
                    <div class="col">
                        <button onclick="btnComplReg()" class="btn btn-primary">TOTAL</button>
                    </div>
                </div>
            </div>
        ';
	}

	function fechForm(){
		echo'

			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<h3>SELECCIONA LA FECHA PARA EL REPORTE</h3>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<b>DESDE: </b>
						<select id="diaRep">
							<option value="">Dia</option>';
						$i=0;	
						$lim= 31;
						for($i=1;$i<=$lim;$i++){
							echo'<option value="'.$i.'">'.$i.'</option>';
						}
						echo'</select>
							<select id="mesRep">
								<option value="">Mes</option>
								<option value="01">Enero</option>
								<option value="02">Febrero</option>
								<option value="03">Marzo</option>
								<option value="04">Abril</option>
								<option value="05">Mayo</option>
								<option value="06">Junio</option>
								<option value="07">Julio</option>
								<option value="08">Agosto</option>
								<option value="09">Septiembre</option>
								<option value="10">Octubre</option>
								<option value="11">Noviembre</option>
								<option value="12">Diciembre</option>
							</select>
							<select id="anoRep">
								<option value="">Año</option>';
							for($i=1990; $i<=date('Y');$i++){
								echo'<option value="'.$i.'">'.$i.'</option>';
							}
							echo'
							</select>
					</div>
				</div>
				<div class="row">
					<div class="col">
							<b>Hasta</b>
							<select id="diaDes">
								<option value="0">Dia</option>';
							$i=0;	
							$lim2= 31;
							for($l=1;$l<=$lim2;$l++){
								echo'<option value="'.$l.'">'.$l.'</option>';
							}
								echo'
							</select>
							<select id="mesDes">
								<option value="">Mes</option>
								<option value="01">Enero</option>
								<option value="02">Febrero</option>
								<option value="03">Marzo</option>
								<option value="04">Abril</option>
								<option value="05">Mayo</option>
								<option value="06">Junio</option>
								<option value="07">Julio</option>
								<option value="08">Agosto</option>
								<option value="09">Septiembre</option>
								<option value="10">Octubre</option>
								<option value="11">Noviembre</option>
								<option value="12">Diciembre</option>
							</select>
							<select id="anoDes">
								<option value="">Año</option>';
							for($l=1990; $l<=date('Y');$l++){
								echo'<option value="'.$l.'">'.$l.'</option>';
							}
							echo'
							</select>
					</div>
				</div>
					<div class="col">
						<button type="button" onclick="btnReporFech()" class="btn btn-success">Imprimir</button>
					</div>
				</div>
			</div>
		';
	}
	function sectForm(){ 
		include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

		$sectSQL = "SELECT * FROM sector";
		$resSect = $link->query($sectSQL);

		echo'
			<div class="container-fluid">
				<div class="row">
					<div class="col">
							<b>SELECCIONA EL SECTOR</b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<select id="sect">
							<option value="0">Sector</option>';
					while($verSect = $resSect->fetch_array()){
						echo'<option value="'.$verSect["id"].'">'.$verSect["nombre"].'</option>';
					}
							
						echo'</select>
						<buttom class="btn btn-primary" onclick="btnImprSector()">Imprimir</buttom>
					</div>
				</div>
			</div>
		';
	}
	function actForm(){
		include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

		echo '
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<b>Actividad Economica</b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<select id="actEcon">
							<option value="0">Elegir</option>';
					$ActEconSQL ="SELECT * FROM actecon";
					$resActEcon = $link->query($ActEconSQL);

					while($ecnAct = $resActEcon->fetch_array()){
							echo'<option value="'.$ecnAct["id"].'">'.$ecnAct["nombre"].'</option>';
					}
					echo'
						</select>
						<buttom class="btn btn-primary" onclick="btnImprAct();">Imprimir</buttom>
					</div>
				</div>
			</div>
		';
	}
}


?>