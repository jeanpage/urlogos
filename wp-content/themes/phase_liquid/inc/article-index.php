<?php
	$blog_post_format = esc_attr(get_theme_mod('blog_post_format','blog_post_format_grid'));
	$post_format = get_post_format();
	if($post_format === false){
		$post_format = 'standard';
	}
	$featured_image = get_the_post_thumbnail(get_the_ID(),'blog-index');
	$featured_image_url = phase_featured_image_url('blog-index');
	if($featured_image == ''){
		$has_featured_image = 'no-featured-image';
	}else{
		$has_featured_image = 'has-featured-image';
	}
	$post_date = get_the_date('F d, Y');
	$post_category = get_the_category_list(', ');
	$article_classes = array('index','blog',$has_featured_image);
?>

<article id="post-<?php the_ID();?>" <?php post_class($article_classes);?>>
<div class="box">
	<?php
		if($blog_post_format == 'blog_post_format_grid'){
			if($featured_image_url){
				echo '<div class="featured" style="background-image:url('.$featured_image_url.')">';
			}else{
				echo '<div class="featured" style="height:40px">';
			}
		}else{
			echo '<div class="featured">'.$featured_image;
		}
		if(is_sticky()){
			echo '<div class="format format-sticky"><i class="icon-pin"></i><span>Sticked</span></div>';
		}
		echo '<div class="format format-'.$post_format.'"><i class="icon-format-'.$post_format.'"></i><span>'.$post_format.'</span></div></div><div class="content"><h2>'.get_the_title().'</h2><span>Published on '.$post_date.', in '.$post_category.'</span><p>'.get_the_excerpt().'</p></div>';
	?>
	<a class="overlay" href="<?php the_permalink();?>"></a>
</div>
</article>