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


<div id="background-container">

    <div>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logos/VectorRed_Transparent.png" class="frontpage-logo position-absolute" alt="SDS-Logo">
    </div>

    <div class="greyTriangle"></div>


<?php get_footer();?>
<script>

jQuery(window).resize(function() {
    var el = jQuery(".greyTriangle");
    var w = el.width() / 4 | 0; // calculate & trim decimals
    el.css("border-width", "575px " + w + "px " + "575px 0 ");
  });

</script>

<style>

    .frontpage-logo {
        width: 650px;
        height: 650px;
        transform: scaleX(-1);
        margin-top: 20vh;
        margin-left: -250px;
    }

    #background-container {
        max-width: 100vw;
        height: 100vh;
        position: relative;
        /* test color */
        background-color: grey;
    }
    .greyTriangle {
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 575px 1400px 575px 0;
        border-color: transparent #D0D0D0 transparent;
        position: absolute;
        top: 0;
        right: 0;
        margin-top: -50px;
    }

    .redTriangle {
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 575px 1400px 575px 0;
        border-color: transparent #D0D0D0 transparent;
        position: absolute;
        top: 0;
        right: 0;
        margin-top: -50px;
    }

    .blackTriangle {
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 575px 1400px 575px 0;
        border-color: transparent #D0D0D0 transparent;
        position: absolute;
        top: 0;
        right: 0;
        margin-top: -50px;
    }

</style>