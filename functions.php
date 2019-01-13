<?php

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 220, 180, true );

if ( function_exists('register_sidebar') ){
    register_sidebar();
}

function format_subtitle($subtitle){
	if((trim(strtolower($subtitle))=="drum and bass")||(trim(strtolower($subtitle))=="drum & bass")||(trim(strtolower($subtitle))=="drum &amp; bass")||(((substr(strtolower($subtitle),0,4)=="drum")&&(substr(strtolower($subtitle),-4)=="bass")))){
		return "Drum <span>&amp;</span> Bass";
	}else{
		$subtitle = str_replace('&#038;', '<span>&amp;</span>', $subtitle);
		return $subtitle;
	}
}

//Does a bunch of crazy stuff to handle print of the titles
//if you 
function exbc_article_title($printLink=true,$tag="h2"){
	?>
	<<?php echo $tag;?>>
	<?php if($printLink):?>
		<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
	<?
	endif;
	global $hasSubtext;
	$hasSubtext = false;
	
	//Basically here, we're looking to see if you wrote a title like 'Podcast blah blah [Genre Goes here]'
	//It will take the part in brackets and put it into a <span class="title"></span> to make it look different
	//than the rest of the title.  This way you to don't have to futz with customFields and you still get the SEO benefits
	//cuz the genre will still be displayed in the RSS feed
	$titleSplit = explode(' [', get_the_title());
	$title = $titleSplit[0];
	$subtitleBr = str_replace(']', '', $titleSplit[1]);
	if(strlen($subtitleBr)>0):
		$hasSubtext = true;					
		echo $title . " <span class=\"subtitle output1\">". format_subtitle($subtitleBr) . "</span>";			
	else:
		if(substr(strtolower(get_the_title()),0,7)=="podcast"){
			//Now we check to see if I wrote the title in paranthesis
			$titleSplit = explode(' (', get_the_title());
			$title = $titleSplit[0];
			$subtitleParen = str_replace(')', '', $titleSplit[1]);
			if(strlen($subtitleParen)>0):
				$hasSubtext = true;					
				echo $title . " <span class=\"subtitle output2\">". format_subtitle($subtitleParen) . "</span>";
			endif;
		}
		//Goes down here as the final catch all	
		if(!$hasSubtext):	
			echo $title;				 
			$customFieldGenre = get_post_custom_values("genre");
			$customFieldSubtitle = get_post_custom_values("subtitle");
			if (isset($customFieldGenre[0])) {
				$hasSubtext = true;
				echo " <span class=\"genre output3\">". format_subtitle($customFieldGenre[0]) ."</span>";
			}else if (isset($customFieldSubtitle[0])){
				$hasSubtext = true;
				echo " <span class=\"subtitle output4\">".format_subtitle($customFieldSubtitle[0])."</span>";
			}
		endif;
	endif;
	if($printLink):?>
		</a>
	<?php endif;?>
	</<?php echo $tag;?>>
	<?php
}

function page_nav(){
	if(get_next_posts_link()||get_previous_posts_link()):?>
		<ol class="navigation">			
			<li class="next"><?php previous_posts_link('&laquo; Newer Entries') ?></li>
			<li class="previous"><?php next_posts_link('Older Entries &raquo;') ?></li>
		</ol>
	<?php endif;
}


function exbc_live(){

	$account = "expansion-broadcast";

	if ( $account )
	
	// ==============================
	// Ustream Status starts here
	// ==============================
	// TRANSIENT STARTS HERE
	/*if ( false === ( $UstStatusArray = get_transient( 'wp_ustream_status' ) ) ) {
		$opt = stream_context_create(array(
		'http' => array( 'timeout' => 3 )
		));
		$UstStatusSerial = file_get_contents('http://api.ustream.tv/php/channel/' . $account . '/getValueOf/status',0,$opt);
		$UstStatusArray = unserialize($UstStatusSerial);
		set_transient( 'wp_ustream_status', $UstStatusArray, 120 );
	}*/
	// TRANSIENT ENDS HERE
		// For DEBUG
		// echo '<!--' . $UstStatusArray . '-->';
		// Decode JSON
	/* switch ( $UstStatusArray['results'] )
		{
		case 'live':
			$UstStatus = 1;
		break;
		case 'offline':
			$UstStatus = 2;
		break;
		case 'error':
			$UstStatus = false;
		break;
		}
    */
	if ($UstStatus == 1) {		
	?>
		<div style="margin: 20px 0 50px; border: 0px solid #999; border-width: 0 0 1px 0">
			<h2>Hey there internet, we&rsquo;re live!</h2>
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="770" id="utv919266">
				<param name="flashvars" value="autoplay=false&amp;brand=embed&amp;cid=9113986&amp;v3=1">
				<param name="allowfullscreen" value="true">
				<param name="allowscriptaccess" value="always">
				<param name="movie" value="http://www.ustream.tv/flash/viewer.swf">
				<embed flashvars="autoplay=false&amp;brand=embed&amp;cid=9113986&amp;v3=1" width="770" height="400" allowfullscreen="true" allowscriptaccess="always" id="utv919266" name="utv_n_691519" src="http://www.ustream.tv/flash/viewer.swf" type="application/x-shockwave-flash">
			</object>
			
			<p>Also, feel free to stream the audio only version of the show via <a href="http://www.bassradio.fm">Bassradio.fm</a></p>		
			<div style="background: #25292E; margin-bottom: 10px; height: 36px; overflow: hidden">
				<script src="http://player.radiocdn.com/iframe.js?hash=88ab39da94eab38dc4ba822790cc5f59101a2fef-118-41"></script>
			</div>
		</div>
	<?php
	// ONLINE part ends here
	}
	else if ($UstStatus == 2) {
		// Offline, not live
		
		?>
	<?php } else {
		//echo _e('Error occured. We could not retrieve the data from Ustream.');
	}
	

}
?>