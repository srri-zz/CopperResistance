<?php

class Page extends View {

	public $model;

	public $data = array();

	public function __construct($model){

		$this->bindData("title", $this->model->get_title());
	}

	public function get_template(){
		return $this->info['template'];
	}

	public function retrieve(){

		$STH = $this->dbh->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ' . $this->id);
		$STH->execute();

		$result = $STH->fetchAll(PDO::FETCH_ASSOC);
		return $result[0];
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

class Chunk extends View {

}

class View {

	public $model;

	public $data = array();

	public function __construct($model){
		$this->model = $model;
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

class Admin extends View {
	
}
