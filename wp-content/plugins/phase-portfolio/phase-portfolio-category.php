<?php
    class phase_portfolio_category{
        public function phase_portfolio_category_register(){
            $taxonomy_labels = array(
                'name'=>esc_html('Portfolio Categories'),
                'singular_name'=>esc_html('Portfolio Category'),
                'search_items'=>esc_html('Search Portfolio Categories'),
                'popular_items'=>esc_html('Popular Portfolio Categories'),
                'all_items'=>esc_html('All Portfolio Categories'),
                'parent_item'=>esc_html('Parent Portfolio Category'),
                'parent_item_colon'=>esc_html('Parent Portfolio Category:'),
                'edit_item'=>esc_html('Edit Portfolio Category'),
                'update_item'=>esc_html('Update Portfolio Category'),
                'add_new_item'=>esc_html('Add New Portfolio Category'),
                'new_item_name'=>esc_html('New Portfolio Category Name'),
                'separate_items_with_commas'=>esc_html('Separate portfolio categories with commas'),
                'add_or_remove_items'=>esc_html('Add or remove portfolio categories'),
                'choose_from_most_used'=>esc_html('Choose from the most used portfolio categories'),
                'menu_name'=>esc_html('Categories')
            );
            $args = array( 
                'labels'=>$taxonomy_labels,
                'public'=>true,
                'show_in_nav_menus'=>true,
                'show_ui'=>true,
                'show_admin_column'=>true,
                'show_tagcloud'=>false,
                'hierarchical'=>true,
                'rewrite'=>array('slug'=>'portfolio-category'),
                'query_var'=>true
            );
            register_taxonomy('portfolio_category','portfolio',$args);
        }
        public function __construct(){
            add_action('init',array($this,'phase_portfolio_category_register'));
        }
    }
?>