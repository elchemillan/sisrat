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
        ajax.send(`camExpBus=${this.camExpBus}&accion=imprLic`); 
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
    imprim.imprLicAct();
}