<?php	

require('config.php');

$model = new PageModel(1);
$controller = new Controller($model);
$view = new Page($model, $controller);

echo $view->render();

