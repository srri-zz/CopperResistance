<?php	

require_once 'core/php/libraries/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('core/templates');
$twig = new Twig_Environment($loader, array(
    'cache' => false,
));

include('core/php/includes/dbcon.php');

$stmt = $dbh->query('SELECT * from stories ORDER BY date desc');  
  
$stmt->setFetchMode(PDO::FETCH_OBJ);  
  
$stories = $stmt->fetchAll();

$dbh = null;

echo $twig->render('wire.html', array('stories' => $stories));

class Wire {

	public $category;

	private function __construct(){

		if(isset($_POST['cat'])){
			$this->set_category($_POST['cat']);
		} else {
			$this->set_category("all");
		}
	}

	public function set_category($category){
		$this->category = $category;
	}

}

class Database {

	private $host;
	private $dbname;
	private $user;
	private $pass;


}
?>