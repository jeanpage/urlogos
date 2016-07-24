<?php
	$quote_author = esc_attr(get_post_meta($post->ID,'quote_author',true));
	$featured_image = phase_featured_image_url('cover');
?>
<div id="featured">
<div class="media">
	<blockquote style="background-image:url(<?php echo $featured_image;?>)">
	<?php 
		echo '<div class="text">'.get_the_title().'<span class="author">'.$quote_author.'</span></div>';
		if($featured_image){
			echo '<div class="overlay"></div>';
		}
	?>
	</blockquote>
</div>
</div>