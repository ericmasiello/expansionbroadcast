<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<?php
global $do_not_duplicate;




global $hasSubtext;
global $contactform;
global $is_homepage;

if((is_single()||is_page()||is_404())&&($hasSubtext)){

	$sidebarClass = "subtext";
	
}
?>
	<div id="sidebar" class="<?php echo $sidebarClass; ?>">
		
		<!--<h2>Listen Live via <a href="http://www.bassradio.fm">Bassradio.fm</a> <br/>Fridays 7-9 PM EST</h2>
		<div style="background: #25292E; height: 36px; overflow: hidden">
<script src="http://player.radiocdn.com/iframe.js?hash=88ab39da94eab38dc4ba822790cc5f59101a2fef-118-41"></script>
		</div>-->
						
		<?php if( $contactform ):?>
			
			<h2>Our Twittering</h2>
			<dl>
				<dt><a href="http://twitter.com/exbc">@EXBC</a></dt>
				<dd>Our very own Expansion Broadcast twitter page.  Be sure to add us</dd>
				<dt><a href="http://twitter.com/ericmasiello">@ericmasiello</a></dt>
				<dd>IllEffect's personal Twitter &ndash; warning &ndash; it gets geeky</dd>
				<dt><a href="http://twitter.com/r4ns0m">@r4ns0m</a></dt>
				<dd>Harry Ransom's personal Twitter</dd>
				<dt><a href="http://twitter.com/DCDNB">@DCDNB</a></dt>
				<dd>All things drum &amp; bass from the DCDNB project</dd>
			</dl>
			
		<?php else:?>
			<?php if( is_home() || $is_homepage ):?>				
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
				<?php endif; ?>
			<?php endif;?>
			
			<?php if( is_home() || $is_homepage ):?>	

<!--
				<div class="ad">For ClickitTicket concert tickets, <a href="http://www.clickitticket.com">go here</a></div>-->
				
				<?php $my_query = new WP_Query(array('category_name'=> 'featured-events','posts_per_page' => 2)); ?>
				
				<?php if( $my_query->post_count > 0 ): ?>
				
					<h2>Featured Events</h2>
					<ul class="featured-mixes">
					<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
						
						<?php if( get_the_post_thumbnail( $post->ID ) ): ?>
						
						<?php
						//Gets post's custom attributes
						$custom = get_post_custom();
						?>
										
						<li>
							<?php if( !empty($custom["custom_url"]) ): ?>
							
								<a href="<?php echo $custom['custom_url'][0] ?>" title="<?php the_title_attribute( 'echo=0' ); ?>" rel="bookmark" class="featured-mix-photo">
								
							<?php else: ?>
							
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( 'echo=0' ); ?>" rel="bookmark" class="featured-mix-photo">
								
							<?php endif; ?>						
							
								<?php the_post_thumbnail();?>
								
								<span class="featured-mix-title">
								
									<?php exbc_article_title(false, "h4"); ?>
									
									<?php if( !empty( $custom["event_date"] ) ): ?>
										
										<?php echo "<h4>" . $custom["event_date"][0] . "</h4>"; ?>
										
									<?php endif; ?>
								
								</span>
		    				</a>
		    			</li>
		    					    				
		    			<?php endif; ?>
		    			
		    								
					<?php endwhile; ?>
					</ul>
					
				<?php endif; ?>
				
				<?php $my_query = new WP_Query(array('category_name'=> 'featured-mixes','posts_per_page' => 4,'post__not_in' => $do_not_duplicate)); ?>
								
				<?php if( $my_query->post_count > 0 ): ?>
				
					<h2>Featured Mixes</h2>
					<ul class="featured-mixes">
					<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
						
						<?php if( get_the_post_thumbnail( $post->ID ) ): ?>
										
						<li>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( 'echo=0' ); ?>" rel="bookmark" class="featured-mix-photo">
								<?php the_post_thumbnail();?>
								
								<span class="featured-mix-title"><?php exbc_article_title(false, "h4"); ?></span>
		    				</a>
		    			</li>
		    					    				
		    			<?php endif; ?>
		    			
		    								
					<?php endwhile; ?>
					</ul>
					
				<?php endif; ?>
				
			<?php endif;?>
			
			
			<?php if((is_single() || is_page() || is_search()) && (function_exists("similar_posts"))):?>
				
				<h2>Similar Mixes</h2>
				<ul class="similar">
					<?php similar_posts(); ?>
				</ul>
				
			<?php endif;?>
			
			<?php /* Widgetized sidebar, if you have the plugin installed. */ ?>
			<ul class="nav" role="navigation">
				<?php if(is_search()):?>
				<li><h2>Archives</h2>
					<ul>
					<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</li>
				<?php endif;?>				
			</ul>
			
			<?php //if( is_home() || $is_homepage ):?>
				
				<?php //if( function_exists("popular_posts") ) :?>
					<!--
					<h2>Popular Mixes</h2>
					
					<ul class="popular">
					-->
						<?php //popular_posts(); ?>
					<!--
					</ul>
					-->
				<?php //endif; ?>
				
			<?php //endif; ?>
			
			
		<?php endif;?>
		
		<?php if ( is_404() || is_category() || is_day() || is_month() || is_year() || is_paged() ) {?>
			<?php /* If this is a 404 page */ if (is_404()) { ?>
				<!-- 404 stuff -->
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
				<p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>
			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
				<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives for the day <?php the_time('l, F jS, Y'); ?>.</p>
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives for <?php the_time('F, Y'); ?>.</p>
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives for the year <?php the_time('Y'); ?>.</p>
			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<p>You are currently browsing the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives.</p>
			<?php } ?>
		<?php }?>
		
		<?php if($contactform):?>
			<h2>Fan us on Facebook!</h2>
			<script type="text/javascript" src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php/en_US"></script>
			<script type="text/javascript">FB.init("2ca183180212880c9cd919006a415ec3");</script><fb:fan profile_id="96102301067" stream="1" connections="10" width="200"></fb:fan><div style="font-size:8px; padding-left:18px;margin-left:-18px"><a href="http://www.facebook.com/pages/Expansion-Broadcast/96102301067">Expansion Broadcast on Facebook</a> </div>
		<?php endif;?>
	</div>