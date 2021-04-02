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
            <div class="mobile-menu-wrapper">
                <ul>
                    <li class="flex-fill p-3 border">Events</li>
                    <li class="flex-fill p-3 border">Letters</li>
                    <li class="flex-fill p-3 border">Members</li>
                    <li class="flex-fill p-3 border">Guides</li>
                    <li class="flex-fill p-3 border">Discord</li>
                </ul>
            </div>
        </div>
        
    </div>
</header>

<!-- This container class will be closed in the footer :) -->
<div class="container">

<style>
#menu-header{     /* Where is this used? */
    margin-top: 5;
    margin-bottom: 5;
}

.nav-menu-container  li {
    list-style:none;
    display: inline;
    padding-right:20px;
}

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
}

.flexi{
    flex: 1 1 0px;
}

.logo{
    width:5;
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
@media (max-width: 768px) { 

    /*.nav-menu-container{
        margin-top: 2vh;
        transform: translate(-15vw, 2vh);
        font-size: 80%;
        overflow: hidden;
    }*/

    .logo-container{
        position: absolute;
        right: 0;
        margin-top: -2vh;
        opacity: 80%;
    }

    .title-container{
        position: relative;
        transform:translate(20vw,10vh);
    }

    .wrap:before {
        content: '';
        position: absolute;
        display: none;
        top: 2vh;
        left: 20vw;
        border-top: 1.5px solid black;
        background: black;
        width: 60vw;
        transform: translateY(-50%);
    }
}
</style>