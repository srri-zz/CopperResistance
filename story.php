<?php	

require('config.php');

$model = new ChunkModel(2);
$controller = new Controller($model);
$chunk = new Chunk($model, $controller);


if(isset($_GET['id'])){
	$id = $_GET['id'];
} else {
	$id = 1;
}

$wire = new Wire();

$story = $wire->get_story($id);

header('Content-Type: application/json');
echo json_encode($story);

//$chunk->bindData("story", $story);

//echo $chunk->render();

?>