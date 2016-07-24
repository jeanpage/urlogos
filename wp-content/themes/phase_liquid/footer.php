<?php
	if(is_page()){
		$display_social_sharing_buttons = esc_attr(get_post_meta($post->ID,'display_social_sharing_buttons',true));
	}else{
		$display_social_sharing_buttons = esc_attr(get_theme_mod('display_social_sharing_buttons',true));
	}
	if(is_single()&&$display_social_sharing_buttons){
		echo '<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>';
	}
	wp_footer();
?>

</body>
</html>