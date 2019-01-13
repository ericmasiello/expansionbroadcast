<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
	<?php exbc_article_title(false);?>
		<div class="entry">
			<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

			<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

		</div>
	</div>
	<?php endwhile; endif; ?>
<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

<?php
$customFieldTwitter = get_post_custom_values("Twitter");
$customFieldMyspace = get_post_custom_values("Myspace");
$customFieldFacebook = get_post_custom_values("Facebook");
$customFieldFacebookFanpage = get_post_custom_values("Facebook Fanpage");
$customFieldWebsite = get_post_custom_values("Website");

if ((isset($customFieldTwitter[0]))||(isset($customFieldMyspace[0]))||(isset($customFieldFacebook[0]))||(isset($customFieldFacebookFanpage[0]))||(isset($customFieldWebsite[0]))):?>
	<div class="social">
		<h3>Find out more about <?php echo get_the_title();?></h3>
		<ul>
			<?php if (isset($customFieldTwitter[0])):?>
				<li><a href="<?php echo $customFieldTwitter[0];?>">Follow on Twitter</a></li>
			<?php endif;?>
			<?php if (isset($customFieldMyspace[0])):?>
				<li><a href="<?php echo $customFieldMyspace[0];?>">Myspace</a></li>
			<?php endif;?>
			<?php if (isset($customFieldFacebook[0])):?>
				<li><a href="<?php echo $customFieldFacebook[0];?>">Facebook</a></li>
			<?php endif;?>
			<?php if (isset($customFieldFacebookFanpage[0])):?>
				<li><a href="<?php echo $customFieldFacebookFanpage[0];?>">Facebook Fanpage</a></li>
			<?php endif;?>
			<?php if (isset($customFieldWebsite[0])):?>
				<li><?php echo $customFieldWebsite[0];?></li>
			<?php endif;?>
		</ul>
	</div>
<?endif;

?>
<?php get_footer(); ?>
