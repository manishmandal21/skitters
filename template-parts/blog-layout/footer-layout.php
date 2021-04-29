<div class="container-fluid">
    <div class="row">
        <?php dynamic_sidebar( 'footer' ); ?>
    </div>
    <div class="row">
        <div class="socialicons">
            <a href="<?php echo esc_url(get_theme_mod('skitters_facebook', '#')); ?>"><i class="fab fa-facebook"></i></a>
            <a href="<?php echo esc_url(get_theme_mod('skitters_twitter', '#')); ?>"><i class="fab fa-twitter"></i></a>
            <a href="<?php echo esc_url(get_theme_mod('skitters_linkedin', '#')); ?>"><i class="fab fa-linkedin"></i></a>
            <a href="<?php echo esc_url(get_theme_mod('skitters_instagram', '#')); ?>"><i class="fab fa-instagram"></i></a>
            <a href="<?php echo esc_url(get_theme_mod('skitters_youtube', '#')); ?>"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
    <div class="row">
       <div class="copyright">
          <p><?php echo esc_html(get_theme_mod('skitters_copyright', 'Theme developed by Manish Mandal')); ?></p>
       </div>
    </div>

    </div>
</div>
<div class="mfooter">
    <div class="dockicon">
        <a class="active" aria-current="page" href="<?php echo esc_url(home_url()); ?>"><i class="fas fa-home"></i></a>
        <a href="#" data-toggle="modal" data-target="#myModal"><i class="fas fa-search"></i></a>
        <a href="https://wa.me/+<?php echo esc_attr(get_theme_mod('skitters_mobile_whatsapp', '#')); ?>"><i class="fab fa-whatsapp"></i></a>
        <a href="mailto:<?php echo esc_html(get_theme_mod('skitters_mobile_mail', 'providewp@gmail.com')); ?>"><i class="fas fa-envelope"></i></a>
    </div>
</div>

<div class="modal fade cusmod" id="myModal" role="dialog">
    <div class="modal-dialog customdialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <?php get_search_form() ;?>
            </div>
        </div>

    </div>
</div>