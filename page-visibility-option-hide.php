<?php
/**
Plugin Name: Page Visibility Option Hide
Plugin URI: https://wordpress.org/plugins/page-visibility-option-hide
Description: Hide Page Visibility Option by add this plugin & active.
Author: Manoj Ahir
Author URI: #
Copyright: Manoj Ahir
Version: 1.0
Requires at least: 4.0
Tested up to: 4.9.6
License: GPLv2 or later
 */

/**
 * Exit if accessed directly
 */
if (!defined('ABSPATH')) {
    exit;
}

add_action( 'plugins_loaded', 'page_visibility_option_hide_translate' );


/**
 * Function for language translations
 */
function page_visibility_option_hide_translate() {

    load_plugin_textdomain('page_visibility_option_hide', false, basename(dirname( __FILE__ ) ) . '/languages' );

}

/**
 * Functions for Hide Page Visibility Option
 * @global type $pagenow
 * @return type
 */
function pvoh_no_visibility_for_page() {
    echo '<style>div#visibility.misc-pub-section.misc-pub-visibility{display:none}</style>';
}

function pvoh_current_screen_page_action($current_screen) {
    if ('page' == $current_screen->post_type && 'post' == $current_screen->base) {
        add_action('admin_head', 'pvoh_no_visibility_for_post');
    }
}
add_action('current_screen', 'pvoh_current_screen_page_action');

