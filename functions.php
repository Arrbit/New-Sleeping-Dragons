<?php
function enqueue_styles() {
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('tables', get_template_directory_uri() . '/css/tables.css');
    wp_enqueue_style('card', get_template_directory_uri() . '/css/card.css');
    wp_enqueue_style('pagination', get_template_directory_uri() . '/css/pagination.css');
    wp_enqueue_style('frontpage', get_template_directory_uri() . '/css/frontpage.css');
    wp_enqueue_style('ce', get_template_directory_uri() . '/css/ce.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles');

#Load Scripts Order matters here too :)
wp_enqueue_script(
    'bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', 
    array( 'jquery' ),
);

include get_template_directory() . '/php/events.php';


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
          'name' => 'Event Navigation',
          'before_widget' => '<div class="custom-widget top-round card slight-shadow card_container flex-column-reverse">',
          'after_widget' => '</div>',
          'before_title' => '<div class="card_title">',
          'after_title' => '</div>',
        ));

    register_sidebar(
      array(
        'name' => 'Frontpage News',
        'before_widget' => '<div class="custom-widget card top-round slight-shadow card_container flex-column-reverse">',
        'after_widget' => '</div>',
        'before_title' => '<div class="card_title">',
        'after_title' => '</div>',
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
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
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
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail'),
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

      <div class="card card_container slight-shadow flex-column d-flex">
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

/** Breadcrumb Implentation */
function nav_breadcrumb() {
 
 $delimiter = ' / ';
 $home = 'Home'; 
 $before = '<span class="current-page">'; 
 $after = '</span>'; 
 
    if ( !is_home() && !is_front_page() || is_paged() ) {
    
    echo '<nav class="breadcrumb">';
    
    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
    
        if ( is_category()) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);

            if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
            echo $before . single_cat_title('', false) . $after;
    
            } elseif ( is_day() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
            
            } elseif ( is_month() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
            
            } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;
            
            } elseif ( is_single() && !is_attachment() ) {
                if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->name . '</a> ';
                } else {
                $cat = get_the_category(); $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo $before . get_the_title() . $after;
                }
 
            } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;

            } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
            
            } elseif ( is_page() && !$post->post_parent ) {
            echo $before . get_the_title() . $after;
            
            } elseif ( is_page() && $post->post_parent ) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
            
            } elseif ( is_search() ) {
            echo $before . 'Search Result "' . get_search_query() . '"' . $after;
            
            } elseif ( is_tag() ) {
            echo $before . 'Posts with the tag "' . single_tag_title('', false) . '"' . $after;

            } elseif ( is_404() ) {
            echo $before . 'Error 404' . $after;
            }
            
            if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo ': ' . __('Seite') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
            }
            
            echo '</nav>';
 } 
} 


function wpbeginner_numeric_posts_nav() {
    if( is_singular() )
        return;
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="pagination archive no_symbol"><ul class="d-flex flex-row">' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}


function publish_new_events($status, $ckf7_key, $submitted_data){
    /*The default behaviour is to save post to 'draft' status.  If you wish to change this, you can use this filter and return a valid post status: 'publish'|'draft'|'pending'|'trash'*/
    return 'publish';
}
add_filter( 'cf7_2_post_status_events', 'publish_new_events',10,3);
/**
* Function to change the post status of saved/submitted posts.
* @param string $status the post status, default is 'draft'.
* @param string $ckf7_key unique key to identify your form.
* @param array $submitted_data complete set of data submitted in the form as an array of field-name=>value pairs.
* @return string a valid post status ('publish'|'draft'|'pending'|'trash')
*/

/** Theme needs to support Featured Image / Thumbnails */
add_theme_support( 'post-thumbnails' );

?>
