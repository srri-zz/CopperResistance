<?php 

class Database extends mysqli {

	public function __construct(){

		parent::__construct('nuwire.petersiemens.com', 'psiemens', 'portland22', 'nuwire');
	}


	public function get_all($query){

        $stmt = $this->query($query);

		$result = array();

        while ($row = $stmt->fetch_assoc()) {
    		$result[] = $row;
		}

		return $result;
	}

	public function get_row($table, $col, $val){

		$query = 'SELECT * FROM ' . $table . " WHERE " . $col . " = '" . $val . "'";

        $sth=$this->query($query);

        $result = $sth->fetch_assoc();

        return $result;
	}

	public function update($table, $field, $value, $id){
		$query = 'UPDATE ' . $table . ' SET ' . $field . ' = ? WHERE id = ?';
		$stmt = $this->prepare($query);
		$stmt->bind_param('si', $value, $id);
		$stmt->execute(); 
		$stmt->close();
	}

}

class Model {

	public $id;
	public $info;

	public $table;
	public $dbh;

	public function __construct(){

		$this->dbh = new Database();
	}

	public function get_template(){
		return $this->info['template'];
	}

	public function get_categories(){

        $stmt = $this->dbh->query('SELECT id, name FROM categories');

		$result = array();

        while ($row = $stmt->fetch_assoc()) {
    		$result[$row['id']] = $row['name'];
		}

		return $result;
	}

	public function get_sources(){

        $stmt = $this->dbh->query('SELECT id, name FROM sources');

		$result = array();

        while ($row = $stmt->fetch_assoc()) {
    		$result[$row['id']] = $row['name'];
		}

		return $result;
	}

	public function get_regions(){

        $stmt = $this->dbh->query('SELECT id, longname FROM regions');

		$result = array();

        while ($row = $stmt->fetch_assoc()) {
    		$result[$row['id']] = $row['longname'];
		}

		return $result;
	}


}



