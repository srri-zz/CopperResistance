<?php

class AdminModel extends model {

	public function getSources(){
		return $this->dbh->get_all('SELECT * FROM sources');
	}

}