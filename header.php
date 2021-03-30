<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php wp_head(); ?>
</head>

<!-- This container class will be closed in the footer :) -->
<div class="container">

<header>
    <div class="p-2 d-flex" style="background-color: rgba(0, 0, 0, 0.2);">
    
        <div class="justify-content-start align-self-center color--black-accent">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("header") ) : endif; ?>
        </div>

        <div class="flex-fill justify-content-end align-self-center float-right">
            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
        </div>

    </div>
</header>

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