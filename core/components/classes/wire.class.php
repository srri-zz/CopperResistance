<?php

class Wire extends Controller {

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

        $this->bindData('title', 'Wire');

        $this->template = 'wire.html';

        parent::__construct();

    }

    public function set_category($category){

        $this->category = $category;

    }

    public function get_stories($start = 0){

        if($this->category == 'all'){
            $query = 'SELECT * from stories ORDER by date DESC LIMIT ' . $start . ', 15';
        } else {
            $query = 'SELECT s.* FROM catmap sc, stories s, categories c WHERE sc.category_id = c.id AND (c.id = ' . $this->category . ') AND s.id = sc.story_id GROUP BY s.id LIMIT ' .$start .', 15';
        }

        $stmt = $this->db->query($query);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
        
    }

    public function get_all_stories($start = 0){

        $query = "SELECT * from stories ORDER BY date DESC LIMIT " . $start . ", 15";

        $stmt = $this->db->query($query);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
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


    public function loadStream($cat, $start){
        $this->set_category($cat);
        $this->template = 'wire_stream.html';
        $this->bindData('stories',$this->get_stories($start));
        $this->render();
    }

    public function display($cat = 'all'){
        $this->bindData('categories', $this->get_categories());
        $this->bindData('category', $cat);
        $this->render();
        
    }
}

