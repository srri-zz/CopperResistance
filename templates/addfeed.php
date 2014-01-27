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
<div class="main-content">
		
	    <div class="container" style="position: relative">
	      <div class="marketing">
	        <h1>Bootstrap-Modal</h1>
	        <p class="muted">Responsive, Stackable, AJAX and more.</p>
	        <iframe style="margin-top: 10px" src="http://ghbtns.com/github-btn.html?user=jschr&repo=bootstrap-modal&type=watch&count=true"
	    allowtransparency="true" frameborder="0" scrolling="0" width="95px" height="20px"></iframe>
	        <iframe style="margin-top: 10px" src="http://ghbtns.com/github-btn.html?user=jschr&repo=bootstrap-modal&type=fork&count=true"
	    allowtransparency="true" frameborder="0" scrolling="0" width="95px" height="20px"></iframe>
	      </div>
	      <br />
	      <div class="row">
	        <div class="col-md-10">
	          
	          <div class="responsive">
	            <h3>Responsive</h3>
	            <pre class="pre-scrollable prettyprint linenums" data-source="#responsive">
	            </pre>
	            <div class="text-center">
	            <button class="demo btn btn-primary btn-lg" data-toggle="modal" href="#responsive">View Demo</button>
	            </div>
	          </div>
	          <br />

	          <div class="stackable">
	            <h3>Stackable</h3>
	            <pre class="pre-scrollable prettyprint linenums" data-source="#stack1, #stack2, #stack3">         
	            </pre>
	            <div class="text-center">
	            <button class="demo btn btn-primary btn-lg" data-toggle="modal" href="#stack1">View Demo</button>
	            </div>
	          </div>
	          <br />
	          
	          <!--<div class="dynamic">
	            <h3>Dynamic</h3>
	            <pre class="pre-scrollable prettyprint linenums" data-source="#dynamic">
	            </pre>
	            <div class="text-center">
	            <button class="demo btn btn-primary btn-lg" data-toggle="modal">View Demo</button>
	            </div>
	          </div>
	          <br />-->
	          
	          <div class="ajax" style="position: relative; overflow: hidden">
	            <h3>AJAX (via jQuery.load)</h3>
	            <pre class="pre-scrollable prettyprint linenums" data-source="#ajax">
	            </pre>
	            <div class="text-center">
	            <button class="demo btn btn-primary btn-lg" data-toggle="modal">View Demo</button>
	            </div>
	          </div>
	          <br />

	          <div class="static" style="position: relative; overflow: hidden">
	            <h3>Static Background with Animation</h3>
	            <p>The shake animation is included in bootstrap-modal but any animation in <a href="http://daneden.me/animate/">animate.css</a> is supported, just include the css file in your project.</p>
	            <pre class="pre-scrollable prettyprint linenums" data-source="#static">
	            </pre>
	            <div class="text-center">
	            <button class="demo btn btn-primary btn-lg" data-toggle="modal" href="#static">View Demo</button>
	            </div>
	          </div>
	          <br />

	          <div class="full-width" style="position: relative; overflow: hidden">
	            <h3>Full Width</h3>
	            <pre class="pre-scrollable prettyprint linenums" data-source="#full-width">
	            </pre>
	            <div class="text-center">
	            <button class="demo btn btn-primary btn-lg" data-toggle="modal" href="#full-width">View Demo</button>
	            </div>
	          </div>
	          <br />

	          <div class="long" style="position: relative; overflow: hidden">
	            <h3>Long Modals</h3>
	            <pre class="pre-scrollable prettyprint linenums" data-source="#long">
	            </pre>
	            <div class="text-center">
	            <button class="demo btn btn-primary btn-lg" data-toggle="modal" href="#long">View Demo</button>
	            </div>
	          </div>
	          <br />

	        </div>
	      </div>
	    </div>
	    
	<!-- Modal Definitions (tabbed over for <pre>) -->
	<div id="responsive" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">Responsive</h4>
	  </div>
	  <div class="modal-body">
	    <div class="row">
	      <div class="col-md-6">
	        <h4>Some Input</h4>
	        <p><input class="form-control" type="text" /></p>
	        <p><input class="form-control" type="text" /></p>
	        <p><input class="form-control" type="text" /></p>
	        <p><input class="form-control" type="text" /></p>
	        <p><input class="form-control" type="text" /></p>
	        <p><input class="form-control" type="text" /></p>
	        <p><input class="form-control" type="text" /></p>
	      </div>
	      <div class="col-md-6">
	        <h4>Some More Input</h4>
	        <p><input class="form-control" type="text" /></p>
	        <p><input class="form-control" type="text" /></p>
	        <p><input class="form-control" type="text" /></p>
	        <p><input class="form-control" type="text" /></p>
	        <p><input class="form-control" type="text" /></p>
	        <p><input class="form-control" type="text" /></p>
	        <p><input class="form-control" type="text" /></p>
	      </div>
	    </div>
	  </div>
	  <div class="modal-footer">
	    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
	    <button type="button" class="btn btn-primary">Save changes</button>
	  </div>
	</div>

	<div id="full-width" class="modal container fade" tabindex="-1" style="display: none;">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">Full Width</h4>
	  </div>
	  <div class="modal-body">
	    <p>This modal will resize itself to the same dimensions as the container class.</p>
	    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sollicitudin ipsum ac ante fermentum suscipit. In ac augue non purus accumsan lobortis id sed nibh. Nunc egestas hendrerit ipsum, et porttitor augue volutpat non. Aliquam erat volutpat. Vestibulum scelerisque lobortis pulvinar. Aenean hendrerit risus neque, eget tincidunt leo. Vestibulum est tortor, commodo nec cursus nec, vestibulum vel nibh. Morbi elit magna, ornare placerat euismod semper, dignissim vel odio. Phasellus elementum quam eu ipsum euismod pretium.</p>
	  </div>
	  <div class="modal-footer">
	    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
	    <button type="button" class="btn btn-primary">Save changes</button>
	  </div>
	</div>

	<div id="stack1" class="modal fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">Stack One</h4>
	  </div>
	  <div class="modal-body">
	    <p>One fine body…</p>
	    <p>One fine body…</p>
	    <p>One fine body…</p>
	    <input class="form-control" type="text" data-tabindex="1" />
	    <input class="form-control" type="text" data-tabindex="2" />
	    <button class="btn btn-default" data-toggle="modal" href="#stack2">Launch modal</button>
	  </div>
	  <div class="modal-footer">
	    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
	    <button type="button" class="btn btn-primary">Ok</button>
	  </div>
	</div>

	<div id="stack2" class="modal fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">Stack Two</h4>
	  </div>
	  <div class="modal-body">
	    <p>One fine body…</p>
	    <p>One fine body…</p>
	    <input class="form-control" type="text" data-tabindex="1" />
	    <input class="form-control" type="text" data-tabindex="2" />
	    <button class="btn btn-default" data-toggle="modal" href="#stack3">Launch modal</button>
	  </div>
	  <div class="modal-footer">
	    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
	    <button type="button" class="btn btn-primary">Ok</button>
	  </div>
	</div>

	<div id="stack3" class="modal fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">Stack Three</h4>
	  </div>
	  <div class="modal-body">
	    <p>One fine body…</p>
	    <input class="form-control" type="text" data-tabindex="1" />
	    <input class="form-control" type="text" data-tabindex="2" />
	  </div>
	  <div class="modal-footer">
	    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
	    <button type="button" class="btn btn-primary">Ok</button>
	  </div>
	</div>

	<div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
	  <div class="modal-body">
	    <p>Would you like to continue with some arbitrary task?</p>
	  </div>
	  <div class="modal-footer">
	    <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
	    <button type="button" data-dismiss="modal" class="btn btn-primary">Continue Task</button>
	  </div>
	</div>

	<div id="long" class="modal fade" tabindex="-1" data-replace="true" style="display: none;">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">A Fairly Long Modal</h4>
	  </div>
	  <div class="modal-body">
	    <button class="btn btn-default" data-toggle="modal" href="#notlong" style="position: absolute; top: 50%; right: 12px">Not So Long Modal</button>
	    <img style="height: 800px" src="http://i.imgur.com/KwPYo.jpg" />
	  </div>
	  <div class="modal-footer">
	    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
	  </div>
	</div>

	<div id="notlong" class="modal fade" tabindex="-1" data-replace="true" style="display: none;">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">Not That Long</h4>
	  </div>
	  <div class="modal-body">
	    <button class="btn btn-default" data-toggle="modal" href="#verylong" style="position: absolute; top: 50%; right: 12px">Very Long Modal</button>
	    <div style="height: 400px; overflow: hidden;">
	      <img style="height: 800px" src="http://i.imgur.com/KwPYo.jpg" />
	    </div>
	  </div>
	  <div class="modal-footer">
	    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
	  </div>
	</div>

	<div id="verylong" class="modal fade" tabindex="-1" data-replace="true" style="display: none;">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">A Very Long</h4>
	  </div>
	  <div class="modal-body">
	    <div style="height: 1000px; overflow: hidden;">
	      <img style="height: 800px" src="http://i.imgur.com/KwPYo.jpg" />
	    </div>
	  </div>
	  <div class="modal-footer">
	    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
	  </div>
	</div>

	<div id="ajax-modal" class="modal fade" tabindex="-1" style="display: none;"></div>
	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	    <script type="text/javascript" src="http://getbootstrap.com/2.3.2/assets/js/google-code-prettify/prettify.js"></script>
	    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.js"></script>
	    <script src="js/bootstrap-modalmanager.js"></script>
	    <script src="js/bootstrap-modal.js"></script>
	<script type="text/javascript">

	  $(function(){

	    $.fn.modal.defaults.spinner = $.fn.modalmanager.defaults.spinner = 
	      '<div class="loading-spinner" style="width: 200px; margin-left: -100px;">' +
	        '<div class="progress progress-striped active">' +
	          '<div class="progress-bar" style="width: 100%;"></div>' +
	        '</div>' +
	      '</div>';

	    $.fn.modalmanager.defaults.resize = true;

	    $('[data-source]').each(function(){
	      var $this = $(this),
	        $source = $($this.data('source'));

	      var text = [];
	      $source.each(function(){
	        var $s = $(this);
	        if ($s.attr('type') == 'text/javascript'){
	          text.push($s.html().replace(/(\n)*/, ''));
	        } else {
	          text.push($s.clone().wrap('<div>').parent().html());
	        }
	      });
	      
	      $this.text(text.join('\n\n').replace(/\t/g, '    '));
	    });

	    prettyPrint();
	  });
	</script>
	    

	<script id="dynamic" type="text/javascript">
	$('.dynamic .demo').click(function(){
	  var tmpl = [
	    // tabindex is required for focus
	    '<div class="modal hide fade" tabindex="-1">',
	      '<div class="modal-header">',
	        '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>',
	        '<h4 class="modal-title">Modal header</h4>', 
	      '</div>',
	      '<div class="modal-body">',
	        '<p>Test</p>',
	      '</div>',
	      '<div class="modal-footer">',
	        '<a href="#" data-dismiss="modal" class="btn btn-default">Close</a>',
	        '<a href="#" class="btn btn-primary">Save changes</a>',
	      '</div>',
	    '</div>'
	  ].join('');
	  
	  $(tmpl).modal();
	});
	</script>

	<script id="ajax" type="text/javascript">

	var $modal = $('#ajax-modal');

	$('.ajax .demo').on('click', function(){
	  // create the backdrop and wait for next modal to be triggered
	  $('body').modalmanager('loading');

	  setTimeout(function(){
	     $modal.load('modal_ajax_test.html', '', function(){
	      $modal.modal();
	    });
	  }, 1000);
	});

	$modal.on('click', '.update', function(){
	  $modal.modal('loading');
	  setTimeout(function(){
	    $modal
	      .modal('loading')
	      .find('.modal-body')
	        .prepend('<div class="alert alert-info fade in">' +
	          'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
	        '</div>');
	  }, 1000);
	});

	</script> 
	<script>
    <!-- Bootstrap core JavaScript -->
    <script src="../bs/js/bootstrap.min.js"></script>
  </body>
</html>