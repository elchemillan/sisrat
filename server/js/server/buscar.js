class busquedas{

	contruct(){
		numExp = "";
	}

	buscarExp(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "./server/recib/recBusque.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`numExp=${this.numExp}&accion=buscarExpediente`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
	}
	imprPat(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "./server/recib/recImpri.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`camExpBus=${this.numExp}&accion=imprLic`); 
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
	impLiq(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "./server/recib/recImpri.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`noExpediente=${this.numExp}&oper=VERPLANILLA&accion=guarLiquid`); 
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
	cotzImpr(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('espacModif');
        var divsitiomaterial = document.getElementById('espacModif');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "./server/recib/recImpri.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`noExpediente=${this.numExp}&oper=VERPLANILLA&accion=guarCotiz`); 
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
	modExp(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('espacModif');
        var divsitiomaterial = document.getElementById('espacModif');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "./server/recib/recBusque.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`accion=modifExp`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;    
                }
	       	}
	}
	liqudFormModf(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "./server/recib/recImpri.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`numExp=${this.numExp}&accion=formModfLiquid`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;    
                }
	       	}
	}
	ActLiquid(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "./server/recib/recImpri.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`ingreBrut=${this.ingreBrut}&ingreOtro=${this.ingreOtro}&totalIngre=${this.totalIngre}&procentOrdenan=${this.procentOrdenan}&minTribAnu=${this.minTribAnu}&expAsoc=${this.expAsoc}&liquidacion=${this.liquidacion}&accion=ActLiquid`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;    
                }
	       	}
	}
	cotzMod(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "./server/recib/recImpri.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`numExp=${this.numExp}&accion=cotzMod`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;    
                }
	       	}
	}
	UpCotz(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "./server/recib/recImpri.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`idCotz=${this.idCotz}&minTrib=${this.minTrib}&aforo=${this.aforo}&petroBs=${this.petroBs}&montActEcon=${this.montActEcon}&montCertBom=${this.montCertBom}&montSolv=${this.montSolv}&montPubProp=${this.montPubProp}&montRenovLicLic=${this.montRenovLicLic}&montAseo=${this.montAseo}&montUsoConf=${this.montUsoConf}&montCatast=${this.montCatast}&montTasaAdmin=${this.montTasaAdmin}&plantElect=${this.plantElect}&accion=upCotz`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;    
                }
	       	}
	}
	mostDat(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "./server/recib/recImpri.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`numExp=${this.numExp}&accion=mostDat`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;    
                }
	       	}
	}
}

function btnBuscar(){
	let busque = new busquedas
	busque.numExp = document.getElementById('numExp').value
	busque.buscarExp()
}
function btnImprPat(){
	let busque = new busquedas
	busque.numExp = document.getElementById("numExp").value;
	busque.imprPat();
}
function btnImpLiq(){
	let busque = new busquedas
	busque.numExp = document.getElementById('numExp').value
	busque.impLiq();
}
function btnCotzImpr(){
	let busque = new busquedas
	busque.numExp = document.getElementById('numExp').value
	busque.cotzImpr();
}
function btnModf(){
	let busque = new busquedas
	busque.modExp();
}
function btnLiquid(){
	let busque = new busquedas
	busque.numExp = document.getElementById("numExp").value
	busque.liqudFormModf();
}
function btnActLiquid(){
	let busque = new busquedas
	busque.ingreBrut = document.getElementById("ingreBrut").value;
	busque.ingreOtro = document.getElementById("ingreOtro").value;
	busque.totalIngre = document.getElementById("totalIngre").value;
	busque.procentOrdenan = document.getElementById("procentOrdenan").value;
	busque.minTribAnu = document.getElementById("minTribAnu").value;
	busque.expAsoc = document.getElementById("expAsoc").value;
	busque.liquidacion = document.getElementById("liquidacion").value;
	busque.ActLiquid();
}
function btnCotzMod(){
	let busque = new busquedas
	busque.numExp = document.getElementById("numExp").value
	busque.cotzMod();
}
function btnUpCotz(){
	let busque = new busquedas
	busque.idCotz = document.getElementById("idCotz").value
	busque.minTrib = document.getElementById("minTrib").value
	busque.aforo = document.getElementById("aforo").value
	busque.petroBs = document.getElementById("petroBs").value
	busque.montActEcon = document.getElementById("montActEcon").value
	busque.montCertBom = document.getElementById("montCertBom").value
	busque.montSolv = document.getElementById("montSolv").value
	busque.montPubProp = document.getElementById("montPubProp").value
	busque.montRenovLicLic = document.getElementById("montRenovLicLic").value
	busque.montAseo = document.getElementById("montAseo").value
	busque.montUsoConf = document.getElementById("montUsoConf").value
	busque.montCatast = document.getElementById("montCatast").value
	busque.montTasaAdmin = document.getElementById("montTasaAdmin").value
	busque.plantElect = document.getElementById("plantElect").value
	busque.UpCotz()
}
function btnMostDat(){
	let busque = new busquedas
	busque.numExp = document.getElementById("numExp").value
	busque.mostDat();
}