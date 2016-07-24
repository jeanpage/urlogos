<?php 
	if(get_post_gallery()){
		echo '<style type="text/css">article.single .gallery:first-of-type{display:none !important}</style>';
        $gallery = get_post_gallery(get_the_ID(),false);
        $gallery_ids = explode(",",$gallery['ids']);
        echo '<div id="featured"><ul class="slider media">';
        foreach($gallery_ids as $id){
            $image_src = wp_get_attachment_image_src($id,'cover')[0];
            echo '<li><img src="'.$image_src.'"></li>';
        }
        echo '</ul></div>';
	}else{
		if(has_post_thumbnail()){
			echo '<div id="featured">';
			the_post_thumbnail();
			echo '</div>';
		}
	}
?>