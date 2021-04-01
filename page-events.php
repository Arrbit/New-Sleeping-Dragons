

        <?php
        $inaweek = date("Y-m-d", time() + (60 * 60 * 24 * +7) );

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
                    'compare' => '<', // Return the ones greater than today's date
                    'type' => 'DATE' // Let WordPress know we're working with date
                )
                ),
        );

        
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); ?>


        <div class="fevent">
            <div class="fthumb left">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('medium_large'); ?>
                    <?php else : ?>
                        <img src="https://sleepingdragons.eu/wp-content/uploads/2020/04/2020-04-27-13-51-22EG11-03-Ambient-1024x576.png">
                    <?php endif; ?>
                </a>
            </div>

            <div class="fbody right">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

                <div class="ftitle">
                <?php the_title(); ?> 
                </div>
                <div class="fdate_time">
                <?php echo get_post_meta(get_the_ID(), 'time', TRUE); ?>:<?php echo get_post_meta(get_the_ID(), 'timemm', TRUE); ?>ST on <?php echo date('l', strtotime(get_post_meta(get_the_ID(), 'date', TRUE))); ?> <?php echo date('d/m/Y',strtotime(get_post_meta(get_the_ID(), 'date', TRUE))); ?>
                <?php if (date('Y-m-d') == date('Y-m-d', strtotime(get_post_meta(get_the_ID(), 'date', TRUE)))) {
                    ?> <div class="today"> today </div> <?php } ?>
                </div>
                <?php the_excerpt(); ?> 
                </a>
            </div>
        </div>
        
                    
                        
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
            <div class="inaweek">Next week and later!</div>
            <div class="inaweek_list">
            <?php
          }

        while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="fevent">
            <div class="fthumb left">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('medium_large'); ?>
                    <?php else : ?>
                        <img src="https://sleepingdragons.eu/wp-content/uploads/2020/04/2020-04-27-13-51-22EG11-03-Ambient-1024x576.png">
                    <?php endif; ?>
                </a>
            </div>

            <div class="fbody right">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

                <div class="ftitle">
                <?php the_title(); ?> 
                </div>
                <div class="fdate_time">
                <?php echo get_post_meta(get_the_ID(), 'time', TRUE); ?>:<?php echo get_post_meta(get_the_ID(), 'timemm', TRUE); ?>ST on <?php echo date('l', strtotime(get_post_meta(get_the_ID(), 'date', TRUE))); ?> <?php echo date('d/m/Y',strtotime(get_post_meta(get_the_ID(), 'date', TRUE))); ?>

                </div>
                <?php the_excerpt(); ?> 
                </a>
            </div>
        </div>
        
                    
                        
        <?php endwhile; ?>
        </div>
        </div>