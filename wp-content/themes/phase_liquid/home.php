<?php 
	get_header();
	$blog_post_format = esc_attr(get_theme_mod('blog_post_format','blog_post_format_grid'));
	$blog_navigation = esc_attr(get_theme_mod('blog_navigation','blog_navigation_infinite'));
?>

<div id="container" class="grid grid-padded blog <?php echo $blog_post_format;?>">

	<div id="posts">
	<?php 
		if(have_posts()){
			while(have_posts()):the_post();
				get_template_part('inc/article');
			endwhile;
		}
	?>
	</div>

	<?php
		$next_post_link = get_next_posts_link('');
		$previous_post_link = get_previous_posts_link('');
		if($next_post_link||$previous_post_link){
			echo '<div id="pagination">';
			if($blog_navigation == 'blog_navigation_infinite'){
				?>
				<a id="load">
					<span id="more"><?php _e('Load more','liquid');?></span>
					<span id="loading">
						<div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div>
					</span>
					<span id="done"><?php _e('No more posts to load','liquid');?></span>
				</a>
				<div id="infinite-next">
					<?php echo $next_post_link;?>
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
				global $wp_query;
				$big = 999999999;
				$arg = array(
					'base' => str_replace($big,'%#%',get_pagenum_link($big)),
					'current' => max(1,get_query_var('paged')),
					'total' => $wp_query->max_num_pages,
					'prev_text' => '<i class="icon-left-open-big"></i>',
					'next_text' => '<i class="icon-right-open-big"></i>'
				);
				echo paginate_links($arg).'</div>';
			}
			echo '</div>';
		}
	?>

</div>

<?php get_footer();?>