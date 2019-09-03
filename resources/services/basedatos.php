<?php
	// echo "  Entered   basedatos.php ";
	error_reporting(E_ALL ^ E_WARNING);
	define("HOST", "localhost"); 
	define("USER", "gestionct"); 
	define("PASSWORD", "12345");
	define('bd_comercial_talk', "comercial_talk");
	define('bd_gestion_comercial_talk', "gestion_comercial_talk");
	function OpenConectionBd(){
		$conection = new mysqli(HOST, USER, PASSWORD, bd_gestion_comercial_talk);
		
		return $conection;
	}

	function urls_amigables($url) {
        $url = strtolower($url);
        $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
        $repl = array('a', 'e', 'i', 'o', 'u', 'n');
        $url = str_replace ($find, $repl, $url);
        $find = array(' ', '&', '\r\n', '\n', '+');
        $url = str_replace ($find, '-', $url);
        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
        $repl = array('', '-', '');
        $url = preg_replace ($find, $repl, $url);
        return $url;
	}
?>