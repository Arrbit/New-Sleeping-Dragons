<?php
/**
 * Index Page
 * Theme Name: New Sleeping Dragons
 * Template Name: Default Page
 */?>

<?php get_header();?>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();?>

    <?php if ( has_post_thumbnail() ) : ?>
        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
        <a href="<?php echo $url ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail("large"); ?>
        </a>
    <?php endif; ?>

    <?php the_content();?>

<?php 
    }
}?>
<?php get_footer();?>

<style>
img:hover {
    transform: none;
    -moz-transform: none;
    -o-transform: none;
    -webkit-transform: none;
}
</style>