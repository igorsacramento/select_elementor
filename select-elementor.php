<?php

/**
 * Plugin Name: Widget Select Elementor
 * Plugin URI: 
 * Description: Plugin Elementor para inserção de Widget com campo select
 * Author: Igor Sacramento
 * Author URI: http://portal.igorsacramento.com
 * Version: 1.0.0
 * License: GPLv2 or later
 * Text Domain: is_select_elementor
 * 
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


function is_select_elementor_init()
{
	include_once('class-widget-select-elementor.php');
	include_once('includes/elementor-render.php');
	wp_enqueue_style('is-select-style', plugins_url('style.css', __FILE__), array());
	add_action('elementor/widgets/register', 'is_register_widgets_elementor');
	wp_enqueue_script('is-select-script', plugins_url('script.js', __FILE__), array('jquery'));
}
add_action('init', 'is_select_elementor_init');


function is_register_widgets_elementor($widgets_manager)
{
	$widgets_manager->register(new \IS_Select_Elementor());
}
