<?php
	$audio_url = esc_url(get_post_meta($post->ID,'audio_url',true));
	$getValues = wp_remote_fopen('http://soundcloud.com/oembed?format=js&url='.$audio_url.'&iframe=true');
	$soundcloud_id = json_decode(substr($getValues,1,-2));
	$soundcloud_string01 = array('height="400"','&show_artwork=true');
	$soundcloud_string02 = array('height="320"','&show_artwork=true&amp;show_comments=false');
	$soundcloud_iframe = str_replace($soundcloud_string01,$soundcloud_string02,$soundcloud_id->html);
	if($audio_url){
		echo '<div id="featured"><div class="media">'.$soundcloud_iframe.'</div></div>';
	}else{
		if(has_post_thumbnail()){
			echo '<div id="featured">';
			the_post_thumbnail();
			echo '</div>';
		}
	}
?>