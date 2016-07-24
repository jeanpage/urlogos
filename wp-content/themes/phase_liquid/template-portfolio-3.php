<?php 
	/*  Template Name: Portfolio: Padded Grid  */
	get_header();
	$portfolio_navigation = esc_attr(get_theme_mod('portfolio_navigation','portfolio_navigation_infinite'));
	$portfolio_pieces_per_page = esc_attr(get_theme_mod('portfolio_pieces_per_page',12));
	get_template_part('inc/filter');
?>

<div id="container" class="grid grid-padded portfolio masonry">

	<div id="posts">
	<?php 
		if(have_posts()){
			while(have_posts()):the_post();
				$content = get_the_content();
				if(!empty($content)){
					echo '<header id="page-info"><h3>'.get_the_title().'</h3>';
						the_content();
					echo '</header>';
				}
			endwhile;
			wp_reset_query();
		}
		if(get_query_var('paged')){
    		$paged = get_query_var('paged');
		}else if(get_query_var('page')){
    		$paged = get_query_var('page');
		}else{
    		$paged = 1;
		}
		$args = array('post_type'=>'portfolio','paged'=>$paged,'posts_per_page'=>$portfolio_pieces_per_page);
		$query = new WP_Query($args);
		if($query->have_posts()){
			while($query->have_posts()):$query->the_post();
				get_template_part('inc/article-portfolio-3');
			endwhile;
		}
	?>
	</div>

	<?php
		$next_post_link = get_next_posts_link('',$query->max_num_pages);
		$previous_post_link = get_previous_posts_link('',$query->max_num_pages);
		if($next_post_link||$previous_post_link){
			echo '<div id="pagination">';
			if($portfolio_navigation == 'portfolio_navigation_infinite' || is_front_page()){
				?>
				<a id="load">
					<span id="more"><?php _e('Load more','liquid');?></span>
					<span id="loading">
						<div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div>
					</span>
					<span id="done"><?php _e('No more posts to load','liquid');?></span>
				</a>
				<div id="infinite-next">
					<?php
						if(is_front_page()){
							echo '<a href="'.get_site_url().'?page2&paged=2"></a>';
						}else{
							echo $next_post_link;
						}
					?>
				</div>
			<?php
			}else{
				echo '<div id="paginate">';
				if(!$previous_post_link){
					echo '<a class="prev"><i class="icon-left-open-big"></i></a>';
				}
				if(!$next_post_link){
					echo '<a class="next"><i class="icon-right-open-big"></i></a>';
				}
				$big = 999999999;
				$arg = array(
					'base' => str_replace($big,'%#%',get_pagenum_link($big)),
					'current' => max(1,get_query_var('paged')),
					'total' => $query->max_num_pages,
					'prev_text' => '<i class="icon-left-open-big"></i>',
					'next_text' => '<i class="icon-right-open-big"></i>'
				);
				echo paginate_links($arg).'</div>';
			}
			echo '</div>';
		}
		wp_reset_postdata();
	?>

</div>

<?php get_footer();?>