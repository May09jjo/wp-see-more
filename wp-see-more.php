<?php
/*
Plugin Name: WP See more
Plugin URI:  none
Description: A secure and simple way to hide content behind a 'show more' link using a shortcode. A replacement for the vulnerable 'WP show more' plugin.
Version:     1.0.0
Author:      Michael Jiron
Author URI:  https://mjiron-portfolio.vercel.app/
License:     GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wp-see-more
*/

// Prevent direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Register the shortcode. The name 'show_more' is kept for backward compatibility.
add_shortcode( 'show_more', 'wpsm_see_more_shortcode_handler');

/**
 * Handles the [show_more] shortcode.
 *
 * @param array  $attr    Shortcode attributes.
 * @param string $content The content enclosed by the shortcode.
 * @return string The HTML output for the show/hide functionality.
 */
function wpsm_see_more_shortcode_handler( $attr, $smcontent ) {
    // Set default values for the shortcode attributes
    $defaults = array(
        'color'  => '#cc0000',
        'list'   => '',
        'align'  => 'left',
        'more'   => 'show more',
        'less'   => 'show less',
        'size'   => '100',
    );
    $attr = shortcode_atts( $defaults, $attr, 'show_more' );

    // Sanitize and validate all attributes for security
    $color = esc_attr( $attr['color'] );
    $list_text = sanitize_text_field( $attr['list'] );
    $more_text = sanitize_text_field( $attr['more'] );
    $less_text = sanitize_text_field( $attr['less'] );
    $font_size = intval( $attr['size'] );

    // Whitelist validation for the 'align' attribute
    $allowed_aligns = array( 'left', 'right', 'center', 'justify' );
    $text_align = in_array( $attr['align'], $allowed_aligns ) ? $attr['align'] : 'left';

    // Build the HTML output using the sanitized variables
    $output  = '<div class="wpsm-container">';
    
    // "Show more" link
    $output .= '<p class="wpsm-show" style="color: ' . $color .'; font-size: ' . $font_size .'%; text-align: ' . $text_align .';">';
    $output .= $list_text . ' ' . $more_text;
    $output .= '</p>';
    
    // Hidden content
    $output .= '<div class="wpsm-content">';
    $output .= '<p>' . do_shortcode($smcontent) . '</p>'; // Process any shortcodes within the content

    // "Show less" link
    $output .= '<p class="wpsm-hide" style="color: ' . $color .'; font-size: ' . $font_size .'%; text-align: ' . $text_align .';">';
    $output .= $list_text . ' ' . $less_text;
    $output .= '</p>';
    
    $output .= '</div></div>'; // Close .wpsm-content and .wpsm-container

    return $output;
}

/**
 * Enqueues the necessary CSS and JavaScript files for the plugin.
 */
add_action( 'wp_enqueue_scripts', 'wpsm_see_more_scripts');
function wpsm_see_more_scripts (){
    $plugin_url = plugins_url( '/', __FILE__ );

    // Enqueue the stylesheet
    wp_enqueue_style (
        'wpsm-style',
        $plugin_url . 'wpsm-style.css',
        array(),
        '1.0.0'
    );

    // Enqueue the JavaScript file
    wp_enqueue_script (
        'wpsm-script',
        $plugin_url . 'wpsm-script.js',
        array( 'jquery' ),
        '1.0.0',
        true // Load in footer
    );
}
?>
