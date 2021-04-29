<?php

/**
 * Post content.
 *
 * @see get_blog_posts_layout()
 */

add_action( 'skitters_action_blog_layout', 'skitters_get_blog_posts_layout', 10 );
add_action( 'skitters_action_blog_data_layout', 'skitters_get_blog_posts_data_layout', 10 );
add_action( 'skitters_action_page_data_layout', 'skitters_get_page_data_layout', 10 );
add_action( 'skitters_action_get_posts_navigation', 'skitters_posts_navigation', 10 );
add_action( 'skitters_action_get_footer', 'skitters_footer_layout', 10 );