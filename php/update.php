<?php	

	function shorten($string, $limit, $break=" ", $pad="...") {
		// return with no change if string is shorter than $limit
		if(strlen($string) <= $limit) return $string;

		// is $break present between $limit and the end of the string?
		if(false !== ($breakpoint = strpos($string, $break, $limit))) {
			if($breakpoint < strlen($string) - 1) {
				$string = substr($string, 0, $breakpoint) . $pad;
			}	
		}
		return $string;
	}


  	require_once('autoloader.php');

  	require_once('class.html2text.inc');
			 
  	$sources = array(
  		array("source"=>"The Ubyssey", "url"=>"http://ubyssey.ca/feed/"), 
  		array("source"=>"Main Wire", "url"=>"http://mix.chimpfeedr.com/7df33-Main-Wire"));

  	$feed = new SimplePie();

  	$user = 'psiemens';
  	$pass = 'portland22';

	$dbh = new PDO('mysql:host=nuwire.petersiemens.com;dbname=nuwire', $user, $pass);


  	foreach($sources as $source):

  		$source_name = $source['source'];

	  	$feed->set_feed_url($source['url']);

	  	$feed->init();

	  	$feed->handle_content_type();
								 

	  	foreach ($feed->get_items() as $item):
	  		$title = $item->get_title();

		  	$h2t = new html2text($item->get_description());
		  	$desc = $h2t->get_text();

		  	$date = $item->get_date('Y-m-d H:i:s');
		  	$content = "";

		  	echo $title.'<br/><br/>';

			$data = array($title);  
  
			$stmt = $dbh->prepare("INSERT INTO stories (title) VALUES (?)");  
			$stmt->execute($data); 

		endforeach;
	endforeach;

	$dbh = null;
?>