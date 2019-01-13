			<div class="social-footer">
				<div>
					<h2><a href="http://twitter.com/EXBC">Tweets from @EXBC</a></h2>
					<ul id="twitter_update_list"></ul>
					<a href="http://twitter.com/EXBC" id="twitter-follow">Follow @EXBC on Twitter</a>
					
				</div>
				
				<div>
					
					<h2><a href="http://www.facebook.com/pages/Expansion-Broadcast/96102301067">Fan us on Facebook!</a></h2>
					<script type="text/javascript" src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php/en_US"></script>
					<script type="text/javascript">FB.init("2ca183180212880c9cd919006a415ec3");</script>
					<fb:fan profile_id="96102301067" stream="1" connections="10" width="370" css="<?php echo get_template_directory_uri(); ?>/facebook.css?123"></fb:fan>
					<div style="font-size:8px; padding-left:18px;margin-left:-18px">
						<a href="http://www.facebook.com/pages/Expansion-Broadcast/96102301067">Expansion Broadcast on Facebook</a> 
					</div>
				
				</div>
				
			</div>
			
			
			
			<ul id="links">	
				<?php wp_list_categories('&title_li=<h2>Categories</h2> &include=4,8,137,136'); ?>
			
				<?php wp_list_pages('title_li=<h2>Pages</h2>&exclude_tree=488' ); ?>
				
				<?php //wp_list_pages('title_li=<h2>Hosts and Crew</h2>&include=19,21,7,217,9,10,11,484,12,514,8,216,2264' ); ?>
				<?php wp_list_pages('title_li=<h2>Hosts and Crew</h2>&child_of=488' ); ?>
				<li>
					<?php wp_list_bookmarks('title_li=Friends of the Show&categorize=0&&category_before=&category_after='); ?>
				</li>
			</ul>
			
							
			
			
			
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<div id="footer">
	<div class="wrapper">
		<div class="wrapper">
			<!--  had some content here but moved it. -->
			<p>
				<?php bloginfo('name'); ?> is proudly powered by
				<a href="http://wordpress.org/">WordPress</a>
				| <a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>
				and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
			</p>
			<?php wp_footer(); ?>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
	var opts = { 
		_emailId : 'info@expansionbroadcast.com',
		_showFormat : false,
		_inlineLinks : true,
		_linkSeparator : ' ',
		_introCopy : ''
	};
	window._mixeebaify = opts;

	(function() {
		mixeebaScript = document.createElement('script');
		mixeebaScript.type = 'text/javascript';
		mixeebaScript.async = true;

		if (document.location.protocol == "http:") {
			mixeebaScript.src = 'http://js.mixeeba.fm';
			s = document.getElementsByTagName('script')[0];
			s.parentNode.appendChild(mixeebaScript)
		}
	})();
	
	$(document).ready(function(){
	
		$('.mixeeba-links').before('<span class="buy-link">Buy</span>');
		
		$('.buy-link').click(function(){
			$(this).next('.mixeeba-links').css('display', 'inline')
		});
	
	});

</script>
<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/EXBC.json?callback=twitterCallback2&amp;count=5"></script>


</body>
</html>