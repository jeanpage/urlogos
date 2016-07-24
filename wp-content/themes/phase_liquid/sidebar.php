<?php
	$slideout_sidebar_logo = esc_url(get_theme_mod('sidebar_slideout_logo'));
	$slideout_email_address = is_email(get_theme_mod('sidebar_slideout_email_address'));
	$slideout_behance_url = esc_url(get_theme_mod('sidebar_slideout_behance_url'));
	$slideout_dribbble_url = esc_url(get_theme_mod('sidebar_slideout_dribbble_url'));
	$slideout_facebook_url = esc_url(get_theme_mod('sidebar_slideout_facebook_url'));
	$slideout_flickr_url = esc_url(get_theme_mod('sidebar_slideout_flickr_url'));
	$slideout_github_url = esc_url(get_theme_mod('sidebar_slideout_github_url'));
	$slideout_googleplus_url = esc_url(get_theme_mod('sidebar_slideout_googleplus_url'));
	$slideout_instagram_url = esc_url(get_theme_mod('sidebar_slideout_instagram_url'));
	$slideout_linkedin_url = esc_url(get_theme_mod('sidebar_slideout_linkedin_url'));
	$slideout_pinterest_url = esc_url(get_theme_mod('sidebar_slideout_pinterest_url'));
	$slideout_skype_url = sanitize_text_field(get_theme_mod('sidebar_slideout_skype_url'));
	$slideout_spotify_url = esc_url(get_theme_mod('sidebar_slideout_spotify_url'));
	$slideout_tumblr_url = esc_url(get_theme_mod('sidebar_slideout_tumblr_url'));
	$slideout_twitter_url = esc_url(get_theme_mod('sidebar_slideout_twitter_url'));
	$slideout_vimeo_url = esc_url(get_theme_mod('sidebar_slideout_vimeo_url'));
	$slideout_youtube_url = esc_url(get_theme_mod('sidebar_slideout_youtube_url'));
	$slideout_rss_url = get_theme_mod('sidebar_slideout_rss_url');

	$sidebar_logo = esc_url(get_theme_mod('sidebar_logo'));
	$email_address = is_email(get_theme_mod('sidebar_email_address'));
	$behance_url = esc_url(get_theme_mod('sidebar_behance_url'));
	$dribbble_url = esc_url(get_theme_mod('sidebar_dribbble_url'));
	$facebook_url = esc_url(get_theme_mod('sidebar_facebook_url'));
	$flickr_url = esc_url(get_theme_mod('sidebar_flickr_url'));
	$github_url = esc_url(get_theme_mod('sidebar_github_url'));
	$googleplus_url = esc_url(get_theme_mod('sidebar_googleplus_url'));
	$instagram_url = esc_url(get_theme_mod('sidebar_instagram_url'));
	$linkedin_url = esc_url(get_theme_mod('sidebar_linkedin_url'));
	$pinterest_url = esc_url(get_theme_mod('sidebar_pinterest_url'));
	$skype_url = sanitize_text_field(get_theme_mod('sidebar_skype_url'));
	$spotify_url = esc_url(get_theme_mod('sidebar_spotify_url'));
	$tumblr_url = esc_url(get_theme_mod('sidebar_tumblr_url'));
	$twitter_url = esc_url(get_theme_mod('sidebar_twitter_url'));
	$vimeo_url = esc_url(get_theme_mod('sidebar_vimeo_url'));
	$youtube_url = esc_url(get_theme_mod('sidebar_youtube_url'));
	$rss_url = get_theme_mod('sidebar_rss_url');
	$sidebar_copyright_text = esc_html(get_theme_mod('sidebar_copyright_text'));
?>

<aside id="sidebar">

	<a id="sidebar_slide_close" href="#">Close</a>

	<div id="slide">
		<?php 
	        if($sidebar_logo){
				echo '<a id="logo" href="'.esc_url(home_url()).'"><img src="'.$sidebar_logo.'" alt="'.get_bloginfo('name').'"></a>';
			}
			if(has_nav_menu('sidebar')){
				echo '<nav id="navigation"><h2 class="sidebar-title">Navigation</h2>';
				$defaults = array(
					'theme_location'=>'sidebar',
					'container'=>false,
					'menu_class'=>false,
					'depth'=>2
				);
				wp_nav_menu($defaults);
				echo '</nav>';
			}
	        if(!$slideout_email_address==''||!$slideout_behance_url==''||!$slideout_dribbble_url==''||!$slideout_facebook_url==''||!$slideout_flickr_url==''||!$slideout_github_url==''||!$slideout_googleplus_url==''||!$slideout_instagram_url==''||!$slideout_linkedin_url==''||!$slideout_pinterest_url==''||!$slideout_skype_url==''||!$slideout_spotify_url==''||!$slideout_tumblr_url==''||!$slideout_twitter_url==''||!$slideout_vimeo_url==''||!$slideout_youtube_url==''||!$slideout_rss_url==''){
	        	echo '<div id="slideout_social"><h2 class="sidebar-title">Social</h2>';
	        		if(!$slideout_email_address==''){echo '<a href="mailto:'.$slideout_email_address.'" target="_blank"><i class="icon-mail"></i></a>';}if(!$slideout_behance_url==''){echo '<a href="'.$slideout_behance_url.'" target="_blank"><i class="icon-behance"></i></a>';}if(!$slideout_dribbble_url==''){echo '<a href="'.$slideout_dribbble_url.'" target="_blank"><i class="icon-dribbble"></i></a>';}if(!$slideout_facebook_url==''){echo '<a href="'.$slideout_facebook_url.'" target="_blank"><i class="icon-facebook"></i></a>';}if(!$slideout_flickr_url==''){echo '<a href="'.$slideout_flickr_url.'" target="_blank"><i class="icon-flickr"></i></a>';}if(!$slideout_github_url==''){echo '<a href="'.$slideout_github_url.'" target="_blank"><i class="icon-github"></i></a>';}if(!$slideout_googleplus_url==''){echo '<a href="'.$slideout_googleplus_url.'" target="_blank"><i class="icon-gplus"></i></a>';}if(!$slideout_instagram_url==''){echo '<a href="'.$slideout_instagram_url.'" target="_blank"><i class="icon-instagram"></i></a>';}if(!$slideout_linkedin_url==''){echo '<a href="'.$slideout_linkedin_url.'" target="_blank"><i class="icon-linkedin"></i></a>';}if(!$slideout_pinterest_url==''){echo '<a href="'.$slideout_pinterest_url.'" target="_blank"><i class="icon-pinterest"></i></a>';}if(!$slideout_skype_url==''){echo '<a href="skype:'.$slideout_skype_url.'?chat" target="_blank"><i class="icon-skype"></i></a>';}if(!$slideout_spotify_url==''){echo '<a href="'.$slideout_spotify_url.'" target="_blank"><i class="icon-spotify"></i></a>';}if(!$slideout_tumblr_url==''){echo '<a href="'.$slideout_tumblr_url.'" target="_blank"><i class="icon-tumblr"></i></a>';}if(!$slideout_twitter_url==''){echo '<a href="'.$slideout_twitter_url.'" target="_blank"><i class="icon-twitter"></i></a>';}if(!$slideout_vimeo_url==''){echo '<a href="'.$slideout_vimeo_url.'" target="_blank"><i class="icon-vimeo"></i></a>';}if(!$slideout_youtube_url==''){echo '<a href="'.$slideout_youtube_url.'" target="_blank"><i class="icon-youtube"></i></a>';}if($slideout_rss_url){echo '<a href="'.get_bloginfo('rss2_url').'"><i class="icon-rss"></i></a>';}
	    	    echo '</div>';
	    	}
			if(is_active_sidebar('sidebar')){
				dynamic_sidebar('sidebar');
			}
		?>
		<div id="credit">
			<div class="copyright">
			<?php 
				if($sidebar_copyright_text==''){
					echo '&copy; '.date('Y ');
					bloginfo('name');
				}else{
					echo $sidebar_copyright_text;
				}
			?>
			</div>
			<span>Proudly powered by <a href="http://wordpress.org/" target="_blank">WordPress</a>, Theme <a href="http://phasethemes.com/themes/liquid" title="Liquid Wordpress Theme" target="_blank">Liquid</a> by <a class="company" href="http://phasethemes.com" title="Phase Wordpress Themes" target="_blank">Phase Themes</a></span>
		</div>
	</div>

	<div id="menu">
	<?php
		echo '<h1><a id="blog-title">'.get_bloginfo('name').'</a></h1><div id="tag-line"><span>'.get_bloginfo('description').'</span></div>';
        if(!$email_address==''||!$behance_url==''||!$dribbble_url==''||!$facebook_url==''||!$flickr_url==''||!$github_url==''||!$googleplus_url==''||!$instagram_url==''||!$linkedin_url==''||!$pinterest_url==''||!$skype_url==''||!$spotify_url==''||!$tumblr_url==''||!$twitter_url==''||!$vimeo_url==''||!$youtube_url==''||!$rss_url==''||!$search_icon==''){
        	echo '<ul id="social">';
        		if(!$email_address==''){echo '<li><a href="mailto:'.$email_address.'" target="_blank"><i class="icon-mail"></i></a></li>';}if(!$behance_url==''){echo '<li><a href="'.$behance_url.'" target="_blank"><i class="icon-behance"></i></a></li>';}if(!$dribbble_url==''){echo '<li><a href="'.$dribbble_url.'" target="_blank"><i class="icon-dribbble"></i></a></li>';}if(!$facebook_url==''){echo '<li><a href="'.$facebook_url.'" target="_blank"><i class="icon-facebook"></i></a></li>';}if(!$flickr_url==''){echo '<li><a href="'.$flickr_url.'" target="_blank"><i class="icon-flickr"></i></a></li>';}if(!$github_url==''){echo '<li><a href="'.$github_url.'" target="_blank"><i class="icon-github"></i></a></li>';}if(!$googleplus_url==''){echo '<li><a href="'.$googleplus_url.'" target="_blank"><i class="icon-gplus"></i></a></li>';}if(!$instagram_url==''){echo '<li><a href="'.$instagram_url.'" target="_blank"><i class="icon-instagram"></i></a></li>';}if(!$linkedin_url==''){echo '<li><a href="'.$linkedin_url.'" target="_blank"><i class="icon-linkedin"></i></a></li>';}if(!$pinterest_url==''){echo '<li><a href="'.$pinterest_url.'" target="_blank"><i class="icon-pinterest"></i></a></li>';}if(!$skype_url==''){echo '<li><a href="skype:'.$skype_url.'?chat" target="_blank"><i class="icon-skype"></i></a></li>';}if(!$spotify_url==''){echo '<li><a href="'.$spotify_url.'" target="_blank"><i class="icon-spotify"></i></a></li>';}if(!$tumblr_url==''){echo '<li><a href="'.$tumblr_url.'" target="_blank"><i class="icon-tumblr"></i></a></li>';}if(!$twitter_url==''){echo '<li><a href="'.$twitter_url.'" target="_blank"><i class="icon-twitter"></i></a></li>';}if(!$vimeo_url==''){echo '<li><a href="'.$vimeo_url.'" target="_blank"><i class="icon-vimeo"></i></a></li>';}if(!$youtube_url==''){echo '<li><a href="'.$youtube_url.'" target="_blank"><i class="icon-youtube"></i></a></li>';}if($rss_url){echo '<li><a href="'.get_bloginfo('rss2_url').'"><i class="icon-rss"></i></a></li>';}
    	    echo '</ul>';
    	}
	?>
	</div>
</aside>