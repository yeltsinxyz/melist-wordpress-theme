<?php

function melist_styles() {

    wp_enqueue_style( 'main-css', get_template_directory_uri() . '/css/style.css' );

}
add_action( 'wp_enqueue_scripts', 'melist_styles' );

if ( ! function_exists( 'melist_theme_setup' ) ) :
    function melist_theme_setup() {

        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'custom-logo', array(
            'height'        =>  60,
            'width'         =>  220,
            'flex-height'   =>  true,
        ) );

        add_theme_support( 'title-tag' );

    }
endif;
add_action( 'after_setup_theme', 'melist_theme_setup' );

if ( function_exists( 'acf_add_options_page' ) ) {

    acf_add_options_page(array(
        'page_title'        =>      'Melist Opções',
        'menu_title'        =>      'Melist Opções',
        'menu_slug'         =>      'melist-opcoes',
        'capability'        =>      'edit_posts'
    ));

}

function wpdev_filter_login_head() {
 
    if ( has_custom_logo() ) :
 
        $image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
        ?>
        <style type="text/css">
            .login h1 a {
                background-image: url(<?php echo esc_url( $image[0] ); ?>);
                -webkit-background-size: <?php echo absint( $image[1] )?>px;
                background-size: <?php echo absint( $image[1] ) ?>px;
                height: <?php echo absint( $image[2] ) ?>px;
                width: <?php echo absint( $image[1] ) ?>px;
            }
        </style>
        <?php
    endif;
}
 
add_action( 'login_head', 'wpdev_filter_login_head', 100 );

function new_wp_login_url() {
    return home_url();
}
add_filter('login_headerurl', 'new_wp_login_url');

add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

if ( ! function_exists( 'melist_register_nav_menu' ) ) {
 
    function melist_register_nav_menu(){
        register_nav_menus( array(
            'footer_menu'  => __( 'Menu do Rodapé', 'melist' ),
        ) );
    }
    add_action( 'after_setup_theme', 'melist_register_nav_menu', 0 );
}