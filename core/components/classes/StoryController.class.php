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
        $story['category'] = ucfirst($this->model->get_category($this->id));
    	return $story;
    }

    public function update($id){

        $this->user->authenticate('', 1);

        $query = "UPDATE stories SET title = ?, description = ?, link = ? WHERE id = ?";
        $stmt = $this->model->dbh->prepare($query);
        $stmt->bind_param('sssi', $_POST['title'], $_POST['desc'], $_POST['link'], $id);
        $stmt->execute(); 
        $stmt->close();
    }

    public function updateCategory($id, $cat_id){

        $this->user->authenticate('', 1);

        $query = "UPDATE catmap SET category_id = ? WHERE story_id = ?";
        $stmt = $this->model->dbh->prepare($query);
        $stmt->bind_param('ii', $cat_id, $id);
        $stmt->execute(); 
        $stmt->close();
    }

    public function delete($id){
        $this->model->dbh->update('stories', 'active', 0, $id);
    }
}