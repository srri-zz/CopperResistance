<?php

class Controller {

	public $user;

	public $model;
	public $name;
	public $title;
	protected $template;
	public $data = array();

	public function __construct($model){
		$this->model = $model;

		$this->user = new User();

		$this->bindData('site_root', SITE_ROOT);

	}

	public function bindData($key, $value){
		$this->data[$key] = $value;
	}

	public function redirect($dest){
		header('Location: '. SITE_ROOT . $dest);
		exit;
	}

	public function render(){

		require_once 'core/libraries/twig/lib/Twig/Autoloader.php';
		Twig_Autoloader::register();
		$loader = new Twig_Loader_Filesystem('assets/templates');
		$twig = new Twig_Environment($loader, array('cache' => false));

		echo $twig->render($this->template, $this->data);
	}
}
