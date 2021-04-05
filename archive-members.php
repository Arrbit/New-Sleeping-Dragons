<?php
/**
 * Lists all Members
 * Theme Name: New Sleeping Dragons
 * Template Name: Lists all Members
 */

wp_register_script( 'core-js', get_template_directory_uri() . '/js/core.js');
wp_enqueue_script( 'core-js' );

wp_localize_script( 'core-js', 'ajax_posts', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'noposts' => __('No older posts found'),
  ));	
  

?>
<?php get_header();?>
 
<div class="archive_title d-flex">
    <div class="archive_title_always font--righteous">
       Our Members
    </div>
    <div class="optional"></div>
</div>

<div id="ajax-posts" class="d-flex flex-row card_collection flex-wrap">
    <?php
    $postsPerPage = 9;
    $args = array(
            'post_type' => 'members',
            'post_status'=>'publish',
            'posts_per_page' => $postsPerPage,
    ); 
    $loop = new WP_Query($args);
    while ($loop->have_posts()) : $loop->the_post();?>

    <a class="member_card" href="<?php the_permalink();?>">
    <div class="card card_container flex-column d-flex">
        <div class="card_img member_card_img">
        <?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail('medium_large'); ?>
        <?php else : ?>
        <img sizes="(max-width: 768px) 100vw, 768px"  width="768" height="432"   loading="lazy" class="attachment-medium_large size-medium_large wp-post-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/404.png">
        <?php endif; ?>
        </div>

    <div class="card_title font--righteous">
    <?php the_title(); ?>
    </div>
    </div>
    </a>
    <?php endwhile; ?> 
    <?php wp_reset_postdata(); ?>
</div>
<?php get_footer();?>

<style>
footer{
    bottom: 0;
    position: sticky;
}
</style>