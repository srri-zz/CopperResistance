<?php	

require('config.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];
} else {
	$id = 1;
}

$wire = new Wire();

$story = $wire->get_story($id);

header('Content-Type: application/json');
echo json_encode($story);

?>