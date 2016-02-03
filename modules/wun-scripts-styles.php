<?php

function remove_style_id($link) {
        return preg_replace("/id='.*-css'/", "", $link);
}
add_filter('style_loader_tag', 'remove_style_id');


function remove_script_version($src) {
  return $src ? esc_url(remove_query_arg('ver', $src)) : false;
}
add_filter('script_loader_src', 'remove_script_version', 15, 1);
add_filter('style_loader_src', 'remove_script_version', 15, 1);
