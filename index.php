<?php

require 'core/libraries/router/AltoRouter.php';
require 'core/components/controller.php';
require 'core/components/database.php';
require 'core/components/user.php';

//define("SITE_ROOT", "http://nuwire.ca/");
define("SITE_ROOT", "http://localhost:8888/CopperResistance/");


$router = new AltoRouter();
//$router->setBasePath('/');
$router->setBasePath('/CopperResistance');

$router->map('GET|POST','/', array('c' => 'Home', 'a' => 'welcome'));

$router->map('GET','/wire', array('c' => 'Wire', 'a' => 'display'));
$router->map('GET','/wire/search', array('c' => 'Wire', 'a' => 'search'));
$router->map('GET','/wire/[:category]', array('c' => 'Wire', 'a' => 'display'));
$router->map('GET','/wire/load/[:cat]/[i:start]', array('c' => 'Wire', 'a' => 'loadStream'));
$router->map('GET','/wire/load/search', array('c' => 'Wire', 'a' => 'loadSearch'));
$router->map('GET','/wire/region/[:region]', array('c' => 'Wire', 'a' => 'loadRegion'));


$router->map('GET','/story/[i:id]', array('c' => 'Story', 'a' => 'display'));
$router->map('GET|POST','/story/delete/[i:id]', array('c' => 'Story', 'a' => 'delete'));
$router->map('GET|POST','/story/update/[i:id]', array('c' => 'Story', 'a' => 'update'));
$router->map('GET|POST','/story/update/category/[i:id]/[i:category]', array('c' => 'Story', 'a' => 'updateCategory'));
$router->map('GET','/story/favourite/[i:id]', array('c' => 'Story', 'a' => 'favourite'));
$router->map('GET','/story/delete/[i:id]', array('c' => 'Story', 'a' => 'delete'));

$router->map('GET','/admin', array('c' => 'Admin', 'a' => 'home'));
$router->map('GET','/admin/dashboard', array('c' => 'Admin', 'a' => 'home'));
$router->map('GET','/admin/sources', array('c' => 'Source', 'a' => 'manage_sources'));
$router->map('GET','/admin/feeds', array('c' => 'Feed', 'a' => 'manage_feeds'));

$router->map('GET|POST','/feed/update/[:field]', array('c' => 'Feed', 'a' => 'updateFeed'));
$router->map('GET|POST','/feed/new', array('c' => 'Feed', 'a' => 'newFeed'));

$router->map('GET|POST','/source/update/[:field]', array('c' => 'Source', 'a' => 'updateSource'));
$router->map('GET|POST','/source/new', array('c' => 'Source', 'a' => 'newSource'));

$router->map('GET|POST','/login', array('c' => 'Home', 'a' => 'login'));
$router->map('GET|POST','/logout', array('c' => 'Home', 'a' => 'logout'));

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
	
} else {
	echo 'routing failed';
}

?>