<?php

/*  Frameworks  */

	$tempdir = get_template_directory();
	require_once($tempdir.'/inc-functions/list.php');
	require_once($tempdir.'/inc-functions/activation.php');
	require_once($tempdir.'/inc-functions/metaboxes.php');
	require_once($tempdir.'/inc-functions/customize.php');
	require_once($tempdir.'/inc-functions/retina.php');

	load_theme_textdomain('liquid',$tempdir.'/languages');

/*  End Frameworks  */

/*  Add Theme Features */

	function phase_theme_setup(){
		add_theme_support('menus');
		add_theme_support('post-thumbnails');
		add_theme_support('post-formats',array('gallery','quote','audio','video'));
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_editor_style(array('inc-css/editor-style.css'));
		add_image_size('blog-index',600,1200,false);
		add_image_size('portfolio-index',400,800,false);
		add_image_size('cover',2000,1600,false);
	}
	add_action('after_setup_theme','phase_theme_setup');

/*  End Add Theme Features */

/*  Theme Adjustments  */

	if(!isset($content_width)){
		$content_width = 600;
	}

	function phase_excerpt_length($length){
		if(is_single()){
			return 14;
		}else{
			return 28;
		}
	}
	add_filter('excerpt_length','phase_excerpt_length',999);

	function phase_excerpt_more($more){
		return '...';
	}
	add_filter('excerpt_more','phase_excerpt_more');

	function phase_get_the_excerpt($post_id) {
		global $post;  
		$save_post = $post;
		$post = get_post($post_id);
		$output = get_the_excerpt();
		$post = $save_post;
		return $output;
	}

	function phase_comments($comment,$args,$depth){
		$GLOBALS['comment'] = $comment;
		switch($comment->comment_type){
			case 'pingback':
			case 'trackback':
			?>
			<li <?php comment_class();?> id="comment<?php comment_ID();?>">
				<?php break;default:?>
				<li id="comment-<?php comment_ID();?>" <?php comment_class();?>>
					<?php echo get_avatar($comment,100);?>
					<div class="comment-context">
						<div class="comment-info">
							<span class="author-name"><?php comment_author_link();?></span>
							<time <?php comment_time('c');?> class="comment-time"> on <?php comment_date();?> at <?php comment_time();?></time>
						</div>
						<?php 
							comment_text();
							comment_reply_link(array_merge($args,array( 
								'reply_text' => 'Reply',
								'depth' => $depth,
								'max_depth' => $args['max_depth'] 
							)));
						?>
					</div>
			<?php 
			break;
		}
	}

	function get_excerpt_by_id($post_id){
		$the_post = get_post($post_id);
		$the_excerpt = $the_post->post_content;
		$excerpt_length = 35;
		$the_excerpt = strip_tags(strip_shortcodes($the_excerpt));
		$words = explode(' ',$the_excerpt,$excerpt_length + 1);
		if(count($words) > $excerpt_length){
			array_pop($words);
			array_push($words,'...');
			$the_excerpt = implode(' ',$words);
		}
		return $the_excerpt;
	}

	function phase_social_meta(){
		global $post;
		if(!is_single()){
			$meta_description = substr(esc_attr(get_bloginfo('description')),0,155);
			echo '<meta name="description" content="'.$meta_description.'">';
		}else{
			$meta_description = substr(esc_attr(get_excerpt_by_id($post->ID)),0,155);
			if(has_post_thumbnail()){
				$meta_image = esc_url_raw(phase_featured_image_url('full'));
			}else{
				$meta_image = '';
			}
			echo '
			<meta name="description" content="'.$meta_description.'">
			<meta name="twitter:card" value="summary">
			<meta name="twitter:title" content="'.get_the_title().'">
			<meta name="twitter:description" content="'.$meta_description.'">
			<meta name="twitter:image" content="'.$meta_image.'">
        	<meta property="og:title" content="'.get_the_title().'"/>
        	<meta property="og:type" content="article"/>
        	<meta property="og:url" content="'.get_permalink().'"/>
        	<meta property="og:site_name" content="'.get_bloginfo('name').'"/>
        	<meta property="og:description" content="'.$meta_description.'"/>
        	<meta property="og:image" content="'.$meta_image.'"/>
        	';
        }
	}
	add_action('wp_head','phase_social_meta',5);

	function phase_search_filter($query){
		if($query->is_search){
			$query->set('post_type','post');
		}
		return $query;
	}
	add_filter('pre_get_posts','phase_search_filter');

/*  End Theme Adjustments  */

/*  Post Functions  */

	function phase_featured_image_url($phase_featured_img_size){
		$phase_image_id = get_post_thumbnail_id();
		$phase_image_url = wp_get_attachment_image_src($phase_image_id,$phase_featured_img_size);
		$phase_image_url = $phase_image_url[0];
		return $phase_image_url;
	}

	function filter_ptags_on_images($content){
		return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3',$content);
	}
	add_filter('the_content', 'filter_ptags_on_images');


/*  End Post Functions  */

/*  Register Built-in Features  */

	function register_theme_menus(){
		register_nav_menus(
			array(
				'sidebar'=>__('Sidebar Menu','liquid')
				)
			);
		}

	add_action('init','register_theme_menus');

	function register_widgets(){
		register_sidebar(
			array(
				'name' => __('Sidebar','liquid'),	 
				'id' => 'sidebar',
				'description' => __('Widgets that displays on in your slide out sidebar','liquid'),
				'before_widget' => '<div class="widget">',
				'after_widget' => '</div>',
				'before_title' => '<h2 class="sidebar-title">',
				'after_title' => '</h2>'
			)
		);
		register_sidebar(
			array(
				'name' => __('Post Page Sidebar','liquid'),	 
				'id' => 'single_sidebar',
				'description' => __('Widgets that displays on single post pages','liquid'),
				'before_widget' => '<div class="widget">',
				'after_widget' => '</div>',
				'before_title' => '<h2 class="sidebar-title">',
				'after_title' => '</h2>'
			)
		);
	}

	add_action('widgets_init','register_widgets');

/*  End Register Built-in Features  */

/*  Register External Scripts  */

	function phase_theme_styles(){
		wp_enqueue_style('normalize_css',get_template_directory_uri().'/inc-css/normalize.css');
		wp_enqueue_style('icon_css',get_template_directory_uri().'/inc-css/phase-embedded.css');
		wp_enqueue_style('main_css',get_template_directory_uri().'/style.css');
		}

	add_action('wp_enqueue_scripts','phase_theme_styles');

	function phase_theme_js(){
	    wp_enqueue_script('library',get_template_directory_uri().'/inc-js/library.js',array('jquery'),true);
    	wp_enqueue_script('main_js',get_template_directory_uri().'/inc-js/scripts.js',array('jquery'),'',true);
		}

	add_action('wp_enqueue_scripts','phase_theme_js');

/*  End Register External Scripts  */

?>