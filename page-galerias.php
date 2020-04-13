<?php
/*
* Template Name: Template para Galerías
*/
get_header(); ?>
    <main class="contenedor pagina seccion">
        <div class="contenido-principal">
            <?php while ( have_posts() ): the_post(); ?>
                <h1 class="text-center texto-primario"> <?php the_title(); ?> </h1>

                <?php
                //obtener la galería de la página actual
                    $galeria = get_post_gallery( get_the_ID(), false );
                //obtener los IDS
                    $galeria_imagenes_ID = explode(',', $galeria['ids']); //explode me va a asignar cada ID dentro de un arreglo excluyendo las comas
                ?>
                <ul class="galeria-imagenes">

                </ul>
            <?php endwhile; ?>
        </div>
    </main>
<?php get_footer(); ?>