<?php

/* Consultas reutilizables */
require get_template_directory() . '/inc/queries.php';

//cuando tema es activado
function fitgym_setup(){
    //habilitar imagenes destacadas
    add_theme_support('post-thumbnails');
    //habilita posicionamiento SEO
    add_theme_support('title-tag');

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
    //agregar hoja de estilos sólo a una página en particular
    if(is_page('galeria')):
        wp_enqueue_style('lightboxCss', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.1');
    endif;
    //hoja de scripts
    wp_enqueue_script('slicknavJs', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true);
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery','slicknavJs'), '1.0.0', true);
    //agregar hoja de estilos sólo a una página en particular
    if(is_page('galeria')):
        wp_enqueue_script('lightboxJs', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.1', true);
    endif;
}

add_action('wp_enqueue_scripts', 'fitgym_scripts_styles');

// Definir zona de widgets

function fitgym_widgets(){
    register_sidebar(array(
        'name' => 'Sidebar 1', //nombre del widget que se va a ver en el dashboard
        'id' => 'sidebar_1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Sidebar 2', //nombre del widget que se va a ver en el dashboard
        'id' => 'sidebar_2',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center texto-primario">',
        'after_title' => '</h3>'
    ));
}
add_action('widgets_init','fitgym_widgets');