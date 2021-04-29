<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Skitters
 */

get_header();
?>

	<div id="primary" class="content-area">
    <div class="container-fluid">
    <div class="row">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'posts' );

			?>
                <div class="col-md-12">
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            </div>
        <?php

		endwhile; // End of the loop.
		?>
    </div>
    </div>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
