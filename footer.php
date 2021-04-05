</div>
<!--closing of the container -->

<footer>
    <div class="p-2 d-flex background-color--silver-accent">
        <div class="flex-fill justify-content-start align-self-center">
            <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
        </div>

        <div class="justify-content-end align-self-center color--black-accent">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer") ) : endif; ?>
        </div>
    </div>
</footer>
<?php wp_footer();?>

<style>
#menu-footer{
    margin-top: auto;
    margin-bottom: auto;
}
#menu-footer > li {
    list-style:none;
    display: inline;
    padding-right:20px;
}

.color--black-accent{
    color: #3e3e3e;

}

.background-color--silver-accent{
    background-color: #D0D0D0;
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