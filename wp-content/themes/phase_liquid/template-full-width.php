<?php
	/*  Template Name: Full Width  */
	get_header();
	$container_classes = 'single';
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

</div>

<?php get_footer();?>