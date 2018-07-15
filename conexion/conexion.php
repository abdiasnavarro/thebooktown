<?php @session_start();
$con = new PDO('mysql:host=localhost;dbname=thebookbase', 'root', '');
$con->exec('set names utf8');

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=thebookbase",
						"root",
						"",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);

		return $link;

	}


}


