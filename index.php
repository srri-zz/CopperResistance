<?php	

require('config.php');

$model = new PageModel(1);
$view = new Page($model);

echo $view->render();

