<?php get_header(); ?>

    <header class="container mx-auto py-20">
            
        <div class="grid grid-cols-3">
        
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

    <section class="container mx-auto info-form">
    
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 px-4">
        
            <div class="information">
            
                <h2 class="font-heading font-bold text-2xl">
                    Fácil comprar. <br>
                    Fácil economizar.
                </h2>

                <h3 class="text-xl font-heading font-light leading-6 pr-32 pt-12">
                    Quer economizar dinheiro na hora de fazer suas compras de supermercado?
                </h3>

            </div>
            
            <div class="screen-smartphone hidden md:block">
            
                <img src="<?php echo get_template_directory_uri() . '/img/smartphone.png'; ?>" />

                <div class="box-smartphone text-center text-white">
                
                    <p class="font-heading">R$29,75</p>
                    <p class="body">mais barato!</p>

                </div>

            </div>

        </div>

    </section>

<?php get_footer(); ?>