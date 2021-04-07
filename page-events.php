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
            'meta_key'          => 'date',
            'orderby' => array(
                'meta_query' => 'ASC',
                'time-hh' => 'ASC',
                'time-mm' => 'ASC',
            ),
            'order'             => 'DESC',
            'post_type'        => 'form_events', // the post type 
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
                'time-hh' =>array(
                'key' => 'hh', 
                ),
                'time-mm' =>array(
                'key' => 'mm', 
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
        'meta_key'          => 'date',
        'orderby'           => 'meta_value',
        'order'             => 'ASC',
        'post_type'        => 'form_events', // the post type 
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
            )
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
</div> <!-- card_collection -->

<?php get_footer();?>
