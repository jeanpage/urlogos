<?php
	$display_article_tags = esc_attr(get_theme_mod('display_article_tags',true));
	if(is_page()){
		$format = 'page';
		$attached_images_as_slideshow = esc_attr(get_post_meta($post->ID,'attached_images_as_slideshow',true));
		$post_display_social_sharing_buttons = esc_attr(get_post_meta($post->ID,'post_display_social_sharing_buttons',true));
	}else{
		$format = 'post';
		$post_display_social_sharing_buttons = esc_attr(get_theme_mod('post_display_social_sharing_buttons',true));
	}
	$article_classes = array('single','blog',$format);
?>
<article id="post-<?php the_ID();?>" <?php post_class($article_classes);?>>
	<?php 
		if($format == 'page'){
			if($attached_images_as_slideshow){
				get_template_part('inc/content-gallery');
			}
			else{
				if(has_post_thumbnail()){
					echo '<div id="featured">';
					the_post_thumbnail();
					echo '</div>';
				}
			}
		}else{
			get_template_part('inc/content',get_post_format());
		}
	?>
	<div id="content">
		<header>
			<h1><?php the_title();?></h1>
			<?php if($format == 'post'){?>
				<span>By <?php echo the_author_posts_link();?>, published on <?php the_date('F d, Y');?>, in <?php the_category(', ');?></span>
			<?php }?>
		</header>
		<?php 
			the_content();
			if($post_display_social_sharing_buttons||($display_article_tags&&has_tag())){
			?>
			<div id="meta">
				<?php if($post_display_social_sharing_buttons){?>
					<div id="share">
						<b>Share: </b>
						<li class="facebook">
							<a href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink();?>" target="_blank">
								<i class="icon-facebook"></i><span>Facebook</span>
							</a>
						</li><li class="twitter">
							<a href="http://twitter.com/intent/tweet?text=<?php the_title();?>&url=<?php echo get_the_permalink();?>" target="_blank">
								<i class="icon-twitter"></i><span>Twitter</span>
							</a>
						</li><li class="pinterest">
							<a href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'>
								<i class="icon-pinterest"></i><span>Pinterest</span>
							</a>
						</li><li class="googleplus">
							<a href="https://plus.google.com/share?url=<?php echo get_permalink();?>" target="_blank">
								<i class="icon-gplus"></i><span>Google+</span>
							</a>
						</li>
					</div>
				<?php 
					}
					if($display_article_tags&&has_tag()){
					?>
					<div id="tags">
						<b>Tags:</b>
						<?php the_tags('<li>','<li>','</li>');?>
					</div>
				<?php }?>
			</div>
		<?php }?>
	</div>
	<?php comments_template();?>
</article>