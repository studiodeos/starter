<?php

//Usuwa h1 z edytora
function wpa_45815($arr){
    $arr['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4';
    return $arr;
  }
add_filter('tiny_mce_before_init', 'wpa_45815');

//Reset styli galerii
add_filter( 'use_default_gallery_style', '__return_false' );

//Usuwanie niepotrzebnych danych ze strony profilu użytkownika w panelu administracyjnym
function add_remove_contactmethods( $contactmethods ) {
	unset($contactmethods['aim']);
	unset($contactmethods['yim']);
	unset($contactmethods['jabber']);
	unset($contactmethods['user_url']);
	return $contactmethods;
}
add_filter('user_contactmethods','add_remove_contactmethods',10,1);

//link do wersji large obrazka
function oikos_get_attachment_link_filter( $content, $post_id, $size, $permalink ) {
	if (! $permalink) {
		$image = wp_get_attachment_image_src( $post_id, 'large' );
		$new_content = preg_replace('/href=\'(.*?)\'/', 'href=\'' . $image[0] . '\'', $content );
		return $new_content;
	} else {
		return $content;
	}
}
add_filter('wp_get_attachment_link', 'oikos_get_attachment_link_filter', 10, 4);

// Dodaje klase img do obrazkow z linkiem
function give_linked_images_class($html, $id, $caption, $title, $align, $url, $size, $alt = '' ){
  $classes = 'img';
  if ( preg_match('/<a.*? class=".*?">/', $html) ) {
    $html = preg_replace('/(<a.*? class=".*?)(".*?>)/', '$1 ' . $classes . '$2', $html);
  } else {
    $html = preg_replace('/(<a.*?)>/', '$1 class="' . $classes . '" >', $html);
  }
  return $html;
}
add_filter('image_send_to_editor','give_linked_images_class',10,8);

// Czyszczenie HEADERA
function nowp_head_cleanup() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'wp_resource_hints', 2 );
	global $wp_widget_factory;
    if (!class_exists('WPSEO_Frontend')) {
        remove_action('wp_head', 'rel_canonical');
        add_action('wp_head', 'nowp_rel_canonical');
    }
}
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
function remove_json_api () {
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
	remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	add_filter( 'embed_oembed_discover', '__return_false' );
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	// add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
}
add_action( 'after_setup_theme', 'remove_json_api' );
function disable_json_api () {
  add_filter('json_enabled', '__return_false');
  add_filter('json_jsonp_enabled', '__return_false');
  add_filter('rest_enabled', '__return_false');
  add_filter('rest_jsonp_enabled', '__return_false');
}
add_action( 'after_setup_theme', 'disable_json_api' );
add_action( 'wp_footer', 'my_deregister_scripts' );
add_filter('xmlrpc_enabled', '__return_false');
add_filter('json_enabled', '__return_false');
add_filter('json_jsonp_enabled', '__return_false');
function nowp_rel_canonical() {
    global $wp_the_query;
    if (!is_singular()) {
        return;
    }
    if (!$id = $wp_the_query->get_queried_object_id()) {
        return;
    }
    $link = get_permalink($id);
    echo "\t<link rel=\"canonical\" href=\"$link\">\n";
}
add_action('init', 'nowp_head_cleanup');
add_filter('the_generator', '__return_false');
function nowp_language_attributes() {
    $attributes = array();
    $output = '';
    if (function_exists('is_rtl')) {
        if (is_rtl() == 'rtl') {
            $attributes[] = 'dir="rtl"';
        }
    }
    $lang = get_bloginfo('language');
    if ($lang && $lang !== 'en-US') {
        $attributes[] = "lang=\"$lang\"";
    } else {
        $attributes[] = 'lang="en"';
    }
    $output = implode(' ', $attributes);
    $output = apply_filters('nowp_language_attributes', $output);
    return $output;
}
add_filter('language_attributes', 'nowp_language_attributes');

// Usuń jQuery
wp_deregister_script('jquery');
wp_register_script('jquery', '', '', '', true);

// Menu
function register_my_menus() {
  register_nav_menus(
    array(
      'top-menu' => __( 'Menu Góra' )
    )
  );
}
add_action( 'init', 'register_my_menus' );