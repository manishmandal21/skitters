<?php
/**
 *
 * Template Name: Full Width
 *
 * The template for displaying content in full width.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package skitters
 */

get_header();
?>
    <div class="container-fluid">
    <div class="row">
	<div class="col-md-12 pagefullwidth">
<div>

    <?php
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile; // End of the loop.
    ?>
</div>

	</div>
    </div>
    </div>

<?php
get_footer();
