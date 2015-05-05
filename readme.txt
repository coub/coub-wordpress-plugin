=== Coub ===
Contributors: Coub, ramiy
Tags: coub, videos, oEmbed
Requires at least: 3.5
Tested up to: 4.2
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Embed coub.com looped videos into your WordPress site

== Description ==

A [coub](https://coub.com) is a looped video with audio, up to 10 seconds long. Turn your favorite videos into coubs online. Share them with friends and enjoy what others create.

This plugin enables site owners to embed coub looped videos into WordPress site using nothing but the URL.

Choose any video from [coub.com](http://coub.com/explore), or [create](http://coub.com/create) your own! Copy the video URL and paste it to your post text editor. Then simply click over to the visual editor to confirm that it loads properly.

https://www.youtube.com/watch?v=Vp7M6hRn9CI

== Installation ==

= Installation =
1. In your WordPress Dashboard go to "Plugins" -> "Add Plugin".
2. Search for "Coub".
3. Install the plugin by pressing the "Install" button.
4. Activate the plugin by pressing the "Activate" button.

= Updating =
* Use WordPress automatic updates to upgrade to the latest version. Ensure to backup your site just in case.

= Minimum Requirements =
* WordPress version 3.5 or greater.
* PHP version 5.2.4 or greater.
* MySQL version 5.0 or greater.

= Recommended  Requirements =
* The latest WordPress version.
* PHP version 5.4 or greater.
* MySQL version 5.5 or greater.

== Frequently Asked Questions ==

= How do I embed videos from Coub? =

With this plugin you can use the URL to embed videos. Just paste the video URL into your post editor:
`https://coub.com/view/4211j`

= How do I set custom dimentions to my videos? =

In WordPress 4.2 you cab double click the embedded video to set max `width` and max `height` dimentions. It will add the WordPress `[embed]` shortcode:
`[embed width="600" height="400"]https://coub.com/view/4211j[/embed]`

**Note:** Doing it the WordPress way, using the `[embed]` shortcode, is backwards and forward compatible, and it works  with all the themes.

== Changelog ==

= 1.1 (2015-05-05) =
* Prevent direct access to main php file.
* Add i18n support.
* Add russian (ru_RU) and hebrew (he_IL) traslation.

= 1.0 (2015-04-16) =
* Initial release.
* Register oEmbed provider.
