<?php
/**
 * Lists all Events
 * Theme Name: New Sleeping Dragons
 * Template Name: Lists all Form_Events
 */?>
 <?php get_header();?>
<div class="archive_title flex-row d-flex">
    <div class="archive_title_always font--righteous">
        <?php echo get_the_title();?>
    </div>
    <div class="optional"></div>
</div>
<div class="card_collection">
<?php 
        $wpb_all_query = new WP_Query(array(
        'post_type'=>'form_events',
        'post_status'=>'publish',
        'posts_per_page'=>5));?>
        <?php if ( $wpb_all_query->have_posts() ) : ?>
            <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>

           <?php c_event_card(); ?>


            <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

        <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria. :(' ); ?></p>
        <?php endif; ?>
</div>
<?php get_footer();?>
