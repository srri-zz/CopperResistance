<?php

class HomeController extends Controller {
	
	public function login(){

		if(isset($_GET['dest'])){
			$dest = $_GET['dest'];
			$message = 'You must be logged in to view that page.';
		} else {
			$dest = 'wire';
		}
		$this->template = 'login.html';

		$this->bindData('dest', $dest);
					
		if(isset($_POST['username']) && isset($_POST['password'])){
			if($this->user->loggedIn()){
			$this->redirect($dest);
			} else {
				$login = $this->user->login();

				if($login['success']){
					$this->redirect($dest);
				} else {
					$this->bindData('message', $login['message']);

				}
			}
		} else {
			if(isset($message)){ $this->bindData('message', $message);}
		}

		$this->render();
		
	}

	public function logout(){

		$this->user->logout();

		$this->template = 'login.html';
		$this->render();

	}

	public function welcome(){

		$this->template = 'home.html';
		$this->render();
	}
}