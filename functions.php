<?php

function fitgym_menus(){
    register_nav_menus(array(
        'menu-principal' => __( 'Menu Principal', 'Fitgym' ),
        'menu-principal2' => __( 'Menu Principal2', 'Fitgym' )
    ));      
}

add_action('init', 'fitgym_menus'); //hook para agregar funciones, init cuando garque la página, y fitgym es nuestro Text domain

//Scripts y Styles  -------------> va a funcionar siempre para cargar hojas de estilo y archivos javascript
function fitgym_scripts_styles() {
//wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900|Staatliches&display=swap', array(), '1.0.0');

echo get_stylesheet_uri();

    //hoja de estilos principal
    wp_enqueue_style('style', get_stylesheet_uri(), array('googleFont'), '1.0.0');
}

add_action('wp_enqueue_scripts', 'fitgym_scripts_styles');