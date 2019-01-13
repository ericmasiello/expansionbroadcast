<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>
	<?php if (have_posts()) : ?>

		<h2>And Here's What We Found&hellip;</h2>
		<p>You have searched the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> archives for <strong>'<?php the_search_query(); ?>'</strong>. If you are unable to find anything in these search results, try searching again or feel free to <a href="#contact-form">contact us</a>.</p>
		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?>>
				<?php exbc_article_title(true, "h3");?>
				<div class="postmetadata">
					<p class="postdate" title="Posted on <?php the_time('F jS, Y') ?>"><span class="month"><?php the_time('M') ?></span> <span class="day"><?php the_time('j') ?></span> <span class="year"><?php the_time('Y') ?></span></p>
					<p class="comment"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
				</div>
				<div class="entry">
					<?php the_excerpt();?>
				</div>
				<p class="tags categories admin"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?></p>
			</div>

		<?php endwhile; ?>
		<?php page_nav();?>
	<?php else : ?>

		<h2 class="noresults">Sorry champ, we couldn&rsquo;t find that. Try a different search?</h2>
		<?php get_search_form(); ?>
		
		<h3>Or perhaps check some of our more Popular Posts</h3>
		<?php popular_posts(); ?>
		
		<h3>Or heck, looking for something you don't see &mdash; email us.  (We'll respond, don't worry)</h3>

	<?php endif; ?>
	<?php include('contact-form.php')?>
<?php get_footer(); ?>
