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
            'compare' => '<', // Return the ones greater than today's date
            'type' => 'DATE' // Let WordPress know we're working with date
            )
        ),
    );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>


    <a class="d-flex" href="<?php the_permalink();?>">
        <div class="card card_container flex-sm-column flex-md-row d-flex">
            <div class="card_img">
            <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail('medium_large'); ?>
                <?php else : ?>
                    <img sizes="(max-width: 768px) 100vw, 768px"  width="768" height="432"   loading="lazy" 
                        class="attachment-medium_large size-medium_large wp-post-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/404.png">
                <?php endif; ?>
            </div>
                
            <div class="card_content">
                <div class="card_title font--righteous">
                        <?php the_title(); ?>        
                </div>
                <div class="card_time">
                    <?php echo get_post_meta(get_the_ID(), 'hh', TRUE); ?>:<?php echo get_post_meta(get_the_ID(), 'mm', TRUE); ?>ST on <?php echo date('l', strtotime(get_post_meta(get_the_ID(), 'date', TRUE))); ?> <?php echo date('d/m/Y',strtotime(get_post_meta(get_the_ID(), 'date', TRUE))); ?>
                </div>
                    <?php echo get_the_excerpt(); ?>
            </div>
        </div>
    </a>
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
<div class="archive_title flex-row d-flex">
    <div class="archive_title_always font--righteous">
    Next week and later!   
    </div>
    <div class="optional"></div>
</div>

<div class="next_weeks_events_card">
<?php }

while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <a class="d-flex" href="<?php the_permalink();?>">
        <div class="card card_container flex-sm-column flex-md-row d-flex">
            <div class="card_img">
            <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail('medium_large'); ?>
                <?php else : ?>
                    <img sizes="(max-width: 768px) 100vw, 768px"  width="768" height="432"   loading="lazy" 
                        class="attachment-medium_large size-medium_large wp-post-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/404.png">
                <?php endif; ?>
            </div>
                
            <div class="card_content">
                <div class="card_title font--righteous">
                        <?php the_title(); ?>        
                </div>
                <div class="card_time">
                    <?php echo get_post_meta(get_the_ID(), 'hh', TRUE); ?>:<?php echo get_post_meta(get_the_ID(), 'mm', TRUE); ?>ST on <?php echo date('l', strtotime(get_post_meta(get_the_ID(), 'date', TRUE))); ?> <?php echo date('d/m/Y',strtotime(get_post_meta(get_the_ID(), 'date', TRUE))); ?>
                </div>
                    <?php echo get_the_excerpt(); ?>
            </div>
        </div>
    </a>


<?php endwhile; ?>

    </div> <!-- next_weeks_events_card -->
</div> <!-- card_collection -->

<?php get_footer();?>
