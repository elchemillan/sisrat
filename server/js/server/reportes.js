class reportes{


	opReport(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recReport.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`accion=opReport`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
	}
	fechForm(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recReport.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`accion=fechForm`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
	}
	reporFech(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recReport.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`diaRep=${this.diaRep}&mesRep=${this.mesRep}&anoRep=${this.anoRep}&diaDes=${this.diaDes}&mesDes=${this.mesDes}&anoDes=${this.anoDes}&accion=reporFech`); 
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
	sectForm(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recReport.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`accion=sectForm`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
	}
	imprSector(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recReport.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`sect=${this.sect}&accion=imprSector`); 
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
	actForm(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recReport.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`accion=actForm`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
			     }
	       	}
	}
	imprAct(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recReport.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`actEcon=${this.actEcon}&accion=imprAct`); 
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
	complReg(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recReport.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`accion=complReg`); 
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

function btnReporOp(){
	let report = new reportes
	report.opReport();
}
function btnFechForm(){
	let report = new reportes
	report.fechForm();
}
function btnReporFech(){
	let report = new reportes
	report.diaRep = document.getElementById("diaRep").value
	report.mesRep = document.getElementById("mesRep").value
	report.anoRep = document.getElementById("anoRep").value
	report.diaDes = document.getElementById("diaDes").value
	report.mesDes = document.getElementById("mesDes").value
	report.anoDes = document.getElementById("anoDes").value
	report.reporFech()
}
function btnSectForm(){
	let report = new reportes
	report.sectForm();
}
function btnImprSector(){
	let report = new reportes
	report.sect = document.getElementById("sect").value
	report.imprSector();
}
function btnActForm(){
	let report = new reportes
	report.actForm()
}
function btnImprAct(){
	let report = new reportes
	report.actEcon = document.getElementById("actEcon").value
	report.imprAct();
}
function btnComplReg(){
	let report = new reportes
	report.complReg()
}