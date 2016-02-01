<?php
/*
Plugin Name: Coub
Plugin URI:  https://wordpress.org/plugins/coub/
Description: Embed looped videos with audio from coub.com into your WordPress site.
Version:     1.3
Author:      Rami Yushuvaev
Author URI:  https://GenerateWP.com/
Text Domain: coub
*/



/*
 * Security check
 * Prevent direct access to the file.
 *
 * @since 1.1
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/*
 * Plugin textdomain
 * Load plugin textdomain.
 *
 * @since 1.3
 */
function coub_load_textdomain() {
	load_plugin_textdomain( 'coub' );
}
add_action( 'plugins_loaded', 'coub_load_textdomain' );



/*
 * Coub oEmbed
 * Register oEmbed provider.
 *
 * @since 1.0
 */
function coub_oembed_provider() {

	wp_oembed_add_provider( '#https?://(www\.)?coub.com/view/.*#i', 'https://coub.com/api/oembed.json', true );

}
add_action( 'init', 'coub_oembed_provider' );



/*
 * Filter Coub oEmbed
 * Filter the code returned by the oEmbed provider and add supported parameters to the code.
 *
 * @since 1.2
 */
function coub_oembed_result( $html, $url, $args ) {

	if ( strpos( $url, 'coub.com' ) !== false ) {

		if ( preg_match( '/src="([^"]+)"/', $html, $iframe_src_matches ) ) {

			$old_iframe_src = $iframe_src = $iframe_src_matches[1];

			if ( ! strpos( $iframe_src, '?' ) ) {
				$iframe_src .= '?';
			}

			$parameters = array( 'muted', 'autostart', 'noControls', 'hideTopBar', 'noHDControl', 'noSiteButtons', 'originalSize', 'startWithHD' );

			foreach( $parameters as $param ) {

				if ( isset( $args[strtolower($param)] ) ) {
					$iframe_src .= "&" . $param . "=" . $args[strtolower($param)];
				}

			}

			$html = str_replace( $old_iframe_src, $iframe_src, $html );

		}

	}

	return $html;

}
add_filter( 'oembed_result', 'coub_oembed_result', 10, 3 );
