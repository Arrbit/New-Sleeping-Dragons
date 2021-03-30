<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php wp_head(); ?>
</head>


<header class="wrap">
    <div class="links">
    <div class="flexi color--black-accent">
    <?php echo get_bloginfo()?>
    </div>

    <div class="flexi color--black-accent">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logos/VectorRed_White.png"
            class="logo" alt="SDS-Logo">
    </div>

    <div class="flexi color--black-accent">
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </div>
</header>

<!-- This container class will be closed in the footer :) -->
<div class="container">

<style>
#menu-header-menu{
    margin-top: auto;
    margin-bottom: auto;
}
#menu-header-menu > li {
    list-style:none;
    display: inline;
    padding-right:20px;
}

.flexi{
    flex: 1 1 0px;
}

.logo{
    width:auto;
    height:110px;
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

</style>