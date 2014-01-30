<?php

class Wire {

	public $category;
	private $db;

   	public function __construct(){

		if(isset($_POST['cat'])){
			$this->set_category($_POST['cat']);
		} else {
			$this->set_category("all");
		}

		$this->db = new Database();
	}

	public function set_category($category){
		$this->category = $category;
	}

	public function get_stories($start = 0){
		return $this->db->get_table("stories", "date", "desc", 15, $start);
	}

}

