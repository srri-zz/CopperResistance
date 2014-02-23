<?php	


	require 'components/database.php';

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
	$db = new Database();
	$sources2 = $db->get_all('SELECT * FROM feeds');

  	$feed = new SimplePie();

  	foreach($sources2 as $source):

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

			  	$desc = strip_tags(shorten($item->get_description(), 150));

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

					$stmt = $dbh->prepare("INSERT INTO catmap (category_id, story_id) VALUES (?, LAST_INSERT_ID())");  
					$stmt->execute(array($source['category'])); 
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


/*	function get_stats($sql){

		$db = new Database();

    	$categories = array();
    	$count = 0;

    	$stmt = $db->query($sql);

    	while ($row = $stmt->fetch_assoc()) {

				$query = 'SELECT category_id FROM catmap WHERE story_id = ' . $row['id'];

		        $sth = $db->query($query);

		        $this_cat = $sth->fetch_assoc();

		        if(isset($categories[$this_cat['category_id']])){
	        		$categories[$this_cat['category_id']] += 1;
		        } else {
		        	$categories[$this_cat['category_id']] = 1;
		        }	

		    	$count += 1;
		}



		arsort($categories);

		$cat_names = array("","","","");
		$cat_vals = array(0,0,0,0);

		$n = 0;

		while($n < 4){
			$cur_cat = current($categories);
			$cat_names[$n] = key($categories);
			$cat_vals = $cur_cat;
			next($categories);
			$n++;
		}

		return array(
			'count' => $count, 
			'cat_1' => $cat_names[0],
			'cat_1_val' => $cat_vals[0],
			'cat_2' => $cat_names[1],
			'cat_2_val' => $cat_vals[1],
			'cat_3' => $cat_names[2],
			'cat_3_val' => $cat_vals[2],
			'cat_4' => $cat_names[3],
			'cat_4_val' => $cat_vals[3],
			);
	}

	$day_stats = get_stats('SELECT * FROM stories WHERE date >= now() - INTERVAL 1 DAY');
	$month_stats = get_stats('SELECT * FROM stories WHERE MONTH(date) = MONTH(CURDATE())');

	$dbh = new Database;

	$stmt = $dbh->prepare('INSERT INTO stats (month, cat_1, cat_1_val, cat_2, cat_2_val) VALUES (?, ?, ?, ?, ?)');
	$stmt->bind_param('isisi', 
		$month_stats['count'], 
		$month_stats['cat_1'], 
		$month_stats['cat_1_val'], 
		$month_stats['cat_2'], 
		$month_stats['cat_2_val']);
	$stmt->execute(); 
	$stmt->close();*/

?>