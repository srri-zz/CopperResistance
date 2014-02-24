<?php

class SourceModel extends Model {

	public function getSources(){
		return $this->dbh->get_all('SELECT * FROM sources');
	}
}