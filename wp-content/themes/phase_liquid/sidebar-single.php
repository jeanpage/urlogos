<?php
	if(is_active_sidebar('single_sidebar')){
		echo '<aside id="single-sidebar"><a id="single-sidebar_slide" href="#"><i class="icon-menu"></i></a><div class="wrapper">';
			dynamic_sidebar('single_sidebar');
		echo '</div></aside>';
	}
?>