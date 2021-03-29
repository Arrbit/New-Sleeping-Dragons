<?php
function enqueue_styles() {
    wp_enqueue_style('frontpage', get_template_directory_uri() . '/css/frontpage.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles');

wp_enqueue_script(
    'bootstrap',
    get_template_directory_uri() . '/js/bootstrap.min.js',
    array( 'jquery' ),
);

?>