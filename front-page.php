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

<div>
<!-- Closes in Footer -->

<div id="frontpage--eyecatcher-container">

    <div class="flex-logo">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logos/VectorRed_Transparent.png"
        id="frontpage--logo" class="position-absolute" alt="SDS-Logo">
    </div>

    <div class="flex-menu">
        <div id="eyecatcher--title-container" class="font--righteous">
            <div class="position-absolute">
                <?php echo get_bloginfo()?>
            </div>
        </div>

        <div id="frontpage--nav-menu-container" class="flex-row font--firasans">
            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
        </div>

        <div id="eyecatcher--button-container">
            <div id="eyecatcher-button-text" class="position-absolute font--firasans">A Phoenix-based FC.</div>
            <a class="position-absolute font--firasans" href="#">EXPLORE</a>
            <div id="lead-arrow-small"></div>
            <div id="lead-arrow-big"></div>
            <hr role="separator">
        </div>
    </div>

    <div class="flex-shapes">
        <div id="redTriangle"></div>
        <div id="blackTriangle"></div>
        <div id="triangleHider"></div>
        <div id="greyTriangle"></div>
    </div>

</div>


<?php get_footer();?>

<!-- <script>
var el = jQuery(".greyTriangle");
var w = screen.width / 4 | 0; // calculate & trim decimals
el.css("border-width", "575px " + w + "px " + "575px 0 ");


window.addEventListener('resize', change);
function change(){
    var w = screen.width / 4 | 0; // calculate & trim decimals
    el.css("border-width", "575px " + w + "px " + "575px 0 ");
};
</script> -->