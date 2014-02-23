<?php

class User {

	private $id;
	private $username;
	private $password;
	private $info = array();
	private $model;

	public function __construct($username, $password, $id = null){
		$this->username = $username;
		$this->password = $password;

		if($id){
			$this->id = $id;
		}

		$this->model = new UserModel();
	}

	public function verify_password(){

		password_verify($this->password, $hash);

	}
	
	public function hash_password(){
		return password_hash($this->password, PASSWORD_DEFAULT);
	}

	public function register(){

		$data = array();
		$data['username'] = $this->username;
		$data['password'] = $this->hash_password();

		$this->model->new_user($data);
	}
}