<?php
/**
 * Lists all Letters
 * Theme Name: New Sleeping Dragons
 * Template Name: Lists all Letters
 */?>
 <?php get_header();?>
<div class="archive_title flex-row d-flex">
    <div class="always">
        <?php echo get_the_title();?>
    </div>
    <div class="optional"></div>
</div>
<div class="card_collection">
<?php 
        $wpb_all_query = new WP_Query(array(
        'post_type'=>'letters',
        'post_status'=>'publish',
        'posts_per_page'=>5));?>
        <?php if ( $wpb_all_query->have_posts() ) : ?>
            <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>


            <a href="<?php the_permalink();?>">
            <div class="card card_container flex-row d-flex">
            <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('medium_large'); ?>
                    <?php else : ?>
                        <img sizes="(max-width: 768px) 100vw, 768px"  width="768" height="432"   loading="lazy" 
                         class="attachment-medium_large size-medium_large wp-post-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/404.png">
                    <?php endif; ?>
                    
                <div class="card_content">
                    <div class="card_title">
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

<style>
.card_collection{
    padding-bottom:10px;
}
.archive_title{
    padding-bottom:5px;
    margin-left: -20px;
}
.always{
    border-bottom: solid 3px #8A0707;
    font-size: 2em;
    font-family: "Righteous";
}

.optional{
    border-bottom: solid 3px #8A0707;
    width:5vw;
}

.card_content{
    padding-left: 10px;
}


.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  border-radius: 5px; 
  margin-bottom: 10px;
}

img {
  border-radius: 5px 5px 0 0;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.card_container {
  padding-right: 16px;
}
</style>