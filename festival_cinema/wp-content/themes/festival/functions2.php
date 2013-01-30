<?php
function load_slideshow_script() {
	if (is_home()){
			wp_enqueue_script('slideshow', get_template_directory_uri().'/js/slideshow.js', array(‘jquery’));
			wp_enqueue_script('init_slideshow', get_template_directory_uri().'/js/init_slideshow.js', array('slideshow'));
		}
	}

function boucle() {
	if ( $post->post_type == 'data-design' && $post->post_status== 'publish' ){
		$attachments = get_posts( array('post_type' => 'attachment','posts_per_page' => -1,'post_parent' => $post->ID,'exclude' => get_post_thumbnail_id()));
		if ($attachments) {
			foreach ( $attachments as $attachment ){
				$class = "post-attachment mime-" . sanitize_title($attachment->post_mime_type );
				$thumbimg = wp_get_attachment_link( $attachment->ID, 'thumbnail-size', true );
				echo '<li class="'.$class.' data-design-thumbnail">'.$thumbimg.'</li>';
			}
		}
	}
}

add_action('get_header', 'load_slideshow_script');
?>