<?php while ( have_posts() ): the_post(); ?>
    <h1 class="text-center texto-primario"> <?php the_title(); ?> </h1>
        <?php 
            if(has_post_thumbnail() ): //verifica si hay una imagen cargada
                the_post_thumbnail('blog', array('class' => 'imagen-destacada')); //aquí se renderiza
            endif;
        ?>
        <?php
            //Verifica que el post agregaro sea de la clase fitgym_clases
            if(get_post_type()==='fitgym_clases'){
                $hora_inicio = get_field('hora_inicio');
                $hora_fin = get_field('hora_fin');
        ?>
            <p class="informacion-clase"><?php the_field('dias_clase'); ?> - <?php echo $hora_inicio . " a " .  $hora_fin; //advanced custom fields ?></p>
        <?php
            }
        ?>
    <?php the_content(); ?>
<?php endwhile; ?>