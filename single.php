<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();

$post_id = 0;
?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<?php $post_id = get_the_ID(); ?>
	
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php /*Begin Crazy Header Stuff */?>
			<?php exbc_article_title(false);?>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p class="tags">Tags: ', ', ', '</p>'); ?>

				<!-- <p class="postmetadata alt">
					<small>
						This entry was posted
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/wordpress/time-since/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
						on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
						and is filed under <?php the_category(', ') ?>.
						You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.

						<?php if ( comments_open() && pings_open() ) {
							// Both Comments and Pings are open ?>
							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

						<?php } elseif ( !comments_open() && pings_open() ) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

						<?php } elseif ( comments_open() && !pings_open() ) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

						<?php } elseif ( !comments_open() && !pings_open() ) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.

						<?php } edit_post_link('Edit this entry','','.'); ?>

					</small>
				</p> -->

			</div>
		</div>
		
		<?php if(get_next_posts_link()||get_previous_posts_link()):?>
		
			<ol class="navigation">
				<li class="previous"><?php previous_post_link('%link', '&laquo; Previous Post') ?></li>
				<li class="next"><?php next_post_link('%link', 'Next Post &raquo;') ?></li>
			</ol>
			
		<?php endif;?>
		
	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php if( in_category( "podcast", $post_id ) ): ?>
	<div class="featured-mixes">
		<h2>Featured Mixes</h2>
		<ul>
		<?php 
		
		$my_query = new WP_Query(array('category_name'=> 'featured-mixes','posts_per_page' => 3,'post__not_in' => array($post_id) ));
		
		//$my_query = new WP_Query('category_name=featured&posts_per_page=3');
		
		while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
			
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
	</div>
<?php endif; ?>



<?php get_footer(); ?>
