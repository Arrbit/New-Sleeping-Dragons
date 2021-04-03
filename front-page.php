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

    <div>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logos/VectorRed_Transparent.png"
        id="frontpage--logo" class="position-absolute" alt="SDS-Logo">
    </div>

    <div class="redTriangle"></div>
    <div class="blackTriangle"></div>
    <div class="greyTriangle"></div>


    <div id="frontpage--nav-menu-container" class="flex-column">
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
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

<style>

    #frontpage--logo {
        width: 650px;
        height: 650px;
        transform: scaleX(-1);
        margin-top: 20vh;
        margin-left: -250px;
    }

    #frontpage--eyecatcher-container {
        max-width: 100vw;
        height: 100vh;
        position: relative;
        /* test color */
        background-color: white
    }

    #frontpage--nav-menu-container {
        transform: translate(50vw, 50vh);
        position: absolute;
    }

    #frontpage--nav-menu-container  li {
        list-style:none;
        padding-right:20px;
        position: relative;
        margin-bottom: 5px;
    }
    #frontpage--nav-menu-container  li a{
        flex: auto; 
        padding:5px;
        border: 0px solid #3E3E3E;
        border-radius: 5px;
        color: #8A0707;
        background-color: rgba(208, 208, 208, 0.7);
        text-align: center;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center
    }

    .greyTriangle {
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 55vh 50vw 55vh 0; /* Old Values : 575px 1400px 575px 0; */
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
        border-width: 40vw 20vh 0 40vh;
        border-color:  #8A0707 transparent transparent;
        position: absolute;
        top: 6%;
        right: calc(4% - 1vw);
    }

    .blackTriangle {
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 40vw 20vh 0 40vh;
        border-color: #3E3E3E transparent transparent;
        position: absolute;
        right: calc(3% - 1vw);
        max-width: 10vw;
    }

</style>