<?php get_header(); ?>
	
	<?php exbc_live(); ?>
	
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			
			<?php $do_not_duplicate[] = $post->ID; ?>
		
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>" class="home">
				<?php exbc_article_title();?>
				<div class="postmetadata">
					<p class="postdate" title="Posted on <?php the_time('F jS, Y') ?>"><span class="month"><?php the_time('M') ?></span> <span class="day"><?php the_time('j') ?></span> <span class="year"><?php the_time('Y') ?></span></p>
					<p class="comment"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
				</div>
				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>
				<p class="admin"><?php edit_post_link('Edit', '', ''); ?></p>
			</div>
		<?php endwhile; ?>
		<?php page_nav();?>
	<?php else : ?>
		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>
	<?php endif; ?>
	
<?php get_footer(); ?>
