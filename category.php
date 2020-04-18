<?php get_header(); ?>
    <main class="pagina seccion no-sidebars contenedor">
        <?php
            $categoria = get_queried_object();
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
            Categoría: 
            <?php echo $categoria->name; ?>
        </h2>
        <ul class="listado-blog">
            <?php get_template_part('template-parts/loop', 'blog') ?>
        </ul>
    </main>
<?php get_footer(); ?>