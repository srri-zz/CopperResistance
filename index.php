<?php

require 'core/libraries/router/AltoRouter.php';
require 'core/components/views.php';
require 'core/components/database.php';

$router = new AltoRouter();
$router->setBasePath('/CopperResistance');
$router->map('GET|POST','/', array('c' => 'home', 'a' => 'render'));
$router->map('GET','/test/', array('c' => 'test', 'a' => 'testaction'));
$router->map('GET','/test/[i:id]', array('c' => 'test', 'a' => 'testaction'));

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
<h1>AltoRouter</h3>

<h3>Current request: </h3>
<pre>
	Target: <?php var_dump($match['target']); ?>
	Params: <?php var_dump($match['params']); ?>
	Name: 	<?php var_dump($match['name']); ?>
</pre>

<h3>Try these requests: </h3>
<p><a href="<?php echo $router->generate('home'); ?>">GET <?php echo $router->generate('home'); ?></a></p>
<p><a href="<?php echo $router->generate('users_show', array('id' => 5)); ?>">GET <?php echo $router->generate('users_show', array('id' => 5)); ?></a></p>
<p><form action="<?php echo $router->generate('users_do', array('id' => 10, 'action' => 'update')); ?>" method="post"><button type="submit"><?php echo $router->generate('users_do', array('id' => 10, 'action' => 'update')); ?></button></form></p>