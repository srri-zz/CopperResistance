<?php

class Site {

	public $name;
	private $user;
	
	public function __construct($name){
		$this->name = $name;
	}

	public function display($controller, $action = null){

			if ( isset($action)){
				call_user_func_array(array($controller, $action), $match['params']);
			} else {
				call_user_func(array($controller, $action));
			}
			
	}


}
