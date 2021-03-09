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
    
        <div class="grid grid-cols-1 md:grid-cols-2 gap-36 px-4">
        
            <div class="information">
            
                <h2 class="font-heading font-bold text-2xl text-center md:text-left">
                    <?php the_field('destaque_roxo', 'option'); ?>
                </h2>

                <h3 class="text-xl font-heading font-light leading-6 text-center md:text-left md:pr-32 pt-6">
                    <?php the_field('texto_descricao', 'option'); ?>
                </h3>

                <?php the_field('formulario', 'option'); ?>

                <!--
                    <div class="grid-cols-3 border md:mr-32 rounded-xl pb-4 col-span-3 p-5 border-b bg-endereco block col-span-1 md:border-r col-span-2 w-11/12 font-body border-0 text-sm p-0 bg-transparent w-full py-4 mt-4 pl-2"></div>
                -->

            </div>
            
            <div class="screen-smartphone hidden md:block">
            
                <img src="<?php echo get_template_directory_uri() . '/img/smartphone.png'; ?>" />

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