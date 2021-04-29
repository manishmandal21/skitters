<?php

        add_action( 'customize_register', 'skitters_customizer_settings' );
            function skitters_customizer_settings( $wp_customize ) {

                $wp_customize->add_setting( 'text_color' , array(
                    'default'     => '#6f6f6f',
                    'transport'   => 'refresh',
                    'sanitize_callback'  => 'esc_attr',
                ) );
                $wp_customize->add_setting( 'line_color' , array(
                    'default'     => '#e9ecef',
                    'transport'   => 'refresh',
                    'sanitize_callback'  => 'esc_attr',
                ) );
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
                    'label'        => 'Text Colors',
                    'section'    => 'colors',
                    'settings'   => 'text_color',
                ) ) );
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'line_color', array(
                    'label'        => 'Line Colors',
                    'section'    => 'colors',
                    'settings'   => 'line_color',
                ) ) );

                $wp_customize->add_section( 'smooth_scrollbar' , array(
                    'title'      => 'Smooth Scrollbar',
                    'priority'   => 60,
                ) );
                $wp_customize->add_setting( 'skitters_smooth_scrollbar' , array(
                    'default'     => true,
                    'transport'   => 'refresh',
                    'sanitize_callback'  => 'esc_attr',
                ) );
                $wp_customize->add_control( 'skitters_smooth_scrollbar', array(
                    'label' => 'Smooth Scrollbar',
                    'section' => 'smooth_scrollbar',
                    'settings' => 'skitters_smooth_scrollbar',
                    'type' => 'radio',
                    'choices' => array(
                        'enable' => 'Enable',
                        'disable' => 'Disable',
                    ),
                ) );
                $wp_customize->add_section( 'footer' , array(
                    'title'      => 'Footer',
                    'priority'   => 60,
                ) );
                $wp_customize->add_setting( 'skitters_facebook' , array(
                    'transport'   => 'refresh',
                    'sanitize_callback'  => 'esc_url',
                ) );
                $wp_customize->add_control( 'skitters_facebook', array(
                    'label' => 'Facebook Link',
                    'section' => 'footer',
                    'settings' => 'skitters_facebook',
                    'type' => 'url',
                ) );
                $wp_customize->add_setting( 'skitters_twitter' , array(
                    'transport'   => 'refresh',
                    'sanitize_callback'  => 'esc_url',
                ) );
                $wp_customize->add_control( 'skitters_twitter', array(
                    'label' => 'Twitter Link',
                    'section' => 'footer',
                    'settings' => 'skitters_twitter',
                    'type' => 'url',
                ) );
                $wp_customize->add_setting( 'skitters_linkedin' , array(
                    'transport'   => 'refresh',
                    'sanitize_callback'  => 'esc_url',
                ) );
                $wp_customize->add_control( 'skitters_linkedin', array(
                    'label' => 'Linkedin Link',
                    'section' => 'footer',
                    'settings' => 'skitters_linkedin',
                    'type' => 'url',
                ) );
                $wp_customize->add_setting( 'skitters_instagram' , array(
                    'transport'   => 'refresh',
                    'sanitize_callback'  => 'esc_url',
                ) );
                $wp_customize->add_control( 'skitters_instagram', array(
                    'label' => 'Instagram Link',
                    'section' => 'footer',
                    'settings' => 'skitters_instagram',
                    'type' => 'url',
                ) );
                $wp_customize->add_setting( 'skitters_youtube' , array(
                    'transport'   => 'refresh',
                    'sanitize_callback'  => 'esc_url',
                ) );
                $wp_customize->add_control( 'skitters_youtube', array(
                    'label' => 'Youtube Link',
                    'section' => 'footer',
                    'settings' => 'skitters_youtube',
                    'type' => 'url',
                ) );
                $wp_customize->add_setting( 'skitters_copyright' , array(
                    'transport'   => 'refresh',
                    'sanitize_callback'  => 'esc_attr',
                ) );
                $wp_customize->add_control( 'skitters_copyright', array(
                    'label' => 'Copyright',
                    'section' => 'footer',
                    'settings' => 'skitters_copyright',
                    'type' => 'textarea',
                ) );
                $wp_customize->add_setting( 'skitters_mobile' , array(
                    'transport'   => 'refresh',
                    'sanitize_callback'  => 'esc_html',
                ) );
                $wp_customize->add_control( 'skitters_mobile', array(
                    'label' => 'Mobile Floating Footer Settings',
                    'section' => 'footer',
                    'settings' => 'skitters_mobile',
                    'type' => 'hidden',
                ) );
                $wp_customize->add_setting( 'skitters_mobile_whatsapp' , array(
                    'transport'   => 'refresh',
                    'sanitize_callback'  => 'esc_html',
                ) );
                $wp_customize->add_control( 'skitters_mobile_whatsapp', array(
                    'label' => 'Whatsapp Number with country code',
                    'section' => 'footer',
                    'settings' => 'skitters_mobile_whatsapp',
                    'type' => 'number',
                ) );
                $wp_customize->add_setting( 'skitters_mobile_mail' , array(
                    'transport'   => 'refresh',
                    'sanitize_callback'  => 'sanitize_email',
                ) );
                $wp_customize->add_control( 'skitters_mobile_mail', array(
                    'label' => 'Email',
                    'section' => 'footer',
                    'settings' => 'skitters_mobile_mail',
                    'type' => 'email',
                ) );
}

add_action( 'wp_head', 'skitters_customizer_css');
function skitters_customizer_css()
{
    ?>
    <style type="text/css">
        /* Text color customizer */
        p { color: <?php echo esc_html(get_theme_mod('text_color', '#43C6E4')); ?>; }
        #site-navigation ul li a{
            color: <?php echo esc_html(get_theme_mod('text_color', '#6f6f6f')); ?>;
        }

        /* Line color customizer*/
        #site-navigation ul, .bsb, .bsb .left-side, #secondary, footer#colophon section, .navigation li a, .ipb, aside#secondary section, aside#secondary section input, .copyright, .socialicons i, .changemenu, div#comments, select#cat{
            border: 1px solid <?php echo esc_html(get_theme_mod('line_color', '#e9ecef')); ?>;
        }

    </style>
    <?php
}

add_action('wp_footer', 'skitters_customizer_script', 100);
function skitters_customizer_script(){
    ?>
    <?php if( esc_html(get_theme_mod( 'skitters_smooth_scrollbar', 'disable' ) == 'enable' )) : ?>
        <script>
            var elem = document.querySelector("html");
            var scrollbar = Scrollbar.init(elem,
                {
                    speed: 1,
                    damping:0.08,
                    renderByPixels: true,
                    thumbMinSize:20
                });
        </script>
    <?php endif ?>

<?php
}


