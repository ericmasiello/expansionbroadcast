<?php
/*
Template Name: contact
*/
get_header();
?>
	<div class="post">
		<h2>Just ask&hellip;  We Insist.</h2>
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>		
			<div class="entry">
				<?php the_content(); ?>	
			</div>		
		<?php endwhile; endif; ?>
		
		<?php include('contact-form.php')?>
	</div>

<?php 
$contactform = true;

get_footer(); ?>

