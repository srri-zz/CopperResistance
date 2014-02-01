<?php	

require('config.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    $id = 1;
}

if(isset($_GET['action'])){
    $action = $_GET['action'];
} else {
    $action = 'display';
}

$story = new Story($id);
$story->$action();


?>