<?php
function enqueue_styles() {
    wp_enqueue_style('frontpage', get_template_directory_uri() . '/css/frontpage.css');
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles');
?>