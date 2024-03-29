<?php get_header(); ?>

    <header class="container mx-auto pt-20 pb-10 md:px-4">
            
        <div class="grid grid-cols-1 md:grid-cols-3">
        
            <div>
                <h1>
                    <?php
                        if ( function_exists( 'the_custom_logo' ) ) {
                            the_custom_logo();
                        }
                    ?>
                </h1>
            </div>
        
        </div>    
    
    </header>

    <section class="container mx-auto info-form md:px-4">
    
        <div class="grid grid-cols-1 md:grid-cols-2 gap-36 md:gap-18 px-4">
        
            <div class="information">
            
                <h2 class="font-heading font-bold text-2xl text-center md:text-left">
                    <?php the_field('destaque_roxo', 'option'); ?>
                </h2>

                <h3 class="text-xl font-heading font-light leading-6 text-center md:text-left lg:pr-32 pt-6">
                    <?php the_field('texto_descricao', 'option'); ?>
                </h3>

                <?php the_field('formulario', 'option'); ?>

            </div>
            
            <div class="screen-smartphone hidden md:block">

                <picture>
                    <source type="image/webp" srcset="<?php echo get_template_directory_uri() . '/img/smartphone.webp'; ?>">
                    <img src="<?php echo get_template_directory_uri() . '/img/smartphone.png'; ?>" width="362">
                </picture>
                        
                <div class="box-smartphone relative -top-96 -left-6 text-center text-white">
                
                    <p class="font-heading"><?php the_field('preco', 'option'); ?></p>
                    <p class="body text-xs"><?php the_field('texto_abaixo_de_preco', 'option'); ?></p>

                </div>

            </div>

        </div>

    </section>

    <footer class="container mx-auto pt-8 md:pt-0 mt-12">

        <div class="grid grid-cols-1 text-center">

            <p class="politica text-sm pb-2"><a href="<?php the_field('politica_de_privacidade', 'option'); ?>" target="_blank">Política de privacidade</a></p>
            <p class="copy text-xs">&copy; 2021 - Melist</p>

        </div>

    </footer>

<?php get_footer(); ?>