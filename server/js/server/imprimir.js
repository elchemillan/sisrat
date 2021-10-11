class imprimir{

	aperturas(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "./server/recib/recImpri.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`accion=FormImpri`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
	}

	imprimirDat(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "./server/recib/recImpri.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`noExpediente=${this.noExpediente}&accion=impriDat`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                	
                    divsitioform.innerHTML = ajax.responseText;
                    let rutaPdf = document.getElementById("rutaPdf").value
                    document.getElementById("campEscrit").innerHTML=`<div class='campDat'><embed id="embedPdf" src="${rutaPdf}" type="application/pdf"></div>`;
                   
			     }
	       	}
	}
	guarCotiz(){
        var ajax = new objetoAjax();
        var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
        divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
        ajax=objetoAjax();
        ajax.open("POST", "./server/recib/recImpri.php",true);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`minTrib=${this.minTrib}&plantElect=${this.plantElect}&aforo=${this.aforo}&petroBs=${this.petroBs}&montActEcon=${this.montActEcon}&montCertBom=${this.montCertBom}&montSolv=${this.montSolv}&montPubProp=${this.montPubProp}&montRenovLicLic=${this.montRenovLicLic}&montAseo=${this.montAseo}&montUsoConf=${this.montUsoConf}&montCatast=${this.montCatast}&montTasaAdmin=${this.montTasaAdmin}&numExpAsoc=${this.numExpAsoc}&accion=guarCotiz`); 
        ajax.onreadystatechange=function()
            {
            if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
                    let rutaPdf = document.getElementById("rutaPdf").value
                    document.getElementById("campEscrit").innerHTML=`<div class='campDat'><embed id="embedPdf" src="${rutaPdf}" type="application/pdf"></div>`;
                 }
            }
    }
    mostLiq(){
    	var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "./server/recib/recImpri.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`&accion=mostLiq`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                	
                    divsitioform.innerHTML = ajax.responseText;
			     }
	       	}
    }
    guarLiquid(){
    	var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "./server/recib/recImpri.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`ingreBrut=${this.ingreBrut}&ingreOtro=${this.ingreOtro}&totalIngre=${this.totalIngre}&procentOrdenan=${this.procentOrdenan}&minTribAnu=${this.minTribAnu}&expAsoc=${this.expAsoc}&accion=guarLiquid`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                	
                    divsitioform.innerHTML = ajax.responseText;
                    let rutaPdf = document.getElementById("rutaPdf").value
                    document.getElementById("campEscrit").innerHTML=`<div class='campDat'><embed id="embedPdf" src="${rutaPdf}" type="application/pdf"></div>`;
			     }
	       	}
    }
    imprLicAct(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "./server/recib/recImpri.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`camExpBus=${this.camExpBus}&correExp=${this.correExp}&accion=imprLic`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                	
                    divsitioform.innerHTML = ajax.responseText;
                    let rutaPdf = document.getElementById("rutaPdf").value
                    document.getElementById("campEscrit").innerHTML=`<div class='campDat'><embed id="embedPdf" src="${rutaPdf}" type="application/pdf"></div>`;
			     }
	       	}
    }
    actDat(){
        var ajax = new objetoAjax();
        var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
        divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
        ajax=objetoAjax();
        ajax.open("POST", "server/recib/recImpri.php",true);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`nomRaz=${this.nomRaz}&noExpedien=${this.noExpedien}&sectorContrib=${this.sectorContrib}&dirContrib=${this.dirContrib}&grupNom=${this.grupNom}&CampsubGrup=${this.CampsubGrup}&actEconAper=${this.actEconAper}&rifComple=${this.rifComple}&camDocContrib=${this.camDocContrib}&identFiscContrib=${this.identFiscContrib}&capPagContrib=${this.capPagContrib}&capSusContrib=${this.capSusContrib}&TelefContrib=${this.TelefContrib}&tipEsta=${this.tipEsta}&nomRepCon=${this.nomRepCon}&apelRepCon=${this.apelRepCon}&ceduFulRepre=${this.ceduFulRepre}&estRegCon=${this.estRegCon}&cidRegCont=${this.cidRegCont}&dirRegCon=${this.dirRegCon}&telfRegCon=${this.telfRegCon}&tipPropInmue=${this.tipPropInmue}&copCedRequi=${this.copCedRequi}&copRifdRequi=${this.copRifdRequi}&copRegComerRequi=${this.copRegComerRequi}&copPropInmue=${this.copPropInmue}&copPerSant=${this.copPerSant}&CarpMar=${this.CarpMar}&carSolic=${this.carSolic}&permiBomb=${this.permiBomb}&numExp=${this.numExp}&copRegComerRequi=${this.copRegComerRequi}&accion=actDat`); 
        ajax.onreadystatechange=function()
            {
            if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
                 }
            }
    }
}

function btnImpriApertu(){
	let imprim = new imprimir
	imprim.aperturas();
}
function btnImprimirDat(){
	let imprim = new imprimir
	imprim.noExpediente = document.getElementById("noExpediente").value;
	imprim.imprimirDat();
}
function btnGuarCotiz(){
    let imprim = new imprimir
    imprim.minTrib = document.getElementById("minTrib").value
    imprim.aforo = document.getElementById("aforo").value
    imprim.petroBs = document.getElementById("petroBs").value
    imprim.montActEcon = document.getElementById("montActEcon").value
    imprim.montCertBom = document.getElementById("montCertBom").value
    imprim.montSolv = document.getElementById("montSolv").value
    imprim.montPubProp = document.getElementById("montPubProp").value
    imprim.montRenovLicLic = document.getElementById("montRenovLicLic").value
    imprim.montAseo = document.getElementById("montAseo").value
    imprim.montUsoConf = document.getElementById("montUsoConf").value
    imprim.montCatast = document.getElementById("montCatast").value
    imprim.montTasaAdmin = document.getElementById("montTasaAdmin").value
    imprim.numExpAsoc = document.getElementById("numExpAsoc").value
    imprim.plantElect = document.getElementById("plantElect").value
    imprim.guarCotiz()

}
function btnMostLiq(){
	let imprim = new imprimir
	imprim.mostLiq();
}
function btnGuarLiquid(){
	let imprim = new imprimir
	imprim.ingreBrut = document.getElementById("ingreBrut").value
	imprim.ingreOtro = document.getElementById("ingreOtro").value
	imprim.totalIngre = document.getElementById("totalIngre").value
	imprim.procentOrdenan = document.getElementById("procentOrdenan").value
	imprim.minTribAnu = document.getElementById("minTribAnu").value
	imprim.expAsoc = document.getElementById("expAsoc").value
	imprim.guarLiquid()
}
function btnImprLic(){
    let imprim = new imprimir
    imprim.camExpBus = document.getElementById("camExpBus").value
    imprim.correExp = document.getElementById("correExp").value
    imprim.imprLicAct();
}
function btnActDat(){
    let imprim = new imprimir
    imprim.nomRaz = document.getElementById("nomRaz").value
    imprim.sectorContrib = document.getElementById("sectorContrib").value
    imprim.dirContrib = document.getElementById("dirContrib").value
    imprim.grupNom = document.getElementById("grupNom").value
    imprim.CampsubGrup = document.getElementById("CampsubGrup").value
    imprim.actEconAper = document.getElementById("actEconAper").value
    imprim.noExpedien = document.getElementById("noExpedien").value

    //UNIR DATOS DE RIF
    rifCodComer = document.getElementById("rifCodComer").value
    rifComer = document.getElementById("rifComer").value
    imprim.rifComple =`${rifCodComer}|${rifComer}`

    imprim.identFiscContrib = document.getElementById("identFiscContrib").value
    imprim.capPagContrib = document.getElementById("capPagContrib").value
    imprim.capSusContrib = document.getElementById("capSusContrib").value
    imprim.TelefContrib = document.getElementById("TelefContrib").value
    imprim.camDocContrib = document.getElementById("camDocContrib").value
    imprim.tipEsta = document.getElementById("tipEsta").value
    imprim.nomRepCon = document.getElementById("nomRepCon").value
    imprim.apelRepCon = document.getElementById("apelRepCon").value

    //UNIR CEDULA
    codCedRepre = document.getElementById("codCedRepre").value
    numCedRep = document.getElementById("numCedRep").value
    imprim.ceduFulRepre =`${codCedRepre}|${numCedRep}`

    imprim.estRegCon = document.getElementById("estRegCon").value
    imprim.cidRegCont = document.getElementById("cidRegCont").value
    imprim.dirRegCon = document.getElementById("dirRegCon").value
    imprim.telfRegCon = document.getElementById("telfRegCon").value
    imprim.tipPropInmue = document.getElementById("tipPropInmue").value
    copCedRequi = document.getElementById("copCedRequi").checked
    copRifdRequi = document.getElementById("copRifdRequi").checked
    copRegComerRequi = document.getElementById("copRegComerRequi").checked
    copPropInmue = document.getElementById("copPropInmue").checked
    copPerSant = document.getElementById("copPerSant").checked
    CarpMar = document.getElementById("CarpMar").checked
    carSolic = document.getElementById("carSolic").checked
    permiBomb = document.getElementById("permiBomb").checked
    if(copCedRequi==true){
        imprim.copCedRequi=document.getElementById("copCedRequi").value
    }else{
        imprim.copCedRequi ="nada"
    }
    if(copRifdRequi==true){
        imprim.copRifdRequi=document.getElementById("copRifdRequi").value
    }else{
        imprim.copRifdRequi="nada"
    }
    if(copPropInmue==true){
        imprim.copPropInmue=document.getElementById("copPropInmue").value
    }else{
        imprim.copPropInmue = "nada"
    }
    if(copPerSant==true){
        imprim.copPerSant=document.getElementById("copPerSant").value
    }else{
        imprim.copPerSant="nada"
    }
    if(CarpMar==true){
        imprim.CarpMar=document.getElementById("CarpMar").value
    }else{
        imprim.CarpMar="nada"
    }
    if(carSolic==true){
        imprim.carSolic=document.getElementById("carSolic").value
    }else{
        imprim.carSolic="nada"
    }
    if(copRegComerRequi==true){
        imprim.copRegComerRequi=document.getElementById("copRegComerRequi").value
    }else{
        imprim.copRegComerRequi="nada"
    }
    if(permiBomb==true){
        imprim.permiBomb=document.getElementById("permiBomb").value
    }else{
        imprim.permiBomb="nada"
    }
    imprim.numExp = document.getElementById("numExp").value
    imprim.actDat()
}