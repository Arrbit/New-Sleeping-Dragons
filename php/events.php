<?php
function c_event_card(){ ?>
    <a class="d-flex" href="<?php the_permalink();?>">
        <div class="card top-round card_container flex-sm-column flex-md-row d-flex">
            <div class="card_img">
            <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail('medium_large'); ?>
                <?php else : ?>
                    <img sizes="(max-width: 768px) 100vw, 768px"  width="768" height="432"   loading="lazy" 
                        class="attachment-medium_large size-medium_large wp-post-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/404.png">
                <?php endif; ?>
                <?php if (date('Y-m-d') == date('Y-m-d', strtotime(get_post_meta(get_the_ID(), 'date', TRUE)))) {?> <div class="today"> Today </div> <?php } ?>
            </div>
                
            <div class="card_content d-flex flex-column font--firasans">
                <div class="card_title event_title font--righteous">
                        <?php the_title(); ?>   
                </div>
                <div class="card_time">
                    <?php echo get_post_meta(get_the_ID(), 'hh', TRUE); ?>:<?php echo get_post_meta(get_the_ID(), 'mm', TRUE); ?>ST on <?php echo date('l', strtotime(get_post_meta(get_the_ID(), 'date', TRUE))); ?> <?php echo date('d/m/Y',strtotime(get_post_meta(get_the_ID(), 'date', TRUE))); ?>
                </div>
                <div class="ce_desc">
                    <?php echo get_the_excerpt(); ?>
                </div>
                <div class="event_author"> by <?php echo get_post_meta(get_the_ID(), 'host', TRUE); echo get_post_meta(get_the_ID(), 'your_name', TRUE);?> </div>
            </div>
        </div>
    </a>
<?php
}
