<?php
/**
 * Lists all Letters
 * Theme Name: New Sleeping Dragons
 * Template Name: Lists all Letters
 */?>
 <?php get_header();?>
<div class="archive_title flex-row d-flex">
    <div class="archive_title_always font--righteous">
        <?php post_type_archive_title();?>
    </div>
    <div class="optional"></div>
</div>
<div class="card_collection">
<?php 
        $wpb_all_query = new WP_Query(array(
        'post_type'=>'letters',
        'post_status'=>'publish',
        'posts_per_page'=>-1));?>
        <?php if ( $wpb_all_query->have_posts() ) : ?>
            <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>


            <a class="d-flex" href="<?php the_permalink();?>">
            <div class="card card_container flex-sm-column flex-md-row d-flex">
                <div class="card_img">
                <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('medium_large'); ?>
                    <?php else : ?>
                        <img sizes="(max-width: 768px) 100vw, 768px"  width="768" height="432"   loading="lazy" 
                         class="attachment-medium_large size-medium_large wp-post-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/404.png">
                    <?php endif; ?>
                </div>
                    
                <div class="card_content">
                    <div class="card_title font--righteous">
                            <?php the_title(); ?>
                    </div>
                    <?php echo get_the_excerpt(); ?>
                </div>
            </div>
            </a>


            <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

        <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria. :(' ); ?></p>
        <?php endif; ?>
</div>
<?php get_footer();?>
