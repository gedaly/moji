<?php
/**
 * Hero section for homepage
 *
 * @package Moji
 * @since 1.0.0
 * @author gedaly
 * @link https://gedaly.com
 * @license MIT
 */


add_filter( 'beans_main_before_markup', 'gg_homepage_hero' );
/**
 * Creates a homepage hero section
 *
 * TODO replace everything in the `<p>` tag with a function, create a function that puts custom field in customizer
 *       for this content
 */
function gg_homepage_hero() {
	if ( is_front_page() ) {

		beans_remove_action( 'beans_post_title' );

		echo '<div class="gg-homepage-hero"><div class="uk-container"><section><h1>' . get_the_title() . '</h1><p>I\'m an
🎭Actor ✍️Writer 🎬Filmmaker 🥋Martial Artist 👨🏻‍💻Web Developer 🤹Professional Distraction 🥊Unlikely Action Hero</p></section></div></div>';

	}
}