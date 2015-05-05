<?php
/*
Plugin Name: Coub
Plugin URI:  https://wordpress.org/plugins/coub/
Description: Embed coub.com looped videos into your WordPress site
Version:     1.1
Author:      Rami Yushuvaev
Author URI:  http://GenerateWP.com/
Text Domain: coub
Domain Path: /languages
*/



/*
 * Prevent direct access to the file
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/*
 * Register oEmbed Provider
 */
function coub_oembed_provider() {

	wp_oembed_add_provider( '#https?://(www\.)?coub.com/view/.*#i', 'https://coub.com/api/oembed.json', true );

}

add_action( 'init', 'coub_oembed_provider' );
