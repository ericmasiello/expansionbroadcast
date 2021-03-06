<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

	<h2>Oops, you&rsquo;re a douche bag <span class="subtitle">(Error 404 &ndash; Page Not Found)</span></h2>
	<img src='http://www.expansionbroadcast.com/blog/wp-content/uploads/2007/08/douchebag1.png' alt='Douche Bag'/>
	<p>Sorry chief, but the file you&rsquo;re looking for isn&rsquo;t here.  I&rsquo;m sure its incredibly important that you find this file so I suggest you first try searching for it via our <a href="#s">search form</a>.</p>
	<p>Oh, and in case you didn&rsquo;t know, this page you're looking at (yes, the one that&rsquo;s calling <em>you</em> a douche bag), <a href="/announcements/were-teh-famous/" title="article on our 404 page">is famous!</a> And for those that lack any sense of humor whatsoever, I suppose you&rsquo;re not actually a douche bag.</p>
	<h3>Still can&rsquo;t find it?  Hit us up &ndash; we&rsquo;ll sort you out</h3>
	<?php include('contact-form.php')?>	
<?php
global $hasSubtext;
$hasSubtext = true;
?>
<?php get_footer(); ?>