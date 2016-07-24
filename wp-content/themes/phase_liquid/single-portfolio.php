<?php
	get_header();
	$display_sidebar = esc_attr(get_theme_mod('display_sidebar',false));
	$portfolio_display_progress_bar = esc_attr(get_theme_mod('portfolio_display_progress_bar',false));
	if(is_active_sidebar('single_sidebar')&&$display_sidebar){
		$sidebar = 'has-sidebar';
	}else{
		$sidebar = '';
	}
	$container_classes = 'single '.$sidebar;
	if($portfolio_display_progress_bar == true){
		echo '<div id="progress-bar"><span></span></div>';
	}
?>

<div id="container" class="<?php echo $container_classes;?>">

	<div id="posts">

		<?php 
			if(have_posts()){
				while(have_posts()):
					the_post();get_template_part('inc/article-portfolio-single');
				endwhile;
			}
			if(get_query_var('paged')){
	    		$paged = get_query_var('paged');
			}else if(get_query_var('page')){
	    		$paged = get_query_var('page');
			}else{
	    		$paged = 1;
			}
			$current_id = get_the_ID();
			$args = array('post_type'=>'portfolio','paged'=>$paged,'posts_per_page'=>12,'orderby'=>'rand','post__not_in'=>array($current_id));
			$query = new WP_Query($args);
			if($query->have_posts()){
				echo '<div id="portfolio-more"><a id="grid_slide" href="#">More Work</a><div class="grid grid-padded">';
					while($query->have_posts()):$query->the_post();
						get_template_part('inc/article-portfolio-3');
					endwhile;
					wp_reset_postdata();
				echo '</div></div>';
			}
		?>

	</div>

	<?php 
		if($display_sidebar == true){
			get_sidebar('single');
		}
	?>

</div>

<?php get_footer();?>