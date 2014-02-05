<?php	

require('config.php');

$model = new PageModel(1);
$view = new Page($model);

$wire = new Wire();

$view->bindData('categories', $wire->get_categories());

echo $view->render();

