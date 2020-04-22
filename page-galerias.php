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
                    <?php
                        $i = 1;
                        foreach($galeria_imagenes_ID as $id):
                            //variable tamaño si es 4 o 6 será igual a portrait de lo contrario será square
                            $size = ($i == 4 || $i == 6) ? 'portrait' : 'square';
                            //recorremos el arreglo y por medio del id de la imagen adjunta obtenemos la característica $size 
                            //de los archivos adjuntos son su atributo en la posición 0
                            $imagenThumb = wp_get_attachment_image_src($id, $size)[0];
                            //vamos a generar las imágenes grandes con:
                            $imagen = wp_get_attachment_image_src($id, 'full')[0];
                            /*
                            el siguiente código sirve para debuguear 
                            echo "<pre>";
                            var_dump($imagenThumb);
                            echo "</pre>";
                            */
                    ?>
                        <li>
                            <a href="<?php echo $imagen; ?>" data-lightbox="galeria">
                                <img src="<?php echo $imagenThumb; ?>" alt="imagen">
                            </a>
                        </li>
                    <?php
                        $i++;
                        endforeach;
                    ?>
                </ul>
            <?php endwhile; ?>
        </div>
    </main>
<?php get_footer(); ?>