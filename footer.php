</div>
<!--closing of the container -->

<footer>
<div class="footer_container">
    <div class="low-zindex footer_triangles">
            <div id="footerRedTriangle"></div>
    </div>
    <div class="d-flex background-color--silver-accent font--firasans d-flex flex-column flex-lg-row">
        <div class="p-2 flex-fill high-zindex">
            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
        </div>
        <div class="p-2 flex-fill high-zindex">
            <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
        </div>
        <div class="p-2 flex-fill high-zindex">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer") ) : endif; ?>
        </div>
        <div class="flex-fill">
        </div>
    </div>
</div>
</footer>
<?php wp_footer();?>

<style>
.footer_container{
    overflow:hidden;
}
.footer_triangles{
    position:relative;
}

#menu-footer{
    margin-top: auto;
    margin-bottom: 10px;
}
li {
    display: inline;
    list-style:none;
    padding-right:20px;
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
.footer{
    text-align: left;
    width:250px;
    padding-left:2rem;
}

#footerRedTriangle {
    position: absolute;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 50px 0 250px 400px;
    border-color: transparent transparent #8A0707 transparent;
    right: 0;
}

@media (min-width:992px) {
    #menu-footer{
    margin-top: auto;
    margin-bottom: auto;
    }
    li {
    display: block;
    list-style:none;
    padding-right:20px;
    }
    .footer{
        text-align: center;
        padding-left: 0rem;
    }
    #footerRedTriangle { 
        border-width: 10px 0 300px 800px; 
    }
}

@media (max-width:425px) {
    #footerRedTriangle { 
        border-width: 180px 0 120px 600px; 
    }
}

</style>