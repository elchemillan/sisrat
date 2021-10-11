<?php

class estructura{

    function head(){
        echo'
        <nav class="menuFloat">
            <div class="row">
                <div class="col ">
                        <form>
                            <button  class="btn btn-primary botonTama">Inicio</button>
                        </form>
                    </div>
            </div>
            <div class="row">
                <div class="col">
                    <button onclick="btnVerOpComer();" class=" btn btn-primary botonTama">Comercio</button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button onclick="btnMenuUser()" class=" btn btn-primary botonTama">Usuario</button>
                </div>
            </div>
            <div class="row">
                <div class="col ">
                    <button onclick="btnReporOp()" class="btn btn-primary botonTama">Reportes</button>
                </div>
            </div>
        </nav>
        ';
    }
    function body(){
        echo'
            <img class="logoFondo"  src="assets/logo_ajustado.png"></img>
            <div id="campEscrit" class="container escritorio opciones">
                <div class="row">
                    <div class="col-3 titSect textCenter" >
                        <h3>BUSCAR</h3>
                    </div>
                    <div class="col campRec">
                        <input type="text" id="numExp"/>
                    </div>
                    <div class="col-2 textCenter">
                        <button class="btn btn-primary " onclick="btnBuscar()" />Buscar</buttom>
                    </div>
                </div>
            </div>
        ';

    }
    function footer(){
        echo'
            <div>
                <div class="col firma ">
                    <img class="" src="./assets/logojimcodev3.png"></img> 
                </div>
            </div>
        ';
    }

}


?>