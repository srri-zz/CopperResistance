<?php

class SourceController extends Controller {

	public function manage_sources(){

		$this->bindData('current', 'Sources');

		$this->user->authenticate('admin/sources');

		$this->template = 'admin_sources.html';
		$this->bindData('sources', $this->model->getSources());
		$this->bindData('regions', $this->model->get_regions());
		$this->render();

	}

	public function updateSource($field){

		$val = $_POST['value'];
		$id = $_POST['pk'];

		$this->model->dbh->update('sources', $field, $val, $id);
	}

	public function newSource(){

        $this->user->authenticate('admin/sources', 1);

        $query = "INSERT INTO sources (name, city, region, url) VALUES (?, ?, ?, ?)";
        $stmt = $this->model->dbh->prepare($query);
        $stmt->bind_param('ssss', $_POST['name'], $_POST['city'], $_POST['region'], $_POST['website']);
        $stmt->execute(); 
        $stmt->close();

        $this->redirect('admin/sources');

    }
}