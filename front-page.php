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

    <div id="redTriangle"></div>
    <div id="blackTriangle"></div>
    <div id="greyTriangle"></div>
    <div id="vLine"></div>
    <div id="hLine"></div>

    <div id="eyecatcher--title-container" class="font--righteous">
        <div class="position-absolute">
            <?php echo get_bloginfo()?>
             <!--Sleeping<br>Dragons (alternative)-->
        </div>
    </div>

    <div id="frontpage--nav-menu-container" class="flex-row">
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </div>

    <div id="eyecatcher--button-container">
        <div id="eyecatcher-button-text" class="position-absolute">A Phoenix-based FC.</div>
        <a class="position-absolute" href="#">EXPLORE</a>
        <div id="lead-arrow-small"></div>
        <div id="lead-arrow-big"></div>
        <hr role="separator">
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
    /* Eyecatcher Container */
    #frontpage--eyecatcher-container {
        max-width: 100vw;
        height: 100vh;
        position: relative;
        /* test color */
        background-color: white
    }

    /* Logo */
    #frontpage--logo {
        width: 32vw;
        height: 55vh;
        transform: scaleX(-1);
        margin-top: 25vh;
        left:-15vw;
    }

    /* Title */
    #eyecatcher--title-container div{
        transform: translate(17vw, 30vh);
        font-size: 500%;
    }

    /* Nav Menu */
    #frontpage--nav-menu-container {
        position: absolute;
        transform: translate(25vw, 45vh);
    }
    #frontpage--nav-menu-container  li {
        list-style:none;
        padding-right:20px;
        position: relative;
        display: inline;
        margin-bottom: 5px;
        
    }
    #frontpage--nav-menu-container  li a{
        flex: auto; 
        padding: 10px 20px 10px 20px;
        border: 1px solid rgba(62, 62, 62, 0.4);
        border-radius: 3px;
        color: #8A0707;
        background-color: rgba(208, 208, 208, 0.7);
        text-align: center;
        text-decoration: none;
        align-items: center;
        justify-content: center;
    }

    /* Explore Button */
    #eyecatcher-button-text {
        transform: translate(calc(50vw - 62px),calc(90vh - 25px));
    }
    #eyecatcher--button-container a{
        flex: auto; 
        padding:7px 20px 7px 20px;
        border: 1px solid rgba(62, 62, 62, 1);
        border-radius: 5px;
        color: rgba(62, 62, 62, 1);
        background-color: rgba(208, 208, 208, 0.7);
        text-align: center;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        transform: translate(calc(50vw - 45px), 90vh);
    }
    #lead-arrow-big {
        border: solid rgba(62, 62, 62, 1);
        border-width: 0 3px 3px 0;
        position: absolute;
        padding: 6px;
        transform: translate(calc(50vw + 3px), calc(90vh + 42px)) rotate(45deg);
    }
    #lead-arrow-small {
        border: solid rgba(62, 62, 62, 1);
        border-width: 0 3px 3px 0;
        position: absolute;
        padding: 3px;
        transform: translate(calc(50vw + 5.5px), calc(90vh + 40px)) rotate(45deg);
    }
    #eyecatcher--button-container hr{
        transform: translate(25vw, calc(90vh + 45px));
        position: absolute;
        width: 50%;
    }

    /* Shapes */
    #greyTriangle {
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 50vh 35vw 50vh 0; /* Old Values : 575px 1400px 575px 0; */
        border-color: transparent #D0D0D0 transparent;
        position: absolute;
        top: 0;
        right: 0;
        margin-top: -50px;
    }
    #redTriangle {
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 40vw 15vh 0 40vh;
        border-color:  #8A0707 transparent transparent;
        position: absolute;
        top: 6%;
        right: calc(4% - 1vw);
    }
    #blackTriangle {
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 40vw 15vh 0 40vh;
        border-color: #3E3E3E transparent transparent;
        position: absolute;
        right: calc(3% - 1vw);
        max-width: 10vw;
    }
    /* #vLine{
        border-left: 3px solid #3E3E3E;
        height: 38vh;
        position: absolute;
        top: 28vh;
        right: 20vw;
    }
    #hLine{
        border-top: 3px solid #3E3E3E;
        width: 20vw;
        position: absolute;
        top: 45vh;
        right:8vw;
    } */

</style>