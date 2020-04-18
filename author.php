<?php get_header(); ?>
    <main class="pagina seccion no-sidebars contenedor">
        <?php
            $autor = get_queried_object();
            /* Este código nos muestra el resultado del último query obtenido y
            nos indica todos los parámetros del objeto, necesitamos el nombre del
            objeto así que por medio de la sintaxis $name_object -> $param obtenemos
            dicho nombre.
            echo "<pre>";
            var_dump($categoria);
            echo "</pre>";
            */
        ?>
        <h2 class="text-center texto-primario">
            Autor: 
            <?php echo $autor->data->display_name; /*Nos obtiene el nombre del autor*/ ?>
        </h2>
        <p class="text-center"> <?php echo get_the_author_meta('description', $autor->data->ID) ?></p>
        <ul class="listado-blog">
            <?php get_template_part('template-parts/loop', 'blog') ?>
        </ul>
    </main>
<?php get_footer(); ?>