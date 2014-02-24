<?php

class FeedModel extends Model {

	public function getFeeds(){
		return $this->dbh->get_all('SELECT * FROM feeds');
	}
}