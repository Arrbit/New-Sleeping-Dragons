<?php
/**
 * Lists all Events
 * Theme Name: New Sleeping Dragons
 * Template Name: Lists all Form_Events
 */?>
  <?php get_header();?>
  <div class="archive_title flex-row d-flex">
    <div class="archive_title_always font--righteous">
        Our Events <!-- Needs to be hardcoded, since Title gives issues on paged version-->
    </div>
    <div class="optional"></div>
</div>
<div class="card_collection">
 
 <?php 
 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$data= new WP_Query(array(
    'meta_key'          => 'date',
    'orderby'           => 'meta_value',
    'order'             => 'DESC',
    'post_type'        => 'form_events', // the post type 
    'posts_per_page' => 5, // post per page
    'paged' => $paged,
    'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
        array(
            'key' => 'date', // Check the start date field
            'type' => 'DATE', // Let WordPress know we're working with date
        )
    )
    )
);

if($data->have_posts()) :
    while($data->have_posts())  : $data->the_post();
    c_event_card();
    endwhile; ?>    
    <?php wpbeginner_numeric_posts_nav(); ?>
<?php endif; ?>
<?php wp_reset_postdata();?>
</div>
<?php get_footer();?>
