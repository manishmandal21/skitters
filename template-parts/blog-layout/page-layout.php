

               <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-12'); ?>>
                    <div class="col-md-12 ipb">
                        <div class="inner-posts-thumb">
	                        <?php skitters_post_thumbnail() ?>
                        </div>
                        <div class="inner-post-content">
                            <?php
                            the_content();

                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'skitters' ),
                                'after'  => '</div>',
                            ) );
                            ?>
                        </div>
                    </div>
               </div>

