<?php

class Wire {

    private $db;
    public $category;
    public $region;

    public function __construct($category = null, $region = null){

        $this->db = new Database();

        if(isset($category)){
            $this->set_category($category);
        }

        if(isset($region)){
            $this->region = $region;
        }

    }

    public function set_category($category){
        $this->category = $this->db->get_row("categories", "id", $category);
    }

    public function get_stories($start = 0){
        return $this->db->get_table("stories", "date", "desc", 15, $start, "source_id", $this->category['feeds']);
    }

    public function get_categories(){
        $stmt = $this->db->query('SELECT id, name FROM categories');

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function get_sources_in_region(){
        $stmt = $this->db->query('SELECT id FROM sources WHERE region = ' . $this->region());

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function get_stories_in_region(){
        $stmt = $this->db->query('SELECT * FROM stories WHERE source IN (' . $this->get_sources_in_region() . ')');

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function get_story($id){
        return $this->db->get_row("stories", "id", $id);
    }

}

