<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php wp_head(); ?>
</head>

<!-- SM Header-->
<header id="sm-header" class="d-flex d-md-none appbar">
    <a href="/"><img class="appbar_mobile_button" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logos/VectorRed_White.png" class="logo" alt="SDS-Logo"></a>

    <div class="nav-menu-container appbar_menu">
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </div>
</header>

<!-- MD Header-->
<header id="md_header" class="wrap d-md-flex d-none">

        <div class="title-container flexi font--righteous">
        <a href="/"><?php echo get_bloginfo()?></a>
        </div>

        <div class="logo-container flexi">
        <a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logos/VectorRed_White.png"
                class="logo" alt="SDS-Logo"></a>
        </div>

        <div class="nav-menu-container flexi">
            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
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

.flexi {
    flex: 1 1 0px;
}
/* -----------SM Setup----------- */
/* Appbar */
.appbar_menu ul{
    height:inherit;
    padding:5px;
    display: flex;
    flex-wrap:wrap;
    line-height:2em;
}
.appbar_menu li{
    flex: 1 1 0px;
    padding-right: unset !important;

}
.appbar a{
    flex: auto; 
    padding:5px;
    border: 1px solid #D0D0D0;
    text-align: center;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center

}
.appbar{
    max-height:12vh;
}
.appbar_mobile_button{
    width:auto;
    min-height:40px;
    max-height: inherit;
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

/* -----------MD Setup----------- */
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