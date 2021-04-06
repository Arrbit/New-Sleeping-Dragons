<?php
    function custom_frontpage_event_query(){ ?>
        <div class="frontpage_card_collection card_collection">
        <?php if (!$args['value'] == null) 
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
            else
            // Loop for a single event (see post per page) to today
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

        $loop = new WP_Query( $args ); //check codex if you dont know args takes the query above and enqueessseszes all posts fitting the requirement in the array

        if( ($loop->have_posts()) ) { ?>  
        <h3 class="next_event"> Today's Event </h3> 
        <?php
        }
        else{ ?>
            <h3 class="next_event"> Next Event </h3>  
        <?php
        }  ## This checks if the query above is empty or not :)

        while ( $loop->have_posts() ) : $loop->the_post(); ?> 
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
                    <div class="frontpage_card_time card_time">
                        <?php echo get_post_meta(get_the_ID(), 'hh', TRUE); ?>:<?php echo get_post_meta(get_the_ID(), 'mm', TRUE); ?>ST on <?php echo date('l', strtotime(get_post_meta(get_the_ID(), 'date', TRUE))); ?> <?php echo date('d.m.Y',strtotime(get_post_meta(get_the_ID(), 'date', TRUE))); ?>
                    </div>
                    <?php the_content();?>
                    <div class="event_author"> by <?php echo get_post_meta(get_the_ID(), 'your_name', TRUE);?> </div>
                </div>
            </div>
        </a>                         
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
    <?php
    }

    function custom_frontpage_letter_query(){}

    function custom_frontpage_member_query(){}

    function custom_frontpage_shapes(){ ?>
    <div id="redTriangle"></div>
    <div id="blackTriangle"></div>
    <div id="triangleHider"></div>
    <div id="greyTriangle"></div>
    <?php
    }
?>
