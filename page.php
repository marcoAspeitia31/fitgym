<?php get_header(); ?>
<h1>pagina</h1>
<?php while ( have_posts() ): the_post(); ?>
    <h1> <?php the_title(); ?> </h1>>
    <?php the_content(); ?>
<?php endwhile; ?>

<?php get_footer(); ?>