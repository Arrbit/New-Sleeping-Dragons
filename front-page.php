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

    <!-- <div id="eyecatcher--title-container" class="font--righteous">
        <div class="position-absolute">
            <?php echo get_bloginfo()?>
             Sleeping<br>Dragons (alternative)
        </div>
    </div> -->

    <div id="frontpage--nav-menu-container" class="flex-column">
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </div>

    <!-- <div id="eyecatcher--button-container">
        <div id="eyecatcher-button-text" class="position-absolute">A Phoenix-based FC.</div>
        <a class="position-absolute" href="#">EXPLORE</a>
    </div>  -->

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
        width: 30vw;
        height: 50vh;
        transform: scaleX(-1);
        margin-top: 25vh;
        left:-15vw;
    }

    /* Title */
    #eyecatcher--title-container{
        transform: translate(18vw, 30vh);
        font-size: 500%;
    }

    /* Nav Menu */
    #frontpage--nav-menu-container {
        transform: translate(69vw, 52vh);
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
        border: 1px solid rgba(62, 62, 62, 0.4);
        border-radius: 3px;
        color: #8A0707;
        background-color: rgba(208, 208, 208, 0.7);
        text-align: center;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Explore Button */
    #eyecatcher--button-container{
        transform: translate(calc(50vw - 45px), 70vh);
    }
    #eyecatcher-button-text {
        transform: translate(-15px, -25px);
    }
    #eyecatcher--button-container a{
        flex: auto; 
        padding:7px 20px 7px 20px;
        border: 2px solid rgba(62, 62, 62, 1);
        border-radius: 5px;
        color: rgba(62, 62, 62, 1);
        background-color: rgba(208, 208, 208, 0.7);
        text-align: center;
        text-decoration: none;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Shapes */
    #greyTriangle {
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
    #redTriangle {
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 40vw 20vh 0 40vh;
        border-color:  #8A0707 transparent transparent;
        position: absolute;
        top: 6%;
        right: calc(4% - 1vw);
    }
    #blackTriangle {
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 40vw 20vh 0 40vh;
        border-color: #3E3E3E transparent transparent;
        position: absolute;
        right: calc(3% - 1vw);
        max-width: 10vw;
    }
    #vLine{
        border-left: 3px solid #3E3E3E;
        height: 50%;
        position: absolute;
        top: 20vh;
        right: 23vw;
    }
    #hLine{
        border-top: 3px solid #3E3E3E;
        width: 30%;
        position: absolute;
        top: 50vh;
        right: 5vw;
    }

</style>