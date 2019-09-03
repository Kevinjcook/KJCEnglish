<?php

defined('DOC_ROOT') || define('DOC_ROOT', __DIR__);
//defined("ASSETS_PATH")
//	or define("ASSETS_PATH", realpath(dirname(__FILE__) . '/assets'));

defined("ASSETS_PATH")
	or define("ASSETS_PATH", PROJECT_ROOT . 'assets');

defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", PROJECT_ROOT . 'resources/library');

defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", PROJECT_ROOT . 'resources/templates');
  
/* echo "<br>";
echo ASSETS_PATH;

echo "<br>";
echo LIBRARY_PATH;

echo "<br>";
echo TEMPLATES_PATH;
echo "<br>"; */


?>