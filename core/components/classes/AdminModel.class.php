<?php

class AdminModel extends Model {

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