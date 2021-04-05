class estructura{

    verOpComer(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recComer.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`accion=verOpComer`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    regCodigs(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recComer.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`accion=regCodigs`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    regSect(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recComer.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`accion=regSect`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    guarSect(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recComer.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`nomSect=${this.nomSect}&codSect=${this.codSect}&accion=guardSect`); 
        ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    regForm(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recComer.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`accion=regForm`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    regContrib(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recComer.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`accion=regContrib`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    grupForm(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recComer.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`accion=grupForm`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    grupGuard(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recComer.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`grupNom=${this.grupNom}&codGrup=${this.codGrup}&accion=grupGuard`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    subGrup(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recComer.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`&accion=subGrup`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    subGrupGuar(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recComer.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`grupAsoc=${this.grupAsoc}&subGNom=${this.subGNom}&codSubGrup=${this.codSubGrup}&accion=subGrupGuar`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    actEcon(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recComer.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`accion=actEcon`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    subSelec(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('CampsubGrup');
        var divsitiomaterial = document.getElementById('CampsubGrup');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recComer.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`grupNom=${this.grupNom}&accion=subSelec`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
    }
    guarActEcon(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recComer.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`nomActEcon=${this.nomActEcon}&grupNom=${this.grupNom}&CampsubGrup=${this.CampsubGrup}&codActEcon=${this.codActEcon}&accion=guarActEcon`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
                    alert("PROCESO COMPLETADO CON EXITO");
			     }
	       	}
    }
    subCambio(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('actEcon');
        var divsitiomaterial = document.getElementById('actEcon');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recComer.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`grupNom=${this.grupNom}&CampsubGrup=${this.CampsubGrup}&accion=subCambio`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
			     }
	       	}
    }
    guardApert(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recComer.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`nomRaz=${this.nomRaz}&noExpedien=${this.noExpedien}&sectorContrib=${this.sectorContrib}&dirContrib=${this.dirContrib}&grupNom=${this.grupNom}&CampsubGrup=${this.CampsubGrup}&actEconAper=${this.actEconAper}&rifComple=${this.rifComple}&camDocContrib=${this.camDocContrib}&identFiscContrib=${this.identFiscContrib}&capPagContrib=${this.capPagContrib}&capSusContrib=${this.capSusContrib}&TelefContrib=${this.TelefContrib}&tipEsta=${this.tipEsta}&nomRepCon=${this.nomRepCon}&apelRepCon=${this.apelRepCon}&ceduFulRepre=${this.ceduFulRepre}&estRegCon=${this.estRegCon}&cidRegCont=${this.cidRegCont}&dirRegCon=${this.dirRegCon}&telfRegCon=${this.telfRegCon}&tipPropInmue=${this.tipPropInmue}&copCedRequi=${this.copCedRequi}&copRifdRequi=${this.copRifdRequi}&copRegComerRequi=${this.copRegComerRequi}&copPropInmue=${this.copPropInmue}&copPerSant=${this.copPerSant}&CarpMar=${this.CarpMar}&carSolic=${this.carSolic}&permiBomb=${this.permiBomb}&accion=guardApert`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
			     }
	       	}
    }
    verActEconForm(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('actEconAper');
        var divsitiomaterial = document.getElementById('actEconAper');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recComer.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`CampsubGrup=${this.CampsubGrup}&accion=verActEconForm`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
			     }
	       	}
    }
}

function btnVerOpComer(){
    let estruc = new estructura
    estruc.verOpComer()
}
function btnRegCodigs(){
    let estruc = new estructura
    estruc.regCodigs();
}
function FormRegSect(){
    let estruc = new estructura
    estruc.regSect();
}
function btnGuarSect(){
    let estruc = new estructura
    estruc.nomSect = document.getElementById("sectRec").value;
    estruc.codSect = document.getElementById("codSectRec").value;
    estruc.guarSect();
}
function btnGrupForm(){
    let estruc = new estructura
    estruc.grupForm();
}
function btnGrupGuard(){
    let estruc = new estructura
    estruc.grupNom = document.getElementById('grupNom').value
    estruc.codGrup = document.getElementById('codGrup').value
    estruc.grupGuard();
}
function btnSubGrup(){
    let estruc = new estructura
    estruc.subGrup();
}
function btnSubGrupGuard(){
    let estruc = new estructura
    estruc.grupAsoc = document.getElementById("grupAsoc").value
    estruc.subGNom = document.getElementById("subGNom").value
    estruc.codSubGrup = document.getElementById("codSubGrup").value
    estruc.subGrupGuar();
}
function btnActEcon(){
    let estruc = new estructura
    estruc.actEcon();
}
function btnGuarActEcon(){
    let estruc = new estructura
    estruc.nomActEcon = document.getElementById('nomActEcon').value;
    estruc.grupNom = document.getElementById('grupNom').value;
    estruc.CampsubGrup = document.getElementById('CampsubGrup').value;
    estruc.codActEcon = document.getElementById('codActEcon').value;
    estruc.guarActEcon();
}
function btnSubSelec(){
    let estruc = new estructura
    estruc.grupNom = document.getElementById("grupNom").value;
    estruc.subSelec();
}
function btnRegForm(){
    let estruc = new estructura
    estruc.regForm();
}
function btnRegContrib(){
    let estruc = new estructura
    estruc.regContrib();
}
function FormRegSect(){
    let estruc = new estructura
    estruc.regSect();
}
function btnSubCambio(){
    let estruc = new estructura;
    estruc.grupNom = document.getElementById("grupNom").value;
    estruc.CampsubGrup = document.getElementById("CampsubGrup").value;
    estruc.subCambio();
}
function btnGuarApert(){
    let estruc = new estructura;
    estruc.nomRaz = document.getElementById("nomRaz").value
    estruc.sectorContrib = document.getElementById("sectorContrib").value
    estruc.dirContrib = document.getElementById("dirContrib").value
    estruc.grupNom = document.getElementById("grupNom").value
    estruc.CampsubGrup = document.getElementById("CampsubGrup").value
    estruc.actEconAper = document.getElementById("actEconAper").value
    estruc.noExpedien = document.getElementById("noExpedien").value
    rifCodComer= document.getElementById("rifCodComer").value
    rifComer =document.getElementById("rifComer").value
    estruc.rifComple = `${rifCodComer}|${rifComer}`
    estruc.camDocContrib = document.getElementById("camDocContrib").value
    estruc.identFiscContrib = document.getElementById("identFiscContrib").value
    estruc.capPagContrib = document.getElementById("capPagContrib").value
    estruc.capSusContrib = document.getElementById("capSusContrib").value
    estruc.TelefContrib = document.getElementById("TelefContrib").value
    estruc.tipEsta = document.getElementById("tipEsta").value
    estruc.nomRepCon = document.getElementById("nomRepCon").value
    estruc.apelRepCon = document.getElementById("apelRepCon").value
    codCedRepre = document.getElementById("codCedRepre").value
    numCedRep = document.getElementById("numCedRep").value
    estruc.ceduFulRepre = `${codCedRepre}|${numCedRep}`
    estruc.estRegCon = document.getElementById("estRegCon").value
    estruc.cidRegCont = document.getElementById("cidRegCont").value
    estruc.dirRegCon = document.getElementById("dirRegCon").value
    estruc.telfRegCon = document.getElementById("telfRegCon").value
    estruc.tipPropInmue = document.getElementById("tipPropInmue").value
    copCedRequi = document.getElementById("copCedRequi").checked
    copRifdRequi = document.getElementById("copRifdRequi").checked
    copRegComerRequi = document.getElementById("copRegComerRequi").checked
    copPropInmue = document.getElementById("copPropInmue").checked
    copPerSant = document.getElementById("copPerSant").checked
    CarpMar = document.getElementById("CarpMar").checked
    carSolic = document.getElementById("carSolic").checked
    permiBomb = document.getElementById("permiBomb").checked
    if(copCedRequi==true){
        estruc.copCedRequi=document.getElementById("copCedRequi").value
    }else{
        estruc.copCedRequi ="nada"
    }
    if(copRifdRequi==true){
        estruc.copRifdRequi=document.getElementById("copRifdRequi").value
    }else{
        estruc.copRifdRequi="nada"
    }
    if(copCedRequi==true){
        estruc.copCedRequi=document.getElementById("copCedRequi").value
    }else{
        estruc.copCedRequi="nada"
    }
    if(copPropInmue==true){
        estruc.copPropInmue=document.getElementById("copPropInmue").value
    }else{
        estruc.copPropInmue = "nada"
    }
    if(copPerSant==true){
        estruc.copPerSant=document.getElementById("copPerSant").value
    }else{
        estruc.copPerSant="nada"
    }
    if(CarpMar==true){
        estruc.CarpMar=document.getElementById("CarpMar").value
    }else{
        estruc.CarpMar="nada"
    }
    if(carSolic==true){
        estruc.carSolic=document.getElementById("carSolic").value
    }else{
        estruc.carSolic="nada"
    }
    if(permiBomb==true){
        estruc.permiBomb=document.getElementById("permiBomb").value
    }else{
        estruc.permiBomb="nada"
    }
    estruc.guardApert()
}
function VerActEconAper(){
    let estruc = new estructura;
    estruc.CampsubGrup= document.getElementById("CampsubGrup").value
    estruc.verActEconForm();
}