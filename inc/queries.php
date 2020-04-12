<?php

//consulta a la base de datos para traernos los resultados del custom post type
//abrir documentacipin de wp query en wordpress.org
function fitgym_lista_clases(){ ?>
    <ul class="lista-clases"> 
        <?php
            $args = array(
                'post_type' => 'gymfitness_clases', //consulta las clases de posttype gymfitness
                'post_per_page' => 10,
                'orderby' => 'title',
                'order' => 'ASC'
            );
            $clases = new WP_Query($args); //el resultado va a  asignarse en la variable $clases)
            while($clases->have_posts()): $clases->the_post(); //the_post imprime título, contenido, imagen destacada.
        ?>
            <li>
                <h1><?php the_title(); ?></h1>
            </li>
            <?php
                endwhile;
                wp_reset_postdata(); //le decimos a wordpress que ya dejamos de utilizar wp_query y que vuelva a sus actividades normales
            ?> 
    </ul>
<?php    
}