<?php

$dbh = new mysqli('nuwire.petersiemens.com', 'psiemens', 'portland22', 'nuwire');  

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

foreach ($sources as $source){
        $query = "INSERT INTO feeds (url) VALUES (?)";
        $stmt = $dbh->prepare($query);
        $stmt->bind_param('s', $source['url']);
        $stmt->execute(); 
        $stmt->close();
}