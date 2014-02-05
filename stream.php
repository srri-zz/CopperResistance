<?php	

require('config.php');

$model = new ChunkModel(1);
$stream = new Chunk($model);

$wire = new Wire();

if(isset($_GET['start'])){
	$start = $_GET['start'];
} else {
	$start = 0;
}

if(isset($_GET['cat'])){
	$wire->set_category($_GET['cat']);
}

$stream->bindData("stories", $wire->get_stories($start));

echo $stream->render();

?>