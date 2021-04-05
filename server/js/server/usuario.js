class usuario{


	menuUsuarioer(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recUser.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`accion=MenuUser`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;  
			     }
	       	}
	}
	FormRegUser(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recUser.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`accion=formRegUser`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;  
			     }
	       	}
	}
	GuarUser(){
		var ajax = new objetoAjax();
		var divsitioform = document.getElementById('campEscrit');
        var divsitiomaterial = document.getElementById('campEscrit');
		divsitioform.innerHTML="<img src='./assets/cargando.gif'> cargando";
        divsitiomaterial.innerHTML="";
		ajax=objetoAjax();
		ajax.open("POST", "server/recib/recUser.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send(`nomUser=${this.nomUser}&departUsu=${this.departUsu}&NivelUsu=${this.NivelUsu}&apeUser=${this.apeUser}&cedFulUser=${this.cedFulUser}&correoUser=${this.correoUser}&nickUser=${this.nickUser}&passUser=${this.passUser}&accion=GuarUser`); 
		ajax.onreadystatechange=function()
            {
			if (ajax.readyState==4) 
                {
                    divsitioform.innerHTML = ajax.responseText;  
			     }
	       	}
	}
}

function btnMenuUser(){
	let usuarios = new usuario;
	usuarios.menuUsuarioer();
}
function btnFormRegUser(){
	let usuarios = new usuario;
	usuarios.FormRegUser();
}
function btnGuarUser(){
	let usuarios = new usuario;
	usuarios.nomUser = document.getElementById("nomUser").value
	usuarios.apeUser = document.getElementById("apeUser").value
	nacUser = document.getElementById("nacUser").value
	numCedUser = document.getElementById("numCedUser").value
	usuarios.cedFulUser = `${nacUser}${numCedUser}`
	usuarios.departUsu = document.getElementById('departUsu').value
	usuarios.correoUser = document.getElementById("correoUser").value
	usuarios.nickUser = document.getElementById("nickUser").value
	usuarios.passUser = document.getElementById("passUser").value
	usuarios.NivelUsu = document.getElementById("NivelUsu").value
	usuarios.GuarUser()
}