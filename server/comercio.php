<?php


class comercios{

    function contruct(){
        $nomSect = "";
        $codSect = "";
        $grupNom = "";
        $codGrup = "";
        $grupAsoc= "";
        $subGNom= "";
        $codSubGrup = "";
        $nomActEcon = "";
        $codActEcon = "";
        $nomRaz = "";
        $sectorContrib = "";
        $dirContrib = "";
        $grupNom = "";
        $actEconAper = "";
        $rifComple = "";
        $camDocContrib ="";
        $identFiscContrib ="";
        $capPagContrib ="";
        $capSusContrib = "";
        $TelefContrib = "";
        $tipEsta="";
        $nomRepCon = "";
        $apelRepCon = "";
        $ceduFulRepre = "";
        $estRegCon = "";
        $cidRegCont = "";
        $dirRegCon = "";
        $telfRegCon = "";
        $tipPropInmue = "";
        $copCedRequi="";
        $copRifdRequi="";
        $copRegComerRequi="";
        $copPropInmue="";
        $copPerSant="";
        $CarpMar="";
        $carSolic="";
        $permiBomb="";
        $CampsubGrup = "";
        $noExpedien = "";
    }
    function verOpciones(){
        echo'
        
            <div class="container-fluid opciones">
                <div class="row">
                    <div class="col">
                        <button onclick="btnRegForm()" class="btn btn-primary">COMERCIOS</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary">LISTAR</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary">MODIFICAR</button>
                    </div>
                    <div class="col">
                        <button onclick="btnRegCodigs()" class="btn btn-primary">CODIGOS</button>
                    </div>
                </div>
            </div>
        
        ';
    }
    function regCodigs(){
        echo'
        
            <div class="container-fluid opciones" >
                <div class="row">
                    <div class="col">
                        <button onclick="FormRegSect()" class="btn btn-primary">Sectores</button>
                    </div>
                    <div class="col">
                        <button onclick="btnGrupForm()" class="btn btn-primary">Grupo de Act. Econ</button>
                    </div>
                    <div class="col">
                        <button onclick="btnSubGrup()" class="btn btn-primary">Sub-Grupo de Act. Econ</button>
                    </div>
                    <div class="col">
                        <button onclick="btnActEcon()" class="btn btn-primary">Actividad Economica</button>
                    </div>
                </div>
            </div>
        ';
    }
    function regSect(){
        echo'
        
            <div class="container espacReduc">
                <div class="row">
                    <div class="col titSect">
                        <h3>REGISTRO DEL SECTOR</h3>
                    </div>
                </div>
                <div class="row regSector">
                    <div class="col campRec">
                        <b>Sector</b>
                    </div>
                    <div class="col campRec">
                        <input type="text" class="tamCamp" id="sectRec" />
                    </div>
                    <div class="col campRec">
                        <b>Codigo</b>
                    </div>
                    <div class="col campRec">
                        <input type="text" class="tamCamp" id="codSectRec" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 btn-guard">
                        <button onclick="btnGuarSect();" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        
        ';
    }
    function guardSect(){

        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $veriSecSQL = "SELECT COUNT(*) FROM sector where codSect='".$this->codSect."'";
        $resVeriSect = $link->query($veriSecSQL);
        $veriSectRes = $resVeriSect->fetch_array();
        if($veriSectRes["COUNT(*)"] !=0){
            echo 'hola';
        }else{
            $insSect= "INSERT INTO sector(codSect,nombre)value('".$this->codSect."','".$this->nomSect."')";
            $link->query($insSect);
            $this->regSect();
            echo'PROCESO COMPETADO CON EXITO';
        }
    }
    function grupForm(){
        echo'
            <div class="container espacReduc">
                <div class="row">
                    <div class="col titSect">
                        <h3>REGISTRO DEL GRUPO DE LA ACT. ECON</h3>
                    </div>
                </div>
                <div class="row regSector">
                    <div class="col campRec">
                        <b>Grupo</b>
                    </div>
                    <div class="col campRec">
                        <input type="text" class="tamCamp" id="grupNom" />
                    </div>
                    <div class="col campRec">
                        <b>Codigo</b>
                    </div>
                    <div class="col campRec">
                        <input type="text" class="tamCamp" id="codGrup" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 btn-guard">
                        <button onclick="btnGrupGuard();" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        
        ';
    }
    function grupGuard(){   
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $grupSQL = "SELECT COUNT(*) FROM grupo where codigo='".$this->codGrup."'";
        $resGrup = $link->query($grupSQL);
        $grupRes = $resGrup->fetch_array();

        if($grupRes["COUNT(*)"] == 0){
            $grupInser="INSERT INTO grupo(codigo,nombre)value('".$this->codGrup."','".$this->grupNom."')";
            $link->query($grupInser);
            $this->grupForm();
            echo'PROCESO COMPLETADO CON EXITO';
        }
    }
    function subGrup(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        echo'
        
            <div class="container espacReduc2">
            <div class="row">
                <div class="col titSect">
                    <h3>REGISTRO DEL SUB-GRUPO DE LA ACT. ECON</h3>
                </div>
            </div>
            <div class="row regSector">
                <div class="col campRec">
                    <b>Grupo Asociado</b>
                </div>
                <div class="col campRec">
                    <select id="grupAsoc">
                        <option></option>';
                    $grupSQL = "SELECT * FROM grupo";
                    $resGrup = $link->query($grupSQL);

                    while($grupRes = $resGrup->fetch_array()){
                        echo'
                            <option value="'.$grupRes["id"].'">'.$grupRes["nombre"].'</option>
                        ';
                    }
                       
                        echo'
                    </select>
                </div>
                <div class="col campRec">
                    <b>Sub-Grupo</b>
                </div>
                <div class="col campRec">
                    <input type="text" class="tamCamp" id="subGNom" />
                </div>
                <div class="col campRec">
                    <b>Codigo</b>
                </div>
                <div class="col campRec">
                    <input type="text" class="tamCamp" id="codSubGrup" />
                </div>
            </div>
            <div class="row">
                <div class="col-12 btn-guard">
                    <button onclick="btnSubGrupGuard();" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        ';
    }
    function subGrupGuar(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $verSubSQL = "SELECT COUNT(*) FROM subgrupo where codigo='".$this->codSubGrup."'";
        $resSub = $link->query($verSubSQL);
        $subRes = $resSub->fetch_array();

        if($subRes["COUNT(*)"]==0){
            $insSub= "INSERT INTO subgrupo(codigo,nombre,fk_grupos)value('".$this->codSubGrup."','".$this->subGNom."',".$this->grupAsoc.")";
            $link->query($insSub);
            $this->subGrup();
            echo'PROCESO COMPLETADO CON EXITO';
        }
    }
    function FormActEcon(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $grupSQL = "SELECT * FROM grupo";
        $resGrup = $link->query($grupSQL);

        echo'
        
        <div class="container espacReduc2">
        <div class="row">
            <div class="col titSect">
                <h3>REGISTRO DE ACTIVIDAD ECONOMICA</h3>
            </div>
        </div>
        <div class="row regSector">
            <div class="col campRec">
                <b>Act. Economica</b>
            </div>
            <div class="col campRec">
                <input type="text" class="campos tamCamp" id="nomActEcon"/>
            </div>
            <div class="col campRec">
                <b>Grupo</b>
            </div>
            <div class="col campRec">
                <select id="grupNom" onchange="btnSubSelec()">
                    <option></option>';
                while($grupRes = $resGrup->fetch_assoc()){
                    echo'<option value="'.$grupRes["id"].'" >'.$grupRes["nombre"].'</option>';
                }
            echo'</select>
            </div>
            <div class="col campRec">
                <b>Sub-Grupo</b>
            </div>
            <div class="col campRec">
                <select id="CampsubGrup">
                    <option value="0"></option>
                </select>
            </div>
            <div class="col campRec">
                <b>Codigo</b>
            </div>
            <div class="col campRec">
                <input type="text" class="campos tamCamp" id="codActEcon" />
            </div>
        </div>
        <div class="row">
            <div class="col-12 btn-guard">
                <button onclick="btnGuarActEcon();" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        </div>

        ';

    }
    function guarActEcon(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $guardSQL = "SELECT COUNT(*) FROM actEcon where codAct='".$this->codActEcon."' and fk_grupo=".$this->grupNom." and fk_subGrup=".$this->CampsubGrup."";
        $resGuarAct = $link->query($guardSQL);
        $actRes = $resGuarAct->fetch_assoc();
        if($actRes["COUNT(*)"]==0){
            $inActSQL = "INSERT INTO actEcon(fk_grupo,fk_subgrup,codAct,nombre)value(".$this->grupNom.",".$this->CampsubGrup.",'".$this->codActEcon."','".$this->nomActEcon."')";
            $link->query($inActSQL);
            $this->regCodigs();
        }
    }
    function subSelec(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $subGrupSQL = "SELECT * FROM subgrupo where fk_grupos=".$this->grupNom."";
        $resSubGrup = $link->query($subGrupSQL);
            echo'<option value="0">Sub-Grupo</option>';
        while($subGrupRes = $resSubGrup->fetch_array()){
            echo'<option value="'.$subGrupRes["id"].'">'.$subGrupRes["nombre"].'</option>';
        }
    }
    function regForm(){
        echo'
        <div class="container-fluid opciones">
            <div class="row">
                <div class="col">
                    <button onclick="btnRegContrib()" class="btn btn-primary">APERTURAS</button>
                </div>
                <div class="col">
                    <button onclick="btnMostCotz()" class="btn btn-primary">COTIZACION</button>
                </div>
                <div class="col">
                    <button onclick="btnMostLiq()" class="btn btn-primary">LIQUIDACION</button>
                </div>
                <div class="col">
                    <button onclick="btnLicAct()" class="btn btn-primary">Lic. Actividad Economica</button>
                </div>
                <div class="col">
                    <button onclick="btnImpriApertu()" class="btn btn-primary" >IMPRIMIR</button>
                </div>
            </div>
        </div>
            
        ';
    }
    function regContrib(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $busSectSQL = "SELECT * FROM sector";
        $resSectBus = $link->query($busSectSQL);

        echo'
        
            <div class="container-fluid espacReduc2">
                <div class="row">
                    <div class="col-12 titSect">
                        <h4>DATOS DEL CONTRIBUYENTE</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col campRec">
                        <b>Nombre o Razon Social</b>
                    </div>
                    <div class="col campRec">
                        <input type="text" class="campos" id="nomRaz">
                    </div>
                    <div class="col-1 campRec">
                        <b>Sector</b>
                    </div>
                    <div class="col-3 campRec">
                        <select id="sectorContrib">
                            <option value="0"></option>';
                        while($sectRes = $resSectBus->fetch_array()){
                            echo'<option value="'.$sectRes["codSect"].'">'.$sectRes["nombre"].'</option>';
                        }
                        echo'</select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 campRec">
                        <b>Direcci&oacute;n</b>
                    </div>
                    <div class="col campRec">
                        <input type="text" class="campos" id="dirContrib">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 campRec">
                        <b>Act. Economica</b>
                    </div>
                    <div class="col campRec">
                        <select id="grupNom" onchange="btnSubSelec()">
                            <option value="0">Grupo</option>';
                    $grupSQL = "SELECT * FROM grupo";
                    $resGrup = $link->query($grupSQL);

                    while($grupRes = $resGrup->fetch_array()){
                        echo'<option value="'.$grupRes["id"].'">'.$grupRes["nombre"].'</option>';
                    }
                        
                    echo'
                        </select>
                        <select id="CampsubGrup" onchange="VerActEconAper()">
                            <option value="0">Sub-Grupo</option>
                        </select>
                        <select id="actEconAper">
                            <option value="0">Act. Economica</option>
                        </select>
                    </div>
                    <div class="col-2 campRec">
                        <b>Nº Expediente</b>
                    </div>
                    <div class="col campRec">
                        <input type="text" class="campos" id="noExpedien" />
                    </div>
                </div>
                <div class="row">
                    <div class="col campRec">
                        <b>Rif</b>
                    </div>
                    <div class="col campRec">
                        <select id="rifCodComer">
                            <option value="0"></option>
                            <option value="V">V</option>
                            <option value="E">E</option>
                            <option value="P">P</option>
                            <option value="J">J</option>
                            <option value="G">G</option>
                        </select>
                        <input type="text" id="rifComer" class="campos" >
                    </div>
                    <div class="col campRec">
                        <b>Nro. de Identificacion Fiscal</b>
                    </div>
                    <div class="col campRec">
                        <input type="text" class="campos" id="identFiscContrib">
                    </div>
                    <div class="col campRec">
                        <b>Capital Pagado</b>
                    </div>
                    <div class="col campRec">
                        <input type="text" class="campos" id="capPagContrib">
                    </div>
                </div>
                <div class="row">
                    <div class="col campRec">
                        <b>Capital suscrito</b>
                    </div>
                    <div class="col campRec">
                        <input type="text" class="campos" id="capSusContrib">
                    </div>
                    <div class="col campRec">
                        <b>Telefono</b>
                    </div>
                    <div class="col campRec">
                        <input type="text" id="TelefContrib">
                    </div>
                </div>
                <div class="row">
                    <div class="col campRec">
                        <b>Cambio de Domicilio</b>
                        <select id="camDocContrib">
                            <option value="0"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                        </div>
                        <div class="col campRec">
                        <b>Establecimiento</b>
                    </div>
                        <div class="col campRec">
                            <select id="tipEsta">
                                <option></option>
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
                        <input type="text" class="campos" id="nomRepCon">
                    </div>
                    <div class="col campRec">
                        <b>Apellido</b>
                    </div>
                    <div class="col campRec">
                        <input type="text" class="campos" id="apelRepCon">
                    </div>
            </div>
            <div class="row">
                    <div class="col campRec">
                        <b>Cedula</b>
                    </div>
                    <div class="col campRec">
                        <select id="codCedRepre">
                            <option value="0"></option>
                            <option value="0">V</option>
                            <option value="0">E</option>
                        </select>
                        <input type="text" class="campos" id="numCedRep">
                    </div>
                    <div class="col campRec">
                        <b>Estado Civil</b>
                    </div>
                    <div class="col campRec">
                        <select id="estRegCon">
                            <option value="0"></option>
                            <option value="Soltera(o)">Soltera(o)</option>
                            <option value="Casado(a)">Casado(a)</option>
                            <option value="Viuda(o)">Viuda(o)</option>
                          </select>
                    </div>
                    <div class="col campRec">
                        <b>Ciudad de Residencia</b>
                    </div>
                    <div class="col campRec">
                        <input type="text" class="campos" id="cidRegCont"/>
                    </div>
            </div>
            <div class="row">
                    <div class="col campRec">
                        <b>Dirección</b>
                    </div>
                    <div class="col campRec">
                        <input type="text" class="campos" id="dirRegCon">
                    </div>
                    <div class="col campRec">
                        <b>Telefono</b>
                    </div>
                    <div class="col campRec">
                        <input type="text" class="campos" id="telfRegCon">
                    </div>
            </div>
            <div class="row">
                <div class="col campRec">
                    <b>Propiedad</b>
                    <select id="tipPropInmue">
                        <option></option>
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
                    <b>Copia de Cedula</b>
                    <input type="checkbox" id="copCedRequi" value="Si">
                </div>
                <div class="col-3 campRec">
                    <b>Copia de RIF</b>
                    <input type="checkbox" id="copRifdRequi" value="Si">
                </div>
                <div class="col campRec">
                    <b>Copia de Registro de comercio / o Declaracion Jurada</b>
                    <input type="checkbox" id="copRegComerRequi" value="Si">
                </div>
            </div>
            <div class="row">
                <div class="col campRec">
                    <b>Copia de propiedad del inmueble / contrato de arrendamiento</b>
                    <input type="checkbox" value="Si" id="copPropInmue"/>
                </div>
                <div class="col campRec">
                    <b>Copia de permiso sanitario</b>
                    <input type="checkbox" value="Si" id="copPerSant"/>
                </div>
                <div class="col campRec">
                    <b>Carpeta marron</b>
                    <input type="checkbox" value="Si" id="CarpMar"/>
                </div>
            </div>
            <div class="row">
                <div class="col campRec">
                    <b>Carta de Solicitud</b>
                    <input type="checkbox" id="carSolic" value="Si">
                <div>
                <div class="col campRec">
                    <b>Permiso Bomberil</b>
                    <input type="checkbox" id="permiBomb" value="Si">
                </div>
            <div>
            <div>
                <input onclick="btnGuarApert()" type="buttom" class="btn btn-primary" value="Guardar"/>
            </div>
        </div>';
    }
    function mostActEcon(){

        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $actSql = "SELECT * FROM actEcon INNER JOIN grupo INNER JOIN subgrupo where fk_grupo=".$this->grupNom."$ AND fk_subGrup=".$this->CampsubGrup."";
        $resAct =  $link->query($actSql);
        echo'<option value="0"></option>';
        while($actRes = $resAct->fetch_array()){
            echo' 
                <option value="'.$actRes["fk_grupo"].'">'.$actRes["grupo.nombre"].'</option>
            ';
        }
    }
    function guarApert(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $datProp = "INSERT INTO propietario(nombre,apellido,cedula,estCivil,ciudadResid,direccion,telef)VALUE('".$this->nomRepCon."','".$this->apelRepCon."','".$this->ceduFulRepre."','".$this->estRegCon."','".$this->cidRegCont."','".$this->dirRegCon."','".$this->telfRegCon."')";
        $link->query($datProp);
        $fk_prop= $link->insert_id;

        $datComer ="INSERT INTO datcomer(direccion,rif,cambDomi,capSusc,capPag,telef,tipProp,identFisc)VALUE('".$this->dirContrib."','".$this->rifComple."','".$this->camDocContrib."','".$this->capSusContrib."','".$this->capPagContrib."','".$this->TelefContrib."','".$this->tipEsta."','".$this->identFiscContrib."')";
        $link->query($datComer);
        $fk_darComer= $link->insert_id;

        $recauSQL = "INSERT INTO recaudos(regComer,docProp,permisoBom,copRif,cartSoli,copiaCed,permiSant,carpMarr)value('".$this->copRegComerRequi."','".$this->copPropInmue."','".$this->permiBomb."','".$this->copRifdRequi."','".$this->carSolic."','".$this->copCedRequi."','".$this->copPerSant."','".$this->CarpMar."')";
        $link->query($recauSQL);
        $fk_recaudos=$link->insert_id;

        $codGrupSQL = "SELECT * FROM grupo where id='".$this->grupNom."' ";
        $resCodGrup = $link->query($codGrupSQL);
        $codGrupRes = $resCodGrup->fetch_array();

        $subGrupCod = "SELECT * FROM subgrupo where id=".$this->CampsubGrup."";
        $resSubGrup = $link->query($subGrupCod);
        $subGrupRes = $resSubGrup->fetch_array();

        $comerSQL = "INSERT INTO comercio(nombre,fk_propietario,fk_sector,fk_datComer,tipo,fk_recaudos,fk_actEcon,noExpe)value('".$this->nomRaz."',".$fk_prop.",".$this->sectorContrib.",".$fk_darComer.",'".$this->tipPropInmue."',".$fk_recaudos.",".$this->actEconAper.",".$this->sectorContrib."".$codGrupRes["codigo"]."".$subGrupRes["codigo"]."".$this->noExpedien.")";
        $link->query($comerSQL);

        echo'
            <h2>SU NUMERO DE EXPEDIENTE ES : '.$this->sectorContrib."".$codGrupRes["codigo"]."".$subGrupRes["codigo"]."".$this->noExpedien.'</h2>
        ';
    }
    function verActEconForm(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $actEconSQL = "SELECT * FROM actEcon where fk_subGrup=".$this->CampsubGrup."";
        $resActEcon = $link->query($actEconSQL);
        echo'
            <option value="0">Act. Economica</option>
        ';
        while($actEconRes = $resActEcon->fetch_array()){
            echo'
                <option value="'.$actEconRes["id"].'">'.$actEconRes["nombre"].'</option>
            ';
        }
    }
    function mostCotz(){
        echo'
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
                    <input type="text" id="minTrib" class="campos tamCamp"/>
                </div>
                <div class="col campRec">
                    <b>Aforo</b>
                </div>
                <div class="col campRec">
                    <input type="text" id="aforo" class="campos tamCamp"/>
                </div>
                <div class="col campRec">
                    <b>Petro en Bs.</b>
                </div>
                <div class="col campRec">
                    <input type="text" id="petroBs" class="campos tamCamp"/>
                </div>
            </div>
            <div class="row">
                <div class="col campRec">
                    <b>Act. Económica </b>
                </div>
                <div class="col campRec">
                    <input type="text" id="montActEcon" class="campos tamCamp">
                </div>
                <div class="col campRec">
                    <b>Cerficado Bomberil</b>
                </div>
                <div class="col campRec">
                    <input type="text" id="montCertBom" class="campos tamCamp">
                </div>
                <div class="col campRec">
                    <b>Solvencia</b>
                </div>
                <div class="col campRec">
                    <input type="text" id="montSolv" class="campos tamCamp">
                </div>
            </div>
            <div class="row">
                <div class="col campRec">
                    <b>Publicidad y Propaganda</b>
                </div>
                <div class="col campRec">
                    <input type="text" class="campos tamCamp" id="montPubProp">
                </div>
                <div class="col campRec">
                    <b>Renovación de Licencia de licores</b>
                </div>
                <div class="col campRec">
                    <input type="text" class="campos tamCamp" id="montRenovLicLic">
                </div>
                <div class="col campRec">
                    <b>Aseo Urbano</b>
                </div>
                <div class="col campRec">
                    <input type="text" class="campos tamCamp" id="montAseo">
                </div>
            </div>
            <div class="row">
                <div class="col campRec">
                    <b>Uso Conforme</b>
                </div>
                <div class="col campRec">
                    <input type="text" class="campos tamCamp" id="montUsoConf">
                </div>
                <div class="col campRec">
                    <b>Catastro</b>
                </div>
                <div class="col campRec">
                    <input type="text" class="campos tamCamp" id="montCatast">
                </div>
                <div class="col campRec">
                    <b>Tasa Administrativa</b>
                </div>
                <div class="col campRec">
                    <input type="text" class="campos tamCamp" id="montTasaAdmin">
                </div>
            </div>
            <div class="row">
                <div class="col campRec">
                    <b>Expediente Asoc.</b>
                </div>
                <div class="col campRec">
                    <input type="text" class="campos tamCamp" id="numExpAsoc">
                </div>
                <div class="col campRec">
                    <b>Planta Electrica</b>
                </div>
                <div class="col campRec">
                    <select id="plantElect">
                        <option value="0"></option>
                        <option value="si">SI</option>
                        <option value="no">NO</option>
                    </select>
                </div>
                <div class="col-2 ">
                    <input type="buttom" class="btn btn-primary" value="Guardar" onclick="btnGuarCotiz()">
                </div>
            </div>
        </div>';
    }
    function formLic(){
        echo '
        <div class="container-fluid espacReduc2">
            <div class="row">
                <div class="col titSect">
                    <h3>INGRESE EL NUMERO DE EXPEDIENTE</h3>
                </div>
                <div class="col campRec">
                    <input type="text" id="camExpBus" class="campos tamCamp"/>  
                </div>
                <div class="col campRec">
                    <input type="text" id="correExp" class="canois tamCamp" />
                </div>
            </div>
            <div class="row">
                <div class="col campRec">
                    <button class="btn btn-primary" onclick="btnImprLic()">Buscar</button> 
                </div>
            </div>
        </div>
        
        ';
    }
}


?>