<?php
/**
 * Lists all Letters
 * Theme Name: New Sleeping Dragons
 * Template Name: Lists all events
 */?>
 <?php get_header();?>
<?php 
        $wpb_all_query = new WP_Query(array(
        'post_type'=>'events',
        'post_status'=>'publish',
        'posts_per_page'=>5));?>
        <?php if ( $wpb_all_query->have_posts() ) : ?>
            <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                <a href="<?php the_permalink();?>">
                    <?php the_title(); ?>
                </a>
            <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

        <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria. :(' ); ?></p>
        <?php endif; ?>

<?php get_footer();?>
