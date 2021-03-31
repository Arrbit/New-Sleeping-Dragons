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
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail(); ?>
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