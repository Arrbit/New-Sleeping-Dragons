<?php
#Load Styles (Order Matters :))
function enqueue_styles() {
    wp_enqueue_style('frontpage', get_template_directory_uri() . '/css/frontpage.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles');

#Load Scripts Order matters here too :)
wp_enqueue_script(
    'bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', 
    array( 'jquery' ),
);

#Define menus but they still need to be called somewhere else :)
function register_my_menus() {
    register_nav_menus(
      array(
        'footer-menu' => __( 'Footer Menu' ),
      )
    );
  }
  add_action( 'init', 'register_my_menus' );

#Same for the widgets, just the init is here :)
function widget_init() {
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => 'footer',
        'before_widget' => '<div class = "footer">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
      )
    );

    }
    add_action( 'widgets_init', 'widget_init' );
?>