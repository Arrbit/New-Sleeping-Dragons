<?php
/**
 * Lists all Members
 * Theme Name: New Sleeping Dragons
 * Template Name: Lists all Members
 */?>
 <?php get_header();?>   <div id="ajax-posts" class="row">
        <?php
            $postsPerPage = 3;
            $args = array(
                    'post_type' => 'members',
                    'posts_per_page' => $postsPerPage,
            );

            $loop = new WP_Query($args);

            while ($loop->have_posts()) : $loop->the_post();
        ?>

         <div class="small-12 large-4 columns">
                <h1><?php the_title(); ?></h1>
                <p><?php the_content(); ?></p>
         </div>

         <?php
                endwhile;
        wp_reset_postdata();
         ?>
    </div>
    <div id="more_posts">Load More</div>
<?php get_footer();?>