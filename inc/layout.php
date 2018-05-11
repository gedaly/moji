<?php

add_filter( 'beans_layout', 'gg_force_single_column_layout' );

function gg_force_single_column_layout() {

	return 'c';

}


// header
beans_remove_attribute( 'beans_header', 'class', 'uk-block' );
beans_add_attribute( 'beans_header', 'class', 'gg-header' );

// menu
beans_remove_attribute( 'beans_primary_menu', 'class', 'uk-float-right' );

// Branding
beans_remove_attribute( 'beans_site_branding', 'class', 'uk-float-left' );
beans_remove_action( 'beans_site_title_tag' ); // Remove the site title tag.

// remove breadcrumbs
beans_remove_action( 'beans_breadcrumb' );

// Beans Post title
beans_remove_attribute( 'beans_post_title', 'class', 'uk-article-title' );
beans_add_attribute( 'beans_post_title', 'class', 'gg-article-title' );

// Edit Post Meta
beans_remove_action( 'beans_post_meta_categories' );
beans_remove_action( 'beans_post_navigation' );

//
add_filter( 'beans_post_meta_items', 'gg_remove_post_meta_items' );
/**
 * Remove Author Meta
 *
 * @since 1.0.0
 * @param $items
 * @return mixed
 */
function gg_remove_post_meta_items($items ) {
    unset( $items['author'] );
    return $items;
}

// Make tags text normal size
beans_remove_attribute( 'beans_post_meta_tags', 'class', 'uk-text-small' );

// Modify the footer credit right text.
add_filter( 'beans_footer_credit_right_text_output', 'example_footer_credit_right_text' );
/**
 * Custom lower right footer text
 * Inserts a custom twitter follow button
 * I used this method instead of the twitter JS to avoid loading extra resources.
 *
 * @since 1.0.0
 *
 * @return string
 */
function example_footer_credit_right_text() {

	return '<a href="https://twitter.com/intent/follow?ref_src=twsrc%5Etfw&screen_name=gedaly&tw_p=followbutton" 
			target="_blank" class="twitter-follow-button">
			<span class="uk-icon-twitter uk-icon-small">
			</span> Follow @gedaly</a>';

}

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


