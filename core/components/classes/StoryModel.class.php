<?php

class StoryModel extends Model {

	public function get_story($id){
		return $this->dbh->get_row("stories", "id", $id);
	}

	public function get_category($id){

		$row = $this->dbh->get_row('catmap', 'id', $id);
		
		$result = $this->get_categories();

    	return $result[$row['category_id']];
	}
	
}