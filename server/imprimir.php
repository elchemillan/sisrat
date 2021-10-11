<?php


class imprimir{

	function contruc(){
		$noExpediente = "";
		$numExp = "";
		$ingreBrut = "";
		$ingreOtro = "";
		$totalIngre = "";
		$procentOrdenan = "";
		$minTribAnu = "";
		$expAsoc="";
		$liquidacion = "";
		$idCotz = "";
		$minTrib = "";
		$aforo = "";
		$petroBs= "";
		$montActEcon = "";
		$montCertBom = "";
		$montSolv = "";
		$montPubProp = "";
		$montRenovLicLic = "";
		$montAseo = "";
		$montUsoConf = "";
		$montCatast = "";
		$montTasaAdmin = "";
		$plantElect = "";
        $nomRaz = "";
        $sectorContrib = "";
        $dirContrib = "";
        $grupNom = "";
        $CampsubGrup = "";
        $actEconAper = "";
        $noExpedien = "";
        $rifCodComer = "";
        $rifComer = "";
        $identFiscContrib = "";
        $capPagContrib = "";
        $capSusContrib = "";
        $TelefContrib = "";
        $camDocContrib = "";
        $tipEsta = "";
        $nomRepCon = "";
        $apelRepCon = "";
        $codCedRepre = "";
        $numCedRep = "";
        $estRegCon = "";
        $cidRegCont = "";
        $dirRegCon = "";
        $telfRegCon = "";
        $tipPropInmue = "";
        $copCedRequi = "";
        $copRifdRequi = "";
        $copPropInmue = "";
        $copPerSant = "";
        $CarpMar = "";
        $carSolic = "";
        $permiBomb = "";
        $copRegComerRequi = "";
        $rifComple = "";
        $ceduFulRepre = "";
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
		include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

		if($this->numExp!=""){
			$comercioBusSQL= "SELECT * FROM comercio where noExpe=".$this->numExp."";
			$resComercio = $link->query($comercioBusSQL);
			$comercioRes = $resComercio->fetch_array();

			$liquidSQL = "SELECT * FROM liquidaciones where id=".$comercioRes['fk_liquid']."";
			$resLiquid = $link->query($liquidSQL);
			$liquidRes = $resLiquid->fetch_array();

		}

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
						<input type="text" value="'.$liquidRes["ingreBrutos"].'" class="campos tamCamp" id="ingreBrut" />
					</div>
					<div class="col campRec">
						<b>Otros Ingresos</b>
					</div>
					<div class="col campRec">
						<input type="text" value="'.$liquidRes["otroIngre"].'"class="campos tamCamp" id="ingreOtro" />
					</div>
				</div>
				<div class="row">
					<div class="col campRec">
						<b>Total Ingresos</b>
					</div>
					<div class="col campRec">
						<input type="text" value="'.$liquidRes["totalIngre"].'" class="campos tamCamp" id="totalIngre" />
					</div>
					<div class="col campRec">
						<b>Porcentage, Aplicar de Conformidad de la Ordenanza</b>
					</div>
					<div class="col campRec">
						<input type="text" value="'.$liquidRes["porcenOrden"].'" class=" campos tamCamp" id="procentOrdenan">
					</div>
				</div>
				<div class="row">
					<div class="col campRec">
						<b>Min. Tributable Anual</b>
					</div>
					<div class="col campRec">
						<input type="text" value="'.$liquidRes["minTrib"].'" class="campos tamCamp" id="minTribAnu"/>
					</div>
					<div class="col campRec">
						<b>Exp Asociado</b>
					</div>
					<div class="col campRec">
						<input type="text" value="'.$this->numExp.'" class="campos tamCamp" id="expAsoc">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<button class="btn btn-primary" onclick="btnActLiquid()"/>Guardar</button>
					</div>
				</div>
			</div>
			<input type="hidden" value="'.$liquidRes["id"].'" id="liquidacion"/>
		';
	}
	function ActLiquid(){
		include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $actLiqSQL = "UPDATE liquidaciones SET ingreBrutos=".$this->ingreBrut.",otroIngre=".$this->ingreOtro.",totalIngre=".$this->totalIngre.",porcenOrden=".$this->procentOrdenan.",minTrib=".$this->minTribAnu." where id=".$this->liquidacion."";
        echo $actLiqSQL;
        $link->query($actLiqSQL);
		echo'<b>PROCESO COMPLETADO CON EXITO</b>';
	}
	function cotzMod(){
		include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        if($this->numExp!=""){
        	$busqExpSQL="SELECT * FROM comercio where noExpe=".$this->numExp."";
        	$resExp = $link->query($busqExpSQL);
        	$expRes = $resExp->fetch_array();

        	$busqCotzSQL = "SELECT * from cotizaciones where id=".$expRes["fk_cotizaciones"]."";
        	$resCotz = $link->query($busqCotzSQL);
        	$cotzRes = $resCotz->fetch_array();


        	echo'<input type="hidden" id="idCotz" value="'.$cotzRes["id"].'"/>
        		<div class="container-fluid espacReduc2">
            <div class="row">
                <div class="col titSect">
                    <h3>DATOS PARA GENERAR PLANILLA<h3>
                </div>
            </div>
            <div class="row">
                <div class="col campRec">
                    <b>Min. Tributaria</b>
                </div>
                <div class="col campRec">
                    <input type="text" id="minTrib" value="'.$cotzRes["minTrib"].'" class="campos tamCamp"/>
                </div>
                <div class="col campRec">
                    <b>Aforo</b>
                </div>
                <div class="col campRec">
                    <input type="text" id="aforo" value="'.$cotzRes["aforo"].'" class="campos tamCamp"/>
                </div>
                <div class="col campRec">
                    <b>Petro en Bs.</b>
                </div>
                <div class="col campRec">
                    <input type="text" id="petroBs" value="'.$cotzRes["petro"].'" class="campos tamCamp"/>
                </div>
            </div>
            <div class="row">
                <div class="col campRec">
                    <b>Act. Económica </b>
                </div>
                <div class="col campRec">
                    <input type="text" id="montActEcon" value="'.$cotzRes["actEconMont"].'" class="campos tamCamp">
                </div>
                <div class="col campRec">
                    <b>Cerficado Bomberil</b>
                </div>
                <div class="col campRec">
                    <input type="text" id="montCertBom" value="'.$cotzRes["certBomMont"].'" class="campos tamCamp">
                </div>
                <div class="col campRec">
                    <b>Solvencia</b>
                </div>
                <div class="col campRec">
                    <input type="text" id="montSolv" value="'.$cotzRes["SolvMont"].'" class="campos tamCamp">
                </div>
            </div>
            <div class="row">
                <div class="col campRec">
                    <b>Publicidad y Propaganda</b>
                </div>
                <div class="col campRec">
                    <input type="text" value="'.$cotzRes["PublicPropMont"].'" class="campos tamCamp" id="montPubProp">
                </div>
                <div class="col campRec">
                    <b>Renovación de Licencia de licores</b>
                </div>
                <div class="col campRec">
                    <input type="text" value="'.$cotzRes["renovLicoMont"].'" class="campos tamCamp" id="montRenovLicLic">
                </div>
                <div class="col campRec">
                    <b>Aseo Urbano</b>
                </div>
                <div class="col campRec">
                    <input type="text" value="'.$cotzRes["aseoMont"].'" class="campos tamCamp" id="montAseo">
                </div>
            </div>
            <div class="row">
                <div class="col campRec">
                    <b>Uso Conforme</b>
                </div>
                <div class="col campRec">
                    <input type="text" value="'.$cotzRes["usoConMont"].'" class="campos tamCamp" id="montUsoConf">
                </div>
                <div class="col campRec">
                    <b>Catastro</b>
                </div>
                <div class="col campRec">
                    <input type="text" value="'.$cotzRes["catastMont"].'" class="campos tamCamp" id="montCatast">
                </div>
                <div class="col campRec">
                    <b>Tasa Administrativa</b>
                </div>
                <div class="col campRec">
                    <input type="text" value="'.$cotzRes["tasaAdminMont"].'" class="campos tamCamp" id="montTasaAdmin">
                </div>
            </div>
            <div class="row">
                <div class="col campRec">
                    <b>Planta Electrica</b>
                </div>
                <div class="col campRec">
                    <select id="plantElect">
                        <option value="'.$cotzRes["plantaElec"].'">'.$cotzRes["plantaElec"].'</option>
                        <option value="si">SI</option>
                        <option value="no">NO</option>
                    </select>
                </div>
                <div class="col-2 ">
                    <input type="buttom" class="btn btn-primary" value="Guardar" onclick="btnUpCotz()">
                </div>
            </div>
        </div>

        	';
        }
	}
	function upCotz(){
		include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $upCotz = "UPDATE cotizaciones SET minTrib=".$this->minTrib.",aforo=".$this->aforo.",petro=".$this->petroBs.",plantaElec='".$this->plantElect."',actEconMont=".$this->montActEcon.",certBomMont=".$this->montCertBom.",SolvMont=".$this->montSolv.",PublicPropMont=".$this->montPubProp.",renovLicoMont=".$this->montRenovLicLic.",aseoMont=".$this->montAseo.",usoConMont=".$this->montUsoConf.",catastMont=".$this->montCatast.",tasaAdminMont=".$this->montTasaAdmin." where id=".$this->idCotz."";
        $link->query($upCotz);

        echo'<b>PROCESO COMPLETADO CON EXITO</b>';
	}
	function mostDat(){
		include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $busExp = "SELECT * FROM comercio where noExpe=".$this->numExp."";
        $resBusExp = $link->query($busExp);
        $busResExp = $resBusExp->fetch_array();

        $busDatComer = "SELECT * FROM datcomer where id=".$busResExp["fk_datComer"]."";
        $resDatComer = $link->query($busDatComer);
        $datComerRes = $resDatComer->fetch_array();

        $rifDiv = explode("|",$datComerRes["rif"]);
        $codRif = $rifDiv[0];
        $numRif = $rifDiv[1];

        $busSectSQL = "SELECT * FROM sector where id=".$busResExp["fk_sector"]."";
        $resSect = $link->query($busSectSQL);
        $sectRes = $resSect->fetch_array();

        $busActSQL = "SELECT * FROM acteCon where id=".$busResExp["fk_actEcon"]."";
        $resAct = $link->query($busActSQL);
        $actRes = $resAct->fetch_array();

        $busGrupSQL = "SELECT * FROM grupo where id=".$actRes["fk_grupo"]."";
        $resGrup = $link->query($busGrupSQL);
        $grupRes = $resGrup->fetch_array();

        $busSubGrupSQL = "SELECT * FROM subgrupo where fk_grupos=".$grupRes["id"]."";
        $resSubGrup = $link->query($busSubGrupSQL);
        $subGrupRes = $resSubGrup->fetch_array();

        $busSectSQL = "SELECT * FROM sector";
        $resSectBus = $link->query($busSectSQL);

        $busPropSQL = "SELECT * FROM propietario where id=".$busResExp["fk_propietario"]."";
        $resProp = $link->query($busPropSQL);
        $propRes = $resProp->fetch_array();

        $cedulaDiv = explode("|",$propRes["cedula"]);
        $codCedu = $cedulaDiv[0];
        $numCedu = $cedulaDiv[1];

        $busRecauSQL = "SELECT * FROM recaudos where id=".$busResExp["fk_recaudos"]."";
        $resRecau = $link->query($busRecauSQL);
        $recauRes = $resRecau->fetch_array();

        echo'
        <input type="hidden" value="'.$this->numExp.'" id="numExp"/>
        <div class="espDatos">
            <div class="container-fluid espacReduc2">
                    <div class="row">
                        <div class="col-12 titSect">
                            <h3>DATOS DEL CONTRIBUYENTE</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col campRec">
                            <b>Nombre o Razon Social</b>
                        </div>
                        <div class="col campRec">
                            <input type="text" class="campos" id="nomRaz" value="'.$busResExp["nombre"].'">
                        </div>
                        <div class="col-1 campRec">
                            <b>Sector</b>
                        </div>
                        <div class="col-3 campRec">
                            <select id="sectorContrib">
                                <option value="'.$sectRes["id"].'">'.$sectRes["nombre"].'</option>';
                            while($sectRes = $resSectBus->fetch_array()){
                                echo'<option value="'.$sectRes["id"].'">'.$sectRes["nombre"].'</option>';
                            }
                            echo'</select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 campRec">
                            <b>Direcci&oacute;n</b>
                        </div>
                        <div class="col campRec">
                            <input type="text" class="campos" id="dirContrib" value="'.$datComerRes["direccion"].'">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 campRec">
                            <b>Act. Economica</b>
                        </div>
                        <div class="col campRec">
                            <select id="grupNom" onchange="btnSubSelec()">
                                <option value="'.$grupRes["id"].'">'.$grupRes["nombre"].'</option>';
                        $grupSQL = "SELECT * FROM grupo";
                        $resGrup = $link->query($grupSQL);

                        while($grupRes = $resGrup->fetch_array()){
                            echo'<option value="'.$grupRes["id"].'">'.$grupRes["nombre"].'</option>';
                        }
                            
                        echo'
                            </select>
                            <select id="CampsubGrup" onchange="VerActEconAper()">
                                <option value="'.$subGrupRes["id"].'">'.$subGrupRes["nombre"].'</option>
                            </select>
                            <select id="actEconAper">
                                <option value="'.$actRes["id"].'">'.$actRes["nombre"].'</option>
                            </select>
                        </div>
                        <div class="col-2 campRec">
                            <b>Nº Expediente</b>
                        </div>
                        <div class="col campRec">
                            <input type="text" class="campos" id="noExpedien" value="'.$this->numExp.'"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col campRec">
                            <b>Rif</b>
                        </div>
                        <div class="col campRec">
                            <select id="rifCodComer">
                                <option value="'.$codRif.'">'.$codRif.'</option>
                                <option value="V">V</option>
                                <option value="E">E</option>
                                <option value="P">P</option>
                                <option value="J">J</option>
                                <option value="G">G</option>
                            </select>
                            <input type="text" id="rifComer" value="'.$numRif.'" class="campos" >
                        </div>
                        <div class="col campRec">
                            <b>Nro. de Identificacion Fiscal</b>
                        </div>
                        <div class="col campRec">
                            <input type="text" value="'.$datComerRes["identFisc"].'" class="campos" id="identFiscContrib">
                        </div>
                        <div class="col campRec">
                            <b>Capital Pagado</b>
                        </div>
                        <div class="col campRec">
                            <input type="text" value="'.$datComerRes["capPag"].'" class="campos" id="capPagContrib">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col campRec">
                            <b>Capital suscrito</b>
                        </div>
                        <div class="col campRec">
                            <input type="text" value="'.$datComerRes["capSusc"].'" class="campos" id="capSusContrib">
                        </div>
                        <div class="col campRec">
                            <b>Telefono</b>
                        </div>
                        <div class="col campRec">
                            <input type="text" value="'.$datComerRes["telef"].'" id="TelefContrib">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col campRec">
                            <b>Cambio de Domicilio</b>
                            <select id="camDocContrib">
                                <option value="'.$datComerRes["cambDomi"].'">'.$datComerRes["cambDomi"].'</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                            </div>
                            <div class="col campRec">
                            <b>Establecimiento</b>
                        </div>
                            <div class="col campRec">
                                <select id="tipEsta">
                                    <option value="'.$datComerRes["tipProp"].'">'.$datComerRes["tipProp"].'</option>
                                    <option value="Único">Único</option>
                                    <option value="Casa Matriz">Casa Matríz</option>
                                    <option value="Sucursal">Sucursal</option>
                                    <option value="Agencia">Agencia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="container-fluid espacReduc2">
                <div class="row">
                    <div class="col-12 titSect">
                        <h3>REPRESENTANTE LEGAL</h3>
                    </div>
                </div>
                <div class="row">
                        <div class="col campRec">
                            <b>Nombre</b>
                        </div>
                        <div class="col campRec">
                            <input type="text" value="'.$propRes["nombre"].'" class="campos" id="nomRepCon">
                        </div>
                        <div class="col campRec">
                            <b>Apellido</b>
                        </div>
                        <div class="col campRec">
                            <input type="text" value="'.$propRes["apellido"].'" class="campos" id="apelRepCon">
                        </div>
                </div>
                <div class="row">
                        <div class="col campRec">
                            <b>Cedula</b>
                        </div>
                        <div class="col campRec">
                            <select id="codCedRepre">
                                <option value="'.$codCedu.'">'.$codCedu.'</option>
                                <option value="0">V</option>
                                <option value="0">E</option>
                            </select>
                            <input type="text" value="'.$numCedu.'" class="campos" id="numCedRep">
                        </div>
                        <div class="col campRec">
                            <b>Estado Civil</b>
                        </div>
                        <div class="col campRec">
                            <select id="estRegCon">
                                <option value="'.$propRes["estCivil"].'">'.$propRes["estCivil"].'</option>
                                <option value="Soltera(o)">Soltera(o)</option>
                                <option value="Casado(a)">Casado(a)</option>
                                <option value="Viuda(o)">Viuda(o)</option>
                              </select>
                        </div>
                        <div class="col campRec">
                            <b>Ciudad de Residencia</b>
                        </div>
                        <div class="col campRec">
                            <input type="text" value="'.$propRes["ciudadResid"].'" class="campos" id="cidRegCont"/>
                        </div>
                </div>
                <div class="row">
                        <div class="col campRec">
                            <b>Dirección</b>
                        </div>
                        <div class="col campRec">
                            <input type="text" value="'.$propRes["direccion"].'" class="campos" id="dirRegCon">
                        </div>
                        <div class="col campRec">
                            <b>Telefono</b>
                        </div>
                        <div class="col campRec">
                            <input type="text" value="'.$propRes["telef"].'" class="campos" id="telfRegCon">
                        </div>
                </div>
                <div class="row">
                    <div class="col campRec">
                        <b>Propiedad</b>
                        <select id="tipPropInmue">
                            <option>'.$busResExp["tipo"].'</option>
                            <option>Propio</option>
                            <option>Alquilado</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="container-fluid espacReduc2 ">
                <div class="row">
                    <div class="col-12 titSect">
                        <h3>RECAUDOS</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 campRec">
                        <b>Copia de Cedula</b>';
                        if($recauRes["copiaCed"]=="Si"){
                        	echo'<input type="checkbox"  id="copCedRequi" value="Si" checked>';
                        }else{
                            echo '<input type="checkbox" id="copCedRequi" value="Si">';     
                        }
                        echo'
                    </div>
                    <div class="col-3 campRec">
                        <b>Copia de RIF</b>';
                        if($recauRes["CopRif"]=="Si"){
                           echo' <input type="checkbox" id="copRifdRequi" value="Si" checked>';
                        }else{
                            echo' <input type="checkbox" id="copRifdRequi" value="Si">';
                        }
                        echo'
                    </div>
                    <div class="col campRec">
                        <b>Copia de Registro de comercio / o Declaracion Jurada</b>';
                        if($recauRes["regComer"]=="Si"){
                            echo'<input type="checkbox" active id="copRegComerRequi" value="Si" checked>';
                        }else{
                            echo'<input type="checkbox" active id="copRegComerRequi" value="Si">';
                        }
                        echo'
                    </div>
                </div>
                <div class="row">
                    <div class="col campRec">
                        <b>Copia de propiedad del inmueble / contrato de arrendamiento</b>';
                        if($recauRes["docProp"]=="Si"){
                            echo'<input type="checkbox" value="Si" id="copPropInmue" checked/>';
                        }else{
                            echo'<input type="checkbox" value="Si" id="copPropInmue"/>';
                        }
                        echo'
                    </div>
                    <div class="col campRec">
                        <b>Copia de permiso sanitario</b>';
                        if($recauRes["permiSant"]=="Si"){
                            echo'<input type="checkbox" value="Si" id="copPerSant" checked/>';
                        }else{
                            echo'<input type="checkbox" value="Si" id="copPerSant"/>';
                        }
                        echo'
                    </div>
                    <div class="col campRec">
                        <b>Carpeta marron</b>';
                        if($recauRes["carpMarr"]=="Si"){
                            echo'<input type="checkbox" value="Si" id="CarpMar" checked/>';
                        }else{
                            echo'<input type="checkbox" value="Si" id="CarpMar" />';
                        }
                        echo'
                    </div>
                </div>
                <div class="row">
                    <div class="col campRec">
                        <b>Carta de Solicitud</b>';
                        if($recauRes["cartSoli"]=="Si"){
                            echo'<input type="checkbox" id="carSolic" value="Si" checked>';
                        }else{
                            echo'<input type="checkbox" id="carSolic" value="Si">';
                        }
                        echo'
                        
                    <div>
                    <div class="col campRec">
                        <b>Permiso Bomberil</b>';
                        if($recauRes["permisoBom"]=="Si"){
                            echo'<input type="checkbox" id="permiBomb" value="Si" checked>';
                        }else{
                            echo'<input type="checkbox" id="permiBomb" value="Si" >';
                        }
                        echo'
                    </div>
                <div>
                <div>
                    <input onclick="btnActDat()" type="buttom" class="btn btn-primary" value="Actualizar"/>
                </div>
            </div>
        </div>';
	}
    function actDat(){

        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $comerSQL = "SELECT * FROM comercio where noExpe=".$this->numExp."";
        $busResComer = $link->query($comerSQL);
        $comerResBus = $busResComer->fetch_array();

        //BUSCAR Y ACTUALIZAR DATOS DEL COMERCIO

        $datComerSQL = "SELECT * FROM datcomer where id=".$comerResBus["fk_datComer"]."";
        $resDatComer = $link->query($datComerSQL);
        $datComerRes = $resDatComer->fetch_array();

        $upComer = "UPDATE comercio SET direccion='".$this->dirContrib."',tipo='".$this->tipEsta."', noExpe=".$this->noExpedien." where id=".$comerResBus["id"]." ";
        $link->query($upComer);

        $upDateComer = "UPDATE datcomer SET direccion='".$this->dirRegCon."',rif='".$this->rifComple."',cambDomi='".$this->camDocContrib."',capSusc='".$this->capSusContrib."',capPag='".$this->capPagContrib."',telef='".$this->telfRegCon."',tipProp='".$this->tipPropInmue."',identFisc='".$this->identFiscContrib."' where id=".$comerResBus["fk_datComer"]."";
        $link->query($upDateComer);

        $DatPropSQL = "SELECT * FROM propietario where id=".$comerResBus["fk_propietario"]."";
        $resDatProp = $link->query($DatPropSQL);
        $datPropRes = $resDatProp->fetch_array();

        $upPropSQL = "UPDATE propietario SET nombre='".$this->nomRepCon."',apellido='".$this->apelRepCon."',cedula='".$this->ceduFulRepre."',estCivil='".$this->estRegCon."',ciudadResid='".$this->cidRegCont."',direccion='".$this->dirContrib."',telef='".$this->telfRegCon."' where id=".$comerResBus["fk_propietario"]."";
        $link->query($upPropSQL);

        $upRecauSQL = "UPDATE recaudos SET regComer='".$this->copRegComerRequi."',docProp='".$this->copPropInmue."',permisoBom='".$this->permiBomb."',CopRif='".$this->copRifdRequi."',cartSoli='".$this->carSolic."',copiaCed='".$this->copCedRequi."',permiSant='".$this->copPerSant."',carpMarr='".$this->CarpMar."' where id=".$comerResBus["fk_recaudos"]."";
        $link->query($upRecauSQL);

        echo 'PROCESO COMPLETADO CON EXITO';
    }
}


?>