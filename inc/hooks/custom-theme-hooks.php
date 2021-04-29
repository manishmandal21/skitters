<?php

/* Get blog posts layout */

if (! function_exists('skitters_get_blog_posts_layout')) :
    function skitters_get_blog_posts_layout() {

        get_template_part( 'template-parts/blog-layout/blog', 'layout' );

    }
endif;

/* Get blog posts data layout */

if(! function_exists('skitters_get_blog_posts_data_layout')):
	function skitters_get_blog_posts_data_layout(){
		get_template_part( 'template-parts/blog-layout/post', 'layout' );
}
endif;

/* Get  page data layout */

if(! function_exists('skitters_get_page_data_layout')):
    function skitters_get_page_data_layout(){
        get_template_part( 'template-parts/blog-layout/page', 'layout' );
    }
endif;

/* Get footer layout */

if(! function_exists('skitters_footer_layout')):
	function skitters_footer_layout(){
		get_template_part( 'template-parts/blog-layout/footer', 'layout' );
}
endif;

if(! function_exists('skitters_posts_navigation')):
	function skitters_posts_navigation(){
			if( is_singular() )
				return;
			global $wp_query;
			if( $wp_query->max_num_pages <= 1 )
				return;
			$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
			$max   = intval( $wp_query->max_num_pages );
			if ( $paged >= 1 )
				$links[] = $paged;
			if ( $paged >= 3 ) {
				$links[] = $paged - 1;
				$links[] = $paged - 2;
			}
			if ( ( $paged + 2 ) <= $max ) {
				$links[] = $paged + 2;
				$links[] = $paged + 1;
			}
			echo '<div class="navigation"><ul>' . "\n";
			if (get_previous_posts_link() )
				printf( '<li>%s</li>' . "\n",  esc_url(get_previous_posts_link()) );
			if ( ! in_array( 1, $links ) ) {
				$class = 1 == $paged ? ' class="active"' : '';

				printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

				if ( ! in_array( 2, $links ) )
					echo '<li>...</li>';
			}
			sort( $links );
			foreach ( (array) $links as $link ) {
				$class = $paged == $link ? ' class="active"' : '';
				printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
			}
			if ( ! in_array( $max, $links ) ) {
				if ( ! in_array( $max - 1, $links ) )
					echo '<li>...</li>' . "\n";
				$class = $paged == $max ? ' class="active"' : '';
				printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
			}
			if ( get_next_posts_link() )
				printf( '<li>%s</li>' . "\n", esc_url(get_next_posts_link()) );

			echo '</ul></div>' . "\n";
	}
endif;