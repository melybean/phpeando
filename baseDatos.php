<?php

	require_once "configuracion.php";

	class BaseDatos{

	 /*Declaro la propiedad $bbdd privada y estático para que pueda ser usada en todo el programa y sólo se cree una vez. */

     private static $bbdd; 

	/* Si no ha sido creado el objeto bbdd lo crea, y si ya fué creado, lo devuelve. */	

	public static function dameInstancia() {
		if(!self::$bbdd) { 
			self::$bbdd = new self();
		}
		return self::$bbdd;
	}

	/* El constructor es privado para que sólo ésta clase lo pueda usar, especificamente el dameInstancia*/

	private function __construct() {
		$this->_connection = new mysqli(HOST,USUARIO ,CONTRASENIA, NOMBRE_BD);

	    //Comprueba que error ha lanzado en casso de que lo haya
		if(mysqli_connect_error()) {
			trigger_error("Fallo al conectar a la BD: " . mysql_connect_error(),
				 E_USER_ERROR);
		}
	}

	/*El método __clone permite clonar el objeto así que lo pongo privado para que nadie pueda acceder a él.*/

	private function __clone() { }


	/* Por último el método dameConexión me permite hacer la conexión del objeto mysqli que acabo de  crear.*/	

	public function dameConexion() {
		return $this->_connection;
	}



}


?>