<?php
defined('_JEXEC') or die;

/* The following line loads the MooTools JavaScript Library */
JHtml::_('behavior.framework', true);

/* The following line gets the application object for things like displaying the site name */
$app = JFactory::getApplication();
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">
	
	<!-- The following JDOC Head tag loads all the header and meta information from your site config and content. -->
	<jdoc:include type="head" />

	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/style.css" type="text/css" media="screen">

	<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/cva-libs/js/modernizr-2.5.3-respond-1.1.0.min.js"></script>
	<!--[if lt IE 9]><script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!-- The following line loads the template JavaScript file located in the template folder. It's blank by default. -->
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/template.js"></script>
</head>
<body>
<!--[if lt IE 7]><p class=chromeframe>Your web browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

	<!-- Header -->
	<header id="top">
		<h1><?php echo $app->getCfg('sitename'); ?></h1>
		<?php if($this->countModules('atomic-search')) : ?>
			<div class="joomla-search span-7 last">
  	 			<jdoc:include type="modules" name="atomic-search" style="none" />
			</div>
		<?php endif; ?>
	</header> <!-- end Header -->
	
	<!-- Navigation -->
	<nav>
		<?php if($this->countModules('atomic-topmenu')) : ?>
			<jdoc:include type="modules" name="atomic-topmenu" style="container" />
		<?php endif; ?>
	</nav> <!-- end Navigation -->

	<!-- Main Body -->
	<article id="maincolumn">
		<header>
			<h2>Main</h2>
		</header>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <a href="#">laboris nisi ut aliquip</a> ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</article> <!-- end Main Body -->

	<!-- Sidebar -->
	<section id="sidebar">
		<?php if($this->countModules('atomic-sidebar')) : ?>
			<div class="span-7 last">
        		<jdoc:include type="modules" name="atomic-sidebar" style="sidebar" />
			</div>
		<?php endif; ?>
	</section> <!-- end Sidebar -->
	
	<!-- Footer -->
	<footer id="bottom">
		<section id="about">
			<header>
				<h3>About</h3>
			</header>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <a href="#">laboris nisi ut aliquip</a> ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</section>
		<section id="sitemap">
			<header>
				<h3>Sitemap</h3>
			</header>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Portfolio</a></li>
				<li><a href="#">Services</a></li>
				<li><a href="#">Contact</a></li>
				<li><a href="#">Subscribe</a></li>
			</ul>
		</section>
		<section id="popular">
			<header>
				<h3>Popular</h3>
			</header>
			<ul>
				<li><a href="#">This is the title of a blog post</a></li>
				<li><a href="#">Lorem ipsum dolor sit amet</a></li>
				<li><a href="#">Consectetur adipisicing elit, sed do eiusmod</a></li>
				<li><a href="#">Duis aute irure dolor</a></li>
				<li><a href="#">Excepteur sint occaecat cupidatat</a></li>
				<li><a href="#">Reprehenderit in voluptate velit</a></li>
				<li><a href="#">Officia deserunt mollit anim id est laborum</a></li>
				<li><a href="#">Lorem ipsum dolor sit amet</a></li>
			</ul>
		</section>
		<hr>
		&copy;<?php echo date('Y'); ?> <?php echo $app->getCfg('sitename'); ?>
	</footer> <!-- end Footer -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="cva-libs/js/jquery-1.7.1.min.js"><\/script>')</script>
	<script src="cva-libs/js/plugins.js"></script>
	<script src="cva-libs/js/script.js"></script>
	<script>
		var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>

</body>
</html>
