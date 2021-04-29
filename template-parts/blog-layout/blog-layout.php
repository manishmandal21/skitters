
<div id="post-<?php the_ID(); ?>" <?php post_class('col-md-6'); ?>>
            <div class="col-md-12 bsb">
               <div class="left-side">
                   <?php skitters_post_thumbnail() ?>
               </div>
               <div class="right-side">
                   <?php esc_html(skitters_title()); ?>
                   <div class="entry-content">
                       <p><?php
                           echo esc_html(substr(get_the_excerpt(), 0,100));
                           ?></p>

                   </div>
                    <div class="post-info">
                        <p><span><i class="fas fa-user"></i></span><?php skitters_posted_by();?></p>
                        <p><span><i class="fas fa-calendar"></i></span><?php echo esc_html(get_the_date()); ?></p>
                        <p><span><i class="fas fa-clock"></i></span><?php esc_html(the_time()); ?></p>
                    </div>
                   <div class="postcat post-info">
                       <p><span><i class="fas fa-folder-open"></i></span><?php echo get_the_category_list(', ') ; ?></p>
                   </div>



               </div>
            </div>
        </div>