<?php
#Load Styles (Order Matters :))
function enqueue_styles() {
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('tables', get_template_directory_uri() . '/css/tables.css');
    wp_enqueue_style('card', get_template_directory_uri() . '/css/card.css');
    wp_enqueue_style('pagination', get_template_directory_uri() . '/css/pagination.css');
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

/** Ajax Implementation Start Members
 * This has been moved to archive-members.php for performance reasons
 * **/

// wp_register_script( 'core-js', get_template_directory_uri() . '/js/core.js');
// wp_enqueue_script( 'core-js' );

// wp_localize_script( 'core-js', 'ajax_posts', array(
//   'ajaxurl' => admin_url( 'admin-ajax.php' ),
//   'noposts' => __('No older posts found'),
// ));	

function more_post_ajax(){

  $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 9;
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
      $out .= 
      '<a class="member_card" href='.get_the_permalink().'>

      <div class="card card_container flex-column d-flex">
      <div class="card_img member_card_img">
      '.(has_post_thumbnail() ? get_the_post_thumbnail() : '
      <img sizes="(max-width: 768px) 100vw, 768px"  width="768" height="432" loading="lazy" 
      class="attachment-medium_large size-medium_large wp-post-image" src="'.get_stylesheet_directory_uri().'/assets/img/404.png"> ').'
      </div>

          <div class="card_title font--righteous">
          '.get_the_title().'
          </div>
        </div>
      </a>';

  endwhile;
  endif;
  wp_reset_postdata();
  die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');
/** Ajax Implementation End Members**/



add_action( 'after_setup_theme', 'wnd_default_image_settings' );

function wnd_default_image_settings() {
	update_option( 'image_default_align', 'center' );
	update_option( 'image_default_link_type', 'file' );
	update_option( 'image_default_size', 'large' );
}

function wordpress_pagination(){
  global $wp_query; 
  echo paginate_links();
}

 function render_pagination(){ ?>
  <div class="pagination">
      <?php
      add_filter('wp_link_pages_args', 'wp_link_pages_args_prevnext_add');
      function wp_link_pages_args_prevnext_add($args)
      {
          global $page, $numpages, $more, $pagenow;

          if (!$args['next_or_number'] == 'next_and_number') 
              return $args; # exit early

          $args['next_or_number'] = 'number'; # keep numbering for the main part
          if (!$more)
              return $args; # exit early

          if($page-1) # there is a previous page
              $args['before'] .= _wp_link_page($page-1)
                  . $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'
              ;

          if ($page<$numpages) # there is a next page
              $args['after'] = _wp_link_page($page+1)
                  . $args['link_before'] . ' ' . $args['nextpagelink'] . $args['link_after'] . '</a>'
                  . $args['after']
              ;

          return $args;
      }
      wp_link_pages(array(
          'before' => '<p style="flex:auto">' . __('Pages: '),
          'after' => '</p>',
          'next_or_number' => 'next_and_number', # activate parameter overloading
          'nextpagelink' => __(' Next '),
          'previouspagelink' => __(' Previous '),
          'separator'        => ' ',
          'pagelink' => '%',
          'echo' => 1 )
      );?>
      </div> <?php 
  }

?>