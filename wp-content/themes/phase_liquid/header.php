<!doctype html>
<html <?php language_attributes();?>>
<head>
<meta charset="<?php bloginfo('charset');?>"/>
<meta name="viewport" content="width=device-width,initial-scale=1"/>

<?php 
	if(!function_exists('_wp_render_title_tag')){
		function theme_slug_render_title(){
			?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
		}
		add_action('wp_head','theme_slug_render_title');
	}

	wp_head();

	$header_logo = esc_url(get_theme_mod('header_logo'));
	$animated_page_transition = esc_attr(get_theme_mod('animated_page_transition',true));
	if($animated_page_transition){
		$animated_page_transition = 'animated_page_transition';
	}else{
		$animated_page_transition = '';
	}
	$animated_sidebar_items_slideout = esc_attr(get_theme_mod('animated_sidebar_items_slideout',true));
	if($animated_sidebar_items_slideout){
		$animated_sidebar_items_slideout = 'animated_sidebar_items_slideout';
	}else{
		$animated_sidebar_items_slideout = '';
	}
	$display_to_top_button = esc_attr(get_theme_mod('display_to_top_button',true));
	$email_address = is_email(get_theme_mod('header_email_address'));
	$behance_url = esc_url(get_theme_mod('header_behance_url'));
	$dribbble_url = esc_url(get_theme_mod('header_dribbble_url'));
	$facebook_url = esc_url(get_theme_mod('header_facebook_url'));
	$flickr_url = esc_url(get_theme_mod('header_flickr_url'));
	$github_url = esc_url(get_theme_mod('header_github_url'));
	$googleplus_url = esc_url(get_theme_mod('header_googleplus_url'));
	$instagram_url = esc_url(get_theme_mod('header_instagram_url'));
	$linkedin_url = esc_url(get_theme_mod('header_linkedin_url'));
	$pinterest_url = esc_url(get_theme_mod('header_pinterest_url'));
	$skype_url = sanitize_text_field(get_theme_mod('header_skype_url'));
	$spotify_url = esc_url(get_theme_mod('header_spotify_url'));
	$tumblr_url = esc_url(get_theme_mod('header_tumblr_url'));
	$twitter_url = esc_url(get_theme_mod('header_twitter_url'));
	$vimeo_url = esc_url(get_theme_mod('header_vimeo_url'));
	$youtube_url = esc_url(get_theme_mod('header_youtube_url'));
	$rss_url = esc_url(get_theme_mod('header_rss_url'));
	
	$body_class = array($animated_page_transition,$animated_sidebar_items_slideout)
?>

<link rel="pingback" href="<?php bloginfo('pingback_url');?>" />

</head>

<body <?php body_class($body_class);?>>
<?php 
	if($display_to_top_button == true){
		echo '<a id="scroll-top"><i class="icon-to-top"></i><span>Back to Top</span></a>';
	}
	get_sidebar();
?>
<div id="overlay"></div>