<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="norton-safeweb-site-verification" content="246sla5g9se3xgnf-o9p9wzkrveafek3eozdj5zu-aklw2e7047w707q-ub8b4xsk-qnyziu-y92nusn1l9ci8vqhi4xk1mutekvwfpoxavqn57-zzcmf2c1sls2mmy4" />
	<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 * We filter the output of wp_title() a bit -- see
		 * twentyten_filter_wp_title() in functions.php.
		 */
		wp_title( '|', true, 'right' );
		
		// Add the blog name.
		bloginfo( 'name' );
	
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
	
	?></title>
	<script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script> <!-- needed for adaptive images -->
	
	<meta name="apple-mobile-web-app-capable" content="yes"> <!-- makes it behave like native app on iOS -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- icons used for iOS springboard -->
	<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/touch-icon-iphone.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/touch-icon-iphone4.png" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<script type="text/javascript">
	
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-162757-1']);
	  _gaq.push(['_setDomainName', '.expansionbroadcast.com']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
</head>
<body <?php body_class(); ?>>
	<div id="header">
		<div class="wrapper">
			<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<h2><?php bloginfo('description'); ?></h2>
			<form id="search" method="get" action="<?php bloginfo('url');?>">
				<label for="s">Search</label>
				<input type="text" name="s" id="s" placeholder="Search" value="<?php the_search_query(); ?>" />
				<input type="submit" value="Go" />
			</form>
			
			<ul id="controls">
				<li><a href="http://phobos.apple.com/WebObjects/MZStore.woa/wa/viewPodcast?id=202064651" class="itunes">Subscribe in iTunes</a></li>
				<li><a href="http://feeds.feedburner.com/ExpansionPodcast" class="rss">Subscribe vis RSS</a></li>				
				<li><a href="http://twitter.com/exbc" class="twitter">Follow us Twitter @EXBC</a></li>
				<li><a href="http://facebook.com/expansionbroadcast" class="facebook">Fan Expansion Broadcast on Facebook</a></li>
				<li>
					<span class="listen">Listen Live 7-11 PM EST, 12-4 AM GMT</span>
					<ul>
						<li><a href="http://live.expansionbroadcast.com" class="video" title="via UStream">Video Stream</a></li>
</ul>
				</li>
			</ul>
			
		</div>
	</div>
	<div id="content">
		<div class="wrapper">
			<div id="main-content">
