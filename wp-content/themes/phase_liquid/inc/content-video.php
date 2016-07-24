<?php
	$video_url = esc_url(get_post_meta($post->ID,'video_url',true));
	if(strpos($video_url,'youtube') > 0||strpos($video_url,'youtu.be') > 0){
		parse_str(parse_url($video_url,PHP_URL_QUERY),$my_array_of_vars);
		$video_id = $my_array_of_vars['v'];
		$video_src = '<iframe width="560" height="315" src="//www.youtube.com/embed/'.$video_id.'?showinfo=1" frameborder="0" allowfullscreen></iframe>';
	}elseif(strpos($video_url,'vimeo') > 0){
		$video_id = (int)substr(parse_url($video_url,PHP_URL_PATH),1);
		$video_src = '<iframe src="//player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="560" height="315" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	}else{
		$video_src = '';
	}
	if($video_url){
		echo '<div id="featured"><div class="media">'.$video_src.'</div></div>';
	}else{
		if(has_post_thumbnail()){
			echo '<div id="featured">';
			the_post_thumbnail();
			echo '</div>';
		}
	}
?>