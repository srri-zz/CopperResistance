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

  	$stmt = $dbh->prepare("INSERT INTO stories (title, date, source, description, content) VALUES (:title, :date, :source, :desc, :content)");
	$stmt->bindParam(':title', $title);
	$stmt->bindParam(':date', $date);
	$stmt->bindParam(':source', $source_name);
	$stmt->bindParam(':desc', $desc);
	$stmt->bindParam(':content', $content);

  	foreach($sources as $source):

  		$source_name = $source['source']

	  	$feed->set_feed_url($source['url']);

	  	$feed->init();

	  	$feed->handle_content_type();
								 

	  	foreach ($feed->get_items() as $item):
	  		$title = $item->get_title();

		  	$h2t = new html2text($item->get_description());
		  	$desc = $h2t->get_text();

		  	$date = $item->get_date('Y-m-d H:i:s');

			$stmt->execute();


?>
	<div class="list-story" style="background-color: rgba(39, 168, 101, <?php echo rand(50, 100) / 100; ?>)">
        <div style="width: 18px; float: left;"></div>
		<div style="margin-left: 18px; background-color: #FFF; border-bottom: 1px solid rgb(216, 216, 216); ">
			<div style="padding: 20px 15px;">
				<h4 class="list-group-item-heading"><?php echo $item->get_title();?></h4>
				<p class="text-muted"><?php echo ; ?> - The Ubyssey</p>
				<p class="list-group-item-text"><?php echo shorten($description, 150); ?></p>
				<br/>
				<span class="label label-default">Default</span>
				<span class="label label-primary">Primary</span>
				<span class="label label-success">Success</span>
			</div>
		</div>
    	
	</div>
<?php
		endforeach;
	endforeach;
?>