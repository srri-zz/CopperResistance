<?php

class Page extends View {

	public function __construct($model, $controller){

		parent::__construct($model, $controller);

		$this->bindData("title", $this->model->get_title());
	}

}

class Chunk extends View {

}

class View {

	public $model;
	public $controller;

	public $data = array();

	public function __construct($model, $controller){
		$this->model = $model;
		$this->controller = $controller;
	}

	public function bindData($key, $value){
		$this->data[$key] = $value;
	}

	public function render(){

		require_once 'core/php/libraries/twig/lib/Twig/Autoloader.php';
		Twig_Autoloader::register();
		$loader = new Twig_Loader_Filesystem('core/templates');
		$twig = new Twig_Environment($loader, array('cache' => false));

		return $twig->render($this->model->get_template(), $this->data);
	}
}

