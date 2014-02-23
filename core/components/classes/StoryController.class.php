<?php

class StoryController extends Controller {

	public function display($id){

        $this->id = $id;

        header('Content-Type: application/json');
        echo json_encode($this->load());
        
    }

    public function load(){
    	$story = $this->model->get_story($this->id);
    	$story['date'] = date("M d Y | h:i A", strtotime($story['date']));
    	return $story;
    }

    public function update($id){

        $this->user->authenticate('', 1);

        $query = "UPDATE stories SET title = ?, description = ?, link = ? WHERE id = ?";
        $stmt = $this->model->dbh->prepare($query);
        $stmt->bind_param('sssi', $_POST['title'], $_POST['desc'], $_POST['link'], $id);
        $stmt->execute(); 
        $stmt->close();
        var_dump($_POST);
    }
}