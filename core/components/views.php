<?php

class Page extends View {


}

class Chunk extends View {

}

class View {

	public $model;
	public $name;
	public $title;
	protected $template;
	public $data = array();

	public function __construct(){
		//$this->model = new Model();
	}

	public function bindData($key, $value){
		$this->data[$key] = $value;
	}

	public function render(){

		require_once 'core/libraries/twig/lib/Twig/Autoloader.php';
		Twig_Autoloader::register();
		$loader = new Twig_Loader_Filesystem('assets/templates');
		$twig = new Twig_Environment($loader, array('cache' => false));

		echo $twig->render($this->template, $this->data);
	}
}

class Admin extends View {



}
