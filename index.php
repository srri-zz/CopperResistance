<?php

require 'core/libraries/router/AltoRouter.php';
require 'core/components/controller.php';
require 'core/components/database.php';

$router = new AltoRouter();
$router->setBasePath('/CopperResistance');
$router->map('GET|POST','/', array('c' => 'home', 'a' => 'render'));
$router->map('GET','/wire', array('c' => 'wire', 'a' => 'display'));
$router->map('GET','/wire/search', array('c' => 'Wire', 'a' => 'search'));
$router->map('GET','/wire/[:category]', array('c' => 'Wire', 'a' => 'display'));
$router->map('GET','/wire/load/[:cat]/[i:start]', array('c' => 'Wire', 'a' => 'loadStream'));
$router->map('GET','/wire/load/search', array('c' => 'Wire', 'a' => 'loadSearch'));
$router->map('GET','/test/[:category][i:id]', array('c' => 'test', 'a' => 'testaction'));

$router->map('GET','/story/[i:id]', array('c' => 'Story', 'a' => 'display'));
$router->map('GET','/story/favourite/[i:id]', array('c' => 'Story', 'a' => 'favourite'));
$router->map('GET','/story/delete/[i:id]', array('c' => 'Story', 'a' => 'delete'));


// match current request
$match = $router->match();

function __autoload($class_name) {
    include 'core/components/classes/' . $class_name . '.class.php';
}

if ( isset($match['target']['c']) ){
	$model_name = $match['target']['c'] . 'Model';
	$controller_name = $match['target']['c'] . 'Controller';
	$model = new $model_name;
	$controller = new $controller_name($model);
	$action  = $match['target']['a'];
	if ( sizeof($match['params']) > 0){
		call_user_func_array(array($controller, $action), $match['params']);
	} else {
		call_user_func(array($controller, $action));
	}
	
}



?>