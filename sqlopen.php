<?php
	error_reporting(E_ALL ^ E_WARNING);
	// Before you can access data in a database, you must create a connection to the MySQL server.
    // To connect to a MySQL server with PHP and MySQLi, you have to create a mysqli object by passing your data connecting to new mysqli().


	define("HOST", "localhost"); 
	define("USER", "user_english"); 
	define("PASSWORD", "123456"); 
	define('DATABASE', "english");
	

	function OpenConectionBd(){
    // HOST    - Specifies the server to connect to. If you pass the NULL value or an empty string "", the server will use the default value: "localhost"
    // USER     - Specifies the MySQL username to log in with. Default value is the name of the user that owns the server process
    // PASSWORD - Specifies the password to log in with. Default is "" (empty string)
    // DATABASE - Optional. If provided, will specify the database to be used when performing queries
    // PORT     - Optional. Specifies the port number to attempt to connect to the MySQL server, default 3306


		$conection = new mysqli(HOST, USER, PASSWORD, DATABASE);
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