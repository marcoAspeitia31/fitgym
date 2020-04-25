jQuery(document).ready( $ =>{
    $('.site-header .menu-principal .menu').slicknav({
        label: '',
        appendTo: '.site-header'
    });
    /* agregar slider */
    $('.listado-testimoniales').bxSlider({
        /*auto: true /* hace que slider arranque automáticamente */
    });
});