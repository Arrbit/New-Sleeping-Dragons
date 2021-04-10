<?php
function c_event_card(){ ?>
    <a class="d-flex" href="<?php the_permalink();?>">
        <div class="ce_border ce_border_radius ce_color slight-shadow d-flex flex-md-row flex-column">
            <div class="ce_img">
            <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail('medium_large'); ?>
                <?php else : ?>
                    <img sizes="(max-width: 768px) 100vw, 768px"  width="768" height="432"   loading="lazy" 
                        class="attachment-medium_large size-medium_large wp-post-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/404.png">
                <?php endif; ?>
                <?php if (date('Y-m-d') == date('Y-m-d', strtotime(get_post_meta(get_the_ID(), 'date', TRUE)))) {?> <div class="today"> Today </div> <?php } ?>
            </div>
                
            <div class="ce_content d-flex flex-column">
                <div class="ce_title_big font--righteous">
                        <?php the_title(); ?>   
                </div>
                <div class="ce_time">
                    <?php echo get_post_meta(get_the_ID(), 'hh', TRUE); ?>:<?php echo get_post_meta(get_the_ID(), 'mm', TRUE); ?>ST on <?php echo date('l', strtotime(get_post_meta(get_the_ID(), 'date', TRUE))); ?> <?php echo date('d/m/Y',strtotime(get_post_meta(get_the_ID(), 'date', TRUE))); ?>
                </div>
                <div class="ce_desc">
                    <?php echo get_the_excerpt(); ?>
                </div>
                <div class="ce_host"> by <?php echo get_post_meta(get_the_ID(), 'host', TRUE); echo get_post_meta(get_the_ID(), 'your_name', TRUE);?> </div>
            </div>
        </div>
    </a>
<?php
}
