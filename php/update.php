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

  	require_once('htmldom/simple_html_dom.php');
			 
  	$sources = array(
  		array("source"=>"The Ubyssey", "url"=>"http://ubyssey.ca/feed/?post_type=news&news_category=nuw"), 
  		array("source"=>"The Ubyssey", "url"=>"http://ubyssey.ca/feed/?post_type=features&feature_category=nuw"),
  		array("source"=>"The Ubyssey", "url"=>"http://ubyssey.ca/feed/?post_type=culture&culture_category=nuw"),
  		array("source"=>"The Ubyssey", "url"=>"http://ubyssey.ca/feed/?post_type=sports&sports_category=nuw"),
  		array("source"=>"The Ubyssey", "url"=>"http://ubyssey.ca/feed/?post_type=opinions&opinion_category=nuw"),

  		array("source"=>"The Dalhousie Gazette", "url"=>"http://dalgazette.com/tag/nuw/feed"),
  		array("source"=>"The McGill Daily", "url"=>"http://www.mcgilldaily.com/tag/nuw/feed"),
  		array("source"=>"The McGill Daily", "url"=>"http://www.mcgilldaily.com/tag/nuw/feed"),
  		array("source"=>"The Varsity", "url"=>"http://thevarsity.ca/tag/nuw/feed/"),

  		array("source"=>"The Western Gazette", "url"=>"http://www.westerngazette.ca/tag/NUW/feed/"));

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
		  	$desc = shorten($h2t->get_text(), 150);

		  	$date = $item->get_date('Y-m-d H:i:s');
		  	$content = $item->get_content();

			$html = str_get_html($content);
			$image_el = $html->find('img', 0);
			$image = $image_el->src;

			$link = $item->get_link(0);
       			
		  	echo $title.'<br/>';
		  	echo $date.'<br/>';
		  	echo $link.'<br/>';
		  	echo $desc.'<br/><br/>';

			$data = array($title, $date, $source_name, $desc, $content, $image, $link);  
  			
			$stmt = $dbh->prepare("INSERT INTO stories (title, date, source, description, content, image, link) VALUES (?, ?, ?, ?, ?, ?, ?)");  
			$stmt->execute($data); 

		endforeach;
	endforeach;

	$dbh = null;
?>