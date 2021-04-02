<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php wp_head(); ?>
</head>


<header class="wrap">
    <div class="links">

        <div class="title-container flexi font--righteous">
        <?php echo get_bloginfo()?>
        </div>

        <div class="logo-container flexi">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logos/VectorRed_White.png"
                class="logo" alt="SDS-Logo">
        </div>

        <div class="nav-menu-container flexi flex-md-row flex-sm-column d-flex d-md-flex d-none">
            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
        </div>

        <div class="mobile-menu-container flex-row justify-content-between d-md-none w-100">
                <ul>
                    <li class="flex-fill rounded"><a href="/?page_id=29">Events</a></li>
                    <li class="flex-fill rounded"><a href="/?page_id=30">Letters</a></li>
                    <li class="flex-fill rounded"><a href="/?page_id=31">Members</a></li>
                    <li class="flex-fill rounded"><a href="/?page_id=32">Guides</a></li>
                    <li class="flex-fill rounded"><a href="https://discord.gg/">Discord</a></li>
                </ul>
        </div>
        
    </div>
</header>

<!-- This container class will be closed in the footer :) -->
<div class="container">

<style>

/* Big DIVs */
.wrap {
  text-align: center;
  margin: 20px;
  position: relative;
}
.links {
  padding: 0 10px;
  display: flex;
  justify-content: space-between;
  position: relative;
}

.flexi {
    flex: 1 1 0px;
}

/* Smaller than SM Set-up */

/* Nav Menu */
.mobile-menu-container {
    position:absolute;
    max-width: 100%;
    margin: auto;
}

.mobile-menu-container li {
    list-style:none;
    display: inline-flex;
    color: black;
    background-color: rgba(208, 208, 208, 0.5);
    position:relative;
    margin-bottom: 1%;
    border-style: solid;
    border-width: 1px;
    border-color: #3e3e3e;
    padding: 3%;
}

/* Title */
.title-container{
    padding-left: 35%;
    padding-right: 35%;
    padding-top: 100px;
    margin-bottom: 1%;
    position:relative;
    display: inline-flex;
    font-size: 125%;
}

/* Logo */
.logo-container{
    right: 0;
    position: absolute;
    opacity: 80%;
    padding-top: 60px;
    transform: scale(0.8);
}

.logo{
    width:5;
    height:110px;
}

/* Color */
.color--black-accent{
    color: #3e3e3e;
}

a {
    color: #3e3e3e;
    text-decoration: none;
}

a:hover {
    color: black;
    text-decoration: none;
}

/* Bigger than SM Set-up */

/* Nav Menu */
.nav-menu-container  li {
    list-style:none;
    display: inline;
    padding-right:20px;
}

@media (min-width: 768px) { 
    /* Logo */
    .logo-container{
        position: relative;
        opacity: 100%;
        margin-top: 0;
        padding: 0;
    }
    /* Title */
    .title-container{
        position: relative;
        transform: translate(0,0);
        font-size: 150%;
        padding: 0;
        left:0;
        margin: 0;
    }

    /* Horizontal Line */
    .wrap:before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        border-top: 1px solid black;
        background: black;
        width: 100%;
        transform: translateY(-50%);
    }
    
}
</style>