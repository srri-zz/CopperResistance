<?php

class StoryModel extends Model {

	public function get_story($id){
		return $this->dbh->get_row("stories", "id", $id);
	}
	
}