<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta name="description" content="">
    	<meta name="author" content="">

    	<title>CopperResistance</title>		

    	<link href="../bs/css/bootstrap.css" rel="stylesheet">

	    <!--[if lt IE 9]>
    		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    	<![endif]-->
    	
    	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

    	<!-- the mousewheel plugin - optional to provide mousewheel support -->
		<script type="text/javascript" src="js/jquery.mousewheel.js"></script>

    	<link href="css/jquery.jscrollpane.css" rel="stylesheet">
    	<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>

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

			.scroll-con {
				height: 100%;
				overflow-y: scroll;
  				-webkit-overflow-scrolling: touch;
  				overflow-x: hidden;
			}

			.list-story img {
				display: none;
			}
			
			.content {
				display:none;
			}

	    </style>

	    <script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.expander').simpleexpand();
			});
			
		</script>
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
		    		<li class="active"><a href="#">Add Feed</a></li>
		    	</ul>
		    	<form class="navbar-form navbar-right hidden-sm hidden-xs" role="search">
		    		<div class="form-group">
		    			<input type="text" class="form-control" placeholder="Search">
		    		</div>
		    		<button type="submit" class="btn btn-default">Submit</button>
		    	</form>
		    	<ul class="nav navbar-nav navbar-right hidden-sm hidden-xs">
		    		
				    	</ul>
		    </div>
	    </nav>
			<div class="main-content row">
				<button type="button" class="btn btn-group-lg navbar-btn expander">Sign in</button>
				<div class="content">
				    content to hide.
				</div>
		   </div>

	<script>
    <!-- Bootstrap core JavaScript -->
    <script src="../bs/js/bootstrap.min.js"></script>
  </body>
</html>