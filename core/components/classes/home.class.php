<?php

class Home extends Controller {

	public function __construct(){

		$this->bindData('title', 'Home');
		$this->template = 'home.html';

		parent::__construct();

	}

}