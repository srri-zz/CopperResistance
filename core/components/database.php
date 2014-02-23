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
		$stmt = $this->prepare('UPDATE sources SET ' . $field . ' = ? WHERE id = ?');
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


}



