<?php

class AdminController extends Controller {

	public function home(){

		$this->user->authenticate('admin');

		//$this->bindData('new_stories_day', $this->model->get_stats_24hr());
        //$this->bindData('new_stories_week', $this->model->get_stats_week());
        //$this->bindData('new_stories_month', $this->model->get_stats_month());

        $this->bindData('current', 'Dashboard');

        $this->bindData('new_stories_day', '15');
        $this->bindData('new_stories_week', '47');
        $this->bindData('new_stories_month', '243');


		$this->template = 'admin.html';
		$this->render();
		
	}
	
}