<?php
#Load Styles (Order Matters :))
function enqueue_styles() {
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('card', get_template_directory_uri() . '/css/card.css');
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
        'header-menu' => __( 'Header Menu' ),
      )
    );
  }
  add_action( 'init', 'register_my_menus' );

#Same for the widgets, just the init is here :)
function widget_init() {
    if ( function_exists('register_sidebar') )
    
    register_sidebar(
      array(
        'name' => 'Footer',
        'before_widget' => '<div class = "footer">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
      ));

    register_sidebar(
      array(
        'name' => 'Header',
        'before_widget' => '<div class = "header">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
      ));

    }
    add_action( 'widgets_init', 'widget_init' );


// Our custom post type function
function create_posttype() {
    register_post_type( 'letters',
        array(
            'labels' => array(
                'name' => __( 'Letters' ),
                'singular_name' => __( 'Letter' )
            ),
            'rewrite' => array('slug' => 'letter'),
            'public' => true,
            'hierarchical' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'publicly_queryable' => true
        )
    );
    register_post_type( 'members',
        array(
            'labels' => array(
                'name' => __( 'Members' ),
                'singular_name' => __( 'Member' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'members'),
            'show_in_rest' => true,
        )
    );
}
add_action( 'init', 'create_posttype' );

/** Ajax **/
wp_register_script( 'core-js', get_template_directory_uri() . '/js/core.js');
wp_enqueue_script( 'core-js' );

wp_localize_script( 'core-js', 'ajax_posts', array(
  'ajaxurl' => admin_url( 'admin-ajax.php' ),
  'noposts' => __('No older posts found'),
));	

function more_post_ajax(){

  $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
  $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

  header("Content-Type: text/html");

  $args = array(
      'suppress_filters' => true,
      'post_type' => 'members',
      'posts_per_page' => $ppp,
      'paged'    => $page,
  );

  $loop = new WP_Query($args);

  $out = '';

  if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
      $out .= '<div class="small-12 large-4 columns">
              <h1>'.get_the_title().'</h1>
              <p>'.get_the_content().'</p>
       </div>';

  endwhile;
  endif;
  wp_reset_postdata();
  die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

?>