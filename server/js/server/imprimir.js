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