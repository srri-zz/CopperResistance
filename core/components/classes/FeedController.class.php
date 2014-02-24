<?php

class FeedController extends Controller {

	public function manage_feeds(){

        $this->bindData('current', 'Feeds');

		$this->user->authenticate('admin/feeds');

		$this->template = 'admin_feeds.html';
		$this->bindData('feeds', $this->model->getFeeds());
		$this->bindData('categories', $this->model->get_categories());
		$this->bindData('sources', $this->model->get_sources());

		$this->render();

	}

	public function updateFeed($field){

		$val = $_POST['value'];
		$id = $_POST['pk'];

		echo $field;
		echo $val;
		echo $id;

		$this->model->dbh->update('feeds', $field, $val, $id);
	}

	public function newFeed(){

        $this->user->authenticate('admin/feeds', 1);

        $query = "INSERT INTO feeds (title, source, url, category) VALUES (?, ?, ?, ?)";
        $stmt = $this->model->dbh->prepare($query);
        $stmt->bind_param('ssss', $_POST['title'], $_POST['source'], $_POST['url'], $_POST['category']);
        $stmt->execute(); 
        $stmt->close();

        $this->redirect('admin/feeds');

    }
}