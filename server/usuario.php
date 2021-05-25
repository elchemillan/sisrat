<?php

class usuarios {

	function construc(){
		$nomUser = "";
		$departUsu = "";
		$apeUser = "";
		$cedFulUser = "";
		$correoUser = "";
		$nickUser = "";
		$passUser = "";
	}


	function menuUser(){


		echo'<div class="container-fluid opciones">
				<div class="row">
					<div class="col">
                        <button onclick="btnFormRegUser()" class="btn btn-primary">REGISTRO</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary">LISTAR</button>
                    </div>
				</div>
			</div>';

	}
	function formRegUser(){
		echo'

			<div class="container-fluid espacReduc2">
				<div class="row">
					<div class="col titSect">
						<h2>REGISTRO DE USUARIOS</h2>
					</div>
				</div>
				<div class="row">
					<div class="col campRec">
						<b>Nombre</b>
					</div>
					<div class="col campRec" >
						<input type="text" class="campos" id="nomUser"/> 
					</div>
					<div class="col campRec">
					<b>Apellido</b>
					</div>
					<div class="col campRec">
						<input type="text" class="campos" id="apeUser">
					</div>
				</div>
				<div class="row">
					<div class="col campRec">
						<b>Cedula</b>
					</div>
					<div class="col campRec">
						<select id="nacUser">
							<option value="0"></option>
							<option value="V">V</option>
							<option value="E">E</option>
						</select>
						<input type="text" class="campos" id="numCedUser"/>
					</div>
					<div class="col campRec">
						<b>Correo</b>
					</div>
					<div class="col campRec">
						<input type="text" class="campos" id="correoUser"/>
					</div>
				</div>
				<div class="row">
					<div class="col campRec">
						<b>Usuario</b>
					</div>
					<div class="col campRec">
						<input type="text" class="campos" id="nickUser"/>
					</div>
					<div class="col campRec">
						<b>Contraseña</b>
					</div>
					<div class="col campRec">
						<input type="password" class="campos" id="passUser"/>
					</div>
				</div>
				<div class="row">
					<div class="col campRec">
						<b>Unidad</b>
					</div>
					<div class="col campRec">
						<select id="departUsu">
							<option value="0"></option>
							<option value="Tramitaciones">Tramitaciones</option>
							<option value="Licores">Licores</option>
						</select>
					</div>
					<div class="col campRec">
						<b>Nivel</b>
					</div>
					<div class="col campRec">
						<select id="NivelUsu">
							<option value="0"></option>
							<option value="1">Administrador</option>
							<option value="2">Usuario</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col campRec">
						<buttom onclick="btnGuarUser()" class="btn btn-primary"/>Guardar</buttom>
					</div>
				</div>
			</div>
		';
	}
	function guardUser(){
		include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $regUser ="INSERT INTO usuarios(depart,nivel,pass,nick,nombre,apellido) value('".$this->departUsu."',".$this->NivelUsu.",'".$this->passUser."','".$this->nickUser."','".$this->nomUser."','".$this->apeUser."')";
        echo $regUser;
		$link->query($regUser);
	}

}



?>