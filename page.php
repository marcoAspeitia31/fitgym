<?php get_header(); ?>
    <main class="contenedor pagina seccion con-sidebar">
        <div class="contenido-principal">
            <?php while ( have_posts() ): the_post(); ?>
                <h1 class="text-center texto-primario"> <?php the_title(); ?> </h1>
                <?php 
                    if(has_post_thumbnail() ): //verifica si hay una imagen cargada
                        the_post_thumbnail('blog', array('class' => 'imagen-destacada')); //aquí se renderiza
                    endif;
                ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        </div>
        <aside class="sidebar">
            <h1>Sidebar aquí</h1>
        </asid>
    </main>

<?php get_footer(); ?>