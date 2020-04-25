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

<section class="instructores">
    <div class="contenedor seccion">
        <h2 class="text-center texto-primario">Nuestros instructores</h2>
        <p class="text-center">Instructores profesionales que te ayudarán a lograr tus objetivos</p>
        <ul class="listado-instructores">
            <!-- vamos a acceder al post type creado en el plugin fitgym_post_types -->
            <?php
                $args = array(
                    'post_type' => 'instructores', /* nombre del post type */
                    'posts_per_page' => 30
                );
                $instructores = new WP_Query($args); /* le vamos a pasar el query del arreglo a un objeto llamado $instructores */
                while($instructores->have_posts()): $instructores->the_post(); /* y aquí se va a comprobar si existen posts se va a realizar la asignación the_post()
                al objeto $instructores por cada iteración */
            ?>
            <li class="instructor">
                <?php the_post_thumbnail('medium_theme');?>
                <div class="contenido text-center">
                    <h3><?php the_title(); /* nos va a mostrar el título de cada post type */?></h3>
                    <?php the_content(); /* nos muestra el contenido de la caja de texto del post type */?>
                    <div class="especialidad">
                        <?php
                            $esp = get_field('especialidad'); /* especialidad se obtiene del nombre del grupo de custom fields */
                            /* var_dump($esp); para debugear */
                            foreach($esp as $esp):
                        ?>
                                <span class="etiqueta">
                                    <?php echo esc_html($esp);?>
                                </span>
                        <?php
                            endforeach;
                        ?>
                    </div>
                </div>
            </li>
            <?php endwhile; wp_reset_postdata(); /* wp_reset_postdata() resetea las consultas personalizadas y retorna a standares de WP */?>
        </ul>
    </div>
</section>

<section class="testimoniales">
    <h2 class="text-center texto-blanco">Testimoniales</h2>
    <div class="contenedor-testimoniales">
        <ul class="listado-testimoniales">
            <?php
                $args = array(
                    'post_type' => 'testimoniales',
                    'posts_per_page' => 10
                );
                $testimoniales = new WP_Query($args);
                while($testimoniales->have_posts()): $testimoniales->the_post();
            ?>
            <li class="testimonial text-center">
                <blockquote> <!-- blockquote etiqueta recomendada para los testimoniales -->
                    <?php the_content(); ?>
                </blockquote>
                <footer class="testimonial-footer">
                    <?php the_post_thumbnail('thumbnail');?>
                    <p><?php the_title(); ?></p>
                </footer>
            </li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
    </div>
</section>

<?php get_footer(); ?>