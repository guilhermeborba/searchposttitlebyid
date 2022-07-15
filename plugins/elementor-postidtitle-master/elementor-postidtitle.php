<?php
/**
 * Post ID Title WordPress Plugin
 *
 * @package PostIdTitle
 *
 * Plugin Name: Search Post Title by ID 
 * Description: Custom Elementor widget to Pipefy's recruitment exercises
 * Plugin URI:  https://www.guilhermeborba.com.br/pipefy
 * Version:     1.0.0
 * Author:      Guilherme Borba
 * Author URI:  https://www.guilhermeborba.com.br
 * Text Domain: post-id-title
 */

define( 'ELEMENTOR_POSTIDTITLE', __FILE__ );

/**
 * Include the Elementor_Postidtitle class.
 */
require plugin_dir_path( ELEMENTOR_POSTIDTITLE ) . 'class-elementor-postidtitle.php';
