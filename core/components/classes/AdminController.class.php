<?php

class AdminController extends Controller {

	public function home(){

		$this->user->authenticate('admin');

		$this->template = 'admin.html';
		$this->render();
		
	}

	public function manage_sources(){

		$this->user->authenticate('admin/sources');

		$this->template = 'admin_sources.html';
		$this->bindData('sources', $this->model->getSources());
		$this->render();

	}
	
}