<?php
	get_header();
	$post_display_progress_bar = esc_attr(get_theme_mod('post_display_progress_bar',true));
	if(is_active_sidebar('single_sidebar')){
		$sidebar = 'has-sidebar';
	}else{
		$sidebar = '';
	}
	$container_classes = 'single '.$sidebar;
	if($post_display_progress_bar == true){
		echo '<div id="progress-bar"><span></span></div>';
	}
?>

<div id="container" class="<?php echo $container_classes;?>">

	<div id="posts">
		<?php 
			if(have_posts()){
				while(have_posts()):
					the_post();get_template_part('inc/article');
				endwhile;
			}
			$num = 'num-1';
			if(get_next_post()){
				$num = 'num-1';
				if(get_previous_post()){
					$num = 'num-2';
				}
			}
			echo '<div id="article-pagination" class="'.$num.'">';
			if(get_next_post()){
				$next_featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_next_post()->ID));
				echo '<li class="next" style="background-image:url('.$next_featured_image.')"><div class="center"><span>Next article</span><h3>'.get_the_title(get_next_post()->ID).'</h3><p>'.phase_get_the_excerpt(get_next_post()->ID).'</p></div><a class="overlay" href="'.get_permalink(get_adjacent_post(false,'',false)).'"></a></li>';
			}
			if(get_previous_post()){
				$prev_featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_previous_post()->ID));
				echo '<li class="prev" style="background-image:url('.$prev_featured_image.')"><div class="center"><span>Previous article</span><h3>'.get_the_title(get_previous_post()->ID).'</h3><p>'.phase_get_the_excerpt(get_previous_post()->ID).'</p></div><a class="overlay" href="'.get_permalink(get_adjacent_post(false,'',true)).'"></a></li>';
			}
			echo '</div>';
		?>
	</div>

	<?php get_sidebar('single');?>

</div>

<?php get_footer();?>