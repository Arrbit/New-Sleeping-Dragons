<?php
/**
 * Attachment
 * Theme Name: New Sleeping Dragons
 */?>

<?php get_header();?>

<div class="entry-attachment">
       <?php $image_size = apply_filters( 'wporg_attachment_size', 'xxl' ); 
             echo wp_get_attachment_image( get_the_ID(), $image_size ); ?>
  
           <?php if ( has_excerpt() ) : ?>
        
           <div class="entry-caption">
                 <?php the_excerpt(); ?>
           </div><!-- .entry-caption -->
       <?php endif; ?>
       
</div><!-- .entry-attachment -->

<div class="return_to_page d-flex">
<a type="button" class="btn btn-outline-dark"  href="<?php echo get_permalink($post->post_parent); ?>">back to page</a>
</div>

<?php get_footer();?>

<style>
.return_to_page a{
    margin:auto;
    flex-grow:1;
    max-width:50vw;
    margin-top:10px;
    border-color: #3e3e3e !important;
}
.return_to_page a:focus{


box-shadow:#a9929280 2px 2px 2px 2px!important;
}


.return_to_page a:hover{
    background-color: rgba(0, 0, 0, 0.2);
    color: #3e3e3e;
}
img{
    margin-left: auto;
    margin-right: auto;
    display: block;
}

img:hover {
    transform: none;
    -moz-transform: none;
    -o-transform: none;
    -webkit-transform: none;
}
</style>