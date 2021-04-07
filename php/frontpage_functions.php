<?php

    function custom_frontpage_event_exist($loop){
        if( ($loop->have_posts()) ) {   // Do we have a post, in our loop?
            ?> Not Empty <?php
            }
        else{
            ?> <?php
        }
    }



    function custom_frontpage_event_query(){
        $exist = array(
            'orderby' => array(
                'is-soon' => 'ASC',
                'time-hh' => 'ASC',
                'time-mm' => 'ASC',
            ),
            'orderby'           => 'meta_value',
            'order'             => 'ASC',
            'post_type'        => 'events', // the post type 
            'post_status' => 'publish',
            'posts_per_page'=>1,
            'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
                'is-soon' => array(
                    'key' => 'date', 
                    'value' => date("Y-m-d"), 
                    'compare' => '>',
                    'type' => 'DATE'
                    ),
                'time-hh' => array(
                'key' => 'hh', 
                ),
                'time-mm' => array(
                'key' => 'mm', 
                ),
            ),
        );
        $eloop = new WP_Query( $exist );

        $args = array(
            'orderby' => array(
                'time-hh' => 'ASC',
                'time-mm' => 'ASC',
            ),
            'order'       => 'DESC',
            'post_type'   => 'events',
            'post_status' => 'publish',
             'meta_query' => array( 
                'istoday' => array(
                'key' => 'date', 
                'value' => date("Y-m-d"), 
                'compare' => '==',
                'type' => 'DATE'
                ),
                'time-hh' => array(
                'key' => 'hh', 
                ),
                'time-mm' => array(
                'key' => 'mm', 
                ),
             ),
         );
         $loop = new WP_Query( $args );

             
        if ($loop->have_posts()){
            while ( $loop->have_posts() ) : $loop->the_post();

            custom_frontpage_event(); 

         endwhile; 
        }elseif ($eloop->have_posts()){
            while ( $eloop->have_posts() ) : $eloop->the_post();

            custom_frontpage_event(); 

         endwhile; 

        }else{
        }

        wp_reset_query(); 
        
    }


    function custom_frontpage_event_query_asd(){ 

        $args = array(
            'meta_key'          => 'date',
            'orderby'           => 'meta_value',
            'order'             => 'ASC',
            'post_type'        => 'events', // the post type 
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

                    <?php echo substr(get_the_excerpt(), 0,300)." […]";?>
                    <div class="event_author frontpage_event_author"> by <?php echo get_post_meta(get_the_ID(), 'your_name', TRUE);?> </div>
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
 
    function custom_fp_card(){ ?>
        <a class="member_card" href="<?php the_permalink();?>">
            <div class="card card_container flex-column d-flex">
                <div class="card_img member_card_img top-round">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail('medium_large'); ?>
                    <?php else : ?>
                    <img sizes="(max-width: 768px) 100vw, 768px"  width="768" height="432"   loading="lazy" class="attachment-medium_large size-medium_large wp-post-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/404.png">
                    <?php endif; ?>
                </div>

                <div class="card_title font--righteous">
                    <?php the_title(); ?>
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

            <?php custom_fp_card(); ?>

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

            <?php custom_fp_card(); ?>

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
