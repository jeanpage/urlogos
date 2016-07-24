<?php 
/*

    Plugin Name: Phase Portfolio
    Plugin URI: http://phasethemes.com/plugins/portfolio
    Description: Enable portfolios for your WordPress site
    Version: 1.3
    Author: Phase Themes
    Author URI: http://phasethemes.com

*/

    if(!defined('WPINC')){
        die;
    }

    require_once(DIRNAME(__FILE__).'/phase-portfolio-category.php');
    require_once(DIRNAME(__FILE__).'/phase-portfolio-widget.php');

    class phase_portfolio{
        public function phase_portfolio_register(){
            register_post_type('portfolio',
                array(
                    'labels'=>array(
                        'name' =>'Portfolios',
                        'singular_name'=>'Portfolio'
                    ),
                    'supports'=>array('title','editor','thumbnail'),
                    'menu_position'=>5,
                    'menu_icon'=>'dashicons-portfolio',
                    'public'=>true,
                    'exclude_from_search'=>true,
                    'has_archive'=>true
                )
            );
        }
        public function __construct(){
            add_action('init',array($this,'phase_portfolio_register'));
        }
    }

    function phase_portfolio_setup(){
        new phase_portfolio();
        new phase_portfolio_category();
    }
    phase_portfolio_setup();

    // function phase_portfolio_activate(){
    //     phase_portfolio_setup();
    //     flush_rewrite_rules();
    // }
    // register_activation_hook(__FILE__,'phase_portfolio_activate');
     
    function phase_portfolio_deactivate(){
        flush_rewrite_rules();
    }
    register_deactivation_hook( __FILE__,'phase_portfolio_deactivate');

?>