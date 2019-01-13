<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>
	<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2>Archive for &#8216;<?php single_cat_title(); ?>&#8217;</h2>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2>Archive for <?php the_time('F jS, Y'); ?></h2>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2>Archive for <?php the_time('F, Y'); ?></h2>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2>Archive for <?php the_time('Y'); ?></h2>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2>Author Archive</h2>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2>Blog Archives</h2>
	<?php } ?>
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
	<?php if(get_next_posts_link()||get_previous_posts_link()):?>
	<?php page_nav();?>
	<?php endif;?>
	<?php else :
		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>No posts found.</h2>");
		}
		get_search_form();
	endif;
?>
<?php get_footer(); ?>
