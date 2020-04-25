<?php get_header('front'); ?>
<section class="bienvenida text-center seccion">
    <h2 class="texto-primario"> <?php the_field('encabezado_bienvenida'); ?> </h2>
    <!-- the_field() es un hook que nos trae por medio del slug un campo que hayamos dado de alta en custom fields the cierta página -->
    <p><?php the_field('texto_bienvenida');?></p>
</section>

<div class="seccion-areas">
    <ul class="contenedor-areas">
        <li class="area">
            <?php
                $area1= get_field('area_1') ;/* a la variable area1 se le va a asignar el objeto del field con slug area1 */
                /* var_dump($area1); para comprobar qué es lo que trae el objeto $area1 */
                $imagen = wp_get_attachment_image_src($area1['area_imagen'], 'medium_theme')[0];
            ?>
            <img src="<?php echo esc_attr($imagen); ?>" />
            <p><?php echo esc_html($area1['area_texto']); ?></p>
        </li>
        <li class="area">
            <?php
                $area2= get_field('area_2') ;
                $imagen = wp_get_attachment_image_src($area2['area_imagen'], 'medium_theme')[0];
            ?>
            <img src="<?php echo esc_attr($imagen); ?>" />
            <p><?php echo esc_html($area2['area_texto']); ?></p>
        </li>
        <li class="area">
            <?php
                $area3= get_field('area_3') ;
                $imagen = wp_get_attachment_image_src($area3['area_imagen'], 'medium_theme')[0];
            ?>
            <img src="<?php echo esc_attr($imagen); ?>" />
            <p><?php echo esc_html($area3['area_texto']); ?></p>
        </li>
        <li class="area">
            <?php
                $area4= get_field('area_4') ;
                $imagen = wp_get_attachment_image_src($area4['area_imagen'], 'medium_theme')[0];
            ?>
            <img src="<?php echo esc_attr($imagen); ?>" />
            <p><?php echo esc_html($area4['area_texto']); ?></p>
        </li>
    </ul>
</div>
<section class="clases">
    <div class="contenedor seccion">
        <h2 class="text-center texto-primario">Nuestras clases</h2>
        <?php fitgym_lista_clases(4); ?> <!-- nos va a traer el querie lista_clases con los parámetros que ya hemos configurado -->
        <div class="contenedor-boton">
            <a href="<?php echo esc_url( get_permalink( get_page_by_title('Nuestras Clases') ) );?>" 
                class="boton boton-primario"><!-- Boton para obtener el permalink de una pagina con título Nuestras Clases con escape de url -->
                Ver todas las clases
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>