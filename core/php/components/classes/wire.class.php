<?php

class Wire {

	private $db;
	public $category;

   	public function __construct($category = 1){

		$this->db = new Database();
		$this->set_category($category);
	}

	public function set_category($category){
		$this->category = $this->db->get_row("categories", "id", $category);
	}

	public function get_stories($start = 0){
		return $this->db->get_table("stories", "date", "desc", 15, $start, "source_id", $this->category['feeds']);
	}

	public function get_story($id){
		return $this->db->get_row("stories", "id", $id);
	}

}

