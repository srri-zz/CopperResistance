<?php

class HomeController extends Controller {
	
	public function login(){
		$this->user->login();
	}
}