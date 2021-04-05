<?php
/**
 * Frontpage
 * Theme Name: New Sleeping Dragons
 * Template Name: Frontpage
 */?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php wp_head(); ?>
</head>

<!-- Absolute Shapes -->
<div id="redTriangle"></div>
<div id="blackTriangle"></div>
<div id="triangleHider"></div>
<div id="greyTriangle"></div>

<div> <!-- Header div, without the container, do not close -->
    <div id="frontpage_eyecatcher" class="d-flex flex-nowrap flex-column flex-lg-row">

        <div class="logo align-self-center">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logos/VectorRed_Transparent.png" alt="SDS-Logo">
        </div>

        <div class="frontpage_center align-self-center flex-column d-flex"> 
            <h1 class="font--righteous frontpage-title">
                    <?php echo get_bloginfo()?>
            </h1>
            <div class="d-flex flex-row frontpage_menu  font--firasans">

                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
            </div>
        </div>  
    </div>
    
        <div class="frontpage_footer d-flex flex-column">
            <!-- <div id="eyecatcher-button-text" class="position-absolute font--firasans">A Phoenix-based FC.</div> -->
            <!-- <a class="position-absolute font--firasans" href="#">EXPLORE</a> -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
            <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
            </svg>
            <hr role="separator">
        </div>
    </div>


<?php get_footer();?>
