<?php

class Story {

    private $db;
    public $id;
    public $category;

    public function __construct(){
        $this->db = new Database();
    }

    public function load(){
        return $this->db->get_row("stories", "id", $this->id);
    }

    public function display($id){

        $this->id = $id;

        header('Content-Type: application/json');
        echo json_encode($this->load());
        
    }

}