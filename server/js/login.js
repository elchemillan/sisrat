class login{


    constructor(usuario,pass){
        this.usuario = usuario;
        this.pass = pass;
    }
        
    logEntrar(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('general');
        var divsitiomaterial = document.getElementById('general');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recLog.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("&usuario="+this.usuario+"&pass="+this.pass+"&accion=logEntrar"); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;
                    window.location.replace('./'); 
			     }
	       	}
    }
    fSalir(){
        var ajax = new objetoAjax();
		var divsitioform = document.getElementById('general');
        var divsitiomaterial = document.getElementById('general');
		divsitioform.innerHTML="<img src='assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recLog.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("&accion=fSalir"); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText; 
                    window.location.replace('./');
			     }
	       	}
    }
}
function btnEntrar(){
    let log = new login();
    log.usuario = document.getElementById('fUser').value;
    log.pass = document.getElementById('fPass').value;
    log.logEntrar();
}
function btnSalir(){
    let log = new login();
    log.fSalir();
}