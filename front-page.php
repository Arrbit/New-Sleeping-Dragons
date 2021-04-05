<?php
/**
 * Frontpage
 * Theme Name: New Sleeping Dragons
 * Template Name: Frontpage
 */?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php wp_head(); ?>
</head>

<!-- Absolute Shapes -->
<div id="redTriangle"></div>
<div id="blackTriangle"></div>
<div id="triangleHider"></div>
<div id="greyTriangle"></div>

<div> <!-- Header div, without the container, do not close -->
    <div id="frontpage_eyecatcher" class="d-flex flex-nowrap flex-column flex-lg-row">

        <div class="logo align-self-center">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logos/VectorRed_Transparent.png" alt="SDS-Logo">
        </div>

        <div class="frontpage_center align-self-center flex-column d-flex"> 
            <h1 class="font--righteous frontpage-title">
                    <?php echo get_bloginfo()?>
            </h1>
            <div class="d-flex flex-row frontpage_menu  font--firasans">

                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
            </div>
        </div>  
    </div>
    
        <div class="frontpage_footer d-flex flex-column">
            <!-- <div id="eyecatcher-button-text" class="position-absolute font--firasans">A Phoenix-based FC.</div> -->
            <!-- <a class="position-absolute font--firasans" href="#">EXPLORE</a> -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down updown" viewBox="0 0 16 16">
            <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
            </svg>
            <hr role="separator">
        </div>
    </div>


 <!-- If there is no event, dont display this, you need to check for 2 null querys >:( -->
 <div class="card_collection">


    <?php
$args = array(
    'meta_key'          => 'date',
    'orderby'           => 'meta_value',
    'order'             => 'ASC',
    'post_type'        => 'form_events', // the post type 
    'post_status' => 'publish',
    'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
        array(
            'key' => 'date', // Check the start date field
            'value' => date("Y-m-d"), // Set today's date (note the similar format)
            'compare' => '==', // Return the ones greater than today's date
            'type' => 'DATE' // Let WordPress know we're working with date
        )
    ),
);

$loop = new WP_Query( $args );

if( ($loop->have_posts())) { ?>  
  <h3 class="our_events_today"> Our Events today: </h3> 
  <?php
}  ## This checks if the query above is empty or not :)

while ( $loop->have_posts() ) : $loop->the_post(); ?>

<div class="card card_container flex-column d-flex super-round">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="card_img member_card_img">
        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
        <a target="_blank" href="<?php echo $url ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail("large"); ?>
        </a>
        </div>
    <?php endif; ?>

    <div class="index_content">
        <div class="card_title event_title font--righteous">
            <?php the_title(); ?>
        </div>
        <div class="card_time">
            <?php echo get_post_meta(get_the_ID(), 'hh', TRUE); ?>:<?php echo get_post_meta(get_the_ID(), 'mm', TRUE); ?>ST on <?php echo date('l', strtotime(get_post_meta(get_the_ID(), 'date', TRUE))); ?> <?php echo date('d.m.Y',strtotime(get_post_meta(get_the_ID(), 'date', TRUE))); ?>
        </div>
        <?php the_content();?>
        <div class="event_author"> by <?php echo get_post_meta(get_the_ID(), 'your_name', TRUE);?> </div>
    </div>
</div>

            
                
<?php endwhile; ?>
<?php wp_reset_query(); ?>

<!-- Add addtional query if above if null for the next event -->



</div>


<?php get_footer();?>


<style>
.card_collection{
    max-width:500px;
}
</style>