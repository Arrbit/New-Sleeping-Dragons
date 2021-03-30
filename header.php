<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php wp_head(); ?>
</head>

<header>
    <div class="p-2 d-flex" style="background-color: rgba(0, 0, 0, 0);">
    
        <div class="flex-fill justify-content-start align-self-center color--black-accent">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("header") ) : endif; ?>
        </div>
       
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logos/VectorRed_White.png"
            width="100px"
            height="100px"
            class="rounded img-fluid float-start"
            alt="SDS-Logo">
       
        <div class="justify-content-end align-self-center color--black-accent">
            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
        </div>

    </div>
</header>

<!-- This container class will be closed in the footer :) -->
<div class="container">

<style>
#menu-header{
    margin-top: auto;
    margin-bottom: auto;
}
#menu-header > li {
list-style:none;
display: inline;
padding-right:20px;
}

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
</style>