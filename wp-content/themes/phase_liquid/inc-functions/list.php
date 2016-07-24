<?php
/**
 *
 * @package	   TGM-Plugin-Activation
 * @subpackage Example
 * @version	   2.3.6
 * @author	   Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author	   Gary Jones <gamajo@gamajo.com>
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license	   http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

require_once($tempdir.'/inc-functions/activation.php');

add_action('tgmpa_register','phase_plugin_list');

function phase_plugin_list(){

	$plugins = array(
		array(
			'name'     	=> 'Phase Portfolio',
			'slug'     	=> 'phase-portfolio',
			'source'    => get_template_directory().'/inc-plugins/phase-portfolio.zip',
			'required' 	=> true,
		),
		array(
			'name'     	=> 'Phase Shortcodes',
			'slug'     	=> 'phase-shortcodes',
			'source'    => get_template_directory().'/inc-plugins/phase-shortcodes.zip',
			'required' 	=> false,
		),
		array(
			'name'     	=> 'Phase Recent Posts',
			'slug'     	=> 'phase-recent-posts',
			'source'    => get_template_directory().'/inc-plugins/phase-recent-posts.zip',
			'required' 	=> false,
		)
	);

	$config = array(
		'domain'       		=> 'liquid',
		'default_path' 		=> '',
		'parent_menu_slug' 	=> 'themes.php',
		'parent_url_slug' 	=> 'themes.php',
		'menu'         		=> 'install-required-plugins',
		'has_notices'      	=> true,
		'is_automatic'    	=> false,
		'message' 			=> '',
		'strings'      		=> array(
			'page_title' => esc_html__('Install Required Plugins','liquid'),
			'menu_title' => esc_html__('Install Plugins','liquid'),
			'installing' => esc_html__('Installing Plugin: %s','liquid'),
			'oops' => esc_html__('Something went wrong with the plugin API.','liquid'),
			'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.','This theme requires the following plugins: %1$s.','liquid'),
			'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.','This theme recommends the following plugins: %1$s.','liquid'),
			'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.','Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','liquid'),
			'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.','The following required plugins are currently inactive: %1$s.','liquid'),
			'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.','The following recommended plugins are currently inactive: %1$s.','liquid'),
			'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.','Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','liquid'),
			'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.','The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','liquid'),
			'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','liquid'),
			'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins','liquid'),
			'activate_link' => _n_noop('Activate installed plugin', 'Activate installed plugins','liquid'),
			'return' => esc_html('Return to Required Plugins Installer'),
			'plugin_activated' => esc_html('Plugin activated successfully.'),
			'complete' => esc_html('All plugins installed and activated successfully. %s'),
			'nag_type' => 'updated'
		)
	);
	tgmpa($plugins,$config);
}