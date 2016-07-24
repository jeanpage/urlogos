<?php 
	if(has_post_thumbnail()){
		echo '<div id="featured">';
		the_post_thumbnail();
		echo '</div>';
	}
?>