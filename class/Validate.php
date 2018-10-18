<?php

	/**
	 *
	 */
	class Validate
	{

		/*Para pensarlo Separe uno por uno para validar cada uno por que te permite re utilizarlo para los diferentes tipos de cosas, si es que se puede.*/
		public static function validateName($valor) /* Puede ser el Apellido tmb*/
		{
			$error="";
			$validator = trim($valor);
			if ($validator!==$valor){
				$error="No debe tener espacios.";
			} else {
				if (strlen($validator)<2){
					$error="Debe tener 2 caracteres o más.";
				} else {
					if (strlen($validator)>30){
						$error="No debe tener más de 30 caracteres.";
					} /*else {
						TODO if (){
							$error = "No debe tener caracteres especiales (ejemplo de ellos: '*', '+', '-', '?', '!', '.').";
						} else {
							if(){
								$error = "No debe tener numeros.";
							} */
						}
					}
				//}
			//}
			return $error;
		}

		public static function validateUserName($username, $db, $tipo)
		{
			$error="";
			$validator = trim($username);
			if ($validator!==$username){
				$error="El nombre de usuario no debe tener espacios ni al principio, ni al final.";
			} else {
				if (strlen($validator)<5){
					$error="El nombre de usuario debe tener 5 caracteres o más.";
				} else {
					if (strlen($validator)>30){
						$error="El nombre de usuario no debe tener más de 30 caracteres.";
					} else {
						/*TODO Buscar base de Datos y buscar si existe el nombre de Usuario
							Esto corresponde a la base de datos decir como traer la info y luego por ello corresponde al como va a hacerlo.
							$array = funcion basededatos(db,tipo, fila/s a devolver)-> y devuelve array[numerico] con nombres de usuarios si tiene valores sino un array vacio sino un error.

							for ($i=0;$i<count($array);$i++){
								if ($array[$i]===$username){
									$error = "El nombre de Usuario ya a sido utilizado.";
								}
							}
							*/
						}
					}
				}
			//}
		return $error;
		}

		public static function validateMail($mail)
		{
			$error = "";
			if (!filter_var($mail,FILTER_VALIDATE_EMAIL)){
				$error = "El mail es invalido."; //TODO Falta saber cual es el error.
			}
			return $error;
		}

		public static function validateContra($contra, $conficontra)
		{
			$error ="";
			$contrasenia=trim($contra);
			if ($contrasenia!==$contra){
				$error = "La contraseña no debe tener espacios.";
			} else {
				if (strlen($contrasenia)<8){
					$error ="La contraseña debe de tener 8 caracteres o más.";
				} else {
					/*TODO if (){
						$error = "La contraseña debe tener almenos un caracter especial (ejemplo de ellos: '*', '+', '-', '?', '!', '.').";
					} else {
						if(){
							$error = "La contraseña debe tener al menos un numero.";
						} else {
							if () {
								$error = "La contraseña debe tener por lo menos una mayuscula.";
							} else { */
								if ($contrasenia!==$conficontra){
									$error = "La contraseña no fue correctamente revalidada.";
								}
							/*}
						}
					}*/
				}
			}
			return $error;
		}

		public static function validateDb($db, $tipo)
		{
			$error = "";
			/*Primero ver cual es el tipo de DB, Luego ver si existe en la ubicacion,  requerido */
		}

		public static function validateImage($imagen)
		{
			$error = "";
			if ($imagen["avatar"]["size"]>(5000*1024)){
				$error="La Imagen es muy grande";
				return $error;
			}
		}
	}

?>
