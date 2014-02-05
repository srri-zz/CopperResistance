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


  	require_once('libraries/simplepie/autoloader.php');
  	require_once('libraries/class.html2text.inc');
  	require_once('libraries/htmldom/simple_html_dom.php');
			 
  	$sources = array(
  		//array("id" => 1, "source"=>"The Ubyssey", "url"=>"http://ubyssey.ca/feed/?post_type=news&news_category=nuw"), 
  		//array("id" => 2, "source"=>"The Ubyssey", "url"=>"http://ubyssey.ca/feed/?post_type=features&feature_category=nuw"),
  		//array("id" => 3, "source"=>"The Ubyssey", "url"=>"http://ubyssey.ca/feed/?post_type=culture&culture_category=nuw"),
  		//array("id" => 4, "source"=>"The Ubyssey", "url"=>"http://ubyssey.ca/feed/?post_type=sports&sports_category=nuw"),
  		//array("id" => 5, "source"=>"The Ubyssey", "url"=>"http://ubyssey.ca/feed/?post_type=opinions&opinion_category=nuw"),

  		//array("id" => 6, "source"=>"The Dalhousie Gazette", "url"=>"http://dalgazette.com/tag/nuw/feed"),
  		array("id" => 7, "source"=>"The McGill Daily", "url"=>"http://www.mcgilldaily.com/tag/nuw/feed"),
  		//array("id" => 9, "source"=>"The Varsity", "url"=>"http://thevarsity.ca/tag/nuw/feed/"),

  		array("id" => 10, "source"=>"The Dalhousie Gazette", "url"=>"http://feeds.feedburner.com/dalgazette?format=xml"),
  		array("id" => 11, "source"=>"The Western Gazette", "url"=>"http://www.westerngazette.ca/feed/"),
  		array("id" => 12, "source"=>"The Ubyssey", "url"=>"http://ubyssey.ca/feed/"),
  		array("id" => 13, "source"=>"The McGill Daily", "url"=>"http://www.mcgilldaily.com/feed/"),
  		array("id" => 14, "source"=>"The Varsity", "url"=>"http://thevarsity.ca/feed/"),
  		array("id" => 15, "source"=>"The Link", "url"=>"http://thelinknewspaper.ca/feed"),
  		array("id" => 16, "source"=>"The Martlet", "url"=>"http://www.martlet.ca/feed/"),
  		
  		array("id" => 17, "source"=>"The Western Gazette", "url"=>"http://www.westerngazette.ca/tag/NUW/feed/"));


  	$user = 'psiemens';
  	$pass = 'portland22';

	$dbh = new PDO('mysql:host=nuwire.petersiemens.com;dbname=nuwire', $user, $pass);

  	$feed = new SimplePie();

  	foreach($sources as $source):

  		$source_name = $source['source'];
  		$source_id = $source['id'];

	  	$feed->set_feed_url($source['url']);

	  	$feed->init();

	  	$feed->handle_content_type();
								 

	  	foreach ($feed->get_items() as $item):

			$uid = $item->get_id(true);

			$stmt = $dbh->prepare('SELECT * FROM stories WHERE uid = ?');
			$stmt->bindParam(1, $uid, PDO::PARAM_INT);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			if( ! $row) {

		  		$title = $item->get_title();

			  	$h2t = new html2text($item->get_description());
			  	$desc = shorten($h2t->get_text(), 150);

			  	$date = $item->get_date('Y-m-d H:i:s');
			  	$content = $item->get_content();

				$html = str_get_html($content);
				$image_el = $html->find('img', 0);

				if ($image_el){
					$image = $image_el->src;
				} else {
					$image = "";
				}

				$link = $item->get_link(0);

				$color = 'rgba(66, 139, 202, '. rand(50, 100) / 100 .')';

				$data = array($uid, $title, $date, $source_name, $source_id, $desc, $content, $image, $link, $color);  
  			
			  	try
			    {  
			    	$stmt = $dbh->prepare("INSERT INTO stories (uid, title, date, source, source_id, description, content, image, link, color) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");  
					$stmt->execute($data); 

					$stmt = $dbh->prepare("INSERT INTO catmap (category_id, story_id) VALUES (4, LAST_INSERT_ID())");  
					$stmt->execute($data); 
			    }
			    catch (PDOException $e)
			    {
			    	return $e->getMessage(); 
			    }
						
				echo $uid.'<br/>';
				echo '<strong>'.$title.'</strong><br/>';
		  		echo $date.'<br/>';
		  		echo $source_name.' ('.strlen($source_name).') <br/>';
		  		echo $source_id.'<br/>';
		  		echo $desc.'<br/>';
		  		echo '<div>';
		  		echo $image.' ('.strlen($image).') <br/>';
		  		echo $link.' ('.strlen($link).') <br/>';
		  		echo $color.'<br/><br/>';

			}

		endforeach;

	endforeach;

	$dbh = null;
?>