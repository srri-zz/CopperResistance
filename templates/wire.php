<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta name="description" content="">
    	<meta name="author" content="">

    	<title>CopperResistance</title>

		<!-- styles needed by jScrollPane -->
		<link type="text/css" href="scripts/jquery.jscrollpane.css" rel="stylesheet" media="all" />

		<!-- latest jQuery direct from google's CDN -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
		</script>

		<!-- the mousewheel plugin - optional to provide mousewheel support -->
		<script type="text/javascript" src="scripts/jquery.mousewheel.js"></script>

		<!-- the jScrollPane script -->
		<script type="text/javascript" src="script/jquery.jscrollpane.min.js"></script>
    	<link href="../bs/css/bootstrap.css" rel="stylesheet">

		<script type="text/javascript" id="sourcecode">
								$(function()
								{
									$('.scroll-pane').jScrollPane();
								});
		</script>
    	
	    <!--[if lt IE 9]>
    		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    	<![endif]-->
    	<style>
    		body, html {
			    height: 100%;
			    overflow: hidden;
			}
			
			footer {
			    position: absolute;
			    left: 0;
			    bottom: 0;
			    height: 100px;
			    width: 100%;
			}
	
	    	.list-group-item:first-child {
	    		border-top-width: 0px;
		    	border-top-right-radius: 0px;
		    	border-top-left-radius: 0px;
	    	}    
	    	
	    	.list-group-item:last-child {
		    	border-bottom-right-radius: 0px;
		    	border-bottom-left-radius: 0px;
	    	}   
	    	
	    	.list-group-item {
		    	padding: 20px 15px;
	    	}
	    	
	    	.navbar {
		    	border-radius: 0;
		    	margin-bottom: 0;
		    	background-color: #464545;
		    	border: none;
	    	}
	    	
	    	.navbar-default .navbar-nav > li > a {
		    	color: #C9C7C7;
	    	}
	    	
	    	.navbar-default .navbar-nav > li > a:hover {
		    	color: #37C977;
	    	}
	    	
	    	.navbar-default .navbar-nav > li > a.dropdown-toggle:hover {
		    	color: #9E9B9B;
	    	}
	    	
	    	.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover {
		    	color: #E9E9E9;
		    	background-color: #27A865;
	    	}
	    	
	    	.navbar-default .navbar-brand {
		    	color: #FFFFFF;
	    	}
	    	
	    	.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
	    		color: #9E9B9B;
	    		background-color: #313131;
	    	}
	    	
	    	.navbar-default .navbar-collapse, .navbar-default .navbar-form {
				border-color: #313131;
			}
			
			.list-group-item {
				padding: 0px;
			}
			
			.list-story {
				border-right: solid 1px rgb(216, 216, 216);
				display: block;
			}

			.navbar-toggle {
				border: none;
			}

			.main-content {
				padding-top: 50px;
				height: 100%;
				max-width: 100%;
				margin-left: 0;
			}

			.scroll-pane {
				height: 100%;
				overflow: auto;
  				-webkit-overflow-scrolling: touch;
			}

			.list-story img {
				display: none;
			}
			
	    </style>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
		    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		    		<span class="sr-only">Toggle navigation</span>
		    		<span class="icon-bar"></span>
		    		<span class="icon-bar"></span>
		    		<span class="icon-bar"></span>
		    	</button>
		    	<a class="navbar-brand" href="#">uwire</a>
		    </div>
		
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    	<ul class="nav navbar-nav">
		    		<li class="active"><a href="#">All</a></li>
		    		<li><a href="#">News</a></li>
		    		<li><a href="#">Sports</a></li>
		    		<li><a href="#">Science</a></li>
		    	</ul>
		    	<form class="navbar-form navbar-right hidden-sm hidden-xs" role="search">
		    		<div class="form-group">
		    			<input type="text" class="form-control" placeholder="Search">
		    		</div>
		    		<button type="submit" class="btn btn-default">Submit</button>
		    	</form>
		    	<ul class="nav navbar-nav navbar-right hidden-sm hidden-xs">
		    		<li class="dropdown">
		    			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Order by <b class="caret"></b></a>
		    			<ul class="dropdown-menu">
		    				<li><a href="#">Action</a></li>
		    				<li><a href="#">Another action</a></li>
		    				<li><a href="#">Something else here</a></li>
		    				<li class="divider"></li>
		    				<li><a href="#">Separated link</a></li>
		    			</ul>
		    		</li>
		    		<li class="dropdown">
		    			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
			    		<ul class="dropdown-menu">
			    			<li><a href="#">Action</a></li>
			    			<li><a href="#">Another action</a></li>
			    			<li><a href="#">Something else here</a></li>
			    			<li class="divider"></li>
			    			<li><a href="#">Separated link</a></li>
			    		</ul>
		    		</li>
		    	</ul>
		    </div>
	    </nav>
			<div class="main-content row">
				<div class="col-lg-6 scroll-pane" style="padding-left: 0; padding-right: 0;">
			  		<div>			  
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

					  	$feed_url = "http://ubyssey.ca/feed/"; 
				
					  	require_once('../php/autoloader.php');

					  	require_once('../php/class.html2text.inc');
								 
					  	$feed_urls = array("http://ubyssey.ca/feed/", "http://mix.chimpfeedr.com/7df33-Main-Wire");
				 
					  	$feed = new SimplePie();
				
					  	foreach($feed_urls as $feed_url):
					
						  	$feed->set_feed_url($feed_url);
				
						  	$feed->init();
				 
						  	$feed->handle_content_type();
													 
				
						  	foreach ($feed->get_items() as $item):

							  	$h2t = new html2text($item->get_description());

								$description = $h2t->get_text();

							?>
						<div class="list-story" style="background-color: rgba(39, 168, 101, <?php echo rand(50, 100) / 100; ?>)">
					        <div style="width: 18px; float: left;"></div>
							<div style="margin-left: 18px; background-color: #FFF; border-bottom: 1px solid rgb(216, 216, 216); ">
								<div style="padding: 20px 15px;">
									<h4 class="list-group-item-heading"><?php echo $item->get_title();?></h4>
									<p class="text-muted"><?php echo $item->get_date('j M Y | g:i a'); ?> - The Ubyssey</p>
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
			  
					</div>
				</div>
				<div class="col-lg-6 scroll-pane visible-lg">
					<div style="padding-right: 30px;">
						<h2>Campus RCMP seek help finding missing senior</h2>
						<h4 class="text-muted">The Ubyssey</h4>
						<p>Police are looking for a 78-year-old man who disappeared from the UBC Purdy Pavilion yesterday.</p>

						<p>According to police, Edward Grant was last seen at the Purdy Pavilion around 9 a.m. on Jan. 21.</p>
			
						<p>Police said Grant left the pavilion, which is a part of the UBC Hospital, with a black suitcase. He is described as a black male of Caribbean descent, 5-foot-9 and 150 pounds. He is bald with brown eyes and dark-framed glasses. He was wearing all black and a fedora hat, dress shirt and coat when he was last seen.</p>

						<p>According to police, Grant has dementia and can be aggressive if confronted. He is also diabetic but not dependent on insulin.</p>

						<p>RCMP have asked anyone with information on Grant’s whereabouts to contact them at 604-224-1322 or Crime Stoppers at 1-800-222-TIPS.</p>
						
						<hr/>
				  		<h4>
				    		<span class="label label-default">Default</span>
							<span class="label label-primary">Primary</span>
							<span class="label label-success">Success</span>
				  		</h4>
				  		<br/>

						<div class="panel panel-default">
						  	<div class="panel-body">
						  		<a href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> &nbsp;
						  		<a href="#"><span class="glyphicon glyphicon-star"></span> Favourite</a> &nbsp;
						  		<a href="#"><span class="glyphicon glyphicon-flag"></span> Flag</a>
						  	</div>
						</div>
					</div>
				</div>
		</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../bs/js/bootstrap.min.js"></script>
  </body>
</html>