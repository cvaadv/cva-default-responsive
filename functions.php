<?php
/**
 * @package WordPress
 * @subpackage perkins
 */
define('WP_DEBUG', true);
require 'class.wp-less-styles.php';
include 'functions.less-styles.php';

class PerkinsTheme
{
  public function init()
  {
    // Register less
    wp_register_script('less', get_template_directory_uri() . '/javascripts/less-1.0.41.js', array(), false, true);
    // Then add to the queue
    wp_enqueue_script('less'); 

    // Register app.less
    wp_register_less_style('app', get_template_directory_uri() . '/stylesheets/app.less');
    // Then add to the queue
    wp_enqueue_less_style('app');
    
    // Register ubuntu font
    wp_register_style('ubuntu-font', 'http://fonts.googleapis.com/css?family=Ubuntu');
    wp_enqueue_style('ubuntu-font'); 
  }
}

// Init
add_action('init', array('PerkinsTheme', 'init'));
