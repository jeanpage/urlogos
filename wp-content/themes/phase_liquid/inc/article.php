<?php
	if(!is_single()){
		get_template_part('inc/article-index');
	}else{
		get_template_part('inc/article-single');
	}
?>