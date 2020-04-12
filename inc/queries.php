<?php

//consulta a la base de datos para traernos los resultados del custom post type
//abrir documentacipin de wp query en wordpress.org
function fitgym_lista_clases(){ ?>
    <ul class="lista-clases"> 
        <?php
            $args = array(
                'post_type' => 'fitgym_clases', //consulta las clases de post type de nuestro plugin fitgym
                'post_per_page' => 10,
                'orderby' => 'title',
                'order' => 'ASC'
            );
            $clases = new WP_Query($args); //el resultado va a  asignarse en la variable $clases)
            while($clases->have_posts()): $clases->the_post(); //the_post imprime título, contenido, imagen destacada.
        ?>
            <li class="clase card">
                <?php the_post_thumbnail('medium_theme'); ?>
                <div class="contenido">
                    <a href="<?php the_permalink(); //nos va generar un enlace?>"> 
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <?php
                        $hora_inicio = get_field('hora_inicio');
                        $hora_fin = get_field('hora_fin');
                    ?>
                    <p><?php the_field('dias_clase'); ?> - <?php echo $hora_inicio . " a " .  $hora_fin; //advanced custom fields ?></p>
                </div>
            </li>
            <?php
                endwhile;
                wp_reset_postdata(); //le decimos a wordpress que ya dejamos de utilizar wp_query y que vuelva a sus actividades normales
            ?> 
    </ul>
<?php    
}