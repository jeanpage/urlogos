<?php
    function remove_http($url){
		$url = trim($url, '/');
		if(!preg_match('#^http(s)?://#',$url)){
		    $url= 'http://' . $url;
		}
		$url_parts = parse_url($url);
		$domain = preg_replace('/^www\./', '', $url_parts['host']);
		return $domain;
    }
	$portfolio_gallery_slideshow = esc_attr(get_post_meta($post->ID,'portfolio_gallery_slideshow',true));

	$portfolio_client_name = esc_attr(get_post_meta($post->ID,'portfolio_client_name',true));
	$portfolio_work_url = esc_url(get_post_meta($post->ID,'portfolio_work_url',true));
	$portfolio_work_url_no_http = remove_http($portfolio_work_url);
	$portfolio_purchase_price = esc_attr(get_post_meta($post->ID,'portfolio_purchase_price',true));
	$portfolio_purchase_url = esc_url(get_post_meta($post->ID,'portfolio_purchase_url',true));
	$portfolio_purchase_url_no_http = remove_http($portfolio_purchase_url);
	$portfolio_display_social_sharing_buttons = esc_attr(get_theme_mod('portfolio_display_social_sharing_buttons',true));
	$client_name_label = esc_attr(get_theme_mod('client_name_label','Client Name'));
	$work_url_label = esc_attr(get_theme_mod('work_url_label','Visit Site'));
	$purchase_work_label = esc_attr(get_theme_mod('purchase_work_label','Purchase Work'));
	$article_classes = array('portfolio','single')
?>

<article id="post-<?php the_ID();?>" <?php post_class($article_classes);?>>
	<?php 
		if($portfolio_gallery_slideshow && get_post_gallery()){
			echo '<style type="text/css">article.single .gallery:first-of-type{display:none !important}</style>';
            $gallery = get_post_gallery(get_the_ID(),false);
            $gallery_ids = explode(",",$gallery['ids']);
            echo '<div id="featured"><ul class="slider media">';
            foreach($gallery_ids as $id){
                $image_src = wp_get_attachment_image_src($id,'cover');
                echo '<li><img src="'.$image_src[0].'"></li>';
            }
            echo '</ul><div class="loading"></div></div>';
		}else{
			if(has_post_thumbnail()){
				echo '<div id="featured">';
				the_post_thumbnail();
				echo '</div>';
			}
		}
	?>
	<div id="content">
		<header>
			<h1><?php the_title();?></h1>
			<?php
				if($portfolio_client_name||$portfolio_work_url||$portfolio_purchase_price){
					echo '<ul id="info">';
					if($portfolio_client_name){
						echo '<li><b>'.$client_name_label.'</b>'.$portfolio_client_name.'</li>';
					}
					if($portfolio_work_url){
						echo '<li><b>'.$work_url_label.'</b><a href="'.$portfolio_work_url.'" target="_blank">'.$portfolio_work_url_no_http.'</a></li>';
					}
					if($portfolio_purchase_price||$portfolio_purchase_url){
						if($portfolio_purchase_price){
							echo '<li><b>'.$purchase_work_label.' ('.$portfolio_purchase_price.')</b>';
						}else{
							echo '<li><b>'.$purchase_work_label.'</b>';
						}
						echo '<a href="'.$portfolio_purchase_url.'" target="_blank">'.$portfolio_purchase_url_no_http.'</a></li>';
					}
					echo '</ul>';
				}
			?>
		</header>
		<?php 
			the_content();
			if($portfolio_display_social_sharing_buttons){
			?>
			<div id="meta">
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
			</div>
		<?php }?>
	</div>
</article>