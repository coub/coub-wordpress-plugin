<?php
/*
Plugin Name: Coub
Description: Embed coub.com looped videos into your WordPress site
Version:     1.0
Author:      Rami Yushuvaev
Author URI:  http://GenerateWP.com/
Text Domain: coub
Domain Path: /languages
*/


function coub_oembed_provider() {
  wp_oembed_add_provider( '#https?://(www\.)?coub.com/(view|embed)/.*#i', 'https://coub.com/api/oembed.json', true );
}

function coub_oembed_result( $html, $url, $args ) {
    if ( strpos( $url, 'coub.com' ) !== false ) {
      if ( preg_match( '/src="([^"]+)"/', $html, $iframe_src_matches ) ) {
        $old_iframe_src = $iframe_src = $iframe_src_matches[1];

        if ( !strpos( $iframe_src, '?' ) ) {
          $iframe_src .= '?';
        }

        foreach( array( 'muted', 'autostart', 'noControls', 'hideTopBar', 'noHDControl', 'noSiteButtons', 'originalSize', 'startWithHD' ) as $param ) {
          if ( isset( $args[strtolower($param)] ) ) {
              $iframe_src .= "&" . $param . "=" . $args[strtolower($param)];
          }
        }

        $html = str_replace( $old_iframe_src, $iframe_src, $html );
      }
    }
    return $html;
}

add_action( 'init', 'coub_oembed_provider' );
add_filter( 'oembed_result', 'coub_oembed_result', 10, 3 );

