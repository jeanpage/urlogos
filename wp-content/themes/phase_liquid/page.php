<?php
	get_header();
	if(is_active_sidebar('single_sidebar')){
		$sidebar = 'has-sidebar';
	}else{
		$sidebar = '';
	}
	$container_classes = 'single '.$sidebar;
?>

<div id="container" class="<?php echo $container_classes;?>">

	<div id="posts">
		<?php 
			if(have_posts()){
				while(have_posts()):
					the_post();get_template_part('inc/article-single');
				endwhile;
			}
		?>
	</div>

	<?php get_sidebar('single');?>

</div>

<?php get_footer();?>