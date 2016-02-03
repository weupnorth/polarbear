<?php
/**
 * Removing WordPress version from HEAD and RSS
 *
 */

function disable_version() {
   return '';
}
add_filter('the_generator','disable_version');
remove_action('wp_head', 'wp_generator');

remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version

/**
 * Removing Yoast SEO debug output from wp_head.
 *
 * @link   http://andreaskarman.se/2016/02/03/visa-inte-att-du-anvander-yoast-seo/
 */

if (defined('WPSEO_VERSION')){
  add_action('get_header',function (){ ob_start(function ($o){
  return preg_replace('/\n?<.*?yoast.*?>/mi','',$o); }); });
  add_action('wp_head',function (){ ob_end_flush(); }, 999);
}