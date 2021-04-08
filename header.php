<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<!-- SM Header-->
<header class="d-flex d-md-none appbar">
    <a href="/"><img class="appbar_mobile_button"
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logos/VectorRed_White.png" class="logo"
            alt="SDS-Logo"></a>

    <div class="nav-menu-container appbar_menu font--firasans">
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </div>
</header>

<!-- MD Header-->
<header class="wrap d-md-flex d-none">

    <div class="title-container flexible font--righteous">
        <a href="/"><?php echo get_bloginfo()?></a>
    </div>

    <div class="logo-container">
        <a href="/">
            <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logos/VectorRed_White.png"alt="SDS-Logo">
        </a>
    </div>

    <div class="nav-menu-container flexible font--firasans">
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </div>
</header>

<!-- This container class will be closed in the footer :) -->
<div class="container">

<style>
/* Color */
a {
    color: #3e3e3e;
    text-decoration: none;
}

a:hover {
    color: black;
}

/* -----------SM Setup----------- */
/* Appbar */
.appbar_menu ul {
    display: flex;
    flex-wrap: wrap;
    height: inherit;
    padding: 5px;
    line-height: 2em;
}

.appbar_menu li {
    padding-right: 5px !important;
}

.appbar_menu a {
    display: flex;
    padding: 5px;
    border: 1px solid #D0D0D0;
}

/* SM Logo (Clickable) */
.appbar_mobile_button {
    width: auto;
    min-height: 40px;
    max-height: 110px;
}

/* -----------MD Setup----------- */
/* Big DIVs */
.wrap {
    position: relative;
    text-align: center;
    margin: 20px;
}

.flexible {
    flex: 1 1 0px;
}
/* Nav Menu */
.nav-menu-container {
    margin:auto;
    padding-bottom: 0.25em;
    font-size:1.3em;
}

.nav-menu-container li {
    display: inline;
    padding-right: 20px;
}

@media (min-width: 768px) {

    /* Logo */
    .logo-container {
        position: relative;
    }

    .logo {
        height: 110px;
    }

    /* Title */
    .title-container {
        font-size: 2em;
        margin:auto;
        padding-bottom: 1em;
    }

    /* Horizontal Line */
    .wrap:before {
        position: absolute;
        transform: translateY(-50%);
        content: '';
        top: 50%;
        border-top: 1px solid black;
        background: black;
        width: 100%;
    }

}

</style>