<?php get_header();?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post();?><!-- loop just for pagination-->
<div class="card card_container flex-column d-flex super-round">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="card_img member_card_img top-round">
        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
        <a target="_blank" href="<?php echo $url ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail("large"); ?>
        </a>
        </div>
    <?php endif; ?>

    <div class="index_content">
        <div class="card_title event_title font--righteous">
            <?php the_title(); ?>
        </div>
        <?php the_content();?>

        
    </div>
</div>
<div class="pagination_single">
    <div class="next">
    <?php next_post_link('%link');?>
    </div>

    <div class="center">
    <?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>
    </div>


    <div class="previous">
    <?php previous_post_link('%link');?>
    </div>
</div>
<?php endwhile; ?>

<?php get_footer();?>