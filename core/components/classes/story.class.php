<?php

class Story {

    private $db;
    public $id;
    public $category;

    public function __construct($id){
        $this->id = $id;
        $this->db = new Database();
    }

    public function load(){
        return $this->db->get_row("stories", "id", $this->id);
    }

    public function display(){
        header('Content-Type: application/json');
        echo json_encode($this->load());
    }

    public function save(){

    }

}