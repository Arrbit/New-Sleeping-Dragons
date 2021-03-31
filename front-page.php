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

    <div class="testSquare"></div>


<?php get_footer();?>

<style>

    .frontpage-logo {
        width: 650px;
        height: 650px;
        transform: scaleX(-1);
        margin-top: 20vh;
        margin-left: -250px;
    }

    #background-container {
        width: 100%;
        height: 100%;
        position: relative;
        /* test color */
        background-color: red;
    }
    .testSquare {
        width:100px;
        height:100px;
        color:white;
        background-color:black;
        
    }

</style>