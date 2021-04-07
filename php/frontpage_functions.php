<?php

    function custom_frontpage_event_exist($loop){
        if( ($loop->have_posts()) ) {   // Do we have a post, in our loop?
            ?> Event <?php
            }
    }


    function custom_frontpage_event_query(){ //Checks for Events, and takes the closest to today
        $args = array(
            'meta_key'          => 'date',
            'orderby'           => 'meta_value',
            'order'             => 'ASC',
            'post_type'        => 'form_events', // the post type 
            'post_status' => 'publish',
            'posts_per_page'=>1,
            'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
                array(
                    'key' => 'date', // Check the start date field
                    'value' => date("Y-m-d"), // Set today's date (note the similar format)
                    'type' => 'DATE', // Let WordPress know we're working with date
                    'compare' => '>=', //get date closest to today 
                )
            ),
        );
        $loop = new WP_Query( $args );

        custom_frontpage_event_exist($loop);

        while ( $loop->have_posts() ) : $loop->the_post();

            custom_frontpage_event(); ?>

        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
    <?php
    }

    function custom_frontpage_event(){ ?>

        <a class="d-flex" href="<?php the_permalink();?>">
            <div class="frontpage_card frontpage_card_container card card_container flex-row d-flex">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail('medium'); ?>
                <?php else : ?>
                    <img width="300" height="169" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/404.png" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" loading="lazy">
                <?php endif; ?>
                <?php if (date('Y-m-d') == date('Y-m-d', strtotime(get_post_meta(get_the_ID(), 'date', TRUE)))) {?> <div class="today"> Today </div> <?php } ?>

                <div class="frontpage_index_content index_content">
                    <div class="frontpage_card_title card_title event_title font--righteous">
                        <?php the_title(); ?>
                    </div>
                    <div class="frontpage_card_time card_time">
                        <?php echo get_post_meta(get_the_ID(), 'hh', TRUE); ?>:<?php echo get_post_meta(get_the_ID(), 'mm', TRUE); ?>ST on <?php echo date('l', strtotime(get_post_meta(get_the_ID(), 'date', TRUE))); ?> <?php echo date('d.m.Y',strtotime(get_post_meta(get_the_ID(), 'date', TRUE))); ?>
                    </div>
                    <?php the_content();?>
                    <div class="event_author"> by <?php echo get_post_meta(get_the_ID(), 'your_name', TRUE);?> </div>
                </div>
            </div>
        </a>       
    <?php
    }

    function custom_frontpage_card(){ ?>

        <a class="d-flex" href="<?php the_permalink();?>">
            <div class="frontpage_card frontpage_card_container card card_container flex-row d-flex">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail('medium'); ?>
                <?php else : ?>
                    <img width="300" height="169" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/404.png" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" loading="lazy">
                <?php endif; ?>
                <div class="frontpage_index_content index_content">
                    <div class="frontpage_card_title card_title event_title font--righteous">
                        <?php the_title(); ?>
                    </div>
                    <?php the_content();?>
                </div>
            </div>
        </a>       
    <?php
    }


    function custom_frontpage_letter_query(){
        $args = array(
            'post_type'   => 'letters', // the post type members
            'post_status' => 'publish',
            'posts_per_page'=>1,
        );
        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <?php custom_frontpage_card(); ?>

        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
        <?php
    }
          

    function custom_frontpage_member_query(){ 
        $args = array(
            'post_type'   => 'members', // the post type members
            'post_status' => 'publish',
            'posts_per_page'=>1,
        );
        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <?php custom_frontpage_card(); ?>

        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
        <?php
    }

    function custom_frontpage_shapes(){ ?>
    <div id="redTriangle"></div>
    <div id="blackTriangle"></div>
    <div id="triangleHider"></div>
    <div id="greyTriangle"></div>
    <?php
    }
?>
