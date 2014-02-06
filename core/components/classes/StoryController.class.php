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
}