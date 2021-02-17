<?php

include('../comercio.php');

    $comercios = new comercios;
    
    if(isset($_POST['accion'])){
        $accion = $_POST['accion'];
    }else{
        $accion = "nada";
    }
    if(isset($_POST['nomSect'])){
        $comercios->nomSect = $_POST['nomSect'];
    }else{
        $comercios->nomSect = "nada";
    }
    if(isset($_POST['codSect'])){
        $comercios->codSect = $_POST['codSect'];
    }else{
        $comercios->codSect = "nada";
    }
    if(isset($_POST['grupNom'])){
        $comercios->grupNom = $_POST['grupNom'];
    }else{
        $comercios->grupNom = "nada";
    }
    if(isset($_POST['codGrup'])){
        $comercios->codGrup = $_POST['codGrup'];
    }else{
        $comercios->codGrup = "nada";
    }
    if(isset($_POST['grupAsoc'])){
        $comercios->grupAsoc = $_POST['grupAsoc'];
    }else{
        $comercios->grupAsoc = "nada";
    }
    if(isset($_POST['subGNom'])){
        $comercios->subGNom = $_POST['subGNom'];
    }else{
        $comercios->subGNom = "nada";
    }
    if(isset($_POST['codSubGrup'])){
        $comercios->codSubGrup = $_POST['codSubGrup'];
    }else{
        $comercios->codSubGrup = "nada";
    }
    if(isset($_POST['nomActEcon'])){
        $comercios->nomActEcon = $_POST['nomActEcon'];
    }else{
        $comercios->nomActEcon = "nada";
    }
    if(isset($_POST['CampsubGrup'])){
        $comercios->CampsubGrup = $_POST['CampsubGrup'];
    }else{
        $comercios->CampsubGrup = "nada";
    }
    if(isset($_POST['codActEcon'])){
        $comercios->codActEcon = $_POST['codActEcon'];
    }else{
        $comercios->codActEcon = "nada";
    }
    if(isset($_POST['nomRaz'])){
        $comercios->nomRaz = $_POST['nomRaz'];
    }else{
        $comercios->nomRaz = "nada";
    }
    if(isset($_POST['sectorContrib'])){
        $comercios->sectorContrib = $_POST['sectorContrib'];
    }else{
        $comercios->sectorContrib = "nada";
    }
    if(isset($_POST['dirContrib'])){
        $comercios->dirContrib = $_POST['dirContrib'];
    }else{
        $comercios->dirContrib = "nada";
    }
    if(isset($_POST['grupNom'])){
        $comercios->grupNom = $_POST['grupNom'];
    }else{
        $comercios->grupNom = "nada";
    }
    if(isset($_POST['CampsubGrup'])){
        $comercios->CampsubGrup = $_POST['CampsubGrup'];
    }else{
        $comercios->CampsubGrup = "nada";
    }
    if(isset($_POST['actEconAper'])){
        $comercios->actEconAper = $_POST['actEconAper'];
    }else{
        $comercios->actEconAper = "nada";
    }
    if(isset($_POST['rifComple'])){
        $comercios->rifComple = $_POST['rifComple'];
    }else{
        $comercios->rifComple = "nada";
    }
    if(isset($_POST['camDocContrib'])){
        $comercios->camDocContrib = $_POST['camDocContrib'];
    }else{
        $comercios->camDocContrib = "nada";
    }
    if(isset($_POST['identFiscContrib'])){
        $comercios->identFiscContrib = $_POST['identFiscContrib'];
    }else{
        $comercios->identFiscContrib = "nada";
    }
    if(isset($_POST['capPagContrib'])){
        $comercios->capPagContrib = $_POST['capPagContrib'];
    }else{
        $comercios->capPagContrib = "nada";
    }
    if(isset($_POST['capSusContrib'])){
        $comercios->capSusContrib = $_POST['capSusContrib'];
    }else{
        $comercios->capSusContrib = "nada";
    }
    if(isset($_POST['TelefContrib'])){
        $comercios->TelefContrib = $_POST['TelefContrib'];
    }else{
        $comercios->TelefContrib = "nada";
    }
    if(isset($_POST['tipEsta'])){
        $comercios->tipEsta = $_POST['tipEsta'];
    }else{
        $comercios->tipEsta = "nada";
    }
    if(isset($_POST['nomRepCon'])){
        $comercios->nomRepCon = $_POST['nomRepCon'];
    }else{
        $comercios->nomRepCon = "nada";
    }
    if(isset($_POST['apelRepCon'])){
        $comercios->apelRepCon = $_POST['apelRepCon'];
    }else{
        $comercios->apelRepCon = "nada";
    }
    if(isset($_POST['ceduFulRepre'])){
        $comercios->ceduFulRepre = $_POST['ceduFulRepre'];
    }else{
        $comercios->ceduFulRepre = "nada";
    }
    if(isset($_POST['estRegCon'])){
        $comercios->estRegCon = $_POST['estRegCon'];
    }else{
        $comercios->estRegCon = "nada";
    }
    if(isset($_POST['cidRegCont'])){
        $comercios->cidRegCont = $_POST['cidRegCont'];
    }else{
        $comercios->cidRegCont = "nada";
    }
    if(isset($_POST['dirRegCon'])){
        $comercios->dirRegCon = $_POST['dirRegCon'];
    }else{
        $comercios->dirRegCon = "nada";
    }
    if(isset($_POST['telfRegCon'])){
        $comercios->telfRegCon = $_POST['telfRegCon'];
    }else{
        $comercios->telfRegCon = "nada";
    }
    if(isset($_POST['tipPropInmue'])){
        $comercios->tipPropInmue = $_POST['tipPropInmue'];
    }else{
        $comercios->tipPropInmue = "nada";
    }
    if(isset($_POST['copCedRequi'])){
        $comercios->copCedRequi = $_POST['copCedRequi'];
    }else{
        $comercios->copCedRequi = "nada";
    }
    if(isset($_POST['copRifdRequi'])){
        $comercios->copRifdRequi = $_POST['copRifdRequi'];
    }else{
        $comercios->copRifdRequi = "nada";
    }
    if(isset($_POST['copRegComerRequi'])){
        $comercios->copRegComerRequi = $_POST['copRegComerRequi'];
    }else{
        $comercios->copRegComerRequi = "nada";
    }
    if(isset($_POST['copPropInmue'])){
        $comercios->copPropInmue = $_POST['copPropInmue'];
    }else{
        $comercios->copPropInmue = "nada";
    }
    if(isset($_POST['copPerSant'])){
        $comercios->copPerSant = $_POST['copPerSant'];
    }else{
        $comercios->copPerSant = "nada";
    }
    if(isset($_POST['CarpMar'])){
        $comercios->CarpMar = $_POST['CarpMar'];
    }else{
        $comercios->CarpMar = "nada";
    }
    if(isset($_POST['carSolic'])){
        $comercios->carSolic = $_POST['carSolic'];
    }else{
        $comercios->carSolic = "nada";
    }
    if(isset($_POST['permiBomb'])){
        $comercios->permiBomb = $_POST['permiBomb'];
    }else{
        $comercios->permiBomb = "nada";
    }
    if(isset($_POST['CampsubGrup'])){
        $comercios->CampsubGrup = $_POST['CampsubGrup'];
    }else{
        $comercios->CampsubGrup = "nada";
    }
    if(isset($_POST['noExpedien'])){
        $comercios->noExpedien = $_POST['noExpedien'];
    }else{
        $comercios->noExpedien = "nada";
    }

    if($accion=="verOpComer"){
        $comercios->verOpciones();
    }
    if($accion=="regCodigs"){
        $comercios->regCodigs();
    }
    if($accion=="regSect"){
        $comercios->regSect();
    }
    if($accion=="regForm"){
        $comercios->regForm();
    }
    if($accion=="regContrib"){
        $comercios->regContrib();
    }
    if($accion=="guardSect"){
        $comercios->guardSect();
    }
    if($accion=="grupForm"){
        $comercios->grupForm();
    }
    if($accion=="grupGuard"){
        $comercios->grupGuard();
    }
    if($accion=="subGrup"){
        $comercios->subGrup();
    }
    if($accion=="subGrupGuar"){
        $comercios->subGrupGuar();
    }
    if($accion=="actEcon"){
        $comercios->FormActEcon();
    }
    if($accion=="guarActEcon"){
        $comercios->guarActEcon();
    }
    if($accion=="subSelec"){
        $comercios->subSelec();
    }
    if($accion=="subCambio"){
        $comercios->mostActEcon();
    }
    if($accion=="guardApert"){
        $comercios->guarApert();
    }
    if($accion=="verActEconForm"){
        $comercios->verActEconForm();
    }
    if($accion=="mostCotz"){
        $comercios->mostCotz();
    }
?>