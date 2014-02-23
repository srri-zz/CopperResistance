<?php

class UserModel extends Model {
	
	public function new_user($data){

		if (!($stmt = $this->dbh->prepare("INSERT INTO users (username, password) VALUES (?, ?)"))) {
    		echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}

		 $stmt -> bind_param("ss", $data['username'], $data['password']);
		 $stmt -> execute();

	}

}