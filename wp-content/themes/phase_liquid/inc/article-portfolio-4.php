<?php
	$portfolio_categories = get_the_term_list($post->ID,'portfolio_category','',', ');
	$featured_image = phase_featured_image_url('portfolio-index');
	$article_classes = array('index','portfolio','padded-masonry');
?>

<article id="post-<?php the_ID();?>" <?php post_class($article_classes);?>>
<div class="filter">
	<div class="text">
		<?php echo '<h2>'.get_the_title().'</h2><span>'.$portfolio_categories.'</span>';?>
	</div>
	<a class="overlay" href="<?php the_permalink();?>"></a>
	<div class="image">
		<img src="<?php echo $featured_image;?>">
	</div>
	<div class="image hover">
		<img src="<?php echo $featured_image;?>">
	</div>
</div>
</article>