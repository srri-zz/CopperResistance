<?php

class WireModel extends Model {
	
    public function get_categories(){

    	return $this->dbh->get_all('SELECT id, name FROM categories');

    }

    public function get_stories($start = 0, $category){

        if($category == 'all'){
            $query = 'SELECT * from stories ORDER by date DESC LIMIT ' . $start . ', 15';
        } else {
            $query = 'SELECT s.* FROM catmap sc, stories s, categories c WHERE sc.category_id = c.id AND (c.id = ' . $category . ') AND s.id = sc.story_id GROUP BY s.date DESC LIMIT ' .$start .', 15';
        }

        return $this->dbh->get_all($query);
        
    }

    public function get_category_id($cat_name){

        if ($cat_name == 'all'){

        	return 0;

        } else {

    		$row = $this->dbh->get_row('categories', 'name', $cat_name);

    		return $row['id'];

        } 

    }

    public function search_stories($start = 0, $query){

    	$query = "SELECT * FROM stories WHERE title LIKE '%$query%' LIMIT " . $start . ", 15";
    	
    	return $this->dbh->get_all($query);
    }


    public function get_stats_24hr(){

        $query = "SELECT * FROM stories WHERE date >= now() - INTERVAL 1 DAY";

        $result = $this->dbh->query($query);

        return $result->num_rows;

    }

    public function get_stats_week(){

        $query = "SELECT * FROM stories WHERE date >= now() - INTERVAL 7 DAY";

        $result = $this->dbh->query($query);

        return $result->num_rows;

    }

    public function get_stats_month(){

        $query = "SELECT * FROM stories WHERE MONTH(date) = MONTH(CURDATE())";

        $result = $this->dbh->query($query);

        return $result->num_rows;

    }    
    
}