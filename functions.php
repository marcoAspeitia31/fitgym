<?php

/* Consultas reutilizables */
require get_template_directory() . '/inc/queries.php';

//cuando tema es activado
function fitgym_setup(){
    //habilitar imagenes destacadas
    add_theme_support('post-thumbnails');

    //agregar imágenes de tamaño personalizado
    add_image_size('square', 350, 350, true);
    add_image_size('portrait', 350, 724, true);
    add_image_size('boxes', 400, 375, true);
    add_image_size('medium_theme', 700, 400, true);
    add_image_size('blog', 966, 644, true);
}
add_action('after_setup_theme', 'fitgym_setup');
// Menus de navegación, agregar más utilizando el arreglo
function fitgym_menus(){
    register_nav_menus(array(
        'menu-principal' => __( 'Menu Principal', 'Fitgym' ),
        'menu-principal2' => __( 'Menu Principal2', 'Fitgym' )
    ));
}

add_action('init', 'fitgym_menus'); //hook para agregar funciones, init cuando carque WP, y fitgym es nuestro Text domain

//Scripts y Styles  -------------> va a funcionar siempre para cargar hojas de estilo y archivos javascript
function fitgym_scripts_styles() {
wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');
wp_enqueue_style('slicknavCss', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.10');
wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900|Staatliches&display=swap', array(), '1.0.0');

//hoja de estilos principal
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize','googleFont'), '1.0.0');

    //hoja de scripts
    wp_enqueue_script('slicknavJs', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true);
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery','slicknavJs'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'fitgym_scripts_styles');