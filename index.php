<?php

require 'core/libraries/router/AltoRouter.php';
require 'core/components/controller.php';
require 'core/components/database.php';

$router = new AltoRouter();
$router->setBasePath('/CopperResistance');
$router->map('GET|POST','/', array('c' => 'home', 'a' => 'render'));
$router->map('GET','/wire', array('c' => 'wire', 'a' => 'display'));
$router->map('GET','/wire/[*:category]', array('c' => 'wire', 'a' => 'display'));
$router->map('GET','/wire/load/[:cat]/[i:start]', array('c' => 'wire', 'a' => 'loadStream'));
$router->map('GET','/test/[:category][i:id]', array('c' => 'test', 'a' => 'testaction'));

$router->map('GET','/story/[i:id]', array('c' => 'story', 'a' => 'display'));
$router->map('GET','/story/favourite/[i:id]', array('c' => 'story', 'a' => 'favourite'));
$router->map('GET','/story/delete/[i:id]', array('c' => 'story', 'a' => 'delete'));


// match current request
$match = $router->match();

function __autoload($class_name) {
    include 'core/components/classes/' . strtolower($class_name) . '.class.php';
}

if ( isset($match['target']['c']) ){
	$controller = new $match['target']['c'];
	$action  = $match['target']['a'];
	if ( sizeof($match['params']) > 0){
		call_user_func_array(array($controller, $action), $match['params']);
	} else {
		call_user_func(array($controller, $action));
	}
	
}



?>