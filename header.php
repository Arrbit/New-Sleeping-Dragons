<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php wp_head(); ?>
</head>


<header class="wrap">
    <div class="links">

        <div class="title-container flexi color--black-accent">
        <?php echo get_bloginfo()?>
        </div>

        <div class="logo-container flexi">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logos/VectorRed_White.png"
                class="logo" alt="SDS-Logo">
        </div>

        <div class="nav-menu-container flexi flex-md-row flex-sm-column d-flex color--black-accent">
            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
        </div>
        
    </div>
</header>

<!-- This container class will be closed in the footer :) -->
<div class="container">

<style>
#menu-header{     /* Where is this used? */
    margin-top: auto;
    margin-bottom: auto;
}

.nav-menu-container  li {
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

/* Bootstrap SM Set-up */
@media (max-width: 865px) { 

    .nav-menu-container{
        margin-top: 2vh;
        transform: translate(-15vw, 2vh);
        font-size: 80%;
        overflow: hidden;
    }

    /*#menu-header > li {

    }*/

    .logo-container{
        margin-left: -80vw;
        transform: scaleX(-1);
        margin-top: -2vh;
    }

    .title-container{
        transform:translate(18vw,-1vh);
    }

    .wrap:before {
        content: '';
        position: absolute;
        top: 2vh;
        left: 20vw;
        border-top: 1.5px solid black;
        background: black;
        width: 60vw;
        transform: translateY(-50%);
    }
}

</style>