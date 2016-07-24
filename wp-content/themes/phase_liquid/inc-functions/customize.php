<?php
    function phase_customize_register($wp_customize){
        $colors = array();

        $colors[] = array(
            'slug'=>'accent',
            'default'=>'#1ca6eb',
            'label'=>__('Accent','liquid')
            );
        $colors[] = array(
            'slug'=>'background',
            'default'=>'#fff',
            'label'=>__('Background','liquid')
            );
        
        $colors[] = array(
            'slug'=>'secondary_background',
            'default'=>'#f2f2f2',
            'label'=>__('Secondary Background','liquid')
            );

        /*  Sidebar  */
        $colors[] = array(
            'slug'=>'sidebar_background',
            'default'=>'#222',
            'label'=>__('Sidebar Background','liquid')
            );
        $colors[] = array(
            'slug'=>'sidebar_titles',
            'default'=>'#666',
            'label'=>__('Sidebar Titles','liquid')
            );
        $colors[] = array(
            'slug'=>'sidebar_text',
            'default'=>'#bbb',
            'label'=>__('Sidebar Text','liquid')
            );
        $colors[] = array(
            'slug'=>'sidebar_text_link_hover',
            'default'=>'#fff',
            'label'=>__('Sidebar Text Link Hover','liquid')
            );

        /*  Article  */
        $colors[] = array(
            'slug'=>'article_title',
            'default'=>'#222',
            'label'=>__('Article Title','liquid')
            );
        $colors[] = array(
            'slug'=>'article_text',
            'default'=>'#666',
            'label'=>__('Article Text','liquid')
            );
        $colors[] = array(
            'slug'=>'article_dividers',
            'default'=>'#eee',
            'label'=>__('Article Dividers','liquid')
            );

        /*  Portfolio  */
        $colors[] = array(
            'slug'=>'portfolio_overlays',
            'default'=>'#449eb5',
            'label'=>__('Portfolio Overlays','liquid')
            );

        foreach($colors as $color){
            $wp_customize->add_setting(
                $color['slug'],array(
                'default'=>$color['default'],
                'type'=>'option', 
                'capability'=>'edit_theme_options',
                'sanitize_callback'=>'sanitize_hex_color',
                )
          );
          $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                $color['slug'], 
                array('label' => $color['label'], 
                'section'=>'colors',
                'settings'=>$color['slug'])
                )
          );
        }

        class Phase_Customize_Textarea_Control extends WP_Customize_Control{
            public $type = 'textarea';
            public function render_content(){
                echo '<label><span class="customize-control-title">'.esc_html($this->label).'</span><textarea rows="5" style="width:100%;"'.$this->link().'>'.esc_textarea($this->value()).'</textarea></label>';
            }
        }

        $wp_customize->add_setting('enable_retina_support',array('default'=>true,'sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('enable_retina_support',array(
            'label'=>__('Enable Retina Support','liquid'),
            'section'=>'options',
            'type'=>'checkbox'
        ));
        $wp_customize->add_setting('animated_page_transition',array('default'=>true,'sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('animated_page_transition',array(
            'label'=>__('Animated Page Transition','liquid'),
            'section'=>'options',
            'type'=>'checkbox'
        ));
        $wp_customize->add_setting('animated_sidebar_items_slideout',array('default'=>true,'sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('animated_sidebar_items_slideout',array(
            'label'=>__('Animated Sidebar Items Slide Out','liquid'),
            'section'=>'options',
            'type'=>'checkbox'
        ));
        $wp_customize->add_setting('display_to_top_button',array('default'=>true,'sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('display_to_top_button',array(
            'label'=>__('Display To Top Button','liquid'),
            'section'=>'options',
            'type'=>'checkbox'
        ));
        $wp_customize->add_setting('sidebar_copyright_text',array('sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('sidebar_copyright_text',array(
            'label'=>__('Sidebar Copyright Text','liquid'),
            'section'=>'options',
            'type'=>'text'
        ));
        $wp_customize->add_setting('sidebar_logo',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,'sidebar_logo',array(
                'label'=>'Sidebar Logo',
                'section'=>'options',
                'settings'=>'sidebar_logo'
            ))
        );

            $wp_customize->add_section('options',array(
                'title'=>__('Options','liquid')
            ));

        $wp_customize->add_setting('sidebar_rss_url',array('default'=>false,'sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('sidebar_rss_url',array(
            'label'=>__('RSS Feed','liquid'),
            'section'=>'sidebar_icons',
            'type'=>'checkbox'
        ));
        $wp_customize->add_setting('sidebar_email_address',array('sanitize_callback'=>'sanitize_email'));
        $wp_customize->add_control('sidebar_email_address',array(
            'label'=>__('Email Address','liquid'),
            'section'=>'sidebar_icons',
            'type'=>'text'
        ));
        $wp_customize->add_setting('sidebar_behance_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_behance_url',array(
            'label'=>__('Behance URL','liquid'),
            'section'=>'sidebar_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_dribbble_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_dribbble_url',array(
            'label'=>__('Dribbble URL','liquid'),
            'section'=>'sidebar_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_facebook_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_facebook_url',array(
            'label'=>__('Facebook URL','liquid'),
            'section'=>'sidebar_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_flickr_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_flickr_url',array(
            'label'=>__('Flickr URL','liquid'),
            'section'=>'sidebar_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_github_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_github_url',array(
            'label'=>__('Github URL','liquid'),
            'section'=>'sidebar_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_googleplus_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_googleplus_url',array(
            'label'=>__('Google Plus URL','liquid'),
            'section'=>'sidebar_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_instagram_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_instagram_url',array(
            'label'=>__('Instagram URL','liquid'),
            'section'=>'sidebar_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_linkedin_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_linkedin_url',array(
            'label'=>__('Linkedin URL','liquid'),
            'section'=>'sidebar_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_pinterest_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_pinterest_url',array(
            'label'=>__('Pinterest URL','liquid'),
            'section'=>'sidebar_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_skype_url',array('sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('sidebar_skype_url',array(
            'label'=>__('Skype Username','liquid'),
            'section'=>'sidebar_icons',
            'type'=>'text'
        ));
        $wp_customize->add_setting('sidebar_spotify_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_spotify_url',array(
            'label'=>__('Spotify URL','liquid'),
            'section'=>'sidebar_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_tumblr_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_tumblr_url',array(
            'label'=>__('Tumblr URL','liquid'),
            'section'=>'sidebar_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_twitter_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_twitter_url',array(
            'label'=>__('Twitter URL','liquid'),
            'section'=>'sidebar_icons',
            'type'=>'text'
        ));
        $wp_customize->add_setting('sidebar_vimeo_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_vimeo_url',array(
            'label'=>__('Vimeo URL','liquid'),
            'section'=>'sidebar_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_youtube_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_youtube_url',array(
            'label'=>__('Youtube URL','liquid'),
            'section'=>'sidebar_icons',
            'type'=>'url'
        ));

            $wp_customize->add_section('sidebar_icons',array(
                'title'=>__('Sidebar Icons','liquid')
            ));

        $wp_customize->add_setting('sidebar_slideout_rss_url',array('default'=>false,'sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('sidebar_slideout_rss_url',array(
            'label'=>__('RSS Feed','liquid'),
            'section'=>'sidebar_slideout_icons',
            'type'=>'checkbox'
        ));
        $wp_customize->add_setting('sidebar_slideout_email_address',array('sanitize_callback'=>'sanitize_email'));
        $wp_customize->add_control('sidebar_slideout_email_address',array(
            'label'=>__('Email Address','liquid'),
            'section'=>'sidebar_slideout_icons',
            'type'=>'text'
        ));
        $wp_customize->add_setting('sidebar_slideout_behance_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_slideout_behance_url',array(
            'label'=>__('Behance URL','liquid'),
            'section'=>'sidebar_slideout_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_slideout_dribbble_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_slideout_dribbble_url',array(
            'label'=>__('Dribbble URL','liquid'),
            'section'=>'sidebar_slideout_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_slideout_facebook_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_slideout_facebook_url',array(
            'label'=>__('Facebook URL','liquid'),
            'section'=>'sidebar_slideout_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_slideout_flickr_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_slideout_flickr_url',array(
            'label'=>__('Flickr URL','liquid'),
            'section'=>'sidebar_slideout_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_slideout_github_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_slideout_github_url',array(
            'label'=>__('Github URL','liquid'),
            'section'=>'sidebar_slideout_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_slideout_googleplus_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_slideout_googleplus_url',array(
            'label'=>__('Google Plus URL','liquid'),
            'section'=>'sidebar_slideout_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_slideout_instagram_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_slideout_instagram_url',array(
            'label'=>__('Instagram URL','liquid'),
            'section'=>'sidebar_slideout_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_slideout_linkedin_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_slideout_linkedin_url',array(
            'label'=>__('Linkedin URL','liquid'),
            'section'=>'sidebar_slideout_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_slideout_pinterest_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_slideout_pinterest_url',array(
            'label'=>__('Pinterest URL','liquid'),
            'section'=>'sidebar_slideout_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_slideout_skype_url',array('sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('sidebar_slideout_skype_url',array(
            'label'=>__('Skype Username','liquid'),
            'section'=>'sidebar_slideout_icons',
            'type'=>'text'
        ));
        $wp_customize->add_setting('sidebar_slideout_spotify_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_slideout_spotify_url',array(
            'label'=>__('Spotify URL','liquid'),
            'section'=>'sidebar_slideout_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_slideout_tumblr_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_slideout_tumblr_url',array(
            'label'=>__('Tumblr URL','liquid'),
            'section'=>'sidebar_slideout_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_slideout_twitter_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_slideout_twitter_url',array(
            'label'=>__('Twitter URL','liquid'),
            'section'=>'sidebar_slideout_icons',
            'type'=>'text'
        ));
        $wp_customize->add_setting('sidebar_slideout_vimeo_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_slideout_vimeo_url',array(
            'label'=>__('Vimeo URL','liquid'),
            'section'=>'sidebar_slideout_icons',
            'type'=>'url'
        ));
        $wp_customize->add_setting('sidebar_slideout_youtube_url',array('sanitize_callback'=>'esc_url_raw'));
        $wp_customize->add_control('sidebar_slideout_youtube_url',array(
            'label'=>__('Youtube URL','liquid'),
            'section'=>'sidebar_slideout_icons',
            'type'=>'url'
        ));

            $wp_customize->add_section('sidebar_slideout_icons',array(
                'title'=>__('Sidebar Slide Out Icons','liquid')
            ));

        $wp_customize->add_setting('blog_post_format',array('default'=>'blog_post_format_grid','sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('blog_post_format',array(
            'label'=>__('Blog Post Format','liquid'),
            'section'=>'blog_page',
            'type'=>'radio',
            'choices'=>array(
                'blog_post_format_grid'=>'Grid',
                'blog_post_format_masonry'=>'Masonry'
            )
        ));
        $wp_customize->add_setting('blog_navigation',array('default'=>'blog_navigation_infinite','sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('blog_navigation',array(
            'label'=>__('Blog Navigation','liquid'),
            'section'=>'blog_page',
            'type'=>'radio',
            'choices'=>array(
                'blog_navigation_infinite'=>'Infinite Scrolling',
                'blog_navigation_paginate'=>'Paginate'
            )
        ));

            $wp_customize->add_section('blog_page',array(
                'title'=>__('Blog Page','liquid')
            ));

        $wp_customize->add_setting('post_display_progress_bar',array('default'=>true,'sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('post_display_progress_bar',array(
            'label'=>__('Display Progress Bar','liquid'),
            'section'=>'blog_single_page',
            'type'=>'checkbox'
        ));
        $wp_customize->add_setting('post_display_social_sharing_buttons',array('default'=>true,'sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('post_display_social_sharing_buttons',array(
            'label'=>__('Display Social Sharing Buttons','liquid'),
            'section'=>'blog_single_page',
            'type'=>'checkbox'
        ));
        $wp_customize->add_setting('display_article_tags',array('default'=>true,'sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('display_article_tags',array(
            'label'=>__('Display Article Tags','liquid'),
            'section'=>'blog_single_page',
            'type'=>'checkbox'
        ));
        $wp_customize->add_setting('disqus_username',array('sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('disqus_username',array(
            'label'=>__('Disqus Username','liquid'),
            'section'=>'blog_single_page',
            'type'=>'text'
        ));

            $wp_customize->add_section('blog_single_page',array(
                'title'=>__('Blog Single Page','liquid')
            ));

        $wp_customize->add_setting('portfolio_navigation',array('default'=>'portfolio_navigation_infinite','sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('portfolio_navigation',array(
            'label'=>__('Portfolio Navigation','liquid'),
            'section'=>'portfolio_page',
            'type'=>'radio',
            'choices'=>array(
                'portfolio_navigation_infinite'=>'Infinite Scrolling',
                'portfolio_navigation_paginate'=>'Paginate'
            )
        ));
        $wp_customize->add_setting('portfolio_pieces_per_page',
            array('default'=>12,'sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('portfolio_pieces_per_page',array(
            'label'=>__('Portfolio Pieces Per Page','liquid'),
            'section'=>'portfolio_page',
            'type'=>'text'
        ));
            $wp_customize->add_section('portfolio_page',array(
                'title'=>__('Portfolio Page','liquid')
            ));

        $wp_customize->add_setting('portfolio_filter_01',array('sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('portfolio_filter_01',array(
            'label'=>__('Portfolio Filter 1','liquid'),
            'section'=>'portfolio_filter',
            'type'=>'text'
        ));
        $wp_customize->add_setting('portfolio_filter_02',array('sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('portfolio_filter_02',array(
            'label'=>__('Portfolio Filter 2','liquid'),
            'section'=>'portfolio_filter',
            'type'=>'text'
        ));
        $wp_customize->add_setting('portfolio_filter_03',array('sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('portfolio_filter_03',array(
            'label'=>__('Portfolio Filter 3','liquid'),
            'section'=>'portfolio_filter',
            'type'=>'text'
        ));
        $wp_customize->add_setting('portfolio_filter_04',array('sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('portfolio_filter_04',array(
            'label'=>__('Portfolio Filter 4','liquid'),
            'section'=>'portfolio_filter',
            'type'=>'text'
        ));
        $wp_customize->add_setting('portfolio_filter_05',array('sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('portfolio_filter_05',array(
            'label'=>__('Portfolio Filter 5','liquid'),
            'section'=>'portfolio_filter',
            'type'=>'text'
        ));
        $wp_customize->add_setting('portfolio_filter_06',array('sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('portfolio_filter_06',array(
            'label'=>__('Portfolio Filter 6','liquid'),
            'section'=>'portfolio_filter',
            'type'=>'text'
        ));
        $wp_customize->add_setting('portfolio_filter_07',array('sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('portfolio_filter_07',array(
            'label'=>__('Portfolio Filter 7','liquid'),
            'section'=>'portfolio_filter',
            'type'=>'text'
        ));
        $wp_customize->add_setting('portfolio_filter_08',array('sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('portfolio_filter_08',array(
            'label'=>__('Portfolio Filter 8','liquid'),
            'section'=>'portfolio_filter',
            'type'=>'text'
        ));
        $wp_customize->add_setting('portfolio_filter_09',array('sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('portfolio_filter_09',array(
            'label'=>__('Portfolio Filter 9','liquid'),
            'section'=>'portfolio_filter',
            'type'=>'text'
        ));
        $wp_customize->add_setting('portfolio_filter_10',array('sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('portfolio_filter_10',array(
            'label'=>__('Portfolio Filter 10','liquid'),
            'section'=>'portfolio_filter',
            'type'=>'text'
        ));

            $wp_customize->add_section('portfolio_filter',array(
                'title'=>__('Portfolio Filter','liquid')
            ));

        $wp_customize->add_setting('display_sidebar',array('default'=>false,'sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('display_sidebar',array(
            'label'=>__('Display Sidebar','liquid'),
            'section'=>'portfolio_single_page',
            'type'=>'checkbox'
        ));
        $wp_customize->add_setting('portfolio_display_progress_bar',array('default'=>false,'sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('portfolio_display_progress_bar',array(
            'label'=>__('Display Progress Bar','liquid'),
            'section'=>'portfolio_single_page',
            'type'=>'checkbox'
        ));
        $wp_customize->add_setting('portfolio_display_social_sharing_buttons',array('default'=>true,'sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('portfolio_display_social_sharing_buttons',array(
            'label'=>__('Display Social Sharing Buttons','liquid'),
            'section'=>'portfolio_single_page',
            'type'=>'checkbox'
        ));
        $wp_customize->add_setting('client_name_label',array('default'=>'Client Name','sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('client_name_label',array(
            'label'=>__('Client Name Label','liquid'),
            'section'=>'portfolio_single_page',
            'type'=>'text'
        ));
        $wp_customize->add_setting('work_url_label',array('default'=>'Visit Site','sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('work_url_label',array(
            'label'=>__('Work URL Label','liquid'),
            'section'=>'portfolio_single_page',
            'type'=>'text'
        ));
        $wp_customize->add_setting('purchase_work_label',array('default'=>'Purchase Work','sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('purchase_work_label',array(
            'label'=>__('Purchase Work Label','liquid'),
            'section'=>'portfolio_single_page',
            'type'=>'text'
        ));

            $wp_customize->add_section('portfolio_single_page',array(
                'title'=>__('Portfolio Single Page','liquid')
            ));


        $wp_customize->add_setting('contact_email_address',array('sanitize_callback'=>'sanitize_email'));
        $wp_customize->add_control('contact_email_address',array(
            'label'=>__('Contact Email Address','liquid'),
            'section'=>'contact_page',
            'type'=>'text'
        ));

            $wp_customize->add_section('contact_page',array(
                'title'=>__('Contact Page','liquid')
            ));

        $wp_customize->add_setting('google_font_titles',array('sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('google_font_titles',array(
            'label'=>__('Google Font Titles','liquid'),
            'section'=>'font_families',
            'type'=>'text'
        ));
        $wp_customize->add_setting('google_font_text',array('sanitize_callback'=>'sanitize_text_field'));
        $wp_customize->add_control('google_font_text',array(
            'label'=>__('Google Font Text','liquid'),
            'section'=>'font_families',
            'type'=>'text'
        ));

            $wp_customize->add_section('font_families',array(
                'title'=>__('Font Families','liquid')
            ));
    }
    add_action('customize_register','phase_customize_register');

    function phase_customize_setting(){
        function rgb($hex){
            $hex = str_replace('#','',$hex);
            if(strlen($hex) == 3){
                $r = hexdec(substr($hex,0,1).substr($hex,0,1));
                $g = hexdec(substr($hex,1,1).substr($hex,1,1));
                $b = hexdec(substr($hex,2,1).substr($hex,2,1));
            }else{
                $r = hexdec(substr($hex,0,2));
                $g = hexdec(substr($hex,2,2));
                $b = hexdec(substr($hex,4,2));
            }
            $rgb = array($r,$g,$b);
            return implode(",", $rgb);
        }
        $accent = get_option('accent','#1ca6eb');
        $accent_rgb = rgb(get_option('accent','#1ca6eb'));
        $background = get_option('background','#fff');
        $background_rgb = rgb(get_option('background','#fff'));
        $secondary_background = get_option('secondary_background','#f2f2f2');

        $sidebar_background = get_option('sidebar_background','#222');
        $sidebar_background_rgb = rgb($sidebar_background);
        $sidebar_titles = get_option('sidebar_titles','#666');
        $sidebar_text = get_option('sidebar_text','#bbb');
        $sidebar_text_link_hover = get_option('sidebar_text_link_hover','#fff');

        $article_title = get_option('article_title','#222');
        $article_text = get_option('article_text','#666');
        $article_dividers = get_option('article_dividers','#eee');

        $portfolio_overlays = get_option('portfolio_overlays','#449eb5');

        echo '<style type="text/css">

            body,
            #filter ol#filters li,
            #single-sidebar,
            #comments #respond form#commentform p input{
                background:'.$background.'
                }

            article.single #featured .media blockquote{
                color:'.$background.'
                }

            #container.blog_post_format_grid article .content:after{
                content:"";
                background:linear-gradient(to top,rgba('.$background_rgb.',.6) 0%,rgba('.$background_rgb.',0) 100%)
                }

            article.single table thead tr,
            article.single table tbody tr:nth-of-type(even),
            article.single code,
            article.single pre,
            a#grid_slide,
            #pagination{
                background:'.$secondary_background.'
                }

            article.single #featured .loading{
                background-color:'.$secondary_background.'
                }

            a,
            #posts header#page-info h3 a:hover,
            #posts header#page-info p a:hover,
            article.index.blog h2 a:hover,
            article.single header span a:hover,
            article.single.portfolio ul#info li a:hover,
            #comments #respond form#commentform p.logged-in-as a:hover,
            #pagination #paginate a:hover{
                color:'.$accent.'
                }

            .widget form.search-form input:focus{
                box-shadow:inset 0 0 0 2px rgba('.$accent_rgb.',.3)
                }

            a#scroll-top:hover,
            #filter a#filter_slide,
            #progress-bar span,
            article.single #content #meta li a:hover,
            #comments #respond form#commentform p.form-submit input:hover,
            article.single.contact form p.contact-form-submit input:hover,
            a#grid_slide:hover,
            #pagination a#load:hover,
            #pagination a#load.loading{
                background:'.$accent.'
                }

            ul.slick-slider ul.slick-dots li.slick-active button{
                background:rgba('.$accent_rgb.',.9)
                }

            #pagination:hover a#load,
            #pagination a#load.loading{
                box-shadow:0 0 0 1px '.$accent.'
                }

            #comments ol.comment-list li.comment.bypostauthor,
            #comments #respond form#commentform p input:focus,
            #comments #respond form#commentform p textarea:focus{
                background:rgba('.$accent_rgb.',.06)
                }

            #sidebar h2.sidebar-title{
                color:'.$sidebar_titles.'
                }

            #sidebar,
            #sidebar a#sidebar_slide_close,
            #overlay,
            #single-sidebar a#single-sidebar_slide{
                background:'.$sidebar_background.'
                }
            
            #sidebar,#sidebar a,#sidebar h1 a,
            #single-sidebar a#single-sidebar_slide{
                color:'.$sidebar_text.'
                }
            
            #sidebar a:hover,#sidebar h1 a:hover,
            #single-sidebar a#single-sidebar_slide:hover{
                color:'.$sidebar_text_link_hover.'
                }

            #sidebar #menu #tag-line:before{
                background:linear-gradient(to left,rgba('.$sidebar_background_rgb.',1) 0%,rgba('.$sidebar_background_rgb.',0) 100%)
                }

            #sidebar #menu #tag-line:after{
                background:linear-gradient(to right,rgba('.$sidebar_background_rgb.',1) 0%,rgba('.$sidebar_background_rgb.',0) 100%)
                }

            #posts #page-info h3,
            #posts header#page-info h3 a,
            article h1,
            article h1 a,
            article h2,
            article h2 a,
            article h3,
            article h3 a,
            article h4,
            article h4 a,
            article h5,
            article h5 a,
            article h6,
            article h6 a,
            article.single blockquote,
            article.single .pull-left,
            article.single .pull-right,
            article.single table thead,
            article.index.blog .featured .format,
            #single-sidebar .widget h2,
            #comments ol.comment-list li.comment .comment-context .comment-info span.author-name,
            #comments ol.comment-list li.comment .comment-context .comment-info span.author-name a,
            a#grid_slide,
            #pagination a#load,
            #pagination #paginate a,
            #pagination #paginate span{
                color:'.$article_title.'
                }

            a#scroll-top,
            article.index.blog.no-featured-image .featured .format,
            article.single #featured .media blockquote,
            #comments #respond form#commentform p.form-submit input,
            article.single.contact form p.contact-form-submit input{
                background:'.$article_title.'
                }

            #filter ol#filters li.active a{
                background:'.$article_title.' !important
                }

            body,
            #filter ol#filters li a,
            #single-sidebar,
            #single-sidebar a,
            #posts header#page-info p a,
            article.index.blog .content span,
            article.index.blog .content span a,
            article.single header span a,
            article.single.portfolio ul#info li a,
            #comments ol.comment-list li.comment .comment-context a.comment-reply-link,
            #comments #respond form#commentform p.logged-in-as a{
                color:'.$article_text.'
                }

            #single-sidebar{
                border-left:1px solid '.$article_dividers.'
                }

            article.single blockquote,
            article.single .pull-left,
            article.single .pull-right{
                border-top:2px solid '.$article_dividers.';
                border-bottom:2px solid '.$article_dividers.'
                }

            #single-sidebar .widget{
                border-bottom:1px solid '.$article_dividers.'
                }

            article.single hr{
                background:'.$article_dividers.'
                }

            article.single #content #meta li a{
                color:'.$article_text.';
                box-shadow:inset 0 0 0 2px '.$article_dividers.'
                }

            #comments,
            #comments ol.comment-list li.comment,
            #comments.has-comments #respond,
            #article-pagination,
            #portfolio-more,
            #pagination{
                border-top:1px solid '.$article_dividers.'
                }

            article.index.blog .box{
                box-shadow:inset 0 0 0 1px '.$article_dividers.'
                }

            article.index.blog .box a.overlay{
                box-shadow:inset 0 0 0 4px '.$accent.'
                }

            #comments #respond form#commentform p input,
            #comments #respond form#commentform p textarea,
            article.single.contact form p input,
            article.single.contact form p textarea{
                box-shadow:-1px 1px '.$article_dividers.',
                            inset -1px 1px '.$article_dividers.'
                }

            article.index.portfolio .overlay{
                background:'.$portfolio_overlays.'
                }

            @media screen and (max-width:700px){

                #filter:after{
                    content:"";
                    background:linear-gradient(to right,rgba('.$background_rgb.',0) 0%,rgba('.$background_rgb.',1)100%);
                    }

                #filter ol#filters li.active a{
                    background:'.$accent.' !important
                    }

                #single-sidebar a#single-sidebar_slide,
                #single-sidebar a#single-sidebar_slide:hover{
                    color:'.$article_title.';
                    background:'.$background.';
                    border-top:1px solid '.$article_dividers.';
                    border-bottom:1px solid '.$article_dividers.';
                    border-left:1px solid '.$article_dividers.'
                    }
                
                }

        </style>';

        $google_font_titles = get_theme_mod('google_font_titles');
        $google_font_text = get_theme_mod('google_font_text');
        if($google_font_titles||$google_font_text){
            echo '<link href="http://fonts.googleapis.com/css?family=';if($google_font_titles){echo $google_font_titles.':400,700';}if($google_font_titles&&$google_font_text){echo '|';}if($google_font_text){echo $google_font_text.':400,700,400italic,700italic';}echo '" rel="stylesheet" type="text/css">';
            if($google_font_titles){
                $google_font_titles = '"'.$google_font_titles.'", ';
            }
            if($google_font_text){
                $google_font_text = '"'.$google_font_text.'", ';
            }
        }
        echo '<style type="text/css">
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            .widget #phase-recent-posts-widget ul li a h3,
            a#scroll-top,
            #sidebar #slide #credit .copyright,
            #filter,
            #posts header#page-info h3,
            article.index.blog .featured .format span,
            article.index.blog .content span,
            article.single #featured .media blockquote .text,
            article.single header span,
            article.single #content #meta b,
            #comments ol.comment-list li.comment .comment-context .comment-info,
            #comments #respond form#commentform p.form-submit input,
            #article-pagination li .center span,
            article.index.portfolio .text h2,
            article.single.portfolio ul#info li b,
            article.single.contact form p.contact-form-submit input,
            a#grid_slide,
            #pagination a#load,
            #pagination #paginate{
                font-family:'.$google_font_titles.'Helvetica Neue, Helvetica, Arial, sans-serif !important
            }

            body,
            #sidebar,
            .widget .tagcloud a,
            .widget #phase-recent-posts-widget ul li a span,
            #sidebar .widget #calendar_wrap table#wp-calendar caption,
            #sidebar #slide #credit,
            #sidebar #slide #credit span,
            article.index.blog .featured .format span,
            article.single #featured .media blockquote,
            article.single #featured .media blockquote .text span.author,
            article.single #content #meta b,
            article.single #content #meta li a,
            article.single .intro,
            article.single blockquote,
            article.single .pull-left,
            article.single .pull-right,
            article.single p.wp-caption-text,
            article.single .gallery-item .gallery-caption,
            #single-sidebar h2.sidebar-title,
            #single-sidebar .widget #calendar_wrap table#wp-calendar caption,
            #comments ol.comment-list li.comment .comment-context .comment-info,
            #comments #respond form#commentform p label,
            #comments #respond form#commentform p input,
            #comments #respond form#commentform p textarea,
            #comments #respond form#commentform p.comment-form-comment textarea,
            #comments #respond form#commentform p.form-submit input,
            #article-pagination li .center span,
            article.index.portfolio .text span,
            article.single.portfolio ul#info li b,
            #portfolio-more a#grid_slide,
            article.single.contact #respond > div,
            article.single.contact form#contactform p label,
            article.single.contact form#contactform p input,
            article.single.contact form#contactform p textarea,
            article.single.contact form p.contact-form-message textarea,
            article.single.contact form p.contact-form-submit input,
            #pagination a#load,
            #pagination #paginate{
                font-family:'.$google_font_text.'Helvetica Neue, Helvetica, Arial, sans-serif !important
            }
            </style>';
    }
    add_action('wp_enqueue_scripts','phase_customize_setting');
    $enable_retina_support = esc_attr(get_theme_mod('enable_retina_support',true));
    if($enable_retina_support){
        function phase_retina_js(){
            wp_enqueue_script('retina_js',get_template_directory_uri().'/inc-js/retina.js',array('jquery'),'',true);
        }
        add_action('wp_enqueue_scripts','phase_retina_js');
    }
?>