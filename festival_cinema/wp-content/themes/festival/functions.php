<?php

function load_slideshow_script() {
if (is_home() || is_front_page()) {
wp_enqueue_script('slideshow', get_stylesheet_directory_uri() . '/js/slideshow.js', array('jquery'));
wp_enqueue_script('init_slideshow', get_stylesheet_directory_uri() . '/js/init_slideshow.js', array('slideshow'));
}
}

add_action('get_header', 'load_slideshow_script');


function getSlideItem(){
$attachments = get_posts( array(
'post_type' => 'attachment',
'posts_per_page' => -1,
'post_parent' => $post->ID,
'exclude' => get_post_thumbnail_id()
) );

if ( $attachments ) {
$output =array();
foreach ( $attachments as $attachment ) {
$thumb = wp_get_attachment_link( $attachment->ID, 'large', true );
$output[] = '<li>' . $thumb. '</li>';
}
echo implode("\n", $output);
}
}


?>