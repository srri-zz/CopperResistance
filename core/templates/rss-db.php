
<?php
 
// Make sure SimplePie is included. You may need to change this to match the location of autoloader.php
// For 1.0-1.2:

$feed_url = "http://rss.nytimes.com/services/xml/rss/nyt/World.xml";
 
#require_once('../simplepie.inc');
// For 1.3+:
require_once('php/autoloader.php');

require_once('scrape.php');
 
// We'll process this feed with all of the default options.
$feed = new SimplePie();
 
// Set which feed to process.
$feed->set_feed_url($feed_url);
$feed->strip_htmltags(true);
// Run SimplePie.
$feed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();
 

	foreach ($feed->get_items() as $item):

		echo $item->get_permalink() . '<br/>';
		echo $item->get_title() . '<br/>';
		//echo $item->get_description() . '<br/>';
		echo $item->get_date('j F Y | g:i a') . '<br/>';
		echo 'RELEVANCE: ' . get_story_relevance($item->get_title()) . '<br/>';
		echo '<br/>';
 
	endforeach;
	
	foreach ($feed->get_items() as $item):

 
        // if item is too old dont even look at it
        if($item->get_date('U') < $expireDate)
                continue;
 
 
        // make id
        $id = md5($item->get_id());
 
 
        // if item is already in db, skip it
        if(isset($savedItems[$id]))
        {
                continue;
        }
 
        // found new item, add it to db
        $i = array();
        $i['title'] = $item->get_title();
        $i['link'] = $item->get_link();
        $i['author'] = '';
        $author = $item->get_author();
        if($author)
        {
                $i['author'] = $author->get_name();
        }
        $i['date'] = $item->get_date('U');
        $i['content'] = $item->get_content();
        $feed = $item->get_feed();
        $i['feed_link'] = $feed->get_permalink();
        $i['feed_title'] = $feed->get_title();
 
        $savedItems[$id] = $i;
        
    endforeach;