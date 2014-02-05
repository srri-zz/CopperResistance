<?php	

require('config.php');

$model = new PageModel(3);
$view = new Admin($model);

$sections = array(
	array("name" => "Home"),
	array("name" => "Sources"),
	array("name" => "Feeds"));

$view->bindData("sections", $sections);

echo $view->render();
