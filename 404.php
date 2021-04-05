<?php
/**
 * The template for displaying 404 pages (Not Found)
 * Theme Name: New Sleeping Dragons
 */ ?>
<?php get_header();?>

<div class="card card_container flex-column d-flex super-round">
<div class="card_img member_card_img">
<img sizes="(max-width: 768px) 100vw, 768px"  width="768" height="432"   loading="lazy" 
                         class="attachment-medium_large size-medium_large wp-post-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/404.png">
                         </div>

    <div class="index_content">
        <div class="card_title font--righteous">
        Error 404 Not Found
        </div>
        You are lost. We also do not know how you got here, so please go on our discord and complain. Thank you :D

        <div>
            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
        </div>
    </div>
</div>


<?php get_footer();?>