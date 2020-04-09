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
wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap', array(), '1.0.0');

    //hoja de estilos principal
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize, googleFont'), '1.0.0');
}

add_action('wp_enqueue_scripts', 'fitgym_scripts_styles');