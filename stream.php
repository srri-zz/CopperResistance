<?php	

require('config.php');

$model = new ChunkModel(1);
$controller = new Controller($model);
$stream = new Chunk($model, $controller);

$wire = new Wire();

if(isset($_GET['start'])){
	$start = $_GET['start'];
} else {
	$start = 0;
}

if(isset($_GET['cat'])){
	$cat = $_GET['cat'];
} else {
	$cat = 1;
}

$wire->set_category($cat);

$stream->bindData("stories", $wire->get_stories($start));

echo $stream->render();

?>