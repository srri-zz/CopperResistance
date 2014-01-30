<?php 

class Database extends PDO{

	public function __construct(){

		parent::__construct('mysql:host=nuwire.petersiemens.com;dbname=nuwire', 'psiemens', 'portland22');
	}

	/*
	 * Returns a table from the database.
	 * 
	 * @param string $table  the table to return
	 * @param string $order  the column to order by
	 * @param string $dir    the direction to order in
	 * @param int 	 $limit  the number of rows to show
	 * @param int    $start  index of starting row
	 *
	 * @return 
	 */
	public function get_table($table, $order = "id", $dir = "desc", $limit = 20, $start = 0){

		$query = "SELECT * from " . $table . " ORDER BY " . $order . " " . $dir . " LIMIT " . $start . ", " . $limit;

		$stmt = $this->query($query);  

		$stmt->setFetchMode(PDO::FETCH_ASSOC);  
  
		return $stmt->fetchAll();
	}
}

class Model {

	public $id;
	public $info;

	public $table;
	public $dbh;

	public function __construct($id, $table){

		$this->id = $id;
		$this->table = $table;

		$this->dbh = new Database();
		$this->info = $this->retrieve();
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

}

class PageModel extends Model {

	public function __construct($id){

		parent::__construct($id, "pages");
		
	}

	public function get_title(){
		return $this->info['title'];
	}


}

class ChunkModel extends Model {

	public function __construct($id){

		parent::__construct($id, "chunks");
		
	}

}


