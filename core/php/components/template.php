<?php

class Template {

	static function render($template, $data){

		require_once 'core/php/libraries/twig/lib/Twig/Autoloader.php';
		Twig_Autoloader::register();
		$loader = new Twig_Loader_Filesystem('core/templates');
		$twig = new Twig_Environment($loader, array('cache' => false));

		return $twig->render($template, $data);
	}

}