<?php
/**
 * Form_Events Page
 * Theme Name: New Sleeping Dragons
 * Template Name: Shows upcoming Events
*/?>

<?php get_header();?>
<div class="archive_title flex-row d-flex">
    <div class="archive_title_always font--righteous">
        <?php echo get_the_title();?>
    </div>
    <div class="optional"></div>
</div>

<div class="card_collection">
    <?php $inaweek = date("Y-m-d", time() + (60 * 60 * 24 * +7) ); ?>
    <?php $args = array(
            'orderby' => array(
                'date' => 'ASC',
                'hh-time' => 'ASC',
                'mm-time' => 'ASC'
            ),
            'post_type'        => 'events', // the post type 
            'post_status' => 'publish',
            'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
                'datecheck-bigger' =>array(
                'key' => 'date', // Check the start date field
                'value' => date("Y-m-d"), // Set today's date (note the similar format)
                'compare' => '>=', // Return the ones greater than today's date
                'type' => 'DATE' // Let WordPress know we're working with date
                ),
                'datecheck-smaller' =>array(
                'key' => 'date', 
                'value' => $inaweek, 
                'compare' => '<', 
                'type' => 'DATE' 
                ),
                'mm-time' =>array(
                    'key' => 'mm', 
                    'type' => 'numeric' 
                ),
                'hh-time' =>array(
                    'key' => 'hh', 
                    'type' => 'numeric' 
                ),
            ),
        );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <?php c_event_card();?>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>

    <?php
    $args = array(
        'orderby' => array(
            'date' => 'ASC',
            'hh-time' => 'ASC',
            'mm-time' => 'ASC'
        ),
        'post_type'        => 'events', // the post type 
        'post_status' => 'publish',
        'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
            array(
            'key' => 'date', // Check the start date field
            'value' => date("Y-m-d"), // Set today's date (note the similar format)
            'compare' => '>=', // Return the ones greater than today's date
            'type' => 'DATE' // Let WordPress know we're working with date
            ),
            array(
            'key' => 'date', // Check the start date field
            'value' => $inaweek, // Set today's date (note the similar format)
            'compare' => '>=', // Return the ones greater than today's date
            'type' => 'DATE' // Let WordPress know we're working with date
            ),
            'mm-time' =>array(
                'key' => 'mm', 
                'type' => 'numeric' 
            ),
            'hh-time' =>array(
                'key' => 'hh', 
                'type' => 'numeric' 
            ),
        ),
    );

    $loop = new WP_Query( $args );


    if( ($loop->have_posts())) { ?>
    <div class="next_weeks_events_card">

        <div class="archive_title flex-row d-flex">
            <div class="archive_title_always font--righteous">
            Next week and later!   
            </div>
            <div class="optional"></div>
        </div>
    <?php 
    }
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <?php c_event_card();?>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>

    </div> <!-- next_weeks_events_card -->
    <!-- card_collection -->
    <div class="widget_event_card member_card font--righteous">
        <div class="d-flex flex-column flex-lg-row card_collection" style="margin-bottom:20px">
            <?php if ( dynamic_sidebar('Event Navigation') ) : else : endif; ?>
        </div>
    </div>

<?php get_footer();?>

<style>
    .widget_event_card{
        max-width: 100% !important;
    }