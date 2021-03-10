<?php

function melist_styles() {

    wp_enqueue_style( 'main-css', get_template_directory_uri() . '/css/style.css' );
    wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css' );

    wp_deregister_script('jquery');
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', true );
    wp_enqueue_script( 'mask', get_template_directory_uri() . '/js/jquery.mask.min.js', true );
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/app.js', true );

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

add_filter( 'wp_get_attachment_image_attributes', function( $attr )
{
    if( isset( $attr['class'] )  && 'custom-logo' === $attr['class'] )
        $attr['class'] = 'custom-logo mx-auto md:m-0';

    return $attr;
} );

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_6043961c0bd4d',
        'title' => 'Cabeçalho',
        'fields' => array(
            array(
                'key' => 'field_60439629219bf',
                'label' => 'Destaque Roxo',
                'name' => 'destaque_roxo',
                'type' => 'text',
                'instructions' => 'Cabeçalho roxo localizado embaixo da logo da página. É um campo H2. Não precisa colocar a tag h2.',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'Fácil comprar. <br> Fácil economizar.',
                'placeholder' => 'Fácil comprar. <br> Fácil economizar.',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_6043966c219c0',
                'label' => 'Texto Descrição',
                'name' => 'texto_descricao',
                'type' => 'text',
                'instructions' => 'Texto logo embaixo do destaque roxo. É um título em H3. Não precisa colocar a tag h3.',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'Quer economizar dinheiro na hora de fazer suas compras de supermercado?',
                'placeholder' => 'Quer economizar dinheiro na hora de fazer suas compras de supermercado?',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'melist-opcoes',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_604396ae6c3f3',
        'title' => 'Smartphone',
        'fields' => array(
            array(
                'key' => 'field_604396b6fac63',
                'label' => 'Imagem Smartphone',
                'name' => 'imagem_smartphone',
                'type' => 'image',
                'instructions' => '362x548, é o tamanho ideal para evitar reajustar o layout. O WordPress vem com editor built-in de imagens, recomendo usa-lo para cortar a imagem ou para redimensionar. Imagens em PNG são recomendadas para poder exibir corretamente o fundo.',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'full',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => 362,
                'max_height' => 548,
                'max_size' => '',
                'mime_types' => 'png',
            ),
            array(
                'key' => 'field_60439719fac64',
                'label' => 'Preço',
                'name' => 'preco',
                'type' => 'text',
                'instructions' => 'O preço que é exibido ao lado da imagem do smartphone em um círculo azulado.',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'R$29,75',
                'placeholder' => 'R$29,75',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_6043974bfac65',
                'label' => 'Texto abaixo de preço',
                'name' => 'texto_abaixo_de_preco',
                'type' => 'text',
                'instructions' => 'O texto que será exibido abaixo de preço. O padrão é: mais barato!',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'mais barato!',
                'placeholder' => 'mais barato!',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'melist-opcoes',
                ),
            ),
        ),
        'menu_order' => 2,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_6044289eda3cc',
        'title' => 'Formulário',
        'fields' => array(
            array(
                'key' => 'field_604428bf8cd40',
                'label' => 'Formulário',
                'name' => 'formulario',
                'type' => 'wysiwyg',
                'instructions' => 'Shortcode do Formulário',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'melist-opcoes',
                ),
            ),
        ),
        'menu_order' => 3,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_604426e6be140',
        'title' => 'Rodapé',
        'fields' => array(
            array(
                'key' => 'field_604426f2615ae',
                'label' => 'Política de Privacidade',
                'name' => 'politica_de_privacidade',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'melist-opcoes',
                ),
            ),
        ),
        'menu_order' => 4,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_6041d1ba7af95',
        'title' => 'Monitoramento',
        'fields' => array(
            array(
                'key' => 'field_6041d1c7ae5f1',
                'label' => 'Google Analytics',
                'name' => 'google_analytics',
                'type' => 'wysiwyg',
                'instructions' => 'Coloque aqui o código do Google Analytics.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'text',
                'media_upload' => 1,
                'toolbar' => 'full',
                'delay' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'melist-opcoes',
                ),
            ),
        ),
        'menu_order' => 6,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
endif;

add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    wp_deregister_style( 'contact-form-7' );
}