=== WP See more ===
Contributors: Michael Jiron
Tags: shortcode, show more, see more, toggle, content, hide
Requires at least: 4.6
Tested up to: 6.5
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A secure and simple way to hide content behind a 'show more' link using a shortcode.

== Description ==

"WP See more" provides a secure and lightweight solution to hide long blocks of content behind a "show more" link. This plugin was created as a secure replacement for the "WP show more" plugin (versions 1.0.7 and below), which was found to have a stored XSS vulnerability.

This plugin keeps the same shortcode `[show_more]` for seamless, secure upgrading. Simply deactivate the old plugin and activate this one.

**Features:**
* **Secure:** All user-provided attributes are sanitized and escaped to prevent XSS attacks.
* **Easy to use:** Wrap your content with `[show_more]` and `[/show_more]`.
* **Customizable:** Change the link text, color, alignment, and size directly in the shortcode.
* **Backward Compatible:** Works as a drop-in replacement for the original plugin.

== Installation ==

1.  Upload the `wp-see-more` folder to the `/wp-content/plugins/` directory.
2.  Activate the plugin through the 'Plugins' menu in WordPress.
3.  (Recommended) Deactivate and delete the old "WP show more" plugin if it is installed.
4.  Use the shortcode `[show_more]Your hidden content here.[/show_more]` in your posts or pages.

== Usage ==

**Basic Shortcode:**
`[show_more]This content will be hidden initially.[/show_more]`

**Shortcode with all attributes:**
`[show_more more="Click to read more" less="Hide content" color="#0055dd" size="120" align="center" list="->"]This content is customized.[/show_more]`

**Attributes:**
* `more`: The text for the "show more" link (default: "show more").
* `less`: The text for the "show less" link (default: "show less").
* `color`: The hex color code for the links (default: "#cc0000").
* `size`: The font size of the links as a percentage (default: "100").
* `align`: The text alignment of the links (`left`, `right`, `center`, `justify`; default: "left").
* `list`: A character or symbol to display before the link text (e.g., a bullet or arrow).

== Changelog ==

= 1.0.0 - 2024-07-29 =
* Initial release.
* Forked from the vulnerable "WP show more" plugin.
* Security Hardening: Added sanitization and escaping for all shortcode attributes to prevent Stored XSS.
* Cleaned up code and ensured WordPress coding standards.

