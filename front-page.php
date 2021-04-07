<?php
/**
 * Frontpage
 * Theme Name: New Sleeping Dragons
 * Template Name: Frontpage
 */?>
<?php include_once "php/frontpage_functions.php";?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<?php custom_frontpage_shapes(); ?>

<div> <!-- Header div, without the container, do not close -->
    <div id="frontpage_eyecatcher" class="d-flex flex-nowrap flex-column flex-lg-row">

        <div class="logo align-self-center">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logos/VectorRed_Transparent.png"
                alt="SDS-Logo">
        </div>

        <div class="frontpage_center align-self-center flex-column d-flex">
            <h1 class="font--righteous frontpage-title">
                <?php echo get_bloginfo()?>
            </h1>
            
            <div class="d-flex flex-row frontpage_menu  font--firasans">

                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
            </div>

            <div class="frontpage_card_collection card_collection">
                <?php custom_frontpage_event_query(); ?>
            </div>
        </div>
    </div>

    <div class="frontpage_footer d-flex flex-column">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down updown"
            viewBox="0 0 16 16">
            <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z" />
        </svg>
        <hr role="separator">
    </div>

    <div class="frontpage_content container" style="margin-top: 50px;">


        <!-- <div> FC Picture Clickable
        </div>

        <div> Widget
        </div> -->

        <div class="fp_new_collection">

            <!-- <div> Newest Letter 
            </div>  -->

            <div>
            <?php custom_frontpage_member_query(); ?>
            </div> 
        </div>
            
        <div class="fp_content"> 
            <?php echo get_the_content(); ?>
        </div> 

    </div>

<?php get_footer();?>