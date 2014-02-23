<?php

class SourceController extends Controller {

	public function updateName(){

		echo 'test';

		$name = $_POST['value'];
		$id = $_POST['pk'];

		$this->model->dbh->update('sources', 'name', $name, $id);
	}
}