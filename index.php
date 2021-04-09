<?php
/**
 * Index Page
 * Theme Name: New Sleeping Dragons
 * Template Name: Default Page
 */?>

<?php get_header();?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post();?><!-- loop just for pagination-->

<div class="card card_container slight-shadow flex-column d-flex super-round">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="card_img member_card_img">
        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
        <a target="_blank" href="<?php echo $url ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail("large"); ?>
        </a>
        </div>
    <?php endif; ?>

    <div class="index_content">
        <div class="card_title font--righteous">
            <?php the_title(); ?>
        </div>
        <?php the_content();?>
        <?php render_pagination();  ?>
    </div>
</div>

<?php endwhile; ?>

<?php get_footer();?>

<style>
img{
    height: auto;
}
.super-round{
    border-radius:1em;
}
.index_content{
padding: 2em;
}
.card_title{
    margin-bottom:1em;
}
figure{
    margin:auto;
    padding-top:1em;
}

figcaption{
    font-size: 0.9em;
    margin:auto;
    padding-left: 1em;
}
</style>